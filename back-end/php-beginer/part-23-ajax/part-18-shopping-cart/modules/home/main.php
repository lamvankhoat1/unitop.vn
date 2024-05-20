<?php get_header(); ?>
<?php
  $list_cat_1 = get_list_product_by_cat_id(1);
  $list_cat_2 = get_list_product_by_cat_id(2);
?>
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
                        foreach ($list_cat_1 as $product) {
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
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                    <?php
                        foreach ($list_cat_2 as $product) {
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
        </div>
    </div>
</div>
<?php get_footer(); ?>