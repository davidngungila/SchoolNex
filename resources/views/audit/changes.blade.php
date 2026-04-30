@extends('layouts.app')

@section('title', 'Data Changes')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Changes</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
                        <i class="bx bx-filter me-1"></i> Filter
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#rollbackModal">
                        <i class="bx bx-undo me-1"></i> Rollback
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Change Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">3,456</h4>
                                        <p class="mb-0">Total Changes</p>
                                        <small class="text-muted">Last 24 hours</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-edit avatar-icon"></i>
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
                                        <h4 class="mb-0">1,234</h4>
                                        <p class="mb-0">Created</p>
                                        <small class="text-muted">35.7% of total</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-plus-circle avatar-icon"></i>
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
                                        <h4 class="mb-0">1,890</h4>
                                        <p class="mb-0">Updated</p>
                                        <small class="text-muted">54.7% of total</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-refresh avatar-icon"></i>
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
                                        <h4 class="mb-0">332</h4>
                                        <p class="mb-0">Deleted</p>
                                        <small class="text-muted">9.6% of total</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-trash avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Filter -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="changeType" class="form-label">Change Type</label>
                        <select class="form-select" id="changeType">
                            <option value="">All Types</option>
                            <option value="create">Created</option>
                            <option value="update">Updated</option>
                            <option value="delete">Deleted</option>
                            <option value="restore">Restored</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="module" class="form-label">Module</label>
                        <select class="form-select" id="module">
                            <option value="">All Modules</option>
                            <option value="students">Students</option>
                            <option value="teachers">Teachers</option>
                            <option value="exams">Exams</option>
                            <option value="finance">Finance</option>
                            <option value="reports">Reports</option>
                            <option value="settings">Settings</option>
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
                        <input type="text" class="form-control" id="searchUser" placeholder="Name, Record...">
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

                <!-- Data Changes Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>Change Type</th>
                                <th>Module</th>
                                <th>Record</th>
                                <th>User</th>
                                <th>Changes</th>
                                <th>IP Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s') }}</td>
                                <td><span class="badge bg-success">Created</span></td>
                                <td><span class="badge bg-primary">Students</span></td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Student: Emily Davis</div>
                                        <small class="text-muted">ID: STU004</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                        <div>
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">Admin</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="change-summary">
                                        <div><strong>New:</strong> Emily Davis, Class 2A</div>
                                        <div><strong>Fields:</strong> Name, Email, Class, DOB</div>
                                    </div>
                                </td>
                                <td>192.168.1.100</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewChangeModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rollbackModal"><i class="bx bx-undo me-2"></i>Rollback</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#compareModal"><i class="bx bx-git-compare me-2"></i>Compare</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-15 minutes')) }}</td>
                                <td><span class="badge bg-warning">Updated</span></td>
                                <td><span class="badge bg-success">Teachers</span></td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Teacher: Sarah Johnson</div>
                                        <small class="text-muted">ID: TCH002</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                        <div>
                                            <div class="fw-bold>Sarah Johnson</div>
                                            <small class="text-muted">Teacher</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="change-summary">
                                        <div><strong>Changed:</strong> Phone, Address</div>
                                        <div><strong>Old:</strong> +255 712 345 678</div>
                                        <div><strong>New:</strong> +255 712 345 679</div>
                                    </div>
                                </td>
                                <td>192.168.1.101</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewChangeModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rollbackModal"><i class="bx bx-undo me-2"></i>Rollback</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#compareModal"><i class="bx bx-git-compare me-2"></i>Compare</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-30 minutes')) }}</td>
                                <td><span class="badge bg-danger">Deleted</span></td>
                                <td><span class="badge bg-warning">Exams</span></td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Exam: Mathematics Mid-term</div>
                                        <small class="text-muted">ID: EXM001</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                        <div>
                                            <div class="fw-bold>Michael Brown</div>
                                            <small class="text-muted">Teacher</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="change-summary">
                                        <div><strong>Deleted:</strong> Mathematics Mid-term Exam</div>
                                        <div><strong>Reason:</strong> Incorrect exam data</div>
                                        <div><strong>Backup:</strong> Available for restore</div>
                                    </div>
                                </td>
                                <td>192.168.1.102</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewChangeModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item text-success" href="#" data-bs-toggle="modal" data-bs-target="#restoreModal"><i class="bx bx-redo me-2"></i>Restore</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#compareModal"><i class="bx bx-git-compare me-2"></i>Compare</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-1 hour')) }}</td>
                                <td><span class="badge bg-warning">Updated</span></td>
                                <td><span class="badge bg-info">Finance</span></td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Fee: Term 2 Fees</div>
                                        <small class="text-muted">ID: FEE001</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                        <div>
                                            <div class="fw-bold>Emily Davis</div>
                                            <small class="text-muted">Student</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="change-summary">
                                        <div><strong>Changed:</strong> Status, Amount</div>
                                        <div><strong>Old:</strong> Pending, TZS 150,000</div>
                                        <div><strong>New:</strong> Paid, TZS 150,000</div>
                                    </div>
                                </td>
                                <td>192.168.1.103</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewChangeModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rollbackModal"><i class="bx bx-undo me-2"></i>Rollback</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#compareModal"><i class="bx bx-git-compare me-2"></i>Compare</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-2 hours')) }}</td>
                                <td><span class="badge bg-success">Created</span></td>
                                <td><span class="badge bg-primary">Reports</span></td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Report: Monthly Attendance</div>
                                        <small class="text-muted">ID: RPT001</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                        <div>
                                            <div class="fw-bold>Robert Wilson</div>
                                            <small class="text-muted">Parent</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="change-summary">
                                        <div><strong>New:</strong> Monthly Attendance Report</div>
                                        <div><strong>Period:</strong> April 2024</div>
                                        <div><strong>Records:</strong> 502 students</div>
                                    </div>
                                </td>
                                <td>192.168.1.104</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewChangeModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rollbackModal"><i class="bx bx-undo me-2"></i>Rollback</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#compareModal"><i class="bx bx-git-compare me-2"></i>Compare</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-3 hours')) }}</td>
                                <td><span class="badge bg-warning">Updated</span></td>
                                <td><span class="badge bg-warning">Settings</span></td>
                                <td>
                                    <div>
                                        <div class="fw-bold>Setting: Email Configuration</div>
                                        <small class="text-muted">ID: SET001</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 20px; height: 20px;">
                                        <div>
                                            <div class="fw-bold>Lisa Martinez</div>
                                            <small class="text-muted">Admin</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="change-summary">
                                        <div><strong>Changed:</strong> SMTP settings</div>
                                        <div><strong>Fields:</strong> Host, Port, Encryption</div>
                                        <div><strong>Impact:</strong> Email service</div>
                                    </div>
                                </td>
                                <td>192.168.1.105</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewChangeModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rollbackModal"><i class="bx bx-undo me-2"></i>Rollback</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#compareModal"><i class="bx bx-git-compare me-2"></i>Compare</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Changes pagination">
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

