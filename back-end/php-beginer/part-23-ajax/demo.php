<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <title>Làm việc với AJAX</title>
</head>
<body>
    <div id="wrapper">
        Giá: <span class="price">10</span><br>
        Số lượng: <input type="number" name="num_order" id="num_order" min="0" value=0><hr>
        Thành tiền: <span class="result">0</span>
    </div>

    <script>
        $(document).ready(function(){
            $("#num_order").change(function(){                
                let price = $(".price").text();
                let num_order = $("#num_order").val();
                ajax_price(price, num_order);
          });

        })

        function ajax_price(price, num_order) {
            $.ajax({
                url: 'process.php',
                method: 'POST',
                data: {price: price, num_order: num_order},
                dataType: 'text',
                success: function(result) {
                    console.log(`result`, result);
                    $(".result").text(result);
                }
            })
        }

    </script>
</body>
</html>