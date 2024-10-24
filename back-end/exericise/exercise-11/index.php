<?php require 'lib/validation.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM ĐĂNG KÝ</title>
</head>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Full-width input fields */
input[type=text],
input[type=password],
input[type=number] {
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
    if (isset($_POST['btn_reg'])) {
      $error = array();
      if (!empty($_POST['fullname'])) {
        if (strlen($_POST['fullname']) >= 2) {
            $fullname = $_POST['fullname'];
        } else {
            $error['fullname'] = "Tên đầy đủ phải chứa 2 ký tự trở lên";
        }
      } else {
        $error['fullname'] = "Không được để trống họ và tên";
      }

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

      if (!empty($_POST['phone'])) {
        if (is_phone($_POST['phone'])) {
            $phone = $_POST['phone'];
        } else {
            $error['phone'] = "Vui lòng nhập số điện thoại hợp lệ";
        }
      } else {
        $error['phone'] = "Không được để trống số điện thoại";
      }

      if (empty($error)) {
        echo "Tên đăng nhập: {$username}<br />";
        echo "Mật khẩu: {$password}";
      }
    }

?>
<body>
    <form class="modal-content animate" action="" method="post">

        <div class="container">
            <h1>Đăng ký</h1>
            <!-- Họ và tên -->
            <label for="fullname"><b>Họ và tên</b></label>
            <input type="text" placeholder="Enter fullname" name="fullname"  value="<?php echo set_value("fullname"); ?>" id="fullname" required>
            <?php echo form_error("fullname"); ?>
            <!-- Tên đăng nhập -->
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username"  value="<?php echo set_value("username"); ?>" id="username" required>
            <?php echo form_error("username"); ?>
            <!-- Mật khẩu -->
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" value="<?php echo set_value("password"); ?>" id="password" required>
            <?php echo form_error("password"); ?>
            <!-- Số điện thoại -->
            <label for="phone"><b>Số điện thoại</b></label>
            <input type="number" placeholder="Enter phone" name="phone"  value="<?php echo set_value("phone"); ?>" id="phone" required>
            <?php echo form_error("phone"); ?>

            <button type="submit" name="btn_reg">Đăng ký</button>
        </div>
    </form>
</body>

</html>