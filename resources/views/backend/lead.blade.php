@extends('backend.layouts.main')
@section('main-section')

 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Lead</a></li>
                    <li class="active">Active</li>
                </ul>
                <ul class="breadcrumb" style="display: inline-block; text-align: right;">
                   <a href="{{url('all-leads')}}"><button class="btn btn-primary" >All Lead</button></a>

                <!-- END BREADCRUMB -->
               <!--
                <div class="page-title" style="text-align: center;">
                    <h2 ><span class="fa fa-arrow-circle-o"></span> All Lead</h2>
                </div>
                 -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row" >
                {{ $data->links('custom-pagination') }}
                </div>
                <div class="page-content-wrap">
                    <!-- START RESPONSIVE TABLES -->
                  @foreach($data as $row)

                        <a href="{{route('call-details',['id'=>Crypt::encrypt($row->CustId),'tid'=>Crypt::encrypt($row->TransId),'mobile'=>Crypt::encrypt($row->Mobile),'UserId'=>Session::get('UserId')])}}">

                    <div class="row" style="background: #a9a9a9; margin-left: -6px;margin-right: -6px;">
                         <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';" style="background: #f5f5e1;">
                               <!--  <div class="widget-item-left"> -->
                                   <!--  <span class="fa fa-id-card-o"></span> -->
                                   <div class="widget-title" style="display: inline-block; text-align: left; margin-left: 10px;">
                                    <i class="fa fa-id-card-o" style="color:blue"></i> : {{$row->CustId}}</div>
                                    <div class="widget-title " style="display: inline-block; text-align: right;margin-left: -10px;"><i class="fa fa-user" style="color:#af854c" ></i> : {{$row->Customer}}</div>
                                    <div class="widget-title" style="display: inline-block; text-align: left;margin-left: 10px;"><i class="fa fa-building" style="color:green" ></i> : {{$row->ProjectName}}</div>
                                    <div class="widget-title " style="display: inline-block; text-align: right; margin-left: -10px;"><i class="fa fa-map-marker" style="color:red"></i> : {{$row->Area}}</div>



                            </div>
                    </div>
                </a>
                  @endforeach
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


                <div class="row" style="display: inline-block; text-align: right;">
                {{ $data->links('custom-pagination') }}

               </div>

                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
<!-- START Footer section -->

@endsection
