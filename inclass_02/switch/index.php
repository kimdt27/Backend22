<a href="index.php?page=about">about</a><br>
<a href="index.php?page=contact">contact</a><br>

<?php
if (isset($_GET['page'])){
    $page = $_GET['page'];
    }else{
    $page = 'index';
    }

switch ($page){
    default:
        include("home.php");
        break;

    case "about":
        include("aout.php");
        break;

    case "contact":
        include "contact.php";
        break;
}
