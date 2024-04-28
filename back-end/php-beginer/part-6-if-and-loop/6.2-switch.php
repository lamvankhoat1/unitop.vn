<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch</title>
</head>

<body>
    <?php
      $day = 8;
      switch ($day) {
        case 2:
            echo "Thứ Hai";
            break;
        case 3:
            echo "Thứ 3";
            break;
        case 4:
            echo "Thứ 4";
            break;
        case 5:
            echo "Thứ 5";
            break;
        case 6:
            echo "Thứ 6";
            break;
        case 7:
            echo "Thứ 7";
            break;            
        default:
            echo "CN";
            break;
      }
    ?>
</body>

</html>