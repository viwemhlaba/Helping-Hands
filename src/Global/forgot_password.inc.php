<?php
session_start();
include('../database/db.php');

//if (isset($_POST['recover_password_btn'])) {
$email_address = $_POST['email_address'];

$query = "SELECT * FROM user WHERE email_address = '$email_address'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $user_ID = $user['user_ID'];

    //create sessions
    $_SESSION['user_ID'] = $user['user_ID'];
    $_SESSION['email_address'] = $user['email_address'];

    // Generate a unique token
    $token = bin2hex(random_bytes(32));

    // Store the token in the database
    $insertQuery = "INSERT INTO password_reset_tokens (user_ID, email_address, token, created_at) VALUES ('$user_ID', '$email_address', '$token', NOW())";
    mysqli_query($conn, $insertQuery);

    // Email subject and body
    $subject = "Password Reset";
    $message = "Click the link below to reset your password:\n\n";
    $resetLink = "http://localhost:8003/reset_password.php?token=$token"; // Example reset link
    $message .= '<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#0f111a" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: Open Sans, sans-serif;">
    <tr>
        <td>
            <table style="background-color: #0f111a; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="height:80px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <a href="" title="logo" target="_blank">
                            <img width="635" src="../assets/img/Main-Logo.png" title="logo" alt="logo">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                            <tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding:0 35px;">
                                    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:Rubik,sans-serif;">You have
                                        requested to reset your password</h1>
                                    <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                        We cannot simply send you your old password. A unique link to reset your
                                        password has been generated for you. To reset your password, click the
                                        following link and follow the instructions.
                                    </p>
                                    <a href="'.$resetLink.'" style="background:#0f111a;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                                        Password</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>http://localhost:8003/</strong></p>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    </table>';
    $to = $email_address;

    // Send the email
    $headers = "From: noreply@helpinghands.com\r\n"; // Replace with your actual email address
    $headers .= "X-Mailer: PHP/" . phpversion();

    $mailSent = mail($to, $subject, $message, $headers);

    if($mailSent){
        header("Location: ../success_pass_reset.php?status=success");
        exit();
    }else{
        echo 'Email could not be sent.';
    }

    // Redirect back to the form with a success message
    
} else {
    echo 'the user does not exist';
}
