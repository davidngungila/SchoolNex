@extends('layouts.app')

@section('title', 'Fee Collection')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Fee Collection Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#collectFeeModal">
                        <i class="bx bx-dollar me-1"></i> Collect Fee
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulkCollectionModal">
                        <i class="bx bx-group me-1"></i> Bulk Collection
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Collection Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Collection Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">$45,250</h4>
                                        <p class="mb-0">Collected Today</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-trending-up avatar-icon"></i>
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
                                        <h4 class="mb-0">$125,000</h4>
                                        <p class="mb-0">Monthly Target</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-target avatar-icon"></i>
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
                                        <h4 class="mb-0">68%</h4>
                                        <p class="mb-0">Collection Rate</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-chart avatar-icon"></i>
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
                                        <h4 class="mb-0">156</h4>
                                        <p class="mb-0">Transactions Today</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-receipt avatar-icon"></i>
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
                        <label for="studentFilter" class="form-label">Student</label>
                        <input type="text" class="form-control" id="studentFilter" placeholder="Student name/ID...">
                    </div>
                    <div class="col-md-2">
                        <label for="feeTypeFilter" class="form-label">Fee Type</label>
                        <select class="form-select" id="feeTypeFilter">
                            <option value="">All Fee Types</option>
                            <option value="tuition">Tuition Fee</option>
                            <option value="registration">Registration</option>
                            <option value="activity">Activity Fee</option>
                            <option value="transport">Transport</option>
                            <option value="hostel">Hostel</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="paymentMethodFilter" class="form-label">Payment Method</label>
                        <select class="form-select" id="paymentMethodFilter">
                            <option value="">All Methods</option>
                            <option value="cash">Cash</option>
                            <option value="bank">Bank Transfer</option>
                            <option value="mobile">Mobile Money</option>
                            <option value="card">Credit/Debit Card</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="term">This Term</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Collection Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Receipt ID</th>
                                <th>Date</th>
                                <th>Student</th>
                                <th>Class</th>
                                <th>Fee Type</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Collected By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>RCPT001</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">STU001</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 1A</td>
                                <td><span class="badge bg-primary">Tuition Fee</span></td>
                                <td>$450.00</td>
                                <td><span class="badge bg-success">Cash</span></td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-refresh me-2"></i>Refund</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RCPT002</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">Sarah Johnson</div>
                                            <small class="text-muted">STU002</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 1B</td>
                                <td><span class="badge bg-info">Registration</span></td>
                                <td>$100.00</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-refresh me-2"></i>Refund</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RCPT003</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">Michael Brown</div>
                                            <small class="text-muted">STU003</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 2A</td>
                                <td><span class="badge bg-warning">Activity Fee</span></td>
                                <td>$75.00</td>
                                <td><span class="badge bg-info">Mobile Money</span></td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-refresh me-2"></i>Refund</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RCPT004</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">Emily Davis</div>
                                            <small class="text-muted">STU004</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 2B</td>
                                <td><span class="badge bg-purple">Transport</span></td>
                                <td>$120.00</td>
                                <td><span class="badge bg-warning">Credit/Debit Card</span></td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-refresh me-2"></i>Refund</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RCPT005</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">Robert Wilson</div>
                                            <small class="text-muted">STU005</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 3A</td>
                                <td><span class="badge bg-danger">Hostel</span></td>
                                <td>$200.00</td>
                                <td><span class="badge bg-success">Cash</span></td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-refresh me-2"></i>Refund</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RCPT006</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">Lisa Martinez</div>
                                            <small class="text-muted">STU006</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 1A</td>
                                <td><span class="badge bg-primary">Tuition Fee</span></td>
                                <td>$450.00</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-check me-2"></i>Confirm Payment</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-x me-2"></i>Cancel</a></li>
                                            <li><hr class="dropdown-divider"></li>
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

