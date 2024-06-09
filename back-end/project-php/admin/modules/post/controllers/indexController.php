<?php
/** 
 * Các hướng dẫn đều nằm trong file indexController
 * Phần module post nằm trong khu vực blog (client)
 * 
 * KHU VỰC BLOG
 * - Trang hiển thị danh sách:
 * + Các danh sách bao gồm: thumb (ảnh đại diện), title, url (title), time_created, short_desc
 * - Trang nội dung chi tiết
 * + title (heading), time_created (thời gian tạo), short_desc (Nội dung ngắn trong phần in đậm đầu tiên), detail (chi tiết bài viết)
 * 
 * => CSDL bao gồm:
 * - id (auto)
 * - thumb (ảnh đại diện)
 * - title
 * - short_desc (mô tả ngắn)
 * - detail (chi tiết bài viết)
 * - status (trạng thái)
 * - author (người gửi)
 * - time_created (auto)
 * 
 * CHỈNH SỬA LẠI PHẦN THEME GỐC
 * + Trang add_post
 * - Bỏ phần danh mục cha (do trang client không có)
 * - Bỏ phần slug url (slug tự động tạo dựa trên title)
 * - Thêm phần mô tả ngắn (short_desc)
 * + Loại bỏ phần thêm danh mục bài viết
 * + Loại bỏ cột danh mục
 * 
*/
    function construct() {
      load("lib", "validation");
      load("helper", "url");
      load_model("index");

    };
  
    /** 
     * Danh sách bài viết
    */
    function indexAction() {
      $data = array(
        'list_posts' => get_list_posts()
      );
      sm_actionClicked();
      load_view("list_post", $data);
    };

    /** 
     * Hành động trên trang danh sách bài viết
     * ?actions=1: chỉnh sửa
     * ?actions=2: bỏ vào thùng rác
    */
    function sm_actionClicked() {
      if (isset($_GET['sm_action'])) {
        if (!empty($_GET['checked'])) {
          $id_list = explode(";", $_GET['checked']);
          switch ($_GET['actions']) {
            // case 1: /** Chỉnh sửa*/
            //   break;
            case 2: /** Bỏ vào thùng rác*/
              put_the_posts_in_the_trash($id_list);
            break;
            case 3: /** Áp dụng đang chờ*/
              update_post_to_pending($id_list);
              break;  
            case 4: /** Áp dụng đã đăng*/
              update_post_to_publish($id_list);
              break; 
            case 5: /** Xoá vĩnh viễn */
              delete_posts_permanently($id_list);
              break;                               
          }
        }
      }
    }

    /** 
     * Thêm mới bài viết
    */

    function addPostAction() {
        load("lib", "preview_image");
        addButtonClicked();
        load_view("add_post");
    };

    function addButtonClicked() {
      if(isset($_POST['btn-submit'])) {
        global $error;
        $error = array();
        $data = array();

        // TITLE
        if (is_not_empty("title")) {
          $title = get_value('title');
          if (strlen($title) >= 5) {
            $data['title'] = $title;
          } else {
            set_error('title', 'Vui lòng nhập tối thiểu 5 ký tự');
          }
        } else {
          set_error_empty("title");
        }
        // short_desc
        if(is_not_empty("short_desc")) {
          $short_desc = get_value('short_desc');
          if (strlen($short_desc) >= 50) {
            $data['short_desc'] = $short_desc;
          } else {
            set_error('short_desc', 'Vui lòng nhập tối thiểu 50 ký tự');
          }
        } else {
          set_error('short_desc', 'Vui lòng nhập tối thiểu 50 ký tự');
        }
        // detail
        if(is_not_empty("detail")) {
          $detail = get_value('detail');
          if (strlen($detail) >= 50) {
            $data['detail'] = $detail;
          } else {
            set_error('detail', 'Vui lòng nhập tối thiểu 50 ký tự');
          }
        } else {
          set_error('detail', 'Vui lòng nhập tối thiểu 50 ký tự');
        }
        
        // check url thumb
        if(is_not_empty("url-thumb")) {
          $has_url_thumb = true;
          $data['thumb'] = $_POST['url-thumb'];
        }
        
        // check 
        if (is_not_empty_file("file") && $has_url_thumb == false) {
          $dir = "upload/images/post/";
          $file_name = $_FILES['file']['name'];
          $file_size = $_FILES['file']['size'];
          if(is_image_file($file_name)) {
            if(check_file_size($file_size, 1, 5*1048576)) {
              $path = $dir.$file_name;
              if (is_file_exist($path)) {
                set_error('file', 'File này đã tồn tại trên hệ thống');
              } else {
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                  set_error('file', 'Ảnh tải lên không thành công, vui lòng kiểm tra lại');
                }
                $data['thumb'] = $path;
              }
            } else {
              set_error('file', 'Vui lòng tải lên ảnh dưới 5MB');
            }
          } else {
            set_error('file', 'File bạn tải lên không phải là ảnh');
          }
        }

        if(is_not_error()) {
          save_post($data);
        }
      }
    }

    /** 
     * Sửa bài viết
    */
    function editPostAction() {
      load("lib", "preview_image");
      $id= $_GET['id'];
      $data = array(
        'id' => $id,
        'post' => get_post_by_id($id)
      );
      editButtonClicked($data['post']['thumb']);
      load_view("edit_post", $data);
    };

    function editButtonClicked($thumb) {
      if(isset($_POST['btn-update-submit'])) {
        global $error;
        $error = array();
        $data = array();

        // TITLE
        if (is_not_empty("title")) {
          $title = get_value('title');
          if (strlen($title) >= 5) {
            $data['title'] = $title;
          } else {
            set_error('title', 'Vui lòng nhập tối thiểu 5 ký tự');
          }
        } else {
          set_error_empty("title");
        }
        // short_desc
        if(is_not_empty("short_desc")) {
          $short_desc = get_value('short_desc');
          if (strlen($short_desc) >= 50) {
            $data['short_desc'] = $short_desc;
          } else {
            set_error('short_desc', 'Vui lòng nhập tối thiểu 50 ký tự');
          }
        } else {
          set_error('short_desc', 'Vui lòng nhập tối thiểu 50 ký tự');
        }
        // detail
        if(is_not_empty("detail")) {
          $detail = get_value('detail');
          if (strlen($detail) >= 50) {
            $data['detail'] = $detail;
          } else {
            set_error('detail', 'Vui lòng nhập tối thiểu 50 ký tự');
          }
        } else {
          set_error('detail', 'Vui lòng nhập tối thiểu 50 ký tự');
        }
        
        // file: enctype="multipart/form-data"
        $data['thumb'] = $thumb; //default
        if (is_not_empty("url-thumb")) {
          $has_url_thumb = true;
          $data['thumb'] = $_POST['url-thumb'];
        }

        if (is_not_empty_file("file") && $has_url_thumb == false) {
          $dir = "upload/images/post/";
          $file_name = $_FILES['file']['name'];
          $file_size = $_FILES['file']['size'];
          if(is_image_file($file_name)) {
            if(check_file_size($file_size, 1, 5*1048576)) {
              $path = $dir.$file_name;
              if (is_file_exist($path)) {
                set_error('file', 'File này đã tồn tại trên hệ thống');
              } else {
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                  set_error('file', 'Ảnh tải lên không thành công, vui lòng kiểm tra lại');
                }
                $data['thumb'] = $path;
              }
            } else {
              set_error('file', 'Vui lòng tải lên ảnh dưới 5MB');
            }
          } else {
            set_error('file', 'File bạn tải lên không phải là ảnh');
          }
        }
        // không cần validation file
        unset($error['file']);

        if(is_not_error()) {
          $id= $_GET['id'];
          update_post($data, $id);
        }
      }
    }

    /** 
     * Cho vào thùng rác
    */
    function removePostAction() {
      $id = $_GET['id'];
      update_post_to_trash($id);
    };
    
    
    
    
    
    
?>