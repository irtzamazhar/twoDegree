<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>TwoDegree Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- My Custom stylesheet -->
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
    <!-- JQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Bootstrap 3.3.2 -->   
    <link href="{{ asset('public/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- FontAwesome 4.3.0 -->    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="{{ asset('public/css/dist/css/AdminLTE.css') }}" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('public/css/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('public/css/plugins/iCheck/flat/blue.css') }}" rel="stylesheet">
    <!-- Morris chart -->
    <link href="{{ asset('public/css/plugins/morris/morris.css') }}" rel="stylesheet">
    <!-- jvectormap -->
    <link href="{{ asset('public/css/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
    <!-- Date Picker -->
    <link href="{{ asset('public/css/plugins/datepicker/datepicker3.css') }}" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="{{ asset('public/css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{ asset('public/css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
  </head>
  <body class="skin-blue sidebar-mini">
    <!--  wrapper -->
        <div id="wrapper">
        <!-- navbar top -->
        @include('admin.include.header')
        <!-- end navbar top -->
        
        <!-- navbar side -->
        @include('admin.include.sidebar')
        <!-- end navbar side -->
    
        @yield('content')
        @include('admin.include.footer')

        @include('admin.include.controlsidebar')
        </div>

    <!-- jQuery 2.1.3 -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- jQuery UI 1.11.2 -->
   
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('public/css/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    
    <script src="{{ asset('public/css/plugins/morris/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('public/css/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('public/css/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('public/css/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('public/css/plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('public/css/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('public/css/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('public/css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('public/css/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('public/css/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('public/css/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/css/dist/js/app.min.js') }}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('public/css/dist/js/pages/dashboard.js') }}"></script>
    <!-- <script src="{{ asset('public/css/dist/js/demo.js') }}"></script> -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('ul.sidebar-menu > li').click(function (e) {
                e.preventDefault();
                $('ul.sidebar-menu > li').removeClass('active');
                $(this).addClass('active');                
            });
        });
        $(window).load(function(){
            setTimeout(function(){ $('.my-message').fadeOut() }, 2000);
        });
        
        $( "#draggable p" ).draggable({
            drag: function(){
                pos = $(this).offset();
                parent = $(".droppable").offset();
//                current = {left: pos.left - parent.left, top: pos.top - parent.top };
//                $("#pos").html( current.left + ', ' + current.top );
            }
        });
        $( ".droppable" ).droppable({
            accept: ".my_div",
            activeClass: "ui-state-hover",
            hoverClass: "ui-state-active",
            
            drop: function () {
                var dropData =  $(this).append(ui.draggable);

            }
        }); 
    </script>

    
  </body>
</html>