<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="app/js/invoice.js"></script>
<head>
         
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
		  </head>

 
		<body>
        <br><br><br><br><br>
        <form id="invoiceForm">
        <table id="table-bordered"  style="width:100%;">
        <tr>
        <td id="headtxt">INVOICE</td>
        </tr>
        </table>
		<table id="table-bordered" style="width:100%;">

		

			<tr>
				<td id="table_td"  rowspan="2"><strong>Customer Details:-</strong><br>
                <strong>Company Name:</strong><span>{{$invoices[0]->company_name}}</span><br>
                <strong>Customer Name:</strong><span>{{$invoices[0]->name}}</span><br>
				
				<strong>Address:</strong><span>{{$invoices[0]->address}}</span><br>
				<strong>Mobile:</strong><span>{{$invoices[0]->phone}}</span>
				</td>

				<td id="table_td" >Invoice no:-<span>{{$invoices[0]->invoice}}</span></td>

				<td id="table_td" rowspan="2" ><strong>{{$data[0]->company_name}}</strong><br>
				{{$data[0]->company_address}}<br><br>
                <strong>CIN No</strong>:{{$data[0]->cin}}
                
					
                 </td>
			</tr>

		<tr><td id="table_td">Date:- <input type="hidden" name="date" id="h_date"><span id="date">{{$invoices[0]->date}}</span>
        </td></tr>

		<tr>
		
        
		<td id="table_td"><strong>Customer GSTIN No:</strong>{{$invoices[0]->gstin}}
		</td>
        <td id="table_td">Place of Supply:<span>{{$invoices[0]->place_of_supply}}</span>
       </td>
		<td id="table_td"><strong>GSTIN</strong>:{{$data[0]->gistin}}<br></td>
		</tr>

		
		
        
        
		</table>


		


		<table id="table-bordered"  style="width:100%;">
		<tr>
		<td id="table_td" >Sr. No.</td>
		<td id="table_td">Description</td>
        <td id="table_td">SAC Code</td>
		<td id="table_td">Quantity</td>
		<td id="table_td">Amount</td>
		</tr>

		<tr style="height:150px;">
		@php($i=1)
		<td id="table_td">@foreach ($invoices as $sr)
		{{$i}}.<br>
		@php ($i++)
		@endforeach
		</td>
		<td id="table_td">
		@foreach ($invoices as $invoice)
		<span>{{$invoice->product}}</span><br>
		@endforeach
		</td>
        <td id="table_td" style="vertical-align:top;">
        	<span style="visibility: visible;">998413</span><br>
        	
	        </span>
        </td>
        <td id="table_td">
		@php ($i = 1)
		@foreach($invoices as $quantity)
			{{$quantity->quantity}}<br>
		@php ($i++)
		@endforeach
		</td>
        <td id="table_td">
		@foreach ($invoices as $amount)
			{{$amount->amount}}<br>
		@endforeach
		</td>
		</tr>
		


		<tr>
       <td id="table_td" rowspan="5" ></td>
        
		<td id="table_td" colspan="3" style="text-align:right">Sub total</td>
		<td id="table_td"><span >{{$invoices[0]->sub_total}}</span></td>
		</tr>
        
        <tr>
       
        
		<td id="table_td" colspan="3" style="text-align:right">
		CGST : 9%<br>
        SGST : 9%<br>
        IGST : 18%
        </td>
		<td id="table_td">
		@if($invoices[0]->cgst != 0 )
		<span id="cgst" name="cgst">{{$invoices[0]->cgst}}</span><br>
		@else
		<span id="cgst" name="cgst"> </span><br>
		@endif
		@if($invoices[0]->sgst != 0 )
		<span id="sgst" name="sgst">{{$invoices[0]->sgst}}</span><br>
		@else
		<span id="cgst" name="cgst"> </span><br>
		@endif
		@if($invoices[0]->igst != 0 )
		<span id="igst" name="isgst">{{$invoices[0]->igst}}</span>
		@else
		<span id="cgst" name="cgst"> </span><br>
		@endif
		</tr>
        
        
        
		<tr>
        
        
		<td id="table_td" colspan="3" style="text-align:right">GST TAX Total</td>
		<td id="table_td" ><span id="total_tax" name="total_tax">{{$invoices[0]->total_tax}}</span></td>
		</tr>
		
        <tr>
        
        
		<td id="table_td" colspan="3" style="text-align:right">Total Amount</td>
		<td id="table_td">
		<span id="total_amount" name="total_amount">{{$invoices[0]->total_amount}}</span>
		</td>
		</tr>
        <tr>
		<td colspan="4" id="table_td" align="left"> Rupees: <?php echo convert_number($invoices[0]->total_amount);?></td>
		</tr>
		<tr>
		<td colspan="5" id="table_td" align="left">
		<strong>Company Name:</strong><span>{{$data[0]->company_name}}.</span><br>
		<strong>Bank Name:</strong><span>{{$data[0]->bank_name}}</span><br>
		<strong>Account No:</strong><span>{{$data[0]->account_no}}</span><br>
		<strong>IFSC/CODE:</strong><span>{{$data[0]->ifsc_code}}</span>
		</td>
		</tr>
		

		</table>


		


		<center><p>This is Computer Generated Invoice.</p></center>
		

		
		<!-- <button type="button" id="submitInvoice">Submit</button> -->
		</form>
		</body>
		</html>
	<?php 

function convert_number1($number) 
{ 
    if (($number < 0) || ($number > 999999999)) 
    { 
    	throw new Exception("Number is out of range");
    } 

    $Gn = floor($number / 1000000);  /* Millions (giga) */ 
    $number -= $Gn * 1000000;
    $lk = floor($number / 100000);  /* lakh (giga) */ 
    $number -= $Gn * 100000;
    $kn = floor($number / 1000);     /* Thousands (kilo) */ 
    $number -= $kn * 1000; 
    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 

    $res = ""; 

    if ($Gn) 
    { 
        $res .= convert_number($Gn) . " Million"; 
    }
    if ($lk) 
    { 
        $res .= convert_number($lk) . " Lakh"; 
    }

    if ($kn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($kn) . " Thousand"; 
    } 

    if ($Hn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($Hn) . " Hundred"; 
    } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
        "Nineteen"); 
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", 
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n) 
    { 
        if (!empty($res)) 
        { 
            $res .= " and "; 
        } 

        if ($Dn < 2) 
        { 
            $res .= $ones[$Dn * 10 + $n]; 
        } 
        else 
        { 
            $res .= $tens[$Dn]; 

            if ($n) 
            { 
                $res .= "-" . $ones[$n]; 
            } 
        } 
    } 

    if (empty($res)) 
    { 
        $res = "zero"; 
    } 

    return $res; 
} 
function convert_number($number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}
?>		