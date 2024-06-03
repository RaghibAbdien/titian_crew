<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="/dashboard" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="18">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>

                        
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-none d-lg-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline"></i>
                                @if ( $NotifNotRead )
                                <span class="badge bg-danger rounded-pill">{{ $NotifNotRead }}</span>
                                @endif
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 font-size-16">
                                                 Notifications ({{ $NotifNotRead }})
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    @foreach ( $notifs as $notif )
                                        @if ($NotifNotRead)
                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <span class="avatar-title bg-warning rounded-circle font-size-16">
                                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">{{ $notif->title }}</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <span class="mb-1">Crew : {{ $notif->nama_crew }}</span>
                                                        <p class="mb-1">{{ $notif->message }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            View all
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/user-4.jpg"
                                    alt="Header Avatar">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <span class="dropdown-item"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i>Halo, {{ auth()->user()->nama }}</span>
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</button>
                                </form>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="{{ route('dashboard') }}" class="waves-effect">
                                    <i class="ti-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('crew') }}" class="waves-effect">
                                    <i class="ti-user"></i>
                                    <span>Crew</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Dashboard</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Welcome to Veltrix Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <i class="fa-solid fa-user-group fa-2x"></i>
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Crew</h5>
                                            <h4 class="fw-medium font-size-24">{{ $jmlhCrew }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <i class="fa-solid fa-map-location-dot fa-2x"></i>
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Lokasi</h5>
                                            <h4 class="fw-medium font-size-24">{{ $jmlhLokasi }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <i class="fa-solid fa-helmet-safety fa-2x"></i>
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Proyek</h5>
                                            <h4 class="fw-medium font-size-24">15</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                © <script>document.write(new Date().getFullYear())</script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- FontAwesome Icon Link -->
        <script src="https://kit.fontawesome.com/91441035a6.js" crossorigin="anonymous"></script>

        <script src="assets/js/app.js"></script>

        <script>
            $(document).ready(function() {
                $('div[id^="myNotif"]').on('shown.bs.modal', function (e) {
                    var modalId = $(this).attr('id');
                    var notifId = modalId.replace('myNotif', '');
                    
                     // Mendapatkan waktu saat ini
                    var currentTime = new Date();

                    // Menambahkan 7 hari ke waktu saat ini
                    currentTime.setDate(currentTime.getDate() + 7);

                    // Mengonversi waktu ke format yang sesuai untuk MySQL (YYYY-MM-DD HH:MM:SS)
                    var year = currentTime.getFullYear();
                    var month = ('0' + (currentTime.getMonth() + 1)).slice(-2);
                    var day = ('0' + currentTime.getDate()).slice(-2);
                    var hours = ('0' + currentTime.getHours()).slice(-2);
                    var minutes = ('0' + currentTime.getMinutes()).slice(-2);
                    var seconds = ('0' + currentTime.getSeconds()).slice(-2);
                    var formattedTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

                    $.ajax({
                        url: '/update-notif',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: notifId,
                            duration: formattedTime
                        },
                        success: function(response) {
                            console.log('Notification status updated successfully.');
                        },
                        error: function(error) {
                            console.log('Error updating notification status:', error);
                        }
                    });
                });
            });


            $(document).ready(function() {
                $('div[id^="myNotif"]').on('hidden.bs.modal', function (e) {
                    location.reload(); // Reload halaman saat modal ditutup
                });
            });
        </script>


    </body>

</html>