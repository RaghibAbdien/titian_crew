@extends('layout.main')

@section('title', 'Dashboard')


@section('content')
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
</div>
@endsection