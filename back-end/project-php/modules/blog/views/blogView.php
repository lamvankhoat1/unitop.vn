<?php get_header() ?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach ($list_posts as $post) {  ?>
                            <li class="clearfix">
                                <a href="blog/<?php echo create_slug($post['title']) ?>-<?php echo $post['id']; ?>.html" title="" class="thumb fl-left">
                                    <img src="<?php echo $post['thumb']; ?>" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="blog/<?php echo create_slug($post['title']) ?>-<?php echo $post['id']; ?>.html" title="" class="title"><?php echo $post['title']; ?></a>
                                    <span class="create-date"><?php echo $post['time_created']; ?></span>
                                    <p class="desc"><?php echo $post['short_desc']?></p>
                                </div>
                            </li>
                          <?php  } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php pagination($num_posts, $_GET['page'], $_GET['num_posts']);?>
                    </ul>
                </div>
            </div>
        </div>
        <?php get_sidebar("best-selling") ?>
    </div>
</div>
<?php get_footer() ?>