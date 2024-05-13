<?php
function update_cart() {
    $total_qty = 0;
    $total_price = 0;
    foreach($_SESSION['cart']['buy'] as $product) {
        $total_qty += $product['qty'];
        $total_price +=  $product['qty'] * $product['price'];
    };

    $_SESSION['cart']['info'] = array(
    'qty' => $total_qty,
    'price' => $total_price
    );
}

?>