<?php

$title = "Place Order";
include("head.php");

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

$selected_image = $_POST['selected'];

$email = $_POST["username"];
$password = $_POST["password"];
$query = "SELECT * FROM clients WHERE email = '$email' AND password = '$password'";
$result = mysql_query($query, $link);
$client = mysql_fetch_array($result);
$num_results = mysql_num_rows($result);
if($num_results == 0){
  echo "<div style='text-align:center'";
  echo "<p>Entered Email and Password combination not in database... <br> <a href='signup.php'>Go here to make an account</a></p>";
  echo "</div>";
}
else{
  $image = mysql_query("SELECT * FROM images WHERE image_id = '$selected_image'", $link);
  $row = mysql_fetch_array($image);
  ?>
  <div class="content"><span>Please choose the dimensions of your canvas</span>
    <h2>Place order</h2>
  </div> <!-- content -->
</div> <!-- page -->
<div id="featured-wrapper">
  <div id="fullbox" style="text-align:center;">
    <form action="invoice.php" method="post" accept-charset="utf-8">
      <?php
      echo "<input type='text' name='clientID' value=".$client['client_id']." style='visibility:hidden;'><br>";



      echo "<img src    = 'images/".$row['image_name']."' alt=".$row['image_id']."  width='400' height='200'> ";
      ?>

      <p>Image Selected:&nbsp; <input type="text" name="image_selected" value=<?php echo "$selected_image"; ?> onfocus="blur();"></p>
      <p>Width: <input type="text" name="desiredWidth" placeholder='Desired Width(inches)' id="desiredWidth" onchange="calculate()">"
        &nbsp;&nbsp;Height: <input type="text" name="desiredHeight" placeholder='Desired Height(inches)' id="desiredHeight" onchange="calculate()">"
      </p>
      <p>Cost:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cost" onfocus="blur();" id="cost">$</p>
      <p>Shipping:&nbsp;&nbsp;&nbsp;+<input type="text" name="shipping" onfocus="blur();" id="shipping">$</p>
      <p>Tax:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+<input type="text" name="tax" onfocus="blur();" id="tax">$</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________</p>
      <p>Total Cost:&nbsp;&nbsp;<input type="text" name="total_cost" onfocus="blur();" id="totalCost">$</p>
      <input type="submit" name="submitOrder" value="Submit Order" id="submitOrder">
      <input type="reset" name="clearForm" value="Clear Form" id="clearForm">
    </form>
  </div> <!-- fullbox -->
</div> <!-- feature wrapper -->
<?php 
include("footer.php");
}
mysql_close($link);
?>