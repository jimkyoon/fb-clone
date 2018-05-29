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

    <!-- display success messages -->
    <div id="success">
      <?php
        if($this->session->flashdata('success'))
        {
          foreach($this->session->flashdata('success') as $value)
          { ?>
            <p><?= $value ?></p>
          <?php
          }
        } ?>
    </div>
        
    <!-- display error messages -->
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
      <h1>Welcome to Jim's Facebook Clone!</h1>
      <h2>Are you new? Please <a href="/users/newreg">Register</a>!</h2>
      <h2>Already have an account? Please <a href="/users/logpage">Login</a>!</h2>
    </div>
    
  </body>
</html>