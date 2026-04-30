@extends('layouts.app')

@section('title', 'Login History')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Login History</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
                        <i class="bx bx-filter me-1"></i> Filter
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#securityModal">
                        <i class="bx bx-shield me-1"></i> Security
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Login Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">1,245</h4>
                                        <p class="mb-0">Total Logins</p>
                                        <small class="text-muted">Last 24 hours</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-log-in avatar-icon"></i>
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
                                        <h4 class="mb-0">1,198</h4>
                                        <p class="mb-0">Successful</p>
                                        <small class="text-muted">96.2% success rate</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-check-circle avatar-icon"></i>
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
                                        <h4 class="mb-0">47</h4>
                                        <p class="mb-0">Failed</p>
                                        <small class="text-muted">3.8% failure rate</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-x-circle avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">12</h4>
                                        <p class="mb-0">Suspicious</p>
                                        <small class="text-muted">Requires attention</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-error avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Filter -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="loginStatus" class="form-label">Status</label>
                        <select class="form-select" id="loginStatus">
                            <option value="">All Status</option>
                            <option value="success">Successful</option>
                            <option value="failed">Failed</option>
                            <option value="suspicious">Suspicious</option>
                            <option value="blocked">Blocked</option>
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
                        <label for="timeRange" class="form-label">Time Range</label>
                        <select class="form-select" id="timeRange">
                            <option value="1hour">Last Hour</option>
                            <option value="6hours">Last 6 Hours</option>
                            <option value="24hours" selected>Last 24 Hours</option>
                            <option value="7days">Last 7 Days</option>
                            <option value="30days">Last 30 Days</option>
                            <option value="custom">Custom Range</option>
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
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-success w-100">
                            <i class="bx bx-refresh"></i> Refresh
                        </button>
                    </div>
                </div>

                <!-- Login History Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>IP Address</th>
                                <th>Device</th>
                                <th>Location</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">john.smith@school.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Success</span></td>
                                <td>192.168.1.100</td>
                                <td>Chrome 120.0 / Windows 10</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td>2h 34m</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewLoginModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#blockIPModal"><i class="bx bx-block me-2"></i>Block IP</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#forceLogoutModal"><i class="bx bx-log-out me-2"></i>Force Logout</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-15 minutes')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Sarah Johnson</div>
                                            <small class="text-muted">sarah.johnson@school.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Success</span></td>
                                <td>192.168.1.101</td>
                                <td>Firefox 115.0 / Windows 11</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td>45m</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewLoginModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#blockIPModal"><i class="bx bx-block me-2"></i>Block IP</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#forceLogoutModal"><i class="bx bx-log-out me-2"></i>Force Logout</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-30 minutes')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Michael Brown</div>
                                            <small class="text-muted">michael.brown@school.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Failed</span></td>
                                <td>192.168.1.102</td>
                                <td>Chrome 120.0 / macOS</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td>-</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewLoginModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#blockIPModal"><i class="bx bx-block me-2"></i>Block IP</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#investigateModal"><i class="bx bx-search me-2"></i>Investigate</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-1 hour')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Emily Davis</div>
                                            <small class="text-muted">emily.davis@school.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">Suspicious</span></td>
                                <td>192.168.1.103</td>
                                <td>Unknown / Unknown</td>
                                <td>Unknown Location</td>
                                <td>15m</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewLoginModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#blockIPModal"><i class="bx bx-block me-2"></i>Block IP</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#investigateModal"><i class="bx bx-search me-2"></i>Investigate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#blockUserModal"><i class="bx bx-user-x me-2"></i>Block User</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-2 hours')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Robert Wilson</div>
                                            <small class="text-muted">robert.wilson@school.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Success</span></td>
                                <td>192.168.1.104</td>
                                <td>Safari 16.0 / iPhone</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td>1h 15m</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewLoginModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#blockIPModal"><i class="bx bx-block me-2"></i>Block IP</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#forceLogoutModal"><i class="bx bx-log-out me-2"></i>Force Logout</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-3 hours')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Lisa Martinez</div>
                                            <small class="text-muted">lisa.martinez@school.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Failed</span></td>
                                <td>192.168.1.105</td>
                                <td>Edge 120.0 / Windows 10</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td>-</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewLoginModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#blockIPModal"><i class="bx bx-block me-2"></i>Block IP</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#investigateModal"><i class="bx bx-search me-2"></i>Investigate</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-4 hours')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>David Chen</div>
                                            <small class="text-muted">david.chen@school.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-secondary">Blocked</span></td>
                                <td>192.168.1.106</td>
                                <td>Chrome 120.0 / Android</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td>-</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewLoginModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item text-success" href="#" data-bs-toggle="modal" data-bs-target="#unblockIPModal"><i class="bx bx-check me-2"></i>Unblock IP</a></li>
                                            <li><a class="dropdown-item text-success" href="#" data-bs-toggle="modal" data-bs-target="#unblockUserModal"><i class="bx bx-check me-2"></i>Unblock User</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Login pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- View Login Modal -->
