<?php

  function get_list_posts() {
    global $tbl_list_posts;
    if (isset($_GET['filter'])) {
      return get_list_posts_by_status($_GET['filter']);
    }
    if(isset($_GET['s'])) {
      $query_string = "SELECT * FROM ".$tbl_list_posts." WHERE title LIKE '%{$_GET['s']}%'"; 
      return db_fetch_array($query_string);
    }
    
    $query_string = "SELECT * FROM ".$tbl_list_posts;
    return db_fetch_array($query_string);
  }

  function get_list_posts_by_status($status) {
    global $tbl_list_posts;
    $query_string = "SELECT * FROM ".$tbl_list_posts." WHERE status = '{$status}'";
    return db_fetch_array($query_string);
  }

  // THÊM BÀI VIẾT
  function save_post($data) {
    global $tbl_list_posts;
    db_insert($tbl_list_posts, $data);
    redirect_to("?mod=post");
  }
  
  // CẬP NHẬT BÀI VIẾT
  function update_post($data, $id) {
    global $tbl_list_posts;
    db_update($tbl_list_posts, $data, "id = {$id}");
    redirect_to("?mod=post");
  }

  // CHO BÀI VIẾT VÀO THÙNG RÁC
  function update_post_to_trash($id) {
    global $tbl_list_posts;
    db_update($tbl_list_posts, array('status' => 'trash'), "id = {$id}");
    redirect_to("?mod=post");
  }


  // TÁC VỤ
  function put_the_posts_in_the_trash($id_list) {
    unset($id_list[0]);
    global $tbl_list_posts;
    $data = array(
      'status' => 'trash'
    );
    $where = "id in (". implode(",", $id_list) .")";
    db_update($tbl_list_posts, $data, $where);
    redirect_to("?mod=post");
  }
  
  function update_post_to_pending($id_list) {
    unset($id_list[0]);
    global $tbl_list_posts;
    $data = array(
      'status' => 'pending'
    );
    $where = "id in (". implode(",", $id_list) .")";
    db_update($tbl_list_posts, $data, $where);
    redirect_to("?mod=post");
  }
  
  function update_post_to_publish($id_list) {
    unset($id_list[0]);
    global $tbl_list_posts;
    $data = array(
      'status' => 'publish'
    );
    $where = "id in (". implode(",", $id_list) .")";
    db_update($tbl_list_posts, $data, $where);
    redirect_to("?mod=post");
  }

  function delete_posts_permanently($id_list) {
    unset($id_list[0]);
    global $tbl_list_posts;
    db_delete($tbl_list_posts, "id in (".implode(",", $id_list).") AND status = 'trash'");
    redirect_to("?mod=post");
  }



  // FILTER STATUS
  function get_num_posts_by_status($status = "") {
    global $tbl_list_posts;
    if (!empty($status)) {
      $query_string = "SELECT * FROM {$tbl_list_posts} WHERE status = '{$status}'";
      return db_num_rows($query_string);
    }
    $query_string = "SELECT * FROM {$tbl_list_posts}";
    return db_num_rows($query_string);
  }

  // EIDT AND REMOVE
  function get_post_by_id($id) {
    global $tbl_list_posts;
    $query_string = "SELECT * FROM {$tbl_list_posts} WHERE id = '{$id}'";
    return db_fetch_row($query_string);
  }
?>