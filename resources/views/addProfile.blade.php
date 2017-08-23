
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
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            
                        </div>
                       <div class="row">
			            <div class="col-lg-12 text-center m-t-md">
			                <h2>
			                  Profile Form
			                </h2>

			            </div>
			        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                           <div class="register-container">
							    <div class="row">
							        <div class="col-md-12">
							          
							            <div class="hpanel">
							                <div class="panel-body">
							                @if(sizeof($data) != 0 )
							                        <form action="#" id="profile">
							                            <div class="row">
							                            <div class="form-group col-lg-12">
							                                <label>Name</label>
							                                 <input type="hidden" value="{{$data[0]->id}}" id="id" name="id">
							                                <input type="text" value="{{$data[0]->name}}" id="name" class="form-control" name="name" placeholder="Provide name .. ">
							                            </div>
							                         <!--    <div class="form-group col-lg-6">
							                                <label>Password</label>
							                                <input type="password" value="" id="password" class="form-control" name="password" placeholder="type your password">
							                            </div> -->
							                            <div class="form-group col-lg-6">
							                                <label>Email</label>
							                                <input type="text" value="{{$data[0]->email}}" id="email" class="form-control" name="email" placeholder="provide email ..">
							                            </div>
							                            <div class="form-group col-lg-6">
							                                <label>company_name</label>
							                                <input type="text" value="{{$data[0]->company_name}}" id="company_name" class="form-control" name="company_name" placeholder="provide name">
							                            </div>
							                            <div class="form-group col-lg-6">
							                                <label>company_state</label>
							                                <input type="text" value="{{$data[0]->company_state}}" id="company_state" class="form-control" name="company_state" placeholder="provide state..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>company_address</label>
							                                <input type="text" value="{{$data[0]->company_address}}" id="company_address" class="form-control" name="company_address" placeholder="provide address..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>phone</label>
							                                <input type="text" value="{{$data[0]->phone}}" id="phone" class="form-control" name="phone" placeholder="provide phine number..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>cin</label>
							                                <input type="text" value="{{$data[0]->cin}}" id="cin" class="form-control" name="cin" placeholder="provide cin ..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>gistin</label>
							                                <input type="text" value="{{$data[0]->gistin}}" id="gistin" class="form-control" name="gistin" placeholder="provide gistin..">
							                            </div>
							                            <div class="form-group col-lg-6">
							                                <label>bank_name</label>
							                                <input type="text" value="{{$data[0]->bank_name}}" id="bank_name" class="form-control" name="bank_name" placeholder="provide bank name..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>account_no</label>
							                                <input type="text" value="{{$data[0]->account_no}}" id="account_no" class="form-control" name="account_no" placeholder="provide account no..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>ifsc_code</label>
							                                <input type="text" value="{{$data[0]->ifsc_code}}" id="ifsc_code" class="form-control" name="ifsc_code" placeholder="provide ifsc code .. ">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>account_name</label>
							                                <input type="text" value="{{$data[0]->account_name}}" id="account_name" class="form-control" name="account_name" placeholder="provide account name..">
							                            </div>
							                           <!--  <div class="checkbox col-lg-12">
							                                <input type="checkbox" class="i-checks" checked>
							                                Sigh up for our newsletter
							                            </div> -->
							                            </div>
							                            <div class="text-center">
							                                <button type="button" id="updateProfile" class="btn btn-success">Update</button>
							                                
							                            </div>
							                        </form>
							                 @else
							                 		<form action="#" id="profile">
							                            <div class="row">
							                            <div class="form-group col-lg-12">
							                                <label>Name</label>
							                                 <input type="hidden" value="1" id="owner_id" class="form-control" name="owner_id" placeholder="Provide name .. ">
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
							                            <div class="form-group col-lg-6">
							                                <label>bank_name</label>
							                                <input type="text" value="" id="bank_name" class="form-control" name="bank_name" placeholder="provide bank name..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>account_no</label>
							                                <input type="text" value="" id="account_no" class="form-control" name="account_no" placeholder="provide account no..">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>ifsc_code</label>
							                                <input type="text" value="" id="ifsc_code" class="form-control" name="ifsc_code" placeholder="provide ifsc code .. ">
							                            </div>
							                             <div class="form-group col-lg-6">
							                                <label>account_name</label>
							                                <input type="text" value="" id="account_name" class="form-control" name="account_name" placeholder="provide account name..">
							                            </div>
							                           <!--  <div class="checkbox col-lg-12">
							                                <input type="checkbox" class="i-checks" checked>
							                                Sigh up for our newsletter
							                            </div> -->
							                            </div>
							                            <div class="text-center">
							                                <button type="button" id="submitProfile" class="btn btn-success">Register</button>
							                                <button class="btn btn-default">Cancel</button>
							                            </div>
							                        </form>
							                 @endif
							                </div>
							            </div>
							        </div>
							    </div>
	   							<div class="row">
								      <!--   <div class="col-md-12 text-center">
								            <strong>HOMER</strong> - AngularJS Responsive WebApp <br/> 2015 Copyright Company Name
								        </div> -->
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