<?php
  /** 
   * Tạo các trang riêng lẻ: Liên hệ, giới thiệu
   * Chỉnh sửa lại trang "THÊM"
   * + Bỏ slug url
   * + Bỏ thumb
   * DATABASE
   * + id
   * + title
   * + description
   * + status
   * + author
   * + time_created
  */
    function construct() {
      load("helper", "url");
      load("lib", "validation");
      load_model("index");
    };
  
    /** 
     * ?mod=pages
    */
    function indexAction() {
      $data = array(
        "list_pages" => get_list_pages()
      );
      sm_actionClicked();
      load_view("list_page", $data);
    };

        /** 
     * Hành động trên trang danh sách bài viết
     * ?actions=1: chỉnh sửa
     * ?actions=2: bỏ vào thùng rác
    */
    function sm_actionClicked() {
      if (isset($_GET['sm_action'])) {
        echo "code run at line: ".__LINE__;
        if (!empty($_GET['checked'])) {
          $id_list = explode(";", $_GET['checked']);
          switch ($_GET['actions']) {
            // case 1: /** Chỉnh sửa*/
            //   break;
            case 2: /** Bỏ vào thùng rác*/
              put_the_pages_in_the_trash($id_list);
            break;
            case 3: /** Áp dụng đang chờ*/
              update_pages_to_pending($id_list);
              break;  
            case 4: /** Áp dụng đã đăng*/
              update_pages_to_publish($id_list);
              break; 
            case 5: /** Xoá vĩnh viễn */
              delete_pages_permanently($id_list);
              break;                               
          }
        }
      }
    }

    
    /** 
     * THÊM TRANG MỚI
     * ?mod=pages&action=add
     */
    function addAction() {
      buttonAddClicked();
      load_view("add_page");
    };

    function buttonAddClicked() {
      $data = array();
      if (isset($_POST['btn-add-submit'])) {
        if(is_not_empty('title')) {
          $data['title'] = get_value('title');
        } else {
          set_error('title', 'Không được để trống trường này');
        }

        if (is_not_empty('desc')) {
          if(strlen($_POST['desc']) >= 50) {
            $data['description'] = get_value('desc');
          } else {
            set_error('desc', 'Phần mô tả tối thiểu phải có 50 ký tự');
          }
        } else {
          set_error('desc', 'Không được để trống trường này');
        }

        if(is_not_error()) {
          add_page($data);
        }
      }


    }

    /** 
     * SỬA
    */
    function editAction() {
      $id= $_GET['id'];
      $data = array(
        'page' => get_page_by_id($id)
      );
      buttonUpdateClicked();
      load_view("edit_page", $data);
    };

    function buttonUpdateClicked() {
      if (isset($_POST['btn-update-submit'])) {
        $data = array();
        if(is_not_empty('title')) {
          $data['title'] = get_value('title');
        } else {
          set_error('title', 'Không được để trống trường này');
        }

        if (is_not_empty('description')) {
          if(strlen($_POST['description']) >= 50) {
            $data['description'] = get_value('description');
          } else {
            set_error('description', 'Phần mô tả tối thiểu phải có 50 ký tự');
          }
        } else {
          set_error('description', 'Không được để trống trường này');
        }

        if(is_not_error()) {
          update_page($data, $_GET['id']);
        }
      }
    }
    
    

    /** 
     * CHO VÀO THÙNG RÁC
    */
    function removeAction() {
      $id= $_GET['id'];
      update_page_to_trash($id);
    };
    
    
    
    
?>