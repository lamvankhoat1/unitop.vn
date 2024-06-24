<?php
    function get_product_by_id($id) {
      global $tbl_list_products;
      $query_string = "SELECT cat_id, REPLACE(thumb_main, \"..\/\", \"\") as thumb_main, name, new_price FROM {$tbl_list_products} WHERE id = {$id}";
      return db_fetch_row($query_string);
    }
?>