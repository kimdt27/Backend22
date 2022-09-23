<?php
if (isset($_POST['submit'])){
    if((($_FILES["img-file"]["type"] == "image/gif")||
        ($_FILES["img-file"]["type"] == "image/jpeg")||
        ($_FILES["img-file"]["type"] == "image/jpg")||
        ($_FILES["img-file"]["type"] == "image/png"))&&
    ($_FILES["img-file"]["size"]<10000000)){
        echo "aproved";
        if($_FILES["img-file"]["error"]<=0){
            echo "name: ". $_FILES["img-file"]["name"];
            echo "type: ".$_FILES["img-file"]["type"];
            echo "size: ".$_FILES["img-file"]["size"];
            echo "tempname: ".$_FILES["img-file"]["tmp_name"];
            if (!file_exists("img/".$_FILES["img-file"]["name"])){
                move_uploaded_file($_FILES["img-file"]["tmp_name"],"img/".$_FILES["img-file"]["name"]);
            }
        }
    }
}