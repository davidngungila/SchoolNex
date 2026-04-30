@extends('layouts.app')

@section('title', 'Student Assignment')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Student Assignment</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#assignStudentModal">
                        <i class="bx bx-user-plus me-1"></i> Assign Student
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulkAssignModal">
                        <i class="bx bx-group me-1"></i> Bulk Assign
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Assignment Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Assignment Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">156</h4>
                                        <p class="mb-0">Total Assigned</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user avatar-icon"></i>
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
                                        <h4 class="mb-0">12</h4>
                                        <p class="mb-0">Active Routes</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-map avatar-icon"></i>
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
                                        <h4 class="mb-0">8</h4>
                                        <p class="mb-0">Pending Assignments</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-time avatar-icon"></i>
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
                                        <h4 class="mb-0">92%</h4>
                                        <p class="mb-0">Utilization Rate</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-pie-chart avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="routeSelect" class="form-label">Route</label>
                        <select class="form-select" id="routeSelect">
                            <option value="">All Routes</option>
                            <option value="RT001">RT001 - City Center</option>
                            <option value="RT002">RT002 - Suburban</option>
                            <option value="RT003">RT003 - Rural</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="classSelect" class="form-label">Class</label>
                        <select class="form-select" id="classSelect">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="assignmentStatus" class="form-label">Status</label>
                        <select class="form-select" id="assignmentStatus">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchStudent" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchStudent" placeholder="Student name, ID...">
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

                <!-- Student Assignments Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Route</th>
                                <th>Stop Point</th>
                                <th>Pickup Time</th>
                                <th>Fee Status</th>
                                <th>Assignment Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>STU001</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">+255 712 345 678</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 1A</td>
                                <td><span class="badge bg-primary">RT001 - City Center</span></td>
                                <td>City Center Bus Stop</td>
                                <td>07:15 AM</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>2024-01-15</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewAssignmentModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAssignmentModal"><i class="bx bx-edit me-2"></i>Edit Assignment</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changeRouteModal"><i class="bx bx-transfer me-2"></i>Change Route</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Payment</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Remove</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>STU002</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Sarah Johnson</div>
                                            <small class="text-muted">+255 712 987 654</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 1B</td>
                                <td><span class="badge bg-info">RT002 - Suburban</span></td>
                                <td>Market Square</td>
                                <td>07:25 AM</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>2024-01-16</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewAssignmentModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAssignmentModal"><i class="bx bx-edit me-2"></i>Edit Assignment</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changeRouteModal"><i class="bx bx-transfer me-2"></i>Change Route</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Payment</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Remove</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>STU003</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Michael Brown</div>
                                            <small class="text-muted">+255 712 456 123</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 2A</td>
                                <td><span class="badge bg-warning">RT003 - Rural</span></td>
                                <td>Village Center</td>
                                <td>06:45 AM</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>2024-01-17</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewAssignmentModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAssignmentModal"><i class="bx bx-edit me-2"></i>Edit Assignment</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changeRouteModal"><i class="bx bx-transfer me-2"></i>Change Route</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Payment</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Remove</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Assign Student Modal -->
<div class="modal fade" id="assignStudentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Student to Route</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="studentSearch" class="form-label">Search Student *</label>
                            <input type="text" class="form-control" id="studentSearch" placeholder="Enter student name or ID" required>
                            <small class="text-muted">Start typing to search students</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="classSelect" class="form-label">Filter by Class</label>
                            <select class="form-select" id="classSelect">
                                <option value="">All Classes</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Student Selection Results -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Select Student</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Current Route</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="studentSelect" value="STU001"></td>
                                            <td>STU001</td>
                                            <td>John Smith</td>
                                            <td>Class 1A</td>
                                            <td><span class="badge bg-secondary">Not Assigned</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="studentSelect" value="STU004"></td>
                                            <td>STU004</td>
                                            <td>Emily Davis</td>
                                            <td>Class 1A</td>
                                            <td><span class="badge bg-secondary">Not Assigned</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="routeSelect" class="form-label">Select Route *</label>
                            <select class="form-select" id="routeSelect" required>
                                <option value="">Select Route</option>
                                <option value="RT001">RT001 - City Center Route A</option>
                                <option value="RT002">RT002 - Suburban Route B</option>
                                <option value="RT003">RT003 - Rural Route C</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stopSelect" class="form-label">Select Stop Point *</label>
                            <select class="form-select" id="stopSelect" required>
                                <option value="">Select Stop</option>
                                <option value="stop1">City Center Bus Stop</option>
                                <option value="stop2">Market Square</option>
                                <option value="stop3">Hospital Junction</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pickupTime" class="form-label">Pickup Time</label>
                            <input type="time" class="form-control" id="pickupTime">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="effectiveDate" class="form-label">Effective Date *</label>
                            <input type="date" class="form-control" id="effectiveDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" rows="2" placeholder="Any special instructions..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Assign Student</button>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Assign Modal -->
