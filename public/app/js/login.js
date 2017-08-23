$(function(){
	if (typeof $.cookie('tokenId') === 'undefined' && typeof $.cookie('tokenUsername') === 'undefined'){
        //no cookie         
      
        
    }else{
    	 window.location.href = "/dashboard";
    }
    
$('#loginSubmit').click(function(){
		login();
	});
});

function login(){
	var data = $('#loginForm').serialize();

	$.ajax({
			
			"url":"/api/login",
			"method":"POST",
			
			"data":data,
			"dataType":"JSON",
			beforeSend:function(){
			// console.log(data);
			},
			success:function(response){
				
				
				if(response.code == 200){
					// alert(response.message);
					

	                var date = new Date();
	                var minutes = 60;
	                date.setTime(date.getTime() + (minutes * 60 * 1000));              
	           		$.removeCookie("tokenId", { path: '/' });
				    $.removeCookie("tokenUsername", { path: '/' });
				    $.removeCookie("tokenId");
				    $.removeCookie("tokenUsername");

	                $.cookie("tokenId", response.data[0].id,{
	                    expires : date
	                });

	                $.cookie("tokenUsername", response.data[0].username,{
	                    expires : date
	                });

	                 window.location.href = "dashboard";
               
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