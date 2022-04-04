<?php declare(strict_types=1);
/**
 * Customer : inherits : Email and Password : from : User
 */

class Customer extends User {
    public $billAddress ,$pGallery, $creditCard;


    function __construct($email, $password, $billAddress ,$pGallery, $creditCard){
        parent::__construct($email, $password);


        $this->billAddress = $billAddress;
        $this->pGallery = $pGallery;
        $this->creditCard = $creditCard;
    }
    



    function changeUser($email, $password) :void {
        try{
            require_once '../src/DBconnect.php';

            $user =[
                "email" => $_POST[$email],
                "password" => $_POST[$password],
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

    function billAddress($fName, $sName, $addressLine1, $addressLine2, $postCode, $country) :void {
        try{
            require_once '../src/DBconnect.php';

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

    function creditCard($nameOnCard, $ccNr, $expDate, $secCode) :void {
        try{
            require_once '../src/DBconnect.php';

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
}