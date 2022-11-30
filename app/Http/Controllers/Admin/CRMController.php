<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Contract as AppContract;
use Illuminate\Http\Request;

class CRMController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function contract(){
        $contact = AppContract::all();
        return view('admin.crm.contact.contact', compact('contact'));
    }

    function contact(){
        return view('admin.crm.contact.contracts');
    }

    function contact_delete($id){
        $contact = AppContract::find($id);
        $contact->delete();

        return redirect()->back()->with('delete', 'Contact Deleted');
    }

    function save_form(Request $request){

        $request->validate([
            'home_email' => 'nullable|sometimes|max:255',
            'work_email' => 'nullable|sometimes|max:255',
            'bc_phone'   => 'nullable|sometimes|max:255',
        ]);


        if($request->file('logo'))
        {
            $logo = $request->file('logo');
            $logoname = time() . '.' . $request->file('logo')->extension();
            $logoPath = public_path() . '/contract/user/';
            $logo->move($logoPath, $logoname);
        }

        $form = new AppContract();

        $form->con_number = 'P:'. uniqid();
        $form->user_id = Auth::user()->id;
        $form->role = $request->role;
        $form->name_prefix = $request->name_prefix;
        $form->f_name = $request->f_name;
        $form->l_name = $request->l_name;
        $form->email = $request->email;
        $form->home_email = $request->home_email;
        $form->work_email = $request->work_email;
        $form->logo = $logoname;
        $form->coordinator = $request->coordinator;
        $form->assigned_person = $request->assigned_person;
        $form->company_id = $request->company_id;
        $form->e_m_a_id = $request->e_m_a_id;
        $form->tags = $request->tags;
        $form->title = $request->title;
        $form->bg_info = $request->bg_info;
        $form->phone = $request->phone;
        $form->bc_phone = $request->bc_phone;
        $form->website = $request->website;
        $form->skype = $request->skype;

        $form->save();

        return redirect()->route('admin.contact')->with('success', 'Successfully Saved Contact');

    }


}
