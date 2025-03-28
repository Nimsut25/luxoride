<?php
    session_start();
    error_reporting(0);
    include 'includes/config.php';
    if (strlen($_SESSION['login']) == 0) {
        header('location:index.php');
} else {
    ?><!DOCTYPE HTML>
<html lang="en">
<head>


<title>Car Rental Portal - My Booking</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
  #checkoutButton {
    background-color: #28a745; /* Green background */
    color: white; /* White text */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    padding: 12px 20px; /* Vertical and horizontal padding */
    font-size: 16px; /* Font size */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s, transform 0.2s; /* Smooth transition for hover effects */
}

#checkoutButton:hover {
    background-color: #218838; /* Darker green on hover */
    transform: scale(1.05); /* Slightly enlarge the button on hover */
}

#checkoutButton:active {
    background-color: #1e7e34; /* Even darker green when clicked */
    transform: scale(0.95); /* Slightly shrink the button when clicked */
}

.btn {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}
#checkoutModal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
}
</style>
</head>
<body>

<!-- Start Switcher -->
<?php include 'includes/colorswitcher.php'; ?>
<!-- /Switcher -->

<!--Header-->
<?php include 'includes/header.php'; ?>
<!--Page Header-->
<!-- /Header -->

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Booking</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Booking</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->

<?php
    $useremail = $_SESSION['login'];
        $sql       = "SELECT * from tblusers where EmailId=:useremail ";
        $query     = $dbh->prepare($sql);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt     = 1;
        if ($query->rowCount() > 0) {
        foreach ($results as $result) {?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo htmlentities($result->FullName); ?></h5>
        <p><?php echo htmlentities($result->Address); ?><br>
          <?php echo htmlentities($result->City); ?>&nbsp;<?php echo htmlentities($result->Country);}
    } ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include 'includes/sidebar.php'; ?>

      <div class="col-md-8 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Bookings </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
