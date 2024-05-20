<?php
  function get_list_product_by_cat_id($id) {
    return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = ".$id);
  }
?>