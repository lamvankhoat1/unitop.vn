<?php
  function get_post_by_id($id) {
    return db_fetch_row("SELECT * FROM `tbl_post` WHERE `id` = ".$id);
  }
?>