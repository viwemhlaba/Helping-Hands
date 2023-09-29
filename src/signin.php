<?php
session_start();
// Access the user information from the session
//$user_type = $_SESSION['user_type'];
// Your HTML and other content for the nurse dashboard
include('database/db.php');
include('includes/header.php');
//include('includes/sidebar.php');
//include('includes/top_navigation.php');
$alertMessage = "";
if (isset($_GET['signin']) && $_GET['signin'] == 'invalid') {
    $alertMessage = '<div class="alert alert-danger" id="alert_error" role="alert">Password or email is incorrect!</div>';
  }else if(isset($_GET['signin']) && $_GET['signin'] == 'you_are_not_signed_in'){
    $alertMessage = '<div class="alert alert-danger" id="alert_error" role="alert">You cannot access dashboard, you are not logged in!</div>';
  }
?>
<!--content -->
<div class="container">
    <div class="row flex-center min-vh-100 py-5">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
            <div class="text-center mb-7">
                <h3 class="text-1000">Welcome Back - Sign In</h3>
                <p class="text-700">Login to your account, and start doing what you love</p>
            </div>
            <form class="main_form" action="Global/login.inc.php" method="POST">
            <?php if (isset($alertMessage)) { ?>
                <div class="col-12">
                  <?php echo $alertMessage ?>
                </div>
              <?php } ?>
            <div class="alert alert-danger hide" id="alert_error" role="alert">One or more fields are empty</div>
                <div class="mb-3 text-start">
                    <div class="form-icon-container">
                        <input class="form-control form-icon-input" id="email_address" name="email_address" type="email" placeholder="Enter your email address">
                    </div>
                </div>
                <div class="mb-3 text-start"> 
                    <div class="form-icon-container">
                        <input class="form-control form-icon-input" name="password" id="password" type="password" placeholder="Password">
                    </div>
                </div>
                <div class="row flex-between-center mb-7">
                    <div class="col-auto">
                        <div class="form-check mb-0">
                            <input class="form-check-input" id="basic-checkbox" type="checkbox" checked="checked">
                            <label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a class="fs--1 fw-semi-bold" href="forgot_password.php">Forgot Password?</a>
                    </div>
                </div>
            </form>
            <button class="btn btn-primary w-100 mb-3" type="submit" name="login_btn" id="login_btn">Sign In</button>
            <div class="text-center">
                <a class="fs--1 fw-bold" href="signup.php">Create an account</a>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>