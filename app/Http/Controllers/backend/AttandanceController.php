<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\attandence;
use App\Models\setlocation;
use Illuminate\Support\Facades\Session;
use Image;
use PDF;
use DB;


class AttandanceController extends Controller
{

      public function index($locid){
        $pieces=explode(",",$locid);
        $setlat=$pieces[0];
        $setlong=$pieces[1];
        $url=url('store-location');
        $data=compact('url','setlat','setlong');
        return view('backend.submitLocation')->with($data);

      }
      public function locationget($newurl){
        $data=compact('newurl');
        return view('backend.location-set')->with($data);
      }
      public function storeLoca(Request $request){
        $valid=$request->validate([
          'proimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);
        $insert= new setlocation;
        $insert->id= now()->timestamp;
        $insert->UserId= Session::get('UserId');
        $insert->Date= now()->format('d-m-Y');
        $insert->Time= now()->format('H:i:s');
        $insert->Lat= $request->setlat;
        $insert->Long= $request->setlong;
        $insert->LocationName= $request->location;
        //this image_formated() function created by mrinal
          $input=image_formated($request->file('proimg'),'ProjectImages');
        $insert->Images=$input;

      //  $insert->Images= $request->file('proimg')->store('ProjectImages');
        $insert->projectName= $request->project;
        $save= $insert->save();
        if($save){
          return back()->with('message','Your Location Is Successfully Saved');
        }
        else {
          return back()->with('fail','didnot saved');
        }
      }
      public function attandence($locid){
      //  $attandence=attandence::all();

      $attandence=attandence::where('UserId','=',Session::get('UserId'))
      ->where('Date','=',now()->format('d-m-Y'))->first();

        $pieces=explode(",",$locid);
        $setlat=$pieces[0];
        $setlong=$pieces[1];
        $checkinurl=url('intime');
        $checkouturl=url('outtime');
        $data=compact('checkinurl','checkouturl','attandence','setlat','setlong');
        return view('backend.today-attandence')->with($data);
      }
      public function checkin(Request $request){
      $valid=$request->validate([
        'checkin' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
      ]);
      //|mimes:jpeg,png,jpg,gif,svg|max:5048
      if($valid){
        $attandence= new attandence;
        $attandence->UserId= Session::get('UserId');
        $attandence->Date= now()->format('d-m-Y');
        $attandence->Time= now()->format('H:i:s');
        $attandence->checkinLat= $request->lat;
        $attandence->checkinLong= $request->long;
        $attandence->CheckInTime= now()->format('H:i:s');
          $input=image_formated($request->file('checkin'),'Attandence');
        $attandence->checkinImages=$input;
              //end resize images code
        $save= $attandence->save();
        if($save){
          return back()->with('message','Thanks For Submit Your Attandence Today');
        }
        else {
          return back()->with('fail','didnot saved');
        }
      }
        else{
          return back()->with('fail','didnot saved check type');
        }



      }
      public function checkout(Request $request){
          $input=image_formated($request->file('checkout'),'Attandence');
        $attandence=  attandence::where('UserId', Session::get('UserId'))
        ->where('Date',now()->format('d-m-Y'))->update(array('checkoutLong' => $request->long,'checkoutLat' => $request->lat,'CheckOutTime' => now()->format('H:i:s'),'checkoutImages' => $input));
      //  $save= $attandence->save();
        if($attandence){
          return back()->with('message','Thanks For Submit Your Attandence Today');
        }
        else {
          return back()->with('fail','didnot saved');
        }
      }
      public function report(){
        $url=url('Attandence-Report');
        return view('backend.attandenceReport')->with(compact('url'));
      }
      public function showreport(Request $request){
        // echo $request->fromdate;
        // echo "</br>";
        // echo $request->todate;

        $attandence = DB::select("select * from attandence where UserId = '".Session::get('UserId')."' and  str_to_date(Date, '%d-%m-%Y') between '".$request->fromdate."' and '".$request->todate."'");

        // $attandence=attandence::where('UserId','=',Session::get('UserId'))
        // ->whereBetween('Date',[$request->fromdate,$request->todate])->get();


        $url=url('Attandence-Report');
        $print=url('print-attandence');
        $fromdate=$request->fromdate;
        $todate=$request->todate;
        $data=compact('attandence','url','print','fromdate','todate');
      //  echo "hi";

        return view('backend.attandenceReport')->with($data);
      }
      public function exportatt($fdate,$tdate){
        //this is mysql query implement to laravel
        $attandence = DB::select("select * from attandence where UserId = '".Session::get('UserId')."' and  str_to_date(Date, '%d-%m-%Y') between '".$fdate."' and '".$tdate."'");

        //view()->share ('attandence', $attandence);
        $url=url('Attandence-Report');
        $print=url('print-attandence');
        $fromdate=$fdate;
        $todate=$tdate;
        $data=compact('attandence','url','print','fromdate','todate');

      $pdf = \PDF::loadView('backend.pdf', $data);
       return $pdf->download('Attandence-'.date_formated($fdate).'-'.date_formated($tdate).'.pdf');
      //return view('backend.test')->with($data);
      }

  }
