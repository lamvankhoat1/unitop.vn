<?php
      function construct() {
        load_model('menu');
      };
    
      function indexAction() {
        $data = array(
          'list_menu' => get_list_menu()
        );
        load_view("menu", $data);
      };
      
      // ajax
      function ajaxAddMenuAction() {
        $name = $_POST['name'];
        $order_item = (int)$_POST['order_item'];
        $url_static = $_POST['url_static'];
        
        $error = array();
        foreach (array('name', 'order_item', 'url_static') as $value) {
          if(empty($$value)) {
            $error[$value] = "Không được để trống trường {$value}";
          }
        };

        if(!is_numeric($order_item)){
          $error['order_item'] = 'Vui lòng nhập số thứ tự ở trường này';
        }

        $result = array();
        if(!empty($error)) {
          $result['error'] = $error;
          echo json_encode($result);
        } else {
          add_menu($_POST);
          $result['success'] = 'Thêm menu item thành công';
          $result['data'] = get_list_menu();
          echo json_encode($result);
        }
      };

      function ajaxEditMenuAction() {
        $result = array();
        
        update_menu($_POST);
        $result['data'] = get_list_menu();
        $result['status'] = "Cập nhật menu thành công";
        echo json_encode($result);
      };
      
      
      function ajaxDeleteMenuAction() {
        delete_menu($_POST['id']);
        echo "Xoá menu thành công";
      };

      function ajaxDeleteManyItemsMenuAction() {
        delete_many_items_menu($_POST['id_list_string']);
        $result['data'] = get_list_menu();
        $result['status'] = "Đã xoá các menu có id: {$_POST['id_list_string']}";
        echo json_encode($result);
      };
      
      

      
      
?>