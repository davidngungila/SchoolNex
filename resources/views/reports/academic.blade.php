@extends('layouts.app')

@section('title', 'Academic Reports')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Academic Reports</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                        <i class="bx bx-file me-1"></i> Generate Report
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                        <i class="bx bx-calendar me-1"></i> Schedule Report
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#templatesModal">
                        <i class="bx bx-layer me-1"></i> Templates
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Quick Stats -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">85.6%</h4>
                                        <p class="mb-0">Average Performance</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-chart avatar-icon"></i>
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
                                        <h4 class="mb-0">92.3%</h4>
                                        <p class="mb-0">Pass Rate</p>
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
                                        <h4 class="mb-0">7.8%</h4>
                                        <p class="mb-0">Failure Rate</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-x-circle avatar-icon"></i>
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
                                        <h4 class="mb-0">94.2%</h4>
                                        <p class="mb-0">Attendance Rate</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user-check avatar-icon"></i>
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
                            <option value="">All Reports</option>
                            <option value="performance">Performance Report</option>
                            <option value="progress">Progress Report</option>
                            <option value="attendance">Attendance Report</option>
                            <option value="behavior">Behavior Report</option>
                            <option value="subject">Subject-wise Report</option>
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
                        <label for="subjectFilter" class="form-label">Subject</label>
                        <select class="form-select" id="subjectFilter">
                            <option value="">All Subjects</option>
                            <option value="math">Mathematics</option>
                            <option value="english">English</option>
                            <option value="physics">Physics</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="biology">Biology</option>
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
                        <label for="yearFilter" class="form-label">Year</label>
                        <select class="form-select" id="yearFilter">
                            <option value="2024" selected>2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Reports Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Report ID</th>
                                <th>Report Name</th>
                                <th>Type</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Term</th>
                                <th>Generated Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>ARP001</strong></td>
                                <td>Class 1A - Term 1 Performance Report</td>
                                <td><span class="badge bg-primary">Performance</span></td>
                                <td>Class 1A</td>
                                <td>All Subjects</td>
                                <td>Term 1</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td><span class="badge bg-success">Generated</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Report</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Report</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>ARP002</strong></td>
                                <td>Mathematics Progress Report - Class 2A</td>
                                <td><span class="badge bg-info">Progress</span></td>
                                <td>Class 2A</td>
                                <td>Mathematics</td>
                                <td>Term 1</td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td><span class="badge bg-success">Generated</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Report</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Report</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>ARP003</strong></td>
                                <td>Attendance Report - All Classes</td>
                                <td><span class="badge bg-warning">Attendance</span></td>
                                <td>All Classes</td>
                                <td>All Subjects</td>
                                <td>Term 1</td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td><span class="badge bg-success">Generated</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Report</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Report</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>ARP004</strong></td>
                                <td>Behavior Report - Class 1B</td>
                                <td><span class="badge bg-secondary">Behavior</span></td>
                                <td>Class 1B</td>
                                <td>All Subjects</td>
                                <td>Term 1</td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td><span class="badge bg-success">Generated</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Report</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Report</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>ARP005</strong></td>
                                <td>Subject-wise Analysis - Physics</td>
                                <td><span class="badge bg-purple">Subject-wise</span></td>
                                <td>All Classes</td>
                                <td>Physics</td>
                                <td>Term 1</td>
                                <td>{{ date('Y-m-d', strtotime('-4 days')) }}</td>
                                <td><span class="badge bg-success">Generated</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Report</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-envelope me-2"></i>Email Report</a></li>
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

