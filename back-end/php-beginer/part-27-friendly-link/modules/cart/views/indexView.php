<?php get_header() ?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Giỏ hàng</h3>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          if (array_key_exists('buy', $_SESSION['cart'])) {
                            foreach ($_SESSION['cart']['buy'] as $product) {  ?>
                                <tr>
                                    <td><?php echo $product['code']; ?></td>
                                    <td>
                                        <a href="?mod=product&controller=detail&id=<?php echo $product['id']; ?>" title="" class="thumb">
                                            <img src="<?php echo $product['thumb']; ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?mod=product&controller=detail&id=<?php echo $product['id']; ?>" title="" class="name-product"><?php echo $product['name']; ?></a>
                                    </td>
                                    <td><?php echo currency_format($product['price']); ?></td>
                                    <td>
                                        <input type="number" data-id="<?php echo $product['id']; ?>" data-price="<?php echo $product['price']; ?>" name="num-order" value="<?php echo $product['qty']; ?>" class="num-order">
                                    </td>
                                    <td id="sub-total-<?php echo $product['id'] ?>"><?php echo currency_format($product['sub_total']); ?></td>
                                    <td>
                                        <a href="?mod=cart&controller=index&action=deleteItem&id=<?php echo $product['id']; ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php  }
                          }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span><?php echo currency_format($_SESSION['cart']['info']['sub_total']); ?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a>
                                        <a href="thanh-toan.html" title="" id="checkout-cart">Thanh toán</a>
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
                <a href="?mod=cart&controller=index&action=deleteAll" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<script>
    // AJAX
    $(document).ready(function(){
      $("table input").click(function(){
        let qty = $(this).val();
        let price = $(this).get(0).dataset.price;
        let id = $(this).get(0).dataset.id;
        
        $.ajax({
          url: '?mod=cart&controller=index&action=updateAjax',
          method: 'POST',
          data: {qty, price, id},
          dataType: 'json',
          success: function(result) {
            // console.log(`result`, result);
            $("#sub-total-"+id).html(result.total_current);
            $("#total-price span").html(result.total_all);
            $("#num").html(result.qty_all);
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          }
        })
      })
    })
</script>
<?php get_footer() ?>