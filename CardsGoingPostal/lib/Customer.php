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
    function updateUser($email, $password){
        include_once '../src/common.php';
       // if (isset($this->email) && $this->email!=NULL && isset($this->password) && $this->password!=NULL){
            try{
                $sql = "UPDATE  user
                        SET     email =     :email,
                                password =  :password
                        WHERE   email =     :email";

                $user = array(
                    'email' => $email,
                    'password' => $password,
                );

                insert($sql, $user,"User details successfully updated.", "");
            }
            catch(PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }
        //} else {
         //   echo "DOING NOTHING BECAUSE EMAIL OR PASSWORD ARE EMPTY";
        //}
    }

    // Adds billing address to the user account
    function insertBillAddress($ctcID, $custID, $fName, $sName, $addLine1, $addLine2, $zip, $country){
        include '../lib/Contact.php';

        $Contact = new Contact($ctcID, $custID, $fName, $sName, $addLine1, $addLine2, $zip, $country);


        $Contact->insertBillAddress();
    }




    // Changes customers billing address
    #!RD NEED TO IMPLEMENT: if and only-if the field has changed
    public function updateBillAddress($ctcID, $custID, $fName, $sName, $addLine1, $addLine2, $zip, $country) {
        include '../lib/Contact.php';

        $Contact = new Contact($ctcID, $custID, $fName, $sName, $addLine1, $addLine2, $zip, $country);

        $Contact->updateBillAddress();
    }

    public function deleteAddress($userIDContainer){
        include '../lib/Contact.php';
        $Contact = new Contact(0,$userIDContainer,0,0,0,0,0,0);

        $Contact->deleteAddress();
    }



    // Update customer payment info
    public function updateCreditCard($custID, $ccNr, $fName, $sName, $expDate, $secNr) {
        include '../public/Payment.php';
        $Payment = new Payment($custID, $ccNr, $fName, $sName, $expDate, $secNr);

        $Payment->updateCreditCard();
    }


    // Adds payment info to customer account
    public function insertCreditCard($custID, $ccNr, $fName, $sName, $expDate, $secNr){
        include '../public/Payment.php';
        $Payment = new Payment($custID, $ccNr, $fName, $sName, $expDate, $secNr);

        $Payment->insertCreditCard();
    }

    public function deleteCard($userIDContainer){
        include '../public/Payment.php';
        $Payment = new Payment($userIDContainer, 0, 0, 0, 0, 0);

        $Payment->deleteCard();
    }
}