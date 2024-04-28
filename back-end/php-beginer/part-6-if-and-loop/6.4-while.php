<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While</title>
</head>
<body>
    <?php
      $t = 0;
      $i = 0;
      while ($i <= 10) {
        $t += $i;
        $i += 2;
      }
      echo "{$t}";
    ?>
</body>
</html>