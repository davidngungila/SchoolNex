@extends('layouts.app')

@section('title', 'Student Allocation')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Student Allocation</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#allocateModal">
                        <i class="bx bx-user-plus me-1"></i> Allocate Student
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulkAllocateModal">
                        <i class="bx bx-group me-1"></i> Bulk Allocate
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Allocation Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Allocation Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">18</h4>
                                        <p class="mb-0">Total Allocated</p>
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
                                        <h4 class="mb-0">6</h4>
                                        <p class="mb-0">Available Rooms</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-door-open avatar-icon"></i>
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
                                        <p class="mb-0">Pending Requests</p>
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
                                        <h4 class="mb-0">75%</h4>
                                        <p class="mb-0">Occupancy Rate</p>
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
                        <label for="roomFilter" class="form-label">Room</label>
                        <select class="form-select" id="roomFilter">
                            <option value="">All Rooms</option>
                            <option value="101">Room 101</option>
                            <option value="102">Room 102</option>
                            <option value="201">Room 201</option>
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
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                            <option value="expired">Expired</option>
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

                <!-- Allocation Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Room</th>
                                <th>Bed Number</th>
                                <th>Allocation Date</th>
                                <th>Fee Status</th>
                                <th>Expiry Date</th>
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
                                <td><span class="badge bg-primary">Room 102</span></td>
                                <td>Bed 1</td>
                                <td>2024-01-15</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>2024-06-30</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewAllocationModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#renewModal"><i class="bx bx-refresh me-2"></i>Renew</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#transferModal"><i class="bx bx-transfer me-2"></i>Transfer Room</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Payment</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Deallocate</a></li>
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
                                <td><span class="badge bg-primary">Room 102</span></td>
                                <td>Bed 2</td>
                                <td>2024-01-16</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>2024-06-30</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewAllocationModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#renewModal"><i class="bx bx-refresh me-2"></i>Renew</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#transferModal"><i class="bx bx-transfer me-2"></i>Transfer Room</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Payment</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Deallocate</a></li>
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
                                <td><span class="badge bg-warning">Room 201</span></td>
                                <td>Bed 3</td>
                                <td>2024-01-17</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>2024-06-30</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewAllocationModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Payment</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#renewModal"><i class="bx bx-refresh me-2"></i>Renew</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#transferModal"><i class="bx bx-transfer me-2"></i>Transfer Room</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Deallocate</a></li>
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
                                <td>Class 2B</td>
                                <td><span class="badge bg-danger">Not Allocated</span></td>
                                <td>-</td>
                                <td>-</td>
                                <td><span class="badge bg-secondary">-</span></td>
                                <td>-</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#allocateModal"><i class="bx bx-user-plus me-2"></i>Allocate Room</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewStudentModal"><i class="bx bx-show me-2"></i>View Details</a></li>
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

<!-- Allocate Modal -->
<div class="modal fade" id="allocateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Allocate Student to Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="studentSearch" class="form-label">Search Student *</label>
                            <input type="text" class="form-control" id="studentSearch" placeholder="Enter student name or ID" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="classFilter" class="form-label">Filter by Class</label>
                            <select class="form-select" id="classFilter">
                                <option value="">All Classes</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Student Selection -->
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
                                            <th>Current Room</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="studentSelect" value="STU004"></td>
                                            <td>STU004</td>
                                            <td>Emily Davis</td>
                                            <td>Class 2B</td>
                                            <td><span class="badge bg-secondary">Not Allocated</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="studentSelect" value="STU005"></td>
                                            <td>STU005</td>
                                            <td>Robert Wilson</td>
                                            <td>Class 2A</td>
                                            <td><span class="badge bg-secondary">Not Allocated</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="roomSelect" class="form-label">Select Room *</label>
                            <select class="form-select" id="roomSelect" required>
                                <option value="">Select Room</option>
                                <option value="101">Room 101 - Double Room</option>
                                <option value="202">Room 202 - Single Room</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="bedSelect" class="form-label">Select Bed *</label>
                            <select class="form-select" id="bedSelect" required>
                                <option value="">Select Bed</option>
                                <option value="1">Bed 1</option>
                                <option value="2">Bed 2</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select class="form-select" id="semester">
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date *</label>
                            <input type="date" class="form-control" id="startDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">End Date *</label>
                            <input type="date" class="form-control" id="endDate" value="{{ date('Y-m-d', strtotime('+6 months')) }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" rows="2" placeholder="Any special requirements..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Allocate Student</button>
            </div>
        </div>
    </div>
</div>

