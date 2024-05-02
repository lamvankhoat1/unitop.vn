<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1</title>
</head>
<body>
    <?php
    // http://localhost\unitop.vn\back-end\php-beginer\part-8-function\ex1.php
      function total_prime($n) {
        $total = 0;
        for ($i=1; $i <= $n; $i++) { 
            echo check_prime($i)  . " - ";
            $total += check_prime($i);
        };
        return $total;
      };

      function check_prime($number) {
        if ($number == 1 || $number == 0) {
            return 0;
        };
        if ($number == 2 || $number == 3) {
            return $number;
        };
        for ($i=2; $i < $number; $i++) { 
            if($number % $i == 0) {
                return 0;
            }
        }
        return $number;
      }

      echo total_prime(11);
    ?>
</body>
</html>