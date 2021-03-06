<!DOCTYPE html>
<?php
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

$result = mysql_query("SELECT * FROM images", $link);
if (!$result) {
  throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
}

$title = "Gallery";
include("head.php");

?>

<div class="content"> <span>Please peruse this gallery of images at your leisure</span>
  <h2>Gallery</h2>
</div>
</div> <!-- content -->
<div id="featured-wrapper">
<div id="fullbox">
  <form action="login.php" method="post" accept-charset="utf-8">
    <table border = "1" style="text-align:center;color:white;">
      <tr>
        <th>
          <h3>Description</h3>
        </th>
        <th>
          <h3>Image</h3>
        </th>
        <th>
          <h3>Order</h3>
        </th>
      </tr>

      <!-- DYNAMICALLY INSERT PHOTOS HERE....-->

      <input type="text" name="selected" id="image_selected" style="visibility:hidden;">
      <?php
      
      while($row = mysql_fetch_array($result)){
        echo "<tr>\n";
        echo "<td><h3>". $row['description']. "</h3></td>\n";
        echo "<td> <img src = 'images/".$row['image_name']."' alt=".$row['image_id']."  width='400' height='200'></td>\n";
        echo "<td><input type='submit' name='". $row['image_name']."' onClick='updateSelected(".$row['image_id'].");' value='Order This Image &rarr;'></td>\n";
        echo "</tr>";
      }
      mysql_close($link);
      ?>
    </table>
  </form>
</div> <!-- box1 -->
</div> <!-- feature wrapper -->
<script type="text/javascript" charset="utf-8">
$('#gallery').addClass('current_page_item');
</script>
<?php include("footer.php"); ?>
