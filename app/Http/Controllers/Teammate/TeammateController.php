<?php

namespace App\Http\Controllers\Teammate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeammateController extends Controller
{
    function index(){
        return view('team.index');
    }
}
