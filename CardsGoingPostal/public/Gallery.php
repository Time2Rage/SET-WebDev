<?php declare(strict_types=1);

class Gallery
{
    public $userCards;


    function displayCards(){
        $custID = $_SESSION['id'];
        require ("../src/DBconnection.php");
        /**
         * 1) Get user ID from session cookie and validate session
         * 2) if validated session call DBconnector for DB hook
         */
        $query = "SELECT id, filePath, price FROM cards WHERE custID = :custID";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $card){
            echo '<a><img src="' . $card['filePath'] . '"></a><>';
        }
        /**
         * 
         */
        }

    function addToOrder(Card $card){

    }

}