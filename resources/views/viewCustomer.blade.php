
@extends('index')

@section('title', 'Content')

@section('content')

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                <h2>
                    Welcome to View Customer
                </h2>

                <p>
                    Customer List
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            
                        </div>
                        Customer information 
                    </div>
                    <div class="panel-body">
                        <div class="row">
                             <table id="example2" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>company_name</th>
                                    <th>company_state</th>
                                    <th>company_address</th>

                                   
                                    <th>cin</th>
                                    <th>gstin</th>
                                    
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->company_name}}</td>
                                    <td>{{$value->company_state}}</td>
                                    <td>{{$value->company_address}}</td>
                                   
                                    <td>{{$value->cin}}</td>
                                    <td>{{$value->gistin}}</td>
                                   
                                    <td class="footable-visible footable-last-column">
                                        <div class="btn-group">
                                            <a class='btn btn-sm btn-info' onclick="getCustomerById({{$value->id}});" data-toggle="modal" data-target="#myModal">Edit</a>
                                        </div>
                                         
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                    <span class="pull-right">
                         
                    </span>
                       
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <!-- MOdal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Customer Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      
                        <div class="hpanel">
                            <div class="panel-body">
                                    <form action="#" id="editForm">
                                        <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Name</label>
                                            <input type="hidden" value="" id="id"  name="id" >
                                            <input type="text" value="" id="name" class="form-control" name="name" placeholder="Provide name .. ">
                                        </div>
                                    
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
                                      
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
             <button type="button" id="update" class="btn btn-success">Update</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<script type="text/javascript">
    

</script>
<script src="app/js/viewCustomer.js"></script>
<!-- Mirrored from webapplayers.com/homer_admin-v1.8/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Dec 2015 17:42:05 GMT -->
</html>
@endsection