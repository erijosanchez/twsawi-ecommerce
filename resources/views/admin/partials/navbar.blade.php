<nav class="fixed-top d-flex flex-row align-items-top p-0 navbar default-layout col-lg-12 col-12">
    <div class="d-flex align-items-center justify-content-start text-center navbar-brand-wrapper">
        <div class="me-3">
            <button class="align-self-center navbar-toggler navbar-toggler" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="index.html">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="images/logo-mini.svg" alt="logo" />
            </a>
        </div>
    </div>
    <div class="d-flex align-items-top navbar-menu-wrapper">
        <ul class="navbar-nav">
            <li class="d-lg-block ms-0 font-weight-semibold nav-item d-none">
                <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
                <h3 class="welcome-sub-text">Your performance summary this week </h3>
            </li>
        </ul>
        <ul class="ms-auto navbar-nav">
            <li class="d-lg-block nav-item dropdown d-none">
                <a class="dropdown-bordered nav-link dropdown-toggle dropdown-toggle-split" id="messageDropdown"
                    href="#" data-bs-toggle="dropdown" aria-expanded="false"> Select Category </a>
                <div class="dropdown-menu-right pb-0 dropdown-menu navbar-dropdown preview-list"
                    aria-labelledby="messageDropdown">
                    <a class="py-3 dropdown-item">
                        <p class="float-left mb-0 font-weight-medium">Select category</p>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="flex-grow py-2 preview-item-content">
                            <p class="font-weight-medium text-dark preview-subject ellipsis">Bootstrap Bundle
                            </p>
                            <p class="mb-0 fw-light small-text">This is a Bundle featuring 16 unique dashboards
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="flex-grow py-2 preview-item-content">
                            <p class="font-weight-medium text-dark preview-subject ellipsis">Angular Bundle</p>
                            <p class="mb-0 fw-light small-text">Everything you’ll ever need for your Angular
                                projects</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="flex-grow py-2 preview-item-content">
                            <p class="font-weight-medium text-dark preview-subject ellipsis">VUE Bundle</p>
                            <p class="mb-0 fw-light small-text">Bundle of 6 Premium Vue Admin Dashboard</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="flex-grow py-2 preview-item-content">
                            <p class="font-weight-medium text-dark preview-subject ellipsis">React Bundle</p>
                            <p class="mb-0 fw-light small-text">Bundle of 8 Premium React Admin Dashboard</p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="d-lg-block nav-item d-none">
                <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                    <span class="input-group-addon input-group-prepend border-right">
                        <span class="input-group-text icon-calendar calendar-icon"></span>
                    </span>
                    <input type="text" class="form-control">
                </div>
            </li>
            <li class="nav-item">
                <form class="search-form" action="#">
                    <i class="icon-search"></i>
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                </form>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="icon-mail icon-lg"></i>
                </a>
                <div class="dropdown-menu-right pb-0 dropdown-menu navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <a class="py-3 border-bottom dropdown-item">
                        <p class="float-left mb-0 font-weight-medium">You have 4 new notifications </p>
                        <span class="float-right badge badge-pill badge-primary">View all</span>
                    </a>
                    <a class="py-3 dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <i class="m-auto text-primary mdi mdi-alert"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="mb-1 text-dark preview-subject fw-normal">Application Error</h6>
                            <p class="mb-0 fw-light small-text"> Just now </p>
                        </div>
                    </a>
                    <a class="py-3 dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <i class="m-auto text-primary mdi mdi-settings"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="mb-1 text-dark preview-subject fw-normal">Settings</h6>
                            <p class="mb-0 fw-light small-text"> Private message </p>
                        </div>
                    </a>
                    <a class="py-3 dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <i class="m-auto text-primary mdi mdi-airballoon"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="mb-1 text-dark preview-subject fw-normal">New user registration</h6>
                            <p class="mb-0 fw-light small-text"> 2 days ago </p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="icon-bell"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu-right pb-0 dropdown-menu navbar-dropdown preview-list"
                    aria-labelledby="countDropdown">
                    <a class="py-3 dropdown-item">
                        <p class="float-left mb-0 font-weight-medium">You have 7 unread mails </p>
                        <span class="float-right badge badge-pill badge-primary">View all</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                        </div>
                        <div class="flex-grow py-2 preview-item-content">
                            <p class="font-weight-medium text-dark preview-subject ellipsis">Marian Garner </p>
                            <p class="mb-0 fw-light small-text"> The meeting is cancelled </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                        </div>
                        <div class="flex-grow py-2 preview-item-content">
                            <p class="font-weight-medium text-dark preview-subject ellipsis">David Grey </p>
                            <p class="mb-0 fw-light small-text"> The meeting is cancelled </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                        </div>
                        <div class="flex-grow py-2 preview-item-content">
                            <p class="font-weight-medium text-dark preview-subject ellipsis">Travis Jenkins
                            </p>
                            <p class="mb-0 fw-light small-text"> The meeting is cancelled </p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="d-lg-block nav-item dropdown d-none user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img class="rounded-circle img-xs" src="images/faces/face8.jpg" alt="Profile image"> </a>
                <div class="dropdown-menu-right dropdown-menu navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="text-center dropdown-header">
                        <img class="rounded-circle img-md" src="images/faces/face8.jpg" alt="Profile image">
                        <p class="mt-3 mb-1 font-weight-semibold">Allen Moreno</p>
                        <p class="mb-0 text-muted fw-light">allenmoreno@gmail.com</p>
                    </div>
                    <a class="dropdown-item"><i
                            class="me-2 mdi-account-outline text-primary dropdown-item-icon mdi"></i> My
                        Profile <span class="badge badge-pill badge-danger">1</span></a>
                    <a class="dropdown-item"><i
                            class="me-2 mdi-message-text-outline text-primary dropdown-item-icon mdi"></i>
                        Messages</a>
                    <a class="dropdown-item"><i
                            class="me-2 mdi-calendar-check-outline text-primary dropdown-item-icon mdi"></i>
                        Activity</a>
                    <a class="dropdown-item"><i
                            class="me-2 mdi-help-circle-outline text-primary dropdown-item-icon mdi"></i>
                        FAQ</a>
                    <a class="dropdown-item"><i class="me-2 text-primary dropdown-item-icon mdi mdi-power"></i>Sign
                        Out</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler-right align-self-center navbar-toggler d-lg-none" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
