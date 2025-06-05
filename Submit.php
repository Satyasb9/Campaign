<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_upi = $_POST['upi'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $camp_id = $_POST['camp_id'] ?? '';
    $ref = $_POST['ref'] ?? '';
    $click_id = uniqid("click_");
    $click_ip = $_SERVER['REMOTE_ADDR'];

    // Postback URL
    $url = "https://example.com/postback?clickid=$click_id&pubid=$ref&offerid=$camp_id&p1=$user_upi&p2=$ref";

    // Send GET request to advertiser
    file_get_contents($url);

    // Save to log file
    $log = "click_id=$click_id, upi=$user_upi, phone=$phone, ref=$ref, ip=$click_ip\n";
    file_put_contents("log.txt", $log, FILE_APPEND);

    echo "Thanks! Your details have been submitted.";
    exit;
}

$camp_id = $_GET['camp_id'] ?? '';
$ref = $_GET['ref'] ?? '';
?>

<!DOCTYPE html>
<html>
<head><title>Submit Details</title></head>
<body>
    <h2>Submit Your Details</h2>
    <form method="POST">
        <input type="hidden" name="camp_id" value="<?= $camp_id ?>">
        <input type="hidden" name="ref" value="<?= $ref ?>">
        <label>Your UPI ID:</label><br>
        <input type="text" name="upi" required><br><br>
        <label>Your Phone Number:</label><br>
        <input type="text" name="phone" required><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
