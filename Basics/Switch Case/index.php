<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<a href="index.php?page=home">Home<a/>

<a href="index.php?page=news">News<a/>

<a href="index.php?page=contact">Contact<a/>

<?php
if (isset($_GET['page'])){
	$page = $_GET['page'];
	}else{
		$page = "index";}

switch($page) {

default:
include('home.php');
break;

case "news":
include('news.php');
break;

case "contact":
include('contact.php');
break;

}  
?>

</body>
</html>