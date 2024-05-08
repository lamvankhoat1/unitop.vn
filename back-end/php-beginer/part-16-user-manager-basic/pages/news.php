<?php
  $list_post = array(
    '1' => array(
        'id' => '1',
        'title' => 'Chuyện tình 4 năm ngọt ngào của chàng cơ trưởng trẻ nhất Việt Nam',
        'short_description' => 'Sau khoảng thời gian dài bên nhau, Quang Đạt mới đây khiến nhiều người bất ngờ khi cầu hôn bạn gái Hà Trúc thành công vào đúng dịp kỷ niệm yêu.'
    ),
    '2' => array(
        'id' => '2',
        'title' => 'Người trẻ vật lộn với cuộc sống đắt đỏ, tìm người lạ nhờ tư vấn chi tiêu',
        'short_description' => 'Nhiều người trẻ đăng bài viết tâm sự về cuộc sống khó khăn nơi thành thị. Họ không ngại chia sẻ thu nhập, cách chi tiêu của gia đình và nhờ những người lạ tư vấn làm sao để "sống sót" ở thành phố lớn.'
    ),
    '3' => array(
        'id' => '3',
        'title' => 'Lộ tội trốn đi nước ngoài vì mâu thuẫn ăn chia ở Malaysia',
        'short_description' => 'Khi đánh bắt thủy sản ở Malaysia, Phạm Văn Nghệ xảy ra mâu thuẫn với người thuê mình nên đã đưa tàu cá nhập cảnh trái phép về Việt Nam.'
    )
  )
?>
<?php
  require 'lib/template.php';
  get_header(); 
?>
<div id="main">
    <h1>Tin Tức</h1>
    <?php
      foreach ($list_post as $post) {
        echo "<a href=\"#\">{$post['title']}</a>";
        echo "<p>{$post['short_description']}</p>";
      }
    ?>
</div>
<?php get_footer(); ?>