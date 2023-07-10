<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lead;
use App\Models\customer;
use App\Models\calldetails;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class CallingController extends Controller
{
    public function index($id,$tid){
      $customer=customer::find(Crypt::decrypt($id));
      $lead=lead::find(Crypt::decrypt($tid));
      if(is_null($customer && $lead)){
       return redirect('/login-user');
      }
      else {

        $data = lead::join('Customerdb', 'Customerdb.CustId', '=', 'SalesAreadb.CustId')
                        ->join('SalesRequireinfo', 'SalesRequireinfo.TransId', '=', 'SalesAreadb.TransId')
                        ->join('CustRequireInfo', 'CustRequireInfo.CustId', '=', 'SalesAreadb.CustId')
                        ->join('ProjectDb', 'ProjectDb.ProjectId', '=', 'SalesAreadb.ProjId')
                        ->join('Citydb', 'Citydb.AreaId', '=', 'SalesRequireinfo.LocId')
                        ->join('CustSourceInfo', 'CustSourceInfo.CustId', '=', 'SalesAreadb.CustId')
                        ->join('MAreadb', 'MAreadb.AreaId', '=', 'Citydb.Area')
                        ->join('MCitydb', 'MCitydb.CityId', '=', 'Citydb.City')
                        ->join('MZonedb', 'MZonedb.ZoneId', '=', 'Citydb.Block')
                        ->join('MLocationdb', 'MLocationdb.LocId', '=', 'Citydb.Location')
                        ->where('SalesAreadb.TransId','=',Crypt::decrypt($tid))
                        ->where('SalesAreadb.Conformation','=','3')
                        ->where('SalesAreadb.Salesflag','!=','0')->get();


          return view('backend.calling',compact('data'));
      }

    }
    public function seen($id,$tid,$mobile,$userid){
      //here tid is transuction id whis is primary key on this table
      $details=calldetails::find(Crypt::decrypt($tid));
      if(is_null($details)){
        $calldetails= new calldetails;
        $calldetails->TransId	=Crypt::decrypt($tid);
        $calldetails->CustId=Crypt::decrypt($id);
        $calldetails->Mobile=Crypt::decrypt($mobile);
        $calldetails->UserId=$userid;
        $calldetails->Date=now()->format('d-m-Y');
        $calldetails->Start_time=now()->format('H:i:s');
        $calldetails->Status="1";
        $calldetails->save();
        return \Redirect::route('call-clients', ['id'=>$id,'tid'=>$tid]);//->with('message', 'State saved correctly!!!');

        //echo "new";
      }
      else {
          echo "DUPLICATE";
      }
    }
    public function called($Mobile,$tid){
      //here tid is transuction id whis is primary key on this table
      $details=calldetails::find(Crypt::decrypt($tid));

      if(is_null($details)){
          echo "not update";
        //echo "new";
      }
      else {
        $called=  calldetails::where('TransId', Crypt::decrypt($tid))->update(array('Status' => '2'));
        if($called){
          //return \Redirect::route('call-clients', ['id'=>$id,'tid'=>$tid]);//->with('message', 'State saved correctly!!!');
        //  return back('tel:12345678');
      //  return Redirect::to('tel:12345678');
        return redirect()->to('tel:'.Crypt::decrypt($Mobile));

//echo "update";
        }
        else {
          //  return back();
          return redirect()->to('tel:'.$Mobile);
        }


      }
    }
}
