<?php 
/*
 Name : Mobile Verification
 URL : http://tanvirshaikat.webutu.com
 For Support : ta.shaikat@gmail.com
 */

define("HOSTNAME",""); // Please provide DB host name here

define("USERNAME",""); // Please provide DB user name here

define("PASSWORD",""); // Please provide DB password here

define("DATABASENAME",""); // Please provide DB Name here

define("APPID",""); // Please provide Cognalys App Id here

define("ACCESSTOKEN",""); // Please provide Cognalys Access Token here


$conn=@mysql_connect(HOSTNAME,USERNAME,PASSWORD);

	if(@mysql_ping())
		{
			if(!mysql_select_db(DATABASENAME))
			{
				echo '<div style="color:red; font-size:20px;" align="center">Database Details are Not Correct. Please, Check config.php file.</div>';
				die();
			}
			elseif(mysql_num_rows(mysql_query("SHOW TABLES LIKE 'mobileverifier_data'")) == 0)
			{
				echo '<div style="color:red; font-size:20px;" align="center">Import database.sql file to the Database. </div>';
				die();
			}
		}
		else 
		{
			echo '1<div style="color:red; font-size:20px;" align="center">Database Details are Not Correct. Please, Check config.php file.</div>';
			die();
		}
?>