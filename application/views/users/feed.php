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
    <h1>Hello <?= $user['first_name'] ?>!</h1>
    <h3>What do people want to know from you?</h3>
    <form action="/post/create" method="POST">
      <textarea name="content" cols="30" rows="5"></textarea>
      <input type="submit" value="Post">
    </form>
    <p>Check out what's going on!</p>
    <div id="feed">
      <div class="message">
        <h3>John Smith</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris auctor nisi nisl, id gravida lectus suscipit quis. Sed ultricies ex odio, bibendum tincidunt ligula elementum ut. Nam in ipsum ultrices, maximus odio quis, lacinia velit. Mauris in risus nulla. Curabitur in enim a diam finibus bibendum ut non lorem. Maecenas fringilla arcu sit amet neque dapibus pellentesque. Proin at congue nibh.</p>
        <div class="likes">
          <p>Thumbs up</p>
          <p>Thumbs down</p>
        </div>
        <div class="comments">
          <p>John Smith says: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque non ultrices neque. Nullam congue ornare.</p>
        </div>
      </div>
    </div>
  </body>
</html>