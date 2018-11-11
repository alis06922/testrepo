<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\Ico;
use Session;
use App\Sell;
use App\User;
use App\Price;
use App\Address;
use App\Gateway;
use App\General;
use Illuminate\Http\Request;
use App\Lib\GoogleAuthenticator;
use Illuminate\Support\Facades\Input as input;

class HomeController extends Controller
{  
    public function index()
    {
        $nexts = Ico::where('status','!=',2)->where('status','!=',3)->get();
        $adds = Address::where('user_id', Auth::id())->orderBy('id','DESC')->take(10)->get();
        return view('user.home',compact('adds','nexts'));
    }

    public function myCoin()
    {
      $coins = Sell::where('user_id', Auth::id())->where('status', 1)->get();
      return view('user.mycoin', compact('coins'));
    }

    public function buyIco()
    {
        $gates = Gateway::where('status', 1)->get();
        $ico = Ico::where('status',1)->first();
        return view('user.buy', compact('gates','ico'));
    }

    public function buyDataInsert(Request $request)
    {
      $this->validate($request,
        [
            'amount' => 'required',
            'gateway' => 'required',
        ]);
      
        $gnl = General::first();
        
        if($gnl->ico == 1)
        {
            $ico = Ico::where('status',1)->first();
            $total = $request->amount + $ico->sold;

            if($request->amount <=0 || $total > $ico->quant) 
            {
                return back()->with('alert', 'Invalid Amount');
            }
            else
            {
                $gate = Gateway::findOrFail($request->gateway);
                
                if(is_null($gate))
                {
                    return back()->with('alert', 'Please Select a Payment Gateway');
                }
                else
                {
                    $ico = Ico::where('status',1)->first();
                    
                    $amount = intval($request->amount);
                    $usdamo = $ico->price*$amount;
                    
                    $sell['user_id'] = Auth::id();
                    $sell['ico_id'] = $ico->id;
                    $sell['gateway_id'] = $gate->id;
                    $sell['amount'] = $request->amount;
                    $sell['charge'] = 0;
                    $sell['usd_amo'] = round($usdamo,2);
                    $sell['btc_amo'] = 0;
                    $sell['btc_wallet'] = "";
                    $sell['trx'] = str_random(16);
                    $sell['try'] = 0;
                    $sell['status'] = 0;
                    Sell::create($sell);
                    
                    Session::put('Track', $sell['trx']);
                    
                    return redirect()->route('buy.preview');
                    
                }
            }
        }
        else if($gnl->transaction == 1)
        {
            $sold = Address::sum('balance');
            $avail = $gnl->stock - $sold;

            if ($request->amount <=0 || $request->amount > $avail) 
            {
                return back()->with('alert', 'Invalid Amount');
            }
            else
            {
                $gate = Gateway::findOrFail($request->gateway);
                
                if(is_null($gate))
                {
                    return back()->with('alert', 'Please Select a Payment Gateway');
                }
                else
                {
                    $latest = Price::latest()->first();
                    
                    $amount = intval($request->amount);
                    $usdamo = $latest->price*$amount;
                    
                    $sell['user_id'] = Auth::id();
                    $sell['ico_id'] = 0;
                    $sell['gateway_id'] = $gate->id;
                    $sell['amount'] = $request->amount;
                    $sell['charge'] = 0;
                    $sell['usd_amo'] = round($usdamo,2);
                    $sell['btc_amo'] = 0;
                    $sell['btc_wallet'] = "";
                    $sell['trx'] = str_random(16);
                    $sell['try'] = 0;
                    $sell['status'] = 0;
                    Sell::create($sell);
                    
                    Session::put('Track', $sell['trx']);
                    
                    return redirect()->route('buy.preview');
                    
                }
            }

        }
    }

    public function buyPreview()
    {
        $track = Session::get('Track');
        $data = Sell::where('status',0)->where('trx',$track)->first();
        $gnl = General::first();
        if($gnl->ico == 1)
        {
            $price = $data->ico->price;
        }
        else
        {
            $latest = Price::latest()->first();
            $price = $latest->price;
        }
        return view('user.preview',compact('data','price'));
    }


    public function referal()
    {
        $refers = User::where('refer', Auth::id())->paginate(10);
        return view('user.refer', compact('refers'));
    }

    //Change password
    public function changepass()
    {
        $user = User::find(Auth::id());
        return view('auth.passwords.change', compact('user'));
    }

    public function chnpass()
    {
      $user = User::find(Auth::id());

      if(Hash::check(Input::get('passwordold'), $user['password']) && Input::get('password') == Input::get('password_confirmation'))
      {
        $user->password = bcrypt(Input::get('password'));
        $user->save();

        $msg =  'Password Changed Successfully';
        send_email($user->email, $user->username, 'Password Changed', $msg);
        $sms =  'Password Changed Successfully';
        send_sms($user->mobile, $sms);

        return back()->with('success', 'Password Changed');
      }
      else 
      {
          return back()->with('alert', 'Password Not Changed');
      }
    }


    public function google2fa()
    {
        $gnl = General::first();
        $ga = new GoogleAuthenticator();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl(Auth::user()->username.'@'.$gnl->title, $secret);

        $prevcode = Auth::user()->secretcode;
        $prevqr = $ga->getQRCodeGoogleUrl(Auth::user()->username.'@'.$gnl->title, $prevcode);

        return view('user.goauth.create', compact('secret','qrCodeUrl','prevcode','prevqr'));
    }

    public function create2fa(Request $request)
    {
         $user = User::find(Auth::id());
        
        $this->validate($request,
            [
                'key' => 'required',
                'code' => 'required',
            ]);

        $ga = new GoogleAuthenticator();

        $secret = $request->key;
        $oneCode = $ga->getCode($secret); 
        $userCode = $request->code;
        if ($oneCode == $userCode) 
        { 
            $user['secretcode'] = $request->key;
            $user['tauth'] = 1;
            $user['tfver'] = 1;
            $user->save();

            $msg =  'Google Two Factor Authentication Enabled Successfully';
            send_email($user->email, $user->username, 'Google 2FA', $msg);
            $sms =  'Google Two Factor Authentication Enabled Successfully';
            send_sms($user->mobile, $sms);

            return back()->with('success', 'Google Authenticator Enabeled Successfully');
        }
        else 
        {
          return back()->with('alert', 'Wrong Verification Code');
        }
              
    }

    public function disable2fa(Request $request)
    {
      $this->validate($request,
        [
            'code' => 'required',
        ]);

      $user = User::find(Auth::id());
      $ga = new GoogleAuthenticator();

      $secret = $user->secretcode;
      $oneCode = $ga->getCode($secret); 
      $userCode = $request->code;

      if ($oneCode == $userCode) 
      { 
        $user = User::find(Auth::id());
        $user['tauth'] = 0;
        $user['tfver'] = 1;
        $user['secretcode'] = '0';
        $user->save();

        $msg =  'Google Two Factor Authentication Disabled Successfully';
        send_email($user->email, $user->username, 'Google 2FA', $msg);
        $sms =  'Google Two Factor Authentication Disabled Successfully';
        send_sms($user->mobile, $sms);

        return back()->with('success', 'Two Factor Authenticator Disable Successfully');
      } 
      else 
      {
        return back()->with('alert', 'Wrong Verification Code');
      }
       
    }
}
