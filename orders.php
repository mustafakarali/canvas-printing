<?php
$title = "Orders";
include("head.php");
?>
<div class="content"> <span>View past orders from mgprinting</span>
  <h2>Orders</h2>
</div> <!-- content -->
</div> <!-- page -->
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