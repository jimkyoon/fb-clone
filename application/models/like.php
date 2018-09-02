<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like extends CI_Model {

  // like a post
  public function liked($like, $liker)
  {
    $query = "INSERT INTO likes (`like`, created_at, updated_at, user_id, post_id) VALUES (?,?,?,?,?)";
    $values = array(1, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $liker, $like);
    return $this->db->query($query, $values);
  }

  // dislike a post
  public function disliked($like, $liker)
  {
    $query = "INSERT INTO likes (`like`, created_at, updated_at, user_id, post_id) VALUES (?,?,?,?,?)";
    $values = array(2, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $liker, $like);
    return $this->db->query($query, $values);
  }

  // check for like/dislike?
  public function like_set($like, $liker)
  {
    $query = "SELECT EXISTS(SELECT * FROM likes WHERE (user_id=? AND post_id=?))";
    $values = array($liker, $like);
    if($this->db->query($query, $values))
    {
      return "continue";
    }
    else
    {
      return "valid";
    }
  }

  // count the like/dislike

}