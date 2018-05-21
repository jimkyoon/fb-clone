<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

  // find a user
  public function find($id)
  {
    return $this->db->query("SELECT * FROM users WHERE id = ?", array($id)) -> row_array();
  }

  // create a user
  public function create($post)
  {
    $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,?,?)";
    $values = array($post['first_name'], $post['last_name'], $post['email'], md5($post['password']), date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
    $id = $this->db->insert_id($this->db->query($query, $values));
    return $id;
  }

  // validate the post data before going into the database
  public function validate($post) 
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
    $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|matches[password_confirmation]');
    $this->form_validation->set_rules('password_confirmation', 'password confirmation', 'trim|required');
    if($this->form_validation->run()) 
    {
      return "valid";
    }
    else 
    {
      return array(validation_errors());
    }
  }

  // find a user by email, for login purposes
  public function get_user_by_email($email)
  {
    $this->db->where('email', $email);
    $query = $this->db->get('users');
    return $query->row();
  }

}