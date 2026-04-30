@extends('layouts.app')

@section('title', 'Hostel Maintenance')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Hostel Maintenance</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#scheduleMaintenanceModal">
                        <i class="bx bx-plus me-1"></i> Schedule Maintenance
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Maintenance Report
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#vendorModal">
                        <i class="bx bx-user me-1"></i> Manage Vendors
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Maintenance Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">8</h4>
                                        <p class="mb-0">Scheduled Tasks</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-calendar avatar-icon"></i>
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
                                        <h4 class="mb-0">5</h4>
                                        <p class="mb-0">Completed</p>
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
                                        <p class="mb-0">In Progress</p>
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
                                        <h4 class="mb-0">1</h4>
                                        <p class="mb-0">Overdue</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-error avatar-icon"></i>
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
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="overdue">Overdue</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="priorityFilter" class="form-label">Priority</label>
                        <select class="form-select" id="priorityFilter">
                            <option value="">All Priorities</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="typeFilter" class="form-label">Type</label>
                        <select class="form-select" id="typeFilter">
                            <option value="">All Types</option>
                            <option value="cleaning">Cleaning</option>
                            <option value="repair">Repair</option>
                            <option value="inspection">Inspection</option>
                            <option value="renovation">Renovation</option>
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

                <!-- Maintenance Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Task ID</th>
                                <th>Room</th>
                                <th>Task Type</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Scheduled Date</th>
                                <th>Status</th>
                                <th>Assigned To</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>MT001</strong></td>
                                <td><span class="badge bg-primary">Room 101</span></td>
                                <td><span class="badge bg-info">Cleaning</span></td>
                                <td>Deep cleaning and sanitization</td>
                                <td><span class="badge bg-success">Low</span></td>
                                <td>2024-01-20</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>Cleaning Staff</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editMaintenanceModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rescheduleModal"><i class="bx bx-calendar me-2"></i>Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Generate Report</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>MT002</strong></td>
                                <td><span class="badge bg-primary">Room 102</span></td>
                                <td><span class="badge bg-warning">Repair</span></td>
                                <td>Fix broken window lock</td>
                                <td><span class="badge bg-danger">High</span></td>
                                <td>2024-01-18</td>
                                <td><span class="badge bg-warning">In Progress</span></td>
                                <td>Maintenance Team</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#completeMaintenanceModal"><i class="bx bx-check me-2"></i>Mark Complete</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rescheduleModal"><i class="bx bx-calendar me-2"></i>Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#assignModal"><i class="bx bx-user me-2"></i>Reassign</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>MT003</strong></td>
                                <td><span class="badge bg-warning">Room 201</span></td>
                                <td><span class="badge bg-secondary">Inspection</span></td>
                                <td>Monthly safety inspection</td>
                                <td><span class="badge bg-warning">Medium</span></td>
                                <td>2024-01-15</td>
                                <td><span class="badge bg-danger">Overdue</span></td>
                                <td>Safety Officer</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#startMaintenanceModal"><i class="bx bx-play me-2"></i>Start Now</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rescheduleModal"><i class="bx bx-calendar me-2"></i>Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#assignModal"><i class="bx bx-user me-2"></i>Assign Staff</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>MT004</strong></td>
                                <td><span class="badge bg-info">Room 202</span></td>
                                <td><span class="badge bg-purple">Renovation</span></td>
                                <td>Paint walls and replace furniture</td>
                                <td><span class="badge bg-warning">Medium</span></td>
                                <td>2024-01-25</td>
                                <td><span class="badge bg-primary">Scheduled</span></td>
                                <td>Contractor</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editMaintenanceModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#startMaintenanceModal"><i class="bx bx-play me-2"></i>Start Early</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="bx bx-x me-2"></i>Cancel</a></li>
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

