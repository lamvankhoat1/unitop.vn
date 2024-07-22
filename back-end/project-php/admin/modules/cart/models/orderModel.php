<?php
    function get_list_orders() {
      global $tbl_list_orders;
      $query_string = "SELECT `id`, `email`, `fullname`, `address`, `list_orders`, `status_orders`, `ordered_time` FROM {$tbl_list_orders}";
      return db_fetch_array($query_string);
    }

    function get_order_by_id($id) {
      global $tbl_list_orders;
      $query_string = "SELECT `address`, `phone`, `list_orders`, `payment_method`, `status_orders`, `fullname`, `email` FROM {$tbl_list_orders} WHERE id = {$id}";
      return db_fetch_row($query_string);
    }
?>