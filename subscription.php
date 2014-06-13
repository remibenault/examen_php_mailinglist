<?php

/* PHP réalisé avec l'aide de Thib, on ne va pas se mentir */

if($_POST['submit']){

// ERREURS

$no_error=null;
$error_no_email=null;
$error_wrong_email=null;
$error_email_used=null;


// CLEAN BEFORE AND AFTER ADRESS

$mail = stripslashes(trim(strip_tags($_POST['mail'])));


// CHECK IF ADRESS MAIL IS RIGHT OR NOT, STRUCTURE WITH ----@----.---

function valid_email($mail){
 	return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $mail)) ? FALSE : TRUE;
}

// SET THE DATABASE

$checkMailQuery = mysql_query("SELECT * FROM exam_php WHERE email='$mail'");


// MESSAGES FOR ERRORS AND CONFIRMATION


if($no_error==null){
	$thank_you="thank you for your subscription please, check your email";
}

if(!$mail){
	$error_no_email="you forgot to enter your email ";
	$no_error="1";
} 	

if(!valid_email($mail) and $error_email_used==null){
	$error_wrong_email="you've entered wrong email";
	$no_error="1";
}

if(mysql_num_rows($checkMailQuery) > 0){
	$error_email_used="This email is already used";
	$no_error="1";
}


// IF THERE IS NO ERROR, SEND EMAIL AND SAVE IN DB

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
$headers .= 'From: displayer' . "\r\n";

$message = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><meta name='viewport' content='width=device-width, initial-scale=1.0'/><title>displayer - newsletter subscription</title></head><body><h1 style='color:#888888;font-size:21px;margin-bottom:18px;font-weight:normal;'>disp<span style='color:#555555;font-weight:bold;'>layer</span></h1><h2 style='color:#000000;font-size:16px;line-height:1.5;'>You're awesome</h2><p>Thank you for your subcription, you'll get notification for every new update or feature.</p><p style='font-weight:lighter;font-size:12px;margin-top:32px;'>Rémi</p></body></html>";	

if($no_error==null){ 	

	$query = mysql_query("INSERT INTO exam_php VALUES('','$mail')");
	mail($mail," displayer - inscription newsletter",$message,$headers);
	
	
}

}

?>