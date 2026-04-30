@extends('layouts.app')

@section('title', 'Route Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Route Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRouteModal">
                        <i class="bx bx-plus me-1"></i> Add Route
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignVehicleModal">
                        <i class="bx bx-bus me-1"></i> Assign Vehicle
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Route Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Route Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">12</h4>
                                        <p class="mb-0">Total Routes</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-map avatar-icon"></i>
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
                                        <h4 class="mb-0">8</h4>
                                        <p class="mb-0">Active Routes</p>
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
                                        <h4 class="mb-0">156</h4>
                                        <p class="mb-0">Students Served</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user avatar-icon"></i>
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
                                        <h4 class="mb-0">45</h4>
                                        <p class="mb-0">Stop Points</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-location-plus avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="routeStatus" class="form-label">Status</label>
                        <select class="form-select" id="routeStatus">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="maintenance">Under Maintenance</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="vehicle" class="form-label">Vehicle</label>
                        <select class="form-select" id="vehicle">
                            <option value="">All Vehicles</option>
                            <option value="VH001">VH001 - Bus</option>
                            <option value="VH002">VH002 - Bus</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="area" class="form-label">Area</label>
                        <select class="form-select" id="area">
                            <option value="">All Areas</option>
                            <option value="city-center">City Center</option>
                            <option value="suburbs">Suburbs</option>
                            <option value="rural">Rural Areas</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchRoute" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchRoute" placeholder="Route name...">
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

                <!-- Routes Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Route ID</th>
                                <th>Route Name</th>
                                <th>Vehicle</th>
                                <th>Driver</th>
                                <th>Area</th>
                                <th>Students</th>
                                <th>Stop Points</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>RT001</strong></td>
                                <td>City Center Route A</td>
                                <td>VH001 - Bus</td>
                                <td>John Smith</td>
                                <td><span class="badge bg-primary">City Center</span></td>
                                <td>25</td>
                                <td>8</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRouteModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRouteModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#manageStopsModal"><i class="bx bx-location-plus me-2"></i>Manage Stops</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#assignVehicleModal"><i class="bx bx-bus me-2"></i>Assign Vehicle</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RT002</strong></td>
                                <td>Suburban Route B</td>
                                <td>VH002 - Bus</td>
                                <td>Mike Johnson</td>
                                <td><span class="badge bg-info">Suburbs</span></td>
                                <td>30</td>
                                <td>12</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRouteModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRouteModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#manageStopsModal"><i class="bx bx-location-plus me-2"></i>Manage Stops</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#assignVehicleModal"><i class="bx bx-bus me-2"></i>Assign Vehicle</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RT003</strong></td>
                                <td>Rural Route C</td>
                                <td>VH003 - Van</td>
                                <td>David Wilson</td>
                                <td><span class="badge bg-warning">Rural Areas</span></td>
                                <td>18</td>
                                <td>6</td>
                                <td><span class="badge bg-warning">Inactive</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRouteModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRouteModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#manageStopsModal"><i class="bx bx-location-plus me-2"></i>Manage Stops</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#assignVehicleModal"><i class="bx bx-bus me-2"></i>Assign Vehicle</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-play me-2"></i>Activate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
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

<!-- Add Route Modal -->
<div class="modal fade" id="addRouteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Route</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="routeName" class="form-label">Route Name *</label>
                            <input type="text" class="form-control" id="routeName" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="routeCode" class="form-label">Route Code *</label>
                            <input type="text" class="form-control" id="routeCode" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="area" class="form-label">Area *</label>
                            <select class="form-select" id="area" required>
                                <option value="">Select Area</option>
                                <option value="city-center">City Center</option>
                                <option value="suburbs">Suburbs</option>
                                <option value="rural">Rural Areas</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="vehicle" class="form-label">Assign Vehicle</label>
                            <select class="form-select" id="vehicle">
                                <option value="">Select Vehicle</option>
                                <option value="VH001">VH001 - Bus</option>
                                <option value="VH002">VH002 - Bus</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="driver" class="form-label">Assign Driver</label>
                            <select class="form-select" id="driver">
                                <option value="">Select Driver</option>
                                <option value="driver1">John Smith</option>
                                <option value="driver2">Mike Johnson</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="departureTime" class="form-label">Departure Time</label>
                            <input type="time" class="form-control" id="departureTime">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="arrivalTime" class="form-label">Arrival Time</label>
                            <input type="time" class="form-control" id="arrivalTime">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="frequency" class="form-label">Frequency</label>
                            <select class="form-select" id="frequency">
                                <option value="daily">Daily</option>
                                <option value="weekdays">Weekdays Only</option>
                                <option value="weekends">Weekends Only</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter route description..."></textarea>
                    </div>
                    
                    <!-- Route Stops -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Route Stops</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="stopsTable">
                                    <thead>
                                        <tr>
                                            <th>Stop Name</th>
                                            <th>Address</th>
                                            <th>Time</th>
                                            <th>Students</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Stop name"></td>
                                            <td><input type="text" class="form-control" placeholder="Address"></td>
                                            <td><input type="time" class="form-control"></td>
                                            <td><input type="number" class="form-control" min="0" value="0"></td>
                                            <td><button type="button" class="btn btn-sm btn-danger">Remove</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm">Add Stop</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Route</button>
            </div>
        </div>
    </div>
</div>

<!-- View Route Modal -->
<div class="modal fade" id="viewRouteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Route Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6>Route Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Route ID:</strong></td>
                                <td>RT001</td>
                            </tr>
                            <tr>
                                <td><strong>Route Name:</strong></td>
                                <td>City Center Route A</td>
                            </tr>
                            <tr>
                                <td><strong>Route Code:</strong></td>
                                <td>CC-A-001</td>
                            </tr>
                            <tr>
                                <td><strong>Area:</strong></td>
                                <td>City Center</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td><strong>Total Students:</strong></td>
                                <td>25</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Vehicle & Driver</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Vehicle:</strong></td>
                                <td>VH001 - Bus (45 seats)</td>
                            </tr>
                            <tr>
                                <td><strong>Driver:</strong></td>
                                <td>John Smith</td>
                            </tr>
                            <tr>
                                <td><strong>Contact:</strong></td>
                                <td>+255 712 345 678</td>
                            </tr>
                            <tr>
                                <td><strong>Departure Time:</strong></td>
                                <td>07:00 AM</td>
                            </tr>
                            <tr>
                                <td><strong>Arrival Time:</strong></td>
                                <td>08:30 AM</td>
                            </tr>
                            <tr>
                                <td><strong>Frequency:</strong></td>
                                <td>Weekdays Only</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Route Stops & Schedule</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Stop #</th>
                                        <th>Stop Name</th>
                                        <th>Address</th>
                                        <th>Pickup Time</th>
                                        <th>Students</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>School Gate</td>
                                        <td>Main School Entrance</td>
                                        <td>07:00 AM</td>
                                        <td>0</td>
                                        <td>Starting Point</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>City Center Bus Stop</td>
                                        <td>Central Business District</td>
                                        <td>07:15 AM</td>
                                        <td>8</td>
                                        <td>Main pickup point</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Market Square</td>
                                        <td>Near Central Market</td>
                                        <td>07:25 AM</td>
                                        <td>6</td>
                                        <td>Wait 2 minutes</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Hospital Junction</td>
                                        <td>Near City Hospital</td>
                                        <td>07:35 AM</td>
                                        <td>5</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Shopping Mall</td>
                                        <td>City Mall Entrance</td>
                                        <td>07:45 AM</td>
                                        <td>6</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Print Route</button>
                <button type="button" class="btn btn-info">Export PDF</button>
            </div>
        </div>
    </div>
</div>

<!-- Manage Stops Modal -->
<div class="modal fade" id="manageStopsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Route Stops</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="routeSelect" class="form-label">Select Route</label>
                    <select class="form-select" id="routeSelect">
                        <option value="RT001">RT001 - City Center Route A</option>
                        <option value="RT002">RT002 - Suburban Route B</option>
                    </select>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Stop Order</th>
                                <th>Stop Name</th>
                                <th>Address</th>
                                <th>Pickup Time</th>
                                <th>Students</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" class="form-control" value="1" min="1"></td>
                                <td><input type="text" class="form-control" value="City Center Bus Stop"></td>
                                <td><input type="text" class="form-control" value="Central Business District"></td>
                                <td><input type="time" class="form-control" value="07:15"></td>
                                <td><input type="number" class="form-control" value="8" min="0"></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-outline-primary">Add New Stop</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Assign Vehicle Modal -->
<div class="modal fade" id="assignVehicleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Vehicle to Route</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="routeSelect" class="form-label">Select Route *</label>
                        <select class="form-select" id="routeSelect" required>
                            <option value="">Select Route</option>
                            <option value="RT001">RT001 - City Center Route A</option>
                            <option value="RT002">RT002 - Suburban Route B</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="vehicleSelect" class="form-label">Select Vehicle *</label>
                        <select class="form-select" id="vehicleSelect" required>
                            <option value="">Select Vehicle</option>
                            <option value="VH001">VH001 - Bus (45 seats)</option>
                            <option value="VH002">VH002 - Bus (40 seats)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="driverSelect" class="form-label">Select Driver *</label>
                        <select class="form-select" id="driverSelect" required>
                            <option value="">Select Driver</option>
                            <option value="driver1">John Smith</option>
                            <option value="driver2">Mike Johnson</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="effectiveDate" class="form-label">Effective Date *</label>
                        <input type="date" class="form-control" id="effectiveDate" value="{{ date('Y-m-d') }}" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Assign Vehicle</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Route Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Route Summary</option>
                        <option value="utilization">Route Utilization</option>
                        <option value="students">Student Distribution</option>
                        <option value="performance">Performance Report</option>
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
