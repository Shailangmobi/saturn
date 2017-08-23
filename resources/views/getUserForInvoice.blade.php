@extends('index')

@section('title', 'Content')

@section('content')
<script src="app/js/invoice.js"></script>
<script type="text/javascript">
       if (typeof $.cookie('tokenId') === 'undefined' && typeof $.cookie('tokenUsername') === 'undefined'){
        //no cookie         
       window.location.href = "/";
        
    } 
</script>

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
			                   Search Company
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
							                        <form id="searchForm">
							                            <div class="row">
							                           
								                            <div class="input-group">
								                                <input class="form-control" type="text" id="query" name="query" placeholder="Search projects..">
								                                <div class="input-group-btn">
								                                    <button type="button" id="search" onclick="getCompanyDetails();" class="btn btn-default"><i class="fa fa-search"></i></button>
								                                </div>
								                            </div>
								                        
							                            </div>
							                           
							                        </form>
							                </div>
							            </div>
							        </div>
							    </div>
	   							<div class="row">
								        <div class="panel-body">
                        <div class="row">
                             <table id="example2" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company  name</th>
                                    <th>invoice</th>
                                    <th>product</th>
                                    <th>place_of_supply</th>

                                    <th>total_amount</th>
                                    <th>gstin</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="footable-visible footable-last-column">
                                        <div class="btn-group">
                                            <a class='btn btn-sm btn-info' data-toggle='modal' href="">PDF</a>
                                        </div>
                                    </td>
                                </tr>
                              
                                </tbody>
                            </table>
                        </div>
                    </div>  
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




@endsection