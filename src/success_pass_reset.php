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
                    <p class="text-700 mb-7">You have successfully Requested a link to change your password.</p>
                    <form class="verification-form" data-2fa-varification="data-2FA-varification">
                    
                        <a href="#" class="btn btn-danger w-100 mb-2" target="_blank" type="submit">
                            Gmail
                        </a>

                        <a href="#" class="btn btn-primary w-100 mb-2" target="_blank" type="submit">
                            Outlook
                        </a>

                        <a href="http://localhost:8025/" target="_blank" class="btn btn-warning w-100 mb-2" type="submit">
                            MailHog
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