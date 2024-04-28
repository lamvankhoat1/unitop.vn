<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập phần 6</title>
</head>
<body>
    <?php
    //   BÀI TẬP PHẦN 6	
    //   1. Tính tổng các số chẵn từ 1 đền n(n>=2)	
    //   T1 = 2 + 4 + 6 + .. + n	
    //   2. Tính tổng nghịch đảo các số chia hết cho 3 từ 3 đến n(n>=3)	
    //   T2 = ⅓ + 1/6 + ... + 1/n	
    //   3. Tính tổng chuỗi	
    //   T3 = 1/2 + 2/3 + 3/4 +	... n/n+1 (n>=1)	
    //   4. Giải phương trình bậc 2	

        # BÀI TẤP 1
        $n = 15; $t1 = 0;
        for ($i=0; $i <= $n; $i+=2) { 
            $t1 += $i;
        }
        echo "{$t1} <br>";
        # BÀI TẬP 2
        $n = 21; $t2 = 0;
        for ($i=3; $i <= $n; $i+=3) { 
            $t2 += 1/$i;
        }
        echo "{$t2} <br>";
        # BÀI TẬP 3
        $n = 15; $t3 = 0;
        for ($i=0; $i <= $n; $i++) { 
            $t3 += $i/($i+1);
        }
        echo "{$t3} <br>";
        # BÀI TẬP 4
        $a = 1; $b = 5; $c = 3;
        $delta = pow($b, 2) - 4*$a*$c;
        if ($delta < 0) {
            echo "Phương trình vô nghiệm <br>";
        } elseif ($delta == 0) {
            echo "Phương trình có 1 nghiệm <br>";
        } else {
            echo "Phương trình có 2 nghiệm <br>";
        }
    ?>
</body>
</html>