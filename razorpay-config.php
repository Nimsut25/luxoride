<?php
                               // Include the Razorpay PHP SDK
require 'vendor/autoload.php'; // Adjust the path if necessary

use Razorpay\Api\Api;

// Set your Razorpay API key and secret
$apiKey    = 'rzp_test_T9VfxvUfxy8nJy';  // Replace with your Razorpay API Key
$apiSecret = 'AzpvAseBlUxTQsfdWEZwbPoj'; // Replace with your Razorpay API Secret

// Initialize Razorpay API
$api = new Api($apiKey, $apiSecret);
