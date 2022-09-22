<?php require_once("includes/connection.php"); ?>
<html>
<body>
<h1 align="center">Handle your images</h1>
<a href="upload.php">Upload a new image!</a>
<br><br>
<?php
$result=mysqli_query($connection, "SELECT * FROM img ORDER BY ID DESC");

while($row=mysqli_fetch_array($result)){
echo "<b>Id :</b> $row[ID] <br/>";
    echo "<b>Description:</b> $row[description] <br/>";
    echo "<b>Image:</b> $row[filename] <br /> <img src=\"img/$row[filename]\" width=\"200\" > <br/>";

    echo '<a href="deletepro.php?id='.$row['ID'].'"'; ?>
    onclick="return confirm('Are you sure you want to delete this image? \nNotice: the image will be completely gone, and will have to be re-uploaded.');"
    <?php echo ' >Delete this image</a><br>';

    echo '<a href="editui.php?id='.$row['ID'].'"'; ?>
    onclick="return confirm('Are you sure you want to edit this image?');"
    <?php echo ' >Edit this images description</a>';

echo "<hr>";
}

mysqli_close($connection);
?> 
</body>
</html>