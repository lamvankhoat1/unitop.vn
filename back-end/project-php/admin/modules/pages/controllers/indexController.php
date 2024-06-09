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
      load_view("list_page", $data);
    };

    
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
      update_post_to_trash($id);
    };
    
    
    
    
?>