@extends('layouts.app')

@section('title', 'Financial Reports')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Financial Reports</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                        <i class="bx bx-file me-1"></i> Generate Report
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                        <i class="bx bx-calendar me-1"></i> Schedule Report
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#templatesModal">
                        <i class="bx bx-layer me-1"></i> Report Templates
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Report Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">24</h4>
                                        <p class="mb-0">Total Reports</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-file avatar-icon"></i>
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
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">8</h4>
                                        <p class="mb-0">Scheduled</p>
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
                                        <h4 class="mb-0">4</h4>
                                        <p class="mb-0">Pending</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-hourglass avatar-icon"></i>
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
                            <option value="income">Income Report</option>
                            <option value="expense">Expense Report</option>
                            <option value="balance">Balance Sheet</option>
                            <option value="budget">Budget Report</option>
                            <option value="audit">Audit Report</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="reportPeriod" class="form-label">Period</label>
                        <select class="form-select" id="reportPeriod">
                            <option value="">All Periods</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="reportStatus" class="form-label">Status</label>
                        <select class="form-select" id="reportStatus">
                            <option value="">All Status</option>
                            <option value="completed">Completed</option>
                            <option value="in_progress">In Progress</option>
                            <option value="pending">Pending</option>
                            <option value="scheduled">Scheduled</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="quarter">This Quarter</option>
                            <option value="year">This Year</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchReport" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchReport" placeholder="Report name...">
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
                                <th>Period</th>
                                <th>Generated Date</th>
                                <th>Status</th>
                                <th>Generated By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>FR001</strong></td>
                                <td>Monthly Income Report - January 2024</td>
                                <td><span class="badge bg-success">Income</span></td>
                                <td><span class="badge bg-primary">Monthly</span></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>Admin User</td>
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
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-refresh me-2"></i>Regenerate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FR002</strong></td>
                                <td>Quarterly Budget Analysis - Q1 2024</td>
                                <td><span class="badge bg-warning">Budget</span></td>
                                <td><span class="badge bg-info">Quarterly</span></td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>Finance Manager</td>
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
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-refresh me-2"></i>Regenerate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FR003</strong></td>
                                <td>Annual Balance Sheet - 2023</td>
                                <td><span class="badge bg-primary">Balance Sheet</span></td>
                                <td><span class="badge bg-purple">Yearly</span></td>
                                <td>{{ date('Y-m-d', strtotime('-1 week')) }}</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>Admin User</td>
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
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-refresh me-2"></i>Regenerate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FR004</strong></td>
                                <td>Weekly Expense Summary</td>
                                <td><span class="badge bg-danger">Expense</span></td>
                                <td><span class="badge bg-secondary">Weekly</span></td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td><span class="badge bg-warning">In Progress</span></td>
                                <td>Finance Manager</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Report</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit Report</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-check me-2"></i>Complete Report</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FR005</strong></td>
                                <td>Monthly Budget Utilization - February 2024</td>
                                <td><span class="badge bg-warning">Budget</span></td>
                                <td><span class="badge bg-primary">Monthly</span></td>
                                <td>{{ date('Y-m-d', strtotime('-1 week')) }}</td>
                                <td><span class="badge bg-info">Scheduled</span></td>
                                <td>System</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit Schedule</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-play me-2"></i>Generate Now</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x me-2"></i>Cancel Schedule</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>FR006</strong></td>
                                <td>Audit Trail Report - Q1 2024</td>
                                <td><span class="badge bg-dark">Audit</span></td>
                                <td><span class="badge bg-info">Quarterly</span></td>
                                <td>{{ date('Y-m-d', strtotime('-2 weeks')) }}</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-play me-2"></i>Generate Report</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Reschedule</a></li>
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
                <h5 class="modal-title">Generate Financial Report</h5>
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
                                        <option value="income">Income Statement</option>
                                        <option value="expense">Expense Report</option>
                                        <option value="balance">Balance Sheet</option>
                                        <option value="budget">Budget Analysis</option>
                                        <option value="cashflow">Cash Flow Statement</option>
                                        <option value="audit">Audit Report</option>
                                        <option value="custom">Custom Report</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="reportPeriod" class="form-label">Period *</label>
                                    <select class="form-select" id="reportPeriod" required>
                                        <option value="">Select Period</option>
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="custom">Custom Range</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="customDateRange" style="display: none;">
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
                                    <label for="reportFormat" class="form-label">Output Format</label>
                                    <select class="form-select" id="reportFormat">
                                        <option value="pdf">PDF</option>
                                        <option value="excel">Excel</option>
                                        <option value="csv">CSV</option>
                                        <option value="html">HTML</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="reportTemplate" class="form-label">Template</label>
                                    <select class="form-select" id="reportTemplate">
                                        <option value="standard">Standard Template</option>
                                        <option value="detailed">Detailed Template</option>
                                        <option value="summary">Summary Template</option>
                                        <option value="custom">Custom Template</option>
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
                                            <input class="form-check-input" type="checkbox" id="includeCharts" checked>
                                            <label class="form-check-label" for="includeCharts">
                                                Charts & Graphs
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeTables" checked>
                                            <label class="form-check-label" for="includeTables">
                                                Detailed Tables
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeTrends">
                                            <label class="form-check-label" for="includeTrends">
                                                Trend Analysis
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeComparisons">
                                            <label class="form-check-label" for="includeComparisons">
                                                Period Comparisons
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
                                            <input class="form-check-input" type="checkbox" id="includeVariance">
                                            <label class="form-check-label" for="includeVariance">
                                                Variance Analysis
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="includeForecast">
                                            <label class="form-check-label" for="includeForecast">
                                                Forecasts
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
                                        <input class="form-check-input" type="checkbox" id="sendToManagement" checked>
                                        <label class="form-check-label" for="sendToManagement">
                                            Management Team
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sendToBoard">
                                        <label class="form-check-label" for="sendToBoard">
                                            Board Members
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sendToStaff">
                                        <label class="form-check-label" for="sendToStaff">
                                            Department Heads
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="deliveryMethod" class="form-label">Delivery Method</label>
                                    <select class="form-select" id="deliveryMethod">
                                        <option value="email">Email</option>
                                        <option value="portal">Upload to Portal</option>
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
                        <div class="col-md-4 mb-3">
                            <label for="scheduleType" class="form-label">Schedule Type</label>
                            <select class="form-select" id="scheduleType">
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="scheduleReport" class="form-label">Report Type</label>
                            <select class="form-select" id="scheduleReport">
                                <option value="income">Income Report</option>
                                <option value="expense">Expense Report</option>
                                <option value="balance">Balance Sheet</option>
                                <option value="budget">Budget Analysis</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="scheduleTime" class="form-label">Generation Time</label>
                            <input type="time" class="form-control" id="scheduleTime" value="09:00">
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
                            <label for="recipients" class="form-label">Default Recipients</label>
                            <select class="form-select" id="recipients" multiple>
                                <option value="management">Management Team</option>
                                <option value="board">Board Members</option>
                                <option value="staff">Department Heads</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deliveryMethod" class="form-label">Delivery Method</label>
                            <select class="form-select" id="deliveryMethod">
                                <option value="email">Email</option>
                                <option value="portal">Upload to Portal</option>
                                <option value="both">Both</option>
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

