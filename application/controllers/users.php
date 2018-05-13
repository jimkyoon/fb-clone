<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct()
  {
    // load the models
    parent::__construct();
    $this->load->model('user');
    // need posts, comments, likes etc
    // $this->load->model('');
  }

  // load the new user registration page
	public function newreg()
	{
		$this->load->view('/users/regpage');
  }

  // register the user
  public function reg()
  {
    // first validate
    $this->load->library('form_validation');
    $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
    $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
    $this->form_validation->set_rules('password_confirmation', 'password confirmation', 'trim|required|matches[password]');

    // error
    if($this->form_validation->run())
    {
      redirect('/users/newreg');
    }
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
