<?php 
/*
Product Name : Mobile Verifier PHP Script
Author : kamleshyadav
Purchase URL : http://codecanyon.net/user/kamleshyadav/portfolio
For Support : support@himanshusofttech.com

#####################################
Last Updated : 10 June 2015
File Name : ajax_call.php
*/
if(file_exists('../../config.php'))
{
	require('../../config.php');
	
	if(isset($_POST['mobile_no']))
	{
		$mob_no=$_POST['mobile_no'];
		$email=$_POST['email'];
		$name=$_POST['name'];
		
		$url='https://www.cognalys.com/api/v1/otp/?app_id='.APPID.'&access_token='.ACCESSTOKEN.'&mobile='.$mob_no;
		
			$ch= curl_init($url);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$resp          = curl_exec($ch);
			$jsondata        = json_decode($resp);
			$json = array();
			foreach ($jsondata as $key => $value)
			{
				$json[$key] = $value;
			}
			if($json['status']=='success'){
				
				mysql_query("insert into mobileverifier_data(mobile_no,email,name) values('$mob_no','$email','$name')");
				
				$id = mysql_insert_id();
				
				$display='<table align="center" border="1"><tr><td align="center">Enter the last five digit of missed call number you received </td></tr><tr><td align="center"><input type="hidden" value="'.$id.' " id="uniqid"><input type="text" id="otp_start" value="'.$json['otp_start'].'" maxlength="12" ><input type="hidden" id="keymatch" value="'.$json['keymatch'].'"></td></tr><tr><td align="center"><input type="button" value="Verify" onclick="return verify_no()"></td></tr></table>';
				
			}
			else
			{
				$display='<p style="text-align: center;color:red;">Something Went Wrong. <a href="">Please Try Again </a></p>';
			}
			echo $display;
		
			die();
		
	}

	if(isset($_POST['keymatch']))
	{
		$url='https://www.cognalys.com/api/v1/otp/confirm/?app_id='.APPID.'&access_token='.ACCESSTOKEN.'&keymatch='.$_POST['keymatch'].'&otp='.$_POST['otp'];
				
			$ch      = curl_init($url);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$resp          = curl_exec($ch);
			$jsondata        = json_decode($resp);
			$json = array();
			foreach ($jsondata as $key => $value)
			{
				$json[$key] = $value;
			}
			if($json['status']=='success') 
			{
				$uniqid=$_POST['uniqid'];
				mysql_query("update mobileverifier_data set verify='1' where id='$uniqid' ");
				echo "<span style='color:green'>Mobile Number Verified Successfully.</span>";
			}
			else
			{
				echo "<span style='color:red'>Mobile Number is Not Verified.</span>";
			}
		die();
	}
	
}//end of if(file_exists('../../config.php'))

 ?>