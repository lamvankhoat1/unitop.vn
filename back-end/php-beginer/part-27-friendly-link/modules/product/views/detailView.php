<?php get_header() ?>
<div id="main-content-wp" class="detail-product-page clearfix">
    <div class="wp-inner clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="info-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb fl-left">
                        <img src="<?php echo $product_info['thumb']; ?>" alt="">
                    </div>
                    <div class="detail fl-right">
                        <h3 class="title"><?php echo $product_info['name']; ?></h3>
                        <p class="price"><?php echo currency_format($product_info['price']); ?></p>
                        <p class="product-code">Mã sản phẩm: <span><?php echo $product_info['code']; ?></span></p>
                        <div class="desc-short">
                            <h5>Mô tả sản phẩm:</h5>
                            <p><?php echo $product_info['short_description']; ?></p>
                        </div>
                        <div class="num-order-wp">
                            <span>Số lượng:</span>
                            <input type="text" id="num-order" name="num-order" value="1">
                            <a href="?mod=cart&controller=index&action=add&id=<?php echo $product_info['id']; ?>" title="" class="add-to-cart">Thêm giỏ hàng</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section" id="desc-wp">
                <div class="section-head">
                    <h3 class="section-title">Chi tiết sản phẩm</h3>
                </div>
                <div class="section-detail"><?php echo str_replace("\n", "<br>", $product_info['detail']); ?></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>