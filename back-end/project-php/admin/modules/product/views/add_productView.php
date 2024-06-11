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
                    <form method="POST">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="name" id="name">

                        <label for="price">Giá gốc</label>
                        <input type="number" name="price" id="price">
                        <label for="price">Giá mới</label>
                        <input type="number" name="new_price" id="price">

                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc" class="ckeditor"></textarea>
                        <label for="desc">Chi tiết</label>
                        <textarea name="desc" id="desc" class="ckeditor"></textarea>
                        
                        <label>Ảnh đại diện sản phẩm: Chọn 1 file</label>
                        <div class="uploadFile">
                            <input type="file" name="file">
                            <img src="public/images/img-thumb.png">
                        </div>
                            
                        <label style="margin-top: 20px">Danh sách ảnh chi tiết sản phẩm: Chọn nhiều file (<i>Sử dụng phím Ctrl hoặc Shift để chọn nhiều file</i>)</label>
                        <div class="uploadFile">
                            <input type="file" name="list_files" multiple>
                        <div class="list-imgs"></div>
                        </div>

                        <label for="qty">Số lượng</label>
                        <input type="number" name="qty" id="qty">

                        <label>Hãng sản phẩm</label>
                        <select name="company">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="1">Thể thao</option>
                            <option value="2">Xã hội</option>
                            <option value="3">Tài chính</option>
                        </select>
                        

                        <label>Danh mục sản phẩm</label>
                        <select name="cat_id">
                            <option value="0">-- Chọn danh mục --</option>
                            <?php foreach ($list_cats as $cat) {  ?>
                                <option value="<?php echo $cat['id']; ?>"><?php echo str_repeat("_____ ", $cat['level']).$cat['name']; ?> </option>
                            <?php  } ?>
                        </select>
                        <label>Trạng thái</label>
                        
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // preview image thumb
      $("[name='file']").change(function(){
        let url_image = URL.createObjectURL($(this).get(0).files[0]);
        $(this).next().attr("src", url_image);
      })
        // preview list_files
      $('[name="list_files"]').change(function(){
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