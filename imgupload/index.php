<html>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="imgfile">
    <input type="submit" name="submit">
</form>
</body>
</html>
<?php
if (isset($_POST['submit'])){
    if(($_FILES['imgfile']['type']=="image/jpeg" ||
        $_FILES['imgfile']['type']=="image/pjpeg" ||
        $_FILES['imgfile']['type']=="image/gif" ||
        $_FILES['imgfile']['type']=="image/jpg")&& (
         $_FILES['imgfile']['size']< 3000000
        )){
        if ($_FILES['imgfile']['error']>0){
            echo "Error: ". $_FILES['imgfile']['error'];
        }else{
            echo "Name: ".$_FILES['imgfile']['name']."<br>";
            echo "Type: ".$_FILES['imgfile']['type']."<br>";
            echo "Size: ".($_FILES['imgfile']['size']/1024)."<br>";
            echo "Tmp_name: ".$_FILES['imgfile']['tmp_name']."<br>";

            if (file_exists("upload/".$_FILES['imgfile']['name'])){
                echo "can't upload: ". $_FILES['imgfile']['name']. " Exists";
            }else{
                move_uploaded_file($_FILES['imgfile']['tmp_name'],
                    "upload/".$_FILES['imgfile']['name']);
                echo "stored in: upload/".$_FILES['imgfile']['name'];
                $conn = mysqli_connect("localhost","root","123456","imgup");
                $sql = "INSERT INTO `imgs` (`ID`, `filename`) VALUES 
                        (NULL, '". $_FILES['imgfile']['name']."')";
                echo $sql;
                mysqli_query($conn,$sql);

            }
        }
    }
}