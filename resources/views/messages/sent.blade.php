@extends('layouts.app')

@section('title', 'Sent Messages')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Sent Messages</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#composeModal">
                        <i class="bx bx-plus me-1"></i> Compose New
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Export Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Message Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">156</h4>
                                        <p class="mb-0">Total Sent</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-send avatar-icon"></i>
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
                                        <h4 class="mb-0">142</h4>
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
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">89</h4>
                                        <p class="mb-0">Read</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-envelope-open avatar-icon"></i>
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
                                        <h4 class="mb-0">14</h4>
                                        <p class="mb-0">Pending</p>
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
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="quarter">This Quarter</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="sent">Sent</option>
                            <option value="delivered">Delivered</option>
                            <option value="read">Read</option>
                            <option value="failed">Failed</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="priorityFilter" class="form-label">Priority</label>
                        <select class="form-select" id="priorityFilter">
                            <option value="">All Priorities</option>
                            <option value="normal">Normal</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
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
                        <label for="searchMessage" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchMessage" placeholder="Subject, content...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Messages Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>Recipients</th>
                                <th>Subject</th>
                                <th>Priority</th>
                                <th>Method</th>
                                <th>Sent Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="messageSelect[]" value="MSG001"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-group">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-initial rounded-circle bg-primary">+5</span>
                                            </div>
                                        </div>
                                        <div class="ms-2">
                                            <div class="fw-bold">7 Recipients</div>
                                            <small class="text-muted">Students & Teachers</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Welcome Message</div>
                                        <small class="text-muted">Welcome to School Management System...</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Normal</span></td>
                                <td><span class="badge bg-info">Email</span></td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                                <td><span class="badge bg-success">Delivered</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewMessageModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resendModal"><i class="bx bx-redo me-2"></i>Resend</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#forwardModal"><i class="bx bx-forward me-2"></i>Forward</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Report</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="messageSelect[]" value="MSG002"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-group">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="ms-2">
                                            <div class="fw-bold">2 Recipients</div>
                                            <small class="text-muted">Teachers</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Exam Schedule</div>
                                        <small class="text-muted">Upcoming examination schedule...</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">High</span></td>
                                <td><span class="badge bg-purple">Email & SMS</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 hours')) }}</td>
                                <td><span class="badge bg-info">Read</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewMessageModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resendModal"><i class="bx bx-redo me-2"></i>Resend</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#forwardModal"><i class="bx bx-forward me-2"></i>Forward</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Report</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="messageSelect[]" value="MSG003"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-group">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-initial rounded-circle bg-warning">+12</span>
                                            </div>
                                        </div>
                                        <div class="ms-2">
                                            <div class="fw-bold">15 Recipients</div>
                                            <small class="text-muted">Parents</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Fee Reminder</div>
                                        <small class="text-muted">Fee payment reminder for this month...</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Urgent</span></td>
                                <td><span class="badge bg-purple">Email & SMS</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 day')) }}</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewMessageModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resendModal"><i class="bx bx-redo me-2"></i>Resend</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#forwardModal"><i class="bx bx-forward me-2"></i>Forward</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Report</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="messageSelect[]" value="MSG004"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-group">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('assets/img/avatars/8.png') }}" alt="Avatar" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="ms-2">
                                            <div class="fw-bold">1 Recipient</div>
                                            <small class="text-muted">Student</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Assignment Reminder</div>
                                        <small class="text-muted">Reminder for pending assignment...</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Normal</span></td>
                                <td><span class="badge bg-info">SMS</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-3 days')) }}</td>
                                <td><span class="badge bg-danger">Failed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewMessageModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resendModal"><i class="bx bx-redo me-2"></i>Resend</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#forwardModal"><i class="bx bx-forward me-2"></i>Forward</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Report</a></li>
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
                            <button type="button" class="btn btn-outline-success" onclick="bulkForward()">
                                <i class="bx bx-forward me-1"></i> Forward Selected
                            </button>
                            <button type="button" class="btn btn-outline-info" onclick="exportSelected()">
                                <i class="bx bx-download me-1"></i> Export Selected
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

