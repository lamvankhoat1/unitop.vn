<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <div id="content">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="name">Tên danh mục</label>
                        <?php echo set_error_form("name"); ?>
                        <input type="text" name="name" id="name" <?php set_value_input('name', $cat); ?>>
                        <label for="level">Level</label>
                        <?php echo set_error_form("level"); ?>
                        <input type="number" name="level" id="level" min="0" <?php set_value_input('level', $cat); ?>>
                        <label>Danh mục cha</label>
                        <?php echo set_error_form("parent-cat"); ?>
                        <select name="parent-cat">
                            <option value="0">-- Chọn danh mục --</option>
                            <?php
                              $selected = "";
                            ?>
                            <?php foreach ($list_cats as $item) {  ?>
                                <?php if ($cat['cat_parent_id'] == $item['id']) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                } ?>
                                <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"><?php echo str_repeat("_____ ", $item['level']).$item['name']; ?> </option>
                            <?php  } ?>
                        </select>
                        <button type="submit" name="btn-update-submit" id="btn-submit">Cập nhật</button>
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