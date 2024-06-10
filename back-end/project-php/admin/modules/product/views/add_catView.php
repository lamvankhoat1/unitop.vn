<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục</label>
                        <?php echo set_error_form("title"); ?>
                        <input type="text" name="title" id="title" <?php set_value_input('title'); ?>>
                        <label for="level">Level</label>
                        <?php echo set_error_form("level"); ?>
                        <input type="number" name="level" id="level" min="0" <?php set_value_input('level'); ?>>
                        <label>Danh mục cha</label>
                        <?php echo set_error_form("parent-cat"); ?>
                        <select name="parent-cat">
                            <option value="0">-- Chọn danh mục --</option>
                            <?php foreach ($list_cats as $cat) {  ?>
                                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                            <?php  } ?>
                        </select>
                        <button type="submit" name="btn-add-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
      $("input[type='text']").on('input', function(){
        $current_value = $(this).val();
        $("select[name='parent-cat'] option[value='0']").text($current_value);
      });
    })
</script>
<?php get_footer() ?>