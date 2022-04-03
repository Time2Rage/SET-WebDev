<?php
    $host = "localhost";
    $dbname = "CGP";
    $dbDSN = "mysql:host=$host;dbname=$dbname";
    $username = "root";
    $DBpassword = "JadenYuki1//";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    $DBconfig = array(
        "DB_dsn" => "mysql:host=$host;dbname=$dbname",
        "DB_usr" => $username,
        "DB_pass" => $DBpassword,
        "DB_opt" => $options,
    );
?>