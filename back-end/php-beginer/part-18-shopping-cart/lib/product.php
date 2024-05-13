<?php
  function get_list_product_by_cat_id($cat_id) {
    global $list_product;
    $result = array();
    if(array_key_exists($cat_id, $list_product)) {
        foreach ($list_product as $item) {
            if ($item['cat_id'] == $cat_id) {
                $result[] = $item;
            }
        }
        return $result;
    }
    return false;
  }

  function get_product_by_id($id) {
    global $list_product;
    if (array_key_exists($id, $list_product)) {
        return $list_product[$id];
    } else {
        return false;
    }
  }
?>