
@extends('index')

@section('title', 'Content')

@section('content')
<script type="text/javascript">
       if (typeof $.cookie('tokenId') === 'undefined' && typeof $.cookie('tokenUsername') === 'undefined'){
        //no cookie         
       window.location.href = "/";
        
    }
</script>
<style type="text/css">
		  	#myImg {
		    border-radius: 5px;
		    cursor: pointer;
		    transition: 0.3s;
		}

		#myImg:hover {opacity: 0.7;}

		/* The Modal (background) */
		.modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    padding-top: 100px; /* Location of the box */
		    left: 0;
		    top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}

		/* Modal Content (Image) */
		.modal-content {
		    margin: auto;
		    display: block;
		    width: 80%;
		    max-width: 700px;
		}

		/* Caption of Modal Image (Image Text) - Same Width as the Image */
		#caption {
		    margin: auto;
		    display: block;
		    width: 80%;
		    max-width: 700px;
		    text-align: center;
		    color: white;
		    padding: 10px 0;
		    height: 150px;
		}

		/* Add Animation - Zoom in the Modal */
		.modal-content, #caption { 
		    -webkit-animation-name: zoom;
		    -webkit-animation-duration: 0.6s;
		    animation-name: zoom;
		    animation-duration: 0.6s;
		}

		@-webkit-keyframes zoom {
		    from {-webkit-transform:scale(0)} 
		    to {-webkit-transform:scale(1)}
		}

		@keyframes zoom {
		    from {transform:scale(0)} 
		    to {transform:scale(1)}
		}

		/* The Close Button */
		.close1 {
		    position: absolute;
		    top: 15px;
		    right: 35px;
		    color: #f1f1f1;
		    font-size: 40px;
		    font-weight: bold;
		    transition: 0.3s;
		}

		.close1:hover,
		.close1:focus {
		    color: #bbb;
		    text-decoration: none;
		    cursor: pointer;
		}

		/* 100% Image Width on Smaller Screens */
		@media only screen and (max-width: 700px){
		    .modal-content {
		        width: 100%;
		    }
		}
</style>
 <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close1" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01" src="{{URL::asset('images/Capture.PNG')}}">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
<!-- Main Wrapper -->
<div id="wrapper">

    <div class="content animate-panel">
      
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            
                        </div>
                       <div class="row">
			            <div class="col-lg-12 text-center m-t-md">
			                <h2>
			                   Registration Form
			                </h2>
			                  @if(Session::get('msg_ok'))
							         <div class="alert alert-success">
							             <a  class="close" data-dismiss="alert" aria-label="close">&times;</a>
							             {{ session('msg_ok') }}
							            
							         </div>
							 @endif
							 @if(Session::get('msg_notok'))
							         <div class="alert alert-danger">
							             <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
							             {{ session('msg_notok') }}
							            
							         </div>
							 @endif

			            </div>
			             {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
						        <div class="row">
						        
						           <div class="col-xs-12 col-sm-12 col-md-12">

						                <div class="form-group">
						                    {!! Form::label('sample_file','Select csv file to upload Multiple Customers',['class'=>'col-md-3']) !!}
						                    <div class="col-md-6">
						                    {!! Form::file('sample_file', array('class' => 'form-control')) !!}
						                    
						                    {!! $errors->first('sample_file', '<p class="alert alert-danger">:message</p>') !!}
						                    </div>
						                </div>
						            </div>
						            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
						            {!! Form::submit('Upload CSV',['class'=>'btn btn-primary']) !!}
						             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">View csv content format</button>
						            </div>
						           
						        </div>
						 {!! Form::close() !!}
			        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                           <div class="register-container">
							    <div class="row">
							        <div class="col-md-12">
							          
							            <div class="hpanel">
							                <div class="panel-body">
							                        <form action="#" id="loginForm">
							                            <div class="row">
							                            <div class="form-group col-lg-12">
							                                <label>Name</label>
							                                <input type="text" value="" id="name" class="form-control" name="name" placeholder="Provide name .. ">
							                            </div>
							                         <!--    <div class="form-group col-lg-6">
							                                <label>Password</label>
							                                <input type="password" value="" id="password" class="form-control" name="password" placeholder="type your password">
							                            </div> -->
							                            <div class="form-group col-lg-6">
							                                <label>Email</label>
							                                <input type="text" value="" id="email" class="form-control" name="email" placeholder="provide email ..">
							                            </div>
							                            <div class="form-group col-lg-6">
							                                <label>company_name</label>
							                                <input type="text" value="" id="company_name" class="form-control" name="company_name" placeholder="provide name">
							                            </div>
							                            <div class="form-group col-lg-6">
							                                <label>company_state</label>
							                                <input type="text" value="" id="company_state" class="form-control" name="company_state" placeholder="provide state..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>company_address</label>
							                                <input type="text" value="" id="company_address" class="form-control" name="company_address" placeholder="provide address..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>phone</label>
							                                <input type="text" value="" id="phone" class="form-control" name="phone" placeholder="provide phine number..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>cin</label>
							                                <input type="text" value="" id="cin" class="form-control" name="cin" placeholder="provide cin ..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>gistin</label>
							                                <input type="text" value="" id="gistin" class="form-control" name="gistin" placeholder="provide gistin..">
							                            </div>
							                         
							                            </div>
							                            <div class="text-center">
							                                <button type="button" id="submitCustomer" class="btn btn-success">Register</button>
							                                <button class="btn btn-default">Cancel</button>
							                            </div>
							                        </form>
							                </div>
							            </div>
							        </div>
							    </div>
	   							<div class="row">
								       
								</div>
							</div> 
                        </div>
                    </div>
                    <div class="panel-footer">
                   
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

</body>
<script src="app/js/addUser.js"></script>
<!-- Mirrored from webapplayers.com/homer_admin-v1.8/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Dec 2015 17:42:05 GMT -->
</html>
@endsection