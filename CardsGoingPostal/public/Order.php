<?php declare(strict_types=1);

class Order{

    public $items, $shipTo, $price;


    function __construct($items, $shipTo, $price){

        $this->items = $items;
        $this->shipTo= $shipTo;
        $this->price = $price;
        
    }
    function submit(){

    }




}