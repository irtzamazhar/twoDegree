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
    <!-- Dragula CSS -->
    <link href="{{ asset('node_modules/dragula/dist/dragula.min.css') }}" rel="stylesheet">
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
    <script src="{{ asset('public/css/dist/js/custom.js') }}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('public/css/dist/js/pages/dashboard.js') }}"></script>
     <!--<script src="{{ asset('public/css/dist/js/demo.js') }}"></script>--> 
    
    <!-- Dragula Library -->
    <script src="{{ asset('node_modules/dragula/dist/dragula.min.js') }}"></script>

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
        
//        $(".droppable").sortable();
//        $("#sortable1").sortable();
//        $("#orogin").sortable();
        $('.box-body .not-save').sortable({
            connectWith: '#my_div .sortable-list'
        });
        
        //Drag and drop
        var a = 1;
        $(".drag .drag_li_listing").each(function(){
            $(this).draggable({
                helper: "clone",
                containment: [0,100,10000,10000],
                appendTo: "body",
                start: function(e, ui){
                    $(ui.helper).addClass("ui-draggable-helper");
                }
            });
        });
        
        $(".droppable .drag_li_listing").each(function(){
            $(this).draggable({
                helper: "clone",
                containment: [0,100,10000,10000],
                appendTo: "body",
                start: function(e, ui){
                    $(ui.helper).addClass("ui-draggable-helper");
                }
            });
        });
//        
//        $( ".not-save" ).droppable({
//            accept: ":not(.ui-sortable-helper)",
//            accept: ".save",
//            drop: function (event, ui) {
//                var q =  $(ui.draggable).attr('id');
//                var result = n.split("_");
//                var w = '#dragged'+result[1];
//
//                $(w).draggable('enable');
//                $(ui.draggable).removeAttr("id");
//                ui.draggable.remove();
//            }
//        });

        $( ".droppable" ).droppable({
            accept: ":not(.ui-sortable-helper)",
            classes: {
                "ui-droppable-active": "ui-state-active",
                "ui-droppable-hover": "ui-state-hover"
            },
            drop: function(event, ui) {
                $( this ).addClass( "ui-state-highlight" );
                var dragItemTitle = ui.draggable.attr("data-menuname");
                var dragItemUrl = ui.draggable.attr("data-pageurl");
                var dropInto = $(this).attr("id");
                if(dropInto == "myheader-menu") {
                    $('.myheader-menu').append("<input value='"+ dragItemTitle +"' name='headerMenuTitle[]' id='headerMenuTitle' type='hidden'>");
                    $('.myheader-menu').append("<input value='"+ dragItemUrl +"' name='headerMenuUrl[]' id='headerMenuUrl' type='hidden'>");
                    console.log(dragItemTitle + " drag into header");
                }else if(dropInto == "myfooter-menu") {
                    $('.myfooter-menu').append("<input value='"+ dragItemTitle +"' name='footerMenuTitle[]' id='footerMenuTitle' type='hidden'>");
                    $('.myfooter-menu').append("<input value='"+ dragItemUrl +"' name='footerMenuUrl[]' id='headerMenuUrl' type='hidden'>");
                    console.log(dragItemTitle + " drag into footer");
                }
                var b = a++;
                var c = 'dragged'+b;
                var m = 'dragged_'+b;
                var targetElem = $(this).attr("id");
                $( ui.draggable ).clone().appendTo( this ).attr("id",m);
                $(ui.draggable).draggable('disable');
                ui.draggable.attr("id",c);
                var d='#dragged'+b;
                var n='#'+m;
//                console.log(n);
                $(n).sortable();
                $(n).draggable({
//                    if(dropInto == $(this))
                    helper: 'original',
                    tolerance: 'fit',
                    containment: [0,100,10000,10000],
                    appendTo: "body",
                    zindex:10000,
                });
                $( ".after_drop" ).droppable({
                    accept: ":not(.ui-sortable-helper)",
                    accept: ".drag_li_listing ",
                    drop: function (event, ui) {
                        var n =  $(ui.draggable).attr('id');
                        var res = n.split("_");
                        var r = '#dragged'+res[1];

                        $(r).draggable('enable');
                        $(ui.draggable).removeAttr("id");
                        ui.draggable.remove();
                    }
               });
            }
        });

    </script>

    
  </body>
</html>