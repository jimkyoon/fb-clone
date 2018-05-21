<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  // load the new user registration page
	public function newreg()
	{
    $this->load->view('partials/header');
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
    $this->load->view('partials/header');
    $this->load->view('/users/loginpage');
  }

  // log the user in
  public function login()
  {
    $post = $this->input->post();

    if(isset($post))
    {
      $this->load->model('user');

      // check to see if user exists by email
      $user = $this->user->get_user_by_email($post['email']);
      if(isset($user))
      {
        // check to see if the password matches
        if(md5($post['password'] == $user->password))
        {
          // load in the data to session
          $data = array('user_id' => $user->id, 'loggedin' => TRUE);
          $this->session->set_userdata($data);
          redirect('/users/profile');
        }
      }
    }
  }

  public function profile()
  {
    // load in the user profile and feed
    $this->load->view('partials/header');
    $this->load->view('/users/profile');
  }

  // log user out
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('/');
  }

}
