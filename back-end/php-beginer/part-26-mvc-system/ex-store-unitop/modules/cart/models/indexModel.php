<?php
  function get_product_by_id($id) {
    $post_info = db_fetch_row('SELECT * FROM `tbl_product` WHERE `id` = '.$id);
    return $post_info;
  }

?>