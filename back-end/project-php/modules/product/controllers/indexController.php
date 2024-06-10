<?php
    /** 
     * PHÂN TÍCH TRANG:  DANH MỤC SẢN PHẨM VÀ CHI TIẾT SẢN PHẨM
     * - Lấy ra 1 sản phẩm nhất định trong danh sách sản phẩm. Ví dụ: Laptop
     * => Dùng cat_id trong url để xác định sản phẩm nào cần được lấy ra
     * DATABASE: tbl_list_products
     * - id
     * - name
     * - price
     * - new_price
     * - short_desc: Mô tả ngắn
     * - detail: Mô tả chi tiết sản phẩm
     * - thumb_main: Ảnh đại diện cho sản phẩm
     * - list_thumbs: Danh sách url ảnh mô tả sản phẩm
     * - qty: Số lượng hàng đang còn (Dùng để xác định hàng còn hay là đã hết để hiển thị lên giao diện người dùng)
     * - company: hãng (Acer, Apple, HP,...)
     * - cat_id
     * 
     * PHÂN TÍCH KHU VỰC ADMIN - TRANG HIỂN THỊ DANH SÁCH SẢN PHẨM: 
     * 
     *      STT, Hình ảnh (thumb_main), Tên sản phẩm (name), Giá gốc (price), Giá mới (new_price), Mô tả ngắn (short_desc), Số lượng hàng: (qty), Hãng (Company), Danh mục (cat_id), Người tạo (Author), Thời gian (time_created)
     *      Bỏ phần Mã sản phẩm, vì đã có id sản phẩm thay thế (nếu có thì bổ sung sau) 
     *      Bổ sung thêm cột Giá mới, Mô tả ngắn, qty, company
     *      Chỉnh sửa phần status
     * 
     * TRANG THÊM SẢN PHẨM: 
     * 
    */
    function construct() {
      load_model("index");
    };
  
    function indexAction() {
      $cat_id= $_GET['cat_id'];
      $data = array(
        'cat_id' => $cat_id,
      );
      load_view("category_product", $data);
    };
?>