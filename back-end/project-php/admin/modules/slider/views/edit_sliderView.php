<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <div id="content">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST"  enctype='multipart/form-data'>
                        <label for="name">Tên slider</label>
                        <?php echo set_error_form("name"); ?>
                        <input type="text" name="name" id="name" <?php set_value_input('name', $slider); ?>>
                        <label>Ảnh slider</label>
                        <?php echo set_error_form("slider"); ?>
                        <div class="uploadFile">
                            <input type="file" name="slider" style="margin-bottom: 10px">
                            <img src="<?php echo $slider['slider']; ?>" style="max-width: 100px">
                        </div>

                        <label for="url">URL</label>
                        <?php echo set_error_form("url"); ?>
                        <input type="url" name="url" id="url" min="0" <?php set_value_input('url', $slider); ?>>
                        <button type="submit" name="btn-update-submit" id="btn-submit">Cập nhật Slider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
      let input_file_slider = $('[name="slider"]');
      input_file_slider.change(function(){
        let url_preview = URL.createObjectURL(input_file_slider.get(0).files[0]);
        $(this).next().attr("src", url_preview);
      })
    })
</script>
<?php get_footer() ?>