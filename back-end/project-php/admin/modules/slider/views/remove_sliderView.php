<?php get_header() ?>
<style>
    button {
        display: inline-block;
        border: none;
        outline: none;
        background: #4fa327;
        color: #fff;
        padding: 8px 20px;
        margin-bottom: 50px;
    }

    button.delete {
        background: #a32727;
    }

    form.action {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        margin-top: 20px;
    }
</style>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <div id="content">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">XÁC NHẬN XOÁ SLIDER</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail" style="text-align: center">
                    <p>Tên slider: <b><?php echo $slider['name']; ?></b></p>
                    <p>URL: <b><a href="<?php echo $slider['url']; ?>"
                                target="_blank"><?php echo $slider['url']; ?></a></b></p>
                    <p><img src="<?php echo $slider['slider']; ?>" style="max-height: 300px; margin: 0 auto"></p>
                    <form class="action" method="POST">
                        <button type="submit" name="btn-delete" value="true" class="delete">XOÁ</button>
                        <button type="submit" name="btn-return" value="true" class="return">QUAY LẠI</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>