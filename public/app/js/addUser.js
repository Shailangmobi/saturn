$(function(){
	
	$('#submitCustomer').click(function(){
		var flag = true;

		flag = $("#loginForm").valid();
		if(flag==false){
			alert('All Mandatory Fields are required.');
			return false;
		}
		var data = $('#loginForm').serialize();
		
		$.ajax({
			
			"url":"/api/addCustomer",
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
	});

	$('#updateProfile').click(function(){
		 updateProfile();
	});
	$('#submitProfile').click(function(){
		 addProfile();
	});

	$('#phone').on('input', function (event) { 
    this.value = this.value.replace(/[^0-9]/g, '');
	});

	$('#account_no').on('input', function (event) { 
    this.value = this.value.replace(/[^0-9]/g, '');
	});

	$.validator.addMethod("CheckUrl", function(value, element) {
		var letters = /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i;
		return this.optional(element) || letters.test(value);  
	});

	$("#profile").validate({
		rules: {    
			name:{
				required: true,
			},
			email:{
				required: true,
				CheckUrl:true,
			},
			company_name:{
				required: true,
				//gstin:true,
			},
			company_state:{
				required: true,
			},
			company_address:{
				required: true,
			},
			phone:{
				required: true,
				minlength:10,
				maxlength:12,
			},
			
			account_no:{
				required: true,
			},
			ifsc_code:{
				required: true,
			},
			account_name:{
				required: true,
			},
			bank_name:{
				required: true,
			},
		},
		messages: {    
			email:{
				CheckUrl:"Please enter valid email id."
			},
			phone:{
				maxlength:"Must be max 10 digit ",
				minlength:"Must be max 10 digit ",
			}
			
		}
	});
	$("#loginForm").validate({
		rules: {    
			name:{
				required: true,
			},
			email:{
				required: true,
				CheckUrl:true,
			},
			company_name:{
				required: true,
				//gstin:true,
			},
			company_state:{
				required: true,
			},
			company_address:{
				required: true,
			},
			phone:{
				required: true,
				minlength:10,
				maxlength:12,
			},
			
			account_no:{
				required: true,
			},
			ifsc_code:{
				required: true,
			},
			account_name:{
				required: true,
			},
			bank_name:{
				required: true,
			},
		},
		messages: {    
			email:{
				CheckUrl:"Please enter valid email id."
			},
			phone:{
				maxlength:"Must be max 10 digit ",
				minlength:"Must be max 10 digit ",
			}
			
		}
	});
});
function addProfile(){
	var flag = true;

	flag = $("#profile").valid();
	if(flag==false){
		alert('All Mandatory Fields are required.');
		return false;
	}
	var data = $('#profile').serialize();
	
	$.ajax({
			
			"url":"/api/addProfile",
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

function updateProfile(){
	var flag = true;

	flag = $("#profile").valid();
	if(flag==false){
		alert('All Mandatory Fields are required.');
		return false;
	}
	var data = $('#profile').serialize();
	
	$.ajax({
			
			"url":"/api/updateProfile",
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

function logout(){
	
	 $.removeCookie("tokenId", { path: '/' });
     $.removeCookie("tokenUsername", { path: '/' });
     $.removeCookie("tokenId");
     $.removeCookie("tokenUsername");
     window.location.href = "/login";
}