<?php declare(strict_types=1);
/**
 * Customer : inherits : Email and Password : from : User
 */

class Customer extends User {
    public $billAddress ,$pGallery, $creditCard;


    function __construct($email, $password){
        parent::__construct($email, $password);


     
    }




    function changeUser($email, $password) :void {
        try{
            require_once '../src/DBconnection.php';

            $user =[
                "email" => $email,
                "password" => $password,
            ];

            $sql = "UPDATE users
                    SET id = :id,
                        email = :email,
                        password = :password,
                    WHERE id = :id";

            $statement = $connection->prepare($sql);
            $statement->execute($user);

            if($statement)
                echo escape(" User details successfully updated. ");

        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
       
    }

    function changeBillAddress($fName, $sName, $addressLine1, $addressLine2, $postCode, $country) :void {
        try{
            require_once '../src/DBconnection.php';

            $user =[
                "fName" => $_POST[$fName],
                "sName" => $_POST[$sName],
                "addressLine1" => $_POST[$addressLine1],
                "addressLine2" => $_POST[$addressLine2],
                "postCode" => $_POST[$postCode],
                "country" => $_POST[$country],
            ];

            $sql = "UPDATE users
                    SET id = :id,
                        fName = :fName,
                        sName = :sName,
                        addressLine1 = :addressLine1,
                        addressLine2 = :addressLine2,
                        postCode = :postCode,
                        country = :country,
                    WHERE id = :id";

            $statement = $connection->prepare($sql);
            $statement->execute($user);

            if($statement)
                echo escape(" Address details successfully updated. ");


        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
       
    }

    function changeCreditCard($nameOnCard, $ccNr, $expDate, $secCode) :void {
        try{
            require_once '../src/DBconnection.php';

            $user =[
                "nameOnCard" => $_POST[$nameOnCard],
                "ccNr" => $_POST[$ccNr],
                "expDate" => $_POST[$expDate],
                "secCode" => $_POST[$secCode],
            ];

            $sql = "UPDATE users
                    SET id = :id,
                        nameOnCard = :nameOnCard,
                        ccNr = :ccNr,
                        expDate = :expDate,
                        secCode = :secCode,
                    WHERE id = :id";

            $statement = $connection->prepare($sql);
            $statement->execute($user);

            if($statement)
                echo escape(" Card details successfully updated. ");

        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
       
    }


    function insertBillAddress($ctcID, $custID , $fName, $sName, $addLine1, $addLine2, $zip, $country){
        require_once '../src/DBconnection.php';


       try {
            $new_user = array(
                "ctcID" => $ctcID,
                "custID" => $custID,
                "fName" => $fName,
                "sName" => $sName,
                "addLine1" => $addLine1,
                "addLine2" => $addLine2,
                "zip" => $zip,
                "country" => $country,
            );

            var_dump($new_user);
    

           $sql = sprintf("INSERT INTO %s (%s) values (%s)", "contact", implode(", ", array_keys($new_user)), ":" . implode(", :", array_keys($new_user)));
           $statement = $connection->prepare($sql)->execute($new_user);
           echo("Address entered successfully");
       } 
       catch(PDOException $error) {
           echo $sql . "<br>" . $error->getMessage();
       }
    }


    function insertCreditCard($custID, $ccNr, $fName, $sName, $expDate, $secNr){
        require_once '../src/DBconnection.php';


        try {
            $new_user = array(
                "custID" => $custID,
                "ccNr" => $ccNr,
                "fName" => $fName,
                "sName" => $sName,
                "expDate" => $expDate,
                "secNr" => $secNr,
            );


            $sql = sprintf("INSERT INTO %s (%s) values (%s)", "payment", implode(", ", array_keys($new_user)), ":" . implode(", :", array_keys($new_user)));
            $statement = $connection->prepare($sql)->execute($new_user);
            echo ("Card Details entered successfully");
        } 
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
}