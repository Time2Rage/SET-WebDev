<?php declare(strict_types=1);
class Editor {
    public $imageTemplate = array();
    public $textTemplate = array();
    public $imageInstance, $textInstance;

    function __construct(){
        
    }

    function loadTemplates(){
        /**
         * 1) Call DB to load the ID and thumbnail of the images available and texts samples avai.
         * 2) forEach over the $results and feed them into the respective array.
         */
        require ("../src/DBconnection.php");
        $sql = "SELECT tmpID,tmpType FROM template";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $tmp){
            if ($tmp['tmpType'] === "img") {
                $this->imageTemplate[] = $tmp;
            }
            elseif ($tmp['tmpType'] === "txt") {
                $this->textTemplate[] = $tmp;
            }
        } #end foreach

        var_dump($this->imageTemplate[0]['tmpID']);
    }

    function pullImage($imgArrayIndex){
        #Database fetch
        require ("../src/DBconnection.php");
        $imgIndex = $this->imageTemplate[$imgArrayIndex]['tmpID'];
        $sql = "SELECT filePath FROM template WHERE tmpID = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $imgIndex , PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
        #Image manipulation
        $img = imagecreatefrompng($result[0]['filePath']);
        $img = imagescale($img, 480);
        #Display fetched image in the editor box --- UNFINISHED
        #echo '<img src="data:'
        ?>
        
<?php
    }
    function pullText($txtArrayIndex){}
} #End of class

