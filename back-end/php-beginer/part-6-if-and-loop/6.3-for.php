<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vòng lặp For</title>
</head>

<body>
    <?php
      $t = 0;
      for ($i=0; $i <= 10; $i+=2) { 
        $t += $i;
      }
      echo "{$t}";
    ?>
</body>

</html>