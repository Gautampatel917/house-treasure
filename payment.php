<?php
include('config/function.php');
$serviceName = $_SESSION['inquiry']['service_name'];
$totalCost = $_SESSION['inquiry']['service_price'];
$finalValue = str_replace(',', '', $totalCost);
$email = $_SESSION['inquiry']['email'];  // Example total cost
$advancePayment = $finalValue * 0.2;  // 20% advance payment

$query = "SELECT * FROM service_enquires WHERE email='$email' AND service_name ='$serviceName' LIMIT 1";
$result = mysqli_query($conn, $query);
if (!$result) {
    error_log("Query Error: " . mysqli_error($conn), 3, "error_log.txt");
    redirect('error.php', 'Failed. please try again later.');
}
$result = mysqli_fetch_assoc($result);
$serviceId = $result['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="assets/css/payment.css">
</head>

<body>
    <div class="payment-container">
        <h2>Payment Gateway</h2>
        <p>You are paying 20% advance for <strong>
                <?php echo $serviceName; ?>
            </strong></p>
        <p>Advance Payment Amount: ₹
            <?php echo number_format($advancePayment, 2); ?>
        </p>

        <form action="code.php" method="POST">
            <input type="hidden" name="service_id" value="<?php echo htmlspecialchars($serviceId); ?>">
            <input type="hidden" name="advance_amount" value="<?php echo htmlspecialchars($advancePayment); ?>">

            <div class="form-group">
                <label for="card-holder-name">Card Holder's Name</label>
                <input type="text" id="card_holder_name" name="card_holder_name" required>
            </div>

            <div class="form-group">
                <label for="card-number">Card Number</label>
                <input type="text" id="card_number" name="card_number" required pattern="\d{16}"
                    placeholder="1234 5678 9101 1121">
            </div>

            <div class="form-group">
                <label for="expiry-date">Expiry Date</label>
                <input type="text" id="expiry_date" name="expiry_date" required pattern="\d{2}/\d{2}"
                    placeholder="MM/YY">
            </div>

            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" required pattern="\d{3}" placeholder="123">
            </div>

            <button type="submit" name="paymentBtn">Pay ₹
                <?php echo number_format($advancePayment, 2); ?>
            </button>
            <a href="service-enquiry-delete.php?id=<?= $serviceId; ?>" class="cancelPayment" onclick="return confirm('Are you sure you want to cancel this payment?')">Cancel payment</a>
            <p class="note">Note: You can easily get a refund if required.</p>
        </form>
    </div>
</body>
<script src="assets/js/locomotive-scroll.js"></script>
<script src="assets/js/service-detail.js"></script>
<script src="assets/js/cdn.js"></script>

</html>