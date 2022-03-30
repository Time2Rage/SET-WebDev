<?php declare(strict_types=1);

class Payments{

    public $nameOnCard, $nnNr, $expDate, $secCode;

    function __construct($nameOnCard, $nnNr, $expDate, $secCode){
        $this->nameOnCard = $nameOnCard;
        $this->nnNr= $nnNr;
        $this->expDate = $expDate;
        $this->secCode = $secCode;
    }

    function charge($amount)
    {


    }


}