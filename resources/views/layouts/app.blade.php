<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Invoicing | Admin Panel</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{URL::asset('vendor/fontawesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('vendor/metisMenu/dist/metisMenu.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('vendor/animate.css/animate.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('vendor/bootstrap/dist/css/bootstrap.css')}}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{URL::asset('fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('fonts/pe-icon-7-stroke/css/helper.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('styles/style.css')}}">


    <!-- Vendor scripts -->
    <script src="{{URL::asset('vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{URL::asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{URL::asset('vendor/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{URL::asset('vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('vendor/jquery-flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('vendor/jquery-flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('vendor/jquery-flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('vendor/flot.curvedlines/curvedLines.js')}}"></script>
    <script src="{{URL::asset('vendor/jquery.flot.spline/index.js')}}"></script>
    <script src="{{URL::asset('vendor/metisMenu/dist/metisMenu.min.js')}}"></script>
    <script src="{{URL::asset('vendor/iCheck/icheck.min.js')}}"></script>
    <script src="{{URL::asset('vendor/peity/jquery.peity.min.js')}}"></script>
    <script src="{{URL::asset('vendor/sparkline/index.js')}}"></script>
   

    <!-- App scripts -->
    <script src="{{URL::asset('scripts/homer.js')}}"></script>
    <script src="{{URL::asset('scripts/charts.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
   
    
    <script type="text/javascript" src="{{URL::asset('app/jquery.validate.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css')}}" />
    
    <script src="{{URL::asset('app/jquery.cookie.js')}}"></script>
    <style>
.loader {
 position: fixed;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #62cb31;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 1s linear infinite;
 
}

.bodyLoaderWithOverlay{
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 9999;
    background-color: #000;
    filter: alpha(Opacity=80);
    opacity: .8;
    display: none;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<div class="bodyLoaderWithOverlay">
    <div class="text-center">
      <div class="loader"></div>
    </div>
</div>


</head>