<?php declare(strict_types=1);

class Payment{

    public $custID, $ccNr, $fName, $sName, $expDate, $secNr;

    public function __construct($custID, $ccNr, $fName, $sName, $expDate, $secNr){
        $this->custID = $custID;
        $this->ccNr = $ccNr;
        $this->fName= $fName;
        $this->sName = $sName;
        $this->expDate = $expDate;
        $this->secNr= $secNr;
    }

      

    function charge($amount)
    {

  
    }

    /*
     * Insert card deatils using
     */
    function insertCreditCard(){
        try {
            include_once '../src/common.php';

            $sql = "INSERT INTO payment VALUES (:custID, :ccNr, :fName, :sName, :expDate, :secNr)";

            $user = [
                "custID" =>  $this->custID,     "ccNr" =>  $this->ccNr,
                "fName" =>  $this->fName,       "sName" =>  $this->sName,
                "expDate" =>  $this->expDate,   "secNr" =>  $this->secNr
            ];

            insert($sql, $user, "Card details successfully added.", "location:profile.php");
        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    function updateCreditCard() :void {
        try{
            include_once '../src/common.php';

            $sql = "UPDATE  payment 
                    SET     custID = :custID,   ccNr = :ccNr,     
                            fName = :fName,     sName = :sName, 
                            expDate = :expDate, secNr = :secNr
                    WHERE   custID = :custID";

            $user =[
                "custID" =>  $this->custID,     "ccNr" =>  $this->ccNr,
                "fName" =>  $this->fName,       "sName" =>  $this->sName,
                "expDate" =>  $this->expDate,   "secNr" =>  $this->secNr
            ];

            insert($sql, $user, "Card details successfully updated.", "location:profile.php");
        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    function deleteCard(){
        try{
            include_once '../src/common.php';

            $sql = "DELETE FROM payment WHERE custID = :custID";

            $user = [
                "custID" =>  $this->custID
            ];

            insert($sql, $user, "Cards deatils deleted.", "location:profile.php");
        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }


}