<!-- View Allocation Modal -->
<div class="modal fade" id="viewAllocationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Allocation Details</h5>
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
                        <h6>Allocation Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Room:</strong></td>
                                <td>Room 102 - Double Room</td>
                            </tr>
                            <tr>
                                <td><strong>Bed Number:</strong></td>
                                <td>Bed 1</td>
                            </tr>
                            <tr>
                                <td><strong>Allocation Date:</strong></td>
                                <td>2024-01-15</td>
                            </tr>
                            <tr>
                                <td><strong>End Date:</strong></td>
                                <td>2024-06-30</td>
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
                                <td><strong>Hostel Fee:</strong></td>
                                <td>$150.00 per month</td>
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
                <button type="button" class="btn btn-primary">Print Allocation</button>
            </div>
        </div>
    </div>
</div>

<!-- Transfer Modal -->
<div class="modal fade" id="transferModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transfer Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="studentInfo" class="form-label">Student</label>
                        <input type="text" class="form-control" id="studentInfo" value="John Smith (STU001)" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="currentRoom" class="form-label">Current Room</label>
                        <input type="text" class="form-control" id="currentRoom" value="Room 102 - Bed 1" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="newRoom" class="form-label">New Room *</label>
                        <select class="form-select" id="newRoom" required>
                            <option value="">Select New Room</option>
                            <option value="101">Room 101 - Double Room</option>
                            <option value="202">Room 202 - Single Room</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="newBed" class="form-label">New Bed *</label>
                        <select class="form-select" id="newBed" required>
                            <option value="">Select Bed</option>
                            <option value="1">Bed 1</option>
                            <option value="2">Bed 2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="transferReason" class="form-label">Reason for Transfer *</label>
                        <textarea class="form-control" id="transferReason" rows="3" required placeholder="Enter reason for transfer..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="effectiveDate" class="form-label">Effective Date *</label>
                        <input type="date" class="form-control" id="effectiveDate" value="{{ date('Y-m-d') }}" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Transfer Room</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hostel Fee Payment</h5>
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
                            <input type="number" class="form-control" id="feeAmount" value="150.00" readonly>
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

<!-- Renew Modal -->
<div class="modal fade" id="renewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Renew Allocation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="studentInfo" class="form-label">Student</label>
                        <input type="text" class="form-control" id="studentInfo" value="John Smith (STU001)" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="currentAllocation" class="form-label">Current Allocation</label>
                        <input type="text" class="form-control" id="currentAllocation" value="Room 102 - Bed 1 (Until 2024-06-30)" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="newStartDate" class="form-label">New Start Date *</label>
                            <input type="date" class="form-control" id="newStartDate" value="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="newEndDate" class="form-label">New End Date *</label>
                            <input type="date" class="form-control" id="newEndDate" value="{{ date('Y-m-d', strtotime('+6 months')) }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="renewalNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="renewalNotes" rows="2" placeholder="Any special notes for renewal..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Renew Allocation</button>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Allocate Modal -->
<div class="modal fade" id="bulkAllocateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bulk Student Allocation</h5>
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
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="roomSelect" class="form-label">Select Room *</label>
                            <select class="form-select" id="roomSelect" required>
                                <option value="">Select Room</option>
                                <option value="101">Room 101 - Double Room</option>
                                <option value="201">Room 201 - Dormitory</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select class="form-select" id="semester">
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Student List -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Select Students to Allocate</h6>
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
                                            <th>Current Room</th>
                                            <th>Parent Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" name="studentSelect[]" value="STU004"></td>
                                            <td>STU004</td>
                                            <td>Emily Davis</td>
                                            <td>Class 2B</td>
                                            <td><span class="badge bg-secondary">Not Allocated</span></td>
                                            <td>+255 712 789 012</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="studentSelect[]" value="STU005"></td>
                                            <td>STU005</td>
                                            <td>Robert Wilson</td>
                                            <td>Class 2A</td>
                                            <td><span class="badge bg-secondary">Not Allocated</span></td>
                                            <td>+255 712 345 678</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="studentSelect[]" value="STU006"></td>
                                            <td>STU006</td>
                                            <td>Lisa Martinez</td>
                                            <td>Class 1A</td>
                                            <td><span class="badge bg-secondary">Not Allocated</span></td>
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
                <button type="button" class="btn btn-primary">Allocate Selected Students</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Allocation Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Allocation Summary</option>
                        <option value="by_room">By Room</option>
                        <option value="by_class">By Class</option>
                        <option value="payment">Payment Status</option>
                        <option value="expiry">Expiry Report</option>
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
