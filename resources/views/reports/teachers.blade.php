@extends('layouts.app')

@section('title', 'Teacher Reports')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Teacher Reports</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                        <i class="bx bx-file me-1"></i> Generate Report
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#evaluationModal">
                        <i class="bx bx-award me-1"></i> Performance Evaluation
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Teacher Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">45</h4>
                                        <p class="mb-0">Total Teachers</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user avatar-icon"></i>
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
                                        <h4 class="mb-0">4.2</h4>
                                        <p class="mb-0">Avg Performance</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-star avatar-icon"></i>
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
                                        <h4 class="mb-0">96.8%</h4>
                                        <p class="mb-0">Attendance Rate</p>
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
                                        <h4 class="mb-0">38</h4>
                                        <p class="mb-0">Certified</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-certification avatar-icon"></i>
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
                            <option value="performance">Performance Report</option>
                            <option value="attendance">Attendance Report</option>
                            <option value="evaluation">Evaluation Report</option>
                            <option value="teaching">Teaching Quality</option>
                            <option value="professional">Professional Development</option>
                            <option value="disciplinary">Disciplinary Report</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="departmentFilter" class="form-label">Department</label>
                        <select class="form-select" id="departmentFilter">
                            <option value="">All Departments</option>
                            <option value="academic">Academic</option>
                            <option value="science">Science</option>
                            <option value="arts">Arts</option>
                            <option value="sports">Sports</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="excellent">Excellent</option>
                            <option value="good">Good</option>
                            <option value="satisfactory">Satisfactory</option>
                            <option value="needs_improvement">Needs Improvement</option>
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
                                <th>Teacher Name</th>
                                <th>Department</th>
                                <th>Report Type</th>
                                <th>Period</th>
                                <th>Generated Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>TCH001</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Teacher" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Michael Brown</div>
                                            <small class="text-muted">ID: TCH001</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Academic</td>
                                <td><span class="badge bg-success">Performance Report</span></td>
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
                                <td><strong>TCH002</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Teacher" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Emily Davis</div>
                                            <small class="text-muted">ID: TCH002</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Science</td>
                                <td><span class="badge bg-info">Evaluation Report</span></td>
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
                                <td><strong>TCH003</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Teacher" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Robert Wilson</div>
                                            <small class="text-muted">ID: TCH003</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Arts</td>
                                <td><span class="badge bg-warning">Teaching Quality</span></td>
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
                                <td><strong>TCH004</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/8.png') }}" alt="Teacher" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Lisa Martinez</div>
                                            <small class="text-muted">ID: TCH004</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Sports</td>
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
                <h5 class="modal-title">Generate Teacher Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportType" class="form-label">Report Type *</label>
                            <select class="form-select" id="reportType" required>
                                <option value="">Select Report Type</option>
                                <option value="performance">Performance Report</option>
                                <option value="attendance">Attendance Report</option>
                                <option value="evaluation">Evaluation Report</option>
                                <option value="teaching">Teaching Quality</option>
                                <option value="professional">Professional Development</option>
                                <option value="disciplinary">Disciplinary Report</option>
                                <option value="comprehensive">Comprehensive Report</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="teacherSelect" class="form-label">Teacher Selection *</label>
                            <select class="form-select" id="teacherSelect" required>
                                <option value="">Select Teacher</option>
                                <option value="individual">Individual Teacher</option>
                                <option value="department">Entire Department</option>
                                <option value="all">All Teachers</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="individualSelection" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="teacher" class="form-label">Select Teacher *</label>
                            <select class="form-select" id="teacher">
                                <option value="">Select Teacher</option>
                                <option value="TCH001">Michael Brown - Academic</option>
                                <option value="TCH002">Emily Davis - Science</option>
                                <option value="TCH003">Robert Wilson - Arts</option>
                                <option value="TCH004">Lisa Martinez - Sports</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="departmentSelection" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="department" class="form-label">Select Department *</label>
                            <select class="form-select" id="department">
                                <option value="">Select Department</option>
                                <option value="academic">Academic</option>
                                <option value="science">Science</option>
                                <option value="arts">Arts</option>
                                <option value="sports">Sports</option>
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
                                <input class="form-check-input" type="checkbox" id="includeStudentFeedback">
                                <label class="form-check-label" for="includeStudentFeedback">
                                    Student Feedback
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
                                <input class="form-check-input" type="checkbox" id="includeProfessionalDev">
                                <label class="form-check-label" for="includeProfessionalDev">
                                    Professional Development
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
                                <option value="hr">Send to HR</option>
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
                <h5 class="modal-title">Teacher Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6>Report Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Report ID:</strong></td>
                                <td>TCH001</td>
                            </tr>
                            <tr>
                                <td><strong>Report Type:</strong></td>
                                <td><span class="badge bg-success">Performance Report</span></td>
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
                        <h6>Teacher Information</h6>
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Teacher" class="rounded-circle me-3" style="width: 60px; height: 60px;">
                            <div>
                                <h6 class="mb-0">Michael Brown</h6>
                                <p class="mb-0">Teacher ID: TCH001</p>
                                <p class="mb-0">Department: Academic</p>
                                <p class="mb-0">Position: Senior Teacher</p>
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Join Date:</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-5 years')) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Experience:</strong></td>
                                <td>8 years</td>
                            </tr>
                            <tr>
                                <td><strong>Qualification:</strong></td>
                                <td>M.Ed. Mathematics</td>
                            </tr>
                            <tr>
                                <td><strong>Contact:</strong></td>
                                <td>+255 712 345 678</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Performance Overview</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h4 class="text-primary">4.5/5</h4>
                                    <small class="text-muted">Overall Rating</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h4 class="text-success">98.5%</h4>
                                    <small class="text-muted">Attendance</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h4 class="text-info">92%</h4>
                                    <small class="text-muted">Student Satisfaction</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h4 class="text-warning">4.8/5</h4>
                                    <small class="text-muted">Peer Rating</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Performance Metrics</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Teaching Quality Assessment</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Criteria</th>
                                                <th>Score</th>
                                                <th>Grade</th>
                                                <th>Comments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Lesson Planning</td>
                                                <td>4.5/5</td>
                                                <td><span class="badge bg-success">Excellent</span></td>
                                                <td>Well-structured lessons</td>
                                            </tr>
                                            <tr>
                                                <td>Classroom Management</td>
                                                <td>4.7/5</td>
                                                <td><span class="badge bg-success">Excellent</span></td>
                                                <td>Excellent control</td>
                                            </tr>
                                            <tr>
                                                <td>Student Engagement</td>
                                                <td>4.3/5</td>
                                                <td><span class="badge bg-success">Good</span></td>
                                                <td>Highly interactive</td>
                                            </tr>
                                            <tr>
                                                <td>Assessment Methods</td>
                                                <td>4.6/5</td>
                                                <td><span class="badge bg-success">Excellent</span></td>
                                                <td>Varied approaches</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Administrative Performance</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Task</th>
                                                <th>Score</th>
                                                <th>Grade</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Record Keeping</td>
                                                <td>4.8/5</td>
                                                <td><span class="badge bg-success">Excellent</span></td>
                                                <td>On time</td>
                                            </tr>
                                            <tr>
                                                <td>Report Submission</td>
                                                <td>4.5/5</td>
                                                <td><span class="badge bg-success">Excellent</span></td>
                                                <td>On time</td>
                                            </tr>
                                            <tr>
                                                <td>Meeting Attendance</td>
                                                <td>4.9/5</td>
                                                <td><span class="badge bg-success">Excellent</span></td>
                                                <td>100%</td>
                                            </tr>
                                            <tr>
                                                <td>Curriculum Development</td>
                                                <td>4.2/5</td>
                                                <td><span class="badge bg-success">Good</span></td>
                                                <td>Active</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Student Feedback Summary</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-success">4.3/5</h4>
                                            <small class="text-muted">Average Rating</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-info">45/50</h4>
                                            <small class="text-muted">Responses</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6>Feedback Categories</h6>
                                    <div class="progress mb-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" style="width: 85%">Teaching: 4.5/5</div>
                                    </div>
                                    <div class="progress mb-2" style="height: 20px;">
                                        <div class="progress-bar bg-primary" style="width: 80%">Communication: 4.0/5</div>
                                    </div>
                                    <div class="progress mb-2" style="height: 20px;">
                                        <div class="progress-bar bg-warning" style="width: 90%">Availability: 4.5/5</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Professional Development</h6>
                            </div>
                            <div class="card-body">
                                <h6>Training & Certifications</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Advanced Teaching Methods - 2024</li>
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Digital Literacy Workshop - 2023</li>
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Leadership Training - 2023</li>
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Child Psychology Course - 2022</li>
                                </ul>
                                <h6 class="mt-3">Research & Publications</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bx bx-file text-info me-2"></i>Mathematics Teaching Methods - Journal 2024</li>
                                    <li class="mb-2"><i class="bx bx-file text-info me-2"></i>Student Engagement Strategies - Conference 2023</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Administrator Comments</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6>Principal - Dr. Johnson</h6>
                            <p class="mb-0">Michael is an outstanding teacher who consistently demonstrates excellence in all aspects of his work. His dedication to student success and innovative teaching methods make him a valuable asset to our school.</p>
                        </div>
                        <div class="mb-3">
                            <h6>Academic Director - Ms. Wilson</h6>
                            <p class="mb-0">Excellent performance in curriculum development and mentoring junior teachers. His students consistently achieve high results in mathematics competitions.</p>
                        </div>
                        <div class="mb-3">
                            <h6>HR Manager - Mr. Davis</h6>
                            <p class="mb-0">Punctual, reliable, and always willing to go the extra mile. Strong team player who contributes positively to school culture.</p>
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

