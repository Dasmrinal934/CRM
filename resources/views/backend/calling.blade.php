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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>
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
               @foreach($data as $row)
                <div class="page-content-wrap" style="background-color: #dce5ff;">
                    <div class="row" style="margin-left: 10px;margin-right: 10px;">
                         <div class="col-md-6">
                            <!-- START DEFAULT FORM ELEMENTS -->
                            <div class="block">
                                <div class="col-md-12" style="text-align: center; font-size:20px">Calling</div>
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">CUSTOMER ID</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" readonly value="{{$row->CustId}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">TRANSAION ID</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" readonly value="{{$row->TransId}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">NAME</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" readonly value="{{$row->Customer}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">EMAIL</label>
                                        <div class="col-md-10">
                                            <input type="email" class="form-control"  value="{{$row->CustEmail}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">MOBILE</label>
                                        <div class="col-md-10">
                                                <a href="{{route('call-number',['Mobile'=>Crypt::encrypt($row->Mobile),'tid'=>Crypt::encrypt($row->TransId)])}}" type="button" class="btn btn-info" style="font-size:24px; padding: 0px 1px;background-color: #2d86a1;">9xxxxxxx1
                                                <i class="fa fa-phone" style="font-size:34px;color: #4ff54f;"> </i>
                                              </a>
                                        </div>

                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">PHONE</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="{{$row->Phone}}"/>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">REQURED</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="{{$row->Require}}"/>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">BUDGET</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="{{$row->Budget}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">STATUS</label>
                                        <div class="col-md-10">
                                            <select class="form-control " data-style="btn-success">
                                                <option>SELECT FEEDBACK</option>
                                                <!-- <option value="APPLICATION">APPLICATION</option>
                                                <option value="BUDGET LOW">BUDGET LOW</option> -->
                                                <option value="INTERESTED">INTERESTED</option>
                                                <option value="CALLLATER">CALL LATER</option>
                                                  <option value="NOT INTERESTED">NOT INTERESTED</option>
                                                <!-- <option value="CHANGE LOCATION">CHANGE LOCATION</option>
                                                <option value="HOT LEAD">HOT LEAD</option>
                                                <option value="MAY VISIT ON">MAY VISIT ON</option>

                                                <option value="OUT OF CITY">OUT OF CITY</option>
                                                <option value="SWITCH OFF">SWITCH OFF</option>
                                                <option value="VISITED">VISITED</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="CALLLATER box">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">DATE</label>
                                        <div class="col-md-10">
                                            <div class="input-group" >
                                                <input type="date" class="form-control"  id="dp-4" data-date="" data-date-format="" data-date-viewmode="months"/>
                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">TIME</label>
                                        <div class="col-md-10">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" class="form-control timepicker"/>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label class="col-md-2 control-label"> PREVIOUS REMARKS</label>
                                   <div class="col-md-10">
                                       <textarea class="form-control" readonly rows="3" style="background-color: #dfdff5;color: #141414">{{$row->Remarks}}</textarea>
                                   </div>
                               </div>
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">REMARKS</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="5"></textarea>
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
                @endforeach
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

@endsection
