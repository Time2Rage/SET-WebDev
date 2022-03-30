<?php

class Shipment {
    public $status, $addressList = array(), $items = array();

    function __construct($status, $addressList, $items){
        $this->status = $status;
        $this->addressList= $addressList;
        $this->items= $items;
        
    }

    public function getAddressList(){
        return $this->addressList;
    }
    public function changeShipmentStatus($update){
        $this->status = $update;
    }

}