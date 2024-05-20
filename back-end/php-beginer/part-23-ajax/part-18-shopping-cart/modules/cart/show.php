<?php get_header() ?>
<?php
//   unset($_SESSION['cart']['buy']);
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Giỏ hàng</h3>
            </div>
        </div>
    </div>
    <form action="?mod=cart&act=update" method="POST">
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <?php if (isset($_SESSION['cart']['buy'])) { ?>
                <?php $list_cart_buy = $_SESSION['cart']['buy']; ?>
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
                                <?php foreach($list_cart_buy as $product) { ?>
                                    <tr>
                                        <td><?php echo $product['code']; ?></td>
                                        <td>
                                            <a href="?mod=product&act=detail&id=<?php echo $product['id']; ?>" title="" class="thumb">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="?mod=product&act=detail&id=<?php echo $product['id']; ?>" title="" class="name-product"><?php echo $product['name']; ?></a>
                                        </td>
                                        <td><?php echo currency($product['price']); ?></td>
                                        <td>
                                            <input type="number" data-price="<?php echo $product['price']; ?>" data-index="<?php echo $product['id']; ?>" name="qty[<?php echo $product['id']; ?>]" value="<?php echo $product['qty']; ?>" class="num-order" min="0">
                                        </td>
                                        <td><?php echo currency($product['sub_total']); ?></td>
                                        <td>
                                            <a href="" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá: <span><?php
                                            if (isset($_SESSION['cart']['info'])) {
                                                echo currency($_SESSION['cart']['info']['price']);
                                            } else {
                                                echo 0;
                                            }
                                            ?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <button title="" id="update-cart" name="btn_update" value="btn_update">Cập nhật giỏ hàng</button>
                                                <a href="?mod=cart&act=checkout" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
            <?php } else { ?>
                <p>Chưa có sản phẩm nào được chọn</p>
            <?php } ?>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?mod=home&act=main" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=cart&act=delete_all" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
    </form>
</div>
<script>
    $(document).ready(function(){
      $("input.num-order").change(function(){
        let current_input = $(this);
        let price = $(this).get(0).dataset.price;
        let id = $(this).get(0).dataset.index;
        let num_order = $(this).val();
        //ajax
        $.ajax({
          url: '?mod=cart&act=ajax-process',
          method: 'POST',
          data: {price: price, id: id, num_order: num_order},
          dataType: 'json',
          success: function(result) {
            let total_dom_element = current_input.parent().next();
            console.log(`result`, result)
            total_dom_element.html(result.total_item);
            $("#total-price span").html(result.price_info);
            $("#cart-wp #num").html(result.qty_info);
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          }
        })
        // end ajax
      });

    })
</script>
<?php get_footer() ?>