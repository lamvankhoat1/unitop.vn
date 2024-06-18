<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <div id="content">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên slider</label>
                        <?php echo set_error_form("title"); ?>
                        <input type="text" name="title" id="title" <?php set_value_input('title'); ?>>
                        <label>Ảnh slider</label>
                        <?php echo set_error_form("slider"); ?>
                        <div class="uploadFile">
                            <input type="file" name="slider" style="margin-bottom: 10px">
                            <img src="public/images/img-thumb.png">
                        </div>

                        <label for="url">URL</label>
                        <?php echo set_error_form("url"); ?>
                        <input type="text" name="url" id="url" min="0" <?php set_value_input('url'); ?>>
                        <button type="submit" name="btn-add-submit" id="btn-submit">Thêm Slider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<?php get_footer() ?>