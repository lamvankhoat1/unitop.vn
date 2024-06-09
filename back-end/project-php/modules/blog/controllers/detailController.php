<?php
    function construct() {
        load_model("detail");
    };
  
    function indexAction() {
      $id = $_GET['id'];
      $data = array(
        'post' => get_post_by_id($id),
      );
      load_view("detail_blog", $data);
    };
?>