@extends('backend.layouts.main')
@section('main-section')

 <!-- START BREADCRUMB -->
 <style type="text/css">
 div.section
 {
     border: 1px solid black;
 }
 div.section div:nth-of-type(even)
 {
     color: Green;
 }
 div.section div:nth-of-type(odd)
 {
     color: Red;
 }
 .widget.widget-item-icon {
   padding: 7px;
}
 </style>

                <ul class="breadcrumb">
                    <li><a href="#">Called</a></li>
                    <li class="active">Active</li>
                </ul>
                <ul class="breadcrumb" style="display: inline-block; text-align: right;">
                   <a href="{{url('pm/all-leads')}}"><button class="btn btn-primary" >Called</button></a>

                <!-- END BREADCRUMB -->
               <!--
                <div class="page-title" style="text-align: center;">
                    <h2 ><span class="fa fa-arrow-circle-o"></span> All Lead</h2>
                </div>
                 -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <!-- START RESPONSIVE TABLES -->

                    <?php for($i=0; $i<10; $i++) { ?>
                        <a href="{{url('pm/show-details-clients')}}">
                    <div class="row" id="row" style="background: #adeef1; margin-left: 6px;margin-right: 6px;">
                         <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';" style="background: #e3e3e3; color: #328d05">
                               <!--  <div class="widget-item-left"> -->
                                   <!--  <span class="fa fa-id-card-o"></span> -->

                                    <h6 style="display: inline-block; text-align: left;" >
                                      <i class="fa fa-calendar" style="color:#b720e7"></i> : 23-26-2023</h6>
                                      <h6  style="display: inline-block; text-align: right;">
                                        <i class="fa fa-clock-o" style="color:red"></i> : 11:20 A.M </h6>

                                   <div class="widget-title" style="display: inline-block; text-align: left;">
                                    <i class="fa fa-id-card-o" style="color:blue"></i> : cus12345678</div>
                                    <div class="widget-title " style="display: inline-block; text-align: right;"><i class="fa fa-phone" style="color:#af854c" ></i> : Call Latter</div>
                                    <div class="widget-title" style="display: inline-block; text-align: left;"><i class="fa fa-sticky-note-o" style="color:#8731f7" ></i> :
                                      <textarea style="width: 300px;
  height: 100px; background: #e5e4ba;"> I get the information fine from the DB, but im not sure how to echo the ALL the data into a SINGLE text field..</textarea></div>
                                    <!-- <div class="widget-title " style="display: inline-block; text-align: right;"><i class="fa fa-map-marker" style="color:red"></i> : Newtown</div> -->



                            </div>
                    </div>
                </a>
                   <?php } ?>
                    <!-- END RESPONSIVE TABLES -->

                    <!-- <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel Title</h3>
                                </div>
                                <div class="panel-body">
                                    Panel body
                                </div>
                            </div>

                        </div>
                    </div>
                 -->
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
<!-- START Footer section -->

@endsection
