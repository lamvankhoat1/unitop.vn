<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhúng PHP vào HTML</title>
</head>
<body>
    <?php
      $post_title = "Steve Darby: Quá sớm để đánh giá HLV Hoàng Anh Tuấn thành công hay thất bại | Báo Dân trí";
      $post_content = "Trả lời Dân trí, chuyên gia Steve Darby cho rằng U23 Việt Nam đang có những bước tiến tốt tại giải U23 châu Á nhưng còn quá sớm để đánh giá thầy trò HLV Hoàng Anh Tuấn thành công hay thất bại.";
    ?>
    <div id="content">
        <h1 class="post-title"><?php  echo $post_title;?></h1>
        <div class="post-content">
            <?php
              // ===============
              // HỌC PHP RẤT THÚ VỊ
              // ===============
            ?>
            <?php echo $post_content; ?>
        </div>
    </div>
</body>
</html>