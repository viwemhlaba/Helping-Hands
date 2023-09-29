<?php
session_start();
include('database/db.php');
include('includes/header.php');
?>


<div class="row flex-center min-vh-100 py-5">
  <div class="col-sm-10 col-md-8 col-lg-5 col-xxl-4">
    <div class="px-xxl-5">
      <div class="text-center mb-6">
        <h4 class="text-1000">Recover Lost Password</h4>
        <p class="text-700 mb-5">Email field cant be empty. or <a href="signin.php">Login here.</a></p>
        <div class="alert alert-danger hide" id="alert_error" role="alert">One or more fields are empty</div>
        <form class="d-flex align-items-center mb-5 main_form_forgot_password" id="main_form_forgot_password" action="Global/forgot_password.inc.php" method="POST">
          <input class="form-control flex-1" id="email_address" name="email_address" type="email" placeholder="Email">
          <button class="btn btn-primary ms-2" id="forget_pass_btn" onclick="validateForgetPassForm()">Send</button>
        </form>
        <a class="fs--1 fw-bold" href="#!">Still having problems?</a>
      </div>
    </div>
  </div>
</div>
<?php
include('includes/footer.php');
?>