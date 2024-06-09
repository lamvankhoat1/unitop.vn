<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <?php set_error_form("title"); ?>
                        <input type="text" name="title" id="title" <?php set_value_input("title", $post); ?> >

                        <label for="short_desc">Mô tả ngắn</label>
                        <?php set_error_form("short_desc"); ?>
                        <textarea name="short_desc" id="short_desc"><?php set_value_textarea("short_desc", $post); ?></textarea>
                        
                        <label for="detail">Chi tiết bài viết</label>
                        <?php set_error_form("detail"); ?>
                        <textarea name="detail" id="detail" class="ckeditor"><?php set_value_textarea("detail", $post); ?></textarea>
                        
                        <label>Hình ảnh</label>
                        <?php set_error_form("file"); ?>
                        <div id="uploadFile">
                            <span>URL: </span><input type="url" name="url-thumb" id="url-thumb" <?php set_value_input("url-thumb"); ?> > <b>OR</b>
                            <input type="file" name="file" id="upload-thumb">
                            <img src="<?php echo $post["thumb"]; ?>" id="preview">
                        </div>
                        <button type="submit" name="btn-update-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php preview_image_from_input("#upload-thumb", "#preview"); ?>
<?php get_footer() ?>