<?php
require '../TestSuite.php';
$testSuite = new TestSuite();
require '../public/Editor.php';
$editor = new Editor();
$editor->loadTemplates();

# Array Tests
## Index in Bounds
$editor->pullImage(0);
## Index out of Bounds
$editor->pullImage(1000);
## Wrong Type
$editor->pullImage("This is a String");