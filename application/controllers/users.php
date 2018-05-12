<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  // load the new user registration page
	public function newreg()
	{
		$this->load->view('/users/regpage');
  }

  // register the user
  public function reg()
  {

  }

  // load the login page
  public function logpage()
  {
    $this->load->view('/users/loginpage');
  }

  // log the user in
  public function login()
  {
    
  }

}
