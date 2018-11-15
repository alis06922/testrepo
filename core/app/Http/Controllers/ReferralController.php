<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    //referral user list
    public function index()
    {   
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.referral.index', compact('users'));
    } 
    //referral user search
    public function referralSearch(Request $request)
    {
        $this->validate($request,
            [
                'search' => 'required',
            ]);

        $users = User::where('username', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->get();

        return view('admin.referral.search', compact('users'));

    }
     

  // show singe page referral list
  public function singleReferral($id)
    {   
   
        $refers = User::where('refer', $id)->paginate(10);
        return view('admin.referral.single', compact('refers','user'));
    }  


}