<!-- Report Templates Modal -->
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
                        <option value="income">Income Reports</option>
                        <option value="expense">Expense Reports</option>
                        <option value="balance">Balance Sheets</option>
                        <option value="budget">Budget Reports</option>
                        <option value="audit">Audit Reports</option>
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
                                <td>Standard Income Statement</td>
                                <td><span class="badge bg-success">Income</span></td>
                                <td>Comprehensive income statement with revenue and expense breakdown</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-download"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Monthly Budget Analysis</td>
                                <td><span class="badge bg-warning">Budget</span></td>
                                <td>Detailed budget utilization analysis with variance reports</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-download"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Quarterly Balance Sheet</td>
                                <td><span class="badge bg-primary">Balance Sheet</span></td>
                                <td>Standard balance sheet format with assets, liabilities, and equity</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-download"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense Summary Report</td>
                                <td><span class="badge bg-danger">Expense</span></td>
                                <td>Comprehensive expense report by category and department</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-download"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Audit Trail Report</td>
                                <td><span class="badge bg-dark">Audit</span></td>
                                <td>Detailed audit trail with transaction history and changes</td>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const reportPeriod = document.getElementById('reportPeriod');
    const customDateRange = document.getElementById('customDateRange');
    
    if (reportPeriod && customDateRange) {
        reportPeriod.addEventListener('change', function() {
            customDateRange.style.display = this.value === 'custom' ? 'block' : 'none';
        });
    }
});
</script>
@endsection
