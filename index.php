<?php 
/*
 Name : Mobile Verification
 URL : http://tanvirshaikat.webutu.com
 For Support : ta.shaikat@gmail.com
 */
 require( 'config.php'); 
 ?>
 
<html>

<head>
	<meta charset="utf-8">
    <title>Mobile Verifier PHP Script</title>

    <link rel="stylesheet" type="text/css" href="assets/css/intlTelInput.css">

    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/intlTelInput.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/utils.js"></script>
</head>

<body   style="background-color: papayawhip;">

	<table align="center" border="1">


		<tr>
			<td colspan="2" align="center">Verify Your Mobile Number</td>
		</tr>
		<tr>
			<td>Mobile Number</td>
			<td>
				<input type="text" placeholder="Mobile Number" id="mobile-number">
			</td>
		</tr>

		<tr>
			<td>Email Id</td>
			<td>
				<input type="text" placeholder="Email Id" id="email">
			</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<input type="text" placeholder="Name" id="uname">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="button" value="Verify Number" onclick="return mobile_missed_call()">
				<p id="msg"></p>
			</td>
		</tr>
	</table>
    
    <div id="result" style="margin-top: 100px; margin:0 auto;" align="center"></div>
	
	<hr />
	
</body>

</html>