<?php
    $useremail = $_SESSION['login'];
        $sql       = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status,tblvehicles.PricePerDay,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totaldays,tblbooking.BookingNumber  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail order by tblbooking.id desc";
        $query     = $dbh->prepare($sql);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt     = 1;
        if ($query->rowCount() > 0) {
        foreach ($results as $result) {?>

<li>
    <h4 style="color:red">Booking No #<?php echo htmlentities($result->BookingNumber); ?></h4>
                <div class="vehicle_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid); ?>"><img src="assets/images/carimages/<?php echo htmlentities($result->Vimage1); ?>" alt="image"></a> </div>
                <div class="vehicle_title">

                  <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?> ,<?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                  <p><b>From </b>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <?php echo htmlentities($result->FromDate); ?> <b>To </b><?php echo htmlentities($result->ToDate); ?></p>
                  <div style="float: left"><p><b>Message:</b>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <?php echo htmlentities($result->message); ?> </p></div>
                </div>
                <?php if ($result->Status == 1) {?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if ($result->Status == 2) {?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Cancelled</a>
            <div class="clearfix"></div>
        </div>



                <?php } else {?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
            <div class="clearfix"></div>
        </div>
                <?php }?>
                 <form method="POST" action="remove_booking.php" style="display:inline;">
        <input type="hidden" name="booking_number" value="<?php echo htmlentities($result->BookingNumber); ?>">
        <button type="submit" class="btn outline btn-xs" onclick="return confirm('Are you sure you want to remove this booking?');">Remove</button>
    </form>

              </li>



<!-- Hidden Input for Amount -->
<input type="hidden" id="amount" name="amount" value="">


<script>
function redirectToCheckout() {
    // Get the grand total value
    var grandTotal = document.getElementById('grandTotal').innerText;

    // Set the amount in the hidden input of the modal
    document.getElementById('amount').value = grandTotal;

    // Show the modal
    document.getElementById('checkoutModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('checkoutModal').style.display = 'none';
}
</script>
<hr />
              <?php }
                  } else {?>
                <h5 align="center" style="color:red">No booking yet</h5>
              <?php }?>


            </ul>
            <h5 style="color:blue">Invoice</h5>
<table>
  <tr>
    <th>Car Name</th>
    <th>From Date</th>
    <th>To Date</th>
    <th>Total Days</th>
    <th>Rent / Day</th>
    <th>Payment Status</th> <!-- New column for Payment Status -->
  </tr>

  <?php
      // Assuming $results is an array of booking results
          $totalAmount = 0;

          // Loop through bookings
          foreach ($results as $result) {
              // Skip confirmed (Status == 0) and cancelled (Status == 2) bookings
              if ($result->Status == 0 || $result->Status == 2) {
                  continue; // Skip both confirmed and cancelled bookings
              }

              // Process only not confirmed bookings (assuming Status == 1 means not confirmed)
              if ($result->Status == 1) {
                  $tds        = $result->totaldays;
                  $ppd        = $result->PricePerDay;
                  $grandTotal = $tds * $ppd;   // Calculate grand total for this booking
                  $totalAmount += $grandTotal; // Add to total amount

                                                           // Check payment status
                  $paymentStatus = $result->PaymentStatus; // Assuming PaymentStatus is a field in the result
                  $paymentAmount = 0;

                  // Determine the payment status value
                  if ($paymentStatus == 'successful') {
                      $paymentStatusDisplay = 'Confirmed';            // Payment is confirmed
                      $paymentAmount        = $result->PaymentAmount; // Assuming PaymentAmount is a field in the result
                      $totalAmount -= $paymentAmount;                 // Deduct payment amount from total
                  } else {
                      $paymentStatusDisplay = 'Pending'; // Payment is pending
                  }
              ?>
    <tr>
        <td><?php echo htmlentities($result->VehiclesTitle); ?>,<?php echo htmlentities($result->BrandName); ?></td>
        <td><?php echo htmlentities($result->FromDate); ?></td>
        <td><?php echo htmlentities($result->ToDate); ?></td>
        <td><?php echo htmlentities($tds); ?></td>
        <td><?php echo htmlentities($ppd); ?></td>
        <td><?php echo htmlentities($paymentStatusDisplay); ?></td> <!-- Display payment status -->
    </tr>
  <?php
      } // End of if for not confirmed bookings
          } // End of foreach loop
      ?>

  <tr>
      <th colspan="4" style="text-align:center;"> Grand Total</th>
      <th id="grandTotal"><?php echo htmlentities($totalAmount); ?></th>
  </tr>
</table>

<!-- Checkout Button -->
<button id="checkoutButton" onclick="redirectToCheckout()" class="btn">Checkout</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php // Assuming this is after the loop in my-booking.php
                  // Start the session at the top of my-booking.php
          session_start();

          // Initialize an array to hold booking details
          if (! isset($_SESSION['bookings'])) {
              $_SESSION['bookings'] = [];
          }

          // Assuming this is after the loop in my-booking.php
          foreach ($results as $result) {
              // Skip cancelled bookings
              if ($result->Status == 2) {
                  continue;
              }

              $tds        = $result->totaldays;
              $ppd        = $result->PricePerDay;
              $grandTotal = $tds * $ppd; // Calculate grand total for this booking

              // Store each booking detail in the session array
              $_SESSION['bookings'][] = [
                  'booking_number' => htmlentities($result->BookingNumber),
                  'grand_total'    => htmlentities($grandTotal),
                  'car_image'      => htmlentities($result->Vimage1),
                  'car_title'      => htmlentities($result->VehiclesTitle),
                  'car_brand'      => htmlentities($result->BrandName),
                  'from_date'      => htmlentities($result->FromDate),
                  'to_date'        => htmlentities($result->ToDate),
                  'total_days'     => htmlentities($tds),
                  'price_per_day'  => htmlentities($ppd),
              ];
          }

          // Calculate the total amount for all bookings
          $totalAmount = array_sum(array_column($_SESSION['bookings'], 'grand_total'));

      ?>

</section>
<!-- Checkout Modal -->
<!-- Your existing code -->

<!-- Checkout Button -->


<!-- Checkout Modal -->
<!-- Your existing code -->

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<!-- Checkout Modal -->


<!-- Checkout Modal -->
<div id="checkoutModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); z-index:1000;">
    <div style="background-color:white; margin:15% auto; padding:20px; width:80%; max-width:600px;">
        <span onclick="closeModal()" style="cursor:pointer; float:right;">&times;</span>
        <h3 style="text-align:center;">Checkout Form</h3>
        <form id="checkoutForm" onsubmit="event.preventDefault(); redirectToCheckout();">
            <label for="fname">Full Name</label>
            <input type="text" id="fname" name="name" placeholder="Enter Full Name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" required>
            <input type="hidden" id="amount" name="amount" value="">
            <label for="number">Mobile</label>
            <input type="text" id="number" name="number" placeholder="Enter Mobile Number" required>
            <input type="submit" value="Pay Now" class="btn">
        </form>
    </div>
</div>
<script>
  <?php
  $api = "rzp_test_T9VfxvUfxy8nJy"; ?>

function openModal() {
    document.getElementById('checkoutModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('checkoutModal').style.display = 'none';
}

function redirectToCheckout() {
    // Get the grand total value from the invoice
    var grandTotal = parseFloat(document.getElementById('grandTotal').innerText);

    // Set the amount in the hidden input of the modal
    document.getElementById('amount').value = grandTotal;

    // Razorpay options
    var options = {
        key: "<?php echo $api; ?>", // Your Razorpay API key
        amount: grandTotal * 100, // Amount in paise (multiply by 100)
        currency: "INR", // Currency code
        name: "LuxoRide", // Company name
        description: "Car Rental", // Description
        image: "https://example.com/your_logo.jpg", // Logo URL
        prefill: {
            name: document.getElementById('fname').value, // Customer name
            email: document.getElementById('email').value, // Customer email
            contact: document.getElementById('number').value // Customer contact number
        },
        handler: function (response) {
            console.log(response);
            redirectToSuccess(); // Redirect to success page
        },
        modal: {
            ondismiss: function() {
                alert('Payment process was cancelled.');
            }
        }
    };

    var rzp = new Razorpay(options);
    rzp.open();
}

function redirectToSuccess() {
    window.location.href = "success.php"; // Redirect to success.php
}
function validateForm() {
    const name = document.getElementById('fname').value.trim();
    const email = document.getElementById('email').value.trim();
    const number = document.getElementById('number').value.trim();
    const address = document.getElementById('add').value.trim();

    if (name === "") {
        alert("Full Name must be filled out");
        return false;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    const numberPattern = /^[0-9]{10}$/;
    if (!numberPattern.test(number)) {
        alert("Please enter a valid mobile number (10 digits)");
        return false;
    }

    if (address === "") {
        alert("Address must be filled out");
        return false;
    }

    return true;
}
</script>

<!--/my-vehicles-->
<?php include 'includes/footer.php'; ?>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php }?>