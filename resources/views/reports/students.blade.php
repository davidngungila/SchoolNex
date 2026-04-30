@extends('layouts.app')

@section('title', 'Student Reports')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Student Reports</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                        <i class="bx bx-file me-1"></i> Generate Report
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#progressModal">
                        <i class="bx bx-line-chart me-1"></i> Progress Tracking
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Student Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">502</h4>
                                        <p class="mb-0">Total Students</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-group avatar-icon"></i>
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
                                        <h4 class="mb-0">85.6%</h4>
                                        <p class="mb-0">Avg Performance</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-chart avatar-icon"></i>
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
                                        <h4 class="mb-0">92.3%</h4>
                                        <p class="mb-0">Attendance Rate</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user-check avatar-icon"></i>
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
                                        <p class="mb-0">At Risk Students</p>
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
                        <label for="reportType" class="form-label">Report Type</label>
                        <select class="form-select" id="reportType">
                            <option value="">All Types</option>
                            <option value="academic">Academic Performance</option>
                            <option value="attendance">Attendance Report</option>
                            <option value="behavior">Behavior Report</option>
                            <option value="progress">Progress Report</option>
                            <option value="medical">Medical Report</option>
                            <option value="disciplinary">Disciplinary Report</option>
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
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="excellent">Excellent</option>
                            <option value="good">Good</option>
                            <option value="average">Average</option>
                            <option value="poor">Poor</option>
                            <option value="at_risk">At Risk</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="term">This Term</option>
                            <option value="custom">Custom</option>
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

                <!-- Reports Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Report ID</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Report Type</th>
                                <th>Period</th>
                                <th>Generated Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>STU001</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">ID: STU001</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 1A</td>
                                <td><span class="badge bg-success">Academic Performance</span></td>
                                <td>{{ date('F Y') }}</td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bx bx-show me-2"></i>View Report</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#shareModal"><i class="bx bx-share me-2"></i>Share</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#compareModal"><i class="bx bx-compare me-2"></i>Compare</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>STU002</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Sarah Johnson</div>
                                            <small class="text-muted">ID: STU002</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 1B</td>
                                <td><span class="badge bg-info">Attendance Report</span></td>
                                <td>{{ date('F Y') }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 day')) }}</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bx bx-show me-2"></i>View Report</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#shareModal"><i class="bx bx-share me-2"></i>Share</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#compareModal"><i class="bx bx-compare me-2"></i>Compare</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>STU003</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Michael Brown</div>
                                            <small class="text-muted">ID: STU003</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 2A</td>
                                <td><span class="badge bg-warning">Progress Report</span></td>
                                <td>{{ date('F Y') }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 days')) }}</td>
                                <td><span class="badge bg-warning">In Progress</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bx bx-show me-2"></i>View Report</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#shareModal"><i class="bx bx-share me-2"></i>Share</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#compareModal"><i class="bx bx-compare me-2"></i>Compare</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>STU004</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Emily Davis</div>
                                            <small class="text-muted">ID: STU004</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 2B</td>
                                <td><span class="badge bg-danger">Disciplinary Report</span></td>
                                <td>{{ date('F Y') }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime('-3 days')) }}</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bx bx-show me-2"></i>View Report</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#shareModal"><i class="bx bx-share me-2"></i>Share</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#compareModal"><i class="bx bx-compare me-2"></i>Compare</a></li>
                                            <li><hr class="dropdown-divider"></li>
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

