<?php
$mysqli = new mysqli("localhost", "kim", "123456", "news");
$title = "New Website222";
$description = "looks good222";
$area = "Online, Duuh!222";

$stmt = $mysqli->prepare("INSERT INTO news (title, description, area)
                        VALUES (?,?,?)");

$stmt->bind_param("sss", $title, $description, $area);
$stmt->execute();