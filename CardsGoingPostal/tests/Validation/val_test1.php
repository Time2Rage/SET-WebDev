<?php
require '../TestSuite.php';
$testSuite = new TestSuite();
require '../public/Editor.php';
$editor = new Editor();
$editor->loadTemplates();

#Array Test - Editor - 