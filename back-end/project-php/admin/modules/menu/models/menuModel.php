<?php
    function add_menu($data) {
        global $tbl_list_menu;
        db_insert($tbl_list_menu, $data);
    }

    function delete_menu($id) {
        global $tbl_list_menu;
        $where = "id = {$id}";
        db_delete($tbl_list_menu, $where);
    }

    function delete_many_items_menu($id_list_string) {
        global $tbl_list_menu;
        $where = "id IN ({$id_list_string})";
        db_delete($tbl_list_menu, $where);
    }

    function update_menu($data) {
        global $tbl_list_menu;
        $where = "id = {$data['id']}";
        db_update($tbl_list_menu, $data, $where);
    }

    function get_list_menu() {
        global $tbl_list_menu;
        $query_string = "SELECT * FROM {$tbl_list_menu} ORDER BY `order_item` ASC";
        return db_fetch_array($query_string);
    }
?>