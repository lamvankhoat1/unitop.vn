<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <?php  echo render_menu_cats(); ?>
        </div>
    </div>
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title">Bộ lọc</h3>
        </div>
        <div class="section-detail">
            <form method="POST" action="">
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Giá</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="radio" name="r-price" data-min-price='0' data-max-price='499999'></td>
                            <td>Dưới 500.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" data-min-price='500000' data-max-price='1000000'>
                            </td>
                            <td>500.000đ - 1.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" data-min-price='1000000' data-max-price='5000000'>
                            </td>
                            <td>1.000.000đ - 5.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" data-min-price='5000000' data-max-price='10000000'>
                            </td>
                            <td>5.000.000đ - 10.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" data-min-price='10000000'></td>
                            <td>Trên 10.000.000đ</td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Loại</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                  $list_cats = get_list_cats();
                                ?>
                        <?php foreach ($list_cats as $cat) {  ?>
                        <?php if($cat['cat_parent_id'] == 0) {  ?>
                        <tr>
                            <td><input type="radio" name="r-cat" data-cat='<?php echo $cat['id']; ?>'></td>
                            <td><?php echo $cat['name']; ?></td>
                        </tr>
                        <?php  }?>
                        <?php  } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="?page=detail_product" title="" class="thumb">
                <img src="public/images/banner.png" alt="">
            </a>
        </div>
    </div>
</div>