@extends('frontend.layouts.main')
@section('main-section')
<script src="{{url('frontend/locjs/jquery-1.9.1.js')}}"></script>
<script src="{{url('frontend/locjs/jquery-ui.js')}}"></script>
<script type="text/javascript">
var myVar;

function hello() {
		myVar = Android.getFromAndroid();
		if (myVar=="null,null") {
		 alert("Please turn On Location");
		// window.location = "index.php";
		window.location.href = "{{ route('login-user')}}";

		}
		else {
			myVar = Android.getFromAndroid();
	alert("Wellcome To LLD");
	var url = '{{ route("login-usr", ":myVar") }}';
	url = url.replace(':myVar', myVar);
	window.location = url;

}

}

hello();



</script>
	<body>

        <div class="login-container lightmode" style="background: url({{ asset('frontend/img/backgrounds/wall_1.jpg')}}) ">

            <div class="login-box animated fadeInDown">
<!--                 <div class="login-logo" style="height: 85px;"></div>

 -->
 @if(Session::has('success'))
							 <div class="alert alert-success">
								  <audio autoplay src="{{url('frontend/audio/denied.mp3')}}" ></audio>
																	 {{Session::get('success')}}
															 </div>
															 @endif
															 @if(Session::has('fail'))
															 <div class="alert alert-danger">
																 <!-- <audio id="audio-alert" src="{{url('frontend/audio/alert.mp3')}}" preload="auto"></audio> -->
																 <audio autoplay src="{{url('frontend/audio/denied.mp3')}}" ></audio>
																	 {{Session::get('fail')}}
															 </div>
													 @endif
                <div class="login-body">
                  <div class="login-title" style="text-align: center;"><strong><img src="{{url('frontend/img/logo5.png')}}" width="300"></strong></div>

                    <div class="login-title" style="font-size: 34px;text-align: center;"><strong>LOG IN</strong></div>
                    <form action="{{$url}}" class="form-horizontal" method="post" enctype="multipart/form-data">
											@csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="User Name" required value="{{old('email')}}"/>
                                    <span class="text-danger">@error('username') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password"  required/>
                            <i class="bi bi-eye-slash field-icon" id="togglePassword" ></i>
														 <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        </div>
                    </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-info btn-block" style="font-size: 18px; padding: 9px 16px;">SUBMIT</button>
                        </div>
                    </div>
										<div class="form-group" >
												<div class="col-md-6">
														<a href="#" class="btn btn-link btn-block" >Forgot your password?</a>
												</div>
                      <div class="login-subtitle">
                        Don't have an account yet? <a href="#">Contact To Admin</a>
                    </div>
                    </form>
                </div>
                <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        // const form = document.querySelector("form");
        // form.addEventListener('submit', function (e) {
        //     e.preventDefault();
        // });
    </script>
@endsection
