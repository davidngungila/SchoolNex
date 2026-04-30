@extends('layouts.app')

@section('title', 'Live Tracking')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Live Vehicle Tracking</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#alertModal">
                        <i class="bx bx-bell me-1"></i> Send Alert
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Tracking Report
                    </button>
                    <button type="button" class="btn btn-info" id="refreshTracking">
                        <i class="bx bx-refresh me-1"></i> Refresh
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Tracking Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">6</h4>
                                        <p class="mb-0">Active Vehicles</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-bus avatar-icon"></i>
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
                                        <h4 class="mb-0">142</h4>
                                        <p class="mb-0">Students Onboard</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user avatar-icon"></i>
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
                                        <p class="mb-0">Delayed</p>
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
                                        <h4 class="mb-0">98%</h4>
                                        <p class="mb-0">On-Time Rate</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-check-circle avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map View -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Live Map View</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div id="mapContainer" style="height: 400px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <div class="text-center">
                                        <i class="bx bx-map" style="font-size: 48px; color: #666;"></i>
                                        <p class="mt-2 mb-0">Interactive Map View</p>
                                        <small class="text-muted">Real-time vehicle locations</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Vehicle Status</h6>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="fw-bold">VH001</div>
                                                    <small class="text-muted">City Center Route</small>
                                                </div>
                                                <span class="badge bg-success">On Time</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="fw-bold">VH002</div>
                                                    <small class="text-muted">Suburban Route</small>
                                                </div>
                                                <span class="badge bg-warning">5 min delay</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="fw-bold">VH003</div>
                                                    <small class="text-muted">Rural Route</small>
                                                </div>
                                                <span class="badge bg-success">On Time</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="fw-bold">VH004</div>
                                                    <small class="text-muted">Express Route</small>
                                                </div>
                                                <span class="badge bg-success">On Time</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="routeFilter" class="form-label">Route</label>
                        <select class="form-select" id="routeFilter">
                            <option value="">All Routes</option>
                            <option value="RT001">RT001 - City Center</option>
                            <option value="RT002">RT002 - Suburban</option>
                            <option value="RT003">RT003 - Rural</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="on-time">On Time</option>
                            <option value="delayed">Delayed</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="driverFilter" class="form-label">Driver</label>
                        <select class="form-select" id="driverFilter">
                            <option value="">All Drivers</option>
                            <option value="driver1">John Smith</option>
                            <option value="driver2">Mike Johnson</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchVehicle" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchVehicle" placeholder="Vehicle ID...">
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

                <!-- Tracking Details Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Vehicle</th>
                                <th>Driver</th>
                                <th>Route</th>
                                <th>Current Location</th>
                                <th>Speed</th>
                                <th>Students</th>
                                <th>Status</th>
                                <th>ETA</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-primary me-2">VH001</div>
                                        <div>
                                            <div class="fw-bold">Bus 45</div>
                                            <small class="text-muted">TZ 1234 AB</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Driver" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">+255 712 345 678</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-primary">RT001 - City Center</span></td>
                                <td>Market Square</td>
                                <td>35 km/h</td>
                                <td>25/45</td>
                                <td><span class="badge bg-success">On Time</span></td>
                                <td>07:45 AM</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTrackingModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactDriverModal"><i class="bx bx-phone me-2"></i>Contact Driver</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#sendAlertModal"><i class="bx bx-bell me-2"></i>Send Alert</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#routeHistoryModal"><i class="bx bx-history me-2"></i>Route History</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-primary me-2">VH002</div>
                                        <div>
                                            <div class="fw-bold">Bus 40</div>
                                            <small class="text-muted">TZ 5678 CD</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Driver" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Mike Johnson</div>
                                            <small class="text-muted">+255 712 987 654</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-info">RT002 - Suburban</span></td>
                                <td>Hospital Junction</td>
                                <td>30 km/h</td>
                                <td>22/40</td>
                                <td><span class="badge bg-warning">5 min delay</span></td>
                                <td>08:05 AM</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTrackingModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactDriverModal"><i class="bx bx-phone me-2"></i>Contact Driver</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#sendAlertModal"><i class="bx bx-bell me-2"></i>Send Alert</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#routeHistoryModal"><i class="bx bx-history me-2"></i>Route History</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-info me-2">VH003</div>
                                        <div>
                                            <div class="fw-bold">Van 15</div>
                                            <small class="text-muted">TZ 9012 EF</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Driver" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">David Wilson</div>
                                            <small class="text-muted">+255 712 456 123</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">RT003 - Rural</span></td>
                                <td>Village Center</td>
                                <td>25 km/h</td>
                                <td>12/15</td>
                                <td><span class="badge bg-success">On Time</span></td>
                                <td>06:55 AM</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTrackingModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactDriverModal"><i class="bx bx-phone me-2"></i>Contact Driver</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#sendAlertModal"><i class="bx bx-bell me-2"></i>Send Alert</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#routeHistoryModal"><i class="bx bx-history me-2"></i>Route History</a></li>
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

