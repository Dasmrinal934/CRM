@extends('backend.layouts.main')

@section('main-section')

            <style>
                   .form-control[disabled], .form-control[readonly] {
                    color: #1e1d1d;
                }
                </style>

                <!-- START BREADCRUMB -->

                <div class="page-content-wrap" style="background-color: #d0e7c1;">
                    <div class="row" style="margin-left: 10px;margin-right: 10px;">
                         <div class="col-md-6">
                            <!-- START DEFAULT FORM ELEMENTS -->
                            <div class="block">
                                <h4>Calling</h4>
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">CUSTOMER ID</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" readonly value="CUS82406123"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">TRANSAION ID</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" readonly value="CT12345678"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">NAME</label>
                                        <div class="col-md-10">
                                            <input type="" class="form-control" readonly value="MRINAL DAS"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">EMAIL</label>
                                        <div class="col-md-10">
                                            <input type="email" class="form-control"  value="liyanns@hmail.com"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">MOBILE</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="1234567890"/>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">PHONE</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="1234567890"/>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">REQURED</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="1234567890"/>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">BUDGET</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" value="1234567890"/>
                                        </div>
                                    </div>

                                    <div class="CALLLATER box">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">DATE</label>
                                        <div class="col-md-10">
                                            <div class="input-group" >
                                                12-06-2023 | 11:20 A.M
                                            </div>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-2 control-label">REMARKS</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" style="background: #c9efb0" readonly rows="5">sdrfsd</textarea>
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
