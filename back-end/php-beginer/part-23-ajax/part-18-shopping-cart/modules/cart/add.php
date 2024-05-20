<?php
    $id = (int)$_GET['id'];
    $product = $list_product[$id];
    
    # LƯU THÔNG TIN SẢN PHẨM VÔ GIỎ HÀNG
    $qty = 1;
    if (!empty($_SESSION['cart']['buy'][$id])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
    }

    $_SESSION['cart']['buy'][$id] = array(
        'id' => $product['id'],
        'code' => $product['code'],
        'thumb' => $product['thumb'],
        'name' => $product['name'],
        'price' => $product['price'],
        'qty' => $qty,
        'sub_total' => $product['price'] * $qty
    );

    update_cart();

    // CHUYỂN HƯỚNG ĐẾN GIỎ HÀNG cart/show.php
    redirect_to("?mod=cart&act=show");
?>