<!-- View Message Modal -->
<div class="modal fade" id="viewMessageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Message Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Message ID:</strong></td>
                                <td>MSG001</td>
                            </tr>
                            <tr>
                                <td><strong>Subject:</strong></td>
                                <td>Welcome Message</td>
                            </tr>
                            <tr>
                                <td><strong>Priority:</strong></td>
                                <td><span class="badge bg-success">Normal</span></td>
                            </tr>
                            <tr>
                                <td><strong>Send Method:</strong></td>
                                <td><span class="badge bg-info">Email</span></td>
                            </tr>
                            <tr>
                                <td><strong>Sent Date:</strong></td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Delivered</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Recipients</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Smith</td>
                                        <td><span class="badge bg-primary">Student</span></td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td>Sarah Johnson</td>
                                        <td><span class="badge bg-primary">Student</span></td>
                                        <td><span class="badge bg-info">Read</span></td>
                                    </tr>
                                    <tr>
                                        <td>Michael Brown</td>
                                        <td><span class="badge bg-success">Teacher</span></td>
                                        <td><span class="badge bg-info">Read</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Message Content</h6>
                        <div class="card">
                            <div class="card-body">
                                <p>Dear [Recipient Name],</p>
                                <p>Welcome to our School Management System! We are excited to have you join our community. This system will help you stay updated with all school activities, academic progress, and important announcements.</p>
                                <p>Please log in to the system using your credentials to explore all features.</p>
                                <p>Best regards,<br>School Administration</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Delivery Statistics</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Total Recipients:</strong></td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td><strong>Delivered:</strong></td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td><strong>Read:</strong></td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td><strong>Failed:</strong></td>
                                <td>0</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Attachments</h6>
                        <ul class="list-unstyled">
                            <li><i class="bx bx-file me-2"></i>Welcome_Guide.pdf</li>
                            <li><i class="bx bx-file me-2"></i>System_Manual.pdf</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printMessage()">Print</button>
                <button type="button" class="btn btn-success" onclick="resendMessage()">Resend</button>
            </div>
        </div>
    </div>
</div>

<!-- Resend Modal -->
<div class="modal fade" id="resendModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Resend Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="messageInfo" class="form-label">Message</label>
                        <input type="text" class="form-control" id="messageInfo" value="MSG001 - Welcome Message" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipients" class="form-label">Recipients</label>
                        <select class="form-select" id="recipients" multiple>
                            <option value="STU001">John Smith (Student)</option>
                            <option value="STU002">Sarah Johnson (Student)</option>
                            <option value="TCH001">Michael Brown (Teacher)</option>
                        </select>
                        <small class="text-muted">Select recipients to resend to</small>
                    </div>
                    <div class="mb-3">
                        <label for="sendMethod" class="form-label">Send Method</label>
                        <select class="form-select" id="sendMethod">
                            <option value="email">Email</option>
                            <option value="sms">SMS</option>
                            <option value="both">Email & SMS</option>
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
                <button type="button" class="btn btn-primary">Resend Message</button>
            </div>
        </div>
    </div>
</div>

<!-- Forward Modal -->
<div class="modal fade" id="forwardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Forward Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="messageInfo" class="form-label">Message</label>
                        <input type="text" class="form-control" id="messageInfo" value="MSG001 - Welcome Message" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="newRecipients" class="form-label">Forward To *</label>
                        <select class="form-select" id="newRecipients" multiple required>
                            <option value="STU003">Emily Davis (Student)</option>
                            <option value="STU004">Robert Wilson (Student)</option>
                            <option value="TCH002">Lisa Martinez (Teacher)</option>
                        </select>
                        <small class="text-muted">Select recipients to forward to</small>
                    </div>
                    <div class="mb-3">
                        <label for="forwardNotes" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="forwardNotes" rows="3" placeholder="Add your notes to the forwarded message..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Forward Message</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Message Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Message Summary</option>
                        <option value="delivery">Delivery Report</option>
                        <option value="recipients">Recipients Report</option>
                        <option value="detailed">Detailed Report</option>
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

<script>
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="messageSelect[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

function bulkResend() {
    const selected = document.querySelectorAll('input[name="messageSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select messages to resend');
        return;
    }
    // Implementation for bulk resend
    alert('Resending ' + selected.length + ' messages');
}

function bulkForward() {
    const selected = document.querySelectorAll('input[name="messageSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select messages to forward');
        return;
    }
    // Implementation for bulk forward
    alert('Forwarding ' + selected.length + ' messages');
}

function exportSelected() {
    const selected = document.querySelectorAll('input[name="messageSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select messages to export');
        return;
    }
    // Implementation for export
    alert('Exporting ' + selected.length + ' messages');
}

function deleteSelected() {
    const selected = document.querySelectorAll('input[name="messageSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select messages to delete');
        return;
    }
    if (confirm('Are you sure you want to delete ' + selected.length + ' messages?')) {
        // Implementation for delete
        alert('Deleted ' + selected.length + ' messages');
    }
}

function printMessage() {
    window.print();
}

function resendMessage() {
    // Implementation for resend
    alert('Message resent successfully!');
}

function sendMessage() {
    // Implementation for send
    alert('Message sent successfully!');
}
</script>
@endsection
