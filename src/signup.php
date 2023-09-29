<?php
//session_start();
// Access the user information from the session
//$user_type = $_SESSION['user_type'];

// Your HTML and other content for the nurse dashboard

include('database/db.php');
include('includes/header.php');
//include('includes/sidebar.php');
//include('includes/top_navigation.php');
$alertMessage = "";
if(isset($_GET['signup']) && $_GET['signup'] == 'email_exists'){
    $alertMessage = '<div class="alert alert-danger" id="alert_error" role="alert">The email/username already exists! Please use another one</div>';
  }else if(isset($_GET['signup']) && $_GET['signup'] == 'username_exists'){
    $alertMessage = '<div class="alert alert-danger" id="alert_error" role="alert">The username already exists! Please use another one</div>';
  }
?>

<!--content -->
<div class="container">
    <div class="row flex-center min-vh-100 py-5">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
            <div class="text-center mb-7">
                <h3 class="text-1000">Hi, New here? <span>No worries</span></h3>
                <p class="text-700">Create your account <a href="signin.php">if you already have one!</a></p>
            </div>
            <form class="main_form_signup" action="Global/signup.inc.php" method="POST">
            <?php if (isset($alertMessage)) { ?>
                <div class="col-12">
                  <?php echo $alertMessage ?>
                </div>
              <?php } ?>
                <div class="alert alert-danger hide" id="alert_error" role="alert">One or more fields are empty</div>
                <div class="mb-3 text-start">
                    <div class="form-icon-container">
                        <input class="form-control form-icon-input" id="username" name="username" type="text" placeholder="Username">
                        <span id="error_username" class="error"></span>
                        <!-- <span class="fas fa-user text-900 fs--1 form-icon"></span> Font Awesome fontawesome.com -->
                    </div>
                </div>
                <div class="row flex-between-center mb-3">
                    <div class="col">
                        <input type="email" name="email_address" id="email_address" class="form-control form-icon-input" placeholder="Email address">

                    </div>
                    <div class="col">
                        <input type="email" name="email_address_confirm" id="email_address_confirm" class="form-control form-icon-input" placeholder="Confirm Email">

                    </div>
                    <div>
                        <span id="error_email" class="error"></span>
                    </div>
                </div>

                <div class="mb-3 text-start">
                    <div class="form-icon-container">
                        <input class="form-control form-icon-input" name="contact_no" id="contact_number" type="number" placeholder="Contact Number">
                        <span id="error_number" class="error"></span>
                        <!-- <span class="fas fa-key text-900 fs--1 form-icon"></span> Font Awesome fontawesome.com -->
                    </div>
                </div>
                <div class="row flex-between-center mb-3">
                    <div class="col">
                        <input type="password" name="password" id="password" class="form-control form-icon-input" placeholder="Password">

                    </div>
                    <div class="col">
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control form-icon-input" placeholder="Confirm Password">

                    </div>
                    <div>
                        <span id="error_password" class="error"></span>
                    </div>
                </div>
                
                <div class="row flex-between-center mb-3">
                    <select type="text" name="user_type" id="user_type" class="form-select form-control" aria-label="Default select example">
                        <option selected>Select user type</option>
                        <option value="A">Admin</option>
                        <option value="P">Patient</option>
                        <option value="N">Nurse</option>
                        <option value="O">Office Manager</option>
                    </select>
                    <span id="error_userType" class="error"></span>
                </div>
                <div>
                        <span id="error_user" class="error"></span>
                    </div>
                <div class="row flex-between-center mb-3">
                    <div class="col-auto">
                        <div class="form-check mb-0">
                            <input class="form-check-input" name="remember_me_check" id="remember_me_check" type="checkbox">
                            <label class="form-check-label mb-0" for="remember_me_check"><a href="">Agree to terms</a> and conditions</label>
                            
                        </div>
                    </div>
                </div>
                <div>
                        <span id="error_check" class="error"></span>
                    </div>
                <button class="btn btn-primary w-100 mb-3" name="signup_btn" id="signup_btn">Sign Up</button>
            </form>

            <div class="text-center">
                <a class="fs--1 fw-bold" href="signin.php">Already have an account, sign in</a>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
?>