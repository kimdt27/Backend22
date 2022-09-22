<?php require_once "dbcon.php";
if (isset($_GET['ID'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit entry</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<?php
$entryID = $_GET['ID'];
$dbCon = dbCon($user, $pass);
$query = $dbCon->prepare("SELECT * FROM customers WHERE ID=$entryID");
$query->execute();
$getUsers = $query->fetchAll();
?>
<body>

<div class="container">
        <h3>Editing user "<?php echo $getUsers[0][1]; ?>"</h3>
        <form class="col s12" name="contact" method="post" action="updateEntry.php">
            <div class="row">
                <div class="input-field col s12">
                    <input id="userName" name="userName" type="text" value="<?php echo $getUsers[0][1]; ?>" class="validate" required="" aria-required="true">
                    <label for="userName">Username</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="firstName" name="firstName" type="text"value="<?php echo $getUsers[0][2]; ?>" class="validate" required="" aria-required="true">
                    <label for="firstName">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="lastName" name="lastName" type="text"value="<?php echo $getUsers[0][3]; ?>" class="validate" required="" aria-required="true">
                    <label for="lastName">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email"value="<?php echo $getUsers[0][4]; ?>" class="validate" required="" aria-required="true">
                    <label for="email">E-Mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="description" id="description" class="materialize-textarea" required="" aria-required="true"><?php echo $getUsers[0][6]; ?></textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            <input type="hidden" name="entryID" value="<?php echo $entryID; ?>">
            <button class="btn waves-effect waves-light" type="submit" name="submit">Update
            </button>
        </form>
    </div>
</div>
</body>
</html>
<?php }else{    header("Location: index.php?status=0");
}?>