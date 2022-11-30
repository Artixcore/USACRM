<?php

namespace App\Http\Controllers\Day;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Days;
use App\User;
use Illuminate\Support\Facades\Auth;

class DayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function day(){
        $day = Days::where('user_id', auth()->id())->get();
        return view('admin.calender.defaultavailability', compact('day'));
    }

    function new(Request $request){

        $day = new Days();

        $day->day = $request->day;
        $day->user_id = Auth::user()->id;
        $day->day_number = 'D:'. uniqid();
        $day->day_start = $request->day_start;
        $day->day_end = $request->day_end;
        $day->day_status = $request->day_status;

        $day->save();

        return redirect()->back()->with('success', 'Day Added');
    }

    function delete($id){
        $day = Days::find($id);
        $day->delete();
        return redirect()->back()->with('delete', 'Day Deleted');
    }
}
