<?php

include "phpqrcode/qrlib.php";

$video_url = "https://youtu.be/NejRUXCnjIE";

QRcode::png($video_url, "video_qr.png");

echo "QR Code Generated Successfully!";

?>