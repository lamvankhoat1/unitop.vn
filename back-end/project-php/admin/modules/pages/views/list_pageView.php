<?php get_header() ?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <div id="content">           
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách trang</h3>
                    <a href="?mod=pages&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>            
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=pages">Tất cả <span class="count">(<?php echo get_num_pages_by_status(); ?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=pages&filter=publish">Đã đăng <span class="count">(<?php echo get_num_pages_by_status('publish'); ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=pages&filter=pending">Chờ xét duyệt <span class="count">(<?php echo get_num_pages_by_status('pending'); ?>)</span> |</a></li>
                            <li class="trash"><a href="?mod=pages&filter=trash">Thùng rác <span class="count">(<?php echo get_num_pages_by_status('trash'); ?>)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="hidden" name="mod" value="pages">
                            <input type="hidden" name="controller" value="index">
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
                            <input type="hidden" name="mod" value="pages">
                            <input type="hidden" name="controller" value="index">
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
                                  foreach ($list_pages as $number => $page) {  ?>
                                      <tr>
                                          <td><input type="checkbox" name="checkItem" class="checkItem" value="<?php echo $page['id']; ?>"></td>
                                          <td><span class="tbody-text"><?php echo $number+1; ?></span>
                                          <td class="clearfix">
                                              <div class="tb-title fl-left">
                                                  <a href="" title=""><?php echo $page['title']; ?></a>
                                              </div>
                                              <ul class="list-operation fl-right">
                                                  <li><a href="?mod=pages&action=edit&id=<?php echo $page['id']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                  <li><a href="?mod=pages&action=remove&id=<?php echo $page['id']; ?>" title="Cho vào thùng rác" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                              </ul>
                                          </td>
                                          <td><span class="tbody-text"><?php echo $page['status']; ?></span></td>
                                          <td><span class="tbody-text"><?php echo $page['author']; ?></span></td>
                                          <td><span class="tbody-text"><?php echo $page['time_created']; ?></span></td>
                                      </tr>
                                  <?php  }
                                ?>
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
            $input_hidden = $("input[type='hidden'][name='checked']");
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