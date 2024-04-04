<?php

    $server = "localhost";
    $user = "root";
    $pw = "ADMIN";
    $db = "LampDB";

    $conn = mysqli_connect($server, $user, $pw, $db);

    if(!$conn) {
        echo "Connection failed!";        
    }