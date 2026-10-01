 
<?php
function compressedImage($source, $destination, $quality) {
    list( $width, $height, $type, $attr ) = getimagesize($source);
    $quality = $quality > 9 ? 5 : $quality;

    switch (image_type_to_mime_type($type)) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            imagejpeg($image, $destination, 100);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            $bck = imagecolorallocate($image, 0, 0, 0);
            imagecolortransparent($image, $bck);
            imagealphablending($image, false);
            imagesavealpha($image, true);
            imagepng($image, $destination, 9);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            imagejpeg($image, $destination, 100);
            break;
        default:
            exit($type);
            break;
    }
    imagedestroy($image);
}

?>