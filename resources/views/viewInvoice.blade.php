
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
                    Generate PDF by clicking the pdf button
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            
                        </div>
                        Invoice information 
                    </div>
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
                                @foreach($data as $key => $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->company_name}}</td>
                                    <td>{{$value->invoice}}</td>
                                    <td>{{$value->product}}</td>
                                    <td>{{$value->place_of_supply}}</td>
                                    <td>{{$value->total_amount}}</td>
                                    <td>{{$value->gstin}}</td>
                                    <td>{{$value->status}}</td>
                                    <td class="footable-visible footable-last-column">
                                        <div class="btn-group">
                                            <a class='btn btn-sm btn-info' target="_BLANK"data-toggle='modal' href="pdfview/{{$value->invoice}}">Print Invoice</a>
                                        </div>
                                         <div class="btn-group">
                                            <a class='btn btn-sm btn-success' data-toggle='modal' href="edit/{{$value->invoice}}">Edit Invoice</a>
                                        </div><br>
                                         <div class="btn-group">
                                            <a class='btn btn-sm btn-info' data-toggle='modal' onclick="mailInvoice('{{$value->invoice}}');">Mail Invoice</a>
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
                          Print, Mail and Edit Invoice Panel
                    </span>
                        Invoice Details
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
<script type="text/javascript">
    $(function(){
        $('#example2').DataTable();
    });

</script>
<script src="app/js/invoice.js"></script>
<!-- Mirrored from webapplayers.com/homer_admin-v1.8/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Dec 2015 17:42:05 GMT -->
</html>
@endsection