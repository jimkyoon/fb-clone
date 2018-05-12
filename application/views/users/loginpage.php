<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Jim's Facebook Clone</title>
</head>
<body>

  <div id="container">
    <h1>Login</h1>
    <form action="/users/login" method="post">
      <label>Email: </label><input type="text" name="email">
      <label>Password: </label><input type="hidden" name="password">
      <input type="submit" value="Login!">
    </form>
  </div>

</body>
</html>