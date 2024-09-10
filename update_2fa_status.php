<?php
session_start();
require_once("includes/db.php");
// Assuming you have already connected to the database

// Get the status from the AJAX request
$status = $_POST['status'];

// Determine the value to store in the database
$is_two_factor_enabled = ($status === 'activate') ? 1 : 0;

// Use the $login_seller_id to identify the current user
$seller_id = $login_seller_id;

// Update the database with the new status
$update_seller = $db->update("sellers", [
    "two_factor_enabled" => $is_two_factor_enabled
], [
    "seller_id" => $seller_id
]);

if ($update_seller) {
    echo $status === 'activate' ? "Two-Factor Authentication Activated" : "Two-Factor Authentication Deactivated";
} else {
    echo "Failed to update the status. Please try again.";
}
?>
