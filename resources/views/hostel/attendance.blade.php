@extends('layouts.app')

@section('title', 'Hostel Attendance')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Hostel Attendance</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#takeAttendanceModal">
                        <i class="bx bx-check-square me-1"></i> Take Attendance
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Attendance Report
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Attendance Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">16</h4>
                                        <p class="mb-0">Present Today</p>
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
                                        <h4 class="mb-0">2</h4>
                                        <p class="mb-0">Absent Today</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user-x avatar-icon"></i>
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
                                        <h4 class="mb-0">89%</h4>
                                        <p class="mb-0">Attendance Rate</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-pie-chart avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">18</h4>
                                        <p class="mb-0">Total Students</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-group avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="dateFilter" class="form-label">Date</label>
                        <input type="date" class="form-control" id="dateFilter" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="roomFilter" class="form-label">Room</label>
                        <select class="form-select" id="roomFilter">
                            <option value="">All Rooms</option>
                            <option value="101">Room 101</option>
                            <option value="102">Room 102</option>
                            <option value="201">Room 201</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="leave">On Leave</option>
                            <option value="sick">Sick</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="classFilter" class="form-label">Class</label>
                        <select class="form-select" id="classFilter">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                        </select>
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

                <!-- Attendance Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Room</th>
                                <th>Class</th>
                                <th>Check-in Time</th>
                                <th>Check-out Time</th>
                                <th>Status</th>
                                <th>Remarks</th>
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
                                <td><span class="badge bg-primary">Room 102</span></td>
                                <td>Class 1A</td>
                                <td>06:30 PM</td>
                                <td>06:45 AM</td>
                                <td><span class="badge bg-success">Present</span></td>
                                <td>-</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewAttendanceModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAttendanceModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactParentModal"><i class="bx bx-phone me-2"></i>Contact Parent</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#markAbsentModal"><i class="bx bx-user-x me-2"></i>Mark Absent</a></li>
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
                                <td><span class="badge bg-primary">Room 102</span></td>
                                <td>Class 1B</td>
                                <td>06:45 PM</td>
                                <td>06:50 AM</td>
                                <td><span class="badge bg-success">Present</span></td>
                                <td>-</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewAttendanceModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAttendanceModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactParentModal"><i class="bx bx-phone me-2"></i>Contact Parent</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#markAbsentModal"><i class="bx bx-user-x me-2"></i>Mark Absent</a></li>
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
                                <td><span class="badge bg-warning">Room 201</span></td>
                                <td>Class 2A</td>
                                <td>-</td>
                                <td>-</td>
                                <td><span class="badge bg-danger">Absent</span></td>
                                <td>Sick leave</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewAttendanceModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAttendanceModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactParentModal"><i class="bx bx-phone me-2"></i>Contact Parent</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#markPresentModal"><i class="bx bx-user-check me-2"></i>Mark Present</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>STU004</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Emily Davis</div>
                                            <small class="text-muted">+255 712 789 012</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-info">Room 202</span></td>
                                <td>Class 2B</td>
                                <td>07:00 PM</td>
                                <td>06:40 AM</td>
                                <td><span class="badge bg-success">Present</span></td>
                                <td>-</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewAttendanceModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAttendanceModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactParentModal"><i class="bx bx-phone me-2"></i>Contact Parent</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#markAbsentModal"><i class="bx bx-user-x me-2"></i>Mark Absent</a></li>
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

