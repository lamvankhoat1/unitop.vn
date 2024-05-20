<?php get_header(); ?>
<div id="main-content-wp" class="home-page">
    <div class="wp-inner clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                          foreach ($list_product_cat_1 as $product) {  ?>
                        <li>
                            <a href="?mod=product&controller=detail&id=<?php echo $product['id']; ?>" title="" class="thumb">
                                <img src="<?php echo $product['thumb']; ?>" alt="">
                            </a>
                            <a href="?mod=product&controller=detail&id=<?php echo $product['id']; ?>" title="" class="title"><?php echo $product['name']; ?></a>
                            <p class="price"><?php echo currency_format($product['price']); ?></p>
                        </li>
                          <?php  }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                    <?php
                          foreach ($list_product_cat_2 as $product) {  ?>
                        <li>
                            <a href="?mod=product&controller=detail&id=<?php echo $product['id']; ?>" title="" class="thumb">
                                <img src="<?php echo $product['thumb']; ?>" alt="">
                            </a>
                            <a href="?mod=product&controller=detail&id=<?php echo $product['id']; ?>" title="" class="title"><?php echo $product['name']; ?></a>
                            <p class="price"><?php echo currency_format($product['price']); ?></p>
                        </li>
                          <?php  }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>