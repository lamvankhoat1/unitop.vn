<?php
  $id = $_POST['id'];
  $qty = $_POST['num_order'];
  $price = $_POST['price'];

  $_SESSION['cart']['buy'][$id]['qty'] = $qty;
  $_SESSION['cart']['buy'][$id]['sub_total'] = $qty*$price;
  update_cart();

  $result = array(
    'total_item' => currency($qty*$price),
    'qty_info' => $_SESSION['cart']['info']['qty'],
    'price_info' => currency($_SESSION['cart']['info']['price'])
  );
  echo json_encode($result);
?>

<?php
    //   $_SESSION['cart']['info'] = array(
    //     'qty' => $total_qty,
    //     'price' => $total_price
    //     );
?>