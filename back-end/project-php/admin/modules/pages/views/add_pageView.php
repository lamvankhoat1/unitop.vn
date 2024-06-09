<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tiêu đề</label>
                        <?php echo set_error_form("title"); ?>
                        <input type="text" name="title" id="title" <?php set_value_input("title") ?>>
                        <label for="desc">Mô tả</label>
                        <?php echo set_error_form("desc"); ?>
                        <textarea name="desc" id="desc" class="ckeditor"><?php set_value_textarea("desc") ?></textarea>
                        <button type="submit" name="btn-add-submit" id="btn-submit">THÊM TRANG</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>