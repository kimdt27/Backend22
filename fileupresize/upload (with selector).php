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

                if($_POST['resizetype']=="width"){
                    $width = $_POST['size'];
                    $resOBJ ->resizeToWidth($width);
                    array_push($upmsg, "Image resized to a width of $width px");
                }
                elseif($_POST['resizetype']=="height"){
                    $height = $_POST['size'];
                    $resOBJ ->resizeToHeight($height);
                    array_push($upmsg, "Image resized to a height of $height px");
                }
                elseif($_POST['resizetype']=="scale"){
                    $scale = $_POST['size'];
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
    <b>Resize to:</b> <select name="resizetype">
        <option value="height">Height</option>
        <option value="width">Width</option>
        <option value="scale">Scale</option>
    </select>
    <b>Size:</b> <input type="text" name="size"> px or %<br />
    <input name="Submit" type="submit" value="Submit">
</form>
</body>
</html>