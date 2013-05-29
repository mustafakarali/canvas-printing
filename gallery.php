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
  die ('Can\'t use foo : ' . mysql_error());
}

$result = mysql_query("SELECT * FROM images", $link);
if (!$result) {
    throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
}

?>

<html lang="en">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Gallery</title>
  <link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title">
  <script type="text/javascript" src="scripts/javaScripts.js"></script>
</head>
<body id="gallery" onload="">
  <?php include("menu_bar.php"); ?>
  <form action="login.php" method="post" accept-charset="utf-8">
    <table border     = "1" >
      <tr>
        <th>
          <p>Description</p>
        </th>
        <th>
          <p>Image</p>
        </th>
        <th>
          <p>Order</p>
        </th>
      </tr>

      <!-- DYNAMICALLY INSERT PHOTOS HERE....-->

      <input type="text" name="selected" id="image_selected" style="visibility:hidden;">
      <?php
      
      while($row = mysql_fetch_array($result)){
        echo "<tr>\n";
        echo "<td><p>". $row['description']. "</p></td>\n";
        echo "<td> <img src    = 'images/".$row['image_name']."' alt=".$row['image_id']."  width='400' height='200'></td>\n";

        //  echo "<td><input type='submit' value='Order &rarr;' = name='order_id'></td>";
        echo "<td><input type='submit' name='". $row['image_name']."' onClick='updateSelected(".$row['image_id'].");' value='Order This Image &rarr;'></td>\n";
        echo "</tr>";
      }
      mysql_close($link);
      ?>
    </form>



  </table>


</body>
</html>
