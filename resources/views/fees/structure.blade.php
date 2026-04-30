@extends('layouts.app')

@section('title', 'Fee Structure')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Fee Structure Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFeeModal">
                        <i class="bx bx-plus me-1"></i> Add Fee Type
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bx bx-upload me-1"></i> Import Structure
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Fee Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Fee Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">$125,000</h4>
                                        <p class="mb-0">Total Annual Revenue</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-dollar avatar-icon"></i>
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
                                        <p class="mb-0">Fee Categories</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-category avatar-icon"></i>
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
                                        <h4 class="mb-0">$850</h4>
                                        <p class="mb-0">Average Fee/Student</p>
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
                                        <h4 class="mb-0">3</h4>
                                        <p class="mb-0">Payment Plans</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-calendar avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="classFilter" class="form-label">Class</label>
                        <select class="form-select" id="classFilter">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                            <option value="3A">Class 3A</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="termFilter" class="form-label">Term</label>
                        <select class="form-select" id="termFilter">
                            <option value="">All Terms</option>
                            <option value="1">Term 1</option>
                            <option value="2">Term 2</option>
                            <option value="3">Term 3</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="categoryFilter" class="form-label">Category</label>
                        <select class="form-select" id="categoryFilter">
                            <option value="">All Categories</option>
                            <option value="tuition">Tuition Fee</option>
                            <option value="registration">Registration</option>
                            <option value="activity">Activity Fee</option>
                            <option value="transport">Transport</option>
                            <option value="hostel">Hostel</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="optional">Optional</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchFee" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchFee" placeholder="Fee name...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Fee Structure Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fee ID</th>
                                <th>Fee Name</th>
                                <th>Category</th>
                                <th>Class</th>
                                <th>Amount</th>
                                <th>Frequency</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Payment Plans</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>FS001</strong></td>
                                <td>Tuition Fee - Term 1</td>
                                <td><span class="badge bg-primary">Tuition Fee</span></td>
                                <td>Class 1A</td>
                                <td>$450.00</td>
                                <td>Termly</td>
                                <td>15th of Month</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#paymentPlansModal">
                                        <i class="bx bx-calendar"></i> 3 Plans
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>View Collections</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FS002</strong></td>
                                <td>Registration Fee</td>
                                <td><span class="badge bg-info">Registration</span></td>
                                <td>All Classes</td>
                                <td>$100.00</td>
                                <td>One-time</td>
                                <td>At Admission</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#paymentPlansModal">
                                        <i class="bx bx-calendar"></i> 1 Plan
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>View Collections</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FS003</strong></td>
                                <td>Science Lab Fee</td>
                                <td><span class="badge bg-warning">Activity Fee</span></td>
                                <td>Class 2A, 2B</td>
                                <td>$75.00</td>
                                <td>Termly</td>
                                <td>10th of Month</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#paymentPlansModal">
                                        <i class="bx bx-calendar"></i> 2 Plans
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>View Collections</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FS004</strong></td>
                                <td>Sports & Activities</td>
                                <td><span class="badge bg-warning">Activity Fee</span></td>
                                <td>All Classes</td>
                                <td>$50.00</td>
                                <td>Termly</td>
                                <td>20th of Month</td>
                                <td><span class="badge bg-secondary">Optional</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#paymentPlansModal">
                                        <i class="bx bx-calendar"></i> 2 Plans
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>View Collections</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-play me-2"></i>Activate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FS005</strong></td>
                                <td>Transport Fee - Route A</td>
                                <td><span class="badge bg-purple">Transport</span></td>
                                <td>All Classes</td>
                                <td>$120.00</td>
                                <td>Monthly</td>
                                <td>5th of Month</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#paymentPlansModal">
                                        <i class="bx bx-calendar"></i> 1 Plan
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>View Collections</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FS006</strong></td>
                                <td>Hostel Fee - Standard Room</td>
                                <td><span class="badge bg-danger">Hostel</span></td>
                                <td>All Classes</td>
                                <td>$200.00</td>
                                <td>Monthly</td>
                                <td>1st of Month</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#paymentPlansModal">
                                        <i class="bx bx-calendar"></i> 2 Plans
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>View Collections</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FS007</strong></td>
                                <td>Library Fee</td>
                                <td><span class="badge bg-warning">Activity Fee</span></td>
                                <td>All Classes</td>
                                <td>$25.00</td>
                                <td>Termly</td>
                                <td>15th of Month</td>
                                <td><span class="badge bg-danger">Inactive</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#paymentPlansModal">
                                        <i class="bx bx-calendar"></i> 1 Plan
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>View Collections</a></li>
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

