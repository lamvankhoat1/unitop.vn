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

    function render_menu_cats() {
      global $tbl_list_cats;
      $query_string = "SELECT * FROM $tbl_list_cats";
      $list_cats = db_fetch_array($query_string);
      $menu_html = create_menu($list_cats);
      return $menu_html;
    }

    function create_menu($list_cats, $cat_parent_id = 0) {
      $result = "";
      if ($cat_parent_id == 0) {
        $result .= "<ul class=\"list-item\">";
      } else {
        $result .= "<ul class=\"sub-menu\">";
      }
      foreach ($list_cats as $cat) {
        if($cat['cat_parent_id'] == $cat_parent_id) {
            $result .= "<li>";
            $result .= "<a href='?mod=product&cat_id={$cat['id']}' title=''>{$cat['name']}</a>";
            if(has_child($list_cats, $cat)) {
                $sub_menu = create_menu($list_cats, $cat['id']);
                $result .= $sub_menu;
            }
            $result .= "</li>";
        }
      }
      $result .= "</ul>";
      return $result;
    }

    function render_list_cats_id($cat_parent_id = 0) {
      global $tbl_list_cats;
      $query_string = "SELECT * FROM $tbl_list_cats";
      $list_cats = db_fetch_array($query_string);
      $result = get_list_cats_id($list_cats, $cat_parent_id);
      $result[] = $cat_parent_id;
      return join(",", $result);
    } 

    function get_list_cats_id($list_cats, $cat_parent_id = 0) {
      $result = [];
      
      foreach ($list_cats as $cat) {
        if($cat['cat_parent_id'] == $cat_parent_id) {
            $result[] = $cat['id'];
            if(has_child($list_cats, $cat)) {
                $item = get_list_cats_id($list_cats, $cat['id']);
                $result =  array_merge($result, $item);
            }
        }
      }
      return $result;
    }

    
      
?>