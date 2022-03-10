<?php

class Shipment {
    public $status;
    private $addressList = array();
    private $items = array();

    public function getAddressList(){
        return $this->addressList;
    }
    public function changeShipmentStatus($update){
        $this->status = $update;
    }

}