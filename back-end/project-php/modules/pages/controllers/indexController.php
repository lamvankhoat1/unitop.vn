<?php
    function construct() {
      load_model("index");
    };
  
    function indexAction() {
        $id= $_GET['id'];
        $data = array(
            'page' => get_page_by_id($id),
        );
      load_view("detail", $data);
    };
?>