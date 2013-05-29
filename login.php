<?php

// $link = new mysqli("localhost", "root", "", "db_canvas_printing");
// if(!$link) {
  //   die("Connection Failed: ". $link->error());
  // }

  $selected_image = $_POST['selected'];

  ?>
  <script type="text/javascript" src="scripts/javaScripts.js"></script>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">

  </head>
  <body id="login" onload="">
    <?php include("menu_bar.php"); ?>
    <h1>Login to Canvas Printing</h1>
    <form action="place_order.php" method="post" id="myForm">
    <?php
      echo "<input type='text' name='selected' value=".$selected_image." style='visibility:hidden;'>";
    ?>

      <p>E-mail:&nbsp;&nbsp; <input type="text" name="username" value="" placeholder="E-mail" id="username"></p>
      <p>Password: <input type="password" name="password" placeholder="Password" value="" id="password"></p>
      <p>Don't have an account?<br><a href="signup.php">sign up for an account now...</a></p>
      <p><input type="button" onclick="login();" value="Log In &rarr;"></p>
    </form>
  </body>
  </html>