<!-- Schedule Maintenance Modal -->
<div class="modal fade" id="scheduleMaintenanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Maintenance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="roomSelect" class="form-label">Select Room *</label>
                            <select class="form-select" id="roomSelect" required>
                                <option value="">Select Room</option>
                                <option value="101">Room 101</option>
                                <option value="102">Room 102</option>
                                <option value="201">Room 201</option>
                                <option value="202">Room 202</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="maintenanceType" class="form-label">Maintenance Type *</label>
                            <select class="form-select" id="maintenanceType" required>
                                <option value="">Select Type</option>
                                <option value="cleaning">Cleaning</option>
                                <option value="repair">Repair</option>
                                <option value="inspection">Inspection</option>
                                <option value="renovation">Renovation</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="priority" class="form-label">Priority *</label>
                            <select class="form-select" id="priority" required>
                                <option value="">Select Priority</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="scheduledDate" class="form-label">Scheduled Date *</label>
                            <input type="date" class="form-control" id="scheduledDate" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="estimatedDuration" class="form-label">Estimated Duration</label>
                            <select class="form-select" id="estimatedDuration">
                                <option value="1">1 Hour</option>
                                <option value="2">2 Hours</option>
                                <option value="4">4 Hours</option>
                                <option value="8">Full Day</option>
                                <option value="24">Multiple Days</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="assignTo" class="form-label">Assign To</label>
                            <select class="form-select" id="assignTo">
                                <option value="">Select Staff</option>
                                <option value="cleaning">Cleaning Staff</option>
                                <option value="maintenance">Maintenance Team</option>
                                <option value="safety">Safety Officer</option>
                                <option value="contractor">External Contractor</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control" id="description" rows="3" required placeholder="Enter maintenance description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="notes" rows="2" placeholder="Any additional notes..."></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="estimatedCost" class="form-label">Estimated Cost ($)</label>
                            <input type="number" class="form-control" id="estimatedCost" min="0" step="0.01" placeholder="0.00">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="materials" class="form-label">Materials Needed</label>
                            <input type="text" class="form-control" id="materials" placeholder="List materials needed...">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="attachments" class="form-label">Attachments</label>
                        <input type="file" class="form-control" id="attachments" multiple accept="image/*,.pdf,.doc,.docx">
                        <small class="text-muted">Upload photos or documents</small>
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

<!-- View Maintenance Modal -->
<div class="modal fade" id="viewMaintenanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Maintenance Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Task Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Task ID:</strong></td>
                                <td>MT002</td>
                            </tr>
                            <tr>
                                <td><strong>Room:</strong></td>
                                <td>Room 102</td>
                            </tr>
                            <tr>
                                <td><strong>Type:</strong></td>
                                <td>Repair</td>
                            </tr>
                            <tr>
                                <td><strong>Priority:</strong></td>
                                <td><span class="badge bg-danger">High</span></td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-warning">In Progress</span></td>
                            </tr>
                            <tr>
                                <td><strong>Scheduled Date:</strong></td>
                                <td>2024-01-18</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Assignment Details</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Assigned To:</strong></td>
                                <td>Maintenance Team</td>
                            </tr>
                            <tr>
                                <td><strong>Estimated Duration:</strong></td>
                                <td>2 Hours</td>
                            </tr>
                            <tr>
                                <td><strong>Started At:</strong></td>
                                <td>2024-01-18 09:00 AM</td>
                            </tr>
                            <tr>
                                <td><strong>Estimated Cost:</strong></td>
                                <td>$50.00</td>
                            </tr>
                            <tr>
                                <td><strong>Materials:</strong></td>
                                <td>Window lock, screws</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Description</h6>
                        <p>Fix broken window lock in Room 102. The lock mechanism is damaged and needs to be replaced completely for security reasons.</p>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Progress Updates</h6>
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <small>2024-01-18 09:00 AM</small>
                                    <span class="badge bg-warning">In Progress</span>
                                </div>
                                <p class="mb-0">Task started. Technician has arrived at Room 102.</p>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <small>2024-01-18 08:45 AM</small>
                                    <span class="badge bg-primary">Scheduled</span>
                                </div>
                                <p class="mb-0">Maintenance team assigned and notified.</p>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <small>2024-01-17 03:30 PM</small>
                                    <span class="badge bg-primary">Scheduled</span>
                                </div>
                                <p class="mb-0">Task created and scheduled for tomorrow.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Photos</h6>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <img src="{{ asset('assets/img/gallery/1.jpg') }}" alt="Before" class="img-fluid rounded" style="width: 100%;">
                                <small class="text-muted d-block text-center">Before</small>
                            </div>
                            <div class="col-6 mb-2">
                                <img src="{{ asset('assets/img/gallery/2.jpg') }}" alt="During" class="img-fluid rounded" style="width: 100%;">
                                <small class="text-muted d-block text-center">During</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Cost Breakdown</h6>
                        <table class="table table-sm">
                            <tr>
                                <td>Labor</td>
                                <td>$30.00</td>
                            </tr>
                            <tr>
                                <td>Materials</td>
                                <td>$15.00</td>
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td><strong>$45.00</strong></td>
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

