<?php
  function get_list_sliders() {
    global $tbl_list_sliders;
    $query_string = "SELECT * FROM {$tbl_list_sliders}";
    return db_fetch_array($query_string);
  }

  function get_slider_by_id($id) {
    global $tbl_list_sliders;
    $query_string = "SELECT * FROM {$tbl_list_sliders} WHERE id = {$id}";
    return db_fetch_row($query_string);
  }

  function add_slider($data) {
    global $tbl_list_sliders;
    echo  $tbl_list_sliders;
    db_insert($tbl_list_sliders, $data);
    redirect_to("?mod=slider");
  }

  function update_slider($data, $id) {
    global $tbl_list_sliders;
    $where = "id = {$id}";
    db_update($tbl_list_sliders, $data, $where);
    redirect_to("?mod=slider");
  }

  function delete_slider($id) {
    global $tbl_list_sliders;
    $where = "id = {$id}";
    db_delete($tbl_list_sliders, $where);
    redirect_to("?mod=slider");
  }
?>