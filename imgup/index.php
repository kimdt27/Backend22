<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit">
</form>
<?php
if (isset($_POST['submit'])){
    if ((($_FILES['file']['type']=="image/gif") ||
        ($_FILES['file']['type']=="image/jpeg") ||
        ($_FILES['file']['type']=="image/png") ||
        ($_FILES['file']['type']=="image/pjpeg"))&&
        ($_FILES['file']['size']<10000000)){
        if($_FILES['file']['error']>0){
            echo "error code: ". $_FILES['file']['error'];
        }else{
            echo "Uploaded: ". $_FILES['file']['name']. "<br>";
            echo "Type: ". $_FILES['file']['type']. "<br>";
            echo "Size: ". $_FILES['file']['size']. "<br>";
            echo "Temp file: ".$_FILES['file']['tmp_name']. "<br>";

            if (file_exists("img/".$_FILES['file']['name'])){
                echo "no dude, you already have tha file!";
            }else{
                move_uploaded_file($_FILES['file']['tmp_name'], "img/".$_FILES['file']['name']);
                $conn = mysqli_connect("localhost", "admin2", "123456", "img");
                //$myFile = $_FILES['file']['name'];
                $sql = "INSERT INTO `imgs`(`ID`, `filename`) VALUES (NULL, '".$_FILES['file']['name']."')";
                echo $sql;
                mysqli_query($conn, $sql);

            }
        }
    }else{ echo "invalid file!";}
}