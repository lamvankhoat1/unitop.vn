<?php get_header() ?>
<?php
//   show_array($post_info);
?>
<div id="main-content-wp" class="detail-news-page">
    <div class="wp-inner clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-news-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $post_info['heading_title']; ?></h3>
                </div>
                <div class="section-detail">
                    <p class="create-date"><?php echo $post_info['created_post']; ?></p>
                    <div class="content-news"><?php echo $post_info['content_post']; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>