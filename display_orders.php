<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

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
$num_results = $result->num_rows;
if($num_results == 0){
  echo "<div style='text-align:center'";
  echo "<p>Entered Email and Password combination not in database... <br> <a href='signup.php'>Go here to make an account</a></p>";
  echo "</div>";
}
else{
$client = $result->fetch_assoc();
$result->close();
$order = $link->query("SELECT * FROM orders WHERE client_id = '$client[client_id]'");
$num_results = $order->num_rows;
if($num_results == 0){
  echo "<h3> You have no orders...<br> go browse the gallery and make some purchases! </h3>";
}
else{
  $image = $link->query("SELECT * FROM images WHERE image_id = '$selected_image'");
  $row = $image->fetch_assoc();
  ?>
  <body id="order" onload="">
    <h1><?php echo "".$client['first_name']." ".$client['last_name']."";?>'s Orders</h1>
    <table border="1" >
      <tr>
        <th>Image</th>
        <th>Height</th>
        <th>Width</th>
        <th>Cost</th>
      </tr>
      <?php while($row = $order->fetch_assoc()){ 
        echo "<tr>";
        $image_q = $link->query("SELECT * FROM images WHERE image_id = '$row[image_id]'");
        $image = $image_q->fetch_assoc();
        $image_q->close();
        echo "<td> <img src = 'images/".$image['image_name']."' alt=".$row['image_id']."  width='400' height='200'></td>\n";
        echo '<td>'.$row['height'].'" </td>';
        echo '<td>'.$row['width'].'" </td>';
        echo '<td>'.$row['cost'].'$ </td>';
        echo "</tr>";
      }
      $order->close();
   echo "</table>";
}
    $link->close();
}
?>
</body>
</html>