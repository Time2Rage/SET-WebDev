<?php

require_once "../src/config.php";

        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $DBpassword, $options);
        }

        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }

       





    
?>