<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php //confirm_logged_in(); ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>

<?php
// START FORM PROCESSING
if (isset($_POST['submit'])) { // Form has been submitted.

	// perform validations on the form data
	$username = trim(mysqli_real_escape_string($connection, $_POST['user']));
	$password = trim(mysqli_real_escape_string($connection, $_POST['pass']));
    $iterations = ['cost' => 15];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);

	$query = "INSERT INTO `users` (user, pass) VALUES ('{$username}', '{$hashed_password}')";
	$result = mysqli_query($connection, $query);
		if ($result) {
			$message = "User Created.";
		} else {
			$message = "User could not be created.";
			$message .= "<br />" . mysqli_error($connection);
		}
}

if (!empty($message)) {echo "<p>" . $message . "</p>";}
?>
<h2>Create New User</h2>

<form action="" method="post">
Username:
<input type="text" name="user" maxlength="30" value="" />
Password:
<input type="password" name="pass" maxlength="30" value="" />
<input type="submit" name="submit" value="Create" />
</form>

</body>
</html>
<?php
if (isset($connection)){mysqli_close($connection);}
?>
