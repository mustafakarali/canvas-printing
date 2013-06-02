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
  
  $description = $_POST['description'];
  
  $url=parse_url(getenv("CLEARDB_DATABASE_URL"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"],1);

  $link = mysql_connect($server, $username, $password);
  if (!$link) {
    echo "Can't Link";
    die('Not connected : ' . mysql_error());
  }      

  $db_selected = mysql_select_db($db, $link);
  if (!$db_selected) {
    echo "Can't connect to database";
    die('Can\'t connect to $db : ' . mysql_error());
  }
  




      echo "Upload: " . $_FILES["file"]["name"] . "<br>";
      echo "Type: " . $_FILES["file"]["type"] . "<br>";
      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
      echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";


  // $name = $_FILES['file']['name'];
  // $sql = "INSERT INTO images(image_name, description) values ('$name', '$description')";
  // $result = mysql_query($sql, $link);
  // mysql_close($link);
  ?>
</div> <!-- fullbox -->
</div> <!-- feature wrapper -->
<?php include("footer.php"); ?>