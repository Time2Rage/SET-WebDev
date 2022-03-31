<?php declare(strict_types=1);
/**
 * Inherits from User
 */
class Printer extends User {
    public $empNr;

    function __construct($email, $password, $empNr){
        User::__construct($email, $password);

        $this->email = $email;
        $this->password = $password;
    }
}