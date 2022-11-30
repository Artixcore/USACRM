<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('auth.login');});

Auth::routes();

Route::post('send','SMSController@send')->name('send');

Route::get('home',  'Frontend\UserController@profile');

// Frontend

Route::get('profile/{name}',  'Frontend\UserController@profiles');
Route::post('update-ava','UserController@update_avatar');

Route::get('changestatus', 'UserController@status')->name('changestatus');

Route::namespace('Freelancer')->prefix('freelancer')->name('freelancer.')->group(function(){

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

});

Route::namespace('Company')->prefix('company')->name('company.')->group(function(){

    Route::get('view', 'CompanyController@index')->name('view');
    Route::post('create', 'CompanyController@create')->name('create');
    Route::post('destroy/{id}', 'CompanyController@destroy')->name('destroy');
});

Route::namespace('Day')->prefix('day')->name('day.')->group(function(){
    // Avaiablity
    Route::get('day', 'DayController@day')->name('day');
    Route::post('day.new', 'DayController@new')->name('day.new');
    Route::post('day.delete/{id}', 'DayController@delete')->name('day.delete');
});

// $officer    = Role::where('urole','officer')->first();
// $teammate   = Role::where('urole','teammate')->first();
// $salesperson = Role::where('urole','salesperson')->first();


// officer
Route::namespace('Teammate')->prefix('teammate')->name('teammate.')->group(function(){
    Route::get('teammate', 'TeammateController@index')->name('teammate');
});

// Teammate
Route::namespace('Officer')->prefix('officer')->name('officer.')->group(function(){
    Route::resource('officers', 'OfficerController',['except' => ['show','create','store']]);
});

// Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){

    Route::resource('/users', 'UserController',['except' => ['show','create','store']]);

    // Dashboard
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    // Agent
    Route::get('agent', 'AgentController@view')->name('agent');
    Route::post('agent/new', 'AgentController@new')->name('agent.new');

    // Appointment

    Route::get('app', 'AppointmentController@app')->name('app');
    Route::post('app/save', 'AppointmentController@app_post')->name('app.save');
    Route::post('app/delete/{id}', 'AppointmentController@delete')->name('app.delete');

    // Calender
    Route::get('calender', 'CalenderController@calender')->name('calender');
    // Route::get('calender/edit/{task_number}', 'CalenderController@calender')->name('calender');

    Route::post('save/calender', 'CalenderController@calender_post')->name('save.calender');
    Route::post('task/delete/{id}', 'CalenderController@delete_task')->name('task.delete');


    // CRM


    Route::get('crm', 'CRMController@crm')->name('crm');
    // contact
    Route::get('contact', 'CRMController@contact')->name('contact');
    Route::get('contract', 'CRMController@contract')->name('contract');
    Route::post('save_form', 'CRMController@save_form')->name('save_form');
    Route::post('contact/delete/{id}', 'CRMController@contact_delete')->name('contact.delete');

    // Circle
    Route::get('circle', 'CircleController@circle')->name('circle');
    Route::post('save_circle', 'CircleController@save_circle')->name('save_circle');
    Route::post('circle/destroy/{id}', 'CircleController@circle_destroy')->name('circle.destroy');

    // Event
    Route::get('event', 'EventController@event')->name('event');
    Route::post('add_event', 'EventController@add_event')->name('add_event');
    Route::post('event/destroy/{id}', 'EventController@event_destroy')->name('event.destroy');

    // Deal
    Route::get('deal', 'DealController@deal')->name('deal');
    Route::post('deal', 'DealController@deal_post')->name('deal');
    Route::post('deal/delete/{id}', 'DealController@deal_delete')->name('deal.delete');

    // Billing
    Route::get('billing', 'BillingController@billing')->name('billing');

    // Project
    Route::get('project', 'ProjectController@project')->name('project');

    // Files
    Route::get('files', 'FilesController@file')->name('files');

    // Marketing
    Route::get('marketing', 'MarketingController@marketing')->name('marketing');

    // Pages
    Route::get('pages', 'PagesController@pages')->name('pages');

    // Forms
    Route::get('forms', 'FormssController@forms')->name('forms');

    // Flows
    Route::get('flows', 'FlowsController@flows')->name('flows');

    // Message
    Route::get('message', 'MessageController@message')->name('message');

    // Settings
    Route::get('settings', 'SettingsController@settings')->name('settings');


});

// Freelancer
Route::namespace('Freelancer')->prefix('freelancer')->name('freelancer.')->group(function(){
    // Dashboard
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    // Freelancer
    Route::get('work', 'DashboardController@dashboard')->name('dashboard');
});


// SuperAdmin
Route::namespace('Superadmin')->prefix('superadmin')->name('superadmin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UserController',['except' => ['show','create','store']]);
});
