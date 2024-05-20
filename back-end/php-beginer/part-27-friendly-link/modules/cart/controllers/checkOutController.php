<?php
  function construct() {
    load("helper", "cookie");
    load("helper", "format");
    load("helper", "url");
  };
  
  function indexAction() {
    load_view("checkOut");
  };
  
  


?>