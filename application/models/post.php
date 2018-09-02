<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Model {

  // load all posts
  public function allpost()
  {
    // find all posts and limit the results to 25
    $query = "SELECT * FROM posts 
      LEFT JOIN users ON users.id = posts.user_id 
      LEFT JOIN likes ON likes.post_id = posts.id 
      ORDER BY posts.updated_at DESC LIMIT 25";
    return $this->db->query($query)->result_array();
  }

  // get all posts for a user
  public function get_posts_by_userid($userid)
  {
    $query = "SELECT * FROM posts 
      LEFT JOIN users ON users.id = posts.user_id WHERE user_id = $userid";
    return $this->db->query($query)->result_array();
  }

  // create the post
  public function create($post, $poster)
  {
    $query = "INSERT INTO posts (content, created_at, updated_at, user_id) VALUES (?,?,?,?)";
    $values = array($post['content'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $poster);
    return $this->db->query($query, $values);
  }

}