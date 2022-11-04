<?php
spl_autoload_register(function ($class)
{include("".$class.".php");});

$controller = new Controller();

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller = $controller->{$_GET['action']}();

}else{
    echo "<a href='index.php?action=welcomePage'>View page 1</a>";
    echo "<br><br>";
    echo "<a href='index.php?action=welcomePage2'>View page 2</a>";
    
}
