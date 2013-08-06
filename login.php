<?php

$selected_image = $_POST['selected'];

$title = "Login";
include("head.php");

?>
<div class="content"> <span>Log in to proccess your order</span>
  <h2>Login to Canvas Printing</h2>
</div> <!-- content -->
</div> <!-- page -->
<div id="featured-wrapper">
<div id="fullbox">
  <form action="place_order.php" method="post" id="myForm">
    <?php    echo "<input type='text' name='selected' value=".$selected_image." style='visibility:hidden;'>";    ?>
    <p>E-mail:&nbsp;&nbsp; <input type="text" name="username" value="" placeholder="E-mail" id="username"></p>
    <p>Password: <input type="password" name="password" placeholder="Password" value="" id="password"></p>
    <p>Don't have an account?<br><a href="signup.php">sign up for an account now...</a></p>
    <p><input type="button" onclick="login();" value="Log In &rarr;"></p>
  </form>
</div> <!-- fullbox -->
</div> <!-- feature wrapper -->
<script type="text/javascript" charset="utf-8">
$('#orders').addClass('current_page_item');
</script>
<?php include("footer.php"); ?>