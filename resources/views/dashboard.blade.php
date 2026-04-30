@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Welcome Card -->
    <div class="col-xxl-8 mb-6 order-0">
        <div class="card">
            <div class="d-flex align-items-start row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3">Welcome to SchoolNex! </h5>
                        <p class="mb-6">
                            Your comprehensive school management system is ready.<br />Manage students, attendance, timetable, and finances efficiently.
                        </p>
                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Quick Guide</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-6">
                        <img src="{{ asset('assets/img/illustrations/man-with-laptop.png') }}" height="175" alt="School Management System">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Enhanced Quick Stats -->
    <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}" alt="students" class="rounded" />
                            </div>
                        </div>
                        <p class="mb-1">Total Students</p>
                        <h4 class="card-title mb-3">285</h4>
                        <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i> +12 new this month</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/img/icons/unicons/wallet-info.png') }}" alt="teachers" class="rounded" />
                            </div>
                        </div>
                        <p class="mb-1">Total Teachers</p>
                        <h4 class="card-title mb-3">32</h4>
                        <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i> +2 new this month</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Today's Schedule -->
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="mb-1 me-2">Today's Schedule</h5>
                    <p class="card-subtitle">Class 1A</p>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-6">
                    <div class="d-flex flex-column align-items-center gap-1">
                        <h3 class="mb-1">6</h3>
                        <small>Periods Today</small>
                    </div>
                </div>
                <ul class="p-0 m-0">
                    <li class="d-flex align-items-center mb-5">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"><i class="icon-base bx bx-time"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">07:30 - 08:30</h6>
                                <small>Mathematics - Mr. John Smith</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-5">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="icon-base bx bx-time"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">08:30 - 09:30</h6>
                                <small>English - Mrs. Sarah Johnson</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-5">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="icon-base bx bx-time"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">10:00 - 11:00</h6>
                                <small>Physics - Dr. Michael Brown</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-5">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-warning"><i class="icon-base bx bx-time"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">11:00 - 12:00</h6>
                                <small>Chemistry - Mrs. Emily Davis</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"><i class="icon-base bx bx-time"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">01:00 - 02:00</h6>
                                <small>History - Mr. James Anderson</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Attendance Overview -->
    <div class="col-md-6 col-lg-4 order-1 mb-6">
        <div class="card h-100">
            <div class="card-header nav-align-top">
                <ul class="nav nav-pills flex-wrap row-gap-2" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tabs-line-card-attendance" aria-controls="navs-tabs-line-card-attendance" aria-selected="true">
                            Attendance
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab">Summary</button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="navs-tabs-line-card-attendance" role="tabpanel">
                        <div class="d-flex mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('assets/img/icons/unicons/wallet.png') }}" alt="Attendance" />
                            </div>
                            <div>
                                <p class="mb-0">Today's Attendance</p>
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-1">92.5%</h6>
                                    <small class="text-success fw-medium">
                                        <i class="icon-base bx bx-chevron-up icon-lg"></i>
                                        2.3% from yesterday
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-6 gap-3">
                            <div class="flex-shrink-0">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="text-success fw-bold">263</div>
                                    <small>Present</small>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="text-warning fw-bold">15</div>
                                    <small>Late</small>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="text-danger fw-bold">7</div>
                                    <small>Absent</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="col-md-6 col-lg-4 order-2 mb-6">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Recent Activities</h5>
            </div>
            <div class="card-body pt-4">
                <ul class="p-0 m-0">
                    <li class="d-flex align-items-center mb-6">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/img/icons/unicons/paypal.png') }}" alt="Payment" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="d-block">Payment Received</small>
                                <h6 class="fw-normal mb-0">Ahmed Hassan - Tuition Fee</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="fw-normal mb-0">$2,500</h6>
                                <span class="text-body-secondary">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-6">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/img/icons/unicons/wallet.png') }}" alt="Attendance" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="d-block">Attendance Marked</small>
                                <h6 class="fw-normal mb-0">Class 1A - Mathematics</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="fw-normal mb-0">28/28</h6>
                                <span class="text-body-secondary">Students</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-6">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/img/icons/unicons/chart.png') }}" alt="Exam" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="d-block">Exam Results</small>
                                <h6 class="fw-normal mb-0">Physics Test - Class 1A</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="fw-normal mb-0">89%</h6>
                                <span class="text-body-secondary">Pass Rate</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mb-6">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Expense" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="d-block">Expense Recorded</small>
                                <h6 class="fw-normal mb-0">Office Supplies</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="fw-normal mb-0">$450</h6>
                                <span class="text-body-secondary">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/img/icons/unicons/wallet.png') }}" alt="Journal" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="d-block">Journal Entry</small>
                                <h6 class="fw-normal mb-0">Math Lesson - Quadratic Equations</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="fw-normal mb-0">Today</h6>
                                <span class="text-body-secondary">08:30 AM</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-6 mb-4">
                        <a href="{{ route('subjects.index') }}" class="text-decoration-none">
                            <div class="card text-center h-100 border-primary">
                                <div class="card-body">
                                    <div class="avatar avatar-lg bg-label-primary rounded-circle mx-auto mb-3">
                                        <i class="bx bx-book avatar-icon"></i>
                                    </div>
                                    <h6 class="mb-0">Subjects</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 mb-4">
                        <a href="{{ route('attendance.index') }}" class="text-decoration-none">
                            <div class="card text-center h-100 border-success">
                                <div class="card-body">
                                    <div class="avatar avatar-lg bg-label-success rounded-circle mx-auto mb-3">
                                        <i class="bx bx-user-check avatar-icon"></i>
                                    </div>
                                    <h6 class="mb-0">Attendance</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 mb-4">
                        <a href="{{ route('timetable.index') }}" class="text-decoration-none">
                            <div class="card text-center h-100 border-info">
                                <div class="card-body">
                                    <div class="avatar avatar-lg bg-label-info rounded-circle mx-auto mb-3">
                                        <i class="bx bx-calendar avatar-icon"></i>
                                    </div>
                                    <h6 class="mb-0">Timetable</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 mb-4">
                        <a href="{{ route('class-journal.index') }}" class="text-decoration-none">
                            <div class="card text-center h-100 border-warning">
                                <div class="card-body">
                                    <div class="avatar avatar-lg bg-label-warning rounded-circle mx-auto mb-3">
                                        <i class="bx bx-note avatar-icon"></i>
                                    </div>
                                    <h6 class="mb-0">Journal</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 mb-4">
                        <a href="{{ route('finance.index') }}" class="text-decoration-none">
                            <div class="card text-center h-100 border-danger">
                                <div class="card-body">
                                    <div class="avatar avatar-lg bg-label-danger rounded-circle mx-auto mb-3">
                                        <i class="bx bx-dollar avatar-icon"></i>
                                    </div>
                                    <h6 class="mb-0">Finance</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 mb-4">
                        <a href="javascript:void(0);" class="text-decoration-none">
                            <div class="card text-center h-100 border-secondary">
                                <div class="card-body">
                                    <div class="avatar avatar-lg bg-label-secondary rounded-circle mx-auto mb-3">
                                        <i class="bx bx-chart avatar-icon"></i>
                                    </div>
                                    <h6 class="mb-0">Reports</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Analytics Section -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Advanced Analytics & Performance Metrics</h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bx bx-download me-1"></i> Export Report
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Export as PDF</a></li>
                            <li><a class="dropdown-item" href="#">Export as Excel</a></li>
                            <li><a class="dropdown-item" href="#">Send via Email</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Academic Performance Chart -->
                        <div class="col-lg-8 mb-4">
                            <h6 class="mb-3">Academic Performance Overview</h6>
                            <div class="card border">
                                <div class="card-body">
                                    <canvas id="performanceChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Key Performance Indicators -->
                        <div class="col-lg-4 mb-4">
                            <h6 class="mb-3">Key Performance Indicators</h6>
                            <div class="card border">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>Student Pass Rate</span>
                                            <span class="badge bg-success">87.5%</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-success" style="width: 87.5%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>Teacher Attendance</span>
                                            <span class="badge bg-info">92.3%</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-info" style="width: 92.3%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>Fee Collection</span>
                                            <span class="badge bg-warning">78.9%</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-warning" style="width: 78.9%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>Resource Utilization</span>
                                            <span class="badge bg-primary">65.4%</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-primary" style="width: 65.4%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Subject-wise Performance -->
                        <div class="col-lg-6 mb-4">
                            <h6 class="mb-3">Subject-wise Performance</h6>
                            <div class="card border">
                                <div class="card-body">
                                    <canvas id="subjectChart" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Class-wise Distribution -->
                        <div class="col-lg-6 mb-4">
                            <h6 class="mb-3">Class-wise Student Distribution</h6>
                            <div class="card border">
                                <div class="card-body">
                                    <canvas id="classChart" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Financial Overview -->
                        <div class="col-lg-4 mb-4">
                            <h6 class="mb-3">Financial Overview</h6>
                            <div class="card border">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <tr>
                                                <td><strong>Total Revenue</strong></td>
                                                <td class="text-success">$45,670</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Expenses</strong></td>
                                                <td class="text-danger">$12,340</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Net Profit</strong></td>
                                                <td class="text-primary">$33,330</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Collection Rate</strong></td>
                                                <td><span class="badge bg-success">78.9%</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Attendance Trends -->
                        <div class="col-lg-4 mb-4">
                            <h6 class="mb-3">Attendance Trends</h6>
                            <div class="card border">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Today's Attendance</span>
                                            <span class="text-success">92.5%</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Weekly Average</span>
                                            <span class="text-info">89.2%</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Monthly Average</span>
                                            <span class="text-warning">85.7%</span>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <div class="d-flex justify-content-between">
                                            <span>Year to Date</span>
                                            <span class="text-primary">87.3%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Resource Utilization -->
                        <div class="col-lg-4 mb-4">
                            <h6 class="mb-3">Resource Utilization</h6>
                            <div class="card border">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Classroom Usage</span>
                                            <span class="text-info">78.4%</span>
                                        </div>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-info" style="width: 78.4%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Lab Utilization</span>
                                            <span class="text-success">65.2%</span>
                                        </div>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-success" style="width: 65.2%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Library Usage</span>
                                            <span class="text-warning">82.1%</span>
                                        </div>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-warning" style="width: 82.1%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <div class="d-flex justify-content-between">
                                            <span>Sports Facilities</span>
                                            <span class="text-primary">71.8%</span>
                                        </div>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-primary" style="width: 71.8%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Recent Alerts & Notifications -->
                        <div class="col-lg-6 mb-4">
                            <h6 class="mb-3">Recent Alerts & Notifications</h6>
                            <div class="card border">
                                <div class="card-body">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="bx bx-error text-danger me-2"></i>
                                                <span>Low attendance in Class 3B</span>
                                            </div>
                                            <small class="text-muted">2 hours ago</small>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="bx bx-check-circle text-success me-2"></i>
                                                <span>Fee collection target achieved</span>
                                            </div>
                                            <small class="text-muted">5 hours ago</small>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="bx bx-info-circle text-info me-2"></i>
                                                <span>New teacher onboarding completed</span>
                                            </div>
                                            <small class="text-muted">1 day ago</small>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="bx bx-warning text-warning me-2"></i>
                                                <span>System maintenance scheduled</span>
                                            </div>
                                            <small class="text-muted">2 days ago</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Upcoming Events -->
                        <div class="col-lg-6 mb-4">
                            <h6 class="mb-3">Upcoming Events & Deadlines</h6>
                            <div class="card border">
                                <div class="card-body">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="bx bx-calendar text-primary me-2"></i>
                                                <span>Mid-term Exams Start</span>
                                            </div>
                                            <small class="text-muted">In 3 days</small>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="bx bx-dollar text-success me-2"></i>
                                                <span>Fee Payment Deadline</span>
                                            </div>
                                            <small class="text-muted">In 5 days</small>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="bx bx-file text-info me-2"></i>
                                                <span>Report Submission Due</span>
                                            </div>
                                            <small class="text-muted">In 1 week</small>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="bx bx-group text-warning me-2"></i>
                                                <span>Parent-Teacher Meeting</span>
                                            </div>
                                            <small class="text-muted">In 2 weeks</small>
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
@endsection

