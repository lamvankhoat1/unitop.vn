<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <div id="content">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">XÁC NHẬN XOÁ DANH MỤC</h3>
                </div>
            </div>
            <div class="section" id="detail-page" style='text-align: center'>
                <div class="section-detail">
                    <form method="POST">
                        <label for="">Bạn có chắc muốn xoá danh mục <span style="color: red"><?php echo $cat['name']; ?></span>? </label>
                        <button type="submit" name="btn-delete-submit" style="display: inline-block; margin-right: 50px; background-color: #a32727">XOÁ</button>
                        <button type="submit" name="btn-cancel-submit" style="display: inline-block">HUỶ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>