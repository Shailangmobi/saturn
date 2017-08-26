$(function(){
	
 	
	var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
	
	$('#h_date').val(today);
	$('#date').text(today);
	$('#submitInvoice').click(function(){
		submitInvoice();
	});

});
function placeOfSup(str){
		

}
function calcTax(amount){
	amount = parseInt(amount);
	
	var amount1 = parseInt($('#amount1').val());
	var amount2 = parseInt($('#amount2').val());
	var amount3 = parseInt($('#amount3').val());
	var amount4 = parseInt($('#amount4').val());
	var amount5 = parseInt($('#amount5').val());
	var amount = amount1 + amount2 + amount3 +amount4 +amount5;
	$('#h_Sub_amount').val(amount);
	$('#Sub_amount').text(amount);
	var placeoforder = $('#place_of_supply').val();
	if(placeoforder == "Delhi"){
		var cgst = 9;
	    var CGST_Amount = Math.round(amount*(cgst/100));

	    var sgst = 9;
	  	var SGST_Amount = Math.round(amount*(sgst/100));
		$('#cgst').text(CGST_Amount);
		$('#sgst').text(CGST_Amount);
		var total =CGST_Amount+SGST_Amount;
		
		$('#h_total_tax').val(total);
		$('#total_tax').text(total);
		$('#h_total_amount').val(Math.round(CGST_Amount+SGST_Amount+amount));
		$('#total_amount').text(Math.round(CGST_Amount+SGST_Amount+amount));
		$('#h_cgst').val(Math.round(CGST_Amount));
		$('#h_sgst').val(Math.round(CGST_Amount));
		$('#igst').text("");
		

	}else{
		$('#cgst').text("");
		$('#sgst').text("");
		$('#h_cgst').val("");
		$('#h_sgst').val("");
		var igst = 18;
		var IGST_Amount = amount*(igst/100);
		var igst = IGST_Amount;
		$('#h_total_tax').val(igst);
		$('#total_tax').text(igst);

		var totalAmount = igst + amount;
		var round_igst=Math.round(IGST_Amount);
		$('#h_total_amount').val(totalAmount);
		$('#total_amount').text(totalAmount);
		$('#igst').text(igst);
		$('#h_igst').val(igst);
	}

}
function EditcalcTax(amount){
	amount = parseInt(amount);
	
	var amount1 = parseInt($('#amount1').val());
	var amount2 = parseInt($('#amount2').val());
	var amount3 = parseInt($('#amount3').val());
	var amount4 = parseInt($('#amount4').val());
	var amount5 = parseInt($('#amount5').val());
	if(isNaN(amount1))
	{
		
		amount1 = 0 ;
	}
	if(isNaN(amount2))
	{
		amount2 = 0 ;
	}
	if(isNaN(amount3))
	{
		amount3 = 0 ;
	}
	if(isNaN(amount4))
	{
		amount4 = 0 ;
	}
	if(isNaN(amount5))
	{
		amount5 = 0 ;
	}
	var amount = amount1 + amount2 + amount3 +amount4 +amount5;

	$('#sub_total').val(amount);
	
	var placeoforder = $('#place_of_supply').val();
	if(placeoforder == "Delhi"){
		var cgst = 9;
	    var CGST_Amount = Math.round(amount*(cgst/100));

	    var sgst = 9;
	  	var SGST_Amount = Math.round(amount*(sgst/100));
		$('#cgst').val(CGST_Amount);
		$('#sgst').val(SGST_Amount);
		var total =CGST_Amount+SGST_Amount;
		
		
		$('#total_tax').val(total);
		
		$('#total_amount').val(Math.round(CGST_Amount+SGST_Amount+amount));
		
		$('#igst').val(0);
	}else{
		$('#cgst').val(0);
		$('#sgst').val(0);
		
		var igst = 18;
		var IGST_Amount = amount*(igst/100);
		var igst = IGST_Amount;
		
		$('#total_tax').val(igst);

		var totalAmount = igst + amount;
		var round_igst=Math.round(IGST_Amount);
		
		$('#total_amount').val(totalAmount);
		$('#igst').val(igst);

		
	}
}
function submitInvoice(){

	var checkSelect = '';
	$(".mySelect option:selected").each(function(i) {
		
	    checkSelect += this.value;	
	    var checkClass = $(this).data('amt');		   
	    
	    var amount_check = $('.product'+checkClass).val();
	    if( amount_check == '' || amount_check == 0 ){
	    	alert('Please enter amount');
	    	return false;
	    }
	    var amount_check = $('.quantity'+checkClass).val();
	    if( amount_check == '' || amount_check == 0 ){
	    	alert('Please enter quantity');
	    	return false;
	    }
	});

	if(checkSelect == ''){
		alert('Please select product');
	}
	//alert(checkSelect);
	//return false;

	var flag = true;
	if(!$('#product1').val() == ""){
		
	}
	else {
	  alert('Please Select atleast one product');
	    return false;
	}
	
	
	var data = $('#invoiceForm').serialize();
	

	$.ajax({
		
		"url":"/api/insertInvoice",
		"method":"POST",
		
		"data":data,
		"dataType":"JSON",
		beforeSend:function(){
		console.log(data);
		},
		success:function(response){
			
			console.log(response);
			
			if(response.code == 200){
				alert(response.message);
				window.location.href = "/viewInvoice";
			}else{
				alert(response.message);
			}
		},
		complete:function(){
			
		
		}
	});
}

