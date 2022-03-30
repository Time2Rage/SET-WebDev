<?php declare(strict_types=1);

class Card
{
    public $image, $text, $title;

    function __construct($image, $text, $title)
    {
        $this->image = $image;
        $this->text = $text;
        $this->title = $title;
    }

    function save(){

        /*
            So for this we'd need to:
                1. Open a connection to the database 
                2. Assign the post output to a variable
                3. Insert the variable into the users pictures database 
                4. Validate the image has been saved  
             
        */
       

    }

    function discard(){
        /*
           How we do this will depend on how we implement the image editing feature 
             
        */
    }

}