<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="name">Tên sản phẩm</label>
                        <?php echo set_error_form("name"); ?>
                        <input type="text" name="name" id="name" <?php set_value_input("name"); ?>>

                        <label for="price">Giá gốc</label>
                        <?php echo set_error_form("price"); ?>
                        <input type="number" name="price" id="price" <?php set_value_input("price"); ?>>

                        <label for="price">Giá mới</label>
                        <input type="number" name="new_price" id="new-price" <?php set_value_input("new_price"); ?>>

                        <label for="short_desc">Mô tả ngắn</label>
                        <?php echo set_error_form("short_desc"); ?>
                        <textarea name="short_desc" id="short_desc" class="ckeditor"><?php set_value_textarea("short_desc") ?></textarea>
                        
                        <label for="detail">Chi tiết</label>
                        <?php echo set_error_form("detail"); ?>
                        <textarea name="detail" id="detail" class="ckeditor"><?php set_value_textarea("detail") ?></textarea>
                        
                        <label>Ảnh đại diện sản phẩm: Chọn 1 file</label>
                        <?php echo set_error_form("thumb_main"); ?>
                        <div class="uploadFile">
                            <input type="file" name="thumb_main">
                            <img src="public/images/img-thumb.png">
                        </div>
                            
                        <label style="margin-top: 20px">Danh sách ảnh chi tiết sản phẩm: Chọn nhiều file (<i>Sử dụng phím Ctrl hoặc Shift để chọn nhiều file</i>)</label>
                        <?php echo set_error_form("list_thumbs"); ?>
                        <div class="uploadFile">
                            <input type="file" name="list_thumbs[]" multiple>
                            <div class="list-imgs"></div>
                        </div>

                        <label for="qty">Số lượng</label>
                        <?php echo set_error_form("qty"); ?>
                        <input type="number" name="qty" id="qty" min="0" <?php set_value_input("qty") ?>>

                        <label>Hãng sản phẩm</label>
                        <?php echo set_error_form("company"); ?>
                        <select name="company">
                            <?php 
                                $selected = "";
                            ?>
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach ($list_companies as $comp) {  ?>
                                <?php
                                  if (isset($_POST['company'])) {
                                    if($comp['id'] == $_POST['company']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                  }
                                ?>
                                <option <?php echo $selected; ?> value="<?php echo $comp['id']; ?>"><?php echo $comp['name']; ?></option>
                            <?php  } ?>
                        </select>
                        

                        <label>Danh mục sản phẩm</label>
                        <?php echo set_error_form("cat_id"); ?>
                        <select name="cat_id">
                            <?php
                              $selected = "";
                            ?>
                            
                            <option value="0">-- Chọn danh mục --</option>
                            <?php foreach ($list_cats as $cat) {  ?>
                                <?php  
                                if(isset($_POST['cat_id']))  {
                                  if($_POST['cat_id'] == $cat['id']) {
                                    $selected = "selected";
                                  } else {
                                    $selected = "";
                                  }
                                }    
                                ?>
                                <option <?php echo $selected; ?> value="<?php echo $cat['id']; ?>"><?php echo str_repeat("_____ ", $cat['level']).$cat['name']; ?> </option>
                            <?php  } ?>
                        </select>
                        
                        <button type="submit" name="btn-add-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // preview image thumb
      $("[name='thumb_main']").change(function(){
        let url_image = URL.createObjectURL($(this).get(0).files[0]);
        $(this).next().attr("src", url_image);
      })
        // preview list_files
      $('[name="list_thumbs[]"]').change(function(){
        let files = $(this).get(0).files;
        let parent = $(this).closest(".uploadFile");
        let list_imgs = parent.children(".list-imgs");
        list_imgs.html("");
        for(let i = 0; i< files.length; i++) {
            let url_image = URL.createObjectURL(files[i]);
            list_imgs.append("<div>"+(i+1)+"./ <img src='"+url_image+"'></div>");
        }
      });

    })
    
</script>
<?php get_footer() ?>