/*
 Name : Mobile Verification
 URL : http://tanvirshaikat.webutu.com
 For Support : ta.shaikat@gmail.com
 */
$(document).ready(function($){
	  $("#mobile-number").intlTelInput();
});

/***************To missed call The mobile*******************/	
function mobile_missed_call()
{
	var mobile_no = $.trim($('#mobile-number').val());
	var email = $.trim($('#email').val());
	var uname = $.trim($('#uname').val());
	var em =/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   
	$("#msg").html("");
	if(mobile_no=='' || email=="" || uname=="") 
		{
			$("#msg").html("<span style='color:red'>Please, Fill All Fields!!</span>");
			return false;
		}
	else{
			if(! em.test(email))
			{
				$("#msg").html("<span style='color:red'>Please, Enter Correct Email!!</span>");
				return false;
			}
			else
			{
				$.ajax({
					method:'post',
					url:'assets/php/ajax_call.php',
					data:{'mobile_no':mobile_no,'email':email,'name':uname}
				})
				.done(function(success){
					$('#result').html(success);
				});
			}
		}
	
}

/****************to verify the mobile no******************/
function verify_no()
{ 
	var start_otp=$('#otp_start').val();
	var keymatch=$('#keymatch').val();
	var uniqid=$('#uniqid').val();
		$.ajax({
			method:'post',
			url:'assets/php/ajax_call.php',
			data:{'keymatch':keymatch,'otp':start_otp,'uniqid':uniqid}
		})
		.done(function(msg){
				$('#result').html('<p style="font-size:30px;">'+msg+'</p>');
				setTimeout("location.reload(true);", 7000);
		});
}