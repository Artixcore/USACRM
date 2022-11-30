<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function view(){
        $agent = User::all();
        return view('admin.agent.agent', compact('agent'));
    }

    function new(Request $request){

        if($request->file('avatar'))
        {
            $ava = $request->file('avatar');
            $avatar = time() . '.' . $request->file('avatar')->extension();
            $avatarPath = public_path() . '/user/';
            $ava->move($avatarPath, $avatar);
        }


        $agent = new User();

        $agent->avatar = $avatar;
        $agent->name = $request->name;
        $agent->f_name = $request->f_name;
        $agent->l_name = $request->l_name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->urole = $request->urole;
        $agent->password = Hash::make($request->password);

        $agent->save();

        return redirect()->back()->with('success', 'Agent Added Successfully');
    }
}
