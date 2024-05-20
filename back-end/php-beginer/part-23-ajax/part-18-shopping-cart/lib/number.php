<?php
  function currency($number) {
    $number = (int)$number;
    return number_format($number, 0, ".", ".")."<sup>đ</sup>";
  }
?>