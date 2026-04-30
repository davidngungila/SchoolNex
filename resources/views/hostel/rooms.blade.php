@extends('layouts.app')

@section('title', 'Room Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Room Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRoomModal">
                        <i class="bx bx-plus me-1"></i> Add Room
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#maintenanceModal">
                        <i class="bx bx-wrench me-1"></i> Schedule Maintenance
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Room Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Room Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">24</h4>
                                        <p class="mb-0">Total Rooms</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-building avatar-icon"></i>
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
                                        <h4 class="mb-0">18</h4>
                                        <p class="mb-0">Occupied</p>
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
                                        <h4 class="mb-0">6</h4>
                                        <p class="mb-0">Available</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-door-open avatar-icon"></i>
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
                                        <h4 class="mb-0">72</h4>
                                        <p class="mb-0">Total Capacity</p>
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
                        <label for="roomType" class="form-label">Room Type</label>
                        <select class="form-select" id="roomType">
                            <option value="">All Types</option>
                            <option value="single">Single</option>
                            <option value="double">Double</option>
                            <option value="dormitory">Dormitory</option>
                            <option value="suite">Suite</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="roomStatus" class="form-label">Status</label>
                        <select class="form-select" id="roomStatus">
                            <option value="">All Status</option>
                            <option value="available">Available</option>
                            <option value="occupied">Occupied</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="reserved">Reserved</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="floor" class="form-label">Floor</label>
                        <select class="form-select" id="floor">
                            <option value="">All Floors</option>
                            <option value="1">Ground Floor</option>
                            <option value="2">First Floor</option>
                            <option value="3">Second Floor</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchRoom" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchRoom" placeholder="Room number...">
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

                <!-- Rooms Grid -->
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">Room 101</h6>
                                    <span class="badge bg-success">Available</span>
                                </div>
                                <div class="mb-2">
                                    <small class="text-muted">Type: Double Room</small><br>
                                    <small class="text-muted">Floor: Ground Floor</small><br>
                                    <small class="text-muted">Capacity: 2 students</small>
                                </div>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 0%"></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <small>0/2 Occupied</small>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoomModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoomModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#allocateModal"><i class="bx bx-user-plus me-2"></i>Allocate Student</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#maintenanceModal"><i class="bx bx-wrench me-2"></i>Schedule Maintenance</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">Room 102</h6>
                                    <span class="badge bg-warning">Occupied</span>
                                </div>
                                <div class="mb-2">
                                    <small class="text-muted">Type: Double Room</small><br>
                                    <small class="text-muted">Floor: Ground Floor</small><br>
                                    <small class="text-muted">Capacity: 2 students</small>
                                </div>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-warning" style="width: 100%"></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <small>2/2 Occupied</small>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoomModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoomModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#vacateModal"><i class="bx bx-user-minus me-2"></i>Vacate Room</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#maintenanceModal"><i class="bx bx-wrench me-2"></i>Schedule Maintenance</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">Room 201</h6>
                                    <span class="badge bg-danger">Maintenance</span>
                                </div>
                                <div class="mb-2">
                                    <small class="text-muted">Type: Dormitory</small><br>
                                    <small class="text-muted">Floor: First Floor</small><br>
                                    <small class="text-muted">Capacity: 8 students</small>
                                </div>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-danger" style="width: 0%"></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <small>0/8 Occupied</small>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoomModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoomModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#completeMaintenanceModal"><i class="bx bx-check me-2"></i>Complete Maintenance</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#maintenanceModal"><i class="bx bx-wrench me-2"></i>Update Maintenance</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">Room 202</h6>
                                    <span class="badge bg-success">Available</span>
                                </div>
                                <div class="mb-2">
                                    <small class="text-muted">Type: Single Room</small><br>
                                    <small class="text-muted">Floor: First Floor</small><br>
                                    <small class="text-muted">Capacity: 1 student</small>
                                </div>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 0%"></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <small>0/1 Occupied</small>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoomModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoomModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#allocateModal"><i class="bx bx-user-plus me-2"></i>Allocate Student</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#maintenanceModal"><i class="bx bx-wrench me-2"></i>Schedule Maintenance</a></li>
                                        </ul>
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

<!-- Add Room Modal -->
<div class="modal fade" id="addRoomModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="roomNumber" class="form-label">Room Number *</label>
                            <input type="text" class="form-control" id="roomNumber" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="roomType" class="form-label">Room Type *</label>
                            <select class="form-select" id="roomType" required>
                                <option value="">Select Type</option>
                                <option value="single">Single Room</option>
                                <option value="double">Double Room</option>
                                <option value="dormitory">Dormitory</option>
                                <option value="suite">Suite</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="floor" class="form-label">Floor *</label>
                            <select class="form-select" id="floor" required>
                                <option value="">Select Floor</option>
                                <option value="1">Ground Floor</option>
                                <option value="2">First Floor</option>
                                <option value="3">Second Floor</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="capacity" class="form-label">Capacity *</label>
                            <input type="number" class="form-control" id="capacity" min="1" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="beds" class="form-label">Number of Beds</label>
                            <input type="number" class="form-control" id="beds" min="1">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="roomFee" class="form-label">Monthly Fee ($)</label>
                            <input type="number" class="form-control" id="roomFee" min="0" step="0.01">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="facilities" class="form-label">Facilities</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="attachedBathroom">
                                <label class="form-check-label" for="attachedBathroom">
                                    Attached Bathroom
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="airConditioning">
                                <label class="form-check-label" for="airConditioning">
                                    Air Conditioning
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="studyTable">
                                <label class="form-check-label" for="studyTable">
                                    Study Table
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wardrobe">
                                <label class="form-check-label" for="wardrobe">
                                    Wardrobe
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="roomImage" class="form-label">Room Image</label>
                            <input type="file" class="form-control" id="roomImage" accept="image/*">
                            <small class="text-muted">Upload room photo</small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter room description..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Room</button>
            </div>
        </div>
    </div>
</div>

<!-- View Room Modal -->
<div class="modal fade" id="viewRoomModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Room Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Room Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Room Number:</strong></td>
                                <td>Room 101</td>
                            </tr>
                            <tr>
                                <td><strong>Type:</strong></td>
                                <td>Double Room</td>
                            </tr>
                            <tr>
                                <td><strong>Floor:</strong></td>
                                <td>Ground Floor</td>
                            </tr>
                            <tr>
                                <td><strong>Capacity:</strong></td>
                                <td>2 students</td>
                            </tr>
                            <tr>
                                <td><strong>Number of Beds:</strong></td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td><strong>Monthly Fee:</strong></td>
                                <td>$150.00</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Available</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Facilities</h6>
                        <ul class="list-unstyled">
                            <li><i class="bx bx-check text-success me-2"></i>Attached Bathroom</li>
                            <li><i class="bx bx-check text-success me-2"></i>Air Conditioning</li>
                            <li><i class="bx bx-check text-success me-2"></i>Study Table</li>
                            <li><i class="bx bx-check text-success me-2"></i>Wardrobe</li>
                            <li><i class="bx bx-check text-success me-2"></i>Wi-Fi Access</li>
                            <li><i class="bx bx-check text-success me-2"></i>24/7 Security</li>
                        </ul>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Current Occupants</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Allocation Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No occupants currently</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Maintenance History</h6>
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <small>2024-01-15</small>
                                    <span class="badge bg-success">Completed</span>
                                </div>
                                <p class="mb-0">Routine cleaning and maintenance</p>
                            </div>
                        </div>
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

<!-- Allocate Student Modal -->
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
                            <label for="roomSelect" class="form-label">Select Room *</label>
                            <select class="form-select" id="roomSelect" required>
                                <option value="">Select Room</option>
                                <option value="101">Room 101 - Double Room</option>
                                <option value="202">Room 202 - Single Room</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="studentSearch" class="form-label">Search Student *</label>
                            <input type="text" class="form-control" id="studentSearch" placeholder="Enter student name or ID" required>
                        </div>
                    </div>
                    
                    <!-- Student Selection -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Available Students</h6>
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
                                            <td><input type="radio" name="studentSelect" value="STU001"></td>
                                            <td>STU001</td>
                                            <td>John Smith</td>
                                            <td>Class 1A</td>
                                            <td><span class="badge bg-secondary">Not Allocated</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="studentSelect" value="STU004"></td>
                                            <td>STU004</td>
                                            <td>Emily Davis</td>
                                            <td>Class 1A</td>
                                            <td><span class="badge bg-secondary">Not Allocated</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="allocationDate" class="form-label">Allocation Date *</label>
                            <input type="date" class="form-control" id="allocationDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select class="form-select" id="semester">
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                            </select>
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

<!-- Maintenance Modal -->
<div class="modal fade" id="maintenanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Maintenance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="roomSelect" class="form-label">Select Room *</label>
                        <select class="form-select" id="roomSelect" required>
                            <option value="">Select Room</option>
                            <option value="101">Room 101</option>
                            <option value="102">Room 102</option>
                            <option value="201">Room 201</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="maintenanceType" class="form-label">Maintenance Type *</label>
                        <select class="form-select" id="maintenanceType" required>
                            <option value="">Select Type</option>
                            <option value="routine">Routine Cleaning</option>
                            <option value="repair">Repair</option>
                            <option value="inspection">Inspection</option>
                            <option value="renovation">Renovation</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="maintenanceDate" class="form-label">Maintenance Date *</label>
                        <input type="date" class="form-control" id="maintenanceDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="estimatedDuration" class="form-label">Estimated Duration</label>
                        <select class="form-select" id="estimatedDuration">
                            <option value="1">1 Day</option>
                            <option value="2">2 Days</option>
                            <option value="3">3 Days</option>
                            <option value="7">1 Week</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="maintenanceNotes" class="form-label">Description</label>
                        <textarea class="form-control" id="maintenanceNotes" rows="3" placeholder="Enter maintenance details..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Schedule Maintenance</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Room Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="occupancy">Occupancy Report</option>
                        <option value="maintenance">Maintenance Report</option>
                        <option value="revenue">Revenue Report</option>
                        <option value="summary">Room Summary</option>
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
