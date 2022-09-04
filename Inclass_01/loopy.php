<?php
$num = 0;
while ($num < 10) {
    echo "$num is less than 10. <br />";
    $num++;
}
?>

<?php
$num = 0;
do {
    echo "$num is less than 10. <br />";
    $num++;
} while ($num < 10);
?>

<?php
for ($num=0; $num<10; $num++){
    echo "$num is less than 10. <br />";
}
?>

<?php
$x=array("one","two","three");
foreach ($x as $value)
{
    echo $value . "<br />";
}
?>
