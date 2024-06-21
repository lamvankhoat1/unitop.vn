<?php
    /** 
     * Tuỳ chỉnh trang thêm danh mục
     * Xây dựng CSDL trang tbl_list_cats
    */
    function construct() {
      load("lib", "validation");
      load("lib", "data");
      load("helper", "url");
      load_model("cat");
    };
  
    function indexAction() {
      $data = array(
          'list_cats' => tree_data(get_list_cats())
      );
      load_view("list_cat", $data);
    };
        
    function addAction() {
        $data = array(
            'list_cats' => tree_data(get_list_cats())
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

    function editAction() {
      $id= $_GET['id'];
      $data = array(
        'list_cats' => tree_data(get_list_cats()),
        'cat' => get_cat_by_id($id),
      );
      buttonUpdateClick();
      load_view("edit_cat", $data);
    }

    function buttonUpdateClick() {
      $error = array();
      $data = array();
      if (isset($_POST['btn-update-submit'])) {
        if(is_not_empty("name")) {
            $data['name'] = get_value("name");
        } else {
            set_error_empty('name');
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
            update_cat($data, $_GET['id']);
        }

      }
    }

    function deleteAction() {
      $id= $_GET['id'];
      $data = array(
        'cat' => get_cat_by_id($id),
      );
      buttonConfirmClicked($id);
      load_view("delete_cat", $data);
    };

    function buttonConfirmClicked($id) {
      if (isset($_POST['btn-delete-submit'])) {
        delete_cat($id);
      } elseif (isset($_POST['btn-cancel-submit'])) {
        redirect_to("?mod=product&controller=list_cat");
      }
    }
    
    
    
?>