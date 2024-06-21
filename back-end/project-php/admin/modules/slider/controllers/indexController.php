<?php
    /** 
     * Các ảnh slider có kích thước 878 x 384
     * id
     * Ảnh
     * Link ảnh
    */
    function construct() {
      load("helper", "url");
      load_model("index");
    };
    
    function indexAction() {
      $data = array(
        'list_sliders' => get_list_sliders()
      );
      load_view("list_sliders", $data);
    };
    
    function addAction() {
      load("lib", "validation");
      buttonAddSliderClicked();
      load_view("add_slider");
    };
      
    function buttonAddSliderClicked() {
      $data = array();
      $error = array();
      $path_slider = "../upload/images/slider/";
      if (isset($_POST['btn-add-submit'])) {
        global $error;
        if(is_not_empty('name')){
          $data['name'] = get_value("name");
        } else {
          set_error_empty('name');
        }

        if (is_not_empty_file("slider")) {
          if(is_image_file($_FILES['slider']['name'])) {
            $path_slider .= $_FILES['slider']['name'];
          } else {
            set_error("slider", "File bạn tải lên không phải là file ảnh");
          }
        } else {
          set_error("slider", "Vui lòng tải file ảnh slider lên");
        }

        if(is_not_empty('url')){
          if(is_url($_POST['url'])) {
            $data['url'] = get_value("url");
          } else {
            set_error("url", "URL không hợp lệ");
          }
        } else {
          set_error_empty("url");
        }

        if(is_not_error()) {
          if (move_uploaded_file($_FILES['slider']['tmp_name'], $path_slider)) {
            $data['slider'] = $path_slider;
            add_slider($data);
          } else {
            set_error("slider", "Upload không thành công, vui lòng kiểm tra lại");
          };
          
        }
      }
    }

    function editAction() {
      load("lib", "validation");
      $id= $_GET['id'];
      $data = array(
        'slider' => get_slider_by_id($id),
      );
      echo "<pre>";
      print_r($data['slider']);
      echo "</pre>";
      buttonUpdateSliderClicked($data['slider']['slider']);
      load_view("edit_slider", $data);
    };


    function buttonUpdateSliderClicked($old_path) {
      $data = array();
      $error = array();
      $is_old_file = false; /** kiểm tra xem có up file mới lên không */
      $path_slider = "../upload/images/slider/";
      if (isset($_POST['btn-update-submit'])) {
        global $error;
        if(is_not_empty('name')){
          $data['name'] = get_value("name");
        } else {
          set_error_empty('name');
        }

        if (is_not_empty_file("slider")) {
          if(is_image_file($_FILES['slider']['name'])) {
            $path_slider .= $_FILES['slider']['name'];
          } else {
            set_error("slider", "File bạn tải lên không phải là file ảnh");
          }
        } else {
          // set_error("slider", "Vui lòng tải file ảnh slider lên");
          $data['slider'] = $old_path;
          $is_old_file = true;
        }

        if(is_not_empty('url')){
          if(is_url($_POST['url'])) {
            $data['url'] = get_value("url");
          } else {
            set_error("url", "URL không hợp lệ");
          }
        } else {
          set_error_empty("url");
        }

        if(is_not_error()) {
          if ($is_old_file == false) {
            if (move_uploaded_file($_FILES['slider']['tmp_name'], $path_slider)) {
              $data['slider'] = $path_slider;
              update_slider($data, $_GET['id']);
            } else {
              set_error("slider", "Upload không thành công, vui lòng kiểm tra lại");
            };
          } else {
            update_slider($data, $_GET['id']);
          }
          
        }
      }
    }

    function removeAction() {
      $id= $_GET['id'];
      $data = array(
        'slider' => get_slider_by_id($id),
      );
      buttonDeleteClicked($id);
      buttonReturnClicked();
      load_view("remove_slider", $data);
    };

    function buttonDeleteClicked($id) {
      if (isset($_POST['btn-delete'])) {
        delete_slider($id);
      }
    }

    function buttonReturnClicked() {
      if (isset($_POST['btn-return'])) {
        redirect_to("?mod=slider");
      }
    }
    
    
    
    
    
    
?>