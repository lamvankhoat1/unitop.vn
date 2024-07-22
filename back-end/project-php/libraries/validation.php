<?php

  /** 
   * VALIDATION
  */
  function is_not_empty($label, $method = "post") {
    # method: post
    if ($method == "post") {
        if (empty($_POST[$label])) {
            return false;
        }
        return true;
    }
    #method get
    if (empty($_GET[$label])) {
        return false;
    }
    return true;
  }

  // VALIDATION CHECK
  function is_url($url) {
    if (filter_var($url, FILTER_VALIDATE_URL)) {
      return true;
    }
    return false;
  }

  function is_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return false;
    }
    return true;
  }

  function is_phone($phone) {
    $pattern = "/^(032|033|034|035|036|037|038|039|096|097|098|086|083|084|085|081|082|088|091|094|070|079|077|076|078|090|093|089|056|058|092|059|099)[0-9]{7}$/";
    if (!preg_match($pattern, $phone, $matches)) {
      return false;
    };
    return true;
  }

  // VALIDATION FILE
  function is_not_empty_file($label) {
    if(isset($_FILES[$label]['size'])) {
      if($_FILES[$label]['size'] == 0){
        return false;
      }
      return true;
    }
    return false;
  }

  function is_image_file($file_name) {
    $list_types = array(
      'jpeg', "png", "webp", "gif", "jpg"
    );
    $type = pathinfo($file_name, PATHINFO_EXTENSION);
    return in_array($type, $list_types);
  }

  function is_file_exist($path) {
    if(file_exists($path)) {
      return true;
    }
    return false;
  }

  /** 
   * $min, $max: bytes
   * $file_size: bytes
  */
  function check_file_size($file_size, $min = 0, $max = 0) {
    if($max >= $min) {
      if($min <= $file_size && $file_size <= $max) {
        return true;
      } else {
        return false;
      }
    }
    return false;
  }

  /** 
   * GET & SET value
   * get_value: lấy giá trị trong form truyền vô $data
   * set_value: điền lại dữ liệu sau khi nhấn vào nút submit load lại trang
  */
  function get_value($label, $method = "post") {
    # method: post
    if ($method == "post") {
        return $_POST[$label];
    }
    # method: get
    return $_GET[$label];
  }

  /** 
   * Biến $data dùng trong sửa các bài viết, sản phẩm
  */
  function set_value($label, $data = array()) {
    
    
    if(isset($_POST[$label])) {
      return $_POST[$label];
    }
    
    if(isset($_GET[$label])) {
      return $_GET[$label];
    }
    
    if(!empty($data)) {
      if (array_key_exists($label, $data)) {
        return $data[$label];
      }
    }

    return "";
  }

  function set_value_input($label, $data = array()) {
    echo "value='".set_value($label, $data)."'";
  }

  function set_value_textarea($label, $data = array()) {
    echo set_value($label, $data);
  }

  /** 
   * ERROR
  */
  function set_error_empty($label) {
    global $error;
    $error[$label] = "Không được để trống trường này";
  }

  function set_error($label, $content) {
    global $error;
    $error[$label] = $content;
  }

  function get_error($label) {
    global $error;
    if (isset($error[$label])) {
      return $error[$label];
    }
    return "";
  }

  function set_error_form($label) {
    if(!empty(get_error($label))) {
        echo "<p class='error'>".get_error($label)."</p>";
    }
  }

  function is_not_error() {
    global $error;
    if (empty($error)) {
      return true;
    };
    return false;
  }
?>