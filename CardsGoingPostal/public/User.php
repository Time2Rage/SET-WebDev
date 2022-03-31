<?php declare(strict_types=1);
/**
 * User Class - Base for Customer, Admin, Printer
 */
class User {
    public $email, $password;

    function __construct($email, $password){
        $this->email = $email;
        $this->password= $password;
    }
    
    function login(String $email, String $password): void{}
    // Adds a new User to the Database
    function create(String $email, String $password): void{}

}