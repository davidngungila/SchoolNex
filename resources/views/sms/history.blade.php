@extends('layouts.app')

@section('title', 'SMS History')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">SMS History</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#resendModal">
                        <i class="bx bx-redo me-1"></i> Resend SMS
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export History
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#analyticsModal">
                        <i class="bx bx-chart me-1"></i> Analytics
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- SMS Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">3,456</h4>
                                        <p class="mb-0">Total Sent</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-mobile avatar-icon"></i>
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
                                        <h4 class="mb-0">3,234</h4>
                                        <p class="mb-0">Delivered</p>
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
                                        <p class="mb-0">Pending</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-time avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">66</h4>
                                        <p class="mb-0">Failed</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-x-circle avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="quarter">This Quarter</option>
                            <option value="year">This Year</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="sent">Sent</option>
                            <option value="delivered">Delivered</option>
                            <option value="pending">Pending</option>
                            <option value="failed">Failed</option>
                            <option value="expired">Expired</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="senderFilter" class="form-label">Sender</label>
                        <select class="form-select" id="senderFilter">
                            <option value="">All Senders</option>
                            <option value="SCHOOL">SCHOOL</option>
                            <option value="EDU">EDU</option>
                            <option value="SCHMIS">SCHMIS</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="recipientFilter" class="form-label">Recipient Type</label>
                        <select class="form-select" id="recipientFilter">
                            <option value="">All Recipients</option>
                            <option value="student">Students</option>
                            <option value="teacher">Teachers</option>
                            <option value="parent">Parents</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchSMS" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchSMS" placeholder="Message, number...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- SMS History Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>Message ID</th>
                                <th>Sender</th>
                                <th>Recipient</th>
                                <th>Message</th>
                                <th>Priority</th>
                                <th>Sent Time</th>
                                <th>Delivery Time</th>
                                <th>Status</th>
                                <th>Cost</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="smsSelect[]" value="SMS001"></td>
                                <td><strong>SMS001</strong></td>
                                <td><span class="badge bg-info">SCHOOL</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                        <div class="ms-2">
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">+255 712 345 678</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="text-truncate" style="max-width: 200px;">Welcome to our school! Your account has been created successfully.</div>
                                        <small class="text-muted">118 chars</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Normal</span></td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime('+30 seconds')) }}</td>
                                <td><span class="badge bg-success">Delivered</span></td>
                                <td>$0.05</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewSMSModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resendModal"><i class="bx bx-redo me-2"></i>Resend</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Delivery Report</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="downloadReceipt('SMS001')"><i class="bx bx-download me-2"></i>Download Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="smsSelect[]" value="SMS002"></td>
                                <td><strong>SMS002</strong></td>
                                <td><span class="badge bg-info">SCHOOL</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm">
                                            <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                        <div class="ms-2">
                                            <div class="fw-bold">Sarah Johnson</div>
                                            <small class="text-muted">+255 712 987 654</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="text-truncate" style="max-width: 200px;">Exam scheduled for tomorrow at 9:00 AM. Please prepare accordingly.</div>
                                        <small class="text-muted">78 chars</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">High</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 hours')) }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 hours') }}:30</td>
                                <td><span class="badge bg-success">Delivered</span></td>
                                <td>$0.05</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewSMSModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resendModal"><i class="bx bx-redo me-2"></i>Resend</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Delivery Report</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="downloadReceipt('SMS002')"><i class="bx bx-download me-2"></i>Download Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="smsSelect[]" value="SMS003"></td>
                                <td><strong>SMS003</strong></td>
                                <td><span class="badge bg-info">EDU</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm">
                                            <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                        <div class="ms-2">
                                            <div class="fw-bold">Michael Brown</div>
                                            <small class="text-muted">+255 712 456 123</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="text-truncate" style="max-width: 200px;">Fee payment reminder: Amount $150 due on 2024-02-01.</div>
                                        <small class="text-muted">65 chars</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Urgent</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-4 hours')) }}</td>
                                <td>-</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>$0.05</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewSMSModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="bx bx-x me-2"></i>Cancel</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Delivery Report</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="downloadReceipt('SMS003')"><i class="bx bx-download me-2"></i>Download Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="smsSelect[]" value="SMS004"></td>
                                <td><strong>SMS004</strong></td>
                                <td><span class="badge bg-info">SCHOOL</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm">
                                            <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                        <div class="ms-2">
                                            <div class="fw-bold">Emily Davis</div>
                                            <small class="text-muted">+255 712 789 012</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="text-truncate" style="max-width: 200px;">Meeting reminder: Parent-Teacher meeting tomorrow at 2:00 PM.</div>
                                        <small class="text-muted">85 chars</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Normal</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 day')) }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 day') }}:45</td>
                                <td><span class="badge bg-success">Delivered</span></td>
                                <td>$0.05</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewSMSModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resendModal"><i class="bx bx-redo me-2"></i>Resend</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Delivery Report</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="downloadReceipt('SMS004')"><i class="bx bx-download me-2"></i>Download Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="smsSelect[]" value="SMS005"></td>
                                <td><strong>SMS005</strong></td>
                                <td><span class="badge bg-info">SCHMIS</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm">
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                        <div class="ms-2">
                                            <div class="fw-bold">Robert Wilson</div>
                                            <small class="text-muted">+255 712 234 567</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="text-truncate" style="max-width: 200px;">Emergency: School closed today due to weather conditions.</div>
                                        <small class="text-muted">72 chars</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Urgent</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 days')) }}</td>
                                <td>-</td>
                                <td><span class="badge bg-danger">Failed</span></td>
                                <td>$0.00</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewSMSModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resendModal"><i class="bx bx-redo me-2"></i>Resend</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Delivery Report</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="downloadReceipt('SMS005')"><i class="bx bx-download me-2"></i>Download Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Bulk Actions -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-primary" onclick="bulkResend()">
                                <i class="bx bx-redo me-1"></i> Resend Selected
                            </button>
                            <button type="button" class="btn btn-outline-success" onclick="bulkExport()">
                                <i class="bx bx-download me-1"></i> Export Selected
                            </button>
                            <button type="button" class="btn btn-outline-info" onclick="bulkReport()">
                                <i class="bx bx-file me-1"></i> Generate Report
                            </button>
                            <button type="button" class="btn btn-outline-danger" onclick="deleteSelected()">
                                <i class="bx bx-trash me-1"></i> Delete Selected
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View SMS Modal -->
<div class="modal fade" id="viewSMSModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SMS Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>SMS Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Message ID:</strong></td>
                                <td>SMS001</td>
                            </tr>
                            <tr>
                                <td><strong>Sender ID:</strong></td>
                                <td><span class="badge bg-info">SCHOOL</span></td>
                            </tr>
                            <tr>
                                <td><strong>Priority:</strong></td>
                                <td><span class="badge bg-success">Normal</span></td>
                            </tr>
                            <tr>
                                <td><strong>Sent Time:</strong></td>
                                <td>{{ date('Y-m-d H:i:s') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Delivery Time:</strong></td>
                                <td>{{ date('Y-m-d H:i:s', strtotime('+30 seconds')) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Delivered</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Recipient Information</h6>
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar">
                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;">
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0">John Smith</h6>
                                <p class="mb-0">Student ID: STU001</p>
                                <p class="mb-0">+255 712 345 678</p>
                                <p class="mb-0">Class: 1A</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Message Content</h6>
                        <div class="card">
                            <div class="card-body">
                                <p>Welcome to our school! Your account has been created successfully. Login with your credentials.</p>
                                <div class="d-flex justify-content-between mt-2">
                                    <small class="text-muted">118 characters</small>
                                    <small class="text-muted">1 SMS</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Delivery Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Delivery Status:</strong></td>
                                <td><span class="badge bg-success">Delivered</span></td>
                            </tr>
                            <tr>
                                <td><strong>Delivery Time:</strong></td>
                                <td>{{ date('Y-m-d H:i:s', strtotime('+30 seconds')) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Network:</strong></td>
                                <td>Vodacom Tanzania</td>
                            </tr>
                            <tr>
                                <td><strong>Cost:</strong></td>
                                <td>$0.05</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Technical Details</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Message Type:</strong></td>
                                <td>Text SMS</td>
                            </tr>
                            <tr>
                                <td><strong>Encoding:</strong></td>
                                <td>UTF-8</td>
                            </tr>
                            <tr>
                                <td><strong>Parts:</strong></td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td><strong>Gateway:</strong></td>
                                <td>Twilio</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printSMS()">Print</button>
                <button type="button" class="btn btn-success" onclick="downloadReceipt('SMS001')">Download Receipt</button>
            </div>
        </div>
    </div>
</div>

<!-- Resend Modal -->
<div class="modal fade" id="resendModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Resend SMS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="smsInfo" class="form-label">SMS Information</label>
                        <input type="text" class="form-control" id="smsInfo" value="SMS001 - Welcome Message" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipients" class="form-label">Recipients</label>
                        <select class="form-select" id="recipients" multiple>
                            <option value="+255712345678" selected>John Smith (+255 712 345 678)</option>
                            <option value="+255712987654">Sarah Johnson (+255 712 987 654)</option>
                            <option value="+255712456123">Michael Brown (+255 712 456 123)</option>
                        </select>
                        <small class="text-muted">Select recipients to resend to</small>
                    </div>
                    <div class="mb-3">
                        <label for="senderId" class="form-label">Sender ID</label>
                        <select class="form-select" id="senderId">
                            <option value="SCHOOL" selected>SCHOOL</option>
                            <option value="EDU">EDU</option>
                            <option value="SCHMIS">SCHMIS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="resendReason" class="form-label">Reason for Resend</label>
                        <textarea class="form-control" id="resendReason" rows="2" placeholder="Enter reason for resending..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Resend SMS</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delivery Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Summary Report</option>
                        <option value="detailed">Detailed Report</option>
                        <option value="delivery">Delivery Analysis</option>
                        <option value="cost">Cost Analysis</option>
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
                <h5 class="modal-title">Export SMS History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exportFormat" class="form-label">Export Format</label>
                    <select class="form-select" id="exportFormat">
                        <option value="excel">Excel</option>
                        <option value="csv">CSV</option>
                        <option value="pdf">PDF</option>
                        <option value="json">JSON</option>
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
                    <label for="exportFields" class="form-label">Include Fields</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeMessage" checked>
                        <label class="form-check-label" for="includeMessage">
                            Message Content
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeRecipient" checked>
                        <label class="form-check-label" for="includeRecipient">
                            Recipient Information
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeDelivery" checked>
                        <label class="form-check-label" for="includeDelivery">
                            Delivery Information
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeCost" checked>
                        <label class="form-check-label" for="includeCost">
                            Cost Information
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Export History</button>
            </div>
        </div>
    </div>
</div>

<!-- Analytics Modal -->
<div class="modal fade" id="analyticsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SMS Analytics</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="text-center">
                            <h4 class="text-primary">93.5%</h4>
                            <small class="text-muted">Delivery Rate</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <h4 class="text-success">$172.80</h4>
                            <small class="text-muted">Total Cost</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <h4 class="text-warning">2.3s</h4>
                            <small class="text-muted">Avg Delivery Time</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <h4 class="text-info">456</h4>
                            <small class="text-muted">SMS Today</small>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <h6>Daily Volume</h6>
                        <div class="bg-light p-3 rounded text-center">
                            <canvas id="dailyChart" width="200" height="100"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Delivery Status</h6>
                        <div class="bg-light p-3 rounded text-center">
                            <canvas id="statusChart" width="200" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Export Analytics</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="smsSelect[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

function bulkResend() {
    const selected = document.querySelectorAll('input[name="smsSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select SMS to resend');
        return;
    }
    alert('Resending ' + selected.length + ' SMS messages');
}

function bulkExport() {
    const selected = document.querySelectorAll('input[name="smsSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select SMS to export');
        return;
    }
    alert('Exporting ' + selected.length + ' SMS messages');
}

function bulkReport() {
    const selected = document.querySelectorAll('input[name="smsSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select SMS for report');
        return;
    }
    alert('Generating report for ' + selected.length + ' SMS messages');
}

function deleteSelected() {
    const selected = document.querySelectorAll('input[name="smsSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select SMS to delete');
        return;
    }
    if (confirm('Are you sure you want to delete ' + selected.length + ' SMS messages?')) {
        alert('Deleted ' + selected.length + ' SMS messages');
    }
}

function downloadReceipt(smsId) {
    alert('Downloading receipt for SMS: ' + smsId);
}

function printSMS() {
    window.print();
}
</script>
@endsection
