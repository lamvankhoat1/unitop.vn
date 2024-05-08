<?php
  require 'lib/validation.php';
?>
<?php
  if (isset($_POST['btn_post'])) {
    $error = array();
    #TIÊU ĐỀ BÀI VIẾT
    $post_title= $_POST['post_title'];
    if (!empty($_POST["post_title"])) {
      if (strlen($post_title) < 5) {
        $error['post_title'] = 'Tiêu đề phải trên 5 ký tự';
      }
    } else {
        $error['post_title'] = 'Không được để trống tiêu đề';
    }
    # MÔ TẢ NGẮN
    $short_description= $_POST['short_description'];
    if (!empty($_POST["short_description"])) {
      if (strlen($short_description) < 30) {
        $error['short_description'] = 'Mô tả phải trên 30 ký tự';
      }
    } else {
        $error['short_description'] = 'Không được để trống mô tả';
    }
    # CHI TIẾT BÀI VIẾT
    $post_detail= $_POST['post_detail'];
    if (!empty($_POST["post_detail"])) {
      if (strlen($post_detail) < 30) {
        $error['post_detail'] = 'Chi tiết bài viết phải trên 30 ký tự';
      }
    } else {
        $error['post_detail'] = 'Không được để trống chi tiết bài viết';
    }
    #FILE
    if (isset($_FILES['thumb_img'])) {
        // CHECK TYPE
        $image_file = $_FILES['thumb_img'];
        $type_image = array("jpg", "png", "gif", "jpeg");
        $type = pathinfo($image_file['name'], PATHINFO_EXTENSION);
        if (!in_array($type, $type_image)) {
            $error['thumb_img'] = 'Không đúng tên file';
            if ($image_file['size'] > 29000000) {
                $error['thumb_img'] = 'Kích cỡ file ảnh quà lớn trên 20MB';
            }
        };
    }

    // POST
    if (empty($error)) {
      #UPLOAD FILE ẢNH
      if (move_uploaded_file($image_file['tmp_name'], "upload/{$image_file['name']}")) {
        
      }
      echo "<img src='upload/{$image_file['name']}' style='width:300px;height:auto'>";
      echo "<h1>{$post_title}</h1>";
      echo "<p>{$short_description}</p>";
      echo "<div class='post-detail'>{$post_detail}</div>";
    }


  }
?>
<script src="plugin/CKEditor/ckeditor/ckeditor.js"></script>
<style>
    input, label {
        display: block;
    }

    input, textarea {
        outline: none;
        border: 1px solid #ddd;
        width: 100%;
        padding: 10px 10px;
        margin-bottom: 10px;
    }

    .error {
        color: red;
        font-style: italic;
    }
</style>
<form action="" method="post" enctype="multipart/form-data">
    <label for="post_title">Tiêu đề bài viết <span class="error"><?php echo show_error('post_title') ?></span></label>
    <input type="text" id="post_title" name="post_title" value="<?php echo set_value('post_title')?>">
    <label for="short_description">Mô tả ngắn <span class="error"><?php echo show_error('short_description') ?></span></label>
    <textarea name="short_description" id="short_description"><?php echo set_value('short_description')?></textarea>
    <label for="post_detail">Chi tiết bài viết <span class="error"><?php echo show_error('post_detail') ?></span></label>
    <textarea name="post_detail" id="post_detail" class="ckeditor"><?php echo set_value('post_detail')?></textarea>
    <label for="thumb_img">Ảnh đại diện <span class="error"><?php echo show_error('thumb_img') ?></span></label>
    <input type="file" name="thumb_img" id="thumb_img">
    <input type="submit" value="Đăng bài" name="btn_post">
</form>