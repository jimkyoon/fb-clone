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

  public function create()
  {
    
  }
}