<div class="modal fade" id="bulkAssignModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bulk Student Assignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="classFilter" class="form-label">Filter by Class</label>
                            <select class="form-select" id="classFilter">
                                <option value="">All Classes</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="routeSelect" class="form-label">Select Route *</label>
                            <select class="form-select" id="routeSelect" required>
                                <option value="">Select Route</option>
                                <option value="RT001">RT001 - City Center Route A</option>
                                <option value="RT002">RT002 - Suburban Route B</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="stopSelect" class="form-label">Select Stop Point *</label>
                            <select class="form-select" id="stopSelect" required>
                                <option value="">Select Stop</option>
                                <option value="stop1">City Center Bus Stop</option>
                                <option value="stop2">Market Square</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="effectiveDate" class="form-label">Effective Date *</label>
                            <input type="date" class="form-control" id="effectiveDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pickupTime" class="form-label">Pickup Time</label>
                            <input type="time" class="form-control" id="pickupTime">
                        </div>
                    </div>
                    
                    <!-- Student List -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Select Students to Assign</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAll"></th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Current Route</th>
                                            <th>Parent Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" name="studentSelect[]" value="STU004"></td>
                                            <td>STU004</td>
                                            <td>Emily Davis</td>
                                            <td>Class 1A</td>
                                            <td><span class="badge bg-secondary">Not Assigned</span></td>
                                            <td>+255 712 789 012</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="studentSelect[]" value="STU005"></td>
                                            <td>STU005</td>
                                            <td>Robert Wilson</td>
                                            <td>Class 1B</td>
                                            <td><span class="badge bg-secondary">Not Assigned</span></td>
                                            <td>+255 712 345 678</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="studentSelect[]" value="STU006"></td>
                                            <td>STU006</td>
                                            <td>Lisa Martinez</td>
                                            <td>Class 2A</td>
                                            <td><span class="badge bg-secondary">Not Assigned</span></td>
                                            <td>+255 712 901 234</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Assign Selected Students</button>
            </div>
        </div>
    </div>
</div>

<!-- View Assignment Modal -->
<div class="modal fade" id="viewAssignmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assignment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Student Information</h6>
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle me-3" style="width: 60px; height: 60px;">
                            <div>
                                <h5 class="mb-0">John Smith</h5>
                                <p class="mb-0">Student ID: STU001</p>
                                <p class="mb-0">Class: 1A</p>
                                <p class="mb-0">+255 712 345 678</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Assignment Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Route:</strong></td>
                                <td>RT001 - City Center Route A</td>
                            </tr>
                            <tr>
                                <td><strong>Stop Point:</strong></td>
                                <td>City Center Bus Stop</td>
                            </tr>
                            <tr>
                                <td><strong>Pickup Time:</strong></td>
                                <td>07:15 AM</td>
                            </tr>
                            <tr>
                                <td><strong>Assignment Date:</strong></td>
                                <td>2024-01-15</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Parent Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Parent Name:</strong></td>
                                <td>Mr. David Smith</td>
                            </tr>
                            <tr>
                                <td><strong>Contact:</strong></td>
                                <td>+255 712 345 678</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>parent@email.com</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Payment Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Transport Fee:</strong></td>
                                <td>$50.00 per month</td>
                            </tr>
                            <tr>
                                <td><strong>Current Status:</strong></td>
                                <td><span class="badge bg-success">Paid</span></td>
                            </tr>
                            <tr>
                                <td><strong>Last Payment:</strong></td>
                                <td>2024-01-01</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Print Assignment</button>
            </div>
        </div>
    </div>
</div>

<!-- Change Route Modal -->
<div class="modal fade" id="changeRouteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Route Assignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="studentInfo" class="form-label">Student</label>
                        <input type="text" class="form-control" id="studentInfo" value="John Smith (STU001)" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="currentRoute" class="form-label">Current Route</label>
                        <input type="text" class="form-control" id="currentRoute" value="RT001 - City Center Route A" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="newRoute" class="form-label">New Route *</label>
                        <select class="form-select" id="newRoute" required>
                            <option value="">Select New Route</option>
                            <option value="RT002">RT002 - Suburban Route B</option>
                            <option value="RT003">RT003 - Rural Route C</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="newStop" class="form-label">New Stop Point *</label>
                        <select class="form-select" id="newStop" required>
                            <option value="">Select Stop</option>
                            <option value="stop1">Market Square</option>
                            <option value="stop2">Hospital Junction</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="changeReason" class="form-label">Reason for Change *</label>
                        <textarea class="form-control" id="changeReason" rows="3" required placeholder="Enter reason for route change..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="effectiveDate" class="form-label">Effective Date *</label>
                        <input type="date" class="form-control" id="effectiveDate" value="{{ date('Y-m-d') }}" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Change Route</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transport Fee Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="studentInfo" class="form-label">Student</label>
                        <input type="text" class="form-control" id="studentInfo" value="John Smith (STU001)" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="feeAmount" class="form-label">Fee Amount *</label>
                            <input type="number" class="form-control" id="feeAmount" value="50.00" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paymentMonth" class="form-label">Payment Month *</label>
                            <select class="form-select" id="paymentMonth" required>
                                <option value="1">January 2024</option>
                                <option value="2">February 2024</option>
                                <option value="3">March 2024</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="paymentMethod" class="form-label">Payment Method *</label>
                            <select class="form-select" id="paymentMethod" required>
                                <option value="cash">Cash</option>
                                <option value="bank">Bank Transfer</option>
                                <option value="mobile">Mobile Money</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paymentDate" class="form-label">Payment Date *</label>
                            <input type="date" class="form-control" id="paymentDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="receiptNumber" class="form-label">Receipt Number</label>
                        <input type="text" class="form-control" id="receiptNumber" placeholder="Optional">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Process Payment</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assignment Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Assignment Summary</option>
                        <option value="by_route">By Route</option>
                        <option value="by_class">By Class</option>
                        <option value="payment">Payment Status</option>
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
