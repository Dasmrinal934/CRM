 <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{url('/logout-user')}}" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
<button class="btn btn-info" onclick="history.back()">Go Back</button>
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="{{url('frontend/audio/alert.mp3')}}" preload="auto"></audio>
        <audio id="audio-fail" src="{{url('frontend/audio/fail.mp3')}}" preload="auto"></audio>
        <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{url('frontend/js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/bootstrap/bootstrap.min.js')}}"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src="{{url('frontend/js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
                <script type="text/javascript" src="{{url('frontend/js/plugins/bootstrap/bootstrap-timepicker.min.js')}}"></script>

        <script type="text/javascript" src="{{url('frontend/js/plugins/morris/raphael-min.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/morris/morris.min.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/owl/owl.carousel.min.js')}}"></script>

        <script type="text/javascript" src="{{url('frontend/js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
<!--         <script type="text/javascript" src="{{url('frontend/js/settings.js')}}"></script>
 -->
        <script type="text/javascript" src="{{url('frontend/js/plugins.js')}}"></script>
        <script type="text/javascript" src="{{url('frontend/js/actions.js')}}"></script>

        <script type="text/javascript" src="{{url('frontend/js/demo_dashboard.js')}}"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    </body>
</html>
