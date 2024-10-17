<?php 
    $post_title = "Bài viết của Tổng Bí thư, Chủ tịch nước Tô Lâm về chống lãng phí";
    $post_content = "Thông tấn xã Việt Nam (TTXVN) trân trọng giới thiệu nội dung bài viết: “Chống lãng phí” của Tổng Bí thư Ban Chấp hành Trung ương Đảng Cộng sản Việt Nam, Chủ tịch nước Cộng hòa xã hội chủ nghĩa Việt Nam Tô Lâm";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nhúng PHP vào HTML</title>
    </head>
    <body>
        <div id="content">
            <h1 class="post-title"><?php echo $post_title; ?></h1>
            <div class="post-content"><?php echo $post_content; ?></div>
        </div>
        <?php
            /** 
             * Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam dolor quisquam tempore unde, error quasi nobis amet sint distinctio suscipit ut aliquid quam eveniet eligendi incidunt provident eaque. Incidunt, nesciunt!
            */
        ?>
    </body>
</html>