<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Jim's Facebook Clone</title>
  </head>
  <body>

    <div id="errors">
      <?php
        if($this->session->flashdata('errors'))
        {
          foreach($this->session->flashdata('errors') as $value)
          { ?>
            <p><?= $value ?></p>
          <?php
          }
        } ?>
    </div>

    <div id="container">
      <h1>Register</h1>
      <form action="/users/reg" method="post">
        <label>First Name: </label><input type="text" name="first_name">
        <label>Last Name: </label><input type="text" name="last_name">
        <label>Email: </label><input type="text" name="email">
        <label>Password: </label><input type="password" name="password">
        <label>Password Confirmation: </label><input type="password" name="password_confirmation">
        <input type="submit" value="Register!">
      </form>
    </div>

  </body>
</html>