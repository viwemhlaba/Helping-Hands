<?php
session_start();
include('../database/db.php');

if (isset($_POST['reset_password_btn'])) {
    $userID = $_POST['userID'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update user's password in the user table
        $updateQuery = "UPDATE user SET password = '$hashedPassword' WHERE user_ID = $userID";
        mysqli_query($conn, $updateQuery);

        // Delete the token from password_reset_tokens table
        $deleteQuery = "DELETE FROM password_reset_tokens WHERE user_ID = $userID";
        mysqli_query($conn, $deleteQuery);

        header("Location: ../signin.php"); //TAKE TO ADMIN DASHBOARD
        exit();
    } else {
        echo "Passwords do not match.";
    }
}
?>
