<?php get_header() ?>
<?php
  $list_products = array();
  $cart_info = array(
    'total_price' => 0
  );
  if (array_key_exists_multi_level('buy',$_SESSION)) {
    $list_products = $_SESSION['cart']['buy'];
  }
  
  if (array_key_exists_multi_level('summary',$_SESSION)) {
    $cart_info = $_SESSION['cart']['summary'];
  }

  if (empty($list_products)) {
    redirect_to("?mod=cart");
  }

?>
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                <form method="POST" action="" name="form-checkout">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên<span class="form-error" id="error-fullname"></span></label>
                            <input type="text" name="fullname" id="fullname">
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email<span class="form-error" id="error-email"></span></label>
                            <input type="email" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ<span class="form-error" id="error-address"></span></label>
                            <input type="text" name="address" id="address">
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại<span class="form-error" id="error-phone"></span></label>
                            <input type="tel" name="phone" id="phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note" id="note"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_products as $key => $product) {  ?>
                            <tr class="cart-item">
                                <td class="product-name"><?php echo $product['name']; ?><strong class="product-quantity">x <?php echo $product['qty']; ?></strong></td>
                                <td class="product-total"><?php echo currency($product['total_price']); ?> đ</td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price"><?php echo currency($cart_info['total_price']);?> đ</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div id="payment-checkout-wp">
                    <ul id="payment_methods"><span class="form-error" id="error-payment-method"></span>
                        <li>
                            <input type="radio" id="direct-payment" name="payment-method" value="direct-payment">
                            <label for="direct-payment">Thanh toán tại cửa hàng</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment-method" value="payment-home">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                    </ul>
                </div>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" value="Đặt hàng" name="order-now-btn">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#order-now").click(function(){
            let orderInfo = {};
            ['fullname', 'email', 'address', 'phone', 'note'].forEach(function(value) {
                orderInfo[value] = $('#'+value).val();
            });
            orderInfo['payment_method'] = $('input[type="radio"][name="payment-method"]:checked').val();
            orderInfo['payment_method'] = (orderInfo['payment_method']) ? orderInfo['payment_method'] : "";
            buttonOrderNowClicked(orderInfo);
        })
    })

    function buttonOrderNowClicked(orderInfo) {
        $.ajax({
          url: '?mod=cart&controller=index&action=ajaxOrderNow',
          method: 'POST',
          data: orderInfo,
          dataType: 'json',
          success: function(result) {
            if (result.length == 0) {
                addOrderInfo(orderInfo);
            } else {
                // reset error
                ['fullname', 'email', 'address', 'phone', 'payment-method'].forEach(function(value) {
                    $('#error-' + value).html("");
                }) 
                // set error
                let keyError = Object.keys(result);
                console.log(`result`, result);
                keyError.forEach(function(key) {
                    $('#error-' + key).html(result[key]);
                })
                // focus first input error
                $("#"+keyError[0]).focus();
                
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
          }
        })
    }

    function addOrderInfo(orderInfo) {
        $.ajax({
          url: '?mod=cart&controller=index&action=ajaxAddOrderInfo',
          method: 'POST',
          data: orderInfo,
          dataType: 'html',
          success: function(result) {
            $("#wrapper").html(result);
            $('body').scrollTop(0);
          },
          error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
          }
        })
    }
</script>
<?php get_footer() ?>