<?php
  function construct() {
    load("helper", "cookie");
    load("helper", "url");
    load('helper', "format");
    load_model("index");
  };
  
  function indexAction() {
    updateAction();
    load_view("index");
  };
  
  

  function addAction() {
    $id = $_GET['id'];
    $product = get_product_by_id($id);

    if (isset($_SESSION['cart']['buy'][$id])) {
      $_SESSION['cart']['buy'][$id]['qty'] += 1;
    } else {
      $_SESSION['cart']['buy'][$id]['qty'] = 1;
    }

    foreach ($product as $key => $value) {
      $_SESSION['cart']['buy'][$id][$key] = $value;
    };

    $_SESSION['cart']['buy'][$id]['sub_total'] = $_SESSION['cart']['buy'][$id]['qty'] * $product['price'];
    updateAction();


    redirect_to("?mod=cart&controller=index");
  };

  function updateAction() {
    $_SESSION['cart']['info']['qty'] = 0;
    $_SESSION['cart']['info']['sub_total'] = 0;
    if (isset($_SESSION['cart']['buy'])) {
      foreach ($_SESSION['cart']['buy'] as $product) {
        $_SESSION['cart']['info']['qty'] += $product['qty'];
        $_SESSION['cart']['info']['sub_total'] += $product['sub_total'];
      }
    }
  }

  function updateAjaxAction() {
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $id = $_POST['id'];
    // UPDATE
    $_SESSION['cart']['buy'][$id]['qty']  = $qty;
    $_SESSION['cart']['buy'][$id]['sub_total']  = $price*$qty;
    updateAction();

    $total_current = currency_format($price*$qty);
    $total_all = currency_format($_SESSION['cart']['info']['sub_total']);
    $qty_all = $_SESSION['cart']['info']['qty'];
    echo json_encode(array(
      'total_current' => $total_current,
      'total_all' => $total_all,
      'qty_all' => $qty_all
    ));
  }

  function deleteItemAction() {
    $id = $_GET['id'];
    unset($_SESSION['cart']['buy'][$id]);
    redirect_to("?mod=cart&controller=index");
  }

  function deleteAllAction() {
    unset($_SESSION['cart']['buy']);
    redirect_to("?mod=cart&controller=index");
  };
  
  
  
  
?>
