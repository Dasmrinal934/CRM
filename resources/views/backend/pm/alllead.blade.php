@extends('backend.layouts.main')

@section('main-section')
<style>
a {
    color: #141414;
    text-decoration: none;
}
</style>
 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">All Lead</a></li>
                    <li class="active">Active</li>
                </ul>
                <!-- END BREADCRUMB -->
               <!--
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> All Lead</h2>
                </div>     -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">All Lead</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="50">Cust Id</th>
                                                    <th width="50">Name</th>
                                                    <th width="100">Project</th>
                                                    <th width="100">Location</th>
                                                    <th width="100">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($data as $row)

                                             <tr id="trow_1">
                                                  <td class="text-center">  <a href="{{route('call-details',['id'=>Crypt::encrypt($row->CustId),'tid'=>Crypt::encrypt($row->TransId),'mobile'=>Crypt::encrypt($row->Mobile),'UserId'=>Session::get('UserId')])}}">
                                                    {{$row->CustId}}</a></td>
                                                    <td><strong><a href="{{route('call-details',['id'=>Crypt::encrypt($row->CustId),'tid'=>Crypt::encrypt($row->TransId),'mobile'=>Crypt::encrypt($row->Mobile),'UserId'=>Session::get('UserId')])}}">
                                                      {{$row->Customer}}</a></strong></td>
                                                    <td><a href="{{route('call-details',['id'=>Crypt::encrypt($row->CustId),'tid'=>Crypt::encrypt($row->TransId),'mobile'=>Crypt::encrypt($row->Mobile),'UserId'=>Session::get('UserId')])}}">
                                                      {{$row->ProjectName}}</a></td>
                                                    <td><a href="{{route('call-details',['id'=>Crypt::encrypt($row->CustId),'tid'=>Crypt::encrypt($row->TransId),'mobile'=>Crypt::encrypt($row->Mobile),'UserId'=>Session::get('UserId')])}}">
                                                      {{$row->Area}}</a></td>
                                                    <td>
                                                        <button class="btn btn-default btn-rounded btn-sm"><a href="https://api.whatsapp.com/send?phone={{$row->Mobile}}&text=Hi sir/madam My Name is {{Session::get('UserName')}}, I’m the Project Manager of Liyaans Properties">
                                                          <span class="fa fa-whatsapp" style="color:green"></span></a></button>
                                                        <button class="btn btn-danger btn-rounded btn-sm">
                                                          <a href="sms:{{$row->Mobile}}" style="color: #f10200;"> <span class="fa fa-comment"> </span>
                                                           </a>
                                                         </button>
                                                    </td>
                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
