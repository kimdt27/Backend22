<?php
$myvar1 = 1;
$myvar2 = 1;
if($myvar1 == $myvar2){
    echo "Yes myvar1 and myvar2 are equal!";
}
?>

<?php
$myvar1 = 1;
$myvar2 = 1;
if($myvar1 == $myvar2){
    echo "Yes myvar1 and myvar2 are equal!";
}else{
    echo "No myvar1 and myvar2 are not equal!";
}
?>

<?php
$myvar1 = 1;
$myvar2 = 1;
if($myvar1 == $myvar2){
    echo "Yes myvar1 and myvar2 are equal!";
}elseif($myvar1 < $myvar2){
    echo "myvar1 is smaller than myvar2!";
}else{
    echo "No myvar1 and myvar2 are not equal!";
}
?>