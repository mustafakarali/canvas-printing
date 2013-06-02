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

$image_selected = $_POST["image_selected"];
$totalCost = $_POST["total_cost"];
$clientID = $_POST["clientID"];
$width = $_POST["desiredWidth"];
$height = $_POST["desiredHeight"];


$sql = "INSERT INTO orders(image_id, client_id, width, height, cost) values ($image_selected, $clientID, $width, $height, $totalCost)";
$result = mysql_query($sql, $link);

$cost = $_POST["cost"];
$tax = $_POST["tax"];
$query = "SELECT * FROM clients WHERE client_id = '$clientID'";
$result = mysql_query($query, $link);
$client = mysql_fetch_array($result);

$title = "Orders";
include("head.php");
?>
<div class="content"> <span>Thank you for your order</span>
  <h2>Invoice</h2>
  <!-- <a href="mgprinting.php" class="button-style button-style-alt">What we do...</a> -->
</div> <!-- content -->
</div> <!-- page -->
<div id="featured-wrapper">
<div id="fullbox" style="text-align:center;">
  <center>
      <div  style="width:300px;background:white;border:1px dashed black;padding:15px;">
        <h3>Thank you <?php echo $client['first_name'];?> for Ordering a Canvas Print <br> from Martin Gingras Canvas Printing</h3>
          <p>imageID#: <strong><?php echo "$image_selected";?> </strong></p>
          <p>--------------</p>
          <p>Cost: &nbsp;&nbsp;&nbsp;<strong><?php echo "$cost";?>$</strong></p>
          <p>Shipping:&nbsp; <strong>10$</strong></p>
          <p>Tax: &nbsp;&nbsp;&nbsp;<strong><?php echo "$tax";?>$</strong></p>
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;________</p>
          <p><strong>Total: $ <?php echo "$totalCost";?></strong></p>
        </div>
      </center>
  </div> <!-- box1 -->
  <!--div id="box2">
  <h2 style="text-align: center;padding-top: 150px;">VS</h2>
  </div> <!-- box2 -->
  <!--div id="box3">
    <h3>Gallery Wrap</h3>
    <table class       = "image">
    <tr><td><img src = "images/site/gallery.jpg" alt="Gallery Wrap"  width="400" height="200"/></td></tr>
    <tr><td class    = "caption">A technique for finishing canvas prints where the artist stretches the canvas so that it wraps around the sides The sides are then prepared and primed in the same manner as the face and tend to continue the image appearing on the face.  The term gallery wrap refers to an image that appears on the sides of the frame as well as the front.</td></tr>
    </table>
    </div> <!-- box3 -->
  </div> <!-- feature wrapper -->
  <?php
  include("footer.php");
  mysql_close($link);
  ?>