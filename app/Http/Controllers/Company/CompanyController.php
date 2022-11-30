<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $com = Company::all();
        return view('admin.crm.company.company', compact('com'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if($request->file('company_logo'))
        {
            $ava = $request->file('company_logo');
            $company_logo = time() . '.' . $request->file('company_logo')->extension();
            $company_logoPath = public_path() . '/company/';
            $ava->move($company_logoPath, $company_logo);
        }


        $com = new Company;

        $com->company = $request->company;
        $com->company_number = 'C:'. uniqid();
        $com->company_contract_user_id = Auth::user()->id;
        $com->company_category = $request->company_category;
        $com->company_address = $request->company_address;
        $com->company_website = $request->company_website;
        $com->company_phone = $request->company_phone;
        $com->company_skype = $request->company_skype;
        $com->company_bg_info = $request->company_bg_info;
        $com->company_tags = $request->company_tags;
        $com->company_logo = $company_logo;

        $com->save();

        return redirect()->back()->with('success', 'Successfully Added');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $com = Company::find($id);
        $com->delete();
        return redirect()->back()->with('delete', 'Company Deleted');
    }
}
