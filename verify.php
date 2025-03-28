<?php

    session_start();

                                   // Include the Razorpay PHP SDK
    require 'vendor/autoload.php'; // Adjust the path if necessary

    use Razorpay\Api\Api;
    use Razorpay\Api\Errors\SignatureVerificationError; // Import the SignatureVerificationError class

                                             // Set your Razorpay API key and secret
    $apiKey    = 'YOUR_RAZORPAY_API_KEY';    // Replace with your Razorpay API Key
    $apiSecret = 'YOUR_RAZORPAY_API_SECRET'; // Replace with your Razorpay API Secret

    // Initialize Razorpay API
    $api = new Api($apiKey, $apiSecret);

    $success = true;
    $status  = 'success';
    $error   = "Payment Failed";
    $message = ""; // Initialize the message variable

    if (! empty($_POST['razorpay_payment_id'])) {
        try {
            // Verify payment signature
            $attributes = [
                'razorpay_order_id'   => $_SESSION['razorpay_order_id'],
                'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                'razorpay_signature'  => $_POST['razorpay_signature'],
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Payment is successful, update payment status
            $paymentTxnsId  = $attributes['razorpay_payment_id'];
            $paymentOrderId = $attributes['razorpay_order_id'];

            // Update payment status in the database
            $query   = "UPDATE payment_transaction SET status = 'Confirmed', txns_id = '$paymentTxnsId' WHERE order_id = '$paymentOrderId'";
            $execute = $con->query($query);

            if ($execute) {
                $message = "<div class='col-md-8 offset-2 message'>
                        <div class='alert alert-success alert-dismissible'>
                        Your payment was successful
                        </div>
                        </div>
                        <p class='message'><strong>Payment ID:</strong> {$paymentTxnsId}<br>
                        Continue Shopping <a href='index.php'>Home Page</a>
                        </p>";
            } else {
                $message = "Error updating payment status.";
            }
        } catch (SignatureVerificationError $e) {
            $success = false;
            $status  = 'failed';
            $error   = 'Razorpay Error: ' . $e->getMessage();
        }
    }

    // If payment was not successful, set the error message
    if (! $success) {
        $message = "<div class='col-md-8 offset-2 message'>
                <div class='alert alert-danger alert-dismissible'>
                Your payment failed
                </div>
                </div>
                <p>{$error}<br>Continue Shopping <a href='index.php'>Home Page</a></p>";
    }
?>
// Echo the message
<?php echo $message; ?>
<script>function verifyPayment($reference)
{
    $url = 'https://api.yourpaymentgateway.com/verify/' . $reference; // Update with your payment gateway URL
    $ch  = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer your_secret_key']); // Update with your secret key

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    // Check if the response indicates a successful payment
    if (isset($result['data']['status']) && $result['data']['status'] === 'success') {
        return 'successful';
    } else {
        return 'pending'; // Or handle other statuses as needed
    }
}
</script>
