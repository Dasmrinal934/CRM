@extends('backend.layouts.main')

@section('main-section')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
    .box{

        display: none;

    }
    .red{ background: #ff0000; }
    .green{ background: #228B22; }
    .blue{ background: #0000ff; }
</style>

            <style>
                .form-control[disabled], .form-control[readonly], .form-control {
                 color: #1e1d1d;
                 border: 1px solid #ff9292;
             }
               .form-group-readonly {
                 color: #c5c5c5;
                 background-color: transparent;
               }

                .form-control {
                    border: 1.5px solid #04911c;
                    border: 1px solid #ff9292;
                }
                .form-horizontal .form-group {
                    margin-bottom: 2px;
                    margin-right: 0px;
                    margin-left: 0px;
                  }
                </style>

                <!-- START BREADCRUMB -->

                <div class="page-content-wrap" style="background-color: #dce5ff;height: 100%;">
                    <div class="row" style="margin-left: 10px;margin-right: 10px;">
                         <div class="col-md-6">
                            <!-- START DEFAULT FORM ELEMENTS -->
                            @if(Session::has('message'))
                           							 <div class="alert alert-success">
                           								  <audio autoplay src="{{url('frontend/audio/success.mp3')}}" ></audio>
                           																	 {{Session::get('message')}}
                           															 </div>
                           															 @endif
                           															 @if(Session::has('fail'))
                           															 <div class="alert alert-danger">
                           																 <!-- <audio id="audio-alert" src="{{url('frontend/audio/alert.mp3')}}" preload="auto"></audio> -->
                           																 <audio autoplay src="{{url('frontend/audio/denied.mp3')}}" ></audio>
                           																	 {{Session::get('fail')}}
                           															 </div>
                           													 @endif
                                                     <div class="block">

                       <div class="col-md-12" style="text-align: center; font-size:20px">Attandence Today</div>
                       @if(empty($attandence->CheckInTime) && empty($attandence->CheckOutTime))
                                <form enctype="multipart/form-data" method="post" action="{{$checkinurl}}">
                                  @csrf
                                     <div class="form-group">
                                       <div class="col-md-6">
                                         <input type="hidden" name="lat" value="{{$setlat}}">
                                         <input type="hidden" name="long" value="{{$setlong}}">
                                         <input type="file" name="checkin" accept="image/*" capture="" required>
                                       </div>
                                        <div class="col-md-6">
                                          <button  type="submit" class="btn btn-success">Checkin</button>
                                        </div>
                                    </div>
                                  </form>
                                  <div class="form-group-readonly" >
                                    <div class="col-md-6" >
                                      <button readonly>Choose file</button>
                                    </div>
                                     <div class="col-md-6">
                                       <button class="btn" readonly>Checkout</button>
                                     </div>
                                 </div>
                            @elseif(empty($attandence->CheckOutTime)&& !empty($attandence->CheckInTime))
                                  <form enctype="multipart/form-data" method="post" action="{{$checkouturl}}">
                                    @csrf
                                    <div class="form-group-readonly">
                                      <div class="col-md-6">
                                        <button readonly>Choose file</button>
                                      </div>
                                       <div class="col-md-6">
                                         <button  class="btn" readonly>Checkin</button>
                                       </div>
                                   </div>
                                    <div class="form-group">
                                      <div class="col-md-6">
                                        <input type="hidden" name="lat" value="{{$setlat}}">
                                        <input type="hidden" name="long" value="{{$setlong}}">
                                         <input type="file" name="checkout" accept="image/*" capture="" required>
                                      </div>
                                       <div class="col-md-6">
                                         <button type="submit" class="btn btn-success">Checkout</button>
                                       </div>
                                   </div>
                                 </form>
                                 @else
                                 <div class="form-group">
                                   <div class="col-md-12">
                                     Checkin Time :
                                    <button class="btn btn-success"> {{$attandence->CheckInTime}}</button>
                                   </br></br>
                                   Checkout Time :
                                    <button class="btn btn-success"> {{$attandence->CheckOutTime}}</button>
                                    </div>
                                </div>


                                 @endif

                             </div>


                        </div>
                    </div>
                </div>

                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

@endsection
