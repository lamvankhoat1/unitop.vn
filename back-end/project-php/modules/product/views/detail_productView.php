<?php get_header() ?>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="http://localhost/unitop.vn/back-end/project-php/?mod=product&cat_id=<?php echo $product['cat_id']; ?>" title=""><?php echo get_name_cat_by_id($product['cat_id']); ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
          $data_image = json_decode($product['list_thumbs'], 1);
          foreach ($data_image as $key => $thumb) {
            $path = str_replace("../", "", $thumb['path']);
            resize_image(350, 350, $path);
            resize_image(700, 700, $path);
            resize_image(50, 50, $path);

            $dir = pathinfo($path, PATHINFO_DIRNAME)."/resize";
            $type = pathinfo($path, PATHINFO_EXTENSION );
            
            $base_name_700_700 = pathinfo($path, PATHINFO_FILENAME)."-700x700";
            $base_name_350_350 = pathinfo($path, PATHINFO_FILENAME)."-350x350";
            $base_name_50_50 = pathinfo($path, PATHINFO_FILENAME)."-50x50";
            
            
            $new_path_700_700 = $dir."/".$base_name_700_700.".".$type;
            $new_path_350_350 = $dir."/".$base_name_350_350.".".$type;
            $new_path_50_50 = $dir."/".$base_name_50_50.".".$type;
            
            $data_image[$key]['path'] = $path;
            $data_image[$key]['350_350'] = $new_path_350_350;
            $data_image[$key]['700_700'] = $new_path_700_700;
            $data_image[$key]['50_50'] = $new_path_50_50;
            
          }

          ;
          resize_image(350, 350, $product['thumb_main_client']);
          resize_image(700, 700, $product['thumb_main_client']);
          $product['thumb_main_client_350_350'] = pathinfo($path, PATHINFO_DIRNAME)."/resize/".pathinfo($path, PATHINFO_FILENAME)."-350x350".".".$type;
          $product['thumb_main_client_700_700'] = pathinfo($path, PATHINFO_DIRNAME)."/resize/".pathinfo($path, PATHINFO_FILENAME)."-700x700".".".$type;
        ?>

    
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" src="<?php echo $product['thumb_main_client_350_350']; ?>" data-zoom-image="<?php echo $product['thumb_main_client_700_700']; ?>"/>
                        </a>
                        <div id="list-thumb">
                            <?php foreach ($data_image as $thumb) {  ?>
                                <a href="" data-image="<?php echo $thumb['350_350']; ?>" data-zoom-image="<?php echo $thumb['700_700']; ?>">
                                    <img id="zoom" src="<?php echo $thumb['50_50']; ?>" />
                                </a>
                            <?php  } ?>
                        </div>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="<?php echo $product['thumb_main_client']; ?>" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $product['name']; ?></h3>
                        <div class="desc">
                            <?php echo $product['short_desc']; ?>
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <?php $stock_status = ($product['qty'] > 0) ? "Còn hàng" : "Hết hàng" ?>
                            <span class="status"><?php echo $stock_status; ?></span>
                        </div>
                        <p class="price"><?php echo currency($product['price']); ?>đ</p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num-order" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail"><?php echo $product['detail']; ?></div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach ($products_same_cat as $product) {  ?>
                            <li>
                                <a href="?mod=product&action=detail&cat_id=<?php echo $product['cat_id']; ?>&id=<?php echo $product['id']; ?>" title="" class="thumb">
                                    <img src="<?php echo $product['thumb_main']; ?>">
                                </a>
                                <a href="?mod=product&action=detail&cat_id=<?php echo $product['cat_id']; ?>&id=<?php echo $product['id']; ?>" title="" class="product-name" style="min-height: 35px"><?php echo $product['name']; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency($product['price']); ?>đ</span>
                                    <span class="old"><?php echo currency($product['new_price']); ?>đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php get_sidebar("detail-product") ?>
    </div>
</div>
<?php get_footer() ?>