<div class="modal fade" id="viewLoginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login Session Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Session Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Date & Time:</strong></td>
                                <td>{{ date('Y-m-d H:i:s') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Success</span></td>
                            </tr>
                            <tr>
                                <td><strong>Session ID:</strong></td>
                                <td>SES_abc123def456</td>
                            </tr>
                            <tr>
                                <td><strong>Duration:</strong></td>
                                <td>2h 34m</td>
                            </tr>
                            <tr>
                                <td><strong>Last Activity:</strong></td>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-15 minutes')) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>User Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>John Smith</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>john.smith@school.com</td>
                            </tr>
                            <tr>
                                <td><strong>User Type:</strong></td>
                                <td><span class="badge bg-primary">Admin</span></td>
                            </tr>
                            <tr>
                                <td><strong>User ID:</strong></td>
                                <td>USR001</td>
                            </tr>
                            <tr>
                                <td><strong>Role:</strong></td>
                                <td>Super Admin</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <h6>Device Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>IP Address:</strong></td>
                                <td>192.168.1.100</td>
                            </tr>
                            <tr>
                                <td><strong>Browser:</strong></td>
                                <td>Chrome 120.0</td>
                            </tr>
                            <tr>
                                <td><strong>Platform:</strong></td>
                                <td>Windows 10</td>
                            </tr>
                            <tr>
                                <td><strong>Device Type:</strong></td>
                                <td>Desktop</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Location Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Country:</strong></td>
                                <td>Tanzania</td>
                            </tr>
                            <tr>
                                <td><strong>City:</strong></td>
                                <td>Dar es Salaam</td>
                            </tr>
                            <tr>
                                <td><strong>ISP:</strong></td>
                                <td>Tanzania Telecom</td>
                            </tr>
                            <tr>
                                <td><strong>Timezone:</strong></td>
                                <td>GMT+3</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h6>Session Activity</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Activity</th>
                                        <th>Page</th>
                                        <th>IP Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s') }}</td>
                                        <td>Login</td>
                                        <td>/dashboard</td>
                                        <td>192.168.1.100</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s', strtotime('-15 minutes')) }}</td>
                                        <td>Page View</td>
                                        <td>/students</td>
                                        <td>192.168.1.100</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s', strtotime('-30 minutes')) }}</td>
                                        <td>Page View</td>
                                        <td>/reports</td>
                                        <td>192.168.1.100</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s', strtotime('-1 hour')) }}</td>
                                        <td>Page View</td>
                                        <td>/settings</td>
                                        <td>192.168.1.100</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#forceLogoutModal">Force Logout</button>
                <button type="button" class="btn btn-primary" onclick="exportSession()">Export Session</button>
            </div>
        </div>
    </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Advanced Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterStatus" class="form-label">Login Status</label>
                            <select class="form-select" id="filterStatus">
                                <option value="">All Status</option>
                                <option value="success">Successful</option>
                                <option value="failed">Failed</option>
                                <option value="suspicious">Suspicious</option>
                                <option value="blocked">Blocked</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterUserType" class="form-label">User Type</label>
                            <select class="form-select" id="filterUserType">
                                <option value="">All Types</option>
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                                <option value="parent">Parent</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterStartTime" class="form-label">Start Date</label>
                            <input type="datetime-local" class="form-control" id="filterStartTime">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterEndTime" class="form-label">End Date</label>
                            <input type="datetime-local" class="form-control" id="filterEndTime">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterIP" class="form-label">IP Address</label>
                            <input type="text" class="form-control" id="filterIP" placeholder="Enter IP address or range">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterDevice" class="form-label">Device Type</label>
                            <select class="form-select" id="filterDevice">
                                <option value="">All Devices</option>
                                <option value="desktop">Desktop</option>
                                <option value="mobile">Mobile</option>
                                <option value="tablet">Tablet</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="filterLocation" placeholder="Enter city or country">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterUser" class="form-label">User</label>
                            <input type="text" class="form-control" id="filterUser" placeholder="Enter name or email">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="applyFilter()">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Login History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportType" class="form-label">Export Type</label>
                        <select class="form-select" id="exportType">
                            <option value="current">Current View</option>
                            <option value="filtered">Filtered Results</option>
                            <option value="date_range">Date Range</option>
                            <option value="all">All Records</option>
                        </select>
                    </div>
                    
                    <div class="row" id="dateRangeExport" style="display: none;">
                        <div class="col-md-6 mb-3">
                            <label for="exportStartDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="exportStartDate">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exportEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="exportEndDate">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportFormat" class="form-label">Format</label>
                        <select class="form-select" id="exportFormat">
                            <option value="csv">CSV</option>
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF Report</option>
                            <option value="json">JSON</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportEmail" class="form-label">Email Export</label>
                        <input type="email" class="form-control" id="exportEmail" placeholder="admin@school.com">
                        <small class="text-muted">Optional: Send export to email address</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeSessionData" checked>
                            <label class="form-check-label" for="includeSessionData">Include session activity data</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeGeoData" checked>
                            <label class="form-check-label" for="includeGeoData">Include geolocation data</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeDeviceData" checked>
                            <label class="form-check-label" for="includeDeviceData">Include device information</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportHistory()">Export History</button>
            </div>
        </div>
    </div>
</div>

<!-- Security Modal -->
<div class="modal fade" id="securityModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Security Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Login Security</h6>
                        <div class="mb-3">
                            <label for="maxAttempts" class="form-label">Max Failed Attempts</label>
                            <input type="number" class="form-control" id="maxAttempts" value="5" min="1" max="20">
                            <small class="text-muted">Lock account after X failed attempts</small>
                        </div>
                        <div class="mb-3">
                            <label for="lockoutDuration" class="form-label">Lockout Duration (minutes)</label>
                            <input type="number" class="form-control" id="lockoutDuration" value="30" min="5" max="1440">
                            <small class="text-muted">Account locked for X minutes</small>
                        </div>
                        <div class="mb-3">
                            <label for="sessionTimeout" class="form-label">Session Timeout (hours)</label>
                            <input type="number" class="form-control" id="sessionTimeout" value="8" min="1" max="24">
                            <small class="text-muted">Auto-logout after X hours of inactivity</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>IP Security</h6>
                        <div class="mb-3">
                            <label for="ipWhitelist" class="form-label">IP Whitelist</label>
                            <textarea class="form-control" id="ipWhitelist" rows="3" placeholder="Enter IP addresses, one per line">192.168.1.0/24
10.0.0.0/8</td>
                        </div>
                        <div class="mb-3">
                            <label for="ipBlacklist" class="form-label">IP Blacklist</label>
                            <textarea class="form-control" id="ipBlacklist" rows="3" placeholder="Enter IP addresses, one per line"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableGeoBlocking" checked>
                                <label class="form-check-label" for="enableGeoBlocking">Enable geolocation blocking</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableDeviceFingerprinting">
                                <label class="form-check-label" for="enableDeviceFingerprinting">Enable device fingerprinting</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h6>Suspicious Activity Detection</h6>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="detectMultipleUsers" checked>
                                    <label class="form-check-label" for="detectMultipleUsers">Multiple users from same IP</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="detectRapidLogins" checked>
                                    <label class="form-check-label" for="detectRapidLogins">Rapid login attempts</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="detectUnusualHours" checked>
                                    <label class="form-check-label" for="detectUnusualHours">Unusual login hours</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="detectUnknownDevices" checked>
                                    <label class="form-check-label" for="detectUnknownDevices">Unknown devices</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="detectConcurrentSessions">
                                    <label class="form-check-label" for="detectConcurrentSessions">Concurrent sessions</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="detectLocationChanges">
                                    <label class="form-check-label" for="detectLocationChanges">Location changes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveSecuritySettings()">Save Settings</button>
            </div>
        </div>
    </div>
</div>

<!-- Block IP Modal -->
<div class="modal fade" id="blockIPModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Block IP Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="blockIP" class="form-label">IP Address *</label>
                        <input type="text" class="form-control" id="blockIP" value="192.168.1.100" required>
                        <small class="text-muted">Enter IP address to block</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="blockReason" class="form-label">Reason *</label>
                        <textarea class="form-control" id="blockReason" rows="3" required>Suspicious activity detected from this IP address</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="blockDuration" class="form-label">Block Duration</label>
                            <select class="form-select" id="blockDuration">
                                <option value="1hour">1 hour</option>
                                <option value="6hours">6 hours</option>
                                <option value="24hours">24 hours</option>
                                <option value="1week">1 week</option>
                                <option value="1month">1 month</option>
                                <option value="permanent">Permanent</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="blockType" class="form-label">Block Type</label>
                            <select class="form-select" id="blockType">
                                <option value="temporary">Temporary</option>
                                <option value="permanent">Permanent</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="notifyUser" checked>
                            <label class="form-check-label" for="notifyUser">Notify user about blocking</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="blockIP()">Block IP</button>
            </div>
        </div>
    </div>
</div>

<!-- Force Logout Modal -->
<div class="modal fade" id="forceLogoutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Force Logout User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="bx bx-error me-2"></i>
                    <strong>Warning:</strong> This will immediately log the user out of all active sessions.
                </div>
                
                <form>
                    <div class="mb-3">
                        <label for="logoutUser" class="form-label">User</label>
                        <input type="text" class="form-control" id="logoutUser" value="John Smith (john.smith@school.com)" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="logoutReason" class="form-label">Reason</label>
                        <textarea class="form-control" id="logoutReason" rows="2" placeholder="Enter reason for logout...">Security precaution - suspicious activity detected</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="notifyLogout" checked>
                            <label class="form-check-label" for="notifyLogout">Notify user about forced logout</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="blockAfterLogout">
                            <label class="form-check-label" for="blockAfterLogout">Block user from logging in for 1 hour</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning" onclick="forceLogout()">Force Logout</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('exportType').addEventListener('change', function() {
    const dateRangeExport = document.getElementById('dateRangeExport');
    if (this.value === 'date_range') {
        dateRangeExport.style.display = 'block';
    } else {
        dateRangeExport.style.display = 'none';
    }
});

