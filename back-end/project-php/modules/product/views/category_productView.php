<?php get_header() ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="" class="cat_name"><?php echo $cat_name; ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left cat_name"><?php echo $cat_name; ?></h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị 45 trên 50 sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach ($list_products as $product) {  ?>
                            <li>
                                <a href="san-pham/<?php echo create_slug($product['name']); ?>-<?php echo $product['cat_id']; ?>-<?php echo $product['id']; ?>.html" title="" class="thumb">
                                    <img src="<?php echo $product['thumb_client']; ?>">
                                </a>
                                <a style="min-height: 35px" href="san-pham/<?php echo create_slug($product['name']); ?>-<?php echo $product['cat_id']; ?>-<?php echo $product['id']; ?>.html" title="" class="product-name"><?php echo $product['name']; ?></a>
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
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php get_sidebar("product") ?>
    </div>
</div>
<?php $cat_id = (isset($_GET['cat_id'])) ? $_GET['cat_id'] : false; ?>
<script>

    $(document).ready(function(){
      $("input[type='radio']").change(function(){
        $priceElm = $("input[type='radio'][name='r-price']:checked");
        $brandElm = $("input[type='radio'][name='r-brand']:checked");
        $catElm = $("input[type='radio'][name='r-cat']:checked");

        min_price = $priceElm.data("minPrice");
        max_price = $priceElm.data("maxPrice");
        company_id = $brandElm.data("brand");
        
        let url = location.href;
        // let cat_id_url = new URL(url);
        // cat_id =  ($catElm.data("cat")) ? $catElm.data("cat") : cat_id_url.searchParams.get('cat_id');
        cat_id = '<?php echo $_GET['cat_id']; ?>'


        filterPoductsByAjax(min_price, max_price, company_id, cat_id);
        getNameCatByAjax(cat_id);

      })
    })


    function filterPoductsByAjax(min_price, max_price){
        $.ajax({
          url: '?mod=product&action=filterListProducts',
          method: 'POST',
          data: {min_price, max_price, company_id, cat_id},
          dataType: 'json',
          success: function(result) {
            render_list_products(result);
          },
          error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
          }
        })
    }

    function render_list_products(result){
        let list_wp = $("div#list-product-wp .section-detail .list-item.clearfix");
        if (result.length == 0) {
            list_wp.html("Không tìm thấy sản phẩm nào");
            return "cancel";
        }
        let list_item_template = `<li>
                                <a href="san-pham/{{slug}}-{{cat_id}}-{{id}}.html" title="" class="thumb">
                                    <img src="{{thumb_main_client}}">
                                </a>
                                <a style="min-height: 35px" href="san-pham/{{slug}}-{{cat_id}}-{{id}}.html" title="" class="product-name">{{name}}</a>
                                <div class="price">
                                    <span class="new">{{new_price}}</span>
                                    <span class="old">{{price}}</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?mod=cart&action=add&id={{id}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?mod=cart&action=buyNow&id={{id}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>`
        list_wp.html("");
        result.forEach(function(product){
            let item = list_item_template;
            item = item.replace(/{{slug}}/gm, product['slug']);
            item = item.replace(/{{cat_id}}/gm, product['cat_id']);
            item = item.replace(/{{id}}/gm, product['id']);
            item = item.replace(/{{name}}/gm, product['name']);
            item = item.replace(/{{price}}/gm, currency(product['price']));
            item = item.replace(/{{new_price}}/gm, currency(product['new_price']));
            item = item.replace(/{{thumb_main_client}}/gm, product['thumb_main_client']);
            list_wp.append(item);
        })
    }

    function currency($number) {
        const formatter = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' });
        const formattedNumber = formatter.format($number);
        return formattedNumber
    }

    function getNameCatByAjax(cat_id){
        cat_id = cat_id.toString().split(",");
        cat_id = cat_id[cat_id.length - 1];
        $.ajax({
          url: '?mod=product&action=getCatNameByAjax',
          method: 'POST',
          data: {cat_id},
          dataType: 'html',
          success: function(result) {
            $(".cat_name").html(result);
            $(".cat_name").first().get(0).scrollIntoView();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          }
        })
    }
</script>
<?php get_footer() ?>