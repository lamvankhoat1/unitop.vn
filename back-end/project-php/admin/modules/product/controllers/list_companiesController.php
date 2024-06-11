<?php
    function construct() {
      load("lib", "validation");
      load("helper", "url");
      load_model("companies");
    };
  
    function indexAction() {
      $data = array(
        'list_companies' => get_list_companies(),
      );
      load_view("list_companies", $data);
    };

    function addAction() {
        buttonAddCompanyClicked();
        load_view("add_company");
    };

    function buttonAddCompanyClicked() {
      if (isset($_POST['btn-add-submit'])) {
        $error = array();
        $data = array();
        if (is_not_empty('name')) {
            $data['name'] = get_value('name');
        } else {
            set_error_empty('name');
        }
        
        if(is_not_error()) {
            add_company($data);
        }
      }
    };
    
    function editAction() {
      buttonUpdateCompanyClicked();
      $data = array(
        'comp' => get_company_from_id($_GET['id']),
      );
      load_view("edit_company", $data);
    };

    function buttonUpdateCompanyClicked() {
      if (isset($_POST['btn-update-submit'])) {
        $error = array();
        $data = array();
        if (is_not_empty('name')) {
            $data['name'] = get_value('name');
        } else {
            set_error_empty('name');
        }
        
        if(is_not_error()) {
            update_company($data, $_GET['id']);
        }
      }
    }

    function deleteAction() {
      delete_company($_GET['id']);
    };
    
    
    
    
    
    
?>