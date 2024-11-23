@extends('admin.layouts.adminlayout')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Full-width card for Registered Users -->
            <div class="col-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$totalUsers}}</h3>
                        <p>Registered Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('registeredUsersList') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Full-width card for Total Tasks -->
            <div class="col-12">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$totalTasks}}</h3>
                        <p>Total Tasks</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('admintasks') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
