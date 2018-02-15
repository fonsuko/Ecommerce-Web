<?php
	session_start();
	mysql_connect("localhost","root","root");
	mysql_select_db("member");

	$strSQL = "SELECT * FROM admin WHERE adm_name = '".mysql_real_escape_string($_POST['user'])."'
	and adm_pwd = '".mysql_real_escape_string($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["adm_name"] = $objResult["adm_name"];
			$_SESSION["adm_pwd"] = $objResult["adm_pwd"];

			session_write_close();

	}
	mysql_close();
?>
