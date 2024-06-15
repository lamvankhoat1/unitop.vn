<?php
  function get_list_cats() {
    global $tbl_list_cats;
    $query_string = "SELECT * FROM {$tbl_list_cats}";
    return db_fetch_array($query_string);
  }

  function get_name_cat_by_id($id) {
    global $tbl_list_cats;
    $query_string = "SELECT name FROM {$tbl_list_cats} WHERE id = {$id}";
    return db_fetch_row($query_string)['name'];
  }

  function get_products_by_cat_id($id) {
    global $tbl_list_products;
    $where = "WHERE";
    if(is_array($id)) {
      $where .= " cat_id IN (". join(",", $id) .")";
    }

    if($where == "WHERE") {
      $where = "";
      }
      
    $query_string = "SELECT *, REPLACE(thumb_main, '../', '') as thumb_client FROM {$tbl_list_products} {$where}";
    // echo $query_string;
    return db_fetch_array($query_string);
  }
?>