<?php
session_start();
include('database/db.php');
include('includes/header.php');
?>

<div class="container">
    <div class="row flex-center min-vh-100 py-5">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xxl-4">
            <a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.html">
                <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block">
                    <h3 class="text-1000">Congratulations!!</h3>
                    <!-- <p class="text-700">Login to your account, and start doing what you love</p> -->
                </div>
            </a>
            <div class="px-xxl-5">
                <div class="text-center mb-6">
                    <!-- <h4 class="text-1000">Enter the verification code</h4> -->
                    <p class="text-700 mb-5">You have successfully created an account thank you, now please click the link below to login.</p>
                    
                    <form class="verification-form" data-2fa-varification="data-2FA-varification">

                        <a href="signin.php" class="btn btn-primary w-100 mb-5" type="submit">
                            Sign in
                        </a>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>