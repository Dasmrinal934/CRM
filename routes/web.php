<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\LeadController;
use App\Http\Controllers\backend\CallingController;
use App\Http\Controllers\backend\VisitController;
use App\Http\Controllers\backend\AttandanceController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//THIS ROUTE FOR TESTING PAGES OR Controllers
  Route::get('/test',[TestController::class,'index']);
  Route::get('/testinsert',[TestController::class,'index2'])->name('test');
  Route::get('generate-pdf', [TestController::class, 'generatePDF'])->name('generate.pdf');
//END TEST ROUTE
//start frontend route

Route::get('login-user', [LoginController::class,'index'])->name('login-user');
Route::get('login-usr/{locid}', [LoginController::class,'locid'])->name('login-usr');
Route::post('login-user',[LoginController::class,'login'])->name('login-post');
Route::get('logout-user', [LoginController::class,'logout'])->name('logout-user');
Route::get('/',[LoginController::class,'index'])->name('login-user');
//end frontend routes;
//start backend or user panel routes
//this is for sales manager
//'prefix'=>'/pm',
Route::group(['middleware'=>['islogin']],function(){
      Route::get('/',[HomeController::class,'index']);
      Route::get('/leads',[LeadController::class,'index']);
      Route::get('/all-leads',[LeadController::class,'AllLead']);
      Route::get('/call-clients/{id}/{tid}',[CallingController::class,'index'])->name('call-clients');
      //this code for user seen this lead
      Route::get('/call-details/{id}/{tid}/{mobile}/{UserId}',[CallingController::class,'seen'])->name('call-details');
      //this code for fake call
      Route::get('/call-number/{Mobile}/{tid}',[CallingController::class,'called'])->name('call-number');
      //Route::get('/call-number',[TestController::class,'index'])->name('call-number');

      Route::get('/upcomming-visits',[VisitController::class,'MayVisit']);
      Route::get('/visited-clients', [VisitController::class,'Visited']);
      Route::get('/show-called-clients',[LeadController::class,'ShowCallLead']);
      Route::get('/show-details-clients',[LeadController::class,'ShowCallDetails']);
      //start location route
      Route::get('/get-location/{newurl}',[AttandanceController::class,'locationget'])->name('get-location');
      Route::get('/set-location/{locid}',[AttandanceController::class,'index'])->name('set-location');
      Route::post('store-location',[AttandanceController::class,'storeLoca'])->name('store-location');
      Route::get('/attandence/{locid}',[AttandanceController::class,'attandence'])->name('attandence');
      Route::post('/intime',[AttandanceController::class,'checkin'])->name('intime');
      Route::post('/outtime',[AttandanceController::class,'checkout'])->name('outtime');
      Route::get('/Attandence-Report',[AttandanceController::class,'report'])->name('Attandence-Report');
      Route::post('/Attandence-Report',[AttandanceController::class,'showreport'])->name('Attandence-Show');
      Route::get('/export-pdf/{fdate}/{tdate}',[AttandanceController::class,'exportatt'])->name('export-pdf');
      // user profile change
      Route::get('/edit-user', [LoginController::class,'editprofile'])->name('edit-user');
      Route::post('/edit-user', [LoginController::class,'updateprofile'])->name('update-user');
//end sales manager
      //end location routes
      //end backend routes
    });