<!-- Collect Fee Modal -->
<div class="modal fade" id="collectFeeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Collect Fee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Student Selection -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Student Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="studentSearch" class="form-label">Search Student *</label>
                                    <input type="text" class="form-control" id="studentSearch" placeholder="Enter student name or ID...">
                                    <small class="text-muted">Start typing to search students</small>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="studentClass" class="form-label">Class</label>
                                    <select class="form-select" id="studentClass">
                                        <option value="">All Classes</option>
                                        <option value="1A">Class 1A</option>
                                        <option value="1B">Class 1B</option>
                                        <option value="2A">Class 2A</option>
                                        <option value="2B">Class 2B</option>
                                        <option value="3A">Class 3A</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="studentID" class="form-label">Student ID</label>
                                    <input type="text" class="form-control" id="studentID" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="alert alert-info" id="studentInfo" style="display: none;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                                            <div>
                                                <h6 class="mb-0">John Smith</h6>
                                                <p class="mb-0">Class 1A | Student ID: STU001</p>
                                                <p class="mb-0">Phone: +255 712 345 678 | Parent: Mr. Smith</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fee Selection -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Fee Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="feeType" class="form-label">Fee Type *</label>
                                    <select class="form-select" id="feeType" required>
                                        <option value="">Select Fee Type</option>
                                        <option value="tuition">Tuition Fee - $450.00</option>
                                        <option value="registration">Registration Fee - $100.00</option>
                                        <option value="activity">Activity Fee - $75.00</option>
                                        <option value="transport">Transport Fee - $120.00</option>
                                        <option value="hostel">Hostel Fee - $200.00</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="feeAmount" class="form-label">Amount *</label>
                                    <input type="number" class="form-control" id="feeAmount" min="0" step="0.01" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="paymentMethod" class="form-label">Payment Method *</label>
                                    <select class="form-select" id="paymentMethod" required>
                                        <option value="">Select Method</option>
                                        <option value="cash">Cash</option>
                                        <option value="bank">Bank Transfer</option>
                                        <option value="mobile">Mobile Money</option>
                                        <option value="card">Credit/Debit Card</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="paymentDate" class="form-label">Payment Date *</label>
                                    <input type="date" class="form-control" id="paymentDate" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="discountAmount" class="form-label">Discount Amount</label>
                                    <input type="number" class="form-control" id="discountAmount" min="0" step="0.01" placeholder="0.00">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="lateFee" class="form-label">Late Fee</label>
                                    <input type="number" class="form-control" id="lateFee" min="0" step="0.01" placeholder="0.00">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="totalAmount" class="form-label">Total Amount</label>
                                    <input type="number" class="form-control" id="totalAmount" min="0" step="0.01" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="paymentNotes" class="form-label">Payment Notes</label>
                                <textarea class="form-control" id="paymentNotes" rows="2" placeholder="Add any notes about this payment..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Details -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Payment Details</h6>
                        </div>
                        <div class="card-body">
                            <div id="cashDetails" style="display: none;">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="cashReceived" class="form-label">Cash Received</label>
                                        <input type="number" class="form-control" id="cashReceived" min="0" step="0.01">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="cashChange" class="form-label">Change</label>
                                        <input type="number" class="form-control" id="cashChange" min="0" step="0.01" readonly>
                                    </div>
                                </div>
                            </div>
                            <div id="bankDetails" style="display: none;">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="bankName" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" id="bankName">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="transactionRef" class="form-label">Transaction Reference</label>
                                        <input type="text" class="form-control" id="transactionRef">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="depositDate" class="form-label">Deposit Date</label>
                                        <input type="date" class="form-control" id="depositDate">
                                    </div>
                                </div>
                            </div>
                            <div id="mobileDetails" style="display: none;">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="mobileProvider" class="form-label">Mobile Provider</label>
                                        <select class="form-select" id="mobileProvider">
                                            <option value="">Select Provider</option>
                                            <option value="m-pesa">M-Pesa</option>
                                            <option value="tigo">Tigo Pesa</option>
                                            <option value="airtel">Airtel Money</option>
                                            <option value="halotel">Halopesa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="mobileNumber" class="form-label">Mobile Number</label>
                                        <input type="tel" class="form-control" id="mobileNumber">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="transactionID" class="form-label">Transaction ID</label>
                                        <input type="text" class="form-control" id="transactionID">
                                    </div>
                                </div>
                            </div>
                            <div id="cardDetails" style="display: none;">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="cardType" class="form-label">Card Type</label>
                                        <select class="form-select" id="cardType">
                                            <option value="">Select Card Type</option>
                                            <option value="visa">Visa</option>
                                            <option value="mastercard">Mastercard</option>
                                            <option value="american-express">American Express</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="cardLast4" class="form-label">Card Last 4 Digits</label>
                                        <input type="text" class="form-control" id="cardLast4" maxlength="4">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="authCode" class="form-label">Authorization Code</label>
                                        <input type="text" class="form-control" id="authCode">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Receipt Preview -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Receipt Preview</h6>
                        </div>
                        <div class="card-body">
                            <div class="border p-3 bg-light">
                                <div class="text-center mb-3">
                                    <h5>Fee Receipt</h5>
                                    <p class="mb-0">Excellence Academy</p>
                                    <p class="mb-0">123 Education Street, Dar es Salaam</p>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6"><strong>Receipt No:</strong></div>
                                    <div class="col-6 text-end">RCPT007</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6"><strong>Date:</strong></div>
                                    <div class="col-6 text-end">{{ date('Y-m-d') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6"><strong>Student:</strong></div>
                                    <div class="col-6 text-end">-</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6"><strong>Class:</strong></div>
                                    <div class="col-6 text-end">-</div>
                                </div>
                                <hr>
                                <div class="row mb-2">
                                    <div class="col-6"><strong>Fee Type:</strong></div>
                                    <div class="col-6 text-end">-</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6"><strong>Amount:</strong></div>
                                    <div class="col-6 text-end">$0.00</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6"><strong>Payment Method:</strong></div>
                                    <div class="col-6 text-end">-</div>
                                </div>
                                <hr>
                                <div class="row mb-2">
                                    <div class="col-6"><strong>Total:</strong></div>
                                    <div class="col-6 text-end"><strong>$0.00</strong></div>
                                </div>
                                <div class="text-center mt-3">
                                    <small>Thank you for your payment!</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Draft</button>
                <button type="button" class="btn btn-success">Process Payment</button>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Collection Modal -->
<div class="modal fade" id="bulkCollectionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bulk Fee Collection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="bulkClass" class="form-label">Class *</label>
                            <select class="form-select" id="bulkClass" required>
                                <option value="">Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="bulkFeeType" class="form-label">Fee Type *</label>
                            <select class="form-select" id="bulkFeeType" required>
                                <option value="">Select Fee Type</option>
                                <option value="tuition">Tuition Fee</option>
                                <option value="registration">Registration Fee</option>
                                <option value="activity">Activity Fee</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="bulkPaymentMethod" class="form-label">Payment Method</label>
                            <select class="form-select" id="bulkPaymentMethod">
                                <option value="">All Methods</option>
                                <option value="cash">Cash</option>
                                <option value="bank">Bank Transfer</option>
                                <option value="mobile">Mobile Money</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="bulkStatus" class="form-label">Payment Status</label>
                            <select class="form-select" id="bulkStatus">
                                <option value="pending">Pending Only</option>
                                <option value="all">All Students</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive mb-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Fee Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Payment Method</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" class="student-checkbox"></td>
                                    <td>STU001</td>
                                    <td>John Smith</td>
                                    <td>Class 1A</td>
                                    <td>Tuition Fee</td>
                                    <td>$450.00</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td><select class="form-select form-select-sm"><option value="">Select</option><option value="cash">Cash</option><option value="bank">Bank</option></select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="student-checkbox"></td>
                                    <td>STU002</td>
                                    <td>Sarah Johnson</td>
                                    <td>Class 1A</td>
                                    <td>Tuition Fee</td>
                                    <td>$450.00</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td><select class="form-select form-select-sm"><option value="">Select</option><option value="cash">Cash</option><option value="bank">Bank</option></select></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="alert alert-info">
                        <strong>Total Selected Students:</strong> <span id="selectedCount">0</span><br>
                        <strong>Total Amount:</strong> $<span id="totalAmount">0.00</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Process Bulk Collection</button>
            </div>
        </div>
    </div>
</div>

<!-- Collection Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Collection Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="daily">Daily Collection</option>
                        <option value="weekly">Weekly Collection</option>
                        <option value="monthly">Monthly Collection</option>
                        <option value="by_class">By Class</option>
                        <option value="by_fee_type">By Fee Type</option>
                        <option value="by_payment_method">By Payment Method</option>
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
                        <option value="csv">CSV</option>
                    </select>
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
