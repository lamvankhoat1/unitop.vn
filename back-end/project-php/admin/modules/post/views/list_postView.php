<?php get_header() ?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="?mod=post&action=addPost" title="" id="add-new" class="fl-left">Thêm mới bài viết</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=post">Tất cả <span class="count">(<?php echo get_num_posts_by_status(); ?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=post&filter=publish">Đã đăng <span class="count">(<?php echo get_num_posts_by_status("publish"); ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=post&filter=pending">Chờ xét duyệt <span class="count">(<?php echo get_num_posts_by_status("pending"); ?>)</span></a></li>
                            <li class="trash"><a href="?mod=post&filter=trash">Thùng rác <span class="count">(<?php echo get_num_posts_by_status("trash"); ?>)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s" <?php echo set_value_input("s"); ?> >
                            <input type="hidden" name="mod" value="post">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <!-- <option value="1">Chỉnh sửa</option> -->
                                <option value="2">Bỏ vào thủng rác</option>
                                <option value="3">Áp dụng đang chờ</option>
                                <option value="4">Áp dụng đã đăng</option>
                                <option value="5">Xoá vĩnh viễn</option>
                            </select>
                            <!-- Bổ sung input hidden để lưu trữ các checkbox được check -->
                            <input type="hidden" name="checked" value="">
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll" value="all"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  foreach ($list_posts as $number => $post) {  ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem" value="<?php echo $post['id']; ?>"></td>
                                        <td><span class="tbody-text"><?php echo $number+1; ?></h3></span>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><?php echo $post['title']; ?></a>
                                            </div>
                                            <ul class="list-operation fl-right">
                                                <li><a href="?mod=post&action=editPost&id=<?php echo $post['id']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                <li><a href="?mod=post&action=removePost&id=<?php echo $post['id']; ?>" title="Cho vào thùng rác" class="remove"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $post['status']; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $post['author']; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $post['time_created']; ?></span></td>
                                    </tr>
                                  <?php  }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll" value="all"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Tiêu đề</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Người tạo</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
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
    $(document).ready(function(){
      $("input[type='checkbox']").change(function(){
        if ($(this).is(':checked')) {
            $input_hidden = $("input[type='hidden']");
            // if checked all
            if($(this).val() == "all") {
                $checkItem_list = $("input[type='checkbox'][name='checkItem']");
                
                $val = "";
                $checkItem_list.each(function($element){
                  $val += ";" + $(this).val();
                });
                $input_hidden.val($val);
            } else {
                $val = $input_hidden.val() + ";" + $(this).val();
                $input_hidden.val($val);
            }
        } else {
            // if unchecked all
            if($(this).val() == "all") {
                $val = "";
                $input_hidden.val($val);
            } else {
                $input_hidden = $("input[type='hidden']");
                $val = $input_hidden.val().replace(";" + $(this).val(), "");
                $input_hidden.val($val);
            }
        }
      })
    })
</script>
<?php get_footer() ?>