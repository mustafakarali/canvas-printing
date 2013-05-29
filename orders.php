      <?php
      $title = "Orders";
       include("head.php");
       ?>
  <h1>View Your Canvas Printing Orders</h1>
  <form action="display_orders.php" method="post" id="myForm">

  <p>E-mail: &nbsp;&nbsp;<input type="text" name="username" value="" placeholder="E-mail" id="username"></p>
  <p>Password: <input type="password" name="password" placeholder="Password" value="" id="password"></p>
  <p>You need an account in order to see your orders...<br><a href="signup.php">sign up for an account now...</a></p>
  <p><input type="button" onclick="login();" value="Log In &rarr;"></p>
</form>
</body>
</html>