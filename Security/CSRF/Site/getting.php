<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!empty($_POST['token'])) {
        if (hash_equals($_SESSION['token'], $_POST['token'])) {
            unset($_SESSION['token']);
            $_SESSION['posted'] = true;
            $_SESSION['field'] = $_POST['email'];
        } else {
            die('CSRF VALIDATION FAILED');
        }
    }
    else
    {
        die('CSRF TOKEN NOT FOUND. ABORT');
    }
}
header("location: index.php");