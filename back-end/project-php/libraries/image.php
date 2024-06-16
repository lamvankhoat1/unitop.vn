<?php
  function image_info($path) {
    list($width, $height, $type, $attr) = getimagesize($path); 
   
    // Displaying dimensions of the image 
    echo "Width of image : " . $width . "<br>"; 
    
    echo "Height of image : " . $height . "<br>"; 
    
    echo "Image type :" . $type . "<br>"; 
    
    echo "Image attribute :" .$attr; 
  }

  function load_image($filename, $type) {
    if( $type == IMAGETYPE_JPEG ) {
        $image = imagecreatefromjpeg($filename);
    }
    elseif( $type == IMAGETYPE_PNG ) {
        $image = imagecreatefrompng($filename);
    }
    elseif( $type == IMAGETYPE_GIF ) {
        $image = imagecreatefromgif($filename); 
    }
    elseif( $type == 18 ) {
        $image = imagecreatefromwebp($filename); 
    }
    
    return $image;
}

function scale_image($scale, $image, $width, $height, $path) {
    $new_width = $width * $scale;
    $new_height = $height * $scale;
    return resize_image($new_width, $new_height, $image, $width, $height, $path);

}
function resize_image($new_width, $new_height, $image, $width, $height, $path) {
    $dir = pathinfo($path, PATHINFO_DIRNAME);
    $base_name = pathinfo($path, PATHINFO_BASENAME)."-{$width}x{$height}";
    $type = pathinfo($path, PATHINFO_EXTENSION );
    
    $new_path = $dir.$base_name.".".$type;
    $new_imag = imagecreatetruecolor($new_width, $new_height);
    imagecopyresized($new_imag, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    return imagejpeg($new_imag, $new_path);
}

// $filename = "panda.jpeg";
// list($width, $height, $type) = getimagesize($filename);
// $old_image = load_image($filename, $type);
// $image_scaled = scale_image(0.8, $old_image, $width, $height);
?>