<!-- Add Fee Modal -->
<div class="modal fade" id="addFeeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Fee Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Basic Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Basic Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="feeName" class="form-label">Fee Name *</label>
                                    <input type="text" class="form-control" id="feeName" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="feeCategory" class="form-label">Category *</label>
                                    <select class="form-select" id="feeCategory" required>
                                        <option value="">Select Category</option>
                                        <option value="tuition">Tuition Fee</option>
                                        <option value="registration">Registration</option>
                                        <option value="activity">Activity Fee</option>
                                        <option value="transport">Transport</option>
                                        <option value="hostel">Hostel</option>
                                        <option value="examination">Examination</option>
                                        <option value="library">Library</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="feeClass" class="form-label">Applicable Class</label>
                                    <select class="form-select" id="feeClass" multiple>
                                        <option value="all">All Classes</option>
                                        <option value="1A">Class 1A</option>
                                        <option value="1B">Class 1B</option>
                                        <option value="2A">Class 2A</option>
                                        <option value="2B">Class 2B</option>
                                        <option value="3A">Class 3A</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="feeStatus" class="form-label">Status</label>
                                    <select class="form-select" id="feeStatus">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="optional">Optional</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="feeAmount" class="form-label">Amount *</label>
                                    <input type="number" class="form-control" id="feeAmount" min="0" step="0.01" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="feeFrequency" class="form-label">Frequency *</label>
                                    <select class="form-select" id="feeFrequency" required>
                                        <option value="">Select Frequency</option>
                                        <option value="one_time">One-time</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="termly">Termly</option>
                                        <option value="annually">Annually</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="dueDate" class="form-label">Due Date</label>
                                    <input type="text" class="form-control" id="dueDate" placeholder="e.g., 15th of month">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="gracePeriod" class="form-label">Grace Period (days)</label>
                                    <input type="number" class="form-control" id="gracePeriod" min="0" value="0">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="feeDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="feeDescription" rows="3" placeholder="Enter fee description..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Payment Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="paymentMethod" class="form-label">Payment Methods</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cashPayment" checked>
                                        <label class="form-check-label" for="cashPayment">
                                            Cash
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="bankPayment" checked>
                                        <label class="form-check-label" for="bankPayment">
                                            Bank Transfer
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="mobilePayment" checked>
                                        <label class="form-check-label" for="mobilePayment">
                                            Mobile Money
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cardPayment">
                                        <label class="form-check-label" for="cardPayment">
                                            Credit/Debit Card
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="lateFee" class="form-label">Late Fee Settings</label>
                                    <input type="number" class="form-control mb-2" id="lateFee" min="0" step="0.01" placeholder="Late fee amount">
                                    <select class="form-select" id="lateFeeType">
                                        <option value="fixed">Fixed Amount</option>
                                        <option value="percentage">Percentage of Fee</option>
                                        <option value="daily">Daily Accumulation</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="discountSettings" class="form-label">Discount Settings</label>
                                    <input type="number" class="form-control mb-2" id="maxDiscount" min="0" max="100" placeholder="Maximum discount %">
                                    <select class="form-select" id="discountType">
                                        <option value="percentage">Percentage</option>
                                        <option value="fixed">Fixed Amount</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Plans -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Payment Plans</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="paymentPlansTable">
                                    <thead>
                                        <tr>
                                            <th>Plan Name</th>
                                            <th>Installments</th>
                                            <th>Amount per Installment</th>
                                            <th>Due Dates</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" value="Full Payment" readonly></td>
                                            <td><input type="number" class="form-control" value="1" min="1" readonly></td>
                                            <td><input type="number" class="form-control" value="0" min="0" step="0.01" readonly></td>
                                            <td><input type="text" class="form-control" value="Due Date" readonly></td>
                                            <td><button type="button" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-outline-primary">
                                <i class="bx bx-plus me-1"></i> Add Payment Plan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Draft</button>
                <button type="button" class="btn btn-success">Add Fee Type</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment Plans Modal -->
<div class="modal fade" id="paymentPlansModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Plans</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th>Installments</th>
                                <th>Amount per Installment</th>
                                <th>Due Dates</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Full Payment</strong></td>
                                <td>1</td>
                                <td>$450.00</td>
                                <td>15th June 2024</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td><strong>2 Installments</strong></td>
                                <td>2</td>
                                <td>$225.00</td>
                                <td>15th June, 15th July 2024</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td><strong>3 Installments</strong></td>
                                <td>3</td>
                                <td>$150.00</td>
                                <td>15th June, 15th July, 15th Aug 2024</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Edit Plans</button>
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Fee Structure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="importFile" class="form-label">Select Excel File</label>
                    <input type="file" class="form-control" id="importFile" accept=".xlsx,.xls,.csv">
                    <small class="text-muted">Upload Excel file with fee structure data</small>
                </div>
                <div class="mb-3">
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        <i class="bx bx-download me-1"></i> Download Template
                    </a>
                    <small class="text-muted ms-2">Download the template to understand the required format</small>
                </div>
                <div class="alert alert-info">
                    <i class="bx bx-info-circle me-2"></i>
                    Required fields: Fee Name, Category, Amount, Frequency
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Import Structure</button>
            </div>
        </div>
    </div>
</div>

<!-- Fee Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fee Structure Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="complete">Complete Fee Structure</option>
                        <option value="by_class">By Class</option>
                        <option value="by_category">By Category</option>
                        <option value="revenue">Revenue Projection</option>
                        <option value="comparison">Year-over-Year Comparison</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="reportClass" class="form-label">Class Filter</label>
                        <select class="form-select" id="reportClass">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                            <option value="3A">Class 3A</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="reportTerm" class="form-label">Term Filter</label>
                        <select class="form-select" id="reportTerm">
                            <option value="">All Terms</option>
                            <option value="1">Term 1</option>
                            <option value="2">Term 2</option>
                            <option value="3">Term 3</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="reportFormat" class="form-label">Format</label>
                    <select class="form-select" id="reportFormat">
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                        <option value="csv">CSV</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Include Sections</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeSummary" checked>
                        <label class="form-check-label" for="includeSummary">
                            Summary Statistics
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeCharts">
                        <label class="form-check-label" for="includeCharts">
                            Charts & Graphs
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includePaymentPlans" checked>
                        <label class="form-check-label" for="includePaymentPlans">
                            Payment Plans
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info">Generate Report</button>
            </div>
        </div>
    </div>
</div>
@endsection
