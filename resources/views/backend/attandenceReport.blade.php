@extends('backend.layouts.main')

@section('main-section')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


                <!-- START BREADCRUMB -->

        <div class="page-content-wrap" style="background-color: #dce5ff;height: 100%;">
          <div class="row" style="margin-left: 10px;margin-right: 10px;">
               <div class="col-md-6">
                    <div class="block">
                       <div class="col-md-12" style="text-align: center; font-size:20px">Attandence Report</div>
</br>
</br>
                                <form enctype="multipart/form-data" method="post" action="{{$url}}">
                                  @csrf
                                     <div class="form-group">
                                       <div class="col-md-6">
                                         <label> From Date</lable>
                                         <input type="date" name="fromdate" >
                                       </div>
                                        <div class="col-md-6">
                                           <label> To Date</lable>
                                         <input type="date" name="todate" >
                                       </div>
                                        <div class="col-md-6">
                                          <button  type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                  </form>
                             </div>
                        </div>
                        @if(!empty($attandence))
                        <div class="page-content-wrap">
                            <!-- START RESPONSIVE TABLES -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">

                                            <h3 class="panel-title">({{$fromdate}} - {{$todate}})</h3>
                                            <a href="{{route('export-pdf',['fdate'=>$fromdate,'tdate'=>$todate])}}" style="float:right"> <button class="btn btn-info">Export PDF</button></a>
                                              <div class="panel-heading">
                                        </div>
                                        <div class="panel-body panel-body-table">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions">
                                                    <thead>
                                                        <tr>
                                                            <th width="50">Date</th>
                                                            <th width="50">Check In</th>
                                                            <th width="100">Checkout</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach($attandence as $row)
                                                          <tr>
                                                            <td> {{$row->Date}}</td>
                                                            <td> {{$row->CheckInTime}}</td>
                                                            <td> {{$row->CheckOutTime}}</td>

                                                          </tr>
                                                          @endforeach
                                                    </tbody>
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
                @else
                <p></p>
                @endif
                    </div>
                </div>
            </div>
        </div>

@endsection
