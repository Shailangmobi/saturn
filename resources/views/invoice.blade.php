@extends('index')

@section('title', 'CreateInvoice')

@section('content')

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> -->

<script src="{{URL::asset('app/js/invoice.js')}}"></script>
<script type="text/javascript">
	 if (typeof $.cookie('tokenId') === 'undefined' && typeof $.cookie('tokenUsername') === 'undefined'){
          
       window.location.href = "/";
        
   		} 
</script>

	
          
		  <style>
		  
			  #table_td{				  
				  padding:10px;
				  font-size:12px;
			  }
			  #table-bordered>tbody>tr>td 
			   
			  
			 
			   {border: 1px solid #080000 !important;}
			  table tfoot td{
				  /*text-align:center;*/
			  }
			 #headtxt{
				 text-align:center;
				 padding:0 !important;
				 font-weight:bold;
				 font-size:2em;
			 }
		</style>
		


<div id="wrapper">
	<div class="content animate-panel">
	<div class="row">
	 <div class="col-lg-12">
                <div class="hpanel">
                 <div class="panel-body">
                        <div class="row">
        <br><br><br><br><br>
        <form id="invoiceForm">
        <table id="table-bordered"  style="width:100%;">
        <tr>
       
        <div class="search2">
            <form>
                <i class="fa fa-search"></i>
                <input style="width: 22%;" type="text" id="search_box" value="Search By Name or Mobile Number" placeholder="Search By Name or Mobile Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search By Name or Mobile Number';}"/><br>
            </form>
        </div><br>
        <td id="headtxt">INVOICE</td>
        </tr>
        </table>
		<table id="table-bordered" style="width:100%;">
		<input type="hidden" name="id" id="id">
		

			<tr>
				<td id="table_td"  rowspan="2"><strong>Customer Details:-</strong><br>

                Company Name:<input readonly="" type="text" class="form-control" id="company" name="company" ><br>
                					
				Customer Name:<input readonly="" class="form-control" type="text" id="name" name="name"><br>
				Address:<textarea readonly="" class="form-control" type="text" id="address" name="address"></textarea>
				</td>

				<td id="table_td" >Invoice no:-<input readonly="" class="form-control" readonly="" id="invoice" name="invoice" value="Invoice No {{$data[0]->count}}"></td>
				<td id="table_td" rowspan="2" ><strong>{{$data2[0]->company_name}}</strong><br>
				Address :{{$data2[0]->company_address}}<br>
				Email :  {{$data2[0]->email}}<br>
				Tel No:  {{$data2[0]->phone}}<br>
                <strong>CIN No</strong>.:  {{$data2[0]->cin}}
                
					
                 </td>
			</tr>

		<tr><td id="table_td">Date:- <input type="hidden" name="date" id="h_date"><span id="date"></span>
        </td></tr>

		<tr>
		
        
		<td id="table_td"><strong>Customer GSTIN No.</strong>:- <input readonly="" class="form-control" id="GSTIN" name="GSTIN">
		</td>
        <td id="table_td">Place of Supply:
        <select class="form-control" id="place_of_supply" name="place_of_supply" onchange="placeOfSup(this.value);">
       
        <option value="Delhi">Delhi</option>
         <option value="Ot">Others</option>
        </select></td>
		<td id="table_td"><strong>GSTIN</strong>:{{$data2[0]->gistin}}<br></td>
		</tr>
     
		</table>

		<table id="table-bordered"  style="width:100%;">
		<tr>
		<td id="table_td" >Sr. No.</td>
		<td id="table_td">Description</td>
        <td id="table_td">SAC Code</td>
		
		<td id="table_td">Amount</td>
		</tr>

		<tr style="height:150px;">
		<td id="table_td">1.</td>
		<td id="table_td">
		@php ($i = 1)
		@foreach($product as $products)
		<select class="mySelect form-control" id="product{{$i}}" name="product{{$i}}" onchange="displayAmount();">
		@php ($j=$i)
		@php ($i++)
			<option value="">Select</option>
			@foreach($product as $name)
			<option data-amt="{{$j}}" value="{{$name->product_name}}">{{$name->product_name}}</option>
				
			@endforeach
		</select><br>
		@endforeach
		
		</td>

        <td id="table_td" style="vertical-align:top;">
        	<span style="visibility: visible;">{{$product[0]->product_sac}}</span><br>
        	
	        </span>
        </td>
		
		<td class = "myamount">
		@php ($i = 1)
		@foreach($product as $product)

		<input type="text" class="product{{$i}} form-control" id="amount{{$i}}" name="amount{{$i}}" value="0" style="visibility:hidden;" onchange="calcTax(this.value);"><br>
		@php ($i++)
		@endforeach
		</td>
		</tr>
		


		<tr>
       <td id="table_td" rowspan="5" ></td>
        
		<td id="table_td" colspan="2" style="text-align:right">Sub total</td>
		<td id="table_td"><input type="hidden" name="h_Sub_amount" id="h_Sub_amount"><span id="Sub_amount" name="Sub_amount"></span></td>
		</tr>
        
        <tr>
       
        
		<td id="table_td" colspan="2" style="text-align:right">
		<span>CGST : 9%</span><br><br><br>
        <span>SGST : 9%</span><br><br><br>
        <span>IGST : 18%</span>
        </td>
		<td id="table_td">
		<input  type="hidden" name="h_cgst" id="h_cgst"><span class="form-control"  id="cgst" name="cgst"></span><br>
        <input  type="hidden" name="h_sgst" id="h_sgst"><span class="form-control"  id="sgst" name="sgst"></span><br>
        <input  type="hidden" name="h_igst" id="h_igst"><span class="form-control"  id="igst" name="isgst"></span>
		</tr>
        
        
        
		<tr>
        
        
		<td colspan="2" style="text-align:right">GST TAX Total </td>
		<td id="table_td"><input type="hidden" name="h_total_tax" id="h_total_tax"><span id="total_tax" name="total_tax"></span></td>
		</tr>
		
        <tr>
        
        
		<td id="table_td" colspan="2" style="text-align:right">Total Amount</td>
		<td id="table_td">
		<input type="hidden" name="h_total_amount" id="h_total_amount"><span id="total_amount" name="total_amount"></span>
		</td>
		</tr>
        
		<tr>
		<td colspan="4" id="table_td" align="left"> Rupees: </td>
		</tr>
		<tr>
		<td colspan="3" id="table_td" align="left">
		<strong>Company Name:</strong><span>{{$data2[0]->company_name}}</span><br>
		<strong>Bank Name:</strong><span>{{$data2[0]->bank_name}}</span><br>
		<strong>Account No:</strong><span>{{$data2[0]->account_no}}</span><br>
		<strong>IFSC/CODE:</strong><span>{{$data2[0]->ifsc_code}}</span>
		</td>
		<td rowspan="2"><center><b>For {{$data2[0]->company_name}}<br><br><br><br><br><br>Authorized Signature</b></center>
		</td>
		</tr>
		
		</table>


	
