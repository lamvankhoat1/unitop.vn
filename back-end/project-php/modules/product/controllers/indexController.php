<?php
    /** 
     * Dựa vào cat_id để lấy ra các 'cat_id con' liên quan đến cat_id, sau đó xuất ra màn hình hiển thị
    */
    function construct() {
      load_model("index");
      load("lib", "data");
      load("lib", "number");
    };
  
    function indexAction() {
      $cat_id= $_GET['cat_id'];
      $list_cats = tree_data(get_list_cats(), $cat_id);
      
      $list_cats_id = array($cat_id);
      $list_cats_id = array_merge($list_cats_id, array_map(function ($cat) {return $cat['id'];}, $list_cats));

      $data = array(
        'cat_id' => $cat_id,
        'cat_name' => get_name_cat_by_id($cat_id),
        'list_products' => get_products_by_cat_id($list_cats_id)
      );
      load_view("category_product", $data);
    };

    function detailAction() {
      $id= $_GET['id'];
      echo $id;
    };
    
    
?>