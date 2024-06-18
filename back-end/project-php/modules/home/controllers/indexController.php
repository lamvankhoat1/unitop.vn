<?php
    /** 
     * Sản phẩm bán chạy, dựa trên số lượng đã bán, sắp xếp từ cao xuống thấp
    */
    function construct() {
      load("lib", "data");
    };
  
    /** 
     * Xây dựng banner
    */
    function indexAction() {
      load_view("home");
    };
?>