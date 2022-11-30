<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Appointment;
use App\User;

class AppointmentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function app(){

        $app = Appointment::all();
        $staff = User::where('urole', 'author')->get();
        return view('admin.calender.appointment', compact('app', 'staff'));
    }

    function app_post(Request $request){

        $app = new Appointment;

        $app->app_number = 'A:'. uniqid();
        $app->user_id = Auth::user()->id;
        $app->app_type = $request->app_type;
        $app->app_desc = $request->app_desc;
        $app->app_success_message = $request->app_success_message;
        $app->app_button_text = $request->app_button_text;
        $app->app_staff_event_booked = $request->app_staff_event_booked;
        $app->app_notify_staff = $request->app_notify_staff;
        $app->app_status = 'Active';

        $app->save();

        return redirect()->back()->with('success', 'Appointment Added');
    }

    function delete($id){
        $app = Appointment::find($id);
        $app->delete();

        return redirect()->back()->with('delete', 'Appointment Deleted');
    }


}
