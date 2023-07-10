@extends('backend.layouts.main')

@section('main-section')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="{{url('frontend/locjs/jquery-1.9.1.js')}}"></script>
<script src="{{url('frontend/locjs/jquery-ui.js')}}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

<style>
body {
  background: #BA68C8;
}

.form-control:focus {
  box-shadow: none;
  border-color: #BA68C8;
}

.profile-button {
  background: #BA68C8;
  box-shadow: none;
  border: none;
}

.profile-button:hover {
  background: #682773;
}

.profile-button:focus {
  background: #682773;
  box-shadow: none;
}

.profile-button:active {
  background: #682773;
  box-shadow: none;
}

.back:hover {
  color: #682773;
  cursor: pointer;
}
.field-icon {
    float: right;
    margin-right: 22px;
    margin-top: -32px;
    position: relative;
    font-size: 22px;
  }
</style>
<div class="container rounded bg-white mt-5">
  <form action="{{$url}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                  @if($empdetails->UserPhoto!="")
                  <img class="rounded-circle mt-7" src="{{url('frontend/assets/images/users/'.$empdetails->UserPhoto)}}" width="90">
                  @else
                  <img class="rounded-circle mt-7" src="{{url('frontend/assets/images/users/avatar.jpg')}}" width="90">
                  @endif
                  <span class="font-weight-bold">{{$empdetails->Employ}}</span>
                  <span class="font-weight-bold">{{Session::get('UserName')}}</span>
                  <span>{{$empdetails->Department}}</span></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="row mt-2">
                        <div class="col-md-6"><input type="text" class="form-control" name="empname" placeholder="Name" value="{{$empdetails->Name}}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><input type="email" class="form-control" name="email" placeholder="Email" value="{{$empdetails->Email}}"></div>
                        <div class="col-md-6"><input type="number" class="form-control" name="mobile" value="{{$empdetails->Mobile}}" placeholder="Mobile"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><input type="text" class="form-control"name="dateofbirth" placeholder="Date Of Birth" value="{{$empdetails->DateOfBirth}}"></div>
                        <div class="col-md-6"><input type="number" class="form-control" name="aadhar" value="{{$empdetails->Adharcard}}" placeholder="Aadhar"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><input type="text" class="form-control" style="color: #8b8686;" placeholder="User Name" value="{{$empid->Name}}" readonly></div>
                        <div class="col-md-12"><input type="password" id="password" name="password" class="form-control" value="{{$empid->Password}}" placeholder=""><i class="bi bi-eye-slash field-icon" id="togglePassword" ></i></div>
                        <input type="hidden" name="empid" value="{{$empdetails->EmpId}}"/>
                    </div>
                    <div class="row mt-3">
                      <label> Upload Profile Picture</lable>
                        <div class="col-md-6"><input type="file" name="userimages" class="form-control"></div>

                    </div>
                    <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="input">Save Profile</button></div>
                </div>
            </div>
        </div>
      </form>
    </div>
    <script>const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");
togglePassword.addEventListener("click", function () {
const type = password.getAttribute("type") === "password" ? "text" : "password";
password.setAttribute("type", type);
this.classList.toggle("bi-eye");
});
</script>

@endsection
