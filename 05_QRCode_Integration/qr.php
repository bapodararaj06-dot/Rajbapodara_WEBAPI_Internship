<?php

include "phpqrcode/qrlib.php";

// URL of your video
$video_url = "http://localhost/project/video.mp4";

// Generate QR Code
QRcode::png($video_url);

?>