<!-- Take Attendance Modal -->
<div class="modal fade" id="takeAttendanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Take Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="attendanceDate" class="form-label">Date *</label>
                            <input type="date" class="form-control" id="attendanceDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="attendanceType" class="form-label">Type *</label>
                            <select class="form-select" id="attendanceType" required>
                                <option value="check-in">Check-in</option>
                                <option value="check-out">Check-out</option>
                                <option value="both">Both</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="roomFilter" class="form-label">Filter by Room</label>
                            <select class="form-select" id="roomFilter">
                                <option value="">All Rooms</option>
                                <option value="101">Room 101</option>
                                <option value="102">Room 102</option>
                                <option value="201">Room 201</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="classFilter" class="form-label">Filter by Class</label>
                            <select class="form-select" id="classFilter">
                                <option value="">All Classes</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Attendance List -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Mark Attendance</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Room</th>
                                            <th>Class</th>
                                            <th>Check-in</th>
                                            <th>Check-out</th>
                                            <th>Status</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>STU001</td>
                                            <td>John Smith</td>
                                            <td>Room 102</td>
                                            <td>Class 1A</td>
                                            <td><input type="time" class="form-control form-control-sm" value="18:30"></td>
                                            <td><input type="time" class="form-control form-control-sm" value="06:45"></td>
                                            <td>
                                                <select class="form-select form-select-sm">
                                                    <option value="present" selected>Present</option>
                                                    <option value="absent">Absent</option>
                                                    <option value="leave">On Leave</option>
                                                    <option value="sick">Sick</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control form-control-sm" placeholder="Remarks"></td>
                                        </tr>
                                        <tr>
                                            <td>STU002</td>
                                            <td>Sarah Johnson</td>
                                            <td>Room 102</td>
                                            <td>Class 1B</td>
                                            <td><input type="time" class="form-control form-control-sm" value="18:45"></td>
                                            <td><input type="time" class="form-control form-control-sm" value="06:50"></td>
                                            <td>
                                                <select class="form-select form-select-sm">
                                                    <option value="present" selected>Present</option>
                                                    <option value="absent">Absent</option>
                                                    <option value="leave">On Leave</option>
                                                    <option value="sick">Sick</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control form-control-sm" placeholder="Remarks"></td>
                                        </tr>
                                        <tr>
                                            <td>STU003</td>
                                            <td>Michael Brown</td>
                                            <td>Room 201</td>
                                            <td>Class 2A</td>
                                            <td><input type="time" class="form-control form-control-sm" disabled></td>
                                            <td><input type="time" class="form-control form-control-sm" disabled></td>
                                            <td>
                                                <select class="form-select form-select-sm">
                                                    <option value="present">Present</option>
                                                    <option value="absent" selected>Absent</option>
                                                    <option value="leave">On Leave</option>
                                                    <option value="sick" selected>Sick</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control form-control-sm" value="Sick leave"></td>
                                        </tr>
                                        <tr>
                                            <td>STU004</td>
                                            <td>Emily Davis</td>
                                            <td>Room 202</td>
                                            <td>Class 2B</td>
                                            <td><input type="time" class="form-control form-control-sm" value="19:00"></td>
                                            <td><input type="time" class="form-control form-control-sm" value="06:40"></td>
                                            <td>
                                                <select class="form-select form-select-sm">
                                                    <option value="present" selected>Present</option>
                                                    <option value="absent">Absent</option>
                                                    <option value="leave">On Leave</option>
                                                    <option value="sick">Sick</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control form-control-sm" placeholder="Remarks"></td>
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
                <button type="button" class="btn btn-primary">Save Attendance</button>
            </div>
        </div>
    </div>
</div>

<!-- View Attendance Modal -->
<div class="modal fade" id="viewAttendanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Attendance Details</h5>
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
                        <h6>Today's Attendance</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Date:</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Room:</strong></td>
                                <td>Room 102</td>
                            </tr>
                            <tr>
                                <td><strong>Check-in:</strong></td>
                                <td>06:30 PM</td>
                            </tr>
                            <tr>
                                <td><strong>Check-out:</strong></td>
                                <td>06:45 AM</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Present</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Attendance History (Last 7 Days)</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ date('Y-m-d') }}</td>
                                        <td>06:30 PM</td>
                                        <td>06:45 AM</td>
                                        <td><span class="badge bg-success">Present</span></td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                        <td>06:35 PM</td>
                                        <td>06:50 AM</td>
                                        <td><span class="badge bg-success">Present</span></td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                        <td>06:40 PM</td>
                                        <td>06:55 AM</td>
                                        <td><span class="badge bg-success">Present</span></td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><span class="badge bg-warning">On Leave</span></td>
                                        <td>Weekend leave</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Monthly Statistics</h6>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-center">
                                    <h4 class="text-success">22</h4>
                                    <small class="text-muted">Days Present</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <h4 class="text-danger">2</h4>
                                    <small class="text-muted">Days Absent</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Parent Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Name:</strong></td>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Print Details</button>
            </div>
        </div>
    </div>
</div>

<!-- Contact Parent Modal -->
<div class="modal fade" id="contactParentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Parent</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle" style="width: 80px; height: 80px;">
                    <h6 class="mt-2">John Smith</h6>
                    <p class="mb-0">Student ID: STU001</p>
                    <p class="mb-0">Room: Room 102</p>
                </div>
                
                <div class="mb-3">
                    <h6>Parent Information</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>Name:</strong></td>
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
                
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success">
                        <i class="bx bx-phone me-2"></i> Call Parent
                    </button>
                    <button type="button" class="btn btn-primary">
                        <i class="bx bx-message me-2"></i> Send SMS
                    </button>
                    <button type="button" class="btn btn-info">
                        <i class="bx bx-envelope me-2"></i> Send Email
                    </button>
                </div>
                
                <div class="mt-3">
                    <label for="messageContent" class="form-label">Quick Message</label>
                    <textarea class="form-control" id="messageContent" rows="3" placeholder="Type your message here..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Send Message</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Attendance Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="daily">Daily Attendance</option>
                        <option value="weekly">Weekly Summary</option>
                        <option value="monthly">Monthly Report</option>
                        <option value="student">Student-wise Report</option>
                        <option value="room">Room-wise Report</option>
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

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Attendance Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exportFormat" class="form-label">Export Format</label>
                    <select class="form-select" id="exportFormat">
                        <option value="excel">Excel</option>
                        <option value="csv">CSV</option>
                        <option value="pdf">PDF</option>
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
                        <input class="form-check-input" type="checkbox" id="includeStudentInfo" checked>
                        <label class="form-check-label" for="includeStudentInfo">
                            Student Information
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeTimes" checked>
                        <label class="form-check-label" for="includeTimes">
                            Check-in/Check-out Times
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeRemarks" checked>
                        <label class="form-check-label" for="includeRemarks">
                            Remarks
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Export Data</button>
            </div>
        </div>
    </div>
</div>
@endsection