<!-- View Tracking Modal -->
<div class="modal fade" id="viewTrackingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vehicle Tracking Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6>Vehicle Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Vehicle ID:</strong></td>
                                <td>VH001</td>
                            </tr>
                            <tr>
                                <td><strong>Plate Number:</strong></td>
                                <td>TZ 1234 AB</td>
                            </tr>
                            <tr>
                                <td><strong>Capacity:</strong></td>
                                <td>45 passengers</td>
                            </tr>
                            <tr>
                                <td><strong>Current Speed:</strong></td>
                                <td>35 km/h</td>
                            </tr>
                            <tr>
                                <td><strong>Fuel Level:</strong></td>
                                <td>75%</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Driver Information</h6>
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Driver" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                            <div>
                                <h6 class="mb-0">John Smith</h6>
                                <p class="mb-0">+255 712 345 678</p>
                                <small class="text-muted">License: Commercial Driver</small>
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Experience:</strong></td>
                                <td>5 years</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h6>Current Route Progress</h6>
                        <div class="progress" style="height: 25px;">
                            <div class="progress-bar bg-success" style="width: 65%">65% Complete</div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <small>Started: 07:00 AM</small>
                            <small>Current: Market Square</small>
                            <small>ETA: 07:45 AM</small>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <h6>Students Onboard</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Pickup Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>STU001</td>
                                        <td>John Smith</td>
                                        <td>07:15 AM</td>
                                        <td><span class="badge bg-success">Onboard</span></td>
                                    </tr>
                                    <tr>
                                        <td>STU002</td>
                                        <td>Sarah Johnson</td>
                                        <td>07:20 AM</td>
                                        <td><span class="badge bg-success">Onboard</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Recent Alerts</h6>
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <small>07:30 AM</small>
                                    <span class="badge bg-success">Info</span>
                                </div>
                                <p class="mb-0">Vehicle departed from City Center Bus Stop</p>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <small>07:25 AM</small>
                                    <span class="badge bg-info">Update</span>
                                </div>
                                <p class="mb-0">15 students picked up at City Center</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Refresh Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Contact Driver Modal -->
<div class="modal fade" id="contactDriverModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Driver</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Driver" class="rounded-circle" style="width: 80px; height: 80px;">
                    <h6 class="mt-2">John Smith</h6>
                    <p class="mb-0">Vehicle: VH001 - Bus 45</p>
                    <p class="mb-0">Route: RT001 - City Center</p>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success">
                        <i class="bx bx-phone me-2"></i> Call Driver (+255 712 345 678)
                    </button>
                    <button type="button" class="btn btn-primary">
                        <i class="bx bx-message me-2"></i> Send SMS Message
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

