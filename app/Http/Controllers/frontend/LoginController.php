<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\user;
use App\Models\empdb;
use App\Models\sessiondb;
use App\Models\loginlocation;
use Hash;
use Storage;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash as FacadesHash;

class LoginController extends Controller
{
     public function index(){
       $url=url('login-user');
      $data=compact('url');
      return view('frontend.index')->with($data);
      //  return view('frontend.index');
    }
    public function locid($locid){
      $pieces=explode(",",$locid);
  // $_SESSION['lat'] = $pieces[0];
  // $_SESSION['long'] = $pieces[1];
  session()->put('lat',$pieces[0]);
  session()->put('long',$pieces[1]);
  // $lat = $pieces[0];
  // $long = $pieces[1];

      $url=url('login-user');
     $data=compact('url');
     return view('frontend.index2')->with($data);
     //  return view('frontend.index');
   }
     //start login code function
public function login(Request $request){
    $request->validate([
      'username' => 'required',
      'password' => 'required'
    ]);
    $user= user::where('Name', '=', strtoupper($request->username))->first();
    if($user){
      $hashed = Hash::make(strtoupper($request->password));
      if(Hash::check($user->Password, $hashed)){
        $request->session()->put('UserId',$user->UserId);
       $request->session()->put('Department',$user->Department);
        $request->session()->put('UserName',$user->Name);
        $request->session()->put('SessionId',now()->timestamp);
        $request->session()->put('empdetails',empdb::where('EmpId','=',$user->EmpID)->first());
      //$usrid=$user->UserId;

        //start insrt cade to session db
        $sessiondb= new sessiondb;
        $sessiondb->SessionId	=now()->timestamp;
        $sessiondb->SesFlag	="1";
        $sessiondb->UserId=$user->UserId;
        $sessiondb->CDate=now()->format('d-m-Y');
        $sessiondb->SessionStart=now()->format('H:i:s');
        $sessiondb->HostAddress=request()->ip();
        $sessiondb->HostName	=$user->Name;
        $sessiondb->save();
        $loginlocation = new loginlocation;
        $loginlocation->SessionId	=now()->timestamp;
        $loginlocation->UserId=$user->UserId;
        $loginlocation->LoginDte=now()->format('d-m-Y');
        $loginlocation->LoginTime=now()->format('H:i:s');
        $loginlocation->LoginLat=Session::get('lat');
        $loginlocation->LoginLong=Session::get('long');
        $loginlocation->save();
        //redirect caller
        // if ($user->Department=="DEP01") {
        //   $folder="caller";
        //   return redirect('/caller');
        // }
        // //redirect pm
        // if ($user->Department=="DEP02") {
        //   $folder="pm";
        //   return redirect('/pm');
        // }
        // //redirect sm
        // if ($user->Department=="DEP03") {
        //   $folder="sm";
        //   return redirect('/sm');
        // }
        // //redirect gm
        // if ($user->Department=="DEP04") {
        //   $folder="gm";
        //   return redirect('/gm');
        // }
        // //redirect admin
        // if ($user->Department=="DEP05") {
        //   $folder="admin";
        //   return redirect('/admin');
        // }
        // //redirect developer
        // if ($user->Department=="DEP06") {
        //   $folder="developer";
        //   return redirect('/dev');
        //
        // }



        return view('backend.index');//,compact('empdetails')
      }
      else {
        return back()->with('fail', 'Incorrect Password');
      }
    }
    else {
      return back()->with('fail', 'User Name is Incorrect');
    }
  }
  //for logout code
  public function logout(){
    //Auth::logout();

    $sessionend=  sessiondb::where('UserId', Session::get('UserId'))
    ->where('SessionId',Session::get('SessionId'))->update(array('SessionEnd' => now()->format('H:i:s')));
    $sessionend=  loginlocation::where('UserId', Session::get('UserId'))
    ->where('SessionId',Session::get('SessionId'))->update(array('LooutTime' => now()->format('H:i:s'),'LogoutLat' => Session::get('lat'),'LogoutLong' => Session::get('long')));
    Session::flush();
   return redirect('/login-user');
   //  return view('frontend.index');
 }
 //start user profile update
 public function editprofile(){
   $empid= user::where('UserId', '=', Session::get('UserId'))->first();
  $empdetails=empdb::where('EmpId','=',$empid->EmpID)->first();
  $url=url('edit-user');
 return view('backend.edit-profile',compact('empdetails','empid','url'));
 }
 public function updateprofile(Request $request){

   if($request->hasFile('userimages') && $request->file('userimages')!="")
   {
     $doc = empdb::where('EmpId',$request->empid)->first();
           // dd($doc);
           $file_path = $doc['UserPhoto'];
           // echo $file_path;
           // die();
           //You can also check existance of the file in storage.
           if($file_path) {
             // echo $file_path;
             // die();
             unlink('frontend/assets/images/users'.'/'.$file_path);
            // unlink(storage_path().'frontend/assets/images/users/'.$file_path); //delete from storage
              // Storage::delete($file_path); //Or you can do it as well
           }
     $valid=$request->validate([
       'userimages' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100048',
     ]);
     $photo=image_formated($request->file('userimages'),'frontend/assets/images/users');
     $photoupadte=empdb::where('EmpId', $request->empid)->update(array('UserPhoto' => $photo));
     }

   $empdb=empdb::where('EmpId', $request->empid)
   ->update(array('Name' => $request->empname,'Mobile' => $request->mobile,'Email' => $request->email,'Adharcard' => $request->aadhar,'DateOfBirth' => $request->dateofbirth));
   //$userdb= new user;
if($empdb || $photoupadte){
  return back()->with('success', 'Profile Update Successfully');
}

 }

}
