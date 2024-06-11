<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật nhãn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="name">Tên nhãn hàng</label>
                        <?php echo set_error_form("name"); ?>
                        <input type="text" name="name" id="name" <?php set_value_input('name', $comp); ?>>
                        <button type="submit" name="btn-update-submit" id="btn-submit">Cập nhật nhãn hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>