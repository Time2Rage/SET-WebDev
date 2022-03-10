<?php declare(strict_types=1);
/**
 * User Class - Base for Customer, Admin, Printer
 */
class User {
    public $email;
    private $password;

    function login(String $email, String $password): void{}
    function create(String $email, String $password): void{}
}