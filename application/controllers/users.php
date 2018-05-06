<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function register()
	{
		$this->load->view('/users/regpage');
  }
  public function login()
  {
    $this->load->view('/users/loginpage');
  }
}
