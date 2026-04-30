@extends('layouts.app')

@section('title', 'Attendance Reports')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Attendance Reports</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                        <i class="bx bx-file me-1"></i> Generate Report
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                        <i class="bx bx-calendar me-1"></i> Schedule Report
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Attendance Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">89.2%</h4>
                                        <p class="mb-0">Overall Attendance</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user-check avatar-icon"></i>
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
                                        <h4 class="mb-0">456</h4>
                                        <p class="mb-0">Present Today</p>
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
                                        <h4 class="mb-0">34</h4>
                                        <p class="mb-0">Absent Today</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user-x avatar-icon"></i>
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
                                        <h4 class="mb-0">12</h4>
                                        <p class="mb-0">On Leave</p>
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
                        <label for="reportType" class="form-label">Report Type</label>
                        <select class="form-select" id="reportType">
                            <option value="">All Types</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="termly">Termly</option>
                            <option value="yearly">Yearly</option>
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
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="late">Late</option>
                            <option value="leave">On Leave</option>
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
                                <th>Report Type</th>
                                <th>Period</th>
                                <th>Class</th>
                                <th>Generated Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>ATT001</strong></td>
                                <td><span class="badge bg-primary">Daily</span></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>All Classes</td>
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
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#scheduleModal"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>ATT002</strong></td>
                                <td><span class="badge bg-info">Weekly</span></td>
                                <td>{{ date('Y-m-d', strtotime('-1 week')) }} - {{ date('Y-m-d') }}</td>
                                <td>Class 1A</td>
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
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#scheduleModal"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>ATT003</strong></td>
                                <td><span class="badge bg-warning">Monthly</span></td>
                                <td>{{ date('Y-m-01') }} - {{ date('Y-m-t') }}</td>
                                <td>All Classes</td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 days')) }}</td>
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
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#scheduleModal"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
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
                <h5 class="modal-title">Generate Attendance Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportType" class="form-label">Report Type *</label>
                            <select class="form-select" id="reportType" required>
                                <option value="">Select Report Type</option>
                                <option value="daily">Daily Attendance</option>
                                <option value="weekly">Weekly Attendance</option>
                                <option value="monthly">Monthly Attendance</option>
                                <option value="termly">Termly Attendance</option>
                                <option value="yearly">Yearly Attendance</option>
                                <option value="custom">Custom Period</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="classSelect" class="form-label">Class *</label>
                            <select class="form-select" id="classSelect" required>
                                <option value="">Select Class</option>
                                <option value="all">All Classes</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="dateRange">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date *</label>
                            <input type="date" class="form-control" id="startDate" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">End Date *</label>
                            <input type="date" class="form-control" id="endDate" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="includeFields" class="form-label">Include Fields</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includePresent" checked>
                                <label class="form-check-label" for="includePresent">
                                    Present Students
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeAbsent" checked>
                                <label class="form-check-label" for="includeAbsent">
                                    Absent Students
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeLate" checked>
                                <label class="form-check-label" for="includeLate">
                                    Late Students
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeLeave" checked>
                                <label class="form-check-label" for="includeLeave">
                                    Students on Leave
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="additionalFields" class="form-label">Additional Fields</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includePercentage">
                                <label class="form-check-label" for="includePercentage">
                                    Attendance Percentage
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeTrends">
                                <label class="form-check-label" for="includeTrends">
                                    Attendance Trends
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeCharts">
                                <label class="form-check-label" for="includeCharts">
                                    Charts and Graphs
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeSummary">
                                <label class="form-check-label" for="includeSummary">
                                    Executive Summary
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
                                <option value="csv">CSV</option>
                                <option value="html">HTML</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deliveryMethod" class="form-label">Delivery Method</label>
                            <select class="form-select" id="deliveryMethod">
                                <option value="download">Download Only</option>
                                <option value="email">Email</option>
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
                <h5 class="modal-title">Attendance Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6>Report Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Report ID:</strong></td>
                                <td>ATT001</td>
                            </tr>
                            <tr>
                                <td><strong>Report Type:</strong></td>
                                <td><span class="badge bg-primary">Daily</span></td>
                            </tr>
                            <tr>
                                <td><strong>Period:</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Class:</strong></td>
                                <td>All Classes</td>
                            </tr>
                            <tr>
                                <td><strong>Generated:</strong></td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Attendance Summary</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Total Students:</strong></td>
                                <td>502</td>
                            </tr>
                            <tr>
                                <td><strong>Present:</strong></td>
                                <td>456 (91.0%)</td>
                            </tr>
                            <tr>
                                <td><strong>Absent:</strong></td>
                                <td>34 (6.8%)</td>
                            </tr>
                            <tr>
                                <td><strong>Late:</strong></td>
                                <td>8 (1.6%)</td>
                            </tr>
                            <tr>
                                <td><strong>On Leave:</strong></td>
                                <td>12 (2.4%)</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Class-wise Attendance</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Total</th>
                                        <th>Present</th>
                                        <th>Absent</th>
                                        <th>Late</th>
                                        <th>Leave</th>
                                        <th>Attendance %</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Class 1A</td>
                                        <td>25</td>
                                        <td>23</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>92.0%</td>
                                    </tr>
                                    <tr>
                                        <td>Class 1B</td>
                                        <td>28</td>
                                        <td>26</td>
                                        <td>2</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>92.9%</td>
                                    </tr>
                                    <tr>
                                        <td>Class 2A</td>
                                        <td>30</td>
                                        <td>27</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>90.0%</td>
                                    </tr>
                                    <tr>
                                        <td>Class 2B</td>
                                        <td>32</td>
                                        <td>29</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>0</td>
                                        <td>90.6%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Attendance Trends</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="attendanceTrendChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Status Distribution</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="statusChart" width="400" height="200"></canvas>
                            </div>
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

