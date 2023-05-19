<?php
session_start();

// Generate a random CAPTCHA code
$code = substr(md5(mt_rand()), 0, 6);

// Store the CAPTCHA code in the session
$_SESSION['CAPTCHA_CODE'] = $code;

// Set the content-type header
header('Content-Type: image/png');

// Create a blank image with a white background
$image = imagecreatetruecolor(120, 40);
$bgColor = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image, 0, 0, 120, 40, $bgColor);

// Add randomly generated dots to the image
$dotColor = imagecolorallocate($image, 200, 200, 200);
for ($i = 0; $i < 100; $i++) {
    imagesetpixel($image, mt_rand(0, 120), mt_rand(0, 40), $dotColor);
}

// Add randomly generated lines to the image
$lineColor = imagecolorallocate($image, 220, 220, 220);
for ($i = 0; $i < 4; $i++) {
    imageline($image, 0, mt_rand(0, 40), 120, mt_rand(0, 40), $lineColor);
}

// Add the CAPTCHA code to the image
$textColor = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 5, 30, 12, $code, $textColor);

// Output the image as PNG
imagepng($image);

// Clean up
imagedestroy($image);
?>
