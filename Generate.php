<?php
$upi = $_GET['upi'] ?? '';
$offer_id = $_GET['offer_id'] ?? '';

if ($upi && $offer_id) {
    $link = "https://yourdomain.com/submit.php?camp_id={$offer_id}&ref={$upi}";
    echo "Your referral link: <a href='$link' target='_blank'>$link</a>";
} else {
    echo "Invalid input.";
}
?>
