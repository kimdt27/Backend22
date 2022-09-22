<?php
require_once ("includes/connection.php");
$result = mysqli_query($connection, "SELECT * FROM imgs");
while ($row = mysqli_fetch_array($result)){
    echo "<b>id:</b>".$row['ID']."<br>";
    echo "<b>filename:</b>".$row['filename']."<br>";
    echo "<b>IMG:</b><img src='img/".$row['filename']."' width='150'><br>";
echo "<a href='delete_pro.php?id=".$row['ID']."'"?>
onclick="return confirm('are you sure!');"
<?php echo ">Delete!</a>";
echo "<hr>";
}