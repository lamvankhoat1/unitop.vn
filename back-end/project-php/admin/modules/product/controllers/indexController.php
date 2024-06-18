<?php
    /** 
     * PHÂN TÍCH TRANG:  DANH MỤC SẢN PHẨM VÀ CHI TIẾT SẢN PHẨM
     * - Lấy ra 1 sản phẩm nhất định trong danh sách sản phẩm. Ví dụ: Laptop
     * => Dùng cat_id trong url để xác định sản phẩm nào cần được lấy ra
     * 
     * PHÂN TÍCH KHU VỰC ADMIN - TRANG HIỂN THỊ DANH SÁCH SẢN PHẨM: 
     * 
     *      STT, Hình ảnh (thumb_main), Tên sản phẩm (name), Giá gốc (price), Giá mới (new_price), Mô tả ngắn (short_desc), Số lượng hàng: (qty), Hãng (Company), Danh mục (cat_id), Người tạo (Author), Thời gian (time_created)
     *      Bỏ phần Mã sản phẩm, vì đã có id sản phẩm thay thế (nếu có thì bổ sung sau) 
     *      Bổ sung thêm cột Giá mới, Mô tả ngắn, qty, company
     *      Chỉnh sửa phần status
    */
    function construct() {
        load_model("cat");
        load_model("companies");
        load_model("product");
        load("helper", "url");
        load("lib", "data");
        load("lib", "pagination");
        load("lib", "validation");
        load("lib", "preview_image");
    };
  
    function indexAction() {
      $data = array(
        'list_products' => get_list_products(),
      );
        load_view("list_product", $data);
    };

    function addAction() {
        $data = array(
            'list_cats' => tree_data(get_list_cats()),
            'list_companies' => get_list_companies(),
        );
        buttonAddClicked();
        load_view("add_product", $data);
    };

    function buttonAddClicked() {
        $error = array();
        $data = array();

        if (isset($_POST['btn-add-submit'])) {
          if(is_not_empty("name")) {
              $data['name'] = get_value("name");
          } else {
              set_error_empty("name");
          }

          if(is_not_empty("price")) {
            $data['price'] = get_value("price");
          } else {
            set_error("price", "Giá phải lớn hơn 0");
          }

          if(is_not_empty("new_price")) {
            $data['new_price'] = get_value("new_price");
          } else {
            set_error("new_price", "Giá phải lớn hơn 0");
          }

          if(is_not_empty("short_desc")) {
            if (strlen($_POST['short_desc']) < 50) {
                set_error('short_desc', 'Mô tả ngắn phải chứa ít nhất 50 ký tự');
            } else {
                $data['short_desc'] = get_value("short_desc");
            }
          } else {
            set_error_empty("short_desc");
          }

          if(is_not_empty("detail")) {
            if (strlen($_POST['detail']) < 100) {
                set_error('detail', 'Mô tả ngắn phải chứa ít nhất 100 ký tự');
            } else {
                $data['detail'] = get_value("detail");
            }
          } else {
            set_error_empty("detail");
          }


          if(is_not_empty_file("thumb_main")) {
            $dir = "../upload/images/product/thumb";
            $path = $dir.pathinfo($_FILES['thumb_main']['name'], PATHINFO_BASENAME);
            if(is_image_file($path)) {
                if (is_file_exist($path)) {
                    set_error('thumb_main', 'File đã tồn tại trên hệ thống');
                }
            }
          } else {
            set_error('thumb_main', 'Vui lòng chọn file để tải lên');
          }

          // CHECK LIST THUMBS
          $list_paths = array();
          if (!empty($_FILES['list_thumbs']['size'][0])) {
            foreach($_FILES['list_thumbs']['name'] as $file_name) {
              if(is_image_file($file_name)) {
                $dir = "../upload/images/product/";
                $path = $dir.pathinfo($file_name, PATHINFO_BASENAME);
                $list_paths[] = array(
                  'path' => $path
                );;
                if (file_exists($path)) {
                  set_error('list_thumbs', 'File '.$file_name.' đã tồn tại trên hệ thống');
                }
              } else {
                set_error('list_thumbs', 'File '.$file_name.' không phải là file ảnh');
              }
            }
          } else {
            set_error('list_thumbs', 'Vui lòng chọn file để tải lên');
          }


          // check số lượng
          if(is_not_empty('qty')) {
            if((int)$_POST['qty'] <=0) {
              set_error('qty', 'Giá phải lớn hơn 0');
            } else {
              $data['qty'] = get_value('qty');
            }
          } else {
            set_error_empty('qty');
          }

          // check nhãn hàng

          if(is_not_empty('company')) {
            $data['company_id'] = get_value('company');
          } else {
            set_error_empty('company');
          }

          if(is_not_empty('cat_id')) {
            $data['cat_id'] = get_value('cat_id');
          } else {
            set_error_empty('cat_id');
          }

          // add product to database
          if(is_not_error()) {
            // upload list files
            foreach($_FILES['list_thumbs']['tmp_name'] as $index => $tmp_name) {
              $list_paths[$index]['tmp_name'] = $tmp_name;
            }

            foreach ($list_paths as $index => $item) {
              if (!move_uploaded_file($item['tmp_name'], $item['path'])) {
                set_error('thumb_main', 'Tải file '.$item['path'].'lên không thành công');
              }
              unset($list_paths[$index]['tmp_name']);
            }
            $data['list_thumbs'] = json_encode($list_paths);

            // upload thumb
            $dir = "../upload/images/product/thumb/";
            $path = $dir.pathinfo($_FILES['thumb_main']['name'], PATHINFO_BASENAME);
            if(move_uploaded_file($_FILES['thumb_main']['tmp_name'], $path)) {
              $data['thumb_main'] = $path;
            } else {
                set_error('thumb_main', 'Tải file lên không thành công');
            }

            if(is_not_error()) {
              add_product($data);
            } else {
              // Xoá các file đã upload
              foreach ($list_paths as $index => $item) {
                unlink($item['path']);
                unlink($path);
              }
            }

            
            
            
            
            
          }
          
      }
    }
    
    
?>