<?php
    /** 
     * Tuỳ chỉnh trang thêm danh mục
     * Xây dựng CSDL trang tbl_list_cats
    */
    function construct() {
      load("lib", "validation");
      load("helper", "url");
      load_model("cat");
    };
  
    function indexAction() {
        load_view("list_cat");
    };
        
    function addAction() {
        $data = array(
            'list_cats' => get_list_cats()
        );
        buttonAddClick();
        load_view("add_cat", $data);
    };

    function buttonAddClick() {
      $error = array();
      $data = array();
      if (isset($_POST['btn-add-submit'])) {
        if(is_not_empty("title")) {
            $data['name'] = get_value("title");
        } else {
            set_error_empty('title');
        }

        if(isset($_POST['level'])) {
            if((int)$_POST['level'] >= 0) {
                $data['level'] = (int)$_POST['level'];
            } else {
                set_error("level", "Level không được nhỏ hơn 0");
            }
        } 

        if (isset($_POST['parent-cat'])) {
          if ($_POST['parent-cat'] != "other") {
            $data['cat_parent_id'] = $_POST['parent-cat'];
          } else {
            set_error("parent-cat", "Vui lòng chọn danh mục");
          }
        }

        if(is_not_error()) {
            add_cat($data);
        }

      }
    }
    
    
?>