<!-- Schedule Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="scheduleType" class="form-label">Schedule Type</label>
                        <select class="form-select" id="scheduleType">
                            <option value="once">Once</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="scheduleTime" class="form-label">Schedule Time</label>
                        <input type="datetime-local" class="form-control" id="scheduleTime">
                    </div>
                    <div class="mb-3">
                        <label for="recipients" class="form-label">Email Recipients</label>
                        <input type="text" class="form-control" id="recipients" placeholder="Enter email addresses separated by commas">
                    </div>
                    <div class="mb-3">
                        <label for="scheduleNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="scheduleNotes" rows="2" placeholder="Add notes about this scheduled report"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Schedule Report</button>
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
                            <option value="csv">CSV</option>
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
                            <input class="form-check-input" type="checkbox" id="includeRawData">
                            <label class="form-check-label" for="includeRawData">
                                Include raw data
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

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Attendance Data</h5>
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
                            <input class="form-check-input" type="checkbox" id="exportAttendance" checked>
                            <label class="form-check-label" for="exportAttendance">
                                Attendance Records
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportDates" checked>
                            <label class="form-check-label" for="exportDates">
                                Date Information
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
function generateReport() {
    const reportType = document.getElementById('reportType').value;
    const classSelect = document.getElementById('classSelect').value;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    
    if (!reportType || !classSelect || !startDate || !endDate) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert('Attendance report generated successfully!');
    document.getElementById('generateReportModal').querySelector('.btn-close').click();
}

function printReport() {
    window.print();
}

function downloadReport() {
    alert('Downloading attendance report...');
}

function updateDateRange(reportType) {
    const today = new Date();
    let startDate, endDate;
    
    switch(reportType) {
        case 'daily':
            startDate = endDate = today;
            break;
        case 'weekly':
            startDate = new Date(today.setDate(today.getDate() - today.getDay()));
            endDate = new Date(today.setDate(today.getDate() - today.getDay() + 6));
            break;
        case 'monthly':
            startDate = new Date(today.getFullYear(), today.getMonth(), 1);
            endDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
            break;
        default:
            startDate = endDate = today;
    }
    
    document.getElementById('startDate').value = startDate.toISOString().split('T')[0];
    document.getElementById('endDate').value = endDate.toISOString().split('T')[0];
}

// Initialize charts when modal is shown
document.getElementById('viewReportModal').addEventListener('shown.bs.modal', function () {
    // Attendance Trend Chart
    const trendCtx = document.getElementById('attendanceTrendChart').getContext('2d');
    new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            datasets: [{
                label: 'Attendance %',
                data: [92, 89, 94, 91, 93],
                borderColor: 'rgb(75, 192, 192)',
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
    
    // Status Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Present', 'Absent', 'Late', 'Leave'],
            datasets: [{
                data: [456, 34, 8, 12],
                backgroundColor: [
                    'rgb(75, 192, 192)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    'rgb(54, 162, 235)'
                ]
            }]
        },
        options: {
            responsive: true
        }
    });
});
</script>
@endsection
