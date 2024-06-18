<?php
  function get_list_products() {
    global $tbl_list_products;
    $where = "WHERE";
    if(isset($_GET['comp_id'])) {
      $where .= " company_id = ". $_GET['comp_id'];
    }


    $limit = "";
    if (isset($_GET['page'])) {
      $limit .= "LIMIT 5 OFFSET {$_GET['page']}";
    } else {
      $limit .= "LIMIT 5 OFFSET 1";
    }

    if ($where == "WHERE") {
      $where = "";
    }
    

    $query_string = "SELECT * FROM {$tbl_list_products} {$where} {$limit}";
    return db_fetch_array($query_string);
  }

  function get_num_products() {
    global $tbl_list_products;
    $query_string = "SELECT id FROM {$tbl_list_products}";
    return db_num_rows($query_string);
  }

  function add_product($data) {
    global $tbl_list_products;
    db_insert($tbl_list_products, $data);
    redirect_to('?mod='.get_module());
  }
?>