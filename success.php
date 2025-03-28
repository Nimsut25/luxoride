
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 20px;
            border-radius: 5px;
            display: inline-block;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .txtbox4 {
    background-color: #4CAF50; /* Green background */
    border: none; /* Remove border */
    color: white; /* White text */
    padding: 10px 20px; /* Add some padding */
    text-align: center; /* Center the text */
    text-decoration: none; /* Remove underline */
    display: inline-block; /* Make it an inline-block element */
    font-size: 16px; /* Increase font size */
    margin: 4px 2px; /* Add some margin */
    cursor: pointer; /* Pointer cursor on hover */
    border-radius: 5px; /* Rounded corners */
    transition: background-color 0.3s; /* Smooth transition for background color */
}

.txtbox4:hover {
    background-color: #45a049; /* Darker green on hover */
}

.txtbox4:active {
    background-color: #3e8e41; /* Even darker green when clicked */
}
    </style>
</head>
<?php

    // Check if the payment was successful
    // You can set a session variable or a query parameter to indicate success
    if (! isset($_SESSION['payment_success']) || $_SESSION['payment_success'] !== true) {
                              // Redirect to an error page or home page if payment was not successful
        header("Location: "); // Change to your home page or error page

    }

    // Clear the session variable after use
    unset($_SESSION['payment_success']);
    // Assuming this is after the loop in my-booking.php

?>

<body>
<div class="success-message">
    <h1>Payment Successful!</h1>
    <p>Thank you for your Payment.</p>
    <p>You will receive a confirmation email shortly.</p>

    <h4 style="color:red">Booking Details</h4>
    <?php
        // Start the session at the beginning of the script
    ?>

    <?php
        session_start();

        if (! empty($_SESSION['bookings'])):
    ?>
        <table>
            <tr>
                <th>Booking No</th>
                <th>Car</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Total Days</th>
                <th>Rent / Day</th>
                <th>Grand Total</th>
                <th>Car Image</th>
            </tr>
            <?php
                $totalAmount = 0; // Initialize total amount
                foreach ($_SESSION['bookings'] as $booking):
                    $totalAmount += $booking['grand_total']; // Sum up the grand totals
                ?>
																				                <tr>
																				                    <td><?php echo htmlspecialchars($booking['booking_number']); ?></td>
																				                    <td><?php echo htmlspecialchars($booking['car_title'] . ', ' . $booking['car_brand']); ?></td>
																				                    <td><?php echo htmlspecialchars($booking['from_date']); ?></td>
																				                    <td><?php echo htmlspecialchars($booking['to_date']); ?></td>
																				                    <td><?php echo htmlspecialchars($booking['total_days']); ?></td>
																				                    <td><?php echo htmlspecialchars($booking['price_per_day']); ?></td>
																				                    <td><?php echo htmlspecialchars($booking['grand_total']); ?></td>
																				                    <td><img src="assets/images/carimages/<?php echo htmlspecialchars($booking['car_image']); ?>" alt="image" style="width: 100px;"></td>
																				                </tr>
																				            <?php endforeach; ?>
                                                </table>
                                                <?php
                                                    // Clear session variables after displaying the bookings
                                                    unset($_SESSION['bookings']);
                                                ?>
<?php else: ?>
    <p>No bookings found.</p>
    <?php endif; ?>

    <h4 style="text-align:center;">Total Amount:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo htmlspecialchars($totalAmount); ?></h4>

    <form method="post" onsubmit="return f3();">
    <input name="Submit2" type="submit" class="txtbox4" value="Download Receipt" style="cursor: pointer;" onclick="redirectToHome();" />
</form>

<script>
function f3() {
    window.print();
    // Your existing logic for f3
    // Return true if you want to proceed with the form submission
    return true; // or false if you want to prevent submission
}

function redirectToHome() {
    // Redirect to the home page after a short delay to allow form submission
    setTimeout(function() {
        window.location.href = 'index.php'; // Change 'home.html' to your actual home page URL
    }, 100); // Adjust the delay as needed
}
</script>
    <a href="index.php" class="btn">Home</a> <!-- Change to your home page -->
    <a href="my-booking.php" class="btn">My Booking</a> <!-- Change to your home page -->
</div>
</body>
</html>
