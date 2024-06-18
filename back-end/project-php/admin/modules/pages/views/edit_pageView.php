<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <div id="content">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tiêu đề</label>
                        <?php echo set_error_form("title"); ?>
                        <input type="text" name="title" id="title" <?php set_value_input("title", $page) ?>>
                        <label for="description">Mô tả</label>
                        <?php echo set_error_form("description"); ?>
                        <textarea name="description" id="description" class="ckeditor"><?php set_value_textarea("description", $page) ?></textarea>
                        <button type="submit" name="btn-update-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>