<?php
  /** 
   * $page_length: Số lượng trang
   * $page_position: Vị trí trang: trang 1, 2, 3,...
   * $num_posts: Số lượng trang
   * output: html ul li pagination
  */
  function pagination($page_length, $page_position, $num_posts) {
    $num_pages = ceil($page_length/$num_posts);
    for ($i=1; $i <= $num_pages; $i++) { 
        echo "<li>";
        echo "<a href='blog/page-{$i}' title='page {$i}'>{$i}</a>";
        echo "</li>";
    }
  }
?>