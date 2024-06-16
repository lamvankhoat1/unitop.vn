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

function resize_image($new_width, $new_height, $path) {
    $dir = pathinfo($path, PATHINFO_DIRNAME)."/resize";
    $base_name = pathinfo($path, PATHINFO_FILENAME)."-{$new_width}x{$new_height}";
    $type = pathinfo($path, PATHINFO_EXTENSION );
    $new_path = $dir."/".$base_name.".".$type;

    list($width, $height, $file_type) = getimagesize($path);
    
    $new_imag = imagecreatetruecolor($new_width, $new_height);
    $source = load_image($path, $file_type);

    imagecopyresized($new_imag, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    imagedestroy($new_imag);
    imagedestroy($source);
    // output
    return imagewebp($new_imag, $new_path);
}
?>