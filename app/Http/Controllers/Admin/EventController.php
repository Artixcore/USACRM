<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    function event(){
        $event = Event::all();
        return view('admin.crm.event.index', compact('event'));
    }

    function event_destroy($id){
        $event = Event::find($id);
        $event->delete();
        return redirect()->back()->with('delete',' Event Deleted');
    }

    function add_event(Request $request){

        $event = new Event;

        $event->user_id = Auth::user()->id;
        $event->event_number = 'E.'.uniqid();
        $event->event = $request->event;
        $event->contract_id = $request->contract_id;
        $event->assign_id = $request->assign_id;
        $event->visible = $request->visible;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->duration = $request->duration;
        $event->category = $request->category;
        $event->description = $request->description;

        $event->save();

        return redirect()->back()->with('success', 'Event Added');
    }
}
