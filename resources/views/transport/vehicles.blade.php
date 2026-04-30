@extends('layouts.app')

@section('title', 'Vehicle Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Vehicle Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addVehicleModal">
                        <i class="bx bx-plus me-1"></i> Add Vehicle
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#maintenanceModal">
                        <i class="bx bx-wrench me-1"></i> Schedule Maintenance
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Vehicle Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Vehicle Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">8</h4>
                                        <p class="mb-0">Total Vehicles</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-bus avatar-icon"></i>
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
                                        <p class="mb-0">Active</p>
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
                                        <h4 class="mb-0">2</h4>
                                        <p class="mb-0">Maintenance</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-wrench avatar-icon"></i>
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
                                        <h4 class="mb-0">240</h4>
                                        <p class="mb-0">Total Capacity</p>
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
                        <label for="vehicleType" class="form-label">Vehicle Type</label>
                        <select class="form-select" id="vehicleType">
                            <option value="">All Types</option>
                            <option value="bus">Bus</option>
                            <option value="van">Van</option>
                            <option value="car">Car</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="vehicleStatus" class="form-label">Status</label>
                        <select class="form-select" id="vehicleStatus">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="driver" class="form-label">Driver</label>
                        <select class="form-select" id="driver">
                            <option value="">All Drivers</option>
                            <option value="driver1">John Smith</option>
                            <option value="driver2">Mike Johnson</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchVehicle" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchVehicle" placeholder="Plate number...">
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

                <!-- Vehicles Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Vehicle ID</th>
                                <th>Plate Number</th>
                                <th>Type</th>
                                <th>Capacity</th>
                                <th>Driver</th>
                                <th>Status</th>
                                <th>Last Maintenance</th>
                                <th>Next Maintenance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>VH001</strong></td>
                                <td>TZ 1234 AB</td>
                                <td><span class="badge bg-primary">Bus</span></td>
                                <td>45</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Driver" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">+255 712 345 678</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>2024-01-15</td>
                                <td>2024-04-15</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewVehicleModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editVehicleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#maintenanceModal"><i class="bx bx-wrench me-2"></i>Schedule Maintenance</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#assignDriverModal"><i class="bx bx-user me-2"></i>Assign Driver</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>VH002</strong></td>
                                <td>TZ 5678 CD</td>
                                <td><span class="badge bg-primary">Bus</span></td>
                                <td>40</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Driver" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Mike Johnson</div>
                                            <small class="text-muted">+255 712 987 654</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>2024-01-20</td>
                                <td>2024-04-20</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewVehicleModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editVehicleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#maintenanceModal"><i class="bx bx-wrench me-2"></i>Schedule Maintenance</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#assignDriverModal"><i class="bx bx-user me-2"></i>Assign Driver</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>VH003</strong></td>
                                <td>TZ 9012 EF</td>
                                <td><span class="badge bg-info">Van</span></td>
                                <td>15</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Driver" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">David Wilson</div>
                                            <small class="text-muted">+255 712 456 123</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">Maintenance</span></td>
                                <td>2024-01-10</td>
                                <td>2024-02-10</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewVehicleModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editVehicleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#maintenanceModal"><i class="bx bx-wrench me-2"></i>Schedule Maintenance</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#assignDriverModal"><i class="bx bx-user me-2"></i>Assign Driver</a></li>
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

<!-- Add Vehicle Modal -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Vehicle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="plateNumber" class="form-label">Plate Number *</label>
                            <input type="text" class="form-control" id="plateNumber" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="vehicleType" class="form-label">Vehicle Type *</label>
                            <select class="form-select" id="vehicleType" required>
                                <option value="">Select Type</option>
                                <option value="bus">Bus</option>
                                <option value="van">Van</option>
                                <option value="car">Car</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="capacity" class="form-label">Capacity *</label>
                            <input type="number" class="form-control" id="capacity" min="1" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="make" class="form-label">Make</label>
                            <input type="text" class="form-control" id="make" placeholder="e.g., Toyota">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="model" placeholder="e.g., Hiace">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" class="form-control" id="year" min="2000" max="2024">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fuelType" class="form-label">Fuel Type</label>
                            <select class="form-select" id="fuelType">
                                <option value="petrol">Petrol</option>
                                <option value="diesel">Diesel</option>
                                <option value="hybrid">Hybrid</option>
                                <option value="electric">Electric</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="driver" class="form-label">Assign Driver</label>
                            <select class="form-select" id="driver">
                                <option value="">Select Driver</option>
                                <option value="driver1">John Smith</option>
                                <option value="driver2">Mike Johnson</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="insuranceExpiry" class="form-label">Insurance Expiry</label>
                            <input type="date" class="form-control" id="insuranceExpiry">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter vehicle description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="vehicleImage" class="form-label">Vehicle Image</label>
                        <input type="file" class="form-control" id="vehicleImage" accept="image/*">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Vehicle</button>
            </div>
        </div>
    </div>
</div>

<!-- View Vehicle Modal -->
<div class="modal fade" id="viewVehicleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vehicle Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
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
                                <td><strong>Type:</strong></td>
                                <td>Bus</td>
                            </tr>
                            <tr>
                                <td><strong>Capacity:</strong></td>
                                <td>45 passengers</td>
                            </tr>
                            <tr>
                                <td><strong>Make/Model:</strong></td>
                                <td>Toyota Hiace</td>
                            </tr>
                            <tr>
                                <td><strong>Year:</strong></td>
                                <td>2020</td>
                            </tr>
                            <tr>
                                <td><strong>Fuel Type:</strong></td>
                                <td>Diesel</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <h6>Driver Information</h6>
                        <div class="text-center">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Driver" class="rounded-circle mb-2" style="width: 80px; height: 80px;">
                            <h6>John Smith</h6>
                            <p class="mb-0">+255 712 345 678</p>
                            <p class="mb-0">driver@school.edu</p>
                            <span class="badge bg-success">Active</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Maintenance Schedule</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Last Maintenance:</strong></td>
                                <td>2024-01-15</td>
                            </tr>
                            <tr>
                                <td><strong>Next Maintenance:</strong></td>
                                <td>2024-04-15</td>
                            </tr>
                            <tr>
                                <td><strong>Mileage:</strong></td>
                                <td>45,230 km</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Documents</h6>
                        <ul class="list-unstyled">
                            <li><i class="bx bx-file me-2"></i>Insurance: Valid until 2024-12-31</li>
                            <li><i class="bx bx-file me-2"></i>Registration: Valid until 2025-01-31</li>
                            <li><i class="bx bx-file me-2"></i>Fitness Certificate: Valid until 2024-06-30</li>
                        </ul>
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
                        <label for="vehicleSelect" class="form-label">Select Vehicle *</label>
                        <select class="form-select" id="vehicleSelect" required>
                            <option value="">Select Vehicle</option>
                            <option value="VH001">VH001 - TZ 1234 AB</option>
                            <option value="VH002">VH002 - TZ 5678 CD</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="maintenanceType" class="form-label">Maintenance Type *</label>
                        <select class="form-select" id="maintenanceType" required>
                            <option value="">Select Type</option>
                            <option value="routine">Routine Service</option>
                            <option value="repair">Repair</option>
                            <option value="inspection">Inspection</option>
                            <option value="emergency">Emergency</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="maintenanceDate" class="form-label">Maintenance Date *</label>
                        <input type="date" class="form-control" id="maintenanceDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="maintenanceNotes" class="form-label">Notes</label>
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

<!-- Assign Driver Modal -->
<div class="modal fade" id="assignDriverModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Driver</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="vehicleSelect" class="form-label">Select Vehicle *</label>
                        <select class="form-select" id="vehicleSelect" required>
                            <option value="">Select Vehicle</option>
                            <option value="VH001">VH001 - TZ 1234 AB</option>
                            <option value="VH002">VH002 - TZ 5678 CD</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="driverSelect" class="form-label">Select Driver *</label>
                        <select class="form-select" id="driverSelect" required>
                            <option value="">Select Driver</option>
                            <option value="driver1">John Smith</option>
                            <option value="driver2">Mike Johnson</option>
                            <option value="driver3">David Wilson</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="assignmentDate" class="form-label">Assignment Date *</label>
                        <input type="date" class="form-control" id="assignmentDate" value="{{ date('Y-m-d') }}" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Assign Driver</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vehicle Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Vehicle Summary</option>
                        <option value="maintenance">Maintenance Report</option>
                        <option value="usage">Usage Report</option>
                        <option value="fuel">Fuel Consumption</option>
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
