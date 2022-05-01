<?php
class TestSuite {
    
    function __construct(){
        
    }

    function showTestResult(String $testLabel, Boolean $result) {
        if (result) {
            echo '[O]   Test: ' . $testLabel . ' successful! <br>'; 
        }
        else {
            echo '[X]   Test ' . $testLabel . ' failed! <br>';
        }
    }
}
?>