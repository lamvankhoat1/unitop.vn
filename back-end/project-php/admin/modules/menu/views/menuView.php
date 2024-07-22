<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page menu-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="#" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Menu</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="content">
            <div class="section-detail clearfix">
                <div id="list-menu" class="fl-left">
                    <div class="form-group">
                        <label for="name">Tên menu</label>
                        <input type="text" name="name" id="menu-name">
                    </div>
                    <p class='mess_error name'></p>
                    <div class="form-group">
                        <label for="url-static">Đường dẫn tĩnh</label>
                        <input type="text" name="url_static" id="menu-url_static">
                        <p>Chuỗi đường dẫn tĩnh cho menu</p>
                    </div>
                    <p class='mess_error url_static'></p>
                    <div class="form-group">
                        <label for="menu-order_item">Thứ tự</label>
                        <input type="number" name="menu_order_item" id="menu-order_item">
                    </div>
                    <p class='mess_error order_item'></p>
                    <div class="form-group">
                        <button type="submit" name="sm_add" id="btn-save-list">Lưu danh mục</button>
                        <button type="submit" name="sm_edit" id="btn-edit-list" style="display: none" data-id=1>Chỉnh sửa</button>
                        <button type="submit" name="sm_edit" id="btn-cancel-list" style="display: none">Huỷ bỏ</button>
                    </div>    
                </div>
                <div id="category-menu" class="fl-right">
                    <div class="actions">
                        <select name="post_status">
                            <option value="-1">Tác vụ</option>
                            <option value="delete">Xóa vĩnh viễn</option>
                        </select>
                        <button name="sm_block_status" id="sm-block-status">Áp dụng</button>
                    </div>
                    <div class="table-responsive" id="list-menu"> 
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên menu</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Slug</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Thứ tự</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_menu as $num => $menu) {  ?>
                                    <?php $menu_name = $menu['name']; ?>
                                    <?php $menu_id = $menu['id']; ?>
                                    <?php $menu_url_static = $menu['url_static']; ?>
                                    <?php $menu_order_item = $menu['order_item']; ?>
                                    <tr>
                                        <td><input type="checkbox" class="checkItem" value="<?php echo $menu_id; ?>"></td>
                                        <td><span class="tbody-text"><?php echo $num+1; ?></span>
                                        <td>
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><?php echo $menu_name; ?></a>
                                            </div>
                                            <ul class="list-operation fl-right">
                                                <li><a class="edit-menu" data-id=<?php echo $menu_id; ?> data-name="<?php echo $menu_name; ?>" data-url_static="<?php echo $menu_url_static; ?>" data-order_item="<?php echo $menu_order_item; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                <li><a class="delete-menu" data-id=<?php echo $menu_id; ?> title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </td>
                                        <td style="text-align: center;"><span class="tbody-text"><?php echo $menu_url_static; ?></span></td>
                                        <td style="text-align: center;"><span class="tbody-text"><?php echo $menu_order_item; ?></span></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên menu</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Slug</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Thứ tự</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="public/js/menu-module.js"></script>
<?php get_footer() ?>