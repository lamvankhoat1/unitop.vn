<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Bài tập 4</title>
</head>

<body>
    <?php
      // http://localhost\unitop.vn\back-end\php-beginer\part-7-array\7.9.2-ex4.php
      // Hiển thị danh sách bài viết lên giao diện
      $list_post = array();
      $list_post[1] = array(
        'title' => 'Tôi quyết định tái hôn vì con gái 16 tuổi ngày nào cũng hỏi câu này',
        'url' => 'https://dantri.com.vn/tinh-yeu-gioi-tinh/toi-quyet-dinh-tai-hon-vi-con-gai-16-tuoi-ngay-nao-cung-hoi-cau-nay-20240423112708636.htm',
        'excerpt' => '(Dân trí) - Tôi trở thành mẹ đơn thân khi con gái vừa tròn 5 tuổi. Chồng tôi qua đêm với "gái bán hoa" không chỉ một lần. Điều tôi có thể làm sau khi phát hiện ra là biến anh ta trở thành chồng cũ.',
        'thumb-img' => 'https://cdnphoto.dantri.com.vn/vDI7Iu7JONZTANBy7rQiAHwiFko=/zoom/324_216/2024/04/23/toi-quyet-dinh-tai-hon-khi-ngay-nao-con-gai-14-tuoi-cung-hoi-cau-nay-crop-1713845250905.jpeg',
      );
      $list_post[2] = array(
        'title' => 'Thực hư thông tin huyền thoại Federer đến Hội An',
        'url' => 'https://dantri.com.vn/the-thao/thuc-hu-thong-tin-huyen-thoai-federer-den-hoi-an-20240429121427981.htm',
        'excerpt' => '(Dân trí) - Sáng 29/4, mạng xã hội lan truyền thông tin huyền thoại quần vợt Roger Federer và gia đình có mặt tại Hội An (Quảng Nam) để du lịch. Lãnh đạo thành phố Hội An cũng lên tiếng về thông tin này.',
        'thumb-img' => 'https://cdnphoto.dantri.com.vn/iqO2xpmsXBdJSYuMMW6vKxhPbSw=/zoom/324_216/2024/04/29/federer-crop-1714367513917.jpeg',
      );
      $list_post[3] = array(
        'title' => 'Người đốt 4 xe máy khi vi phạm nồng độ cồn có thể bị xử lý hình sự',
        'url' => 'https://dantri.com.vn/phap-luat/nguoi-dot-4-xe-may-khi-vi-pham-nong-do-con-co-the-bi-xu-ly-hinh-su-20240429103815442.htm',
        'excerpt' => '(Dân trí) - Bị tạm giữ xe do vi phạm nồng độ cồn, người đàn ông đã leo lên xe đặc chủng của cảnh sát đốt 4 xe máy. Luật sư nhìn nhận, hành vi trên có thể bị xử lý hình sự.',
        'thumb-img' => 'https://cdnphoto.dantri.com.vn/hcT6KdqrnnXPaYEHBzCqw8cmxAI=/zoom/324_216/2024/04/29/z5393297912937dbf75a71db4ed55e94541d1195a895bb-1714361700700.jpg',
      );
      $list_post[4] = array(
        'title' => 'Uống 2 cốc bia mừng nghỉ lễ, người phụ nữ hoảng loạn khi thấy CSGT',
        'url' => 'https://dantri.com.vn/xa-hoi/uong-2-coc-bia-mung-nghi-le-nguoi-phu-nu-hoang-loan-khi-thay-csgt-20240429112902278.htm',
        'excerpt' => '(Dân trí) - Tổ công tác Đội CSGT số 3 phát hiện một nữ tài xế vi phạm nồng độ cồn trên đường Huỳnh Thúc Kháng (Đống Đa, Hà Nội). Người phụ nữ chia sẻ hoảng loạn khi thấy CSGT vì trước đó đã uống 2 cốc bia.',
        'thumb-img' => 'https://cdnphoto.dantri.com.vn/8szPbauyYgD-kuep-oo04xBAnbs=/zoom/324_216/2024/04/29/acsgt337-crop-1714364790012.jpeg',
      );
      $list_post[5] = array(
        'title' => 'Lễ hội Rồng thu hút hàng chục nghìn khách những ngày đầu lễ 30/4',
        'url' => 'https://dantri.com.vn/du-lich/le-hoi-rong-thu-hut-hang-chuc-nghin-khach-nhung-ngay-dau-le-304-20240429111500502.htm',
        'excerpt' => '(Dân trí) - Những ngày đầu lễ 30/4, lễ hội Rồng diễn ra tại Sun World Ha Long (Quảng Ninh) thu hút hàng chục nghìn khách tới trải nghiệm mỗi ngày.',
        'thumb-img' => 'https://cdnphoto.dantri.com.vn/R4xHwhhx3FTzq3m6420_EyD2qm8=/zoom/324_216/2024/04/29/1-2-1714363383533.jpeg',
      );
    ?>

    <div id="wrapper" class="container">
        <div id="list-post" class="list-group list-group-flush">
            <!-- <div class="list-group-item list-item"> -->
              <!-- <div class="row no-gutters"> -->
                <!-- <div class="col-8">
                  <h3><a href="https://dantri.com.vn/tinh-yeu-gioi-tinh/toi-quyet-dinh-tai-hon-vi-con-gai-16-tuoi-ngay-nao-cung-hoi-cau-nay-20240423112708636.htm" class="list-group-item-action">Tôi quyết định tái hôn vì con gái 16 tuổi ngày nào cũng hỏi câu này</a></h3>
                  <p class="excerpt">
                  Tôi trở thành mẹ đơn thân khi con gái vừa tròn 5 tuổi. Chồng tôi qua đêm với "gái bán hoa" không chỉ một lần. Điều tôi có thể làm sau khi phát hiện ra là biến anh ta trở thành chồng cũ.
                  </p>
                </div>
                <div class="col-4"><img class="d-block img-thumbnail mx-auto" src="https://cdnphoto.dantri.com.vn/vDI7Iu7JONZTANBy7rQiAHwiFko=/zoom/324_216/2024/04/23/toi-quyet-dinh-tai-hon-khi-ngay-nao-con-gai-14-tuoi-cung-hoi-cau-nay-crop-1713845250905.jpeg" alt="" style="width: 216px; height: 144px"></div> -->
              <!-- </div> -->
            <!-- </div> -->
            <?php
            foreach ($list_post as $post) {
              # code...
              echo "<div class=\"list-group-item list-item\">";
              echo "  <div class='row no-gutters'>";
              echo "      <div class='col-8'>";  
              echo "        <h3><a href='{$post['url']}' class='list-group-item-action'>{$post['title']}</a></h3>";
              echo "        <p class=\"excerpt\">{$post['excerpt']}</p>";
              echo "      </div>"; 
              echo "      <div class=\"col-4\"><img class=\"d-block img-thumbnail mx-auto\" src=\"{$post['thumb-img']}\" alt=\"\" style=\"width: 216px; height: 144px\"></div>";   
              echo "  </div>";
              echo "</div>";
            }
            ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
</body>

</html>