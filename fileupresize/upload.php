<?php
spl_autoload_register(function ($class)
{include"".$class.".php";});
define ("MAX_SIZE","3000");
$upmsg = array();
if(isset($_POST['Submit']))
{
    if ($_FILES['image']['name'])
    {
        $imageName = $_FILES['image']['name'];
        $file = $_FILES['image']['tmp_name'];
        $image_type = getimagesize($file);

        if (($image_type[2] = 2) || ($image_type[2] = 3) || ($image_type[2] = 0))
        {
            $size=filesize($_FILES['image']['tmp_name']);

            if ($size < MAX_SIZE*1024)
            {
                $prefix = uniqid();
                $iName = $prefix."_".$imageName;
                $newName="img/".$iName;
                $resOBJ = new imageResizer();
                $resOBJ ->load($file);

                if($_POST['wsize'] && $_POST['hsize']){
                    $width = $_POST['wsize'];
                    $height = $_POST['hsize'];
                    $resOBJ ->resize($width,$height);
                    array_push($upmsg, "Image resized to $width X $height px");
                }
                elseif($_POST['wsize']){
                    $width = $_POST['wsize'];
                    $resOBJ ->resizeToWidth($width);
                    array_push($upmsg, "Image resized to a width of $width px");
                }
                elseif($_POST['hsize']){
                    $height = $_POST['hsize'];
                    $resOBJ ->resizeToHeight($height);
                    array_push($upmsg, "Image resized to a height of $height px");
                }
                elseif($_POST['ssize']){
                    $scale = $_POST['ssize'];
                    $resOBJ ->scale($scale);
                    array_push($upmsg, "Image resized to a scale of $scale %");
                }
            }else{
                array_push($upmsg, "Image is to big: Max 3 Mb!");
            }
        }else{
            array_push($upmsg, "Unknown filetype!");
        }
    $resOBJ ->save($newName);
    $mysqli = new mysqli("localhost", "root", "123456", "imgup");
    $mysqli->query ("INSERT INTO img (filename) VALUES ('".$iName."')");
    array_push($upmsg, "Image successfully uploaded!");
    }else{
        array_push($upmsg, "ERROR: You need to select an image!");
    }
}
?>
<html>
<body>
<?php
foreach ($upmsg as $msg)
{
echo "<h1>".$msg."</h1>";
}
?>
<form name="imgup" method="post" enctype="multipart/form-data"  action="">
    <h1>Image upload</h1>
    <h2>Here you can upload an image!</h2>
    <b>Image:</b> <input type="file" name="image" value=""><br />
    <b>Width:</b> <input type="text" name="wsize"> px<br />
    <b>Height:</b> <input type="text" name="hsize"> px<br />
    <b>Scale:</b> <input type="text" name="ssize"> %<br />
    <input name="Submit" type="submit" value="Submit">
</form>
</body>
</html>