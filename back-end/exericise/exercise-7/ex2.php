<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bố cục bài viết</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .news-item {
        margin-bottom: 2rem;
    }

    .news-image {
        max-width: 100%;
        height: auto;
    }

    .news-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .news-description {
        font-size: 1rem;
        color: #666;
    }
    </style>
</head>

<body>
    <?php
        $list_news = array();
        $list_news[] = array(
            'id' => 1,
            'news_thumb' => "https://i1-vnexpress.vnecdn.net/2021/02/24/14763e285c4795f3445d33b0e449b5-9917-5806-1614152138.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=O8OCTKlaiNKF4QLlk-gktA",
            'news_title' => "Malaysia truy tố chủ trang web 'sugar daddy'",
            'news_description' => "Người sáng lập trang web kết nối đàn ông lớn tuổi với phụ nữ nhỏ tuổi bị buộc tội làm náo loạn dư luận."
        );
        $list_news[] = array(
            'id' => 2,
            'news_thumb' => "https://i1-vnexpress.vnecdn.net/2020/11/09/1-jpg-1604890203-1999-1604890222.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=ANtcIkjKom0fmwAbHr-zAg",
            'news_title' => "Trump tiếp tục chơi golf sau khi thất cử",
            'news_description' => "Tổng thống Donald Trump tiếp tục tới sân golf, từ chối kết quả mà các hãng truyền thông Mỹ tuyên bố Joe Biden đã đắc cử."
        );
        $list_news[] = array(
            'id' => 3,
            'news_thumb' => "https://s1.vnecdn.net/vnexpress/restruct/i/v9506/v2_2019/pc/graphics/no-thumb-5x3.jpg",
            'news_title' => "7.000 người ở Mỹ bị lừa mua nước rửa tay khô từ Việt Nam",
            'news_description' => "Việt - Mỹ đã phối hợp điều tra, bắt ba đối tượng lừa hơn 7.000 người ở Mỹ mua nước rửa tay ngừa Covid-19, với tổng số tiền gần 1 triệu USD."
        );
        $list_news[] = array(
            'id' => 4,
            'news_thumb' => "https://i1-dulich.vnecdn.net/2020/08/09/2-1596987372-1596987387-159698-7037-8613-1596987522.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=_zVd9U6k_Ah2w-AKniw3_w",
            'news_title' => "Bộ Du lịch Mexico bị chế giễu vì dịch sai",
            'news_description' => "Cựu Tổng thống Felipe Calderón đã phải lên tiếng: \"Hãy ngừng khiến Mexico trở nên lố bịch\" sau sự cố trang web của Bộ Du lịch dịch tiếng Anh sai."
        );
        $list_news[] = array(
            'id' => 5,
            'news_thumb' => "https://s1.vnecdn.net/vnexpress/restruct/i/v9506/v2_2019/pc/graphics/no-thumb-5x3.jpg",
            'news_title' => "Vướng lao lý vì liên tục hủy đặt 3.200 phòng khách sạn",
            'news_description' => "Vướng lao lý vì liên tục hủy đặt 3.200 phòng khách sạn"
        );
        $list_news[] = array(
            'id' => 6,
            'news_thumb' => "https://s1.vnecdn.net/vnexpress/restruct/i/v9506/v2_2019/pc/graphics/no-thumb-5x3.jpg",
            'news_title' => "Trang web giúp cai nghiện thuốc giảm đau",
            'news_description' => "MỹChính phủ Mỹ ra mắt website FindTreatment.gov để hỗ trợ hàng chục triệu người đang mắc chứng nghiện thuốc giảm đau opioid."
        );
        $list_news[] = array(
            'id' => 7,
            'news_thumb' => "https://s1.vnecdn.net/vnexpress/restruct/i/v9506/v2_2019/pc/graphics/no-thumb-5x3.jpg",
            'news_title' => "Cảnh sát Mỹ lập trang web về án mạng chưa có lời giải",
            'news_description' => "MỹTrang web “Án mạng chưa có lời giải tại Philly” sẽ đăng tải những vụ giết người chưa tìm được thủ phạm để tranh thủ sự giúp đỡ của công chúng."
        );
        $list_news[] = array(
            'id' => 8,
            'news_thumb' => "https://i1-vnexpress.vnecdn.net/2018/10/15/DkJXSICXoAApl1R62301533879910-2747-4740-1539580083.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=ZYW6g8JgvgExCDDe1IYqjQ",
            'news_title' => "Triều Tiên mở cổng thông tin điện tử về thương mại và đầu tư",
            'news_description' => "Trang web được mở ra nhằm thu hút đầu tư nước ngoài, góp phần thúc đẩy tăng trưởng kinh tế của Triều Tiên."
        );
    ?>
    <div class="container">
        <!-- Bài viết đầu tiên -->
         <?php
            foreach ($list_news as $news_item) {  ?>
                <div class="row news-item">
                    <div class="col-md-2">
                        <img src="<?php echo $news_item['news_thumb']; ?>" alt="News Image" class="news-image">
                    </div>
                    <div class="col-md-8">
                        <h2 class="news-title"><?php echo $news_item['news_title']; ?></h2>
                        <p class="news-description"><?php echo $news_item['news_description']; ?></p>
                    </div>
                </div>          
            <?php  }
         ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>