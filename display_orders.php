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
  die ('Can\'t use foo : ' . mysql_error());
}

$result = mysql_mysql_query("SELECT * FROM images", $link);
if (!$result) {
    throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
}

$selected_image = $_POST['selected'];

$email = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM clients WHERE email = '$email' AND password = '$password'";
$result = $link->mysql_query($query);
$num_results = $result->num_rows;
if($num_results == 0){
  echo "<div style='text-align:center'";
  echo "<p>Entered Email and Password combination not in database... <br> <a href='signup.php'>Go here to make an account</a></p>";
  echo "</div>";
}
else{
$client = mysql_fetch_array($result);
$result->close();
$order = $link->mysql_query("SELECT * FROM orders WHERE client_id = '$client[client_id]'");
$num_results = $order->num_rows;
if($num_results == 0){
  echo "<h3> You have no orders...<br> go browse the gallery and make some purchases! </h3>";
}
else{
  $image = $link->mysql_query("SELECT * FROM images WHERE image_id = '$selected_image'");
  $row = mysql_fetch_array($image);
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
      <?php while($row = mysql_fetch_array($order);
        echo "<tr>";
        $image_q = $link->mysql_query("SELECT * FROM images WHERE image_id = '$row[image_id]'");
        $image = mysql_fetch_array($image_q);
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