<?php
  function construct() {
      load("helper", "format");
      load("helper", "cookie");
      load_model("category");
    };
    
    function indexAction() {
      $id = $_GET['id'];

      $list_product = get_list_product_by_cat_id($id);
      load_view("category", array(
        'list_product' => $list_product
      ));
  };
  
  



?>