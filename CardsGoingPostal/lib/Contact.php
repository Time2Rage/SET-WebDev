<?php declare(strict_types=1);

class Contact{
    public $ctcID, $custID, $fName, $sName, $addLine1, $addLine2, $zip, $country;


    public function __construct($ctcID, $custID, $fName, $sName, $addLine1, $addLine2, $zip, $country) {
        $this->ctcID = $ctcID;
        $this->custID = $custID;
        $this->fName = $fName;
        $this->sName = $sName;
        $this->addLine1 = $addLine1;
        $this->addLine2 = $addLine2;
        $this->zip = $zip;
        $this->country = $country;
    }


    function insertBillAddress(){
        try {
            include_once '../src/common.php';


            $sql = "INSERT INTO contact VALUES (:ctcID, :custID, :fName, :sName, :addLine1, :addLine2, :zip, :country)";

            $user = [
                "ctcID" =>  $this->ctcID,       "custID" =>  $this->custID,
                "fName" =>  $this->fName,       "sName" =>  $this->sName,
                "addLine1" =>  $this->addLine1, "addLine2" =>  $this->addLine2,
                "zip" =>  $this->zip,           "country" =>  $this->country
            ];

            insert($sql, $user, "Address details successfully added.", "location:profile.php");

        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }


    function updateBillAddress(){
        try{
            include_once '../src/common.php';

            $sql = "UPDATE  contact 
                    SET     ctcID =     :ctcID,     custID =    :custID, 
                            fName =     :fName,     sName =     :sName, 
                            addLine1 =  :addLine1,  addLine2 =  :addLine2, 
                            zip =       :zip,       country =   :country 
                    WHERE   custID =    :custID";

            $user = [
                "ctcID" =>  $this->ctcID,       "custID" =>  $this->custID,
                "fName" =>  $this->fName,       "sName" =>  $this->sName,
                "addLine1" =>  $this->addLine1, "addLine2" =>  $this->addLine2,
                "zip" =>  $this->zip,           "country" =>  $this->country
            ];

            insert($sql, $user, "Address details successfully updated.", "location:profile.php");
        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }


    function deleteAddress(){
        try{
            include_once '../src/common.php';

            $sql = "DELETE FROM contact WHERE custID = :custID";

            $user = [
                "custID" =>  $this->custID
            ];

            insert($sql, $user, "Address details successfully updated.", "location:profile.php");
        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
}