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
    $this->load->model('user');

    // validate post data
    $result = $this->user->validate($this->input->post());
    
    // if it passes
    if($result == "valid") 
    {
      $id = $this->user->create($this->input->post());
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
          redirect('/users/feed');
        }
      }
    }
  }

  // load in the user's feed page with all posts
  public function feed()
  {
    // load in the user profile and feed
    $this->load->model('user');
    $this->load->model('post');
    if($this->session->userdata())
    {
      $users = $this->user->get_user_byid($this->session->userdata('user_id'));
      $messages = $this->post->allpost();
      $data = array(
        'users'=>$users,
        'messages'=>$messages
      );
      $this->load->view('partials/header');
      $this->load->view('/users/feed', $data);
    }
    else
    {
      redirect('/');
    }
  }

  // profile page showing all the user's posts
  public function profile()
  {
    // load in user and post models
    $this->load->model('user');
    $this->load->model('post');
    // grab data from url
    $userid = $this->uri->segment(3);
    // find all posts by this user
    $profile = $this->post->get_posts_by_userid($userid);
    $data = array(
      'profile'=>$profile
    );
    $this->load->view('partials/header');
    $this->load->view('/users/profile', $data);
  }

  // log user out
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('/');
  }

}
