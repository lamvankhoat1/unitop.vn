<?php
  function currency($number) {
    return number_format($number, 0, ",", ".");
  }
?>