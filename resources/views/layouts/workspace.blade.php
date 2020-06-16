<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Caspad Transcription Ltd</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="shortcut icon" href="{{ asset('storage/logo/caspad.png') }}" type="image/x-icon" sizes="16x16">

  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
<!--     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" integrity="sha256-ybRkN9dBjhcS2qrW1z+hfCxq+1aBdwyQM5wlQoQVt/0=" crossorigin="anonymous" />
    
  <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <!---datatable --->
    <link href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table-locale-all.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/extensions/export/bootstrap-table-export.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    {{-- header --}}

    @include('inc.header')

    {{-- Sidebar --}}
    @include('inc.workspace_sidebar')
        <div class="content-wrapper">
            @include('inc.messages')
            <div class="content-header">
                <div class="container-fluid">
                    {{-- @include('inc.messages') --}}
                    <div class="row mb-2">
                        <div class="col-sm-3">
                          <h4 class="m-0 text-dark">Dashboard</h4>
                        </div>
                        <div class="col-sm-3">
                          <div class="card-block">
                            <div id="countdown">
                                <div class="well">
                                    <span id="countTime" class="timer bg-success"></span>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Caspad Transcription Ltd</li>
                          </ol>
                        </div>
                    </div>
                    <hr>
                    @yield('content')
                </div>
            </div>
        </div>
    {{-- Footer --}}
    @include('inc.footer')

</div>


<!-- timer start here -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
  setInterval(function time(){
  var d = new Date();
  var hours = 15 - d.getHours();
  var min = 60 - d.getMinutes();
  if((min + '').length == 1){
    min = '0' + min;
  }
  var sec = 60 - d.getSeconds();
  if((sec + '').length == 1){
        sec = '0' + sec;
  }
  jQuery('#countdown #hour').html(hours);
  jQuery('#countdown #min').html(min);
  jQuery('#countdown #sec').html(sec);
}, 1000); });
</script>



<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script>
  var countdown = 900 * 60 * 1000;
  var timerId = setInterval(function(){
    countdown -= 1000;
    var min = Math.floor(countdown / (60 * 1000));
    var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);
    if (countdown <= 0) {
       alert("900 min!");
       clearInterval(timerId);
    } else {
       $("#countTime").html(min + " : " + sec);
    }
  }, 1000);
  </script>
<!-- timer end here -->

<!-- REQUIRED SCRIPTS -->
     <!-- Datatable  -->
 <script type="text/javascript">
   // $('#inactive_accounts2').DataTable().order([0, 'desc']).draw();
   $('#dev-table').dataTable( {
       "aaSorting": [],
       "paging": true
   } );
  </script>
<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>
<script src="{{asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>

