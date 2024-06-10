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

    function update_cat($data, $id){
        global $tbl_list_cats;
        db_update($tbl_list_cats, $data, "id = {$id}");
        redirect_to("?mod=product&controller=list_cat");
    }

    function delete_cat($id){
        global $tbl_list_cats;
        db_delete($tbl_list_cats, "id = {$id}");
        redirect_to("?mod=product&controller=list_cat");
    }
        
    function get_cat_by_id($id) {
        global $tbl_list_cats;
        $query_string = "SELECT * FROM {$tbl_list_cats} WHERE id = {$id}";
        return db_fetch_row($query_string);
    }
?>