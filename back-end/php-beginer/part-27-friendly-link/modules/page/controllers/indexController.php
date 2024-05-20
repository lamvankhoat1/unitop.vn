<?php
  function construct() {
    load("helper", "cookie");
  };

  function indexAction() {
      $id = $_GET['id'];

      load_model('index');  
      $post_info = get_post_by_id($id);
      
      load_view('index', array(
        'post_info' => $post_info,
      ));

  };
  
  
  
  
?>