<?php declare(strict_types=1);
class Editor {
    public $imageTemplate = array();
    public $textTemplate = array();
    public $imageInstance, $textInstance;

    function loadTemplates(){
        /**
         * 1) Call DB to load the ID and thumbnail of the images available and texts samples avai.
         * 2) forEach over the $results and feed them into the respective array.
         */
    }

    function pullImage($imgArrayIndex){}
    function pullText($txtArrayIndex){}
}

