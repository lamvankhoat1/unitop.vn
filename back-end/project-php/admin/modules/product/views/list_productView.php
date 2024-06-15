<?php get_header() ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=product&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá cũ</span></td>
                                    <td><span class="thead-text">Giá mới</span></td>
                                    <td><span class="thead-text">Mô tả ngắn</span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                    <td><span class="thead-text">Ảnh đại diện</span></td>
                                    <td><span class="thead-text">Danh sách ảnh mô tả</span></td>
                                    <td><span class="thead-text">Số lượng</span></td>
                                    <td><span class="thead-text">Mã hãng</span></td>
                                    <td><span class="thead-text">Mã danh mục</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian tạo</span></td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  foreach ($list_products as $number => $product) {  ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text"><?php echo $number+1; ?></span></td>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href=""><?php echo $product['name']; ?></a>
                                            </div>
                                            <ul class="list-operation fl-right">
                                            <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $product['price']; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $product['new_price']; ?></span></td>
                                        <td><span class="tbody-text">
                                                <div class="long-content"><?php echo $product['short_desc']; ?>
                                            </span></div>
                                        </td>
                                        <td><span class="tbody-text">
                                            <div class="long-content"><?php echo $product['detail']; ?>
                                            </span></div>
                                        </td>
                                        <td>
                                            <div class="tbody-thumb">
                                                <img src="<?php echo $product['thumb_main']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="tbody-thumb-list">
                                                <div  class="long-content"><?php foreach (json_decode($product['list_thumbs'], 1) as $thumb) {  ?>
                                                    <img src="<?php echo $thumb['path']; ?>">
                                                <?php  } ?></div>
                                            </div>    
                                        </td>
                                        <td><span class="tbody-text"><?php echo $product['qty']; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $product['company_id']; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $product['cat_id']; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $product['author']; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $product['time_created']; ?></span></td>
                                    </tr>
                                  <?php  }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá cũ</span></td>
                                    <td><span class="thead-text">Giá mới</span></td>
                                    <td><span class="thead-text">Mô tả ngắn</span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                    <td><span class="thead-text">Ảnh đại diện</span></td>
                                    <td><span class="thead-text">Danh sách ảnh mô tả</span></td>
                                    <td><span class="thead-text">Số lượng</span></td>
                                    <td><span class="thead-text">Mã hãng</span></td>
                                    <td><span class="thead-text">Mã danh mục</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian tạo</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
</script>
<?php get_footer() ?>