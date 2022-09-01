<?php
$functions = get_defined_functions();
echo count($functions['internal']);
echo "<br>";
//var_dump($functions);

$intfuncs = $functions['internal'];

foreach($intfuncs as $func){
echo $func."<br>";
}
?>