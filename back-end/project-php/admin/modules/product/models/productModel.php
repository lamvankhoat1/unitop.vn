<?php
  function get_list_products() {
    global $tbl_list_products;
    $where = "WHERE";
    if(isset($_GET['comp_id'])) {
      $where .= " company_id = ". $_GET['comp_id'];
    }

    if ($where == "WHERE") {
      $where = "";
    }

    $query_string = "SELECT * FROM {$tbl_list_products} {$where}";
    return db_fetch_array($query_string);
  }
  function add_product($data) {
    global $tbl_list_products;
    db_insert($tbl_list_products, $data);
    redirect_to('?mod='.get_module());
  }
?>