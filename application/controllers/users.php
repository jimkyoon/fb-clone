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
    $this->load->model('User');

    // validate post data
    $result = $this->User->validate($this->input->post());
    
    // if it passes
    if($result == "valid") 
    {
      $id = $this->User->create($this->input->post());
      $success[] = "Thank you for signing up! Now please login!";
      $this->session->set_flashdata('success', $success);
      redirect('/users/logpage', $success);
    }
    // if it fails
    else 
    {
      $errors = array(validation_errors());
      $this->session->set_flashdata('errors', $errors);
      redirect('/users/newreg', $errors);
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
