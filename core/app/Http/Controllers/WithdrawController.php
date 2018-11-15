<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Withdraw;
use App\Transaction;
use App\User;
use App\Address;
use App\General;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
       // withdrawal log
    	$withdrws = Withdraw::where('status', 1)->orWhere('status', 2)->orderBy('id', 'desc')->get();

    	return view('admin.withdraw.index', compact('withdrws'));
    }

    public function requests()
    {
        
    	$withdrws = Withdraw::where('status', 0)->orderBy('id', 'desc')->get();

    	return view('admin.withdraw.requests', compact('withdrws'));
    }

     public function approve(Request $request, $id)
    {
        $withdr = Withdraw::findorFail($id);

        $withdr['status'] = 1;
        $withdr['detail'] = 'ZRS Withdrawal Successful';
        $withdr->save();

        $user = User::find($withdr['user_id']);

        $msg =  'Your Withdraw Processed Successfully';
        send_email($user->email, $user->username, 'Withdraw Processed', $msg);
        $sms =  'Your Withdraw Processed Successfully';
        send_sms($user->mobile, $sms);

        return back()->with('success', 'Withdraw Request Approved Successfully!');
    }

 
          public function destroy(Withdraw $withdraw)
    {
         $gnl = General::first();
        $user = User::find($withdraw['user_id']);
        $uwallet= Address::where('user_id',$withdraw['user_id'])->first();
       $uwallet['balance'] = $uwallet->balance + $withdraw['amount'];
        $uwallet->save();
                       $trans['receiver'] = $uwallet['address'];
	    	       $trans['rcid'] = $withdraw['user_id'];
	    	       $trans['sender'] = $gnl->wprefix.'00000000000000000000000000000000';
	    	       $trans['snid'] = 0;
	    	       $trans['amount'] = $withdraw['amount'] ;
	    	       $trans['trxid'] = str_random(32);
	    	       Transaction::create($trans); 
	    	       
        $msg =  'Your Withdraw Request canceled by Admin';
        send_email($user->email, $user->username, 'Withdraw Canceled', $msg);
        $sms =  'Your Withdraw Request canceled by Admin';
        send_sms($user->mobile, $sms);

       // $withdraw->delete();
         $withdraw['status'] = 2;
        $withdraw['detail'] = 'ZRS Withdrawal canceled';
        $withdraw->save();
        return back()->with('success', 'Withdraw Canceled Successfully!'); 
    }
}
