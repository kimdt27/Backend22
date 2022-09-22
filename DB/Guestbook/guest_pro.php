<?php
require ("includes/connection.php");
if(isset($_POST['email'])) {

    function err($error) {
        echo "Error processing your form input<br /><br />";
        echo "<b>The errors are:</b><br />";
        echo $error."<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        err('no input to validate.');
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $err_msg = "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_msg .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$name)) {
        $err_msg .= 'The Name you entered does not appear to be valid.<br />';
    }

    if(strlen($message) < 2) {
        $err_msg .= 'The Message you entered does not appear to be valid.<br />';
    }

    if(strlen($err_msg) > 0) {
        err($err_msg);
    }


$query = "INSERT INTO `guestbook` (`ID`, `name`, `email`, `message`) VALUES (NULL, '$name', '$email', '$message');";

mysqli_set_charset($connection, "utf8");
    if (!mysqli_query($connection, $query))
    {
        die('Error: ' . mysqli_error($connection));
    }
    ?>

    <!-- your success msg -->
    Thank you for your message <?php echo $name; ?>.

    <?php
}
?>
