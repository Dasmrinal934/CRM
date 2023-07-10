<?php

namespace App\Http\Controllers;
use App\Models\test;
use Illuminate\Http\Request;
use App\Models\attandence;
use Illuminate\Support\Facades\Session;
use Image;

use Barryvdh\DomPDF\PDF;


class TestController extends Controller
{
  // public function index(){
  //   $checkinurl=url('testinsert');
  //   $checkouturl=url('test2');
  //   $attandence= attandence::where('UserId','=',Session::get('UserId'))
  //   ->where('Date','=',now()->format('d-m-Y'))->first();
  //   $data=compact('checkinurl','checkouturl','attandence');
  //     return view('backend.test')->with($data);
  //
  //   }
  //   public function index2(){
  //
  // //       $attandence= attandence::where('UserId','=',Session::get('UserId'));
  // //       //view()->share('attandence', $attandence);
  // // return Pdf::loadView('backend.test',compact('attandence'))->download('invoice.pdf');
  // //return $pdf->download('invoice.pdf');
  //
  // $data = attandence::get();
  //       // share data to view
  //     //  view()->share('data',$data);
  //       $pdf = PDF::loadView('backend.test', $data);
  //       // download PDF file with download method
  //       return $pdf->download('pdf_file.pdf');
  //
  //     }
  public function index()
    {
        return view('backend.test');
    }

    public function generatePDF()
    {
        $pdf = PDF::loadView('backend.test');

        $fileName =  time().'.'. 'pdf' ;
        $pdf->save(public_path() . '/' . $fileName);

        $pdf = public_path($fileName);
        return response()->download($pdf);
    }
  }
