<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta property="og:image" content="https://vecom.shop/images/slider_logo.png">
    <meta name="description" content="Vecom.shop - Sàn thương mại điện tử lớn nhất Châu Á. Gồm đầy đủ các mặt hàng tốt nhất thị trường trong và ngoài nước" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo-icons/slider_logo.webp') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@350&family=Roboto:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('assets/js/admin/jquery.js') }}"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('assets/lib/bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <script src="{{ asset('assets/lib/bootstrap-5.0.2/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
    <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @yield('styles')
    <link href="{{ asset('assets/css/admin/admin-template.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin/mobile.css') }}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>SB Admin 2 - Blank</title>

</head>

<body id="page-top">
    <div class="loader">
        <img src="{{ asset('assets/images/logo-icons/loader.gif') }}" class="w-100" alt="">
    </div>
    <div id="application">
        <div id="wrapper">
            <ul class="navbar-nav sidebar sidebar-dark accordion background-primary" id="accordionSidebar" style="border-right: 2px solid gray;">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <ion-icon name="happy-outline" style="font-size: 30px;"></ion-icon>
                    </div>
                    <div class="sidebar-brand-text mx-3">Clothes Shop <sup>Admin</sup></div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item ps-1">
                    <a class="nav-link" href="{{ route('admin.index') }}">
                        <span style="font-size: 16px;">Dashboard</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <!-- <i class="fas fa-fw fa-cog"></i> -->
                        <span style="font-size: 16px;">Customers</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Customers Components:</h6>
                            <a class="collapse-item" href="{{ route('admin.user.index') }}" >
                                All Customers
                            </a>
                            <a class="collapse-item" href="cards.html">New  Customer</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <!-- <i class="fas fa-fw fa-wrench"></i> -->
                        <span style="font-size: 16px;">Products</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Products Components:</h6>
                            <a class="collapse-item" href="{{ route('admin.product.index') }}">All Products</a>
                            <a class="collapse-item" href="{{ route('admin.product.create') }}">New Product</a>
                            <a class="collapse-item" href="{{ route('admin.product.create') }}">New Variant Product</a>
                            <a class="collapse-item" href="{{ route('admin.product.category') }}">Category</a>
                            <a class="collapse-item" href="utilities-other.html">Other</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                        aria-controls="collapsePages">
                        <!-- <i class="fas fa-fw fa-folder"></i> -->
                        <span style="font-size: 16px;">Blogs</span>
                    </a>
                    <!-- collapse  show  để mở-->
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Blogs Components:</h6>
                            <a class="collapse-item" href="{{ route('admin.blog') }}">All Blogs</a>
                            <a class="collapse-item" href="{{ route('admin.blog.create') }}">New Blog</a>
                            <a class="collapse-item" href="forgot-password.html">Category</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true"
                        aria-controls="collapseOrder">
                        <!-- <i class="fas fa-fw fa-folder"></i> -->
                        <span style="font-size: 16px;">Orders</span>
                    </a>
                    <!-- collapse  show  để mở-->
                    <div id="collapseOrder" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Orders Components:</h6>
                            <a class="collapse-item" href="{{ route('admin.order') }}">All Orders</a>
                            <a class="collapse-item" href="forgot-password.html">Pendings</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true"
                        aria-controls="collapseReport">
                        <!-- <i class="fas fa-fw fa-folder"></i> -->
                        <span style="font-size: 16px;">Reports</span>
                    </a>
                    <!-- collapse  show  để mở-->
                    <div id="collapseReport" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Report Components:</h6>
                            <a class="collapse-item" href="login.html">Monthly Report</a>
                            <a class="collapse-item" href="forgot-password.html">Orther</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMail" aria-expanded="true"
                        aria-controls="collapseMail">
                        <!-- <i class="fas fa-fw fa-folder"></i> -->
                        <span style="font-size: 16px;">Email Settings</span>
                    </a>
                    <!-- collapse  show  để mở-->
                    <div id="collapseMail" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Report Components:</h6>
                            <a class="collapse-item" href="login.html">Send Mail</a>
                            <a class="collapse-item" href="forgot-password.html">Setting</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMember" aria-expanded="true"
                        aria-controls="collapseMember">
                        <!-- <i class="fas fa-fw fa-folder"></i> -->
                        <span style="font-size: 16px;">Members</span>
                    </a>
                    <!-- collapse  show  để mở-->
                    <div id="collapseMember" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Members Components:</h6>
                            <a class="collapse-item" href="login.html">All Members</a>
                            <a class="collapse-item" href="forgot-password.html">Roles</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.language') }}">
                        <!-- <i class="fas fa-fw fa-table"></i> -->
                        <span style="font-size: 16px;">Languages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="charts.html" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true"
                        aria-controls="collapseSetting">
                        <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                        <span style="font-size: 16px;">Settings</span>
                    </a>
                    <!-- collapse  show  để mở-->
                    <div id="collapseSetting" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Settings Components:</h6>
                            <a class="collapse-item" href="{{ route('admin.setting.master') }}">Tổng thể ( Master )</a>
                            <a class="collapse-item" href="{{ route('admin.setting.homepage') }}">Trang chủ</a>
                            <a class="collapse-item" href="forgot-password.html">Sản phẩm</a>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0 text-light" id="sidebarToggle">
                        <ion-icon name="analytics-outline"></ion-icon>
                    </button>
                </div>
            </ul>
            <div id="content-wrapper" class="d-flex flex-column background-body">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light background-primary topbar static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 text-light">
                            <ion-icon name="code-outline"  style="font-size:24px"></ion-icon>
                        </button>
                        <form class="d-none pb-3 d-sm-inline-block form-inline me-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 small" placeholder="Nhập từ khóa tìm kiếm..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary ms-2" type="button">
                                        <ion-icon name="search-outline" style="font-size: 24px;"></ion-icon>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <ion-icon name="search-outline" style="font-size: 24px;"></ion-icon>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Nhập từ khóa tìm kiếm..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <ion-icon name="search-outline" style="font-size: 24px;"></ion-icon>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle p-0" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <ion-icon name="alert-circle-outline" style="font-size: 24px;"></ion-icon>
                                    <sup class="ms-1 badge bg-danger">3</sup>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="me-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 12, 2019</div>
                                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="me-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 7, 2019</div>
                                            $290.29 has been deposited into your account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="me-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 2, 2019</div>
                                            Spending Alert: We've noticed unusually high spending for your account.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>

                            <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <ion-icon name="chatbox-ellipses-outline" style="font-size: 24px;"></ion-icon>
                                    <sup class="ms-1 badge bg-danger">3</sup>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image me-3">
                                            <img class="rounded-circle" src="{{ asset('assets/images/logo-icons/undraw_profile_1.svg') }}"
                                                alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                                problem I've been having.</div>
                                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image me-3">
                                            <img class="rounded-circle" src="{{ asset('assets/images/logo-icons/undraw_profile_2.svg') }}"
                                                alt="...">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">I have the photos that you ordered last month, how
                                                would you like them sent to you?</div>
                                            <div class="small text-gray-500">Jae Chun · 1d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image me-3">
                                            <img class="rounded-circle" src="{{ asset('assets/images/logo-icons/undraw_profile_3.svg') }}"
                                                alt="...">
                                            <div class="status-indicator bg-warning"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Last month's report looks great, I am very happy with
                                                the progress so far, keep up the good work!</div>
                                            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image me-3">
                                            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                                alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                                told me that people say this to all dogs, even if they aren't good...</div>
                                            <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="me-2 d-none d-lg-inline text-gray-600 small">Truong Quoc Duy</span>
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('assets/images/logo-icons/undraw_profile.svg') }}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" id="logout-btn" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <div class="container-fluid background-body p-4 text-light h-100"  id="app">
                        @yield('content')
                    </div>
                </div>
                <footer class="sticky-footer background-body text-light">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Created by Truong Quoc Duy - 2022</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <ion-icon name="prism-outline"></ion-icon>
        </a>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('admin.logout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('assets/js/admin/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/js/admin/admin-template.js') }}"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('scripts')
<script>
    $(window).on("load",function () {
        $(".loader").css("display","none")
        $("#application").css("display","block")
    });
</script>
</html>