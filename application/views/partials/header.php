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
    <div id="nav">
      <?php
        if($this->session->userdata('loggedin') == TRUE)
        {
          echo '<a href="/users/logout">Log Out</a>';
        }
        else
        {
          echo '<a href="/users/logpage">Log In</a>';
        }
      ?>
    </div>
  </body>
</html>