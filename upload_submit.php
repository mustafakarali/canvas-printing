<?php
$title = "Image Upload";
include("head.php");
?>
<div class="content"> <span>Thank you for contributing to our gallery</span>
  <h2>Image Upload</h2>
  <a href="mgprinting.php" class="button-style button-style-alt">What we do...</a>
</div> <!-- content -->
</div> <!-- page -->
<div id="featured-wrapper">
<div id="fullbox">
  <?php
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
    }
  ?>
</div> <!-- fullbox -->
    </div> <!-- feature wrapper -->
    <?php include("footer.php"); ?>