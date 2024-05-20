<?php get_header(); ?>
<?php
  $cat_id =  $_GET['cat_id'];
  $list_product = get_list_product_by_cat_id($cat_id);
?>
<div id="main-content-wp" class="category-product-page">
    <div class="wp-inner clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                    <p class="section-desc">Có 20 sản phẩm trong mục này</p>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                          foreach ($list_product as $product) {
                            echo "<li>";
                            echo "  <a href=\"?mod=product&act=detail&id={$product['id']}\" title=\"{$product['name']}\" class=\"thumb\"><img src=\"{$product['thumb']}\" alt=\"{$product['name']}\"></a>";
                            echo "  <a href=\"?mod=product&act=detail&id={$product['id']}\" title=\"{$product['name']}\" class=\"title\">{$product['name']}</a>";
                            echo "  <p class=\"price\">".currency($product['price'])."</p>";
                            echo "</li>";
                          }
                        ?>     
                    </ul>
                </div>
            </div>
            <div class="section" id="pagenavi-wp">
                <div class="section-detail">
                    <ul id="list-pagenavi">
                        <li class="active">
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                    <a href="" title="" class="next-page"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>