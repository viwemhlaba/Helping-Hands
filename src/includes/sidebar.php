<?php
//session_start();
// Access the user information from the session
$user_type = $_SESSION['user_type'];

// Your HTML and other content for the nurse dashboard
?>

<nav class="navbar navbar-vertical navbar-expand-lg">
    <script>
        var navbarStyle = window.config.config.phoenixNavbarStyle;
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <p class="navbar-vertical-label">Menu Items</p>
                    <hr class="navbar-vertical-line">
                    <div class="nav-item-wrapper">

                    <?php
                        if($user_type == 'A'){
                            echo '
                                    <a class="nav-link label-1" href="manage_locations.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Locations</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_condition.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-pills"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Conditions</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_nurse.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-user-nurse"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Nurses</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_contracts.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-file-signature"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Contracts</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_care_visits.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Care Visits</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_patient.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-bed"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Patients</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_reports.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-regular fa-file-excel"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Reporting</span>
                                        </span>
                                    </div>
                                </a>
                            ';
                        }else if($user_type == 'O'){
                            //SOMETHING HERE Office manager
                            echo '
                                  

                                <a class="nav-link label-1" href="manage_condition.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-pills"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Conditions</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_nurse.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-user-nurse"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Nurses</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_contracts.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-file-signature"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Contracts</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_care_visits.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Care Visits</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_patient.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-solid fa-bed"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Patients</span>
                                        </span>
                                    </div>
                                </a>

                                <a class="nav-link label-1" href="manage_reports.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-regular fa-file-excel"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Reporting</span>
                                        </span>
                                    </div>
                                </a>
                            ';
                        }else if($user_type == 'N'){
                            //something here nuser
                            echo '
                                  
                            <a class="nav-link label-1" href="manage_patient.php" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                <i class="fa-solid fa-bed"></i>
                                </span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Profile</span>
                                </span>
                            </div>
                        </a>

                        <a class="nav-link label-1" href="manage_locations.php" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                            <i class="fa-solid fa-location-dot"></i>
                            </span>
                            <span class="nav-link-text-wrapper">
                                <span class="nav-link-text">Prefered Locations</span>
                            </span>
                        </div>
                    </a>

                            

                            

                            <a class="nav-link label-1" href="manage_contracts.php" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                    <i class="fa-solid fa-file-signature"></i>
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Active Contracts</span>
                                    </span>
                                </div>
                            </a>

                            <a class="nav-link label-1" href="manage_care_visits.php" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                    <i class="fa-solid fa-hospital-user"></i>
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Visits Schedule</span>
                                    </span>
                                </div>
                            </a>

                            <a class="nav-link label-1" href="manage_reports.php" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                        <i class="fa-regular fa-file-excel"></i>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Reporting</span>
                                        </span>
                                    </div>
                                </a>
                        
                        ';
                        }else{
                            echo '
                                  
                            <a class="nav-link label-1" href="manage_patient.php" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                <i class="fa-solid fa-bed"></i>
                                </span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Profile</span>
                                </span>
                            </div>
                        </a>

                            <a class="nav-link label-1" href="manage_condition.php" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                    <i class="fa-solid fa-pills"></i>
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Update Condition</span>
                                    </span>
                                </div>
                            </a>

                            

                            <a class="nav-link label-1" href="manage_care_contract.php" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                    <i class="fa-solid fa-file-signature"></i>
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Active Contracts</span>
                                    </span>
                                </div>
                            </a>

                            <a class="nav-link label-1" href="manage_care_visits.php" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                    <i class="fa-solid fa-hospital-user"></i>
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Visits Schedule</span>
                                    </span>
                                </div>
                            </a>

                        
                        ';
                        }
                    ?>
                        

                    </div>
                </li>

                <li class="nav-item">
                    <p class="navbar-vertical-label">Main Menu</p>
                    <hr class="navbar-vertical-line">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="/" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="fa-solid fa-circle-nodes"></i></span><!--add icon here-->
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Home</span>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="/about.php" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="fa-solid fa-users"></i></span><!--add icon here-->
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">About Us</span>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="/services.php" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="fa-brands fa-buffer"></i></span><!--add icon here-->
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Our Services</span>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="/blog.php" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                <i class="fa-solid fa-rss"></i>
                                </span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Our Blog</span>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="showcase.html" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                <i class="fa-solid fa-address-book"></i>
                                </span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Contact Us</span>
                                </span>
                            </div>
                        </a>
                    </div>

                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="showcase.html" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Logout</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center">
            <span class="uil uil-left-arrow-to-left fs-0"></span>
            <span class="uil uil-arrow-from-right fs-0"></span>
            <span class="navbar-vertical-footer-text ms-2">Collapsed View</span>
        </button>
    </div>
</nav>