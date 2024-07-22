<?php get_header() ?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php foreach ($list_sliders as $slider) {  ?>
                        <div class="item">
                            <a href="<?php echo $slider['url']; ?>"><img src="<?php echo $slider['slider']; ?>" alt="<?php echo $slider['name']; ?>" title="<?php echo $slider['name']; ?>"></a>
                        </div>
                    <?php  } ?>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach ($list_feature_products as $product) {  ?>
                            <li>
                                <a href="?mod=product&action=detail&id=<?php echo $product['id']; ?>&cat_id=<?php echo $product['cat_id']; ?>" title="<?php echo $product['name']; ?>" class="thumb">
                                    <img src="<?php echo $product['thumb_main']; ?>">
                                </a>
                                <a href="?mod=product&action=detail&id=<?php echo $product['id']; ?>&cat_id=<?php echo $product['cat_id']; ?>" title="<?php echo $product['name']; ?>" class="product-name" style="min-height: 35px"><?php echo $product['name']; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency($product['new_price']); ?>đ</span>
                                    <span class="old"><?php echo currency($product['price']); ?>đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?mod=cart&action=add&id=<?php echo $product['id']; ?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?mod=cart&action=buyNow&id=<?php echo $product['id']; ?>" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach ($list_products_phone as $product) {  ?>
                            <li>
                                <a href="?mod=product&action=detail&id=<?php echo $product['id']; ?>&cat_id=<?php echo $product['cat_id']; ?>" title="" class="thumb">
                                    <img src="<?php echo $product['thumb_main']; ?>">
                                </a>
                                <a href="?mod=product&action=detail&id=<?php echo $product['id']; ?>&cat_id=<?php echo $product['cat_id']; ?>" title="<?php echo $product['name']; ?>" class="product-name" style="min-height: 33px"><?php echo $product['name']; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency($product['new_price']); ?></span>
                                    <span class="old"><?php echo currency($product['price']); ?></span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?mod=cart&action=add&id=<?php echo $product['id']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?mod=cart&action=buyNow&id=<?php echo $product['id']; ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Máy tính bảng</h3>
                </div>
                <div class="section-detail">
                <ul class="list-item clearfix">
                        <?php foreach ($list_products_tablet as $product) {  ?>
                            <li>
                                <a href="?mod=product&action=detail&id=<?php echo $product['id']; ?>&cat_id=<?php echo $product['cat_id']; ?>" title="" class="thumb">
                                    <img src="<?php echo $product['thumb_main']; ?>">
                                </a>
                                <a href="?mod=product&action=detail&id=<?php echo $product['id']; ?>&cat_id=<?php echo $product['cat_id']; ?>" title="<?php echo $product['name']; ?>" class="product-name" style="min-height: 33px"><?php echo $product['name']; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency($product['new_price']); ?></span>
                                    <span class="old"><?php echo currency($product['price']); ?></span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?mod=cart&action=add&id=<?php echo $product['id']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?mod=cart&action=buyNow&id=<?php echo $product['id']; ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php get_sidebar('home') ?>
    </div>
</div>
<?php get_footer() ?>