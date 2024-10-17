<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Toán tử số học trong file php</title>
    </head>
    <body>
        <?php
        $a = 10;
        $b = 5;

        $total = $a + $b;
        echo "{$a} + {$b} = {$total}";
        echo " <br>";
        $difference = $a - $b;
        echo "{$a} - {$b} = {$difference}";
        echo " <br>";
        $product = $a * $b;
        echo "{$a} * {$b} = {$product}";
        echo " <br>";
        ?>
    </body>
</html>