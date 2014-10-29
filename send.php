<?php
$pass=0;
$cname1=filter_var($_POST['txtFirstName'], FILTER_SANITIZE_SPECIAL_CHARS);
$cname2=filter_var($_POST['txtLastName'], FILTER_SANITIZE_SPECIAL_CHARS);+
$phone1=filter_var($_POST['txtCphone'], FILTER_SANITIZE_SPECIAL_CHARS);
$phone2=filter_var($_POST['txtHphone'], FILTER_SANITIZE_SPECIAL_CHARS);
$address=filter_var($_POST['txtAddress'], FILTER_SANITIZE_SPECIAL_CHARS);
$ctime=filter_var($_POST['contacttime'], FILTER_SANITIZE_SPECIAL_CHARS);
$cmessage=filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);
require_once('recaptchalib.php');
  
$privatekey = "";
$resp = recaptcha_check_answer ($privatekey,
	$_SERVER["REMOTE_ADDR"],
	$_POST["recaptcha_challenge_field"],
	$_POST["recaptcha_response_field"]
);
	
if($cname1=='First Name*'||$cname2=='Last Name*'||$address=='Address*'||$cmessage=='')
{
	header("Location: * ");//description field is empty and need to be filled for insertion
}
else if(!$resp->is_valid)
{
	die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
	 "(reCAPTCHA said: " . $resp->error . ")");
}
else
{
	if($phone1=='Cell Phone')
	{
		$phone1=' ';
	}
	if($phone2=='Home Phone')
	{
		$phone2=' ';
	}
	if($ctime=='A time to call:')
	{
		$ctime=' ';
	}
	/* Sending the Email to the Admin */
	$toEmail="ok@ok.com" . ", ";
	$toEmail.="sure@sure.com";
	$subject="Maintenance Request";
	$message="
	Name: $cname1 $cname2 
	Phone: $phone1 $phone2 
	Address: $address 
	Time to call: $ctime
	Message : $cmessage";
	$headers="From: noreply@onlineserver.cc";
	if (mail($toEmail, $subject, $message, $headers))
	{ 
		$pass=1; 
	}
	else
	{
		header("Location: #?status=0");
	}
	if($pass==1)
	{
		header("Location: #?status=1");
	} 
	else
	{
		header("Location: #?status=0");
	}
}
?>