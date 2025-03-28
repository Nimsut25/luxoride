<?php
session_start();
include 'includes/config.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $useremail      = $_SESSION['login'];
    $booking_number = $_POST['booking_number'];

    // Prepare the SQL statement to delete the booking
    $sql   = "DELETE FROM tblbooking WHERE BookingNumber = :booking_number AND userEmail = :useremail";
    $query = $dbh->prepare($sql);
    $query->bindParam(':booking_number', $booking_number, PDO::PARAM_STR);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);

    if ($query->execute()) {
        // Redirect back to the bookings page with a success message
        header("Location: my-booking.php?msg=Booking removed successfully");
    } else {
        // Redirect back with an error message
        header("Location: my-booking.php?msg=Error removing booking");
    }
}
