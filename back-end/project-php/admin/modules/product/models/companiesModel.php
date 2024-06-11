<?php
  function get_list_companies() {
    global $tbl_list_companies;
    $query_string = "SELECT * FROM {$tbl_list_companies}";
    return db_fetch_array($query_string);
  }

  function add_company($data) {
    global $tbl_list_companies;
    db_insert($tbl_list_companies, $data);
    redirect_to("?mod=product&controller=list_companies");
  }

  function get_company_from_id($id){
    global $tbl_list_companies;
    $query_string = "SELECT * FROM {$tbl_list_companies} WHERE id = {$id}";
    return db_fetch_row($query_string);
  }

  function update_company($data, $id) {
    global $tbl_list_companies;
    $where = "id = {$id}";
    db_update($tbl_list_companies, $data, $where);
    redirect_to("?mod=".get_module()."&controller=".get_controller());
  }

  function delete_company($id) {
    global $tbl_list_companies;
    $where = "id = {$id}";
    db_delete($tbl_list_companies, $where);
    redirect_to("?mod=".get_module()."&controller=".get_controller());
  }
?>