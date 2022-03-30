<?php declare(strict_types=1);
/**
 * Customer : inherits : Email and Password : from : User
 */

class Customer extends User {
    public $fName, $sName, $billAddress ,$pGallery, $creditCard;


    function __construct($email, $password, $fName, $sName, $billAddress ,$pGallery, $creditCard){
        parent::__construct($email, $password);

        $this->fName = $fName;
        $this->sName = $sName;
        $this->billAddress = $billAddress;
        $this->pGallery = $pGallery;
        $this->creditCard = $creditCard;   
    }
    


    function changeDetails() :void {

        /*
        The middle man between the database and the display page:

            1. Create objects of the payment, gallery and contact classes to pass user info to, to get back the correspoding info back 
            2. Pass that info to a form to display 
            3. Have another row below output 
            4. Create logic, if this row is populated, append value in database to match  
        */

        
    }

}