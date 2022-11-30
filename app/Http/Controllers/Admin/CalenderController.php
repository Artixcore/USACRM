<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Task;
use App\User;
use Illuminate\Auth\Events\Validated;

class CalenderController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function calender(){
        $task = Task::all();
        return view('admin.calender.mycalender', compact('task'));
    }

    function delete_task($id){
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with('delete', 'Task Deleted');
    }

    function calender_post(Request $request){

        $cal = new Task;

        $cal->user_id = $request->user_id;
        $cal->task_number = 'T:'. uniqid();
        $cal->task_title = $request->task_title;
        $cal->task_project = $request->task_project;
        $cal->task_est_time = $request->task_est_time;
        $cal->task_time_spent = $request->task_time_spent;
        $cal->task_desc = $request->task_desc;
        $cal->task_tags = $request->task_tags;
        $cal->task_priority = $request->task_priority;
        $cal->task_type = $request->task_type;
        $cal->task_start_date = $request->task_start_date;
        $cal->task_due_date = $request->task_due_date;
        $cal->task_repeat = $request->task_repeat;
        $cal->task_status = $request->task_status;

        $cal->save();

        return redirect()->back()->with('success', 'Task Added');

    }

    function task_update(Request $request, $id){

        $cal = Task::find($id);

        $cal->user_id = Auth::user()->id;
        $cal->task_number = 'T:'. uniqid();
        $cal->task_title = $request->task_title;
        $cal->task_project = $request->task_project;
        $cal->task_est_time = $request->task_est_time;
        $cal->task_time_spent = $request->task_time_spent;
        $cal->task_desc = $request->task_desc;
        $cal->task_tags = $request->task_tags;
        $cal->task_priority = $request->task_priority;
        $cal->task_type = $request->task_type;
        $cal->task_start_date = $request->task_start_date;
        $cal->task_due_date = $request->task_due_date;
        $cal->task_repeat = $request->task_repeat;

        $cal->save();

        return redirect()->back()->with('success', 'Task Added');
    }
}
