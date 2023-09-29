<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault" style="">
  <div class="collapse navbar-collapse justify-content-between">
    <div class="navbar-logo">
      <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggle-icon">
          <span class="toggle-line"></span>
        </span>
      </button>
      <a class="navbar-brand me-1 me-sm-3" href="index.html">
        <div class="d-flex align-items-center">
          <div class="d-flex align-items-center">
            <img src="/Helping-Hands/src/assets/img/main_logo.png" width="220">
            <!-- <p class="logo-text ms-2 d-none d-sm-block">Helping Hands</p> -->
          </div>
        </div>
      </a>
    </div>
    <div class="search-box navbar-top-search-box d-none d-lg-block" data-list="{" valuenames":["title"]}"="" style="width:25rem;">
      <form class="position-relative show" data-bs-toggle="search" data-bs-display="static" aria-expanded="true">
        <input class="form-control fuzzy-search rounded-pill form-control-sm" type="search" placeholder="Search..." aria-label="Search">
      </form>
    </div>
    <ul class="navbar-nav navbar-nav-icons flex-row">
      <li class="nav-item">
        <div class="theme-control-toggle fa-icon-wait px-2">
          <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" checked="true">
          <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Switch theme" data-bs-original-title="Switch theme">
            <i class="fa-regular fa-moon"></i>
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
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" style="min-width: 2.5rem" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">
          <!--icon here-->
          <span class="btn btn-soft-secondary me-1 mb-1 fw-semi-bold">Notifications <span class="badge text-bg-secondary" id="unread-notifications"></span></span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="true">
          <span class="btn btn-soft-secondary me-1 mb-1 fw-semi-bold">My Accounts</span>
        </a>

        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser" data-bs-popper="static">
          <div class="card position-relative border-0">
            <div class="card-body p-0">
              <div class="text-center pt-4 pb-3">
                <h5 class="mt-2 text-black"><?php echo $email_address ?></h5>
              </div>
            </div>
            <hr>
            <div class="overflow-auto scrollbar" style="height: 10rem;">
              <ul class="nav d-flex flex-column mb-2 pb-1">
                <li class="nav-item">
                  <a class="nav-link px-3" href="#!">
                    <!--icon here-->
                    <span>Profile</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-3" href="/users/admin/admin_dashboard.php">
                    <!--icon here-->Dashboard </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-3" href="#!">
                    <!--icon here-->Settings &amp; Privacy </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-3" href="#!">
                    <!--icon here-->Help Center </a>
                </li>
              </ul>
            </div>
            <div class="card-footer pt-3 border-top">
              <div class="px-3">
                <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="/logout.php">
                  <!--icon here-->Sign out </a>
              </div>
            </div>
          </div>
        </div>

      </li>
    </ul>
  </div>
</nav>
