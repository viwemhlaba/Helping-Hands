<?php
session_start();
include('database/db.php');
include('includes/header.php');

/* $token = bin2hex(random_bytes(32));
echo $token;
exit(); */

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validate the token and retrieve user details from password_reset_tokens table
    $query = "SELECT * FROM password_reset_tokens WHERE token = '$token'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $tokenData = mysqli_fetch_assoc($result);
        $email_address = $tokenData['email_address'];
        $user_ID = $tokenData['user_ID'];

        /* // Display the password reset form
        echo "<form class='d-flex align-items-center mb-5' method='POST' action='Global/reset_password.inc.php'>";
        echo "<input type='hidden' name='userID' value='$user_ID'>";
        echo "<input type='password' class='form-control flex-1' name='new_password' placeholder='New Password'>";
        echo "<input type='password' class='form-control flex-1' name='confirm_password' placeholder='Confirm Password'>";
        echo "<button class='btn btn-primary ms-2' type='submit' name='reset_password_btn'>Reset Password</button>";
        echo "</form>"; */
    } else {
        echo "Invalid token.";
    }
} else {
    echo "Token not provided.";
}

?>


<div class="row flex-center min-vh-100 py-5">
  <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
    <div class="text-center mb-6">
      <h4 class="text-1000">Recover Lost Password</h4>
      <p class="text-700">Type your new password</p>
      <div class="alert alert-danger hide" id="alert_error" role="alert">One or more fields are empty</div>
      <form class="mt-5 main_form_reset_password" method='POST' action='Global/reset_password.inc.php'>
        <input type='hidden' name='userID' value='<?php echo $user_ID ?>'>
        <input class="form-control mb-2" name="new_password" id="new_password" type="password" placeholder="Type new password">
        <input class="form-control mb-4" name="confirm_password" id="confirm_password" type="password" placeholder="Confirm new password">
        <button class="btn btn-primary w-100" type="submit" name="reset_password_btn" id="reset_password_btn" onclick="validateRestPassForm()">Set Password</button>
      </form>
    </div>
  </div>
</div>


<?php
include('includes/footer.php');
?>