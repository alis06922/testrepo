<?php

namespace App\Http\Controllers;

use App\Gateway;
use Illuminate\Http\Request;

class GatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gateways = Gateway::all();
        return view('admin.gateway.index', compact('gateways'));
    }

  
    public function update(Request $request, Gateway $gateway)
    {
        $this->validate($request, [
            'gateimg' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'rate' => 'required'
        ]);

        if($request->hasFile('gateimg'))
        {
            $path = 'assets/images/gateway/'.$gateway->id;

            if(file_exists($path))
            {
                unlink($path);
            }
                
            $imagename = $gateway->id.'.jpg';
            $request->gateimg->move('assets/images/gateway',$imagename);
        }

        $gateway['name'] = $request->name;
        $gateway['minamo'] = $request->minamo;
        $gateway['maxamo'] = $request->maxamo;
        $gateway['fixed_charge'] = $request->fixed_charge;
        $gateway['percent_charge'] = $request->percent_charge;
        $gateway['rate'] = $request->rate;
        $gateway['val1'] = $request->val1;
        $gateway['val2'] = $request->val2;
        $gateway['status'] = $request->status;
        $gateway->save();

        return back()->with('success','Gateway Information Updated successfully.');
    }

}
