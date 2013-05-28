<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" style="height:100%;">

<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Order</title>
  <link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
  <script type="text/javascript" src="scripts/javaScripts.js"></script>
</head>
<?php
include("menu_bar.php");
$link = new mysqli("localhost", "root", "", "db_canvas_printing");
if(!$link) {
  die("Connection Failed: ". $link->error());
}
$selected_image = $_POST['selected'];

$email = $_POST["username"];
$password = $_POST["password"];
$query = "SELECT * FROM clients WHERE email = '$email' AND password = '$password'";
$result = $link->query($query);
$client = $result->fetch_assoc();
$num_results = $result->num_rows;
if($num_results == 0){
  echo "<div style='text-align:center'";
  echo "<p>Entered Email and Password combination not in database... <br> <a href='signup.php'>Go here to make an account</a></p>";
  echo "</div>";
}
else{
$image = $link->query("SELECT * FROM images WHERE image_id = '$selected_image'");
$row = $image->fetch_assoc();
?>

<body id="order" onload="">
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

  <?php 
}
$result->close();
$link->close();
?>
</body>
</html>