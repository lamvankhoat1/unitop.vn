<?php get_header() ?>
<?php
  $list_products = array();
  if (array_key_exists_multi_level('buy',$_SESSION)) {
    $list_products = $_SESSION['cart']['buy'];
  }
  
  if (array_key_exists_multi_level('summary',$_SESSION)) {
    $cart_info = $_SESSION['cart']['summary'];
  }
  
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giỏ hàng của bạn</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count_product = 0 ?>
                        <?php foreach ($list_products as $id => $product) {  ?>
                            <tr>
                                <td><?php echo ++$count_product; ?></td>
                                <td>
                                    <a href="?mod=product&action=detail&cat_id=<?php echo $product['cat_id']; ?>&id=<?php echo $id; ?>" title="" class="thumb">
                                        <img src="<?php echo $product['thumb_main']; ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="?mod=product&action=detail&cat_id=<?php echo $product['cat_id']; ?>&id=<?php echo $id; ?>" title="" class="name-product"><?php echo $product['name']; ?></a>
                                </td>
                                <td><?php echo currency($product['new_price']   ); ?> <u>đ</u></td>
                                <td>
                                    <input type="number" data-id="<?php echo $id; ?>" name="num-order" value="<?php echo $product['qty']; ?>" class="num-order">
                                </td>
                                <td class="total-price-<?php echo $id; ?>"><?php echo currency($product['total_price']); ?> <u>đ</u></td>
                                <td>
                                    <a href="" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span><?php echo currency($cart_info['total_price']); ?> <u>đ</u></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="?mod=cart&action=checkOut" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
    //   Nếu số lượng được đặt về 0 khi load lại trang sẽ xoá sản phẩm đó đi
      $('[name="num-order"]').change(function(){
        let qty = $(this).val();
        let idProduct = $(this).data("id");
        ajaxUpdateQty(idProduct, +qty);
      })
    })

    function ajaxUpdateQty(id, qty) {
        $.ajax({
          url: '?mod=cart&action=ajaxUpdateQty',
          method: 'POST',
          data: {id, qty},
          dataType: 'json',
          success: function(result) {
            console.log(result)
            $(`.total-price-${id}`).html(currency(result.total_price_item));
            $(`#total-price span`).html(currency(result.total_price_all));
            $(".num-cart").html(result.total_qty);
          },
          error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
          }
        })
    }

    function currency(number){
        return number.toLocaleString('vi-VN', {
            style: 'currency',
            currency: "VND"
        })
    }
</script>
<?php get_footer() ?>