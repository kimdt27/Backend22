<?php
$mymail = "yourname@yourpage.com";
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";

if (!preg_match($regexp,$_POST['email']))
	  {echo "Email wrong";}
elseif (empty($email) || empty($message) || empty($subject)) 
	{echo "Empty field";}

elseif ($_POST['submit'])
{
	$body = "$message\n\nE-mail: $email";
	mail($mymail,$subject,$body,"From: $email\n");
	echo "Thanks for your E-mail";
}
?>
