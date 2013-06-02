<?php
$title = "Past Orders";
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

$result = mysql_query("SELECT * FROM images", $link);
if (!$result) {
  throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
}

$selected_image = $_POST['selected'];

$email = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM clients WHERE email = '$email' AND password = '$password'";
$result = mysql_query($query, $link);
$num_results = mysql_num_rows($result);
if($num_results == 0){
  echo "<div style='text-align:center'";
  echo "<p>Entered Email and Password combination not in database... <br> <a href='signup.php'>Go here to make an account</a></p>";
  echo "</div>";
}
else{
  $client = mysql_fetch_array($result);
  $order = mysql_query("SELECT * FROM orders WHERE client_id = '$client[client_id]'", $link);
  $num_results = mysql_num_rows($order);
  if($num_results == 0){
    echo "<h3> You have no orders...<br> go browse the gallery and make some purchases! </h3>";
  }
  else{
    $image = mysql_query("SELECT * FROM images WHERE image_id = '$selected_image'", $link);
    $row = mysql_fetch_array($image);
    ?>
    
    <div class="content"> <span>Images you've previousy ordered from mgprinting</span>
      <h2>Past Orders</h2>
    </div> <!-- content -->
  </div> <!-- page -->
  <div id="featured-wrapper">
    <div id="fullbox">
    
      <body id="order" onload="">
        <h1><?php echo "".$client['first_name']." ".$client['last_name']."";?>'s Orders</h1>
        <br><br>
        <table border="1" style="text-align:center;color:white;">
          <tr>
            <th><h3 style="width:100px;">Image</h3></th>
            <th><h3 style="width:100px;">Height</h3></th>
            <th><h3 style="width:100px;">Width</h3></th>
            <th><h3 style="width:100px;">Cost</h3></th>
          </tr>
          <?php 
          while($row = mysql_fetch_array($order)){
            echo "<tr>";
            $image_q = mysql_query("SELECT * FROM images WHERE image_id = '$row[image_id]'", $link);
            $image = mysql_fetch_array($image_q);
            echo "<td> <img src = 'images/".$image['image_name']."' alt=".$row['image_id']."  width='400' height='200'></td>\n";
            echo '<td>'.$row['height'].'" </td>';
            echo '<td>'.$row['width'].'" </td>';
            echo '<td>'.$row['cost'].'$ </td>';
            echo "</tr>";
          }
          echo "</table>";
        }
        mysql_close($link);
      }
      ?>
    
    
    </div> <!-- fullbox -->
  </div> <!-- feature wrapper -->
  <?php include("footer.php"); ?>