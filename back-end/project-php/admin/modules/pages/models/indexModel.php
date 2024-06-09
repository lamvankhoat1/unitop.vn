<?php
  function add_page($data) {
    global $tbl_list_pages;
    db_insert($tbl_list_pages, $data);
    redirect_to("?mod=pages");
  }
?>