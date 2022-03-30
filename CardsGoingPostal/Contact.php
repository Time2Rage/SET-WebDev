<?php declare(strict_types=1);

class Contact
{
    public $fName, $sName, $addressLine1, $addressLine2, $postCode, $country;


    public function __construct($fName, $sName, $addressLine1, $addressLine2, $postCode, $country)
    {
        $this->fName = $fName;
        $this->sName = $sName;
        $this->addressLine1 = $addressLine1;
        $this->addressLine2 = $addressLine2;
        $this->postCode = $postCode;
        $this->country = $country;
    }

    function modifyAddress(){

        /*

        1. Open connection to database
        2. SQL query to select users contact table 
        3. create a form to display the current stored address 
        4. Create a for loop to print out each value from that row      
        */

    }


}