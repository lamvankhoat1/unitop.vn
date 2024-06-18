<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <div id="content">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới nhãn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="name">Tên nhãn hàng</label>
                        <?php echo set_error_form("name"); ?>
                        <input type="text" name="name" id="name" <?php set_value_input('name'); ?>>
                        <button type="submit" name="btn-add-submit" id="btn-submit">Thêm nhãn hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>