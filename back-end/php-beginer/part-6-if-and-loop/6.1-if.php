<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu lệnh If</title>
</head>
<body>
    <?php
      // ===============
      // CẤU TRÚC ĐIỀU KHIỂN IF
      // ===============

      # IF
      $a = 10;
      if ($a % 2 == 0) {
        echo "{$a} là số chẵn <br>";
      }

      # IF ELSE
      $b = 21;
      if ($b % 2 == 0) {
        echo "{$b} là số chẵn";
      } else {
        echo "{$b} là số lẽ";
      }
      echo "<br>";
      
      # IF ELSE IF ELSE
      $point = 7;
      if ($point < 4) {
        echo "F";
      } elseif ($point < 5.5) {
        echo "D";
      } elseif ($point < 7) {
        echo "C";  
      } elseif ($point < 8.5) {
        echo "B";
      } else {
        echo "A";
      }
      echo "<br>";

      #CẤU TRÚC LỒNG NHAU
      $score = 9;
      if (0 <= $score && $score <= 10) {
          if ($score < 4) {
            echo "F";
          } elseif ($score < 5.5) {
            echo "D";
          } elseif ($score < 7) {
            echo "C";  
          } elseif ($score < 8.5) {
            echo "B";
          } else {
            echo "A";
          }
      } else {
        echo "Dữ liệu không hợp lệ";
      }
      echo "<br>";
    ?>
</body>
</html>