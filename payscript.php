<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Checkout</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        /* CSS styles for the buttons */
        .btn {
            color: white; /* White text */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            padding: 12px 20px; /* Vertical and horizontal padding */
            font-size: 16px; /* Font size */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s, transform 0.2s; /* Smooth transition for hover effects */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            margin: 10px; /* Margin between buttons */
        }

        #checkoutButton {
            background-color: #F37254; /* Razorpay theme color */
        }

        #checkoutButton:hover {
            background-color: #D65F43; /* Darker shade on hover */
            transform: scale(1.05); /* Slightly enlarge the button on hover */
        }

        #checkoutButton:active {
            background-color: #C94D3A; /* Even darker shade when clicked */
            transform: scale(0.95); /* Slightly shrink the button when clicked */
        }

        #codButton {
            background-color: #007bff; /* Blue color for Cash on Delivery */
        }

        #codButton:hover {
            background-color: #0056b3; /* Darker blue on hover */
            transform: scale(1.05); /* Slightly enlarge the button on hover */
        }

        #codButton:active {
            background-color: #004085; /* Even darker blue when clicked */
            transform: scale(0.95); /* Slightly shrink the button when clicked */
        }
    </style>
</head>
<body>

    <button id="checkoutButton" class="btn" onclick="redirectToCheckout()">Pay with Razorpay</button>
    <button id="codButton" class="btn" onclick="redirectToSuccess()">Cash on Delivery</button>
    <?php
    $api = "rzp_test_NB7x5W62Lxw6mO"; ?>


    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function redirectToCheckout() {
            var options = {
                key: "<?php echo $api; ?>", // Your Razorpay API key
                amount: "<?php echo $_POST['amount'] * 100; ?>", // Amount in paise
                currency: "INR", // Currency code
                name: "LuxoRide", // Company name
                description: "Car Rental", // Description
                image: "https://example.com/your_logo.jpg", // Logo URL
                prefill: {
                    name: "<?php echo $_POST['name']; ?>", // Customer name
                    email: "<?php echo $_POST['email']; ?>", // Customer email
                    contact: "<?php echo $_POST['number']; ?>" // Customer contact number
                },
                theme: {
                    color: "#F37254" // Theme color
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
        }

        function redirectToSuccess() {
            window.location.href = "success.php"; // Redirect to success.php
        }
    </script>

</body>
</html>