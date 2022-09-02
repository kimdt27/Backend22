<?php
function output_it( ){
    echo "second.<br>";
}
?>

<?php
echo "first.<br>";
output_it( );
echo "third.";
?>

<?php
function writeName($fname)
{
    echo $fname . " Jensen<br />";
}

echo "My name is ";
writeName("Kaj");
echo "My sister's name is ";
writeName("Lise");
echo "My brother's name is ";
writeName("Gert");
?>

<?php
function add($x,$y)
{
    $total=$x+$y;
    return $total;
}

echo "1 + 16 = " . add(1,16);
?>
<?php
