<?php
if(isset($_GET['msgid'])){
    if($_GET['msgid'] == 1){
        echo "Error one!";
    }elseif ($_GET['msgid'] == 2){
        echo "Spanks for the email!";
    }elseif ($_GET['msgid'] == 3){
        echo "Email wrong dammnit!!!1";
    }
}
?>

<form method="post" action="send.php">
    Email: <input type="text" name="email"/>
    <br>
    Message: <textarea name="message" rows="10" cols="50">

    </textarea>
    <br>
    <input type="submit">
</form>

