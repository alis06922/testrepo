<?php

namespace App\Http\Controllers;

use Auth;
use App\Docver;
use Hash;
use App\Ico;
use Session;
use App\Sell;
use App\User;
use App\Withdraw;
use App\Transaction;
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

       //withdraw
        public function withdrawLog()
    {      
     $withdrws1 = Withdraw::where('user_id',Auth::id())->orderBy('id','DESC')->paginate(20);
     return view('user.withdraw.log',compact('withdrws1'));
    }
    
      public function withdrawBtc()
    {
         $adds1 = Address::where('user_id', Auth::id())->orderBy('id','ASC')->take(10)->get();
      return view('user.withdraw.btc',compact('adds1'));
    }
    
     public function confirmwithdrawBtc(Request $request)
    {
        if(Auth::user()->docv == 1)
        {
           $this->validate($request,
                [
                    'fromad' => 'required',
                    'amount' => 'required',
                    'wallet' => 'required',
                ]);
            if( $request->amount <= 0)
            {
                return back()->with('alert', 'Invalid Amount'); 
            }
            
      
            else
            {
        
               $gnl = General::first();
               $uwallet = Address::find($request->fromad);
                 if($uwallet->balance >= $request->amount)
                 {
                   
                     $uwallet->balance = $uwallet->balance - $request->amount;
                     $uwallet->save();

                      $with['user_id'] = Auth::id();
                      $with['wdid'] = $request->wallet;
                      $with['amount'] = $request->amount;
                      $with['status'] = 0;
                      $with['detail'] = 'pending..';
                      Withdraw::create($with);
                        
                       $trans['receiver'] = $gnl->wprefix.'00000000000000000000000000000000';
	    	       $trans['rcid'] = 0;
	    	       $trans['sender'] = $uwallet->address;
	    	       $trans['snid'] = $uwallet->user_id;
	    	       $trans['amount'] = $request->amount;
	    	       $trans['trxid'] = str_random(32);
	    	       Transaction::create($trans);
                      

    
                    $msg = $request->amount.' ZIR Withdraw Successfully from Zircash wallet';
                     $user = User::find(Auth::id());
                    send_email($user->email, $user->username, 'Withdraw Zircash', $msg);
                    send_sms($user->mobile, $msg);
                    
                
                      return back()->with('success', 'Withdraw Request Sent Successfully');
                }
                else
                {
                  return back()->with('alert', 'Insufficient Balance');
                }
            } 
        }
        else
        {
            return back()->with('alert', 'Please Verify Document First');
        }
    }

       //Documnet Verify
    public function document()
      {
        return view('user.document');  
      }
  

    public function doc_verify(Request $request)
      {        
          $this->validate($request, 
              [
              'name' => 'required',
              'photo' => 'required|image|mimes:jpeg,png,jpg|max:8000',
              ]);
  	  
          $docm['user_id'] = Auth::id();
          $docm['name'] = $request->name;
          $docm['details'] = $request->details;
               $fileMime = $request->photo->getClientMimeType();  
          if( $fileMime == "image/png" || $fileMime == "image/jpeg"|| $fileMime == "image/jpg" )
             {
                  if($request->hasFile('photo'))
              {   
                  $docm['photo'] = uniqid().'.jpg';;
                  $request->photo->move('assets/images/document',$docm['photo']);
              }
             Docver::create($docm);
             return back()->withSuccess('KYC approval within 24 hours ');  
             } 
         
           return back()->with('alert', "Please Upload valid document");
          
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
            'amount' => 'required|numeric',
            'gateway' => 'required',
        ]);
      
        $gnl = General::first();
        
        if($gnl->ico == 1)
        {
            $ico = Ico::where('status',1)->first();
            $total = $request->amount + $ico->sold;
             $gate = Gateway::findOrFail($request->gateway);
             
             if($request->amount < $gate->minamo || $request->amount > $gate->maxamo)
              {
                    return back()->with('alert','Please Enter amount between '.$gate->minamo. ' to '.$gate->maxamo);
              }
              
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
             $gate = Gateway::findOrFail($request->gateway);
             
             if($request->amount < $gate->minamo || $request->amount > $gate->maxamo)
              {
                    return back()->with('alert','Please Enter amount between '.$gate->minamo. ' to '.$gate->maxamo);
              }
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
