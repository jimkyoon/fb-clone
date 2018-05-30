<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Model {

  // load all posts
  public function allpost()
  {
    $query = "SELECT * FROM posts";
    return $this->db->query($query)->row_array();
  }

  // create the post
  public function create($post, $poster)
  {
    $query = "INSERT INTO posts (content, created_at, updated_at, user_id) VALUES (?,?,?,?)";
    $values = array($post['content'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $poster);
    return $this->db->query($query, $values);
  }

}