<br>

		<center><button class="btn btn-success" type="button" id="submitInvoice">Submit</button></center>
		</form>
		</div>
	</div>
		</div>
	</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('#search_box').autocomplete({        
	        source: function (request, response) {
	            if(request.term==''){
	                $('.ui-autocomplete').css("display","none");
	                return false;
	            }
	           
	            var formData = new FormData();
	            formData.append('search_value',request.term);

	             var data = {
			        search_val : request.term
			    };

	            $.ajax({
	                url :"/api/search/"+request.term,
	                dataType: 'json',
	                //data: data,
	                success: function (data) {
	                	console.log(data);
	                	console.log(data.length);
	                	       
	                    if(data.length != 0){
	                        if(data.length > 5){
	                            $('.ui-autocomplete').addClass('ul_scroll');
	                        }else{
	                            $('.ui-autocomplete').removeClass('ul_scroll');
	                        }
	                        response($.map(data, function (item) {
	                            return { 
	                                value: item.VALUE,
	                                label: item.LABEL,
	                                type: item.SHOW_TYPE
	                            };                
	                        }));
	                    }
	                    else{
	                        $('.ui-autocomplete').removeClass('ul_scroll');
	                        response($.map(data, function (item) {
	                            return { 
	                                label: ''
	                            };                
	                        }));
	                    }
	                }     
	            });
	        },
	        select:function(event,ui){
	            $('#search_box').val(ui.item.LABEL);
	            if($('#search_box').val()==''){
	                return false;
	            }
	            //$(".search-btn").trigger("click");
	        },         
	        minLength: 0  
	    }).data("ui-autocomplete")._renderItem = function (ul, item) {
	        if(item.label == undefined || item.label == ''){        
	            return $("<li></li>")
	                .append("<a>No Records Found</a>")
	                .appendTo(ul);       
	        }
	        else{

	        	
	        		return $("<li></li>")
		                .data("item.autocomplete", item)
		                // .append("<a href='/pic-a-show/"+item.value+"' >" + item.label +"</a>")
		                .append("<a onclick='getCompanyAddress("+item.value+");'>" + item.label +"</a>")
		                .appendTo(ul);
	        	
	        }           
	    };
	});
</script>
<script type="text/javascript">
	function alertalert(id){
		alert(id);
	} 
</script>
@endsection