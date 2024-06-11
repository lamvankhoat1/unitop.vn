<?php
    /** 
     * TREE DATA
    */

    function tree_data($list_cats, $cat_parent_id = 0) {
        $result = array();
        foreach ($list_cats as $cat) {
          if($cat['cat_parent_id'] == $cat_parent_id) {
              $result[] = $cat;
              if(has_child($list_cats, $cat)) {
                  $new_array = tree_data($list_cats, $cat['id']);
                  $result = array_merge($result, $new_array);
              }
          }
        }
        return $result;
      }
  
      function has_child($list_cats, $cat) {
        foreach ($list_cats as $item) {
          if($item['cat_parent_id'] == $cat['id']) {
              return true;
          }
        }
        return false;
      }
      
?>