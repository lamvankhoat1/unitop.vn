<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tham số hàm nâng cao</title>
</head>

<body>
    <?php
    // http://localhost/unitop.vn\back-end\php-beginer\part-8-function\8.3-advance-arg.php
      function sum_multi_numbers() {
        $total = 0;
        foreach (func_get_args() as $value) {
            $total += $value;
        }
        echo "{$total}";
      };

      function create_input_text($name, $value, $option = array()) {
        $name = func_get_arg(0);
        $value = func_get_arg(1);
        $option = func_get_arg(2);

        if (!empty($option)) {
          $id = $option['id'];
          $class = $option['class'];
        }

        $html = "<input type='text' name='{$name}' value='{$value}' class='{$class}' id='{$id}'>";
        echo "{$html}";
      }

        // call function
        create_input_text('username', '', $option = array('id' => 'username', 'class' => 'form_input'))
    ?>
</body>

</html>