<!-- Complete Maintenance Modal -->
<div class="modal fade" id="completeMaintenanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Complete Maintenance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="taskInfo" class="form-label">Task</label>
                        <input type="text" class="form-control" id="taskInfo" value="MT002 - Fix broken window lock - Room 102" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="completionDate" class="form-label">Completion Date *</label>
                        <input type="date" class="form-control" id="completionDate" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="actualCost" class="form-label">Actual Cost ($)</label>
                        <input type="number" class="form-control" id="actualCost" min="0" step="0.01" placeholder="0.00">
                    </div>
                    <div class="mb-3">
                        <label for="completionNotes" class="form-label">Completion Notes *</label>
                        <textarea class="form-control" id="completionNotes" rows="3" required placeholder="Describe what was done..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="afterPhotos" class="form-label">After Photos</label>
                        <input type="file" class="form-control" id="afterPhotos" multiple accept="image/*">
                        <small class="text-muted">Upload photos of completed work</small>
                    </div>
                    <div class="mb-3">
                        <label for="followUpDate" class="form-label">Follow-up Date</label>
                        <input type="date" class="form-control" id="followUpDate">
                        <small class="text-muted">Schedule follow-up inspection if needed</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Mark Complete</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Maintenance Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Maintenance Summary</option>
                        <option value="cost">Cost Analysis</option>
                        <option value="room">Room-wise Report</option>
                        <option value="vendor">Vendor Performance</option>
                        <option value="schedule">Schedule Overview</option>
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

<!-- Vendor Modal -->
<div class="modal fade" id="vendorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Vendors</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-3">
                    <h6>Active Vendors</h6>
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addVendorModal">
                        <i class="bx bx-plus"></i> Add Vendor
                    </button>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Vendor Name</th>
                                <th>Service Type</th>
                                <th>Contact</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CleanPro Services</td>
                                <td><span class="badge bg-info">Cleaning</span></td>
                                <td>+255 712 111 222</td>
                                <td>4.5/5</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>QuickFix Repairs</td>
                                <td><span class="badge bg-warning">Repair</span></td>
                                <td>+255 712 333 444</td>
                                <td>4.2/5</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Vendor Modal -->
<div class="modal fade" id="addVendorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="vendorName" class="form-label">Vendor Name *</label>
                            <input type="text" class="form-control" id="vendorName" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="serviceType" class="form-label">Service Type *</label>
                            <select class="form-select" id="serviceType" required>
                                <option value="">Select Type</option>
                                <option value="cleaning">Cleaning</option>
                                <option value="repair">Repair</option>
                                <option value="inspection">Inspection</option>
                                <option value="renovation">Renovation</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contactPerson" class="form-label">Contact Person</label>
                            <input type="text" class="form-control" id="contactPerson">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contactPhone" class="form-label">Phone *</label>
                            <input type="tel" class="form-control" id="contactPhone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rating" class="form-label">Initial Rating</label>
                            <select class="form-select" id="rating">
                                <option value="">Not Rated</option>
                                <option value="5">5 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="2">2 Stars</option>
                                <option value="1">1 Star</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Vendor address...">
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" rows="2" placeholder="Additional notes..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Vendor</button>
            </div>
        </div>
    </div>
</div>
@endsection
