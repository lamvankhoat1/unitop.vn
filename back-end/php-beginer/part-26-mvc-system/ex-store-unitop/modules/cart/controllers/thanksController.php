<?php
  function construct() {
    load("helper", "format");
    load("helper", "cookie");
  };
  
  function indexAction() {
    load_view("thanks");
  };
  
  
?>