<script>
// Initialize all charts when page loads
document.addEventListener('DOMContentLoaded', function() {
    initializePerformanceChart();
    initializeSubjectChart();
    initializeClassChart();
});

function initializePerformanceChart() {
    const ctx = document.getElementById('performanceChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Student Performance',
                    data: [85, 88, 82, 90, 87, 92],
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.4
                }, {
                    label: 'Teacher Performance',
                    data: [92, 89, 94, 88, 91, 95],
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Academic Performance Trends'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Performance Score'
                        }
                    }
                }
            }
        });
    }
}

function initializeSubjectChart() {
    const ctx = document.getElementById('subjectChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mathematics', 'English', 'Science', 'History', 'Geography', 'Physics'],
                datasets: [{
                    label: 'Average Score',
                    data: [85, 78, 92, 73, 88, 81],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Subject-wise Performance'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Average Score'
                        }
                    }
                }
            }
        });
    }
}

function initializeClassChart() {
    const ctx = document.getElementById('classChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Class 1A', 'Class 1B', 'Class 2A', 'Class 2B', 'Class 3A', 'Class 3B'],
                datasets: [{
                    data: [45, 42, 38, 40, 35, 37],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right'
                    },
                    title: {
                        display: true,
                        text: 'Class-wise Student Distribution'
                    }
                }
            }
        });
    }
}
</script>
