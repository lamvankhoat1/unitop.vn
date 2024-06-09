<?php
    function construct() {
      load_model("index");
      load("helper", "url");
      load("lib", "pagination");
    };
  
    function indexAction() {
      $page_position = 1;
      $num_posts = 4;
      if (isset($_GET['page'])) {
        $page_position = $_GET['page'];
      }
      if (isset($_GET['num_posts'])) {
        $num_posts = $_GET['num_posts'];
      }

      $data = array(
        'list_posts' => get_list_posts($page_position, $num_posts),
        'num_posts' => get_num_posts()
      );
      load_view("blog", $data);
    };
?>