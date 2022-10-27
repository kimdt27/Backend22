<?php

function hashPassword($password) {
    //needs php 7.3
    $hp = password_hash($password, PASSWORD_ARGON2ID,
        ['memory_cost' => 1024<<8
            /*(default 1024, bitwise operator, multiplies by 2 twice)*/,
            'time_cost' => 8
            /*(default 4)*/,
            'threads' => 2
            /*(default 2)*/
        ]);
    var_dump($hp);
    return $hp;
}

function verifyPassword($password, $hp) {
    echo password_verify($password, $hp) ? "<p style='color:green;'>MATCHED</p>" : "<p style='color:red;'>NO MATCH</p>";
}

$pass = 'Secret_password1!';
$hashedPass = hashPassword($pass);
verifyPassword($pass, $hashedPass);