<script>
    $(function() {
    $("#num1, #num2").on("keydown keyup", sum);
    $(".num1, .num2").on("keydown keyup", sum);
    function sum() {
    $("#sum").val(Number($("#num1").val()) + Number($("#num2").val()));
    $("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
    $("#mult").val(Number($(".num1").val()) * Number($(".num2").val()));
    }
    });
</script>

<script>
var objectUrl;

$("#audio").on("canplaythrough", function(e){
    var seconds = e.currentTarget.duration;
    var duration = moment.duration(seconds, "seconds");

    var time = "";
    var hours = duration.hours();
    if (hours > 0) { time = hours + ":" ; }

    time = time + duration.minutes() + ":" + duration.seconds();
    //$("#duration").text(time);
    $("#duration").val(time);
    getSeconds(time);

    URL.revokeObjectURL(objectUrl);
});

$("#file").change(function(e){
    var file = e.currentTarget.files[0];

    $("#filename").text(file.name);
    $("#filetype").text(file.type);
    $("#filesize").text(file.size);

    objectUrl = URL.createObjectURL(file);
    $("#audio").prop("src", objectUrl);
});

const totalAmount= document.querySelector('input[name="total_amount"]'); //get total amount input
//add this script before calculating time
//once the you have added this script call this function and pass 'time' as parameter
const getSeconds=(projectLength)=>{
    let videoMetadata= projectLength.split(":"); //this will create an array of atmost 3 items (hrs,min,sec);
    let videoLengthInSeconds=0;
    if (videoMetadata.length>0)
    {
        switch (videoMetadata.length) {
            case 1://this will be seconds assuming the length format is xx for seconds
                videoLengthInSeconds= videoMetadata[0];
                break;
            case 2: //this will be minutes:seconds
                videoLengthInSeconds = (Number(videoMetadata[0])*60)+ Number(videoMetadata[1]);

                //converted to seconds
                break;
            case 3: //this will be hours:minutes:seconds
                videoLengthInSeconds = (Number(videoMetadata[0])*3600) + (Number(videoMetadata[1])*60) + Number(videoMetadata[2]);
                break;
            default:
                throw new Error("Unkown values");
        }
    }
    calc_Amount(videoLengthInSeconds)
};

const calc_Amount=(videoSeconds)=>{
    const AMOUNT_PER_SECOND=0.015;
    // const AMOUNT_PER_SECOND=0.333;
    totalAmount.value= (AMOUNT_PER_SECOND * videoSeconds).toFixed(2);
};


    </script>
</body>
</html>


<style type="text/css">
  @import url(http://fonts.googleapis.com/css?family=Lato:100,400);
  .mb20{
      margin-bottom:20px;
  }
  section {
      padding: 40px 0;
  }
  #timer .countdown-wrapper {
      margin: 0 auto;
  }
  #timer #countdown {
      font-family: 'Lato', sans-serif;
      text-align: center;
      color: #eee;
      text-shadow: 1px 1px 5px black;
      padding: 40px 0;
  }
  #timer .countdown-wrapper #countdown .timer {
      margin: 10px;
      padding: 20px;
      font-size: 90px;
      border-radius: 50%;
      cursor: pointer;
  }
  #timer .col-md-4.countdown-wrapper #countdown .timer {
      margin: 10px;
      padding: 20px;
      font-size: 35px;
      border-radius: 50%;
      cursor: pointer;
  }
  #timer .countdown-wrapper #countdown #hour {
      -webkit-box-shadow: 0 0 0 5px rgba(92, 184, 92, .5);
      -moz-box-shadow: 0 0 0 5px rgba(92, 184, 92, .5);
      box-shadow: 0 0 0 5px rgba(92, 184, 92, .5);
  }
  #timer .countdown-wrapper #countdown #hour:hover {
      -webkit-box-shadow: 0px 0px 15px 1px rgba(92, 184, 92, 1);
      -moz-box-shadow: 0px 0px 15px 1px rgba(92, 184, 92, 1);
      box-shadow: 0px 0px 15px 1px rgba(92, 184, 92, 1);
  }
  #timer .countdown-wrapper #countdown #min {
      -webkit-box-shadow: 0 0 0 5px rgba(91, 192, 222, .5);
      -moz-box-shadow: 0 0 0 5px rgba(91, 192, 222, .5);
      box-shadow: 0 0 0 5px rgba(91, 192, 222, .5);
  }
  #timer .countdown-wrapper #countdown #min:hover {
      -webkit-box-shadow: 0px 0px 15px 1px rgb(91, 192, 222);
      -moz-box-shadow: 0px 0px 15px 1px rgb(91, 192, 222);
      box-shadow: 0px 0px 15px 1px rgb(91, 192, 222);
  }
  #timer .countdown-wrapper #countdown #sec {
      -webkit-box-shadow: 0 0 0 5px rgba(2, 117, 216, .5);
      -moz-box-shadow: 0 0 0 5px rgba(2, 117, 216, .5);
      box-shadow: 0 0 0 5px rgba(2, 117, 216, .5)
  }
  #timer .countdown-wrapper #countdown #sec:hover {
      -webkit-box-shadow: 0px 0px 15px 1px rgba(2, 117, 216, 1);
      -moz-box-shadow: 0px 0px 15px 1px rgba(2, 117, 216, 1);
      box-shadow: 0px 0px 15px 1px rgba(2, 117, 216, 1);
  }
  #timer .countdown-wrapper .card .card-footer .btn {
      margin: 2px 0;
  }
  @media (min-width: 992px) and (max-width: 1199px) {
      #timer .countdown-wrapper #countdown .timer {
          margin: 10px;
          padding: 20px;
          font-size: 65px;
          border-radius: 50%;
          cursor: pointer;
      }
  }
  @media (min-width: 768px) and (max-width: 991px) {
       #timer .countdown-wrapper #countdown .timer {
          margin: 10px;
          padding: 20px;
          font-size: 72px;
          border-radius: 50%;
          cursor: pointer;
      }
  }
  @media (max-width: 768px) {
      #timer .countdown-wrapper #countdown .timer {
          margin: 10px;
          padding: 20px;
          font-size: 73px;
          border-radius: 50%;
          cursor: pointer;
      }
  }
  @media (max-width: 767px) {
      #timer .countdown-wrapper #countdown #hour,
      #timer .countdown-wrapper #countdown #min,
      #timer .countdown-wrapper #countdown #sec {
          font-size: 60px;
          border-radius: 4%;
      }
  }
  @media (max-width: 576px){
      #timer .countdown-wrapper #countdown #hour,
      #timer .countdown-wrapper #countdown #min,
      #timer .countdown-wrapper #countdown #sec {
          font-size: 25px;
          border-radius: 4%;
      }
      #timer .countdown-wrapper #countdown .timer {
          padding: 13px;
      }
  }
</style>