<!-- View Change Modal -->
<div class="modal fade" id="viewChangeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Change Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Change ID:</strong></td>
                                <td>CHG_2024_04_30_001</td>
                            </tr>
                            <tr>
                                <td><strong>Date & Time:</strong></td>
                                <td>{{ date('Y-m-d H:i:s') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Type:</strong></td>
                                <td><span class="badge bg-success">Created</span></td>
                            </tr>
                            <tr>
                                <td><strong>Module:</strong></td>
                                <td><span class="badge bg-primary">Students</span></td>
                            </tr>
                            <tr>
                                <td><strong>Record ID:</strong></td>
                                <td>STU004</td>
                            </tr>
                            <tr>
                                <td><strong>Record Type:</strong></td>
                                <td>Student</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>User Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>User:</strong></td>
                                <td>John Smith</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>john.smith@school.com</td>
                            </tr>
                            <tr>
                                <td><strong>Role:</strong></td>
                                <td><span class="badge bg-primary">Admin</span></td>
                            </tr>
                            <tr>
                                <td><strong>IP Address:</strong></td>
                                <td>192.168.1.100</td>
                            </tr>
                            <tr>
                                <td><strong>User Agent:</strong></td>
                                <td>Chrome 120.0 / Windows 10</td>
                            </tr>
                            <tr>
                                <td><strong>Session ID:</strong></td>
                                <td>SES_abc123def456</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h6>Change Details</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Old Value</th>
                                        <th>New Value</th>
                                        <th>Change Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>First Name</strong></td>
                                        <td><em>null</em></td>
                                        <td>Emily</td>
                                        <td><span class="badge bg-success">Added</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Last Name</strong></td>
                                        <td><em>null</em></td>
                                        <td>Davis</td>
                                        <td><span class="badge bg-success">Added</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td><em>null</em></td>
                                        <td>emily.davis@school.com</td>
                                        <td><span class="badge bg-success">Added</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Class</strong></td>
                                        <td><em>null</em></td>
                                        <td>2A</td>
                                        <td><span class="badge bg-success">Added</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Date of Birth</strong></td>
                                        <td><em>null</em></td>
                                        <td>2010-05-15</td>
                                        <td><span class="badge bg-success">Added</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gender</strong></td>
                                        <td><em>null</em></td>
                                        <td>Female</td>
                                        <td><span class="badge bg-success">Added</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Address</strong></td>
                                        <td><em>null</em></td>
                                        <td>123 School Street, Dar es Salaam</td>
                                        <td><span class="badge bg-success">Added</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h6>Additional Information</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre class="mb-0"><code>{
    "request_id": "REQ_2024_04_30_001",
    "table": "students",
    "primary_key": "STU004",
    "operation": "INSERT",
    "affected_rows": 1,
    "execution_time": "0.045s",
    "transaction_id": "TXN_abc123def456",
    "rollback_available": true,
    "backup_id": "BKP_2024_04_30_001"
}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#rollbackModal">Rollback</button>
                <button type="button" class="btn btn-primary" onclick="exportChange()">Export Change</button>
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
                            <label for="filterChangeType" class="form-label">Change Type</label>
                            <select class="form-select" id="filterChangeType">
                                <option value="">All Types</option>
                                <option value="create">Created</option>
                                <option value="update">Updated</option>
                                <option value="delete">Deleted</option>
                                <option value="restore">Restored</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterModule" class="form-label">Module</label>
                            <select class="form-select" id="filterModule">
                                <option value="">All Modules</option>
                                <option value="students">Students</option>
                                <option value="teachers">Teachers</option>
                                <option value="exams">Exams</option>
                                <option value="finance">Finance</option>
                                <option value="reports">Reports</option>
                                <option value="settings">Settings</option>
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
                            <label for="filterUser" class="form-label">User</label>
                            <input type="text" class="form-control" id="filterUser" placeholder="Enter name or email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterRecord" class="form-label">Record</label>
                            <input type="text" class="form-control" id="filterRecord" placeholder="Enter record ID or name">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="filterFields" class="form-label">Fields Changed</label>
                        <input type="text" class="form-control" id="filterFields" placeholder="Enter field names separated by commas">
                        <small class="text-muted">e.g., name, email, phone</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterCriticalOnly">
                            <label class="form-check-label" for="filterCriticalOnly">Show critical changes only</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filterRollbackAvailable">
                            <label class="form-check-label" for="filterRollbackAvailable">Show only rollbackable changes</label>
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

<!-- Rollback Modal -->
<div class="modal fade" id="rollbackModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rollback Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="bx bx-error me-2"></i>
                    <strong>Warning:</strong> This will revert the selected change and may affect other related data.
                </div>
                
                <form>
                    <div class="mb-3">
                        <label for="rollbackChange" class="form-label">Change to Rollback</label>
                        <input type="text" class="form-control" id="rollbackChange" value="CHG_2024_04_30_001" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="rollbackReason" class="form-label">Reason for Rollback *</label>
                        <textarea class="form-control" id="rollbackReason" rows="3" required>Incorrect data entered during student creation</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="rollbackType" class="form-label">Rollback Type</label>
                        <select class="form-select" id="rollbackType">
                            <option value="single">Single Change</option>
                            <option value="related">Related Changes</option>
                            <option value="session">All Changes in Session</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="createBackup" checked>
                            <label class="form-check-label" for="createBackup">Create backup before rollback</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="notifyUser" checked>
                            <label class="form-check-label" for="notifyUser">Notify user who made the change</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="confirmRollback">
                            <label class="form-check-label" for="confirmRollback">I understand this action cannot be undone</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning" onclick="rollbackChange()">Rollback</button>
            </div>
        </div>
    </div>
</div>

<!-- Restore Modal -->
<div class="modal fade" id="restoreModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Restore Deleted Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="restoreRecord" class="form-label">Record to Restore</label>
                        <input type="text" class="form-control" id="restoreRecord" value="EXM001 - Mathematics Mid-term" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="restoreReason" class="form-label">Reason for Restoration</label>
                        <textarea class="form-control" id="restoreReason" rows="3" placeholder="Enter reason for restoration...">Exam was deleted by mistake, need to restore for upcoming examination</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="restoreOptions" class="form-label">Restore Options</label>
                        <select class="form-select" id="restoreOptions">
                            <option value="full">Full Restore</option>
                            <option value="data_only">Data Only</option>
                            <option value="structure_only">Structure Only</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="restoreRelations" checked>
                            <label class="form-check-label" for="restoreRelations">Restore related records</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="restoreNotifications" checked>
                            <label class="form-check-label" for="restoreNotifications">Send notifications about restoration</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" onclick="restoreRecord()">Restore</button>
            </div>
        </div>
    </div>
</div>

<!-- Compare Modal -->
<div class="modal fade" id="compareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Compare Changes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Before Change</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre class="mb-0"><code>{
    "id": "STU004",
    "first_name": "Emily",
    "last_name": "Davis",
    "email": "emily.davis@school.com",
    "class": "2A",
    "dob": "2010-05-15",
    "gender": "Female",
    "address": "123 School Street, Dar es Salaam",
    "phone": "+255 712 345 678",
    "status": "Active",
    "created_at": "2024-04-30 10:30:00",
    "updated_at": "2024-04-30 10:30:00"
}</code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>After Change</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre class="mb-0"><code>{
    "id": "STU004",
    "first_name": "Emily",
    "last_name": "Davis",
    "email": "emily.davis@school.com",
    "class": "2B",
    "dob": "2010-05-15",
    "gender": "Female",
    "address": "456 Education Road, Dar es Salaam",
    "phone": "+255 712 345 679",
    "status": "Active",
    "created_at": "2024-04-30 10:30:00",
    "updated_at": "2024-04-30 14:45:00"
}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Change Summary</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Before</th>
                                        <th>After</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-warning">
                                        <td><strong>Class</strong></td>
                                        <td>2A</td>
                                        <td>2B</td>
                                        <td><span class="badge bg-warning">Modified</span></td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td><strong>Address</strong></td>
                                        <td>123 School Street, Dar es Salaam</td>
                                        <td>456 Education Road, Dar es Salaam</td>
                                        <td><span class="badge bg-warning">Modified</span></td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td><strong>Phone</strong></td>
                                        <td>+255 712 345 678</td>
                                        <td>+255 712 345 679</td>
                                        <td><span class="badge bg-warning">Modified</span></td>
                                    </tr>
                                    <tr class="table-info">
                                        <td><strong>updated_at</strong></td>
                                        <td>2024-04-30 10:30:00</td>
                                        <td>2024-04-30 14:45:00</td>
                                        <td><span class="badge bg-info">Timestamp</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="exportComparison()">Export Comparison</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Data Changes</h5>
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
                            <option value="all">All Changes</option>
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
                            <option value="json">JSON</option>
                            <option value="pdf">PDF Report</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportEmail" class="form-label">Email Export</label>
                        <input type="email" class="form-control" id="exportEmail" placeholder="admin@school.com">
                        <small class="text-muted">Optional: Send export to email address</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeOldData" checked>
                            <label class="form-check-label" for="includeOldData">Include old values</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeNewData" checked>
                            <label class="form-check-label" for="includeNewData">Include new values</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeMetadata" checked>
                            <label class="form-check-label" for="includeMetadata">Include metadata</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportChanges()">Export Changes</button>
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
    const filterChangeType = document.getElementById('filterChangeType').value;
    const filterModule = document.getElementById('filterModule').value;
    
    alert(`Applying filters: Type=${filterChangeType}, Module=${filterModule}`);
    document.getElementById('filterModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Filters applied successfully!');
        location.reload();
    }, 1000);
}

function rollbackChange() {
    const confirmRollback = document.getElementById('confirmRollback').checked;
    const rollbackReason = document.getElementById('rollbackReason').value;
    
    if (!confirmRollback) {
        alert('Please confirm you understand this action cannot be undone');
        return;
    }
    
    if (!rollbackReason) {
        alert('Please enter a reason for rollback');
        return;
    }
    
    alert('Rolling back change...');
    document.getElementById('rollbackModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Change rolled back successfully!');
        location.reload();
    }, 2000);
}

function restoreRecord() {
    const restoreReason = document.getElementById('restoreReason').value;
    
    alert(`Restoring record. Reason: ${restoreReason}`);
    document.getElementById('restoreModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Record restored successfully!');
        location.reload();
    }, 2000);
}

function exportChange() {
    alert('Exporting change details...');
    setTimeout(() => {
        alert('Change details exported successfully!');
    }, 1000);
}

function exportComparison() {
    alert('Exporting comparison data...');
    setTimeout(() => {
        alert('Comparison data exported successfully!');
    }, 1000);
}

function exportChanges() {
    const exportType = document.getElementById('exportType').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportType} in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Data changes exported successfully!');
    }, 2000);
}
</script>
@endsection
