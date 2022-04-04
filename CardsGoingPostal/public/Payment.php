<?php declare(strict_types=1);

class Payments{

    public $ccNr, $fName, $sName, $expDate, $secNr;

    public function __construct($ccNr, $fName, $sName, $expDate, $secNr){
        $this->ccNr = $ccNr;
        $this->fName= $fName;
        $this->sName = $sName;
        $this->expDate = $expDate;
        $this->secNr= $secNr;
    }

      

    function charge($amount)
    {


    }


}