function applyFilter() {
    const filterStatus = document.getElementById('filterStatus').value;
    const filterUserType = document.getElementById('filterUserType').value;
    
    alert(`Applying filters: Status=${filterStatus}, User Type=${filterUserType}`);
    document.getElementById('filterModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Filters applied successfully!');
        location.reload();
    }, 1000);
}

function exportHistory() {
    const exportType = document.getElementById('exportType').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportType} in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Login history exported successfully!');
    }, 2000);
}

function saveSecuritySettings() {
    const maxAttempts = document.getElementById('maxAttempts').value;
    const lockdownDuration = document.getElementById('lockoutDuration').value;
    
    alert(`Saving security settings: Max Attempts=${maxAttempts}, Lockout Duration=${lockdownDuration} minutes`);
    document.getElementById('securityModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Security settings saved successfully!');
    }, 1000);
}

function blockIP() {
    const blockIP = document.getElementById('blockIP').value;
    const blockReason = document.getElementById('blockReason').value;
    const blockDuration = document.getElementById('blockDuration').value;
    
    if (!blockIP || !blockReason) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert(`Blocking IP ${blockIP} for ${blockDuration}. Reason: ${blockReason}`);
    document.getElementById('blockIPModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('IP address blocked successfully!');
    }, 1500);
}

function forceLogout() {
    const logoutUser = document.getElementById('logoutUser').value;
    const logoutReason = document.getElementById('logoutReason').value;
    
    alert(`Forcing logout for ${logoutUser}. Reason: ${logoutReason}`);
    document.getElementById('forceLogoutModal').querySelector('.btn-close').click');
    
    setTimeout(() => {
        alert('User logged out successfully!');
    }, 1500);
}

function exportSession() {
    alert('Exporting session data...');
    setTimeout(() => {
        alert('Session data exported successfully!');
    }, 1000);
}
</script>
@endsection
