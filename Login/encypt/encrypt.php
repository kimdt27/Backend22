<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php 
$str = "123456";
$sha = sha1($str);
$md5 = md5($str);

echo "This is a sha1 encrypted version of \"123456\"<br />".$sha;
echo "<br />The lengh of the encrypted string is: <b>".strlen($sha)."</b>";
echo "<br /><br />";
echo "This is a md5 encrypted version of \"123456\"<br />".$md5;
echo "<br />The lengh of the encrypted string is: <b>".strlen($md5)."</b>";
?>
</body>
</html>