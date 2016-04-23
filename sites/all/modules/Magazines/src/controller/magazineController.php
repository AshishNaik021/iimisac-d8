<?php
$image = new Imagick();
$pdf = '/pdf/mypdf.pdf[0]';
$image = new Imagick($pdf);
$image->resizeImage( 200, 200, imagick::FILTER_LANCZOS, 0);
$image->setImageFormat( "png" );


$pdf = '/pdf/mypdf.pdf[0]';
$image = new Imagick($pdf);
$image->resizeImage( 200, 200, imagick::FILTER_LANCZOS, 0);
$image->setImageFormat( "png" );
 $thumbnail = $image->getImageBlob();
echo "<img src='image/png;base64,".base64_encode($thumbnail)."' /><br />";
?>