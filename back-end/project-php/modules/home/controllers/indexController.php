<?php
    /** 
     * Sản phẩm bán chạy, dựa trên số lượng đã bán, sắp xếp từ cao xuống thấp
    */
    function construct() {
      load("lib", "data");
    };
  

    function indexAction() {
      load_model("slider");
      load_model("product");
      load("lib", "number");
      $data = array(
        'list_sliders' => get_list_sliders(),
        'list_products_phone' => get_list_products(1),
        'list_products_tablet' => get_list_products(3),
      );
      load_view("home", $data);
    };
?>