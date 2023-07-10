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
                .form-control {
                    border: 1.5px solid #04911c;

                }
                .form-horizontal .form-group {
                    margin-bottom: 2px;
                    margin-right: 0px;
                    margin-left: 0px;
                  }
                </style>

                <!-- START BREADCRUMB -->

                <div class="page-content-wrap" style="background-color: #dce5ff;">
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
                                <div class="col-md-12" style="text-align: center; font-size:20px">Location Set</div>
                                <form class="form-horizontal" role="form" action="{{$url}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Project</label>
                                        <div class="col-md-10">
                                            <input type="text" name="project" class="form-control" placeholder="Type The Project name Which You Add" />
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Location</label>
                                        <div class="col-md-10">
                                            <input type="text" name="location" class="form-control" placeholder="Type The Location Name Where You Now"/>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$setlat}}" name="setlat"/>
                                      <input type="hidden" value="{{$setlong}}" name="setlong"/>
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Photo</label>
                                        <div class="col-md-10">
                                            <input type="file" name="proimg"/>
                                        </div>
                                    </div>

                                     <div class="form-group" style="text-align: center; font-size:20px">
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-success">Submit </button>
                                        </div>
                                    </div>

                                </form>
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
