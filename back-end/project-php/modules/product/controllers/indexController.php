<?php
    function construct() {
      load_model("index");
    };
  
    function indexAction() {
      $cat_id= $_GET['cat_id'];
      $data = array(
        'cat_id' => $cat_id,
      );
      load_view("category_product", $data);
    };
?>