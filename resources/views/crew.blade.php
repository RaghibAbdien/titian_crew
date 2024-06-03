<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Dashboard | Veltrix - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
    
        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

        <!-- Sweet Alert 2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

        <style>
            .cursor-pointer{
                cursor: pointer;
            }
        </style>
    
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
                                @if ( $NotifNotReadNum )
                                <span class="badge bg-danger rounded-pill">{{ $NotifNotReadNum }}</span>
                                @endif
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 pb-1 font-size-16 border-bottom">
                                                 Notifications @if ($NotifNotReadNum)
                                                     {{ $NotifNotReadNum }}
                                                     @else 
                                                 @endif
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    @forelse ( $notifs as $notif )
                                    <div class="text-reset notification-item cursor-pointer" data-bs-toggle="modal" data-bs-target="#myNotif{{ $notif->id }}">
                                        <div class="w-100 d-flex align-items-center">
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
                                    </div>
                                    @empty
                                        <div class="w-100 d-flex align-items-center">
                                            <p class="mx-auto">Tidak ada pemberitahuan saat ini</p>
                                        </div>
                                    @endforelse 
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
                                    <h6 class="page-title">Management Crew</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Welcome to Management Crew</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Tambah Crew</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h1 class="card-title text-center fs-3 pb-3">Crewing</h1>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Email</th>
                                                <th>No.HP</th>
                                                <th>Lokasi</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                                
                                                
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($crews as $crew)
                                                <tr>
                                                    <td>{{ $crew->id_crew }}</td>
                                                    <td>{{ $crew->nama_crew }}</td>
                                                    <td>{{ $crew->alamat_crew }}</td>
                                                    <td>{{ $crew->email_crew }}</td>
                                                    <td>{{ $crew->nohp_crew }}</td>
                                                    <td>{{ $crew->lokasi->nama_lokasi }}</td>
                                                    <td>
                                                        <div class="
                                                        @if ($crew->status_crew === 1)
                                                        badge bg-success
                                                        @else
                                                         badge bg-danger
                                                        @endif
                                                    ">
                                                        @if ($crew->status_crew === 1)
                                                            Aktif
                                                        @else
                                                            Tidak Aktif    
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myDetail{{ $crew->id_crew }}">
                                                            <i class="mdi mdi-eye"></i>
                                                        </button>
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

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

        <!-- Modal Tambah Crew -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="crewForm" action="{{ route('tambah-crew') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Tambah Crew</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col">
                                <div class="col-md-12 pb-3">
                                    <label for="id-crew" class="form-label">ID Crew</label>
                                    <input type="text" class="form-control" id="id-crew" name="id_crew" required value="{{ old('id_crew') }}">
                                    @error('id_crew')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 pb-3">
                                    <label for="nama" class="form-label">Nama Crew</label>
                                    <input type="text" class="form-control" id="nama" name="nama_crew" autocomplete="name" required value="{{ old('nama_crew') }}">
                                    @error('nama_crew')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="alamat_crew">Alamat :</label>
                                    <textarea id="alamat_crew" class="form-control" rows="3" name="alamat_crew" autocomplete="alamat_crew" required>{{ old('alamat_crew') }}</textarea>
                                    @error('alamat_crew')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 pb-3">
                                    <label for="email_crew" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email_crew" name="email_crew" autocomplete="email" required value="{{ old('email_crew') }}">
                                    @error('email_crew')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 pb-3">
                                    <label for="password_crew" class="form-label">No. HP</label>
                                    <input type="text" class="form-control" id="password_crew" name="nohp_crew" autocomplete="nohp_crew" required value="{{ old('nohp_crew') }}">
                                    @error('nohp_crew')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="card pb-3">
                                    <label for="lokasi_crew" class="form-label">Lokasi</label>
                                    <select class="form-select" aria-label="Default select example" id="lokasi_crew" name="lokasi_crew_id" required>
                                        @foreach($lokasis as $lokasi)
                                            <option value="{{ $lokasi->id }}" {{ old('lokasi_crew_id') == $lokasi->id ? 'selected' : '' }}>{{ $lokasi->nama_lokasi }}</option>
                                        @endforeach
                                    </select>
                                    @error('lokasi_crew_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">CV (.pdf) (2MB)</label>
                                    <input type="file" class="filestyle" data-buttonname="btn-secondary" name="cv_path">
                                    @error('cv_path')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">KTP (.pdf) (2MB)</label>
                                    <input type="file" class="filestyle" data-buttonname="btn-secondary" name="ktp_path">
                                    @error('ktp_path')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Vaksin (.pdf) (2MB)</label>
                                    <input type="file" class="filestyle" data-buttonname="btn-secondary" id="file-vaksin" name="vaksin_path[]" multiple>
                                    @if($errors->has('vaksin_path.*'))
                                        <div class="text-danger">
                                            @foreach($errors->get('vaksin_path.*') as $message)
                                                {{ $message[0] }}<br>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div id="selected-files">
                                    <h6>File yang Dipilih:</h6>
                                    <ul id="file-list-vaksin"></ul>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">PKWT (.pdf) (2MB)</label>
                                    <input type="file" class="filestyle" data-buttonname="btn-secondary" name="pkwt_path">
                                    @error('pkwt_path')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sertifikat (.pdf) (2MB)</label>
                                    <input type="file" class="filestyle" data-buttonname="btn-secondary" id="file-sertif" name="sertifikat_path[]" multiple>
                                    @if($errors->has('sertifikat_path.*'))
                                        <div class="text-danger">
                                            @foreach($errors->get('sertifikat_path.*') as $message)
                                                {{ $message[0] }}<br>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div id="selected-files">
                                    <h6>File yang Dipilih:</h6>
                                    <ul id="file-list-sertif"></ul>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ijazah (.pdf) (2MB)</label>
                                    <input type="file" class="filestyle" data-buttonname="btn-secondary" name="ijazah_path">
                                    @error('ijazah_path')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto Crew</label>
                                    <input type="file" class="filestyle" data-buttonname="btn-secondary" name="foto-crew_path">
                                    @error('foto-crew_path')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NPWP (.pdf) (2MB)</label>
                                    <input type="file" class="filestyle" data-buttonname="btn-secondary" name="npwp_path">
                                    @error('npwp_path')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SKCK (.pdf) (2MB)</label>
                                    <input type="file" class="filestyle" data-buttonname="btn-secondary" name="skck_path">
                                    @error('skck_path')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Medical Check Up (.pdf) (2MB)</label>
                                    <input type="file" class="filestyle" data-buttonname="btn-secondary" name="mcu_path">
                                    @error('mcu_path')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_mcu" class="col-sm-6 col-form-label">Tanggal Pemeriksaan MCU</label>
                                    <input class="form-control" type="date" id="tgl_mcu" required name="tgl_mcu" value="{{ old('tgl_mcu') }}">
                                    @error('tgl_mcu')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="expired_mcu" class="col-sm-6 col-form-label">Tanggal Expired MCU</label>
                                    <input class="form-control" type="date" id="expired_mcu" required name="expired_mcu">
                                    @error('expired_mcu')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="awal_kontrak" class="col-sm-6 col-form-label">Tanggal Mulai Kontrak</label>
                                    <input class="form-control" type="date" id="awal_kontrak" required name="awal_kontrak" value="{{ old('awal_kontrak') }}">
                                    @error('awal_kontrak')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="berakhir_kontrak" class="col-sm-6 col-form-label">Tanggal Berakhir Kontrak</label>
                                    <input class="form-control" type="date" id="berakhir_kontrak" required name="berakhir_kontrak">
                                    @error('berakhir_kontrak')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 pb-3">
                                    <label for="no_rekening" class="form-label">No Rekening</label>
                                    <input type="text" class="form-control" id="no_rekening" name="no_rekening" required value="{{ old('no_rekening') }}">
                                    @error('no_rekening')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Detail Crew -->
        @foreach ($docs as $doc )
        <div id="myDetail{{ $doc->id_crew }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Detail Crew</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card mb-3">
                                <img src="assets/images/gallery/work-2.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">Keterangan</h5>
                                  <ul class="card-text">
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>CV</span>
                                            <a href="{{ Storage::url($doc->cv_path) }}" target="_blank" class="btn btn-primary waves-effect waves-light">Lihat CV</a>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>KTP</span>
                                            <a href="{{ Storage::url($doc->ktp_path) }}" target="_blank" class="btn btn-primary waves-effect waves-light">Lihat KTP</a>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>PKWT</span>
                                            <a href="{{ Storage::url($doc->pkwt_path) }}" target="_blank" class="btn btn-primary waves-effect waves-light">Lihat PKWT</a>
                                        </div>
                                    </li>    
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>Ijazah</span>
                                            <a href="{{ Storage::url($doc->ijazah_path) }}" target="_blank" class="btn btn-primary waves-effect waves-light">Lihat Ijazah</a>
                                        </div>
                                    </li>    
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>NPWP</span>
                                            <a href="{{ Storage::url($doc->npwp_path) }}" target="_blank" class="btn btn-primary waves-effect waves-light">Lihat NPWP</a>
                                        </div>
                                    </li>    
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>SKCK</span>
                                            <a href="{{ Storage::url($doc->skck_path) }}" target="_blank" class="btn btn-primary waves-effect waves-light">Lihat SKCK</a>
                                        </div>
                                    </li>    
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>No. Rekening</span>
                                            <span class="fs-4 fw-bold">{{ $doc->no_rekening }}</span>
                                        </div>
                                    </li>    
                                    @if(!empty($doc->vaksin_path))
                                       <li class="list-group-item">
                                           <div class="d-flex flex-column justify-content-between align-items-center">
                                               <span>Vaksin</span>
                                               <div>
                                                   @php $no = 1; @endphp
                                                    @foreach(json_decode($doc->vaksin_path) as $vaksin)
                                                   <a href="{{ Storage::url($vaksin) }}" target="_blank" class="btn btn-primary waves-effect waves-light">Vaksin No. {{ $no }}</a>
                                                   @php $no++; @endphp
                                                   @endforeach
                                                </div>
                                           </div>
                                       </li>
                                   @endif
                                   @if(!empty($doc->sertifikat_path))
                                   <li class="list-group-item">
                                       <div class="d-flex flex-column justify-content-between align-items-center">
                                           <span>Sertifikat</span>
                                           <div>
                                               @php $no = 1; @endphp
                                                @foreach(json_decode($doc->sertifikat_path) as $sertif)
                                               <a href="{{ Storage::url($sertif) }}" target="_blank" class="btn btn-primary waves-effect waves-light">Sertif No. {{ $no }}</a>
                                               @php $no++; @endphp
                                               @endforeach
                                           </div>
                                       </div>
                                   </li>
                                   @endif    
                                    
                                  </ul>
                                </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        @endforeach

        <!-- Modal Notif Content -->
        @foreach ($notifs as $notif )
            <div id="myNotif{{ $notif->id }}" data-bs-backdrop="static" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Notifications
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="font-size-16">{{ $notif->title }}</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

        @endforeach

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        
        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <!-- Form  -->
        <script src="assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>

        <!-- FontAwesome Icon Link -->
        <script src="https://kit.fontawesome.com/91441035a6.js" crossorigin="anonymous"></script>

        <script src="assets/js/app.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Reset form and clear error messages when modal is closed
                var modalElement = document.getElementById('myModal');
                var formElement = document.getElementById('crewForm');
                var errorElements = document.querySelectorAll('.text-danger');
        
                modalElement.addEventListener('hidden.bs.modal', function (event) {
                    formElement.reset();
                    formElement.querySelectorAll('.form-control').forEach(function(input) {
                        input.value = '';
                    });
                    formElement.querySelectorAll('.form-select').forEach(function(select) {
                        select.selectedIndex = 0;
                    });
                    // Clear error messages
                    errorElements.forEach(function(error) {
                        error.textContent = '';
                    });
                });
        
                // Show error messages when modal is opened
                @if ($errors->any())
                    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                    myModal.show();
                @endif
            });

            document.getElementById('tgl_mcu').addEventListener('change', function() {
                var tglMcu = this.value;
                document.getElementById('expired_mcu').setAttribute('min', tglMcu);
            });

            document.addEventListener('DOMContentLoaded', (event) => {
                const tglMcuInput = document.getElementById('tgl_mcu');
                const expiredMcuInput = document.getElementById('expired_mcu');
                const tglKontrakInput = document.getElementById('awal_kontrak');
                const expiredKontrakInput = document.getElementById('berakhir_kontrak');
                
                // Disable expired_mcu input initially
                expiredMcuInput.disabled = true;
                
                tglMcuInput.addEventListener('input', function() {
                    if (this.value) {
                        // Enable expired_mcu input if tgl_mcu is filled
                        expiredMcuInput.disabled = false;
                    } else {
                        // Disable expired_mcu input if tgl_mcu is empty
                        expiredMcuInput.disabled = true;
                        expiredMcuInput.value = ''; // Clear the value of expired_mcu
                    }
                });

                // Untuk Tanggal Kontrak
                expiredKontrakInput.disabled = true;
                
                tglKontrakInput.addEventListener('input', function() {
                    if (this.value) {
                        
                        expiredKontrakInput.disabled = false;
                    } else {
                        
                        expiredKontrakInput.disabled = true;
                        expiredKontrakInput.value = ''; 
                    }
                });
            });

            const fileInput = document.getElementById('file-sertif');
            const fileList = document.getElementById('file-list-sertif');
            let selectedFiles = [];

            fileInput.addEventListener('change', function(event) {
            const files = event.target.files;
            for (const file of files) {
                selectedFiles.push(file.name);
            }
            renderSelectedFiles();
            });

            function renderSelectedFiles() {
            fileList.innerHTML = '';
            for (const fileName of selectedFiles) {
                const listItem = document.createElement('li');
                listItem.textContent = fileName;
                fileList.appendChild(listItem);
            }
            }

            $(document).ready(function() {
                $('div[id^="myNotif"]').on('shown.bs.modal', function (e) {
                    var modalId = $(this).attr('id');
                    var notifId = modalId.replace('myNotif', '');
                    $.ajax({
                        url: '/update-notif',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: notifId
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

            @if(session('error'))
            <script>
                // Tampilkan SweetAlert2 dengan pesan error
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ session('error') }}'
                });
            </script>
            @endif

            @if (session('success'))
            <script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            @endif  



    </body>

</html>