<!-- Evaluation Modal -->
<div class="modal fade" id="evaluationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Performance Evaluation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="evaluationTeacher" class="form-label">Select Teacher</label>
                        <select class="form-select" id="evaluationTeacher">
                            <option value="">Select Teacher</option>
                            <option value="TCH001">Michael Brown</option>
                            <option value="TCH002">Emily Davis</option>
                            <option value="TCH003">Robert Wilson</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="evaluationType" class="form-label">Evaluation Type</label>
                        <select class="form-select" id="evaluationType">
                            <option value="annual">Annual Evaluation</option>
                            <option value="quarterly">Quarterly Review</option>
                            <option value="probation">Probation Review</option>
                            <option value="promotion">Promotion Review</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="evaluationPeriod" class="form-label">Period</label>
                        <select class="form-select" id="evaluationPeriod">
                            <option value="current">Current Term</option>
                            <option value="last">Last Term</option>
                            <option value="year">Current Year</option>
                        </select>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Evaluation Criteria</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Criteria</th>
                                        <th>Weight</th>
                                        <th>Score (1-5)</th>
                                        <th>Weighted Score</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Teaching Effectiveness</td>
                                        <td>30%</td>
                                        <td><input type="number" class="form-control form-control-sm" min="1" max="5" value="4.5"></td>
                                        <td>1.35</td>
                                        <td><input type="text" class="form-control form-control-sm" value="Excellent teaching methods"></td>
                                    </tr>
                                    <tr>
                                        <td>Classroom Management</td>
                                        <td>20%</td>
                                        <td><input type="number" class="form-control form-control-sm" min="1" max="5" value="4.7"></td>
                                        <td>0.94</td>
                                        <td><input type="text" class="form-control form-control-sm" value="Outstanding control"></td>
                                    </tr>
                                    <tr>
                                        <td>Student Engagement</td>
                                        <td>15%</td>
                                        <td><input type="number" class="form-control form-control-sm" min="1" max="5" value="4.3"></td>
                                        <td>0.65</td>
                                        <td><input type="text" class="form-control form-control-sm" value="Highly interactive"></td>
                                    </tr>
                                    <tr>
                                        <td>Professional Conduct</td>
                                        <td>15%</td>
                                        <td><input type="number" class="form-control form-control-sm" min="1" max="5" value="4.8"></td>
                                        <td>0.72</td>
                                        <td><input type="text" class="form-control form-control-sm" value="Exemplary behavior"></td>
                                    </tr>
                                    <tr>
                                        <td>Administrative Tasks</td>
                                        <td>10%</td>
                                        <td><input type="number" class="form-control form-control-sm" min="1" max="5" value="4.5"></td>
                                        <td>0.45</td>
                                        <td><input type="text" class="form-control form-control-sm" value="Timely completion"></td>
                                    </tr>
                                    <tr>
                                        <td>Professional Development</td>
                                        <td>10%</td>
                                        <td><input type="number" class="form-control form-control-sm" min="1" max="5" value="4.6"></td>
                                        <td>0.46</td>
                                        <td><input type="text" class="form-control form-control-sm" value="Active learner"></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Total</strong></td>
                                        <td><strong>100%</strong></td>
                                        <td><strong>4.5</strong></td>
                                        <td><strong>4.57</strong></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Evaluation Summary</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-success">4.57/5</h4>
                                            <small class="text-muted">Final Score</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-primary">Excellent</h4>
                                            <small class="text-muted">Overall Rating</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6>Recommendations</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Continue excellent performance</li>
                                        <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Mentor junior teachers</li>
                                        <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Consider leadership role</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Action Plan</h6>
                            </div>
                            <div class="card-body">
                                <h6>Goals for Next Period</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bx bx-target-lock text-primary me-2"></i>Implement new teaching technologies</li>
                                    <li class="mb-2"><i class="bx bx-target-lock text-primary me-2"></i>Lead curriculum review committee</li>
                                    <li class="mb-2"><i class="bx bx-target-lock text-primary me-2"></i>Publish research paper</li>
                                </ul>
                                <h6 class="mt-3">Support Needed</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bx bx-support text-info me-2"></i>Access to professional development budget</li>
                                    <li class="mb-2"><i class="bx bx-support text-info me-2"></i>Reduced teaching load for research</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Evaluation</button>
                <button type="button" class="btn btn-success">Complete Evaluation</button>
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
                                Include comments
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
                            <option value="hr">Send to HR</option>
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
                                <option value="TCH001">TCH001 - Performance Report ({{ date('F Y') }})</option>
                                <option value="TCH002">TCH002 - Evaluation Report ({{ date('F Y') }})</option>
                                <option value="TCH003">TCH003 - Teaching Quality ({{ date('F Y') }})</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="report2" class="form-label">Select Report 2</label>
                            <select class="form-select" id="report2">
                                <option value="">Select Report</option>
                                <option value="TCH001">TCH001 - Performance Report ({{ date('F Y') }})</option>
                                <option value="TCH002">TCH002 - Evaluation Report ({{ date('F Y') }})</option>
                                <option value="TCH003">TCH003 - Teaching Quality ({{ date('F Y') }})</option>
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
                                        <td>Overall Rating</td>
                                        <td>4.5/5</td>
                                        <td>4.7/5</td>
                                        <td>+0.2</td>
                                        <td class="text-success">Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Teaching Quality</td>
                                        <td>4.3/5</td>
                                        <td>4.6/5</td>
                                        <td>+0.3</td>
                                        <td class="text-success">Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Student Feedback</td>
                                        <td>4.2/5</td>
                                        <td>4.4/5</td>
                                        <td>+0.2</td>
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
                <h5 class="modal-title">Export Teacher Data</h5>
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
                            <input class="form-check-input" type="checkbox" id="exportTeacherInfo" checked>
                            <label class="form-check-label" for="exportTeacherInfo">
                                Teacher Information
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportPerformance" checked>
                            <label class="form-check-label" for="exportPerformance">
                                Performance Records
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportAttendance" checked>
                            <label class="form-check-label" for="exportAttendance">
                                Attendance Records
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportFeedback">
                            <label class="form-check-label" for="exportFeedback">
                                Student Feedback
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
document.getElementById('teacherSelect').addEventListener('change', function() {
    const type = this.value;
    document.getElementById('individualSelection').style.display = type === 'individual' ? 'block' : 'none';
    document.getElementById('departmentSelection').style.display = type === 'department' ? 'block' : 'none';
});

document.getElementById('dateRange').addEventListener('change', function() {
    const range = this.value;
    document.getElementById('customDateRange').style.display = range === 'custom' ? 'block' : 'none';
});

function generateReport() {
    const reportType = document.getElementById('reportType').value;
    const teacherSelect = document.getElementById('teacherSelect').value;
    const period = document.getElementById('period').value;
    
    if (!reportType || !teacherSelect || !period) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert('Teacher report generated successfully!');
    document.getElementById('generateReportModal').querySelector('.btn-close').click();
}

function printReport() {
    window.print();
}

function downloadReport() {
    alert('Downloading teacher report...');
}
</script>
@endsection
