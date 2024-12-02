@extends('admin.layouts.adminlayout')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Registered Users Card -->
            <div class="col-md-6 col-sm-12">
                <div class="card bg-warning shadow-lg text-white">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="ion ion-person-add fa-3x"></i>
                        </div>
                        <div>
                            <h3 class="mb-0">{{ $totalUsers }}</h3>
                            <p class="mb-0">Registered Users</p>
                        </div>
                    </div>
                    <div class="card-footer text-center bg-warning-dark">
                        <a href="{{ route('registeredUsersList') }}" class="text-white text-decoration-none">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Total Tasks Card -->
            <div class="col-md-6 col-sm-12">
                <div class="card bg-danger shadow-lg text-white">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="ion ion-pie-graph fa-3x"></i>
                        </div>
                        <div>
                            <h3 class="mb-0">{{ $totalTasks }}</h3>
                            <p class="mb-0">Total Tasks</p>
                        </div>
                    </div>
                    <div class="card-footer text-center bg-danger-dark">
                        <a href="{{ route('admintasks') }}" class="text-white text-decoration-none">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
