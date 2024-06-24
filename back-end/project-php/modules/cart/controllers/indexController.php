<?php
    function construct() {
      load_model("cart");
      load("lib", "cookie");
      load("helper", "url");
    };
  
    function indexAction() {
      load("lib", "number");
      load_view("cart");
    };

    function addAction() {
        $id = (int)$_GET['id'];
        $product = get_product_by_id($id);

        /** Khôi phục lại session từ cookie nếu người dùng đã chọn mua hàng trước đó */
        if (!isset($_SESSION)) {
          $_SESSION['cart'] = json_decode($_COOKIE['cart'], 1);
        }

        if (array_key_exists_multi_level('buy', $_SESSION)) {
          if (!array_key_exists($id, $_SESSION['cart']['buy'])) {
            $_SESSION['cart']['buy'][$id] = $product;
          }
        } else {
          $_SESSION['cart']['buy'][$id] = $product;
        }

        if (array_key_exists('qty', $_SESSION['cart']['buy'][$id])) {
          $_SESSION['cart']['buy'][$id]['qty'] += 1;
        } else {
          $_SESSION['cart']['buy'][$id]['qty'] = 1;
        }

        $_SESSION['cart']['buy'][$id]['total_price'] = $_SESSION['cart']['buy'][$id]['qty'] * $_SESSION['cart']['buy'][$id]['new_price'];

        setcookie("cart", json_encode($_SESSION['cart']), time() + 3600, "/");
        update_cart();
        
        redirect_to("?mod=cart");
    };

    function update_cart() {
      $list_price = array();
      $list_qty = array();
      foreach ($_SESSION['cart']['buy'] as $id => $product) {
        $list_total_price[] = $product['total_price'] * $product['qty'];
        $list_qty[] = $product['qty'];
      }
      $_SESSION['cart']['summary']['total_price'] = array_sum($list_total_price);
      $_SESSION['cart']['summary']['qty'] = array_sum($list_qty);
    }

    function buyNowAction() {
      $id = $_GET['id'];
      $data = array(
          'product' => get_product_by_id($id),
      );
      load_view("checkout", $data);
    };

    function checkOutAction() {
      load_view("checkOut");
    };

    // ===============
    // AJAX
    // ===============
    function ajaxUpdateQtyAction() {
      $id = $_POST['id'];
      $qty = $_POST['qty'];
      // update to SESSION
      $_SESSION['cart']['buy'][$id]['qty'] = (int)$qty;
      update_cart();
      // trả về tổng tiền cho từng sản phẩm và tổng tiền cho toàn bộ sản phẩm và xuất lên màn hình
      $result = array(
        'total_price_item' => $_SESSION['cart']['buy'][$id]['total_price'] = $qty * $_SESSION['cart']['buy'][$id]['new_price'],
        'total_price_all' => $_SESSION['cart']['summary']['total_price'],
        'total_qty' => $_SESSION['cart']['summary']['qty'],
      );
      echo json_encode($result);
    };
    
    
    
    
    
    
?>