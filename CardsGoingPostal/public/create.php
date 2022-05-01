<?php
require "Editor.php";
$editor = new Editor();
require "../layout/header.php";
?>
<div class="editor">
    <!-- Left Template Bar = images-->
    <div id="leftPanel" class="scrollBox">
        <?php foreach($editor->imageTemplate as $img) {
            echo '<a><img src="' . $img['filePath'] . '></a>';
        }?>
    </div>
    <!-- Center Panel -->
    <div id="centerPanel">

    </div>
    <!-- Right Template Bar = text-->
    <div id="rightPanel" class="scrollbox">
    <?php foreach($editor->textTemplate as $txt) {
            echo '<a><img src="' . $editor->; ?>
            <?php ?>"></a>'
        }?>
    </div>
</div>
<?php
require "../layout/footer.php";?>