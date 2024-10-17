<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bài tập phần 6</title>
    </head>
    <body>
        <?php
        $a = 1;
        $b = 15;
        $c = 3;
        $x1 = 0;
        $x2 = 0;
        $delta = pow($b, 2) - 4 * $a * $c;
        if ($delta < 0) {
            echo 'Phương trình vô nghiệm';
        } elseif ($delta == 0) {
            $x1 = -$b / (2 * $a);
            echo 'Phương trình có nghiệm kép, x = {$x1}';
        } else {
            $x1 = (-$b + sqrt($delta)) / (2 * $a);
            $x2 = (-$b - sqrt($delta)) / (2 * $a);
            echo "Phương trình có 2 nghiệm, x1 = {$x1}; x2 = {$x2}";
        }
        ?>
    </body>
</html>