<!-- Send Alert Modal -->
<div class="modal fade" id="sendAlertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Alert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="vehicleSelect" class="form-label">Select Vehicle</label>
                        <select class="form-select" id="vehicleSelect">
                            <option value="VH001">VH001 - Bus 45</option>
                            <option value="VH002">VH002 - Bus 40</option>
                            <option value="VH003">VH003 - Van 15</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alertType" class="form-label">Alert Type</label>
                        <select class="form-select" id="alertType">
                            <option value="traffic">Traffic Delay</option>
                            <option value="mechanical">Mechanical Issue</option>
                            <option value="weather">Weather Condition</option>
                            <option value="emergency">Emergency</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alertMessage" class="form-label">Alert Message</label>
                        <textarea class="form-control" id="alertMessage" rows="3" required placeholder="Enter alert message..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="notifyParents" class="form-label">Notify Parents</label>
                        <select class="form-select" id="notifyParents">
                            <option value="all">All Parents on Route</option>
                            <option value="selected">Selected Parents Only</option>
                            <option value="none">Do Not Notify Parents</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning">Send Alert</button>
            </div>
        </div>
    </div>
</div>

<!-- Route History Modal -->
<div class="modal fade" id="routeHistoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Route History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="dateSelect" class="form-label">Select Date</label>
                    <input type="date" class="form-control" id="dateSelect" value="{{ date('Y-m-d') }}">
                </div>
                
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Location</th>
                                <th>Speed</th>
                                <th>Event</th>
                                <th>Students</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>07:00 AM</td>
                                <td>School Gate</td>
                                <td>0 km/h</td>
                                <td>Departure</td>
                                <td>0/45</td>
                            </tr>
                            <tr>
                                <td>07:15 AM</td>
                                <td>City Center Bus Stop</td>
                                <td>25 km/h</td>
                                <td>Pickup Point</td>
                                <td>8/45</td>
                            </tr>
                            <tr>
                                <td>07:25 AM</td>
                                <td>Market Square</td>
                                <td>35 km/h</td>
                                <td>Pickup Point</td>
                                <td>18/45</td>
                            </tr>
                            <tr>
                                <td>07:35 AM</td>
                                <td>Hospital Junction</td>
                                <td>30 km/h</td>
                                <td>Pickup Point</td>
                                <td>25/45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Export History</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tracking Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="daily">Daily Tracking Summary</option>
                        <option value="performance">Vehicle Performance</option>
                        <option value="attendance">Student Attendance</option>
                        <option value="delays">Delay Analysis</option>
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

<!-- Alert Modal (Main) -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send System Alert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="alertTitle" class="form-label">Alert Title</label>
                        <input type="text" class="form-control" id="alertTitle" placeholder="Enter alert title...">
                    </div>
                    <div class="mb-3">
                        <label for="alertMessage" class="form-label">Alert Message</label>
                        <textarea class="form-control" id="alertMessage" rows="3" placeholder="Enter alert message..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="alertPriority" class="form-label">Priority</label>
                        <select class="form-select" id="alertPriority">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="notifyUsers" class="form-label">Notify Users</label>
                        <select class="form-select" id="notifyUsers" multiple>
                            <option value="drivers">All Drivers</option>
                            <option value="parents">All Parents</option>
                            <option value="admin">Administrators</option>
                            <option value="teachers">Teachers</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning">Send Alert</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Simulate real-time updates
    const refreshButton = document.getElementById('refreshTracking');
    if (refreshButton) {
        refreshButton.addEventListener('click', function() {
            // Add spinning animation
            this.innerHTML = '<i class="bx bx-refresh bx-spin me-1"></i> Refreshing...';
            
            // Simulate data refresh
            setTimeout(() => {
                this.innerHTML = '<i class="bx bx-refresh me-1"></i> Refresh';
                // Show success message
                const toast = document.createElement('div');
                toast.className = 'alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3';
                toast.innerHTML = '<i class="bx bx-check me-2"></i>Tracking data refreshed successfully!';
                document.body.appendChild(toast);
                
                setTimeout(() => {
                    toast.remove();
                }, 3000);
            }, 1000);
        });
    }
    
    // Auto-refresh every 30 seconds
    setInterval(() => {
        console.log('Auto-refreshing tracking data...');
        // In a real application, this would fetch new data from the server
    }, 30000);
});
</script>
@endsection
