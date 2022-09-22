<?php require_once("includes/connection.php"); ?>
<html>
<body>
<h1 align="center">Edit image</h1>

<?php
$id=$_GET['id'];
$query = "SELECT * FROM img WHERE ID='$id'";
$result=mysqli_query($connection, $query);

while($row=mysqli_fetch_array($result)){
echo "<b>Id :</b> $row[ID] <br/>";
    echo "<b>Description:</b> $row[description] <br/>";
    echo "<b>Image:</b> $row[filename] <br /> <img src=\"img/$row[filename]\" width=\"100\" > <br/>";
?>
    <form name="upload" method="post" action="editpro.php">
        <h1>Image edit</h1>
        <h2>Here you can edit your image description!</h2>
        <b>Description:</b><br> <textarea name="desc"><?php echo $row['description']; ?></textarea><br />
        <input name="id" type="hidden" value="<?php echo $id; ?>">
        <input name="Submit" type="submit" value="Save">
    </form>


<?php
}
mysqli_close($connection);
?>
</body>
</html>