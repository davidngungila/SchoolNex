@extends('layouts.app')

@section('title', 'Fee Receipts')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Fee Receipts Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateReceiptModal">
                        <i class="bx bx-plus me-1"></i> Generate Receipt
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulkPrintModal">
                        <i class="bx bx-printer me-1"></i> Bulk Print
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Receipt Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Receipt Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">1,245</h4>
                                        <p class="mb-0">Total Receipts</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-receipt avatar-icon"></i>
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
                                        <h4 class="mb-0">$125,450</h4>
                                        <p class="mb-0">Total Revenue</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-dollar avatar-icon"></i>
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
                                        <p class="mb-0">This Month</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-calendar avatar-icon"></i>
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
                                        <p class="mb-0">Today</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-time avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="receiptStatus" class="form-label">Receipt Status</label>
                        <select class="form-select" id="receiptStatus">
                            <option value="">All Status</option>
                            <option value="paid">Paid</option>
                            <option value="pending">Pending</option>
                            <option value="cancelled">Cancelled</option>
                            <option value="refunded">Refunded</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <select class="form-select" id="paymentMethod">
                            <option value="">All Methods</option>
                            <option value="cash">Cash</option>
                            <option value="bank">Bank Transfer</option>
                            <option value="mobile">Mobile Money</option>
                            <option value="card">Credit/Debit Card</option>
                        </select>
                    </div>
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
                        <label for="feeType" class="form-label">Fee Type</label>
                        <select class="form-select" id="feeType">
                            <option value="">All Fee Types</option>
                            <option value="tuition">Tuition Fee</option>
                            <option value="registration">Registration</option>
                            <option value="activity">Activity Fee</option>
                            <option value="transport">Transport</option>
                            <option value="hostel">Hostel</option>
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

                <!-- Receipts Table -->
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
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReceiptModal"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Send SMS</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-refresh me-2"></i>Refund</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Cancel</a></li>
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
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReceiptModal"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Send SMS</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-refresh me-2"></i>Refund</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Cancel</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RCPT003</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
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
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReceiptModal"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Send SMS</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-refresh me-2"></i>Refund</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Cancel</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RCPT004</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
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
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReceiptModal"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Send SMS</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-refresh me-2"></i>Refund</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Cancel</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RCPT005</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
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
                                <td><span class="badge bg-warning">Refunded</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReceiptModal"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Send SMS</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-refresh me-2"></i>Re-issue</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RCPT006</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-4 days')) }}</td>
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
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReceiptModal"><i class="bx bx-show me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Send SMS</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-refresh me-2"></i>Re-issue</a></li>
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

