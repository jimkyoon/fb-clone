<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
  
  // load in the models
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user');
    $this->load->model('post');
  }

  // create the post
  public function create()
  {
    $post = $this->input->post();
    $poster = $this->session->userdata('user_id');
    $this->post->create($post, $poster);
    $success[] = "Your post has been put on the wall!";
    $this->session->set_flashdata('success', $success);
    redirect('/users/feed');
  }

  // user likes a post
  public function like()
  {
    
  }
}