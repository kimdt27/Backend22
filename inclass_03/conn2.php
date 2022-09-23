<?php
try {
    $db2 = new PDO("mysql:dbname=simple;host=localhost;charset=utf8","kim","123456");
}catch (PDOException $err){
    echo "conn PDO failed: ". $err->getMessage();
}
