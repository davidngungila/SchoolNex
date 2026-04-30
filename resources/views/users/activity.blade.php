@extends('layouts.app')

@section('title', 'User Activity')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">User Activity</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-chart me-1"></i> Generate Report
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#settingsModal">
                        <i class="bx bx-cog me-1"></i> Settings
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Activity Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">1,847</h4>
                                        <p class="mb-0">Total Activities</p>
                                        <small class="text-muted">Last 24 hours</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-activity avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">423</h4>
                                        <p class="mb-0">Active Users</p>
                                        <small class="text-muted">Last 24 hours</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user-check avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">89.2%</h4>
                                        <p class="mb-0">Engagement Rate</p>
                                        <small class="text-muted">Last 7 days</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-trending-up avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">12.5</h4>
                                        <p class="mb-0">Avg. Sessions/Day</p>
                                        <small class="text-muted">Per user</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-time avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="yesterday">Yesterday</option>
                            <option value="week" selected>Last 7 Days</option>
                            <option value="month">Last 30 Days</option>
                            <option value="quarter">Last Quarter</option>
                            <option value="year">Last Year</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="userType" class="form-label">User Type</label>
                        <select class="form-select" id="userType">
                            <option value="">All Types</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                            <option value="parent">Parent</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="activityType" class="form-label">Activity Type</label>
                        <select class="form-select" id="activityType">
                            <option value="">All Activities</option>
                            <option value="login">Login</option>
                            <option value="logout">Logout</option>
                            <option value="create">Create</option>
                            <option value="edit">Edit</option>
                            <option value="delete">Delete</option>
                            <option value="view">View</option>
                            <option value="download">Download</option>
                            <option value="upload">Upload</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="module" class="form-label">Module</label>
                        <select class="form-select" id="module">
                            <option value="">All Modules</option>
                            <option value="dashboard">Dashboard</option>
                            <option value="users">Users</option>
                            <option value="students">Students</option>
                            <option value="teachers">Teachers</option>
                            <option value="exams">Exams</option>
                            <option value="finance">Finance</option>
                            <option value="reports">Reports</option>
                            <option value="settings">Settings</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchUser" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchUser" placeholder="Name, Email...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Activity Timeline -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Recent Activity Timeline</h6>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="refreshTimeline()">
                            <i class="bx bx-refresh"></i> Refresh
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-marker bg-success"></div>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1">John Smith logged in</h6>
                                            <p class="text-muted mb-1">Super Admin accessed the system from 192.168.1.100</p>
                                            <small class="text-muted">{{ date('Y-m-d H:i') }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                            <div>
                                                <div class="fw-bold">John Smith</div>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-marker bg-primary"></div>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1">Sarah Johnson created new exam</h6>
                                            <p class="text-muted mb-1">Created "Mathematics Mid-term Exam" for Class 2A</p>
                                            <small class="text-muted">{{ date('Y-m-d H:i', strtotime('-30 minutes')) }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                            <div>
                                                <div class="fw-bold">Sarah Johnson</div>
                                                <small class="text-muted">Teacher</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-marker bg-warning"></div>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1">Michael Brown updated student record</h6>
                                            <p class="text-muted mb-1">Updated attendance for Emily Davis (STU004)</p>
                                            <small class="text-muted">{{ date('Y-m-d H:i', strtotime('-1 hour')) }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                            <div>
                                                <div class="fw-bold">Michael Brown</div>
                                                <small class="text-muted">Teacher</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-marker bg-danger"></div>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1">Robert Wilson deleted report</h6>
                                            <p class="text-muted mb-1">Deleted "Monthly Attendance Report" from system</p>
                                            <small class="text-muted">{{ date('Y-m-d H:i', strtotime('-2 hours')) }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                            <div>
                                                <div class="fw-bold">Robert Wilson</div>
                                                <small class="text-muted">Parent</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-marker bg-info"></div>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1">Emily Davis downloaded file</h6>
                                            <p class="text-muted mb-1">Downloaded "Student Performance Report.pdf"</p>
                                            <small class="text-muted">{{ date('Y-m-d H:i', strtotime('-3 hours')) }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                            <div>
                                                <div class="fw-bold">Emily Davis</div>
                                                <small class="text-muted">Student</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity Chart -->
                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Activity Trends</h6>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bx bx-download"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Download as PNG</a></li>
                                        <li><a class="dropdown-item" href="#">Download as PDF</a></li>
                                        <li><a class="dropdown-item" href="#">Download as Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="activityChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Activity by Type</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="activityTypeChart" width="200" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Activity Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Detailed Activity Log</h6>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="exportActivity()">
                                <i class="bx bx-download"></i> Export
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-info" onclick="clearLog()">
                                <i class="bx bx-trash"></i> Clear Log
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Date & Time</th>
                                        <th>User</th>
                                        <th>Type</th>
                                        <th>Module</th>
                                        <th>Description</th>
                                        <th>IP Address</th>
                                        <th>Device</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s') }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                                <div>
                                                    <div class="fw-bold">John Smith</div>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">Login</span></td>
                                        <td>Dashboard</td>
                                        <td>User logged in successfully</td>
                                        <td>192.168.1.100</td>
                                        <td>Chrome/Windows</td>
                                        <td><span class="badge bg-success">Success</span></td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s', strtotime('-15 minutes')) }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                                <div>
                                                    <div class="fw-bold">Sarah Johnson</div>
                                                    <small class="text-muted">Teacher</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">Create</span></td>
                                        <td>Exams</td>
                                        <td>Created new exam: Mathematics Mid-term</td>
                                        <td>192.168.1.101</td>
                                        <td>Chrome/Windows</td>
                                        <td><span class="badge bg-success">Success</span></td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s', strtotime('-30 minutes')) }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                                <div>
                                                    <div class="fw-bold">Michael Brown</div>
                                                    <small class="text-muted">Teacher</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">Edit</span></td>
                                        <td>Students</td>
                                        <td>Updated student attendance record</td>
                                        <td>192.168.1.102</td>
                                        <td>Firefox/Windows</td>
                                        <td><span class="badge bg-success">Success</span></td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s', strtotime('-45 minutes')) }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                                <div>
                                                    <div class="fw-bold">Emily Davis</div>
                                                    <small class="text-muted">Student</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-info">Download</span></td>
                                        <td>Reports</td>
                                        <td>Downloaded performance report</td>
                                        <td>192.168.1.103</td>
                                        <td>Safari/Mac</td>
                                        <td><span class="badge bg-success">Success</span></td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s', strtotime('-1 hour')) }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                                <div>
                                                    <div class="fw-bold">Robert Wilson</div>
                                                    <small class="text-muted">Parent</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">Delete</span></td>
                                        <td>Reports</td>
                                        <td>Deleted attendance report</td>
                                        <td>192.168.1.104</td>
                                        <td>Chrome/Android</td>
                                        <td><span class="badge bg-success">Success</span></td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s', strtotime('-2 hours')) }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                                <div>
                                                    <div class="fw-bold>Lisa Martinez</div>
                                                    <small class="text-muted">Student</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-secondary">Logout</span></td>
                                        <td>Dashboard</td>
                                        <td>User logged out</td>
                                        <td>192.168.1.105</td>
                                        <td>Edge/Windows</td>
                                        <td><span class="badge bg-success">Success</span></td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s', strtotime('-3 hours')) }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                                <div>
                                                    <div class="fw-bold>David Chen</div>
                                                    <small class="text-muted">Teacher</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">Create</span></td>
                                        <td>Finance</td>
                                        <td>Created new fee invoice</td>
                                        <td>192.168.1.106</td>
                                        <td>Chrome/Windows</td>
                                        <td><span class="badge bg-warning">Failed</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <nav aria-label="Activity pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Activity Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportType" class="form-label">Report Type *</label>
                            <select class="form-select" id="reportType" required>
                                <option value="">Select Report Type</option>
                                <option value="summary">Activity Summary</option>
                                <option value="detailed">Detailed Activity Log</option>
                                <option value="user_wise">User-wise Activity</option>
                                <option value="module_wise">Module-wise Activity</option>
                                <option value="security">Security Report</option>
                                <option value="engagement">User Engagement</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reportPeriod" class="form-label">Period *</label>
                            <select class="form-select" id="reportPeriod" required>
                                <option value="">Select Period</option>
                                <option value="today">Today</option>
                                <option value="yesterday">Yesterday</option>
                                <option value="week">Last 7 Days</option>
                                <option value="month">Last 30 Days</option>
                                <option value="quarter">Last Quarter</option>
                                <option value="year">Last Year</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="customDateRange" style="display: none;">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date *</label>
                            <input type="date" class="form-control" id="startDate">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">End Date *</label>
                            <input type="date" class="form-control" id="endDate">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportFormat" class="form-label">Format *</label>
                            <select class="form-select" id="reportFormat" required>
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                                <option value="csv">CSV</option>
                                <option value="html">HTML</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reportEmail" class="form-label">Email Report</label>
                            <input type="email" class="form-control" id="reportEmail" placeholder="admin@school.com">
                            <small class="text-muted">Optional: Send report to email</small>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Include Sections</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeCharts" checked>
                            <label class="form-check-label" for="includeCharts">Charts and Graphs</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeTables" checked>
                            <label class="form-check-label" for="includeTables">Data Tables</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeSummary" checked>
                            <label class="form-check-label" for="includeSummary">Executive Summary</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeRecommendations">
                            <label class="form-check-label" for="includeRecommendations">Recommendations</label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="reportFilters" class="form-label">Filters</label>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-select" id="userTypeFilter">
                                    <option value="">All User Types</option>
                                    <option value="admin">Admin</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                    <option value="parent">Parent</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" id="activityTypeFilter">
                                    <option value="">All Activities</option>
                                    <option value="login">Login/Logout</option>
                                    <option value="crud">CRUD Operations</option>
                                    <option value="reports">Reports</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" id="moduleFilter">
                                    <option value="">All Modules</option>
                                    <option value="core">Core Modules</option>
                                    <option value="academic">Academic Modules</option>
                                    <option value="admin">Admin Modules</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="generateReport()">Generate Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Activity Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportType" class="form-label">Export Type</label>
                        <select class="form-select" id="exportType">
                            <option value="current">Current View</option>
                            <option value="all">All Activities</option>
                            <option value="filtered">Filtered Activities</option>
                            <option value="selected">Selected Activities</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportFormat" class="form-label">Format</label>
                        <select class="form-select" id="exportFormat">
                            <option value="csv">CSV</option>
                            <option value="excel">Excel</option>
                            <option value="json">JSON</option>
                            <option value="xml">XML</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportEmail" class="form-label">Email Export</label>
                        <input type="email" class="form-control" id="exportEmail" placeholder="admin@school.com">
                        <small class="text-muted">Optional: Send export to email address</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeMetadata" checked>
                            <label class="form-check-label" for="includeMetadata">
                                Include metadata (IP, device, etc.)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeTimestamps" checked>
                            <label class="form-check-label" for="includeTimestamps">
                                Include timestamps
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportActivity()">Export Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Activity Monitoring Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Logging Settings</h6>
                        <div class="mb-3">
                            <label for="logLevel" class="form-label">Log Level</label>
                            <select class="form-select" id="logLevel">
                                <option value="all">All Activities</option>
                                <option value="important">Important Only</option>
                                <option value="critical">Critical Only</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="retentionPeriod" class="form-label">Retention Period (days)</label>
                            <input type="number" class="form-control" id="retentionPeriod" value="90" min="7" max="365">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableRealTime" checked>
                                <label class="form-check-label" for="enableRealTime">
                                    Enable real-time logging
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableIPTracking" checked>
                                <label class="form-check-label" for="enableIPTracking">
                                    Track IP addresses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableDeviceTracking" checked>
                                <label class="form-check-label" for="enableDeviceTracking">
                                    Track device information
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Alert Settings</h6>
                        <div class="mb-3">
                            <label for="alertThreshold" class="form-label">Failed Login Threshold</label>
                            <input type="number" class="form-control" id="alertThreshold" value="5" min="1" max="20">
                            <small class="text-muted">Alert after X failed attempts</small>
                        </div>
                        <div class="mb-3">
                            <label for="alertEmails" class="form-label">Alert Recipients</label>
                            <textarea class="form-control" id="alertEmails" rows="2" placeholder="Enter email addresses separated by commas">admin@school.com, security@school.com</textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="alertFailedLogin" checked>
                                <label class="form-check-label" for="alertFailedLogin">
                                    Alert on failed login attempts
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="alertSuspiciousActivity" checked>
                                <label class="form-check-label" for="alertSuspiciousActivity">
                                    Alert on suspicious activity
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="alertDataDeletion" checked>
                                <label class="form-check-label" for="alertDataDeletion">
                                    Alert on data deletion
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h6>Excluded Activities</h6>
                        <div class="mb-3">
                            <label for="excludedActivities" class="form-label">Activities to Exclude</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="excludePageViews">
                                <label class="form-check-label" for="excludePageViews">Page views</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="excludeApiCalls">
                                <label class="form-check-label" for="excludeApiCalls">API calls</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="excludeSystemActions">
                                <label class="form-check-label" for="excludeSystemActions">System actions</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveSettings()">Save Settings</button>
            </div>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 8px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -22px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #fff;
}

.timeline-content {
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 15px;
    margin-left: 10px;
}

.timeline-content:hover {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
</style>

<script>
document.getElementById('reportPeriod').addEventListener('change', function() {
    const customDateRange = document.getElementById('customDateRange');
    if (this.value === 'custom') {
        customDateRange.style.display = 'block';
    } else {
        customDateRange.style.display = 'none';
    }
});

// Initialize charts when page loads
document.addEventListener('DOMContentLoaded', function() {
    initializeCharts();
});

function initializeCharts() {
    // Activity Trends Chart
    const activityCtx = document.getElementById('activityChart').getContext('2d');
    new Chart(activityCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Login Activities',
                data: [120, 135, 125, 140, 130, 80, 60],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
            }, {
                label: 'CRUD Activities',
                data: [80, 95, 85, 100, 90, 45, 30],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.1
            }, {
                label: 'Other Activities',
                data: [40, 50, 45, 55, 48, 25, 20],
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    // Activity Type Chart
    const typeCtx = document.getElementById('activityTypeChart').getContext('2d');
    new Chart(typeCtx, {
        type: 'doughnut',
        data: {
            labels: ['Login/Logout', 'Create', 'Edit', 'Delete', 'Download', 'Other'],
            datasets: [{
                data: [450, 280, 190, 85, 120, 95],
                backgroundColor: [
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(255, 99, 132)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
                ]
            }]
        },
        options: {
            responsive: true
        }
    });
}

function generateReport() {
    const reportType = document.getElementById('reportType').value;
    const reportPeriod = document.getElementById('reportPeriod').value;
    const reportFormat = document.getElementById('reportFormat').value;
    
    if (!reportType || !reportPeriod) {
        alert('Please select report type and period');
        return;
    }
    
    alert(`Generating ${reportType} report for ${reportPeriod} in ${reportFormat} format...`);
    document.getElementById('reportModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Report generated successfully!');
    }, 2000);
}

function exportActivity() {
    const exportType = document.getElementById('exportType').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportType} in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Activity data exported successfully!');
    }, 1500);
}

function saveSettings() {
    const logLevel = document.getElementById('logLevel').value;
    const retentionPeriod = document.getElementById('retentionPeriod').value;
    
    alert(`Saving activity monitoring settings...`);
    document.getElementById('settingsModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Settings saved successfully!');
    }, 1000);
}

function refreshTimeline() {
    alert('Refreshing activity timeline...');
    setTimeout(() => {
        alert('Activity timeline refreshed successfully!');
    }, 1000);
}

function clearLog() {
    if (confirm('Are you sure you want to clear the activity log? This action cannot be undone.')) {
        alert('Clearing activity log...');
        setTimeout(() => {
            alert('Activity log cleared successfully!');
            location.reload();
        }, 1500);
    }
}
</script>
@endsection
