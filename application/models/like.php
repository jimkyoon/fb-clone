<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like extends CI_Model {

  // like a post
  public function like($like, $liker)
  {
    $query = "INSERT INTO likes (like, created_at, updated_at, user_id, post_id) VALUES (?,?,?,?,?)";
    $values = array(1, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $liker, $like);
    return $this->db->query($query, $values);
  }

  // dislike a post
  public function dislike($dislike, $disliker)
  {
    $query = "INSERT INTO likes (like, created_at, updated_at, user_id, post_id) VALUES (?,?,?,?,?)";
    $values = array(2, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $disliker, $dislike);
    return $this->db->query($query, $values);
  }

  // check for like/dislike?
  public function like_set()
  {
    
  }

  // count the like/dislike

}