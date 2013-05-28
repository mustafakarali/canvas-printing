<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" style="height:100%;">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Orders</title>
  <link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<?php
$link = new mysqli("localhost", "root", "", "db_canvas_printing");
if(!$link) {
  die("Connection Failed: ". $link->error());
}

$first_name = $_POST["first_name"];
$last_name= $_POST["last_name"];
$address = $_POST["address"];
$city = $_POST["city"];
$province = $_POST["province"];
$postal_code = $_POST["postal_code"];
$email = $_POST["email"];
$password = $_POST["password"];

$query = "SELECT * FROM clients WHERE email = '$email'";
$result = $link->query($query);
$num_results = $result->num_rows;
if($num_results != 0){
  echo "Sorry, the email address you entered has already been taken.<br>Please go back and enter a different address";
}
else{
$sql = "INSERT INTO clients(first_name, last_name, address_street, address_city, province, postal_code, email, password)
 values ('$first_name', '$last_name', '$address', '$city', '$province', '$postal_code', '$email', '$password')";
$result = $link->query($sql);

$link->close();
?>

  <?php include("menu_bar.php"); ?>
  <h1>Account Successfully Created!</h1>
  <h2>Congratulations <?php echo ''.$first_name.' '.$last_name.'';?></h2>
  <p>Go to our Gallery and browse our available pictures to purchase<br>or feel free to upload your own!!!</p>
  <?php
}
  ?>
</body>
</html>