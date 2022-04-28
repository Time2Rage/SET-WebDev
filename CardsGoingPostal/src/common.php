<?php
     function escape($data) {
                $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
                $data = trim($data);
                $data = stripslashes($data);
                return ($data);
     }


    function dbCall($sqlCommand){
        require '../src/DBconnection.php';

        $statement = $connection->prepare($sqlCommand);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    function insert($sql, $dets, $message, $header){
        require '../src/DBconnection.php';

        $statement = $connection->prepare($sql);

        foreach($dets as $key => &$value){
            $statement->bindParam(":".$key, $value, PDO::PARAM_STR);

            var_dump($key);
            var_dump($value);
        }

        $statement->execute();

        if($statement)
            echo escape($message);

        header($header);
    }


    function userIDCont($userName){
        $userID = dbCall("SELECT * FROM customer WHERE email = '$userName'");
        return ($userID['custID']);
    }

    function res1($userName){
        return dbCall("SELECT * FROM user WHERE email = '$userName'");
    }

    function res2($userIDContainer){
        return dbCall("SELECT * FROM contact WHERE custID = '$userIDContainer'");
    }

    function res3($userIDContainer){
        return dbCall("SELECT * FROM payment WHERE custID = '$userIDContainer'");
    }
?>