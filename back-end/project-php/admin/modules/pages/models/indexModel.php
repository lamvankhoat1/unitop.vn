<?php

  function get_list_pages() {
    global $tbl_list_pages;
    $query_string = "SELECT * FROM {$tbl_list_pages}";
    return db_fetch_array($query_string);
  }
  function add_page($data) {
    global $tbl_list_pages;
    db_insert($tbl_list_pages, $data);
    redirect_to("?mod=pages");
  }
  function get_page_by_id($id) {
    global $tbl_list_pages;
    $query_string = "SELECT * FROM {$tbl_list_pages}";
    return db_fetch_row($query_string);
  }

  function update_page($data, $id) {
    global $tbl_list_pages;
    $where = "id = {$id}";
    db_update($tbl_list_pages, $data, $where);
    redirect_to("?mod=pages");
  }

  function update_post_to_trash($id) {
    global $tbl_list_pages;
    $data = array(
      'status' => 'trash',
    );
    $where = "id = {$id}";
    db_update($tbl_list_pages, $data, $where);
    redirect_to("?mod=pages");
  }
?>