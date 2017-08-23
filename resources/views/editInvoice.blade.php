@extends('index')

@section('title', 'CreateInvoice')

@section('content')

<script src="../app/js/invoice.js"></script>
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
        <td id="headtxt">INVOICE EDIT</td>
        </tr>
        </table>
		<table id="table-bordered" style="width:100%;">
		<input type="hidden" name="id" id="id" value="{{$data[0]->customer_id}}">
		

			<tr>
				<td id="table_td"  rowspan="2"><strong>Customer Details:-</strong><br>
                Company Name:<input readonly="" class = "form-control" id="company_name" name="company_name" value="{{$data[0]->company_name}}">
                				
                					
                				
                			  <br>
				Customer Name:<input readonly="" class = "form-control"  type="text" id="name" name="name" value="{{$data[0]->name}}"><br>
				Address:<textarea readonly="" class = "form-control"  type="text" id="address" name="address" value="{{$data[0]->address}}">{{$data[0]->address}}</textarea> 
				</td>

				<td id="table_td" >Invoice no:-<input readonly="" class = "form-control"  readonly="" id="invoice" name="invoice" value="{{$data[0]->invoice}}"></td>

					<td id="table_td" rowspan="2" ><strong>{{$company[0]->company_name}}</strong><br>
				Address :{{$company[0]->company_address}}<br>
				Email :  {{$company[0]->email}}<br>
				Tel No:  {{$company[0]->phone}}<br>
                <strong>CIN No</strong>.:  {{$company[0]->cin}}
                
					
                 </td>
			</tr>

		<tr><td id="table_td">Date:- <input readonly=""  class = "form-control"  type="text" name="date" id="date" value="{{$data[0]->date}}">
        </td></tr>

		<tr>
		
        
		<td id="table_td"><strong>Customer GSTIN No.</strong>:- <input  readonly="" class = "form-control" id="gstin" name="gstin" value="{{$data[0]->gstin}}">
		</td>
        <td id="table_td">Place of Supply:
        <input  readonly="" class = "form-control"  id="place_of_supply" name="place_of_supply" value="{{$data[0]->place_of_supply}}">
        </td>
		<td id="table_td"><strong>GSTIN</strong>: {{$company[0]->gistin}}<br></td>
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
		@foreach($data as $data2)
		<select class = "form-control"  id="product{{$i}}" name="product{{$i}}">
		<option value="{{$data2->product}}">{{$data2->product}}</option>
			@foreach($product as $products)
				<option value="{{$products->product_name}}">{{$products->product_name}}</option>
			@endforeach

			
		</select><br>
		<!-- <input class = "form-control"  id="product{{$i}}" name="product{{$i}}" value="{{$data2->product}}"><br> -->
		@php ($i++)
		@endforeach
			</td>

       
        <td id="table_td" style="vertical-align:top;">
        	<span style="visibility: visible;">998413</span><br>
        	
	        </span>
        </td>
		
		<td>
		@php ($i = 1)
		@foreach($data as $data3)
		<input class = "form-control"  type="text" name="amount{{$i}}" id="amount{{$i}}" value="{{$data3->amount}}"  onchange="EditcalcTax(this.value);"><br>
		@php ($i++)
		@endforeach</td><br>
		</tr>
		


		<tr>
       <td id="table_td" rowspan="5" ></td>
        
		<td id="table_td" colspan="2" style="text-align:right">Sub total</td>
		<td id="table_td"><input readonly="" class = "form-control"  type="text" name="sub_total" id="sub_total" value="{{$data[0]->sub_total}}"></td>
		</tr>
        
        <tr>
       
        
		<td id="table_td" colspan="2" style="text-align:right">
		<span>CGST : 9%</span><br><br><br>
        <span>SGST : 9%</span><br><br><br>
        <span>IGST : 18%</span>
        </td>
		<td id="table_td">
		<input readonly="" class = "form-control"  type="text" name="cgst" id="cgst" value="{{$data[0]->cgst}}" ><br>
      	<input readonly="" class = "form-control"  type="text" name="sgst" id="sgst" value="{{$data[0]->sgst}}" ><br>
        <input readonly="" class = "form-control"   type="text" name="igst" id="igst" value="{{$data[0]->igst}}" ><br>
		</tr>
        
        
        
		<tr>
        
        
		<td id="table_td" colspan="2" style="text-align:right">GST TAX Total  </td>
		<td id="table_td"><input class = "form-control"  readonly="" type="text" name="total_tax" id="total_tax" value="{{$data[0]->total_tax}}"></td>
		</tr>
		
        <tr>
        
        
		<td id="table_td" colspan="2" style="text-align:right">Total Amount</td>
		<td id="table_td">
		<input readonly="" class = "form-control"  type="text" name="total_amount" id="total_amount" value="{{$data[0]->total_amount}}">
		</td>
		</tr>
        
		<tr>
		<td colspan="4" id="table_td" align="left"></td>
		</tr>
		<tr>
		<td colspan="3" id="table_td" align="left">
		<strong>Company Name:</strong><span>Saturn Promoters</span><br>
		<strong>Bank Name:</strong><span>Axis Bank Ltd</span><br>
		<strong>Account No:</strong><span>913020013009617</span><br>
		<strong>IFSC/CODE:</strong><span>UTIB0001600 </span>
		</td>
		<td rowspan="2"></td>
		</tr>
		

		</table>


		


		<center><p></p></center>
		

		<center><button class="btn btn-success" type="button" id="submitEdit" onclick="editInvoice();">Submit</button></center>
		
		</form>
		</div>
	</div>
		</div>
	</div>
		</div>
	</div>
</div>		
		
@endsection