
@extends('index')

@section('title', 'Content')

@section('content')
<script type="text/javascript">
       if (typeof $.cookie('tokenId') === 'undefined' && typeof $.cookie('tokenUsername') === 'undefined'){
        //no cookie         
       window.location.href = "/";
        
    } 
</script>

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                <h2>
                    Welcome to Dashboard
                </h2>

                <p>
                   
                </p>
            </div>
        </div>
       
       
    </div>
    <div class="content animate-panel">

        <div class="row">
            <div class="col-lg-3" style="">
                <div class="hpanel">
                    <div class="panel-body text-center h-200">
                       

                        <h1 class="m-xs">{{$data}}</h1>

                        <h3 class="font-extra-bold no-margins text-success">
                            Invoice Id Created
                        </h3>
                        <small>All Created Invoices Id Count</small>
                    </div>
                    <div class="panel-footer">
                        This is standard panel footer
                    </div>
                </div>
            </div>
            <div class="col-lg-3" style="">
                <div class="hpanel">
                    <div class="panel-body text-center h-200">
                       

                        <h1 class="m-xs">{{$company}}</h1>

                        <h3 class="font-extra-bold no-margins text-success">
                            Companys Registered
                        </h3>
                        <small>All Registered Company Count</small>
                    </div>
                    <div class="panel-footer">
                        This is standard panel footer
                    </div>
                </div>
            </div>
            
            
           
        </div>

       
    </div>

   

    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            Example text
        </span>
        Company 2015-2020
    </footer>

</div>

<script type="text/javascript">
    function logout(){
    
     $.removeCookie("tokenId", { path: '/' });
     $.removeCookie("tokenUsername", { path: '/' });
     $.removeCookie("tokenId");
     $.removeCookie("tokenUsername");
     window.location.href = "/login";
}
</script>
@endsection