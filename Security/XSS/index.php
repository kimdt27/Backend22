<?php
require ("func.php");

if(isset($_POST['Submit'])){
    $text = $_POST['text'];
    //$text = htmlspecialchars($_POST['text']);
    //$text = mysqli_real_escape_string($connection,htmlspecialchars(trim($_POST['text'])));
    //$text = mysql_prep($_POST['text']);
    $query = "INSERT INTO sec (text) VALUES ($text)";
    $result = mysqli_query($connection, $query);
echo $query;
    echo "<h1>Succesfully added!</h1>";
}else{
    $text = "";
}
setcookie("user","Kim");
setcookie("pass","123456");

session_start();
?>
    <script src="keylogging.js"></script>
<form name="sec" method="post" action="">
    <h2>Here you can write a message!</h2>
    <b>message:</b> <!-- <input type="text" name="text" /><br />-->
    <textarea name="text"></textarea>
    <input name="Submit" type="submit" value="Submit">
</form>

<h1>DB output:</h1>
<?php
$select_query = "SELECT * FROM sec";
$select_result = mysqli_query($connection, $select_query);

while($row=mysqli_fetch_array($select_result)){
    echo "<b>Id :</b>";
    echo $row['ID']." <br>";
    echo "<b>text:</b>";
    echo $row['text'];
    echo "<br><hr>";
}
?>