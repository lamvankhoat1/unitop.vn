<?php require 'lib/validation.php'; ?>
<?php require 'lib/layout.php'; ?>
<?php require 'lib/url.php'; ?>

<?php 
    session_start();
    ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập số 1</title>
</head>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Full-width input fields */
input[type=text],
input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%;
    /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {
        -webkit-transform: scale(0)
    }

    to {
        -webkit-transform: scale(1)
    }
}

@keyframes animatezoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
}

.error {
    color: red;
    
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }

    .cancelbtn {
        width: 100%;
    }
}
</style>

<?php
// nếu cookie ghi nhớ đăng nhập đã tồn tại, ko cần check đăng nhập, thiết lập lại session và chuyển hướng về index.php
    if (isset($_COOKIE['is_login'])) {
        if ($_COOKIE['is_login'] == true) {
            $_SESSION['is_login'] = true;
            header("Location: index.php");
        }
    }
    if (isset($_POST['btn_login'])) {
      $error = array();
      if (!empty($_POST['username'])) {
        
        $pattern = "/^[A-Za-z0-9_.]{6,32}$/";
        if (is_username($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            $error['username'] = "Username cho phép sử dụng ký tự, chữ số, dấu chấm, dấu gạch dưới, từ 6 đến 32 ký tự";
        }

        if (!empty($_POST['password'])) {
            if (is_password($_POST['password'])) {
                $password = $_POST['password'];
            } else {
                $error['password'] = "Mật khẩu phải bắt đầu với ký tự in hoa, chiều dài từ 6 đến 32 ký tự";
            }
          } else {
            $error['password'] = "Không được để trống mật khẩu";
          }

      } else {
        $error['username'] = "Không được để trống tên đăng nhập";
      }

      if (empty($error)) {
        $_SESSION['is_login'] = true;
        if (isset($_POST['remember_me'])) {
            setcookie('is_login', true, time() + 3600, "/");
        }
        header("Location: index.php");
        redirect_to("index.php");
      }
    }

?>
<body>
    <form class="modal-content animate" action="" method="post">

        <div class="container">
            <h1>Đăng nhập</h1>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username"  value="<?php echo set_value("username"); ?>" id="username" required>
            <?php echo form_error("username"); ?>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" value="<?php echo set_value("password"); ?>" id="password" required>
            <?php echo form_error("password"); ?>
            <input type="checkbox" name="remember_me" value="1" id="remember_me"> <label style="user-select: none;" for="remember_me">Ghi nhớ thông tin đăng nhập</label>
            <button type="submit" name="btn_login">Login</button>
        </div>
    </form>
</body>

</html>