<!-- View Receipt Modal -->
<div class="modal fade" id="viewReceiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fee Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="border p-4" id="receiptContent">
                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="School Logo" style="height: 60px;">
                        <h4 class="mt-2">Excellence Academy</h4>
                        <p class="mb-0">123 Education Street, Dar es Salaam, Tanzania</p>
                        <p class="mb-0">Phone: +255 22 123 4567 | Email: info@excellenceacademy.edu</p>
                    </div>
                    
                    <div class="text-center mb-3">
                        <h5>OFFICIAL RECEIPT</h5>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Receipt No:</strong> RCPT001
                        </div>
                        <div class="col-6 text-end">
                            <strong>Date:</strong> {{ date('Y-m-d') }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Student Name:</strong> John Smith
                        </div>
                        <div class="col-6 text-end">
                            <strong>Student ID:</strong> STU001
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Class:</strong> Class 1A
                        </div>
                        <div class="col-6 text-end">
                            <strong>Payment Method:</strong> Cash
                        </div>
                    </div>
                    
                    <table class="table table-bordered mb-3">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tuition Fee - Term 1</td>
                                <td>$450.00</td>
                            </tr>
                            <tr>
                                <td><strong>Total Amount</strong></td>
                                <td><strong>$450.00</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="mb-3">
                        <strong>Amount in Words:</strong> Four Hundred Fifty Dollars Only
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Received By:</strong> Admin User
                        </div>
                        <div class="col-6 text-end">
                            <strong>Signature:</strong> _____________________
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <small class="text-muted">Thank you for your payment!</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"><i class="bx bx-printer me-1"></i> Print</button>
                <button type="button" class="btn btn-success"><i class="bx bx-download me-1"></i> Download PDF</button>
                <button type="button" class="btn btn-info"><i class="bx bx-envelope me-1"></i> Email</button>
            </div>
        </div>
    </div>
</div>

<!-- Generate Receipt Modal -->
<div class="modal fade" id="generateReceiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate New Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="studentSearch" class="form-label">Search Student *</label>
                            <input type="text" class="form-control" id="studentSearch" placeholder="Enter student name or ID...">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="receiptType" class="form-label">Receipt Type</label>
                            <select class="form-select" id="receiptType">
                                <option value="fee">Fee Payment</option>
                                <option value="donation">Donation</option>
                                <option value="other">Other Payment</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="feeType" class="form-label">Fee Type *</label>
                            <select class="form-select" id="feeType" required>
                                <option value="">Select Fee Type</option>
                                <option value="tuition">Tuition Fee</option>
                                <option value="registration">Registration Fee</option>
                                <option value="activity">Activity Fee</option>
                                <option value="transport">Transport Fee</option>
                                <option value="hostel">Hostel Fee</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paymentMethod" class="form-label">Payment Method *</label>
                            <select class="form-select" id="paymentMethod" required>
                                <option value="">Select Method</option>
                                <option value="cash">Cash</option>
                                <option value="bank">Bank Transfer</option>
                                <option value="mobile">Mobile Money</option>
                                <option value="card">Credit/Debit Card</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="amount" class="form-label">Amount *</label>
                            <input type="number" class="form-control" id="amount" min="0" step="0.01" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="paymentDate" class="form-label">Payment Date *</label>
                            <input type="date" class="form-control" id="paymentDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="receiptNumber" class="form-label">Receipt Number</label>
                            <input type="text" class="form-control" id="receiptNumber" value="RCPT007" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="2" placeholder="Enter payment description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="notes" rows="2" placeholder="Enter any additional notes..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Preview Receipt</button>
                <button type="button" class="btn btn-success">Generate Receipt</button>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Print Modal -->
<div class="modal fade" id="bulkPrintModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bulk Print Receipts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="printClass" class="form-label">Class</label>
                            <select class="form-select" id="printClass">
                                <option value="">All Classes</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="printFeeType" class="form-label">Fee Type</label>
                            <select class="form-select" id="printFeeType">
                                <option value="">All Fee Types</option>
                                <option value="tuition">Tuition Fee</option>
                                <option value="registration">Registration Fee</option>
                                <option value="activity">Activity Fee</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="printStatus" class="form-label">Payment Status</label>
                            <select class="form-select" id="printStatus">
                                <option value="paid">Paid Only</option>
                                <option value="all">All Receipts</option>
                            </select>
                        </div>
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
                        <label class="form-label">Print Options</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="printOriginal" checked>
                            <label class="form-check-label" for="printOriginal">
                                Original Receipt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="printCopy">
                            <label class="form-check-label" for="printCopy">
                                Copy for School
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="printParentCopy">
                            <label class="form-check-label" for="printParentCopy">
                                Parent Copy
                            </label>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        <strong>Selected Receipts:</strong> 45 receipts to print
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Preview Selection</button>
                <button type="button" class="btn btn-success">Print Receipts</button>
            </div>
        </div>
    </div>
</div>

<!-- Receipt Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Receipt Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Receipt Summary</option>
                        <option value="daily">Daily Report</option>
                        <option value="weekly">Weekly Report</option>
                        <option value="monthly">Monthly Report</option>
                        <option value="by_class">By Class</option>
                        <option value="by_fee_type">By Fee Type</option>
                        <option value="by_payment_method">By Payment Method</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="reportStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="reportStartDate">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="reportEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="reportEndDate">
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
                    <label class="form-label">Include Options</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeCharts" checked>
                        <label class="form-check-label" for="includeCharts">
                            Charts & Graphs
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeDetails" checked>
                        <label class="form-check-label" for="includeDetails">
                            Detailed Receipt List
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeSummary">
                        <label class="form-check-label" for="includeSummary">
                            Summary Statistics
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
