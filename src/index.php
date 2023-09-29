<?php
include('includes/header.php');
?>
<div class="bg-white sticky-top landing-navbar navbar-shadow" data-navbar-shadow-on-scroll="data-navbar-shadow-on-scroll">
    <nav class="navbar navbar-expand-lg container-small px-3 px-lg-7 px-xxl-3">
        <a class="navbar-brand flex-1 flex-lg-grow-0" href="index.html">
            <div class="d-flex align-items-center">
                <img src="assets/img/main_logo.png" alt="HHWCS" width="200">
            </div>
        </a>
        <div class="d-lg-none">
            <div class="theme-control-toggle fa-icon-wait px-2">
                <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="HHWCSTheme" value="dark" id="themeControlToggleSm" checked="true">
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggleSm" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Switch theme" data-bs-original-title="Switch theme">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon icon">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </label>
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggleSm" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Switch theme" data-bs-original-title="Switch theme">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun icon">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </label>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="border-bottom border-bottom-lg-0 mb-2">
                <div class="search-box d-inline d-lg-none">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search rounded-pill my-4" type="search" placeholder="Search" aria-label="Search">
                        <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path>
                        </svg>
                        <!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
                    </form>
                </div>
            </div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item border-bottom border-bottom-lg-0">
                    <a class="nav-link lh-1 py-0 fs--1 fw-bold py-3 active" aria-current="page" href="/#home">Home</a>
                </li>
                <li class="nav-item border-bottom border-bottom-lg-0">
                    <a class="nav-link lh-1 py-0 fs--1 fw-bold py-3" href="/#features">Features</a>
                </li>
                <li class="nav-item border-bottom border-bottom-lg-0">
                    <a class="nav-link lh-1 py-0 fs--1 fw-bold py-3" href="/#blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lh-1 py-0 fs--1 fw-bold py-3" href="/#contact">Contact Us</a>
                </li>
            </ul>
            <div class="d-grid d-lg-flex align-items-center">
                <div class="nav-item d-flex align-items-center d-none d-lg-block pe-2">
                    <div class="theme-control-toggle fa-icon-wait px-2">
                        <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="HHWCSTheme" value="dark" id="themeControlToggle" checked="true">
                        <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Switch theme" data-bs-original-title="Switch theme">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon icon">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                            </svg>
                        </label>
                        <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Switch theme" data-bs-original-title="Switch theme">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun icon">
                                <circle cx="12" cy="12" r="5"></circle>
                                <line x1="12" y1="1" x2="12" y2="3"></line>
                                <line x1="12" y1="21" x2="12" y2="23"></line>
                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                <line x1="1" y1="12" x2="3" y2="12"></line>
                                <line x1="21" y1="12" x2="23" y2="12"></line>
                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                            </svg>
                        </label>
                    </div>
                </div>
                
                <a class="btn btn-link text-900 order-1 order-lg-0 ps-4 me-lg-2" href="signin.php">Sign in</a>
                <a class="btn btn-HHWCS-primary order-0" href="signup.php">
                    <span class="fw-bold">Sign Up</span>
                </a>
            </div>
        </div>
    </nav>
</div>
<section id="home" class="bg-white pb-8">
    <div class="container-small hero-header-container px-lg-7 px-xxl-3">
        <div class="row align-items-center">
            <div class="col-12 col-lg-12 text-lg-center text-center pt-8 pb-6 order-0 position-relative">
                <h1 class="fs-5 fs-lg-6 fs-md-7 fs-lg-6 fs-xl-7 fs fw-black mb-4">
                    <span class="text-primary me-3">Elegance</span>in Wound Care Management
                </h1>
                <p class="mb-5" style="padding-left: 13.5rem !important; padding-right: 13.5rem !important;">Join us in revolutionizing wound care services with technology that connects patients, dedicated nurses, and compassionate office managers to provide timely and effective care for those in need. Together, we can make a difference.</p>
                <a class="btn btn-lg btn-primary rounded-pill me-3" href="#!" role="button">Sign up</a>
                <a class="btn btn-link me-2 fs-0 p-0" href="#!" role="button">Learn More <svg class="svg-inline--fa fa-angle-right ms-2 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                    </svg>
                    <!-- <span class="fa-solid fa-angle-right ms-2 fs--1"></span> Font Awesome fontawesome.com -->
                </a>
            </div>
        </div>
    </div>
</section>
<section id="features" class="pt-15 pb-0">
    <div class="container-small px-lg-7 px-xxl-3">
        <div class="position-relative z-index-2">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-start pe-xxl-3">
                    <h4 class="text-primary fw-bolder mb-4">Features</h4>
                    <h2 class="mb-3 text-black lh-base">Seamless All in one System: <br />Integrated Suite </h2>
                    <p class="mb-5">Experience the power of a fully integrated suite that unifies patient registration, care contract management, nurse coordination, and reporting into one cohesive system, simplifying every aspect of wound care management.</p>
                    <a class="btn btn-lg btn-outline-primary rounded-pill me-2" href="#!" role="button">Find out more <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                        </svg>
                        <!-- <i class="fa-solid fa-angle-right ms-2"></i> Font Awesome fontawesome.com -->
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3 mt-7 text-center text-lg-start">
                    <div class="h-100 d-flex flex-column justify-content-between">
                        <div class="border-start-lg border-dashed ps-4">
                            <img class="mb-4" src="assets/img/bolt.png" width="48" height="48" alt="">
                            <div>
                                <h5 class="fw-bolder mb-2">Lightning Speed</h5>
                                <p class="fw-semi-bold lh-sm">Present everything you need in one place within minutes! Grow with HHWCS!</p>
                            </div>
                            <div>
                                <a class="btn btn-link me-2 p-0 fs--1" href="#!" role="button">Check Demo <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                                    </svg>
                                    <!-- <span class="fa-solid fa-angle-right ms-2"></span> Font Awesome fontawesome.com -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mt-7 text-center text-lg-start">
                    <div class="h-100 d-flex flex-column">
                        <div class="border-start-lg border-dashed ps-4">
                            <img class="mb-4" src="assets/img/pie.png" width="48" height="48" alt="">
                            <div>
                                <h5 class="fw-bolder mb-2">All-in-one solution</h5>
                                <p class="fw-semi-bold lh-sm">Show your production and growth graph in one place with HHWCS!</p>
                            </div>
                            <div>
                                <a class="btn btn-link me-2 p-0 fs--1" href="#!" role="button">Check Demo <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                                    </svg>
                                    <!-- <i class="fa-solid fa-angle-right ms-2"></i> Font Awesome fontawesome.com -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-12 align-items-center justify-content-between text-center text-lg-start mb-6 mb-lg-0">
                <div class="col-lg-5">
                    <img class="feature-image img-fluid mb-9 mb-lg-0 d-dark-none" src="assets/img/22_2.png" alt="">
                    <img class="feature-image img-fluid mb-9 mb-lg-0 d-light-none" src="assets/img/dark_22.png" alt="">
                </div>
                <div class="col-lg-6">
                    <h6 class="text-primary mb-2 ls-2">SIGNAL</h6>
                    <h3 class="fw-bolder mb-3">Dynamic Care Contract Management</h3>
                    <p class="mb-4 px-md-7 px-lg-0">The system enables patients to request care contracts without specifying start and end dates, allowing flexibility. Nurses or office managers can later assign nurses and set care contract durations, streamlining the process.</p>
                    <a class="btn btn-link me-2 p-0 fs--1" href="#!" role="button">Check Demo <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                        </svg>
                        <!-- <i class="fa-solid fa-angle-right ms-2"></i> Font Awesome fontawesome.com -->
                    </a>
                </div>
            </div>
            <div class="row mt-2 align-items-center justify-content-between text-center text-lg-start mb-6 mb-lg-0">
                <div class="col-lg-5 order-0 order-lg-1">
                    <img class="feature-image img-fluid mb-9 mb-lg-0 d-dark-none" src="assets/img/23_2.png" height="394" alt="">
                    <img class="feature-image img-fluid mb-9 mb-lg-0 d-light-none" src="assets/img/dark_23.png" height="394" alt="">
                </div>
                <div class="col-lg-6">
                    <h6 class="text-primary mb-2 ls-2">REVENUE</h6>
                    <h3 class="fw-bolder mb-3">Nurse Suburb Preference Matching</h3>
                    <p class="mb-4 px-md-7 px-lg-0">Nurses can select preferred suburbs for providing care, ensuring that patients are matched with nurses in nearby areas. This feature optimizes resource allocation and minimizes travel time.</p>
                    <a class="btn btn-link me-2 p-0 fs--1" href="#!" role="button">Check Demo <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                        </svg>
                        <!-- <i class="fa-solid fa-angle-right ms-2"></i> Font Awesome fontawesome.com -->
                    </a>
                </div>
            </div>
            <div class="row mt-2 align-items-center justify-content-between text-center text-lg-start mb-6 mb-lg-0">
                <div class="col-lg-5">
                    <img class="feature-image img-fluid mb-9 mb-lg-0 d-dark-none" src="assets/img/24_2.png" height="394" alt="">
                    <img class="feature-image img-fluid mb-9 mb-lg-0 d-light-none" src="assets/img/dark_24.png" height="394" alt="">
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <h6 class="text-primary mb-2 ls-2">REPORTS</h6>
                    <h3 class="fw-bolder mb-3">Comprehensive Reporting and Analytics</h3>
                    <p class="mb-4 px-md-7 px-lg-0">he system offers robust reporting tools, allowing office managers to generate dynamic reports based on parameters such as care visits, contract statuses, and patient health data. These insights support data-driven decision-making and resource allocation.</p>
                    <a class="btn btn-link me-2 p-0 fs--1" href="#!" role="button">Check Demo <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                        </svg>
                        <!-- <i class="fa-solid fa-angle-right ms-2"></i> Font Awesome fontawesome.com -->
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end of .container-->
</section>
<section id="blog" class="container-small px-lg-7 px-xxl-3">
    <div class="container-small px-lg-7 px-xxl-3">
        <div class="row">
            <div class="col-12 mb-4 text-center text-sm-start">
                <h4 class="text-primary fw-bolder mb-3">Blog</h4>
                <h2>Latest articles</h2>
            </div>
            <div class="col-lg-6 text-center text-sm-start">
                <p>Explore our blog for insightful articles, updates, and stories related to wound care management, healthcare technology, and the impact of compassionate care on our community. Stay informed and inspired as we share valuable information and experiences.</p>
            </div>
            <div class="col-lg-6 text-center text-sm-start">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
        </div>
        <div class="row h-100 g-3 justify-content-center">
            <div class="col-sm-6 col-lg-3 mb-3 mb-md-0">
                <div class="card text-white h-100">
                    <img class="rounded-top h-100 fit-cover" src="assets/img/blog-3.png" alt="...">
                    <div class="card-body rounded-top">
                        <h4 class="fw-bold mb-3 lh-sm line-clamp-2">"Revolutionizing Wound Care: The Helping Hands Technology Journey</h4>
                        <a class="btn-link px-0 d-flex align-items-center fs--1 fw-bold" href="#!" role="button">Read more <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                            </svg>
                            <!-- <span class="fa-solid fa-angle-right ms-2"></span> Font Awesome fontawesome.com -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3 mb-md-0">
                <div class="card text-white h-100">
                    <img class="rounded-top h-100 fit-cover" src="assets/img/blog-3.png" alt="...">
                    <div class="card-body rounded-top">
                        <h4 class="fw-bold mb-3 lh-sm line-clamp-2">The Heart of Healing: Stories of Nurses Making a Difference</h4>
                        <a class="btn-link px-0 d-flex align-items-center fs--1 fw-bold" href="#!" role="button">Read more <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                            </svg>
                            <!-- <span class="fa-solid fa-angle-right ms-2"></span> Font Awesome fontawesome.com -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3 mb-md-0">
                <div class="card text-white h-100">
                    <img class="rounded-top h-100 fit-cover" src="assets/img/blog-3.png" alt="...">
                    <div class="card-body rounded-top">
                        <h4 class="fw-bold mb-3 lh-sm line-clamp-2">Optimizing Wound Care: How Technology is Enhancing Patient Outcomes</h4>
                        <a class="btn-link px-0 d-flex align-items-center fs--1 fw-bold" href="#!" role="button">Read more <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                            </svg>
                            <!-- <span class="fa-solid fa-angle-right ms-2"></span> Font Awesome fontawesome.com -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3 mb-md-0">
                <div class="card text-white h-100">
                    <img class="rounded-top h-100 fit-cover" src="assets/img/blog-3.png" alt="...">
                    <div class="card-body rounded-top">
                        <h4 class="fw-bold mb-3 lh-sm line-clamp-2">Community Matters: The Impact of Non-Profit Wound Care Services</h4>
                        <a class="btn-link px-0 d-flex align-items-center fs--1 fw-bold" href="#!" role="button">Read more <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                            </svg>
                            <!-- <span class="fa-solid fa-angle-right ms-2"></span> Font Awesome fontawesome.com -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-6">
            <a class="btn btn-outline-primary" href="#!">View All <svg class="svg-inline--fa fa-angle-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path>
                </svg>
                <!-- <span class="fa-solid fa-angle-right ms-2"></span> Font Awesome fontawesome.com -->
            </a>
        </div>
    </div>
    <!-- end of .container-->
</section>
<section id="contact" class="pb-10 pb-xl-14">
    <div class="container-small px-lg-7 px-xxl-3">
        <div class="row g-5 g-lg-5">
            <div class="col-md-6 mb-5 mb-md-0 text-center text-md-start">
                <h3 class="mb-3">Stay connected</h3>
                <p class="mb-5">Stay connected with HHWCS's Help Center; HHWCS is available for your necessities at all times.</p>
                <div class="d-flex flex-column align-items-center align-items-md-start gap-3 gap-md-0">
                    <div class="d-md-flex align-items-center">
                        <div class="icon-wrapper shadow-info">
                            <span class="uil uil-phone text-primary light fs-4 z-index-1 ms-2"></span>
                        </div>
                        <div class="flex-1 ms-3">
                            <a class="link-900" href="#">(+27) 64606-7509</a>
                        </div>
                    </div>
                    <div class="d-md-flex align-items-center">
                        <div class="icon-wrapper shadow-info">
                            <span class="uil uil-envelope text-primary light fs-4 z-index-1 ms-2"></span>
                        </div>
                        <div class="flex-1 ms-3">
                            <a class="fw-semi-bold text-900" href="#">HHWCS@gmail.com</a>
                        </div>
                    </div>
                    <div class="mb-6 d-md-flex align-items-center">
                        <div class="icon-wrapper shadow-info">
                            <span class="uil uil-map-marker text-primary light fs-4 z-index-1 ms-2"></span>
                        </div>
                        <div class="flex-1 ms-3">
                            <a class="fw-semi-bold text-900" href="#!">University Way, Summerstrand</a>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="#!">
                            <svg class="svg-inline--fa fa-facebook fs-2 text-primary me-3" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path>
                            </svg>
                            <!-- <span class="fa-brands fa-facebook fs-2 text-primary me-3"></span> Font Awesome fontawesome.com -->
                        </a>
                        <a href="#!">
                            <svg class="svg-inline--fa fa-twitter fs-2 text-primary me-3" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path>
                            </svg>
                            <!-- <span class="fa-brands fa-twitter fs-2 text-primary me-3"></span> Font Awesome fontawesome.com -->
                        </a>
                        <a href="#!">
                            <svg class="svg-inline--fa fa-linkedin-in fs-2 text-primary" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M100.3 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.6 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.3 61.9 111.3 142.3V448z"></path>
                            </svg>
                            <!-- <span class="fa-brands fa-linkedin-in fs-2 text-primary"></span> Font Awesome fontawesome.com -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center text-md-start">
                <h3 class="mb-3">Drop us a line</h3>
                <p class="mb-7">If you have any query or suggestion , we are open to learn from you, Lets talk, reach us anytime.</p>
                <form class="row g-4">
                    <div class="col-12">
                        <input class="form-control bg-white" type="text" name="name" placeholder="Name" required="required">
                    </div>
                    <div class="col-12">
                        <input class="form-control bg-white" type="email" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="col-12">
                        <textarea class="form-control bg-white" rows="6" name="message" placeholder="Message" required="required"></textarea>
                    </div>
                    <div class="col-12 d-grid">
                        <button class="btn btn-outline-primary" type="submit">Submit</button>
                    </div>
                    <div class="feedback"></div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of .container-->
</section>
<section class="bg-1100 dark__bg-1000">
    <div class="container-small px-lg-7 px-xxl-3">
        <div class="row gx-xxl-8 gy-5 align-items-center mb-5">
            <div class="col-xl-auto text-center">
                <a href="#">
                    <img src="assets/img/icons/logo-white.png" height="48" alt="">
                </a>
            </div>
            <div class="col-xl-auto flex-1">
                <ul class="list-unstyled d-flex justify-content-center flex-wrap mb-0 border-end-xl border-dashed border-800 gap-3 gap-xl-8 pe-xl-5 pe-xxl-8 w-75 w-md-100 mx-auto">
                    <li>
                        <a class="text-300 dark__text-300" href="">Contact us</a>
                    </li>
                    <li>
                        <a class="text-300 dark__text-300" href="">Newsroom</a>
                    </li>
                    <li>
                        <a class="text-300 dark__text-300" href="">Opportunities</a>
                    </li>
                    <li>
                        <a class="text-300 dark__text-300" href="">Login</a>
                    </li>
                    <li>
                        <a class="text-300 dark__text-300" href="">Sign Up</a>
                    </li>
                    <li>
                        <a class="text-300 dark__text-300" href="">Support</a>
                    </li>
                    <li>
                        <a class="text-300 dark__text-300" href="">FAQ</a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-auto">
                <div class="d-flex align-items-center justify-content-center gap-8">
                    <a class="text-white dark__text-white" href="#!">
                        <svg class="svg-inline--fa fa-facebook" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path>
                        </svg>
                        <!-- <span class="fa-brands fa-facebook"></span> Font Awesome fontawesome.com -->
                    </a>
                    <a class="text-white dark__text-white" href="#!">
                        <svg class="svg-inline--fa fa-twitter" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path>
                        </svg>
                        <!-- <span class="fa-brands fa-twitter"></span> Font Awesome fontawesome.com -->
                    </a>
                    <a class="text-white dark__text-white" href="#!">
                        <svg class="svg-inline--fa fa-linkedin-in" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M100.3 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.6 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.3 61.9 111.3 142.3V448z"></path>
                        </svg>
                        <!-- <span class="fa-brands fa-linkedin-in"></span> Font Awesome fontawesome.com -->
                    </a>
                </div>
            </div>
        </div>
        <hr class="text-800">
        <div class="d-sm-flex flex-between-center text-center">
            <p class="text-600 mb-0">Copyright © Helping Hands</p>
            <p class="text-600 mb-0">Made with love by <a href="mailto:viwemhlabavm@gmail.com">Group 04-37</a>
            </p>
        </div>
    </div>
    <!-- end of .container-->
</section>
<?php
include('includes/footer.php');
?>