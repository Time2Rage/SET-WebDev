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
}