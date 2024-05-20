<?php
  function construct() {
    load("helper", "format");
    load("helper", "cookie");
    load_model('detail');
  };
  
  function indexAction() {
    $id = $_GET['id'];
    $product_info =  get_product_by_id($id);
  
    load_view("detail", array(
      'product_info' => $product_info,
    ));
  };
  
  

  
?>