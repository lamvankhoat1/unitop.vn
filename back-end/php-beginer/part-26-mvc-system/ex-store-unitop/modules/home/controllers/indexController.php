<?php
    function construct() {
        load_model('index');
        load("helper", "cookie");
    }

    function indexAction() {
        load("helper", "format");
        $list_product_cat_1 = get_list_product_by_cat_id(1);
        $list_product_cat_2 = get_list_product_by_cat_id(2);
        load_view("index", array(
            'list_product_cat_1' => $list_product_cat_1,
            'list_product_cat_2' => $list_product_cat_2
        ));
    }
?>