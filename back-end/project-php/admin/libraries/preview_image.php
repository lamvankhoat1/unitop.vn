<?php
  function preview_image_from_input($css, $css_preview) {  ?>
    <script>
        $(document).ready(function(){
            let img_url = $("#url-thumb");
            img_url.change(function(){
              $("<?php echo $css_preview; ?>").get(0).src = img_url.val();
            });
            

            let img_upload = $("<?php echo $css; ?>");
            img_upload.change(function(){
              let url = URL.createObjectURL(img_upload.get(0).files[0]);
              $("<?php echo $css_preview; ?>").get(0).src = url;
            })
        })
    </script>
  <?php  }
?>
