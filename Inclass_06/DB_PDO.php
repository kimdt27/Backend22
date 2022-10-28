<?php
$user = "kim";
$pass = "123456";
try {
    $DBH = new PDO('mysql:host=localhost;dbname=news', $user, $pass);
    /*foreach ($DBH->query('SELECT * FROM news') as $row){
        echo $row[1];
        echo $row[2];
        echo $row[3];
    }*/

    $stmtNew = $DBH->prepare("INSERT INTO news (title, description, area) 
                        VALUES (?,?,?)");

    $stmtNew->bindParam(1, $title);
    $stmtNew->bindParam(2, $description);
    $stmtNew->bindParam(3, $area);
    $stmtNew->execute();

    $stmt = $DBH->prepare("INSERT INTO news (title, description, area) 
                        VALUES (:title, :description, :area)");

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':area', $area);

    $title = "New Website";
    $description = "looks good";
    $area = "Online, Duuh!";
    $stmt->execute();
}catch (PDOException $e){
    echo "ERRRO!!!!!". $e->getMessage();
}