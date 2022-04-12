<?php declare(strict_types=1);
/**
 * Customer : inherits : Email and Password : from : User
 */

class Customer extends User {
    public $billAddress ,$pGallery, $creditCard;


    function __construct($email, $password){
        parent::__construct($email, $password);
    }

    // Changes user data email and password
    function changeUser() :void {
        if (isset($_POST["email"]) && isset($_POST["password"])){
            try{
                require '../src/DBconnection.php';

                $user =[
                    "email" => $email,
                    "password" => $password,
                ];
                #!RD Table name was wrong (users != user)
                #!RD id is NOT the primary key. The user table has no field ID 

                ##!RD REDO OF ALL SQL STATEMENTS
                $sql = "UPDATE user
                        SET email = :email,
                            password = :password
                        WHERE email = :email";

                $statement = $connection->prepare($sql);
                $statement->bindParam(":email", $email, PDO::PARAM_STR);
                $statement->bindParam(":password", $password, PDO::PARAM_STR);
                $statement->execute();
                $user = $statement->fetch(PDO::FETCH_ASSOC);

                if($statement)
                    echo escape(" User details successfully updated. ");

            }
            catch(PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }
        } else {
            echo "DOING NOTHING BECAUSE EMAIL OR PASSWORD ARE EMPTY";
        }
    }

    // Changes customers billing address
    #!RD NEED TO IMPLEMENT: if and only-if the field has changed
    function changeBillAddress($fName, $sName, $addressLine1, $addressLine2, $postCode, $country) :void {
        try{
            require '../src/DBconnection.php';

            $user =[
                "fName" => $_POST[$fName],
                "sName" => $_POST[$sName],
                "addressLine1" => $_POST[$addressLine1],
                "addressLine2" => $_POST[$addressLine2],
                "postCode" => $_POST[$postCode],
                "country" => $_POST[$country],
            ];

            $sql = "UPDATE user
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

    // Update customer payment info
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

    // Adds billing address to the user account
    function insertBillAddress($ctcID, $custID , $fName, $sName, $addLine1, $addLine2, $zip, $country){
        require '../src/DBconnection.php';
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

    // Adds pyment info to customer account
    function insertCreditCard($custID, $ccNr, $fName, $sName, $expDate, $secNr){
        require '../src/DBconnection.php';


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