<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lead;
use Illuminate\Support\Facades\Session;

class LeadController extends Controller
{
  // select sa.CustId,c.Customer,p.ProjectName,ma.Area from SalesAreadb sa
  // join Customerdb c on sa.CustId=c.CustId
  // join SalesRequireinfo sr on sa.TransId=sr.TransId
  // left  join ProjectDb p on p.ProjectId=sa.ProjId
  // join Citydb ct on ct.AreaId=sr.LocId
  // join MAreadb ma on ma.AreaId=ct.Area where sa.Conformation=2 and sa.Visitflag=1 and sa.UserName=''

  // this function for show 10 lead by user name

   public function index(){
    // if(session()->has('UserId')) {
        $data = lead::join('Customerdb', 'Customerdb.CustId', '=', 'SalesAreadb.CustId')
                        ->join('SalesRequireinfo', 'SalesRequireinfo.TransId', '=', 'SalesAreadb.TransId')
                        ->join('ProjectDb', 'ProjectDb.ProjectId', '=', 'SalesAreadb.ProjId')
                        ->join('Citydb', 'Citydb.AreaId', '=', 'SalesRequireinfo.LocId')
                        ->join('MAreadb', 'MAreadb.AreaId', '=', 'Citydb.Area')
                      ->where('SalesAreadb.Conformation','=','3')
                         ->where('SalesAreadb.Visitflag','=','1')
                       ->where('SalesAreadb.UserName','=','COM00021')->simplepaginate(10);

                      //->get(['SalesAreadb.CustId', 'Customerdb.Customer', 'ProjectDb.ProjectName', 'MAreadb.Area'])
//$data=compact('dataa');
    return view('backend.lead',compact('data'));
   //}
 }

   //show all lead by user and date time

   public function AllLead(){
     $data = lead::join('Customerdb', 'Customerdb.CustId', '=', 'SalesAreadb.CustId')
                     ->join('SalesRequireinfo', 'SalesRequireinfo.TransId', '=', 'SalesAreadb.TransId')
                     ->join('ProjectDb', 'ProjectDb.ProjectId', '=', 'SalesAreadb.ProjId')
                     ->join('Citydb', 'Citydb.AreaId', '=', 'SalesRequireinfo.LocId')
                     ->join('MAreadb', 'MAreadb.AreaId', '=', 'Citydb.Area')
                   ->where('SalesAreadb.Conformation','=','3')
                      ->where('SalesAreadb.Visitflag','=','1')
                    ->where('SalesAreadb.UserName','=','COM00021')->get();
    return view('backend.alllead',compact('data'));
   }
// this function for our usr call which customer
   public function ShowCallLead(){
    return view('backend.called');
   }
   //this function for lead details when user click a lead and open call this controller for all
   public function ShowCustIdDetails(){
    return view('backend.leaddetails');
   }

}
