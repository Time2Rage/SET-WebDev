<?php declare(strict_types=1);

class Card
{
    public $image, $text, $title;

    function __construct($image, $text, $title)
    {
        $this->image = $image;
        $this->text = $text;
        $this->title = $title;

        //DEBUG
        echo $this . " img created succesfully";
    }

    function save(){

       

    }

    function discard(){
        /*
           How we do this will depend on how we implement the image editing feature 
             
        */
    }

}