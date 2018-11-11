<?php

namespace App\Http\Controllers;

use App\Address;
use App\Gateway;
use App\General;
use App\Price;
use App\Sell;
use App\Transaction;
use App\User;
use Auth;
use Session;
use Illuminate\Http\Request;

class WalletController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth','ckstatus']);
    }

    public function transactions()
    {
      $trans = Transaction::where('rcid',Auth::id())->orWhere('snid', Auth::id())->paginate(20);
      return view('user.transactions', compact('trans'));
    }

    public function createAddress(Request $request)
    {
    	if (is_null($request->label)) 
    	{
    		$label = 'No Label';
    	}
    	else
    	{
    		$label = $request->label;
    	}

      $gnl = General::first();
    	$wallet['user_id'] = Auth::id();
    	$wallet['label'] = $label;
    	$wallet['address'] = $gnl->wprefix.str_random(32);
    	$wallet['balance'] = '0';
    	Address::create($wallet);

    	return back()->with('success','New Wallet Address Created Successfully');
    }

    public function allWallets()
    {
        $wallets = Address::where('user_id', Auth::id())->orderBy('id','DESC')->paginate(20);
        return view('user.allwallets', compact('wallets'));
    }

    public function sendMoney(Request $request)
    {
    	$this->validate($request,
            [
                'amount' => 'required',
                'fromad' => 'required',
                'toadd' => 'required',
            ]);
        $gnl = General::first();
    	$uwallet = Address::find($request->fromad);
        $toadds = explode('?', $request->toadd);

    	$towallet = Address::where('address',$toadds[0])->first();

    	if(is_null($uwallet) || is_null($towallet)) 
    	{
          return back()->with('alert', 'Invalid Wallet Address');
    	}
    	else
    	{
    		if ($request->amount<0) 
    		{
          		return back()->with('alert', 'Invalid Amount');
    		}
    		else
    		{
    			if ($uwallet->balance<$request->amount) 
    			{
    				return back()->with('alert', 'Insufficient Balance');
    			}
    			else
    			{
    				$total = $request->amount+($request->amount*$gnl->trancrg)/100;

    				$uwallet['balance'] = $uwallet->balance-$total;
    				$uwallet->save();

    				$towallet['balance'] = $towallet->balance+$request->amount;
    				$towallet->save();

    				$trans['receiver'] = $towallet->address;
    				$trans['rcid'] = $towallet->user_id;
    				$trans['sender'] = $uwallet->address;
    				$trans['snid'] = $uwallet->user_id;
    				$trans['amount'] = $request->amount;
    				$trans['trxid'] = str_random(32);
    				Transaction::create($trans);

    				return back()->with('success', $gnl->cur.' Sent Successfully');
    			}
    		}
    	}
    }

    public function receiveMoney(Request $request)
    {

      $valid = Address::find($request->toacc);
     
      if (is_null($valid) || $valid->user_id != Auth::id() ) 
      {
        return back()->with('alert', 'This is Not Your Wallet Address');
      }
      else
      {
        $gnl= General::first();
         $varb = $valid->address."?amount=".$request->coinamount;
         $bcode['code'] = $varb;
         $bcode['qcode'] =  "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$varb&choe=UTF-8\" title='' style='width:300px;' />";
        
        return $bcode; 
      }
   }

   public function purchaseGateway()
   {
        $gates = Gateway::where('status', 1)->get();
        $gnl = General::first();
        $sold = Address::sum('balance');
        $avail = $gnl->stock - $sold;
        return view('user.purchase', compact('gates','avail'));
   }     

}