<!-- Generate Report Modal -->
<div class="modal fade" id="generateReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Student Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportType" class="form-label">Report Type *</label>
                            <select class="form-select" id="reportType" required>
                                <option value="">Select Report Type</option>
                                <option value="academic">Academic Performance</option>
                                <option value="attendance">Attendance Report</option>
                                <option value="behavior">Behavior Report</option>
                                <option value="progress">Progress Report</option>
                                <option value="medical">Medical Report</option>
                                <option value="disciplinary">Disciplinary Report</option>
                                <option value="comprehensive">Comprehensive Report</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="studentSelect" class="form-label">Student Selection *</label>
                            <select class="form-select" id="studentSelect" required>
                                <option value="">Select Student</option>
                                <option value="individual">Individual Student</option>
                                <option value="class">Entire Class</option>
                                <option value="all">All Students</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="individualSelection" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="student" class="form-label">Select Student *</label>
                            <select class="form-select" id="student">
                                <option value="">Select Student</option>
                                <option value="STU001">John Smith - Class 1A</option>
                                <option value="STU002">Sarah Johnson - Class 1B</option>
                                <option value="STU003">Michael Brown - Class 2A</option>
                                <option value="STU004">Emily Davis - Class 2B</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="classSelection" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="class" class="form-label">Select Class *</label>
                            <select class="form-select" id="class">
                                <option value="">Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="period" class="form-label">Period *</label>
                            <select class="form-select" id="period" required>
                                <option value="">Select Period</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="termly">Termly</option>
                                <option value="yearly">Yearly</option>
                                <option value="custom">Custom Period</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dateRange" class="form-label">Date Range</label>
                            <select class="form-select" id="dateRange">
                                <option value="current">Current Period</option>
                                <option value="last">Last Period</option>
                                <option value="ytd">Year to Date</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="customDateRange" style="display: none;">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date *</label>
                            <input type="date" class="form-control" id="startDate">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">End Date *</label>
                            <input type="date" class="form-control" id="endDate">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="includeFields" class="form-label">Include Sections</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeSummary" checked>
                                <label class="form-check-label" for="includeSummary">
                                    Executive Summary
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includePerformance" checked>
                                <label class="form-check-label" for="includePerformance">
                                    Performance Metrics
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeAttendance">
                                <label class="form-check-label" for="includeAttendance">
                                    Attendance Records
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeBehavior">
                                <label class="form-check-label" for="includeBehavior">
                                    Behavior Assessment
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="additionalFields" class="form-label">Additional Fields</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeCharts" checked>
                                <label class="form-check-label" for="includeCharts">
                                    Charts and Graphs
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeTrends">
                                <label class="form-check-label" for="includeTrends">
                                    Trend Analysis
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeRecommendations">
                                <label class="form-check-label" for="includeRecommendations">
                                    Recommendations
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeParentInfo">
                                <label class="form-check-label" for="includeParentInfo">
                                    Parent Information
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportFormat" class="form-label">Report Format *</label>
                            <select class="form-select" id="reportFormat" required>
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                                <option value="html">HTML</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deliveryMethod" class="form-label">Delivery Method</label>
                            <select class="form-select" id="deliveryMethod">
                                <option value="download">Download Only</option>
                                <option value="email">Email</option>
                                <option value="parent">Send to Parents</option>
                                <option value="both">Download & Email</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="emailRecipients" class="form-label">Email Recipients</label>
                        <input type="text" class="form-control" id="emailRecipients" placeholder="Enter email addresses separated by commas">
                        <small class="text-muted">Only required if email delivery is selected</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="reportNotes" class="form-label">Report Notes</label>
                        <textarea class="form-control" id="reportNotes" rows="2" placeholder="Add any notes about this report..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="generateReport()">Generate Report</button>
            </div>
        </div>
    </div>
</div>

