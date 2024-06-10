<?php
    function get_list_cats() {
        global $tbl_list_cats;
        $query_string = "SELECT * FROM {$tbl_list_cats}";
        return db_fetch_array($query_string);
    }
    function add_cat($data){
        global $tbl_list_cats;
        db_insert($tbl_list_cats, $data);
        redirect_to("?mod=product&controller=list_cat");
    }
?>