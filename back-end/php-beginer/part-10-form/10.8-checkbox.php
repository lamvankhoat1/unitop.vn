<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckBox</title>
</head>
<body>

    <?php
      // http://localhost/unitop.vn\back-end\php-beginer\part-10-form\10.8-checkbox.php
      if (isset($_POST['btn_reg'])) {
        if (isset($_POST['rules'])) {
          $rules= $_POST['rules'];
          echo "{$rules}";
        } else {
            echo "Vui lòng đọc và xác thực điều khoản";
        }
      }
    ?>
    <form action="" method="post">
        <p style="width: 400px; height: 100px; overflow-y: scroll">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi dolores dolor corrupti eius eaque sed! Maxime at sed aut, ab dicta blanditiis quaerat iste, nostrum autem, totam voluptatibus et odio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, aspernatur? Cumque tempora officiis eum corporis provident nihil laborum. Fugit accusamus ipsum maiores est ab, iste adipisci, veritatis, reiciendis doloremque ducimus tempora temporibus. Error blanditiis dolorum quae quo consequuntur quidem magni doloribus necessitatibus odit fuga cum perferendis iste, voluptatem dicta repellendus, eos dolore atque vero nulla mollitia animi! Ipsam sit reprehenderit sint, totam necessitatibus nisi dicta obcaecati, cum quos officiis nam tenetur! A id similique rem, quod dolore quibusdam laudantium ut nulla sunt ad exercitationem natus corporis corrupti eaque! Quisquam animi autem maxime dolores in sit quia aliquam iure repellendus rerum, aut, voluptatem veniam ipsum reiciendis similique at ab ipsam placeat. Voluptatibus ullam quis illum porro! Sit, ab. Dolorem, tenetur! Enim vitae, facilis, provident, velit error perspiciatis quisquam dolores maxime earum autem quia unde? Recusandae labore aut nisi provident. Ipsum consectetur eum repellendus rerum. Quaerat tempora molestias a, vero non quasi ex repellat exercitationem aliquam officiis autem. Voluptatibus maiores placeat consequatur quos ducimus debitis sit autem, magni soluta dolor aut harum iste, nulla officiis labore culpa odio cupiditate alias ad, nobis nesciunt possimus adipisci saepe. Vero fugit, saepe tempore perferendis sint officia reiciendis quo quisquam vel corporis quia aspernatur labore accusamus ad. Veritatis aut doloribus ipsam ad sequi dolores veniam suscipit corporis? Vitae, illo quasi expedita quas obcaecati deserunt odio tempore. Rem voluptate similique maiores eius fugiat harum perspiciatis! Nesciunt, eaque saepe, natus deserunt consequuntur animi corrupti similique ab earum repellendus ipsam impedit accusamus adipisci perferendis dignissimos, quasi repellat sapiente velit recusandae laborum commodi! Quisquam ab facere at voluptates illo. Sunt pariatur soluta doloremque quia odit quis. Autem accusantium tenetur nulla modi fugiat minus corporis, eligendi odio, ratione amet quaerat voluptatem officiis nam soluta at! Necessitatibus animi voluptatum cumque omnis, consectetur aliquid, recusandae odit quia provident commodi quisquam enim, hic atque.
        </p>
        <label><input type="checkbox" name="rules" id="" value="yes">Tôi đã đọc và đồng ý</label><br>
        <input type="submit" value="Đăng ký" name="btn_reg">
    </form>
</body>
</html>