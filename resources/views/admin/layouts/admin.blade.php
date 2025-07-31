<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Admin Tsawi') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="fixed-top d-flex flex-row align-items-top p-0 navbar default-layout col-lg-12 col-12">
            <div class="d-flex align-items-center justify-content-start text-center navbar-brand-wrapper">
                <div class="me-3">
                    <button class="align-self-center navbar-toggler navbar-toggler" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <img src="images/logo.svg" alt="logo" />
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
                        <a class="nav-link count-indicator" id="notificationDropdown" href="#"
                            data-bs-toggle="dropdown">
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
                        <a class="nav-link count-indicator" id="countDropdown" href="#"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                            <a class="dropdown-item"><i
                                    class="me-2 text-primary dropdown-item-icon mdi mdi-power"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler-right align-self-center navbar-toggler d-lg-none" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="bg-light me-3 border rounded-circle img-ss"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="bg-dark me-3 border rounded-circle img-ss"></div>Dark
                    </div>
                    <p class="mt-2 settings-heading">HEADER SKINS</p>
                    <div class="mx-0 px-4 color-tiles">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="border-top nav nav-tabs" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section"
                            role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section"
                            role="tab" aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="scroll-wrapper tab-pane fade show active" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="d-flex mb-0 px-3 add-items">
                            <form class="w-100 form">
                                <div class="form-group d-flex">
                                    <input type="text" class="todo-list-input form-control"
                                        placeholder="Add To-do">
                                    <button type="submit" class="todo-list-add-btn add btn btn-primary"
                                        id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="px-3 list-wrapper">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                        <h4 class="mt-5 mb-0 px-3 text-muted fw-light">Events</h4>
                        <div class="px-3 pt-4 events">
                            <div class="d-flex mb-2 wrapper">
                                <i class="me-2 text-primary ti-control-record"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="mb-0 text-gray">The total number of sessions</p>
                        </div>
                        <div class="px-3 pt-4 events">
                            <div class="d-flex mb-2 wrapper">
                                <i class="me-2 text-primary ti-control-record"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="mb-0 text-gray">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="mb-3 pt-0 pb-0 pl-3 border-top-0 border-bottom-0 settings-heading">Friends</p>
                            <small
                                class="mb-3 pt-0 pr-3 pb-0 border-top-0 border-bottom-0 settings-heading fw-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="my-auto text-muted">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <div class="d-flex wrapper">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="mx-2 my-auto badge badge-success badge-pill">4</div>
                                <small class="my-auto text-muted">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="my-auto text-muted">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="my-auto text-muted">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="my-auto text-muted">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="my-auto text-muted">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="mdi-grid-large mdi menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">UI Elements</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">UI Elements</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="flex-column nav sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/typography.html">Typography</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Forms and Datas</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="mdi-card-text-outline menu-icon mdi"></i>
                            <span class="menu-title">Form elements</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="flex-column nav sub-menu">
                                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic
                                        Elements</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false"
                            aria-controls="charts">
                            <i class="menu-icon mdi mdi-chart-line"></i>
                            <span class="menu-title">Charts</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="flex-column nav sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/charts/chartjs.html">ChartJs</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <i class="mdi-table menu-icon mdi"></i>
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="flex-column nav sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic
                                        table</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false"
                            aria-controls="icons">
                            <i class="mdi-layers-outline menu-icon mdi"></i>
                            <span class="menu-title">Icons</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="flex-column nav sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">pages</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                            aria-controls="auth">
                            <i class="mdi-account-circle-outline menu-icon mdi"></i>
                            <span class="menu-title">User Pages</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="flex-column nav sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">help</li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Documentation</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="ps-0 nav-link active" id="home-tab" data-bs-toggle="tab"
                                                href="#overview" role="tab" aria-controls="overview"
                                                aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                href="#audiences" role="tab" aria-selected="false">Audiences</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                                href="#demographics" role="tab"
                                                aria-selected="false">Demographics</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="border-0 nav-link" id="more-tab" data-bs-toggle="tab"
                                                href="#more" role="tab" aria-selected="false">More</a>
                                        </li>
                                    </ul>
                                    <div>
                                        <div class="btn-wrapper">
                                            <a href="#" class="align-items-center btn btn-otline-dark"><i
                                                    class="icon-share"></i> Share</a>
                                            <a href="#" class="btn btn-otline-dark"><i
                                                    class="icon-printer"></i> Print</a>
                                            <a href="#" class="me-0 text-white btn btn-primary"><i
                                                    class="icon-download"></i> Export</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content-basic tab-content">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                        aria-labelledby="overview">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div
                                                    class="d-flex align-items-center justify-content-between statistics-details">
                                                    <div>
                                                        <p class="statistics-title">Bounce Rate</p>
                                                        <h3 class="rate-percentage">32.53%</h3>
                                                        <p class="d-flex text-danger"><i
                                                                class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                                                    </div>
                                                    <div>
                                                        <p class="statistics-title">Page Views</p>
                                                        <h3 class="rate-percentage">7,682</h3>
                                                        <p class="d-flex text-success"><i
                                                                class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                                                    </div>
                                                    <div>
                                                        <p class="statistics-title">New Sessions</p>
                                                        <h3 class="rate-percentage">68.8</h3>
                                                        <p class="d-flex text-danger"><i
                                                                class="mdi mdi-menu-down"></i><span>68.8</span></p>
                                                    </div>
                                                    <div class="d-md-block d-none">
                                                        <p class="statistics-title">Avg. Time on Site</p>
                                                        <h3 class="rate-percentage">2m:35s</h3>
                                                        <p class="d-flex text-success"><i
                                                                class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                                    </div>
                                                    <div class="d-md-block d-none">
                                                        <p class="statistics-title">New Sessions</p>
                                                        <h3 class="rate-percentage">68.8</h3>
                                                        <p class="d-flex text-danger"><i
                                                                class="mdi mdi-menu-down"></i><span>68.8</span></p>
                                                    </div>
                                                    <div class="d-md-block d-none">
                                                        <p class="statistics-title">Avg. Time on Site</p>
                                                        <h3 class="rate-percentage">2m:35s</h3>
                                                        <p class="d-flex text-success"><i
                                                                class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-flex flex-column col-lg-8">
                                                <div class="flex-grow row">
                                                    <div class="grid-margin col-12 col-lg-4 col-lg-12 stretch-card">
                                                        <div class="card-rounded card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-sm-flex align-items-start justify-content-between">
                                                                    <div>
                                                                        <h4 class="card-title card-title-dash">
                                                                            Performance Line Chart</h4>
                                                                        <h5 class="card-subtitle card-subtitle-dash">
                                                                            Lorem Ipsum is simply dummy text of the
                                                                            printing</h5>
                                                                    </div>
                                                                    <div id="performance-line-legend"></div>
                                                                </div>
                                                                <div class="mt-5 chartjs-wrapper">
                                                                    <canvas id="performaneLine"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column col-lg-4">
                                                <div class="flex-grow row">
                                                    <div class="grid-margin col-md-6 col-lg-12 stretch-card">
                                                        <div class="bg-primary card-rounded card">
                                                            <div class="pb-0 card-body">
                                                                <h4 class="mb-4 text-white card-title card-title-dash">
                                                                    Status Summary</h4>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <p class="mb-1 status-summary-ight-white">
                                                                            Closed Value</p>
                                                                        <h2 class="text-info">357</h2>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="pb-4 status-summary-chart-wrapper">
                                                                            <canvas id="status-summary"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-margin col-md-6 col-lg-12 stretch-card">
                                                        <div class="card-rounded card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between mb-2 mb-sm-0">
                                                                            <div class="circle-progress-width">
                                                                                <div id="totalVisitors"
                                                                                    class="pr-2 progressbar-js-circle">
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <p class="mb-2 text-small">Total
                                                                                    Visitors</p>
                                                                                <h4 class="mb-0 fw-bold">26.80%</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <div class="circle-progress-width">
                                                                                <div id="visitperday"
                                                                                    class="pr-2 progressbar-js-circle">
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <p class="mb-2 text-small">Visits per
                                                                                    day</p>
                                                                                <h4 class="mb-0 fw-bold">9065</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-flex flex-column col-lg-8">
                                                <div class="flex-grow row">
                                                    <div class="grid-margin col-12 stretch-card">
                                                        <div class="card-rounded card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-sm-flex align-items-start justify-content-between">
                                                                    <div>
                                                                        <h4 class="card-title card-title-dash">Market
                                                                            Overview</h4>
                                                                        <p class="card-subtitle card-subtitle-dash">
                                                                            Lorem ipsum dolor sit amet consectetur
                                                                            adipisicing elit</p>
                                                                    </div>
                                                                    <div>
                                                                        <div class="dropdown">
                                                                            <button
                                                                                class="me-0 mb-0 btn btn-secondary dropdown-toggle toggle-dark btn-lg"
                                                                                type="button"
                                                                                id="dropdownMenuButton2"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"> This month
                                                                            </button>
                                                                            <div class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenuButton2">
                                                                                <h6 class="dropdown-header">Settings
                                                                                </h6>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Action</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Another action</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Something else
                                                                                    here</a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item"
                                                                                    href="#">Separated link</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="d-sm-flex align-items-center justify-content-between mt-1">
                                                                    <div
                                                                        class="d-sm-flex align-items-center justify-content-between mt-4">
                                                                        <h2 class="me-2 fw-bold">$36,2531.00</h2>
                                                                        <h4 class="me-2">USD</h4>
                                                                        <h4 class="text-success">(+1.37%)</h4>
                                                                    </div>
                                                                    <div class="me-3">
                                                                        <div id="marketing-overview-legend"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3 chartjs-bar-wrapper">
                                                                    <canvas id="marketingOverview"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow row">
                                                    <div class="grid-margin col-12 stretch-card">
                                                        <div class="table-darkBGImg card-rounded card">
                                                            <div class="card-body">
                                                                <div class="col-sm-8">
                                                                    <h3 class="mb-0 text-white upgrade-info">
                                                                        Enhance your <span
                                                                            class="fw-bold">Campaign</span> for better
                                                                        outreach
                                                                    </h3>
                                                                    <a href="#"
                                                                        class="btn btn-info upgrade-btn">Upgrade
                                                                        Account!</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow row">
                                                    <div class="grid-margin col-12 stretch-card">
                                                        <div class="card-rounded card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-sm-flex align-items-start justify-content-between">
                                                                    <div>
                                                                        <h4 class="card-title card-title-dash">Pending
                                                                            Requests</h4>
                                                                        <p class="card-subtitle card-subtitle-dash">You
                                                                            have 50+ new requests</p>
                                                                    </div>
                                                                    <div>
                                                                        <button
                                                                            class="me-0 mb-0 text-white btn btn-primary btn-lg"
                                                                            type="button"><i
                                                                                class="mdi mdi-account-plus"></i>Add
                                                                            new member</button>
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive mt-1">
                                                                    <table class="table select-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    <div
                                                                                        class="mt-0 form-check form-check-flat">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </th>
                                                                                <th>Customer</th>
                                                                                <th>Company</th>
                                                                                <th>Progress</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="mt-0 form-check form-check-flat">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <img src="images/faces/face1.jpg"
                                                                                            alt="">
                                                                                        <div>
                                                                                            <h6>Brandon Washington</h6>
                                                                                            <p>Head admin</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>Company name 1</h6>
                                                                                    <p>company type</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex align-items-center justify-content-between mb-1 max-width-progress-wrap">
                                                                                            <p class="text-success">79%
                                                                                            </p>
                                                                                            <p>85/162</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="progress progress-md">
                                                                                            <div class="bg-success progress-bar"
                                                                                                role="progressbar"
                                                                                                style="width: 85%"
                                                                                                aria-valuenow="25"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="badge-opacity-warning badge">
                                                                                        In progress</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="mt-0 form-check form-check-flat">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <img src="images/faces/face2.jpg"
                                                                                            alt="">
                                                                                        <div>
                                                                                            <h6>Laura Brooks</h6>
                                                                                            <p>Head admin</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>Company name 1</h6>
                                                                                    <p>company type</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex align-items-center justify-content-between mb-1 max-width-progress-wrap">
                                                                                            <p class="text-success">65%
                                                                                            </p>
                                                                                            <p>85/162</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="progress progress-md">
                                                                                            <div class="bg-success progress-bar"
                                                                                                role="progressbar"
                                                                                                style="width: 65%"
                                                                                                aria-valuenow="65"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="badge-opacity-warning badge">
                                                                                        In progress</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="mt-0 form-check form-check-flat">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <img src="images/faces/face3.jpg"
                                                                                            alt="">
                                                                                        <div>
                                                                                            <h6>Wayne Murphy</h6>
                                                                                            <p>Head admin</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>Company name 1</h6>
                                                                                    <p>company type</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex align-items-center justify-content-between mb-1 max-width-progress-wrap">
                                                                                            <p class="text-success">65%
                                                                                            </p>
                                                                                            <p>85/162</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="progress progress-md">
                                                                                            <div class="bg-warning progress-bar"
                                                                                                role="progressbar"
                                                                                                style="width: 38%"
                                                                                                aria-valuenow="38"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="badge-opacity-warning badge">
                                                                                        In progress</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="mt-0 form-check form-check-flat">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <img src="images/faces/face4.jpg"
                                                                                            alt="">
                                                                                        <div>
                                                                                            <h6>Matthew Bailey</h6>
                                                                                            <p>Head admin</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>Company name 1</h6>
                                                                                    <p>company type</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex align-items-center justify-content-between mb-1 max-width-progress-wrap">
                                                                                            <p class="text-success">65%
                                                                                            </p>
                                                                                            <p>85/162</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="progress progress-md">
                                                                                            <div class="bg-danger progress-bar"
                                                                                                role="progressbar"
                                                                                                style="width: 15%"
                                                                                                aria-valuenow="15"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="badge-opacity-danger badge">
                                                                                        Pending</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="mt-0 form-check form-check-flat">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <img src="images/faces/face5.jpg"
                                                                                            alt="">
                                                                                        <div>
                                                                                            <h6>Katherine Butler</h6>
                                                                                            <p>Head admin</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>Company name 1</h6>
                                                                                    <p>company type</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex align-items-center justify-content-between mb-1 max-width-progress-wrap">
                                                                                            <p class="text-success">65%
                                                                                            </p>
                                                                                            <p>85/162</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="progress progress-md">
                                                                                            <div class="bg-success progress-bar"
                                                                                                role="progressbar"
                                                                                                style="width: 65%"
                                                                                                aria-valuenow="65"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="badge-opacity-success badge">
                                                                                        Completed</div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow row">
                                                    <div class="grid-margin col-md-6 col-lg-6 stretch-card">
                                                        <div class="card-rounded card">
                                                            <div class="card-rounded card-body">
                                                                <h4 class="card-title card-title-dash">Recent Events
                                                                </h4>
                                                                <div
                                                                    class="align-items-center py-2 border-bottom list">
                                                                    <div class="w-100 wrapper">
                                                                        <p class="mb-2 font-weight-medium">
                                                                            Change in Directors
                                                                        </p>
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <div class="d-flex align-items-center">
                                                                                <i
                                                                                    class="me-1 text-muted mdi mdi-calendar"></i>
                                                                                <p class="mb-0 text-muted text-small">
                                                                                    Mar 14, 2019</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="align-items-center py-2 border-bottom list">
                                                                    <div class="w-100 wrapper">
                                                                        <p class="mb-2 font-weight-medium">
                                                                            Other Events
                                                                        </p>
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <div class="d-flex align-items-center">
                                                                                <i
                                                                                    class="me-1 text-muted mdi mdi-calendar"></i>
                                                                                <p class="mb-0 text-muted text-small">
                                                                                    Mar 14, 2019</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="align-items-center py-2 border-bottom list">
                                                                    <div class="w-100 wrapper">
                                                                        <p class="mb-2 font-weight-medium">
                                                                            Quarterly Report
                                                                        </p>
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <div class="d-flex align-items-center">
                                                                                <i
                                                                                    class="me-1 text-muted mdi mdi-calendar"></i>
                                                                                <p class="mb-0 text-muted text-small">
                                                                                    Mar 14, 2019</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="align-items-center py-2 border-bottom list">
                                                                    <div class="w-100 wrapper">
                                                                        <p class="mb-2 font-weight-medium">
                                                                            Change in Directors
                                                                        </p>
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <div class="d-flex align-items-center">
                                                                                <i
                                                                                    class="me-1 text-muted mdi mdi-calendar"></i>
                                                                                <p class="mb-0 text-muted text-small">
                                                                                    Mar 14, 2019</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="align-items-center pt-3 list">
                                                                    <div class="w-100 wrapper">
                                                                        <p class="mb-0">
                                                                            <a href="#"
                                                                                class="text-primary fw-bold">Show all
                                                                                <i
                                                                                    class="mdi-arrow-right ms-2 mdi"></i></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-margin col-md-6 col-lg-6 stretch-card">
                                                        <div class="card-rounded card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between mb-3">
                                                                    <h4 class="card-title card-title-dash">Activities
                                                                    </h4>
                                                                    <p class="mb-0">20 finished, 5 remaining</p>
                                                                </div>
                                                                <ul class="bullet-line-list">
                                                                    <li>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div><span class="text-light-green">Ben
                                                                                    Tossell</span> assign you a task
                                                                            </div>
                                                                            <p>Just now</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div><span class="text-light-green">Oliver
                                                                                    Noah</span> assign you a task</div>
                                                                            <p>1h</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div><span class="text-light-green">Jack
                                                                                    William</span> assign you a task
                                                                            </div>
                                                                            <p>1h</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div><span class="text-light-green">Leo
                                                                                    Lucas</span> assign you a task</div>
                                                                            <p>1h</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div><span class="text-light-green">Thomas
                                                                                    Henry</span> assign you a task</div>
                                                                            <p>1h</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div><span class="text-light-green">Ben
                                                                                    Tossell</span> assign you a task
                                                                            </div>
                                                                            <p>1h</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div><span class="text-light-green">Ben
                                                                                    Tossell</span> assign you a task
                                                                            </div>
                                                                            <p>1h</p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="align-items-center pt-3 list">
                                                                    <div class="w-100 wrapper">
                                                                        <p class="mb-0">
                                                                            <a href="#"
                                                                                class="text-primary fw-bold">Show all
                                                                                <i
                                                                                    class="mdi-arrow-right ms-2 mdi"></i></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column col-lg-4">
                                                <div class="flex-grow row">
                                                    <div class="grid-margin col-12 stretch-card">
                                                        <div class="card-rounded card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <h4 class="card-title card-title-dash">Todo
                                                                                list</h4>
                                                                            <div class="d-flex mb-0 add-items">
                                                                                <!-- <input type="text" class="todo-list-input form-control" placeholder="What do you need to do today?"> -->
                                                                                <button
                                                                                    class="me-0 pl-12p btn-rounded text-white todo-list-add-btn add btn btn-icons btn-primary"><i
                                                                                        class="mdi mdi-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="list-wrapper">
                                                                            <ul class="todo-list-rounded todo-list">
                                                                                <li class="d-block">
                                                                                    <div class="w-100 form-check">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input class="checkbox"
                                                                                                type="checkbox"> Lorem
                                                                                            Ipsum is simply dummy text
                                                                                            of the printing <i
                                                                                                class="rounded input-helper"></i>
                                                                                        </label>
                                                                                        <div class="d-flex mt-2">
                                                                                            <div
                                                                                                class="me-3 ps-4 text-small">
                                                                                                24 June 2020</div>
                                                                                            <div
                                                                                                class="badge-opacity-warning me-3 badge">
                                                                                                Due tomorrow</div>
                                                                                            <i
                                                                                                class="ms-2 mdi mdi-flag flag-color"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="d-block">
                                                                                    <div class="w-100 form-check">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input class="checkbox"
                                                                                                type="checkbox"> Lorem
                                                                                            Ipsum is simply dummy text
                                                                                            of the printing <i
                                                                                                class="rounded input-helper"></i>
                                                                                        </label>
                                                                                        <div class="d-flex mt-2">
                                                                                            <div
                                                                                                class="me-3 ps-4 text-small">
                                                                                                23 June 2020</div>
                                                                                            <div
                                                                                                class="badge-opacity-success me-3 badge">
                                                                                                Done</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="w-100 form-check">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input class="checkbox"
                                                                                                type="checkbox"> Lorem
                                                                                            Ipsum is simply dummy text
                                                                                            of the printing <i
                                                                                                class="rounded input-helper"></i>
                                                                                        </label>
                                                                                        <div class="d-flex mt-2">
                                                                                            <div
                                                                                                class="me-3 ps-4 text-small">
                                                                                                24 June 2020</div>
                                                                                            <div
                                                                                                class="badge-opacity-success me-3 badge">
                                                                                                Done</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="border-bottom-0">
                                                                                    <div class="w-100 form-check">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input class="checkbox"
                                                                                                type="checkbox"> Lorem
                                                                                            Ipsum is simply dummy text
                                                                                            of the printing <i
                                                                                                class="rounded input-helper"></i>
                                                                                        </label>
                                                                                        <div class="d-flex mt-2">
                                                                                            <div
                                                                                                class="me-3 ps-4 text-small">
                                                                                                24 June 2020</div>
                                                                                            <div
                                                                                                class="badge-opacity-danger me-3 badge">
                                                                                                Expired</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow row">
                                                    <div class="grid-margin col-12 stretch-card">
                                                        <div class="card-rounded card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between mb-3">
                                                                            <h4 class="card-title card-title-dash">Type
                                                                                By Amount</h4>
                                                                        </div>
                                                                        <canvas class="my-auto" id="doughnutChart"
                                                                            height="200"></canvas>
                                                                        <div id="doughnut-chart-legend"
                                                                            class="mt-5 text-center"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow row">
                                                    <div class="grid-margin col-12 stretch-card">
                                                        <div class="card-rounded card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between mb-3">
                                                                            <div>
                                                                                <h4 class="card-title card-title-dash">
                                                                                    Leave Report</h4>
                                                                            </div>
                                                                            <div>
                                                                                <div class="dropdown">
                                                                                    <button
                                                                                        class="me-0 mb-0 btn btn-secondary dropdown-toggle toggle-dark btn-lg"
                                                                                        type="button"
                                                                                        id="dropdownMenuButton3"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"> Month
                                                                                        Wise </button>
                                                                                    <div class="dropdown-menu"
                                                                                        aria-labelledby="dropdownMenuButton3">
                                                                                        <h6 class="dropdown-header">
                                                                                            week Wise</h6>
                                                                                        <a class="dropdown-item"
                                                                                            href="#">Year
                                                                                            Wise</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <canvas id="leaveReport"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow row">
                                                    <div class="grid-margin col-12 stretch-card">
                                                        <div class="card-rounded card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between mb-3">
                                                                            <div>
                                                                                <h4 class="card-title card-title-dash">
                                                                                    Top Performer</h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-between py-2 border-bottom wrapper">
                                                                                <div class="d-flex">
                                                                                    <img class="rounded-10 img-sm"
                                                                                        src="images/faces/face1.jpg"
                                                                                        alt="profile">
                                                                                    <div class="ms-3 wrapper">
                                                                                        <p class="ms-1 mb-1 fw-bold">
                                                                                            Brandon Washington</p>
                                                                                        <small
                                                                                            class="mb-0 text-muted">162543</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-muted text-small">
                                                                                    1h ago
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-between py-2 border-bottom wrapper">
                                                                                <div class="d-flex">
                                                                                    <img class="rounded-10 img-sm"
                                                                                        src="images/faces/face2.jpg"
                                                                                        alt="profile">
                                                                                    <div class="ms-3 wrapper">
                                                                                        <p class="ms-1 mb-1 fw-bold">
                                                                                            Wayne Murphy</p>
                                                                                        <small
                                                                                            class="mb-0 text-muted">162543</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-muted text-small">
                                                                                    1h ago
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-between py-2 border-bottom wrapper">
                                                                                <div class="d-flex">
                                                                                    <img class="rounded-10 img-sm"
                                                                                        src="images/faces/face3.jpg"
                                                                                        alt="profile">
                                                                                    <div class="ms-3 wrapper">
                                                                                        <p class="ms-1 mb-1 fw-bold">
                                                                                            Katherine Butler</p>
                                                                                        <small
                                                                                            class="mb-0 text-muted">162543</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-muted text-small">
                                                                                    1h ago
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-between py-2 border-bottom wrapper">
                                                                                <div class="d-flex">
                                                                                    <img class="rounded-10 img-sm"
                                                                                        src="images/faces/face4.jpg"
                                                                                        alt="profile">
                                                                                    <div class="ms-3 wrapper">
                                                                                        <p class="ms-1 mb-1 fw-bold">
                                                                                            Matthew Bailey</p>
                                                                                        <small
                                                                                            class="mb-0 text-muted">162543</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-muted text-small">
                                                                                    1h ago
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-between pt-2 wrapper">
                                                                                <div class="d-flex">
                                                                                    <img class="rounded-10 img-sm"
                                                                                        src="images/faces/face5.jpg"
                                                                                        alt="profile">
                                                                                    <div class="ms-3 wrapper">
                                                                                        <p class="ms-1 mb-1 fw-bold">
                                                                                            Rafell John</p>
                                                                                        <small
                                                                                            class="mb-0 text-muted">Alaska,
                                                                                            USA</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-muted text-small">
                                                                                    1h ago
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-sm-between justify-content-center">
                        <span class="d-block d-sm-inline-block text-muted text-sm-left text-center">Premium <a
                                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a>
                            from BootstrapDash.</span>
                        <span class="d-block float-sm-right float-none mt-1 mt-sm-0 text-center">Copyright © 2021. All
                            rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
