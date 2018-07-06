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
      <h1>You are looking at <?= $username['first_name'] ?> <?= $username['last_name'] ?>'s posts.</h1>
      <?php
        foreach($profile as $profile)
        { ?>
          <hr>
          <div class="messages">
            <p><?= $profile['content'] ?></p>
            <p>posted on <?= date('M-d-Y', strtotime($profile['updated_at'])); ?></p>
          </div>
          <hr>
          <?php
        } ?>
    </div>

  </body>
</html>