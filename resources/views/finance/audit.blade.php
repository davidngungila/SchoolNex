@extends('layouts.app')

@section('title', 'Audit Trail')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Audit Trail</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export Log
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
                        <i class="bx bx-filter me-1"></i> Advanced Filter
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Audit Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Audit Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">1,847</h4>
                                        <p class="mb-0">Total Activities</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-history avatar-icon"></i>
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
                                        <h4 class="mb-0">245</h4>
                                        <p class="mb-0">Today</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-time avatar-icon"></i>
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
                                        <h4 class="mb-0">12</h4>
                                        <p class="mb-0">Critical Events</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-error avatar-icon"></i>
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
                                        <h4 class="mb-0">28</h4>
                                        <p class="mb-0">Active Users</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="activityType" class="form-label">Activity Type</label>
                        <select class="form-select" id="activityType">
                            <option value="">All Types</option>
                            <option value="create">Create</option>
                            <option value="update">Update</option>
                            <option value="delete">Delete</option>
                            <option value="login">Login</option>
                            <option value="logout">Logout</option>
                            <option value="export">Export</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="module" class="form-label">Module</label>
                        <select class="form-select" id="module">
                            <option value="">All Modules</option>
                            <option value="finance">Finance</option>
                            <option value="students">Students</option>
                            <option value="teachers">Teachers</option>
                            <option value="fees">Fees</option>
                            <option value="reports">Reports</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="user" class="form-label">User</label>
                        <select class="form-select" id="user">
                            <option value="">All Users</option>
                            <option value="admin">Admin User</option>
                            <option value="finance">Finance Manager</option>
                            <option value="teacher">Teacher</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="quarter">This Quarter</option>
                            <option value="year">This Year</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchAudit" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchAudit" placeholder="Description...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Audit Trail Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>User</th>
                                <th>Activity</th>
                                <th>Module</th>
                                <th>Description</th>
                                <th>IP Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="User" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Admin User</div>
                                            <small class="text-muted">admin@school.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Create</span></td>
                                <td><span class="badge bg-primary">Finance</span></td>
                                <td>Created new expense record "Office Supplies Purchase" with amount $850.00</td>
                                <td>192.168.1.100</td>
                                <td><span class="badge bg-success">Success</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-search me-2"></i>Related Records</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Export Entry</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-30 minutes')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="User" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Finance Manager</div>
                                            <small class="text-muted">finance@school.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">Update</span></td>
                                <td><span class="badge bg-primary">Finance</span></td>
                                <td>Updated budget allocation for "Teaching Materials" category from $12,000 to $15,000</td>
                                <td>192.168.1.101</td>
                                <td><span class="badge bg-success">Success</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-search me-2"></i>Related Records</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Export Entry</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-1 hour')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="User" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Admin User</div>
                                            <small class="text-muted">admin@school.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Delete</span></td>
                                <td><span class="badge bg-success">Fees</span></td>
                                <td>Deleted fee structure record "Old Registration Fee" (ID: FS007)</td>
                                <td>192.168.1.100</td>
                                <td><span class="badge bg-danger">Critical</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-search me-2"></i>Related Records</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Export Entry</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-2 hours')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="User" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Teacher</div>
                                            <small class="text-muted">teacher@school.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-info">Login</span></td>
                                <td><span class="badge bg-secondary">System</span></td>
                                <td>User login successful from IP address 192.168.1.102</td>
                                <td>192.168.1.102</td>
                                <td><span class="badge bg-success">Success</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-search me-2"></i>User Activity</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-3 hours')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="User" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Finance Manager</div>
                                            <small class="text-muted">finance@school.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-purple">Export</span></td>
                                <td><span class="badge bg-warning">Reports</span></td>
                                <td>Generated "Monthly Financial Report" for January 2024 (PDF format)</td>
                                <td>192.168.1.101</td>
                                <td><span class="badge bg-success">Success</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download Report</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-search me-2"></i>Related Records</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-4 hours')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="User" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Admin User</div>
                                            <small class="text-muted">admin@school.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Create</span></td>
                                <td><span class="badge bg-primary">Finance</span></td>
                                <td>Created new income record "Donation - Parent Association" with amount $5,000.00</td>
                                <td>192.168.1.100</td>
                                <td><span class="badge bg-success">Success</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-search me-2"></i>Related Records</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Export Entry</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-5 hours')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="User" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Teacher</div>
                                            <small class="text-muted">teacher@school.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-secondary">Logout</span></td>
                                <td><span class="badge bg-secondary">System</span></td>
                                <td>User logout successful</td>
                                <td>192.168.1.102</td>
                                <td><span class="badge bg-success">Success</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-search me-2"></i>User Activity</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-3">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
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

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Audit Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exportFormat" class="form-label">Export Format</label>
                    <select class="form-select" id="exportFormat">
                        <option value="excel">Excel</option>
                        <option value="csv">CSV</option>
                        <option value="pdf">PDF</option>
                        <option value="json">JSON</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Include Fields:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeUser" checked>
                        <label class="form-check-label" for="includeUser">
                            User Information
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeIP" checked>
                        <label class="form-check-label" for="includeIP">
                            IP Address
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeDetails" checked>
                        <label class="form-check-label" for="includeDetails">
                            Activity Details
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Export Log</button>
            </div>
        </div>
    </div>
</div>

<!-- Advanced Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Advanced Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="filterActivityType" class="form-label">Activity Type</label>
                        <select class="form-select" id="filterActivityType" multiple>
                            <option value="create">Create</option>
                            <option value="update">Update</option>
                            <option value="delete">Delete</option>
                            <option value="login">Login</option>
                            <option value="logout">Logout</option>
                            <option value="export">Export</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="filterModule" class="form-label">Module</label>
                        <select class="form-select" id="filterModule" multiple>
                            <option value="finance">Finance</option>
                            <option value="students">Students</option>
                            <option value="teachers">Teachers</option>
                            <option value="fees">Fees</option>
                            <option value="reports">Reports</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="filterUser" class="form-label">User</label>
                        <select class="form-select" id="filterUser" multiple>
                            <option value="admin">Admin User</option>
                            <option value="finance">Finance Manager</option>
                            <option value="teacher">Teacher</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="filterStatus" class="form-label">Status</label>
                        <select class="form-select" id="filterStatus" multiple>
                            <option value="success">Success</option>
                            <option value="failed">Failed</option>
                            <option value="critical">Critical</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="filterStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="filterStartDate">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="filterEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="filterEndDate">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="filterKeywords" class="form-label">Keywords</label>
                    <input type="text" class="form-control" id="filterKeywords" placeholder="Search keywords...">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- Audit Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Audit Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Audit Summary</option>
                        <option value="user_activity">User Activity Report</option>
                        <option value="security">Security Report</option>
                        <option value="compliance">Compliance Report</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="reportStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="reportStartDate">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="reportEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="reportEndDate">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="reportFormat" class="form-label">Format</label>
                    <select class="form-select" id="reportFormat">
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Generate Report</button>
            </div>
        </div>
    </div>
</div>
@endsection