<!-- View Report Modal -->
<div class="modal fade" id="viewReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Student Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6>Report Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Report ID:</strong></td>
                                <td>STU001</td>
                            </tr>
                            <tr>
                                <td><strong>Report Type:</strong></td>
                                <td><span class="badge bg-success">Academic Performance</span></td>
                            </tr>
                            <tr>
                                <td><strong>Period:</strong></td>
                                <td>{{ date('F Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Generated:</strong></td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Completed</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Student Information</h6>
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle me-3" style="width: 60px; height: 60px;">
                            <div>
                                <h6 class="mb-0">John Smith</h6>
                                <p class="mb-0">Student ID: STU001</p>
                                <p class="mb-0">Class: 1A</p>
                                <p class="mb-0">Age: 12 years</p>
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Admission Date:</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-2 years')) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Parent Contact:</strong></td>
                                <td>+255 712 345 678</td>
                            </tr>
                            <tr>
                                <td><strong>Parent Email:</strong></td>
                                <td>parent@email.com</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Academic Performance</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Subject-wise Performance</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Marks</th>
                                                <th>Grade</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mathematics</td>
                                                <td>85/100</td>
                                                <td><span class="badge bg-success">B+</span></td>
                                                <td>Good performance</td>
                                            </tr>
                                            <tr>
                                                <td>English</td>
                                                <td>92/100</td>
                                                <td><span class="badge bg-success">A-</span></td>
                                                <td>Excellent</td>
                                            </tr>
                                            <tr>
                                                <td>Science</td>
                                                <td>78/100</td>
                                                <td><span class="badge bg-warning">B</span></td>
                                                <td>Needs improvement</td>
                                            </tr>
                                            <tr>
                                                <td>Social Studies</td>
                                                <td>88/100</td>
                                                <td><span class="badge bg-success">B+</span></td>
                                                <td>Good</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Performance Summary</h6>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-primary">85.75%</h4>
                                            <small class="text-muted">Average Score</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-success">3rd</h4>
                                            <small class="text-muted">Class Rank</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6>Grade Distribution</h6>
                                    <div class="progress mb-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" style="width: 25%">A Grade: 25%</div>
                                    </div>
                                    <div class="progress mb-2" style="height: 20px;">
                                        <div class="progress-bar bg-primary" style="width: 50%">B Grade: 50%</div>
                                    </div>
                                    <div class="progress mb-2" style="height: 20px;">
                                        <div class="progress-bar bg-warning" style="width: 25%">C Grade: 25%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Attendance Summary</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-success">94.5%</h4>
                                            <small class="text-muted">Attendance Rate</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-info">170/180</h4>
                                            <small class="text-muted">Days Present</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6>Monthly Attendance</h6>
                                    <canvas id="attendanceChart" width="300" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Behavior Assessment</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-success">Good</h4>
                                            <small class="text-muted">Overall Behavior</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-primary">4.2/5</h4>
                                            <small class="text-muted">Behavior Score</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6>Behavior Categories</h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <tr>
                                                <td>Discipline</td>
                                                <td><span class="badge bg-success">4.5</span></td>
                                            </tr>
                                            <tr>
                                                <td>Participation</td>
                                                <td><span class="badge bg-success">4.0</span></td>
                                            </tr>
                                            <tr>
                                                <td>Cooperation</td>
                                                <td><span class="badge bg-primary">4.5</span></td>
                                            </tr>
                                            <tr>
                                                <td>Respect</td>
                                                <td><span class="badge bg-success">4.0</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Teacher Comments</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6>Class Teacher - Ms. Johnson</h6>
                            <p class="mb-0">John is a bright and enthusiastic student who actively participates in class discussions. He shows good understanding of most subjects but needs to work more on science. His attendance is excellent and his behavior is exemplary.</p>
                        </div>
                        <div class="mb-3">
                            <h6>Math Teacher - Mr. Davis</h6>
                            <p class="mb-0">John has good mathematical skills and shows interest in problem-solving. He should practice more word problems to improve his analytical thinking.</p>
                        </div>
                        <div class="mb-3">
                            <h6>English Teacher - Mrs. Wilson</h6>
                            <p class="mb-0">Excellent performance in English. John reads fluently and writes clearly. He should continue reading diverse genres to expand his vocabulary.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printReport()">Print Report</button>
                <button type="button" class="btn btn-success" onclick="downloadReport()">Download Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Progress Tracking Modal -->
<div class="modal fade" id="progressModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Student Progress Tracking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="progressStudent" class="form-label">Select Student</label>
                        <select class="form-select" id="progressStudent">
                            <option value="">Select Student</option>
                            <option value="STU001">John Smith</option>
                            <option value="STU002">Sarah Johnson</option>
                            <option value="STU003">Michael Brown</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="progressSubject" class="form-label">Subject</label>
                        <select class="form-select" id="progressSubject">
                            <option value="all">All Subjects</option>
                            <option value="math">Mathematics</option>
                            <option value="english">English</option>
                            <option value="science">Science</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="progressPeriod" class="form-label">Period</label>
                        <select class="form-select" id="progressPeriod">
                            <option value="term">This Term</option>
                            <option value="year">This Year</option>
                            <option value="all">All Time</option>
                        </select>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Progress Chart</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="progressChart" width="800" height="400"></canvas>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Progress Indicators</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <td>Current Grade</td>
                                        <td><span class="badge bg-primary">B+</span></td>
                                    </tr>
                                    <tr>
                                        <td>Previous Grade</td>
                                        <td><span class="badge bg-success">A-</span></td>
                                    </tr>
                                    <tr>
                                        <td>Improvement</td>
                                        <td><span class="badge bg-warning">-0.3</span></td>
                                    </tr>
                                    <tr>
                                        <td>Trend</td>
                                        <td><span class="badge bg-danger">Declining</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Recommendations</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Focus on science concepts</li>
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Practice more word problems</li>
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Attend extra help sessions</li>
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Complete homework regularly</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Generate Progress Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Download Modal -->
<div class="modal fade" id="downloadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Download Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="downloadFormat" class="form-label">Download Format</label>
                        <select class="form-select" id="downloadFormat">
                            <option value="pdf">PDF</option>
                            <option value="excel">Excel</option>
                            <option value="html">HTML</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeCharts" checked>
                            <label class="form-check-label" for="includeCharts">
                                Include charts and graphs
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeComments" checked>
                            <label class="form-check-label" for="includeComments">
                                Include teacher comments
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeRecommendations" checked>
                            <label class="form-check-label" for="includeRecommendations">
                                Include recommendations
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Download Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="shareMethod" class="form-label">Share Method</label>
                        <select class="form-select" id="shareMethod">
                            <option value="email">Email</option>
                            <option value="link">Share Link</option>
                            <option value="parent">Send to Parents</option>
                            <option value="both">Email & Link</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="shareRecipients" class="form-label">Recipients</label>
                        <input type="text" class="form-control" id="shareRecipients" placeholder="Enter email addresses separated by commas">
                    </div>
                    <div class="mb-3">
                        <label for="shareMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="shareMessage" rows="3" placeholder="Add a message to share with the report..."></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="allowDownload" checked>
                            <label class="form-check-label" for="allowDownload">
                                Allow recipients to download
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="passwordProtect">
                            <label class="form-check-label" for="passwordProtect">
                                Password protect the link
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Share Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Compare Modal -->
<div class="modal fade" id="compareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Compare Reports</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="report1" class="form-label">Select Report 1</label>
                            <select class="form-select" id="report1">
                                <option value="">Select Report</option>
                                <option value="STU001">STU001 - Academic Report ({{ date('F Y') }})</option>
                                <option value="STU002">STU002 - Attendance Report ({{ date('F Y') }})</option>
                                <option value="STU003">STU003 - Progress Report ({{ date('F Y') }})</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="report2" class="form-label">Select Report 2</label>
                            <select class="form-select" id="report2">
                                <option value="">Select Report</option>
                                <option value="STU001">STU001 - Academic Report ({{ date('F Y') }})</option>
                                <option value="STU002">STU002 - Attendance Report ({{ date('F Y') }})</option>
                                <option value="STU003">STU003 - Progress Report ({{ date('F Y') }})</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="comparisonType" class="form-label">Comparison Type</label>
                        <select class="form-select" id="comparisonType">
                            <option value="side-by-side">Side by Side</option>
                            <option value="trend">Trend Analysis</option>
                            <option value="performance">Performance Comparison</option>
                        </select>
                    </div>
                </form>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Comparison Results</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Metric</th>
                                        <th>Report 1</th>
                                        <th>Report 2</th>
                                        <th>Change</th>
                                        <th>Improvement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Average Score</td>
                                        <td>85.75%</td>
                                        <td>87.20%</td>
                                        <td>+1.45%</td>
                                        <td class="text-success">Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Attendance Rate</td>
                                        <td>94.5%</td>
                                        <td>92.0%</td>
                                        <td>-2.5%</td>
                                        <td class="text-danger">No</td>
                                    </tr>
                                    <tr>
                                        <td>Behavior Score</td>
                                        <td>4.2/5</td>
                                        <td>4.5/5</td>
                                        <td>+0.3</td>
                                        <td class="text-success">Yes</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Generate Comparison</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportType" class="form-label">Export Type</label>
                        <select class="form-select" id="exportType">
                            <option value="all">All Records</option>
                            <option value="filtered">Filtered Records</option>
                            <option value="selected">Selected Records</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="exportFormat" class="form-label">Format</label>
                            <select class="form-select" id="exportFormat">
                                <option value="excel">Excel</option>
                                <option value="csv">CSV</option>
                                <option value="json">JSON</option>
                                <option value="xml">XML</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exportDateRange" class="form-label">Date Range</label>
                            <select class="form-select" id="exportDateRange">
                                <option value="all">All Time</option>
                                <option value="today">Today</option>
                                <option value="week">This Week</option>
                                <option value="month">This Month</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exportFields" class="form-label">Include Fields</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportStudentInfo" checked>
                            <label class="form-check-label" for="exportStudentInfo">
                                Student Information
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportAcademic" checked>
                            <label class="form-check-label" for="exportAcademic">
                                Academic Records
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportAttendance" checked>
                            <label class="form-check-label" for="exportAttendance">
                                Attendance Records
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportBehavior">
                            <label class="form-check-label" for="exportBehavior">
                                Behavior Records
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Export Data</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('studentSelect').addEventListener('change', function() {
    const type = this.value;
    document.getElementById('individualSelection').style.display = type === 'individual' ? 'block' : 'none';
    document.getElementById('classSelection').style.display = type === 'class' ? 'block' : 'none';
});

document.getElementById('dateRange').addEventListener('change', function() {
    const range = this.value;
    document.getElementById('customDateRange').style.display = range === 'custom' ? 'block' : 'none';
});

function generateReport() {
    const reportType = document.getElementById('reportType').value;
    const studentSelect = document.getElementById('studentSelect').value;
    const period = document.getElementById('period').value;
    
    if (!reportType || !studentSelect || !period) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert('Student report generated successfully!');
    document.getElementById('generateReportModal').querySelector('.btn-close').click();
}

function printReport() {
    window.print();
}

function downloadReport() {
    alert('Downloading student report...');
}

// Initialize charts when modal is shown
document.getElementById('viewReportModal').addEventListener('shown.bs.modal', function () {
    // Attendance Chart
    const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
    new Chart(attendanceCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Days Present',
                data: [28, 27, 29, 28, 30, 28],
                backgroundColor: 'rgba(75, 192, 192, 0.8)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 31
                }
            }
        }
    });
});

// Progress Chart
document.getElementById('progressModal').addEventListener('shown.bs.modal', function () {
    const progressCtx = document.getElementById('progressChart').getContext('2d');
    new Chart(progressCtx, {
        type: 'line',
        data: {
            labels: ['Term 1', 'Term 2', 'Term 3', 'Term 4'],
            datasets: [{
                label: 'Mathematics',
                data: [82, 85, 83, 85],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }, {
                label: 'English',
                data: [88, 90, 89, 92],
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
            }, {
                label: 'Science',
                data: [75, 78, 80, 78],
                borderColor: 'rgb(255, 205, 86)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
});
</script>
@endsection
