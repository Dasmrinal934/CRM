
@php $empdetails=Session::get('empdetails') @endphp
<div class="page-sidebar" >

                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                   <!-- style="  position: fixed;" -->
                    <li class="xn-logo">
                        <a href="{{url('')}}">Liyaans Properties</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                          @if($empdetails->UserPhoto!="")
                          <img class="rounded-circle mt-7" src="{{url('frontend/assets/images/users/'.$empdetails->UserPhoto)}}" width="90">
                          @else
                          <img class="rounded-circle mt-7" src="{{url('frontend/assets/images/users/avatar.jpg')}}" width="90">
                          @endif
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                              @if($empdetails->UserPhoto!="")
                              <img class="rounded-circle mt-7" src="{{url('frontend/assets/images/users/'.$empdetails->UserPhoto)}}" width="90">
                              @else
                              <img class="rounded-circle mt-7" src="{{url('frontend/assets/images/users/avatar.jpg')}}" width="90">
                              @endif
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{Session::get('UserName')}}</div>
                                <div class="profile-data-title">{{$empdetails->Department}}</div>
                            </div>
                            <div class="profile-controls">
                                <a href="{{url('edit-user')}}" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>
                    </li>
                    <li class="xn-title"></li>
                    <li class="active">
                        <a href="{{url('')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                     <li>
                        <a href="{{url('leads')}}"><span class="fa fa-database" style="color:#f78c8c"></span> <span class="xn-text">Lead</span></a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-user" style="color:#a1a7f7;"></span> <span class="xn-text">Customer</span></a>
                    </li>
                    <li>
                        <a href="{{url('show-called-clients')}}"><span class="fa fa-eye" style="color:#00c903;"></span> <span class="xn-text">Show</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="tables.html"><span class="fa fa-table"></span> <span class="xn-text">Tables</span></a>
                        <ul>
                            <li><a href="table-basic.html"><span class="fa fa-align-justify"></span> Basic</a></li>
                            <li><a href="table-datatables.html"><span class="fa fa-sort-alpha-desc"></span> Data Tables</a></li>
                            <li><a href="table-export.html"><span class="fa fa-download"></span> Export Tables</a></li>
                        </ul>
                    </li>
                     <li class="xn-openable">
                        <a href="#"><span class="fa fa-bus" style="color:#7aff98;"></span> <span class="xn-text">Visit</span></a>
                        <ul>
                            <li><a href="{{url('upcomming-visits')}}"><span class="fa fa-taxi" style="color:#ffff1e;"></span> May Visit</a></li>
                            <li><a href="{{url('visited-clients')}}"><span class="fa fa-taxi" style="color:#00ad00;"></span> Visited</a></li>

                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-pdf-o " style="color:red"></span> <span class="xn-text">Report</span></a>
                        <ul>
                            <li><a href="today-call"><span class="fa fa-align-justify"></span> Today Call</a></li>
                            <li><a href="today-ni"><span class="fa fa-sort-alpha-desc"></span> Today N.I</a></li>
                            <li><a href="{{url('today-cl')}}"><span class="fa fa-sort-alpha-desc"></span> Today C.L</a></li>

                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span>  <img src="{{url('frontend/img/machine.png')}}" width="25px" alt="User Name"/></span> <span class="xn-text">Attendance</span></a>
                        <ul>
                            <li><a href="{{url('get-location/set-location')}}"><span class="fa fa-map-marker" style="color: #f951e3;"></span>Set Location</a></li>
                            <li><a href="{{url('get-location/attandence')}}"><span>  <img src="{{url('frontend/img/finger9.jpeg')}}" width="30px" alt="" style="border-radius: 50%;"/></span> Today Attendance</a></li>
                            <li><a href="{{url('Attandence-Report')}}"><span class="fa fa-file-pdf-o " style="color:red"></span> Attandence Report</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-exchange" style="color:#ffff09;"></span> <span class="xn-text">Transfer</span></a>
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->

            </div>
            <!-- END PAGE SIDEBAR -->
