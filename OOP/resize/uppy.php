<?php
spl_autoload_register(function ($class){
    include $class.".php";});

define("MAXSIZE", 3000);
$upmsg = array();

if(isset($_POST['submit'])){
    if($_FILES['image']['name']){
        $imageName = $_FILES['image']['name'];
        $file = $_FILES['image']['tmp_name'];
        $imageType = getimagesize($file);
        if(($imageType[2]==1) ||($imageType[2]==2) ||($imageType[2]==3)){
            $size = filesize($_FILES['image']['tmp_name']);
            if($size<MAXSIZE*1024){
                $prefix = uniqid();
                $iName = $prefix ."_" .$imageName;
                $newName = "img/".$iName;
                $resOBJ = new Resizer();
                $resOBJ->load($file);

                if ($_POST['Rtype'] == "width"){
                    $width = $_POST['size'];
                    $resOBJ->resizeToWidth($width);
                    array_push($upmsg, "Image resized to new width of $width");
                }elseif($_POST['Rtype'] == "height"){
                    $height = $_POST['size'];
                    $resOBJ->resizeToHeight($height);
                    array_push($upmsg, "Image resized to new height of $height");}
                elseif($_POST['Rtype'] == "scale"){
                    $scale = $_POST['size'];
                    $resOBJ->scale($scale);
                    array_push($upmsg, "Image resized to new scale of $scale");
                }
                $resOBJ->save($newName);
                $mysqli = new mysqli("localhost", "admin2", "123456", "imgy");
                $mysqli->query("INSERT INTO imgs (filename) VALUES ('$iName')");
                array_push($upmsg, "succes!");
            }
    }}
}
?>
<h1>upload your imgs</h1>
<?php
foreach ($upmsg as $msg){
    echo "<h3>$msg</h3>";
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    resize to:<br>
    <select name="Rtype">
        <option value="height">height</option>
        <option value="width">width</option>
        <option value="scale">scale</option>
    </select><br>
    <input type="text" name="size"> px or %<br>
    <input type="submit" value="submit" name="submit">
</form>