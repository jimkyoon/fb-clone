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
      <h1>Hello <?= $users['first_name'] ?>!</h1>
      <h3>What do people want to know from you?</h3>
      <form action="/posts/create" method="POST">
        <textarea name="content" cols="30" rows="5"></textarea>
        <input type="submit" value="Post">
      </form>
      <hr>
      <h2>Check out what's going on in the community!</h2>
      <div id="feed">
        <?php
          foreach($messages as $message)
          { ?>
            <div class="messages">
              <hr>
              <h4><a href="/users/profile/<?= $message['user_id'] ?>"><?= $message['first_name'] ?> <?= $message['last_name'] ?></a> posted on <?= date('M-d-Y', strtotime($message['updated_at'])); ?>:</h4>
              <p><?= $message['content'] ?></p>
              <div class="likes">
                <p>Thumbs up</p>
                <p>Thumbs down</p>
              </div>
              <div class="comments">
                <p> says: Lorem ipsum </p>
              </div>
            </div>
            <hr>
            <?php
          }
        ?>
        <div class="message">
          <h4>John Smith says:</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris auctor nisi nisl, id gravida lectus suscipit quis. Sed ultricies ex odio, bibendum tincidunt ligula elementum ut. Nam in ipsum ultrices, maximus odio quis, lacinia velit. Mauris in risus nulla. Curabitur in enim a diam finibus bibendum ut non lorem. Maecenas fringilla arcu sit amet neque dapibus pellentesque. Proin at congue nibh.</p>
          <div class="likes">
            <p>Thumbs up</p>
            <p>Thumbs down</p>
          </div>
          <div class="comments">
            <p><strong>Jane Doe</strong> says: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque non ultrices neque. Nullam congue ornare.</p>
          </div>
        </div>
        <hr>
      </div>
    </div>
    
  </body>
</html>