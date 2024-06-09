<?php

  function get_list_pages() { 
    global $tbl_list_pages;
    if (isset($_GET['filter'])) {
      return get_list_pages_by_status($_GET['filter']);
    }
    if(isset($_GET['s'])) {
      $query_string = "SELECT * FROM ".$tbl_list_pages." WHERE title LIKE '%{$_GET['s']}%'"; 
      return db_fetch_array($query_string);
    }
    $query_string = "SELECT * FROM {$tbl_list_pages}";
    return db_fetch_array($query_string);
  }

  function get_list_pages_by_status($status) {
    global $tbl_list_pages;
    $query_string = "SELECT * FROM ".$tbl_list_pages." WHERE status = '{$status}'";
    return db_fetch_array($query_string);
  }



  function add_page($data) {
    global $tbl_list_pages;
    db_insert($tbl_list_pages, $data);
    redirect_to("?mod=pages");
  }
  function get_page_by_id($id) {
    global $tbl_list_pages;
    $query_string = "SELECT * FROM {$tbl_list_pages} WHERE id = {$id}";
    return db_fetch_row($query_string);
  }

  function update_page($data, $id) {
    global $tbl_list_pages;
    $where = "id = {$id}";
    db_update($tbl_list_pages, $data, $where);
    redirect_to("?mod=pages");
  }

  function update_page_to_trash($id) {
    global $tbl_list_pages;
    $data = array(
      'status' => 'trash',
    );
    $where = "id = {$id}";
    db_update($tbl_list_pages, $data, $where);
    redirect_to("?mod=pages");
  }

    // FILTER STATUS
    function get_num_pages_by_status($status = "") {
      global $tbl_list_pages;
      if (!empty($status)) {
        $query_string = "SELECT * FROM {$tbl_list_pages} WHERE status = '{$status}'";
        return db_num_rows($query_string);
      }
      $query_string = "SELECT * FROM {$tbl_list_pages}";
      return db_num_rows($query_string);
    }

    // ACTION
    function put_the_pages_in_the_trash($id_list) {
      unset($id_list[0]);
      global $tbl_list_pages;
      $data = array(
        'status' => 'trash'
      );
      $where = "id in (". implode(",", $id_list) .")";
      db_update($tbl_list_pages, $data, $where);
      redirect_to("?mod=pages");
    }
    
    function update_pages_to_pending($id_list) {
      unset($id_list[0]);
      global $tbl_list_pages;
      $data = array(
        'status' => 'pending'
      );
      $where = "id in (". implode(",", $id_list) .")";
      db_update($tbl_list_pages, $data, $where);
      redirect_to("?mod=pages");
    }
    
    function update_pages_to_publish($id_list) {
      unset($id_list[0]);
      global $tbl_list_pages;
      $data = array(
        'status' => 'publish'
      );
      $where = "id in (". implode(",", $id_list) .")";
      db_update($tbl_list_pages, $data, $where);
      redirect_to("?mod=pages");
    }
  
    function delete_pages_permanently($id_list) {
      unset($id_list[0]);
      global $tbl_list_pages;
      db_delete($tbl_list_pages, "id in (".implode(",", $id_list).") AND status = 'trash'");
      redirect_to("?mod=pages");
    }
?>