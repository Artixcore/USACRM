<?php

namespace App\Http\Controllers\Admin;

use App\Deal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function deal(){
        $deal = Deal::all();
        return view('admin.crm.deal.index', compact('deal'));
    }

    function deal_post(Request $request){


        $request->validate([
            'followers' => 'nullable|sometimes|max:255',
            'followers_recieve_mail'   => 'nullable|sometimes|max:255',
        ]);

        $deal = new Deal();

        $deal->deal_number = 'D:' . uniqid();
        $deal->user_id = Auth::user()->id;
        $deal->contract_id = $request->contract_id;
        $deal->deal = $request->deal;
        $deal->details = $request->details;
        $deal->category = $request->category;
        $deal->expected_close = $request->expected_close;
        $deal->expected_value = $request->expected_value;
        $deal->currency_type = $request->currency_type;
        $deal->stage = $request->stage;
        $deal->followers = $request->followers;
        $deal->followers_recieve_mail = $request->followers_recieve_mail;

        $deal->save();

        return redirect()->back()->with('success', 'Seal Added');
    }

    function deal_delete($id){
        $deal = Deal::find($id);
        $deal->delete();
        return redirect()->back()->with('delete', 'Deleted');
    }
}
