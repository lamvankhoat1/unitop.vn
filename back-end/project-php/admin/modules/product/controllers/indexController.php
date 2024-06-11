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
        load("lib", "data");
        load("lib", "preview_image");
    };
  
    function indexAction() {
        load_view("list_product");
    };

    function addAction() {
        load_model("cat");
        $data = array(
            'list_cats' => tree_data(get_list_cats())
        );
        load_view("add_product", $data);
    };
    
    
?>