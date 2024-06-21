<?php get_header() ?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <div id="content">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách Slider</h3>
                    <a href="?mod=slider&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Ảnh</span></td>
                                    <td><span class="thead-text">URL</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_sliders as $number => $slider) {  ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $number+1; ?></h3></span>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><?php echo $slider['name']; ?></a>
                                            </div> 
                                            <ul class="list-operation fl-right">
                                                <li><a href="?mod=slider&action=edit&id=<?php echo $slider['id']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                <li><a href="?mod=slider&&action=remove&id=<?php echo $slider['id']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </td>
                                        <td><img style='height: 50px' src='<?php echo $slider['slider']; ?>'></td>
                                        <td><span class="tbody-text"><?php echo $slider['url']; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $slider['author']; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $slider['time_created']; ?></span></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text-text">Tiêu đề</span></td>
                                    <td><span class="tfoot-text-text">Ảnh</span></td>
                                    <td><span class="tfoot-text">URL</span></td>
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
<?php get_footer() ?>