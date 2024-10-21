<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập số 1</title>
</head>

<body>
    <?php
      // check prime
      function check_prime($number) {
        if ($number == 1) {
          return false;
        }
        if ($number == 2) {
          return true;
        }
        for ($i=2; $i < $number; $i++) { 
          if ($number % $i == 0) {
            return false;
          }
        }
        return true;
      }

      echo check_prime(5);
    ?>
</body>

</html>