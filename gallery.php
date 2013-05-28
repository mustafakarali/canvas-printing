<!DOCTYPE html>
<?php
$link = new mysqli("localhost", "root", "", "db_canvas_printing");
if(!$link) {
  die("Connection Failed: ". $link->error());
}
$result = $link->query("SELECT * FROM images");

?>


<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
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
    while($row = $result->fetch_assoc()){
      echo "<tr>\n";
      echo "<td><p>". $row['description']. "</p></td>\n";
      echo "<td> <img src    = 'images/".$row['image_name']."' alt=".$row['image_id']."  width='400' height='200'></td>\n";

      //  echo "<td><input type='submit' value='Order &rarr;' = name='order_id'></td>";
      echo "<td><input type='submit' name='". $row['image_name']."' onClick='updateSelected(".$row['image_id'].");' value='Order This Image &rarr;'></td>\n";
      echo "</tr>";
    }
    $result->close();
    $link->close();
    ?>
  </form>



</table>


</body>
</html>
