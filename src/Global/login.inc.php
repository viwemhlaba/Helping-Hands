<?php
session_start();
include('../database/db.php');
$email_address = mysqli_real_escape_string($conn, $_POST['email_address']); // Sanitize user input
$password = $_POST['password'];
$query = "SELECT * FROM user WHERE email_address = '$email_address'";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $hashed_password = $user['password'];
    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_ID'] = $user['user_ID'];
        $_SESSION['email_address'] = $user['email_address'];
        $_SESSION['user_type'] = $user['user_type'];
        if ($user['user_type'] == 'A') {
            header("Location: ../users/admin/admin_dashboard.php"); //TAKE TO ADMIN DASHBOARD
            exit();
        } else if ($user['user_type'] == 'P') {
            header("Location: ../users/Patient/patient_dashboard.php"); //TAKE TO PATIENT DASHBOARD
            exit();
        } else if (($user['user_type'] == 'N')) {
            header("Location: ../users/Nurse/nurse_dashboard.php"); //TAKE TO NURSE DASHBOARD
            exit();
        } else if (($user['user_type'] == 'O')) {
            header("Location: ../users/Office Manager/office_dashboard.php"); //TAKE TO OFFICE MANAGER DASHBOARD
            exit();
        } else {
            //no user type found
            header("Location: signin.php?signin=nousertypefound");
        }
        exit();
    } else {
        // Password is incorrect
        header("Location: /signin.php?signin=invalid");
        exit();
    }
} else {
    // User not found
    header("Location: ../signin.php?signin=notfound");
    exit();
}
//}
