<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  // load the first page to the site
	public function index()
	{
    $this->load->view('partials/header');
		$this->load->view('main');
  }
  
}
