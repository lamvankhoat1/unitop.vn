<?php
      function construct() {
        load_model("order");
        load("lib", "number");
        load("helper", "url");
      };
    
      function indexAction() {
        $data = array(
          'list_orders' => get_list_orders(),
        );
        load_view("list_orders", $data);
      };

      function detailAction() {
        if(isset($_GET['id'])) {
          $id = $_GET['id'];
          $data = array(
            'order' => get_order_by_id($id),
          );
          load_view("detail_order", $data);
        } else {
          redirect_to("?mod=cart");
        }
      };
      
      
?>