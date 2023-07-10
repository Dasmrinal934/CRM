@extends('backend.layouts.main')

@section('main-section')

 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">May Visit</a></li>
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
                                    <h3 class="panel-title">May Visit</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="50">Cust Id</th>
                                                    <th>Name</th>
                                                    <th width="100">Project</th>
                                                    <th width="100">Location</th>
                                                    <th width="100">Date & Time</th>
                                                    <th width="100">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php for($i=0; $i<100; $i++) { ?>
                                                <tr id="trow_1">
                                                    <td class="text-center">CUS1234567</td>
                                                    <td><strong>MRINAL DAS</strong></td>
                                                    <td>DEVI ABASAN</td>
                                                    <td>NEW TOWN</td>
                                                    <td>20-06-2023 | 10:20 A.M</td>
                                                    <td>
                                                        <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-whatsapp" style="color:green"></span></button>
                                                        <button class="btn btn-danger btn-rounded btn-sm"  ><span class="fa fa-comment"></span></button>
                                                    </td>
                                                </tr>
                                               <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
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

@endsection
