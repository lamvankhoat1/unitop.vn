<?php
    function addOrder($data) {
      global $tbl_list_orders;
      $table = $tbl_list_orders;
      db_insert($table, $data);
    }
?>