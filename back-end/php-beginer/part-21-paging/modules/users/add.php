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
if (isset($_POST['btn_reg'])) {
    $error = array();
    if (is_not_empty('username')) {
        $username= $_POST['username'];
        if (is_username($username)) {
            $username= $_POST['username'];
        }
    };

    if (is_not_empty('password')) {
        $password= $_POST['password'];
        if (is_password($password)) {
            $password= $_POST['password'];
        }
    };

    if (is_not_empty('fullname')) {
        $fullname= $_POST['fullname'];
        if (is_fullname($fullname)) {
            $fullname= $_POST['fullname'];
        }
    };

    if (is_not_empty('email')) {
        $email= $_POST['email'];
        if (is_email($email)) {
            $email= $_POST['email'];
        }
    };

    if (is_not_empty('gender')) {
        $gender= $_POST['gender'];
    };

    // SQL 
    if(empty($error)) {
        db_insert('tbl_users', array(
            // 'user_id' => NULL,
            'username' => $username,
            'fullname' => $fullname,
            'email' => $email,
            'gender' => $gender,
            'password' => md5($password)
        ));
        redirect_to("?mod=users&act=main");
        // $sql = "INSERT INTO `tbl_users` (`user_id`, `username`, `fullname`, `email`, `gender`, `password`)".
        // "VALUES (NULL, '{$username}', '{$fullname}', '{$email}', '{$gender}', MD5('{$password}'));";
        // if (mysqli_query($conn, $sql)) {
        //     echo "Thêm dữ liệu thành công";
        // } else {
        //     echo "Lỗi: ".$sql."<br>".mysqli_error($conn);
        // }
    }

}


?>
<div id="main">
    <form action="" method="post">
        <fieldset>
            <legend>ĐĂNG KÝ</legend>
            <label for="username" class="w-100">Tên người dùng <span class="error"><?php echo show_error("username"); ?></span></label>
            <input type="text" class="w-100" id="username" value="<?php echo set_value('username'); ?>" name="username">

            <label for="fullname" class="w-100">Họ và tên <span class="error"><?php echo show_error("fullname"); ?></span></label>
            <input type="text" class="w-100" id="fullname" value="<?php echo set_value('fullname'); ?>" name="fullname">

            <label for="email" class="w-100">Email  <span class="error"><?php echo show_error("email"); ?></span></label>
            <input type="email" id="email" value="<?php echo set_value('email'); ?>" name="email" class="w-100">

            <label for="gender">Giới tính:  <span class="error"><?php echo show_error("gender"); ?></span></label>
            <input type="radio" id="gender-male" value="male" name="gender" <?php if(isset($gender)){if($gender=="male") {echo "checked";}} ?>><label for="gender-male">Nam</label>
            <input type="radio" id="gender-female" value="female" name="gender" <?php if(isset($gender)){if($gender=="female") {echo "checked";}} ?>><label for="gender-female">Nữ</label>

            <label for="password" class="w-100">Mật khẩu <span class="error"><?php echo show_error("password"); ?></span></label>
            <input type="password" id="password" value="<?php echo set_value('password'); ?>" name="password" class="w-100">
            <input type="submit" name="btn_reg" value="ĐĂNG KÝ" class="w-100">
        </fieldset>
    </form>
</div>
<?php get_footer(); ?>