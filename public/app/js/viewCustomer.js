$(function(){
	if (typeof $.cookie('tokenId') === 'undefined' && typeof $.cookie('tokenUsername') === 'undefined'){
        //no cookie         
       window.location.href = "/";
        
    } else {
        //alert("Login: have cookie----"+$.cookie('token'));
       
    }
	$('#example2').DataTable();
	$('#update').click(function(){

		editCustomer();
	});

});
function getCustomerById(id){

	$.ajax({
			
			"url":"/api/getCustomerById/"+id,
			"method":"GET",
			
			
			"dataType":"JSON",
			beforeSend:function(){
			console.log(id);

			},
			success:function(response){
				
				console.log(response);
				if(response.code == 200){
					
					$('#id').val(response.data[0].id);
					$('#name').val(response.data[0].name);
					$('#email').val(response.data[0].email);
					$('#company_name').val(response.data[0].company_name);
					$('#company_state').val(response.data[0].company_state);
					$('#company_address').val(response.data[0].company_address);
					$('#phone').val(response.data[0].phone);
					$('#cin').val(response.data[0].cin);
					$('#gistin').val(response.data[0].gistin);

				}else{
					alert(response.message);
				}
			},
			complete:function(){
				
			
			}
		});
}
function editCustomer(){
	var data = $('#editForm').serialize();
	$.ajax({
			
		"url":"/api/editCustomer",
		"method":"POST",
		"data":data,
		
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
function logout(){
	
	 $.removeCookie("tokenId", { path: '/' });
     $.removeCookie("tokenUsername", { path: '/' });
     $.removeCookie("tokenId");
     $.removeCookie("tokenUsername");
     window.location.href = "/login";
}