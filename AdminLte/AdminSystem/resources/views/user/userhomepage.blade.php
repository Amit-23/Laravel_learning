@extends('user.userlayout.main-layout')
@section('content')

<style>
    /* Increase the size of the info-box */
    .info-box {
        padding: 20px;
        /* Add more padding for a larger box */
        min-height: 150px;
        /* Increase the minimum height */
    }

    /* Increase the icon size */
    .large-icon {
        font-size: 3rem;
        /* Makes the icon larger */
        width: 80px;
        /* Adjusts icon container width */
        height: 80px;
        /* Adjusts icon container height */
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="row">
    <!-- Completed Tasks -->
    <div class="col-12 col-sm-6 col-md-4">
        <a href="" class="text-decoration-none">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1 large-icon"><i class="fas fa-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Completed Tasks</span>
                    <span class="info-box-number">{{ $completedCount }}</span>
                </div>
            </div>
        </a>
    </div>

    <!-- Started (In Progress) Tasks -->
    <div class="col-12 col-sm-6 col-md-4">
        <!-- route(tasks.inprogress) -->
        <a href="" class="text-decoration-none">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1 large-icon"><i class="fas fa-play"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Started Tasks</span>
                    <span class="info-box-number">{{ $inProgressCount }}</span>
                </div>
            </div>
        </a>
    </div>

    <!-- Overdue Tasks -->
    <div class="col-12 col-sm-6 col-md-4">
        <a href="" class="text-decoration-none">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1 large-icon"><i class="far fa-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Overdue Tasks</span>
                    <span class="info-box-number">{{ $overdueCount }}</span>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection