<?php declare(strict_types=1);
/**
 * Customer : inherits : Email and Password : from : User
 */

class Customer extends User {
    public $billContact;
    public $pGallery;
    private $creditCard;

    function changeDetails() :void {}

}