function pdfGenerate(id){
       
        $.ajax({
		
			"url":"/api/pdfgen/"+id,
			"method":"GET",
			
			
			"dataType":"JSON",
			beforeSend:function(){
			
			},
			success:function(response){
				
				console.log(response);
				if(response.code == 200){
					alert(response.message);
					location.reload();
				}else{
					alert(response.message);
				}
			},
			complete:function(){
				
			
			}
		});
        
}
function getCompanyAddress(id){
	
	$.ajax({
		
		"url":"/api/getCompanyDetails/"+id,
		"method":"GET",
		
		
		"dataType":"JSON",
		beforeSend:function(){
		
		},
		success:function(response){
			
			console.log(response);
			if(response.code == 200){
				$('#company').val(response.data[0].company_name);
				$('#name').val(response.data[0].name);
				$('#id').val(response.data[0].id);
				$('#address').val(response.data[0].company_address);
				$('#GSTIN').val(response.data[0].gistin);
				$('#address').val(response.data[0].company_address);
				
			}else{
				
			}
		},
		complete:function(){
			
		
		}
	});
}

function getCompanyDetails(){
	var data = $('#searchForm').serialize();
	$.ajax({
		
		"url":"/api/getCompanyDetails",
		"method":"POST",
		
		"data":data,
		"dataType":"JSON",
		beforeSend:function(){
		console.log(data);
		},
		success:function(response){
			
			console.log(response);
			if(response.code == 200){
				alert(response.message);
				location.reload();
			}else{
				alert(response.message);
			}
		},
		complete:function(){
			
		
		}
	});
}

function editInvoice(){
	var data = $('#invoiceForm').serialize();
	
	
	$.ajax({
		
		"url":"/api/editInvoice",
		"method":"POST",
		
		"data":data,
		"dataType":"JSON",
		beforeSend:function(){
		console.log(data);
		},
		success:function(response){
			
			console.log(response);
			if(response.code == 200){
				alert(response.message);
				 window.location.href = "/viewInvoice";
			}else{
				alert(response.message);
			}
		},
		complete:function(){
			
		
		}
	});
}

function displayAmount(){
 	if(!$('#product1').val() == ""){
		$('#amount1').css('visibility','visible');
	   	$('#quantity1').css('visibility','visible');
	   
	   
	}
	
	if(!$('#product2').val() == ""){
		$('#amount2').css('visibility','visible');
	   	$('#quantity2').css('visibility','visible');
	   
	   
	}
	if(!$('#product3').val() == ""){
		$('#amount3').css('visibility','visible');
	   	$('#quantity3').css('visibility','visible');
	   
	   
	}
	if(!$('#product4').val() == ""){
		$('#amount4').css('visibility','visible');
	   	$('#quantity4').css('visibility','visible');
	   
	   
	}
	if(!$('#product5').val() == ""){
		$('#amount5').css('visibility','visible');
	   	$('#quantity5').css('visibility','visible');
	   
	   
	}
	
}

function mailInvoice(id){
 	alert(id);
 	$.ajax({
		
		"url":"/api/mail/"+id,
		"method":"GET",
		
		
		"dataType":"JSON",
		beforeSend:function(){
			$('.bodyLoaderWithOverlay').show();
		},
		success:function(response){
			
			
			if(response.code == 200){
				alert(response.message);
				 window.location.href = "/viewInvoice";
			}else{
				alert(response.message);
			}
		},
		complete:function(){
			$('.bodyLoaderWithOverlay').hide();
		
		}
	});
}

function logout(){
	
	 $.removeCookie("tokenId", { path: '/' });
     $.removeCookie("tokenUsername", { path: '/' });
     $.removeCookie("tokenId");
     $.removeCookie("tokenUsername");
     window.location.href = "/login";
}

function previewInvoice(id){
 	
 	$.ajax({
		
		"url":"/api/previewInvoice/"+id,
		"method":"GET",
		
		
		"dataType":"JSON",
		beforeSend:function(){
			$('.bodyLoaderWithOverlay').show();
		},
		success:function(response){
			
			
			if(response.code == 200){
				alert(response.message);
				 window.location.href = "/viewInvoice";
			}else{
				alert(response.message);
			}
		},
		complete:function(){
			$('.bodyLoaderWithOverlay').hide();
		
		}
	});
}

