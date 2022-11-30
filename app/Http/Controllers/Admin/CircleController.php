<?php

namespace App\Http\Controllers\Admin;

use App\Circle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CircleController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    function circle(){
        $circle = Circle::all();
        return view('admin.crm.circle.index', compact('circle'));
    }

    function circle_destroy($id){

        $circle = Circle::find($id);
        $circle->delete();
        return redirect()->back()->with('delete', 'Circle Deleted');

    }

    function save_circle(Request $request){

        $ci = new Circle();

        $ci->number = 'C:'.uniqid();
        $ci->user_id = Auth::user()->id;
        $ci->circle_name = $request->circle_name;
        $ci->description = $request->description;
        $ci->assign_user_id = $request->assign_user_id;
        $ci->color = $request->color;

        $ci->save();

        return redirect()->back()->with('success', 'New Circle Added');
    }
}
