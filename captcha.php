<?php
session_start();
header("Content-Type: image/png");

$image = imagecreatetruecolor(120, 40);
$bgColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);

imagefilledrectangle($image, 0, 0, 120, 40, $bgColor);

$captcha_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 6);
$_SESSION['captcha_code'] = $captcha_code;

imagestring($image, 5, 10, 10, $captcha_code, $textColor);

imagepng($image);
imagedestroy($image);
?>