<!-- Generate Report Modal -->
<div class="modal fade" id="generateReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Academic Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Report Configuration -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Report Configuration</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="reportName" class="form-label">Report Name *</label>
                                    <input type="text" class="form-control" id="reportName" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="reportTypeSelect" class="form-label">Report Type *</label>
                                    <select class="form-select" id="reportTypeSelect" required>
                                        <option value="">Select Type</option>
                                        <option value="performance">Performance Report</option>
                                        <option value="progress">Progress Report</option>
                                        <option value="attendance">Attendance Report</option>
                                        <option value="behavior">Behavior Report</option>
                                        <option value="subject">Subject-wise Report</option>
                                        <option value="comparative">Comparative Analysis</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="reportTemplate" class="form-label">Template</label>
                                    <select class="form-select" id="reportTemplate">
                                        <option value="standard">Standard Template</option>
                                        <option value="detailed">Detailed Template</option>
                                        <option value="summary">Summary Template</option>
                                        <option value="custom">Custom Template</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="reportClass" class="form-label">Class</label>
                                    <select class="form-select" id="reportClass">
                                        <option value="">All Classes</option>
                                        <option value="1A">Class 1A</option>
                                        <option value="1B">Class 1B</option>
                                        <option value="2A">Class 2A</option>
                                        <option value="2B">Class 2B</option>
                                        <option value="3A">Class 3A</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="reportSubject" class="form-label">Subject</label>
                                    <select class="form-select" id="reportSubject">
                                        <option value="">All Subjects</option>
                                        <option value="math">Mathematics</option>
                                        <option value="english">English</option>
                                        <option value="physics">Physics</option>
                                        <option value="chemistry">Chemistry</option>
                                        <option value="biology">Biology</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="reportTerm" class="form-label">Term</label>
                                    <select class="form-select" id="reportTerm">
                                        <option value="">All Terms</option>
                                        <option value="1">Term 1</option>
                                        <option value="2">Term 2</option>
                                        <option value="3">Term 3</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="reportYear" class="form-label">Year</label>
                                    <select class="form-select" id="reportYear">
                                        <option value="2024" selected>2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dateRange" class="form-label">Date Range</label>
                                    <select class="form-select" id="dateRange">
                                        <option value="term">Entire Term</option>
                                        <option value="month">This Month</option>
                                        <option value="quarter">This Quarter</option>
                                        <option value="year">This Year</option>
                                        <option value="custom">Custom Range</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="reportFormat" class="form-label">Output Format</label>
                                    <select class="form-select" id="reportFormat">
                                        <option value="pdf">PDF</option>
                                        <option value="excel">Excel</option>
                                        <option value="word">Word Document</option>
                                        <option value="html">HTML</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Report Content -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Report Content</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Include Sections:</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeSummary" checked>
                                            <label class="form-check-label" for="includeSummary">
                                                Executive Summary
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeStatistics" checked>
                                            <label class="form-check-label" for="includeStatistics">
                                                Statistics & Metrics
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeCharts" checked>
                                            <label class="form-check-label" for="includeCharts">
                                                Charts & Graphs
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeDetails" checked>
                                            <label class="form-check-label" for="includeDetails">
                                                Detailed Analysis
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeComparisons">
                                            <label class="form-check-label" for="includeComparisons">
                                                Comparisons
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeRecommendations">
                                            <label class="form-check-label" for="includeRecommendations">
                                                Recommendations
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeStudentList">
                                            <label class="form-check-label" for="includeStudentList">
                                                Student Lists
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeTrends">
                                            <label class="form-check-label" for="includeTrends">
                                                Trend Analysis
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeAppendix">
                                            <label class="form-check-label" for="includeAppendix">
                                                Appendix
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="additionalNotes" class="form-label">Additional Notes</label>
                                <textarea class="form-control" id="additionalNotes" rows="3" placeholder="Add any additional notes or comments..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Distribution -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Distribution Options</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Send To:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sendToTeachers">
                                        <label class="form-check-label" for="sendToTeachers">
                                            Teachers
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sendToParents">
                                        <label class="form-check-label" for="sendToParents">
                                            Parents
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sendToAdmin">
                                        <label class="form-check-label" for="sendToAdmin">
                                            Administration
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="deliveryMethod" class="form-label">Delivery Method</label>
                                    <select class="form-select" id="deliveryMethod">
                                        <option value="email">Email</option>
                                        <option value="portal">Student Portal</option>
                                        <option value="print">Print Only</option>
                                        <option value="multiple">Multiple Methods</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="customMessage" class="form-label">Custom Message (Optional)</label>
                                <textarea class="form-control" id="customMessage" rows="2" placeholder="Add a custom message for the recipients..."></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Configuration</button>
                <button type="button" class="btn btn-success">Generate Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Report Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Report Generation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scheduleType" class="form-label">Schedule Type</label>
                            <select class="form-select" id="scheduleType">
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="term">Term-end</option>
                                <option value="yearly">Year-end</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scheduleReport" class="form-label">Report Type</label>
                            <select class="form-select" id="scheduleReport">
                                <option value="performance">Performance Report</option>
                                <option value="attendance">Attendance Report</option>
                                <option value="progress">Progress Report</option>
                                <option value="comprehensive">Comprehensive Report</option>
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
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scheduleTime" class="form-label">Generation Time</label>
                            <input type="time" class="form-control" id="scheduleTime" value="09:00">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="recipients" class="form-label">Default Recipients</label>
                            <select class="form-select" id="recipients" multiple>
                                <option value="admin">Administration</option>
                                <option value="teachers">Teachers</option>
                                <option value="parents">Parents</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="scheduleNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="scheduleNotes" rows="2" placeholder="Add any notes about this scheduled report..."></textarea>
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

<!-- Templates Modal -->
<div class="modal fade" id="templatesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report Templates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="templateCategory" class="form-label">Category</label>
                    <select class="form-select" id="templateCategory">
                        <option value="">All Categories</option>
                        <option value="performance">Performance</option>
                        <option value="progress">Progress</option>
                        <option value="attendance">Attendance</option>
                        <option value="behavior">Behavior</option>
                        <option value="subject">Subject-wise</option>
                    </select>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Template Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Standard Performance Report</td>
                                <td><span class="badge bg-primary">Performance</span></td>
                                <td>Comprehensive student performance analysis with grades and remarks</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-download"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Progress Tracker Template</td>
                                <td><span class="badge bg-info">Progress</span></td>
                                <td>Track student progress over time with visual indicators</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-download"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Monthly Attendance Report</td>
                                <td><span class="badge bg-warning">Attendance</span></td>
                                <td>Detailed attendance statistics with trends and patterns</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-download"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Behavior Assessment Template</td>
                                <td><span class="badge bg-secondary">Behavior</span></td>
                                <td>Comprehensive behavior evaluation with scoring system</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-download"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Subject Analysis Template</td>
                                <td><span class="badge bg-purple">Subject-wise</span></td>
                                <td>Detailed subject performance analysis with class comparisons</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-download"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Create New Template</button>
            </div>
        </div>
    </div>
</div>
@endsection
