<?php
$title = "Signing up";
include("head.php");

?>
<div class="content"> <span>View past orders from mgprinting</span>
  <h2>Orders</h2>
</div> <!-- content -->
</div>  

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


$first_name = $_POST["first_name"];
$last_name= $_POST["last_name"];
$address = $_POST["address"];
$city = $_POST["city"];
$province = $_POST["province"];
$postal_code = $_POST["postal_code"];
$email = $_POST["email"];
$password = $_POST["password"];

$query = "SELECT * FROM clients WHERE email = '$email'";
$result = mysql_query($query, $link);
$num_results = mysql_num_rows($result);
if($num_results != 0){
  echo "Sorry, the email address you entered has already been taken.<br>Please go back and enter a different address";
}
else{
$sql = "INSERT INTO clients(first_name, last_name, address_street, address_city, province, postal_code, email, password)
 values ('$first_name', '$last_name', '$address', '$city', '$province', '$postal_code', '$email', '$password')";
$result = mysql_query($sql, $link);

mysql_close($link);

?>

<div id="featured-wrapper">
<div id="box1">
  <form action="display_orders.php" method="post" id="myForm">
    <p>E-mail: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" value="" placeholder="E-mail" id="username"></p>
    <p>Password: <input type="password" name="password" placeholder="Password" value="" id="password"></p>
    <p>If you don't have an account ...<br><a href="signup.php">sign up for an account now...</a></p>
    <p><input type="button" onclick="login();" value="Log In &rarr;"></p>
  </form>
</div> <!-- box1 -->
</div> <!-- feature wrapper -->
<?php include("footer.php"); ?>


<?php
}
  ?>