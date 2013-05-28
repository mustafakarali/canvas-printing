<!DOCTYPE html>
<?php
$link = new mysqli("localhost", "root", "", "db_canvas_printing");
if(!$link) {
  die("Connection Failed: ". $link->error());
}

$image_selected = $_POST["image_selected"];
$totalCost = $_POST["total_cost"];
$clientID = $_POST["clientID"];
$width = $_POST["desiredWidth"];
$height = $_POST["desiredHeight"];


$sql = "INSERT INTO orders(image_id, client_id, width, height, cost) values ($image_selected, $clientID, $width, $height, $totalCost)";
$result = $link->query($sql);

$cost = $_POST["cost"];
$tax = $_POST["tax"];
$query = "SELECT * FROM clients WHERE client_id = '$clientID'";
$result = $link->query($query);
$client = $result->fetch_assoc();





?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" style="height:100%;">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Orders</title>
  <link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<?php include("menu_bar.php"); ?>
<div style="text-align: center;">
<h3>Thank you <?php echo $client['first_name'];?> for Ordering a Canvas Print <br> from Martin Gingras Canvas Printing</h3>
<p>imageID#: <strong><?php echo "$image_selected";?> </strong></p>
<p>--------------</p>
<p>Cost: &nbsp;&nbsp;&nbsp;<strong><?php echo "$cost";?>$</strong></p>
<p>Shipping:&nbsp; <strong>10$</strong></p>
<p>Tax: &nbsp;&nbsp;&nbsp;<strong><?php echo "$tax";?>$</strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;________</p>
<p><strong>Total: <?php echo "$totalCost";?>$</strong></p>
</div>
</body>
<?php 
$result->close();
$link->close();?>
</html>