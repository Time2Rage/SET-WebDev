<?php declare(strict_types=1);

class Gallery
{
    public $userCards;


    function displayCards(){
        $custID = $_SESSION['id'];
        /**
         * 1) Get user ID from session cookie and validate session
         * 2) if validated session call DBconnector for DB hook
         */
        $query = "SELECT id, thmb FROM cards WHERE custID = :custID";
        /**
         * 
         */
        }

    function addToOrder(Card $card){

    }

}