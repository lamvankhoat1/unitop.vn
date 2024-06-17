<?php
    /** 
     * Dựa vào cat_id để lấy ra các 'cat_id con' liên quan đến cat_id, sau đó xuất ra màn hình hiển thị
    */
    function construct() {
      load_model("index");
      load("lib", "data");
      load("lib", "image");
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
      $cat_id= $_GET['cat_id'];
      $data = array(
        'product' => get_product_by_id($id),
        'products_same_cat' => get_products_by_same_cat($id, $cat_id)
      );
      load_view("detail_product", $data);
    };

    function filterListProductsAction() {
      $list_products = array();
      $where = "WHERE ";
      if (isset($_POST['min_price'])) {
        $where .= "price >= {$_POST['min_price']} ";
      }
      if (isset($_POST['max_price'])) {
        $where .= " AND price <= {$_POST['max_price']} ";
      }
      if (isset($_POST['company_id'])) {
        $where .= " AND company_id =  {$_POST['company_id']}";
      }
      if (isset($_POST['cat_id'])) {
        $where .= " AND `cat_id` IN ({$_POST['cat_id']})";
      }
      
      $where = preg_replace('/WHERE\s+AND/', "WHERE ", $where);
      $list_products = array_merge($list_products, get_list_products_by_filter($where));

      echo json_encode($list_products);
      
    };

    function getCatNameByAjaxAction() {
      $result =  get_name_cat_by_id($_POST['cat_id']);
      echo $result;
    }
    
    
    
    
?>