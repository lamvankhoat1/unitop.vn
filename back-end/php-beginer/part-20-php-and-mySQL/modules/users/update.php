<?php
  $id= $_GET['id'];
  $sql = "SELECT * FROM tbl_users WHERE user_id = {$id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
?>
<?php get_header(); ?>

<style>
    form {
        width: 500px;
        margin: 0 auto;
        border: 1px solid #ddd;
        padding: 5px 15px;
        border-radius: 5px;
    }

    .w-100 {
        width: 100%;
    }
    label, input[type=submit] {
        display: block;
    }
    
    input {
        margin-bottom: 5px;
    }

    input[type=submit] {
        margin-top: 15px;
    }

    label[for*="gender"] {
        display: inline-block;
    }

    span.error {
        color: red;
    }
</style>
<?php
$fullname = $row['fullname'];
$gender = strtolower($row['gender']);

if (isset($_POST['btn_update'])) {
    $error = array();
    $alert = array();

    if (is_not_empty('fullname')) {
        $fullname= $_POST['fullname'];
        if (is_fullname($fullname)) {
            $fullname= $_POST['fullname'];
        }
    };

    if (is_not_empty('gender')) {
        $gender= $_POST['gender'];
    };

    // SQL 
    if(empty($error)) {
        db_update('tbl_users', array(
            'fullname' => $fullname,
            'gender' => $gender,
        ), "`user_id`={$id}");
        redirect_to("?mod=users&act=main");
        // $sql = "UPDATE `tbl_users` SET `fullname` = '{$fullname}', `gender` = '{$gender}' WHERE `user_id`={$id}";
        // if (mysqli_query($conn, $sql)) {
        //     $alert['success'] = "Cập nhật dữ liệu thành công";
        //     redirect_to("?mod=users&act=main");
        // } else {
        //     echo "Lỗi: ".$sql."<br>".mysqli_error($conn);
        // }
    }

}


?>
<div id="main">
    <div class="alert" style="color: green; font-weight: bold; font-style: italic">
        <?php
          if (isset($alert['success'])) {
            echo $alert['success'];
          }
        ?>
    </div>
    <form action="" method="post">
        <fieldset>
            <legend>CẬP NHẬT THÔNG TIN</legend>
 
            <label for="fullname" class="w-100">Họ và tên <span class="error"><?php echo show_error("fullname"); ?></span></label>
            <input type="text" class="w-100" id="fullname" value="<?php echo set_value('fullname'); ?>" name="fullname">

            <label for="gender">Giới tính:  <span class="error"><?php echo show_error("gender"); ?></span></label>
            <input type="radio" id="gender-male" value="male" name="gender" <?php if(isset($gender)){if($gender=="male") {echo "checked";}} ?>><label for="gender-male">Nam</label>
            <input type="radio" id="gender-female" value="female" name="gender" <?php if(isset($gender)){if($gender=="female") {echo "checked";}} ?>><label for="gender-female">Nữ</label>
            
            <input type="submit" name="btn_update" value="CẬP NHẬT" class="w-100">
        </fieldset>
    </form>
</div>
<?php get_footer(); ?>