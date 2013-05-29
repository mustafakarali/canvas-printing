<?php
$title = "Sign Up";
include("menu_bar.php");
?>
<h1>Sign up for a new accout with canvas printing...</h1>
  <form action="sign_up_submit.php" method="post" accept-charset="utf-8" id="myForm" required="required">
    <p>Name: <input type="text" name="first_name" placeholder="First"id="first_name" required="required">
      <input type="text" name="last_name" placeholder="Last"id="last_name" required="required"></p>
      <p>Address: <input type="text" name="address" placeholder="Address" id="address" required="required"></p>
      <p>City: <input type="text" name="city" placeholder="City"id="city" required="required"></p>
      <p>Province: <input type="text" name="province" placeholder="Province"id="province" required="required"></p>
      <p>Postal Code:<input type="text" name="postal_code" placeholder="Postal Code" id="postal_code" required="required"></p>
      <p>Email: <input type="text" name="email" placeholder="email" id="email" required="required"></p>
            <p>Password: <input type="text" name="password" placeholder="password" id="password" required="required"></p>
      <p><input type="submit" value="Register &rarr;"></p>
    </form>
  </body>
  </html>