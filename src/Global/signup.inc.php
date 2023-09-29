<?php

session_start();
include('../database/db.php');

//if (isset($_POST['signup_btn_inc'])) {
$username = $_POST['username'];
//$last_name = $_POST['last_name'];
$email_address = $_POST['email_address'];
$contact_no = $_POST['contact_no'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$user_type = $_POST['user_type'];

//check if the email and username dont already exist

$validateEmailUsername = "SELECT * FROM user WHERE username = '$username' OR email_address = '$email_address';";

$result = mysqli_query($conn, $validateEmailUsername);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($email_address == isset($row['email_address'])) {
        header("Location: ../signup.php?signup=email_exists");
        exit();
    } else if ($username == isset($row['username'])) {
        header("Location: ../signup.php?signup=username_exists");
        exit();
    }
}else {
    if (
        empty($username) || empty($email_address) || empty($contact_no) ||
        empty($password) || empty($user_type)
    ) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else if ($password !== $password_confirm) {
        header("Location: ../signup.php?signup=pass_dont_match");
        exit();
    } else if (strlen($password) < 6) {
        header("Location: ../signup.php?signup=short");
        exit();
    } else if (!preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
        header("Location: ../signup.php?signup=char");
        exit();
    } else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?signup=emailerr");
        exit();
    } else {


        //hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (username, email_address, password, contact_no, user_type) 
                VALUES ('$username','$email_address','$hashed_password','$contact_no', '$user_type')";
        $results = mysqli_query($conn, $query);

        if ($results) {


            $subject = "Helping Hands - Registration Success!";
            $message = "You are getting this email, because you have successful registered your account\n\n";
            $message .= "Use the following details that you have created to login:\n\n";
            $message .= "Username: $username\n\n";
            $message .= "Password: $password\n\n";
            //$message .= "Password: '.$password.'\n\n";
            $message .= "Please <a href='localhost:8003/signin.php'>Login now to complete your profile</a>\n\n";
            $to = $email_address;
            $headers = "From: noreply@helpinghands.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();


            $mailSent = mail($to, $subject, $message, $headers);

            if ($mailSent) {
                header("Location: ../success_registration.php");
            } else {
                header("Location: ../signup.php?signup=emailerr");
            }
        } else {
            header("Location: ../signup.php");
        }
    }
}
