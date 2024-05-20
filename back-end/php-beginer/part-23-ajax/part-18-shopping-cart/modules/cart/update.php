<?php
if (isset($_POST['btn_update'])) {
 # lấy ra data
 $data_qty = $_POST['qty'];
 # update lại vô session
 foreach ($data_qty as $id => $qty) {
    $_SESSION['cart']['buy'][$id]['qty'] = $qty;
 };
 update_cart();
 # redirect cart/show.php
}
  redirect_to("?mod=cart&act=show");
?>