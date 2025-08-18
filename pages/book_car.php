<?php
include("../config/db.php");
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_POST['car_id'])) {
    echo "Invalid request.";
    exit;
}

$user_id = (int)$_SESSION['uid'];
$car_id  = (int)$_POST['car_id'];

// For simplicity: 1 day rental (today → tomorrow)
$start_date = date('Y-m-d');
$end_date   = date('Y-m-d', strtotime('+1 day'));

// Get daily rate
$stmt = $con->prepare("SELECT daily_rate FROM cars WHERE id = ?");
$stmt->bind_param("i", $car_id);
$stmt->execute();
$stmt->bind_result($daily_rate);
$stmt->fetch();
$stmt->close();

if ($daily_rate === null) {
    echo "Car not found.";
    exit;
}

// Amount in paisa if/when using real gateway (PhonePe expects smallest unit)
$total_amount_paisa = (int)round($daily_rate * 100);

// Generate transaction/order id
$transaction_id = "TXN" . time() . rand(1000, 9999);

// Save pending booking in session (used by payment + callback)
$_SESSION['pending_booking'] = [
    "transaction_id" => $transaction_id,
    "user_id"        => $user_id,
    "car_id"         => $car_id,
    "start_date"     => $start_date,
    "end_date"       => $end_date,
    "amount_paisa"   => $total_amount_paisa
];

/**
 * If you have real PhonePe keys later, set these.
 * For now keep them empty to use the mock flow.
 */
$PHONEPE_MERCHANT_ID = "";   // e.g. "PGTESTPAYUAT"
$PHONEPE_SALT_KEY    = "";   // e.g. "xxxxx"
$PHONEPE_SALT_INDEX  = "1";  // usually "1"
$CALLBACK_URL        = "http://yourdomain.com/payment_callback.php"; // change domain when live

$have_real_keys = $PHONEPE_MERCHANT_ID !== "" && $PHONEPE_SALT_KEY !== "";

if (!$have_real_keys) {
    // No keys → use mock page
    header("Location: mock_pay.php");
    exit;
}

/* ===== Real PhonePe flow (keep for later when keys are available) ===== */
$payload = [
    "merchantId"            => $PHONEPE_MERCHANT_ID,
    "merchantTransactionId" => $transaction_id,
    "merchantUserId"        => (string)$user_id,
    "amount"                => $total_amount_paisa,
    "redirectUrl"           => $CALLBACK_URL,
    "redirectMode"          => "POST",
    "callbackUrl"           => $CALLBACK_URL,
    "paymentInstrument"     => ["type" => "PAY_PAGE"]
];

$json_payload = json_encode($payload);
$base64       = base64_encode($json_payload);
$sha256       = hash("sha256", $base64 . "/pg/v1/pay" . $PHONEPE_SALT_KEY);
$finalXHeader = $sha256 . "###" . $PHONEPE_SALT_INDEX;

// Sandbox endpoint (switch to live when ready)
$url = "https://api.phonepe.com/apis/pg-sandbox/pg/v1/pay";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "X-VERIFY: $finalXHeader"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(["request" => $base64]));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
if (isset($result['data']['instrumentResponse']['redirectInfo']['url'])) {
    header("Location: " . $result['data']['instrumentResponse']['redirectInfo']['url']);
    exit;
}

echo "Error creating payment: " . htmlspecialchars($response);
