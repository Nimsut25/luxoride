<!--
<head>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.row {
    display: flex;
    justify-content: center;
    align-items: center;
}

.col-50 {
    width: 50%;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.container {
    padding: 20px;
}

h3 {
    color: #333;
}

label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
    color: #555;
}

input[type="text"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

input[type="text"]:focus {
    border-color: #007BFF;
    outline: none;
}

.btn {
    background-color: #007BFF;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
    text-align:center;
}

.btn:hover {
    background-color: #0056b3;
}

@media (max-width: 768px) {
    .col-50 {
        width: 90%;
    }
}
    </style>
</head>
<div class="row" style="padding:100px 300px;">
    <div class="col-50">
        <div class="container">
            <form action="payscript.php" method="post" style="padding:25px;" onsubmit="return validateForm()">
                <div class="row">
                    <div class="col-25">
                        <h3 style="text-align:center;margin:20px 10px;">Checkout Form</h3>

                        <label for="fname">Full Name</label>
                        <input type="text" id="fname" name="name" placeholder="Enter Full Name" required>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Email" required>
                        <input type="hidden" value="<?php echo 'oid' . rand(1, 1000); ?>" name="orderid">
                        <input type="hidden" id="amount" name="amount" value="<?php echo isset($_POST['amount']) ? htmlentities($_POST['amount']) : ''; ?>">
                        <label for="number">Mobile</label>
                        <input type="text" id="number" name="number" placeholder="Enter Mobile Number" required>
                        <label for="add">Address</label>
                        <input type="text" id="add" name="address" placeholder="Enter Your Address" required>
                    </div>
                </div>
                <input type="submit" value="Pay Now" class="btn">
            </form>
        </div>
    </div>
</div>

<script>
function validateForm() {
    const name = document.getElementById('fname').value.trim();
    const email = document.getElementById('email').value.trim();
    const number = document.getElementById('number').value.trim();
    const address = document.getElementById('add').value.trim();

    // Validate Full Name
    if (name === "") {
        alert("Full Name must be filled out");
        return false;
    }

    // Validate Email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    // Validate Mobile Number
    const numberPattern = /^[0-9]{10}$/; // Assuming a 10-digit mobile number
    if (!numberPattern.test(number)) {
        alert("Please enter a valid mobile number (10 digits)");
        return false;
    }

    // Validate Address
    if (address === "") {
        alert("Address must be filled out");
        return false;
    }

    return true; // All validations passed
}
</script> -->
