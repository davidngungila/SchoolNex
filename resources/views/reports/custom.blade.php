@extends('layouts.app')

@section('title', 'Custom Reports')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Custom Reports</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createReportModal">
                        <i class="bx bx-plus me-1"></i> Create Report
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#templateModal">
                        <i class="bx bx-layer me-1"></i> Templates
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                        <i class="bx bx-calendar me-1"></i> Schedule Reports
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Custom Reports Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">28</h4>
                                        <p class="mb-0">Custom Reports</p>
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
                                        <h4 class="mb-0">15</h4>
                                        <p class="mb-0">Templates</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-layer avatar-icon"></i>
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
                                        <h4 class="mb-0">156</h4>
                                        <p class="mb-0">Total Generated</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-chart avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="categoryFilter" class="form-label">Category</label>
                        <select class="form-select" id="categoryFilter">
                            <option value="">All Categories</option>
                            <option value="academic">Academic</option>
                            <option value="administrative">Administrative</option>
                            <option value="financial">Financial</option>
                            <option value="operational">Operational</option>
                            <option value="compliance">Compliance</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="draft">Draft</option>
                            <option value="active">Active</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="frequencyFilter" class="form-label">Frequency</label>
                        <select class="form-select" id="frequencyFilter">
                            <option value="">All Frequencies</option>
                            <option value="once">Once</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
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
                                <th>
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>Report Name</th>
                                <th>Category</th>
                                <th>Data Sources</th>
                                <th>Frequency</th>
                                <th>Last Run</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="reportSelect[]" value="RPT001"></td>
                                <td><strong>Monthly Performance Summary</strong></td>
                                <td><span class="badge bg-primary">Academic</span></td>
                                <td>Students, Teachers, Exams</td>
                                <td><span class="badge bg-warning">Monthly</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 day')) }}</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#runReportModal"><i class="bx bx-play me-2"></i>Run Now</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editReportModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#scheduleModal"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exportModal"><i class="bx bx-download me-2"></i>Export</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Archive</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="reportSelect[]" value="RPT002"></td>
                                <td><strong>Financial Health Dashboard</strong></td>
                                <td><span class="badge bg-success">Financial</span></td>
                                <td>Income, Expenses, Budget</td>
                                <td><span class="badge bg-info">Weekly</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 days')) }}</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#runReportModal"><i class="bx bx-play me-2"></i>Run Now</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editReportModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#scheduleModal"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exportModal"><i class="bx bx-download me-2"></i>Export</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Archive</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="reportSelect[]" value="RPT003"></td>
                                <td><strong>Attendance Analytics</strong></td>
                                <td><span class="badge bg-primary">Academic</span></td>
                                <td>Attendance, Students, Classes</td>
                                <td><span class="badge bg-warning">Monthly</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-3 days')) }}</td>
                                <td><span class="badge bg-warning">Scheduled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#runReportModal"><i class="bx bx-play me-2"></i>Run Now</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editReportModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#scheduleModal"><i class="bx bx-calendar me-2"></i>Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exportModal"><i class="bx bx-download me-2"></i>Export</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-check me-2"></i>Activate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="reportSelect[]" value="RPT004"></td>
                                <td><strong>Staff Performance Review</strong></td>
                                <td><span class="badge bg-secondary">Administrative</span></td>
                                <td>Teachers, Performance, Feedback</td>
                                <td><span class="badge bg-purple">Quarterly</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 week')) }}</td>
                                <td><span class="badge bg-info">Draft</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#runReportModal"><i class="bx bx-play me-2"></i>Run Now</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editReportModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#scheduleModal"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exportModal"><i class="bx bx-download me-2"></i>Export</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-check me-2"></i>Activate</a></li>
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
                            <button type="button" class="btn btn-outline-primary" onclick="bulkRun()">
                                <i class="bx bx-play me-1"></i> Run Selected
                            </button>
                            <button type="button" class="btn btn-outline-success" onclick="bulkSchedule()">
                                <i class="bx bx-calendar me-1"></i> Schedule Selected
                            </button>
                            <button type="button" class="btn btn-outline-info" onclick="bulkExport()">
                                <i class="bx bx-download me-1"></i> Export Selected
                            </button>
                            <button type="button" class="btn btn-outline-warning" onclick="bulkArchive()">
                                <i class="bx bx-pause me-1"></i> Archive Selected
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

<!-- Create Report Modal -->
<div class="modal fade" id="createReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Custom Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Basic Information -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportName" class="form-label">Report Name *</label>
                            <input type="text" class="form-control" id="reportName" placeholder="Enter report name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reportCategory" class="form-label">Category *</label>
                            <select class="form-select" id="reportCategory" required>
                                <option value="">Select Category</option>
                                <option value="academic">Academic</option>
                                <option value="administrative">Administrative</option>
                                <option value="financial">Financial</option>
                                <option value="operational">Operational</option>
                                <option value="compliance">Compliance</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="reportDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="reportDescription" rows="2" placeholder="Enter report description"></textarea>
                        </div>
                    </div>
                    
                    <!-- Data Sources -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Data Sources</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Available Data Sources</h6>
                                    <div class="list-group">
                                        <div class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="students" value="students">
                                                <label class="form-check-label" for="students">
                                                    <strong>Students</strong> - Student records, performance, attendance
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="teachers" value="teachers">
                                                <label class="form-check-label" for="teachers">
                                                    <strong>Teachers</strong> - Teacher records, performance, evaluations
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="exams" value="exams">
                                                <label class="form-check-label" for="exams">
                                                    <strong>Exams</strong> - Exam results, schedules, analytics
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="finance" value="finance">
                                                <label class="form-check-label" for="finance">
                                                    <strong>Finance</strong> - Income, expenses, budgets
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="attendance" value="attendance">
                                                <label class="form-check-label" for="attendance">
                                                    <strong>Attendance</strong> - Student and staff attendance records
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6>Selected Data Sources</h6>
                                    <div class="list-group" id="selectedSources">
                                        <div class="text-muted text-center py-3">
                                            No data sources selected
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Report Configuration -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Report Configuration</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="reportType" class="form-label">Report Type</label>
                                    <select class="form-select" id="reportType">
                                        <option value="summary">Summary Report</option>
                                        <option value="detailed">Detailed Report</option>
                                        <option value="analytical">Analytical Report</option>
                                        <option value="dashboard">Dashboard</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="outputFormat" class="form-label">Output Format</label>
                                    <select class="form-select" id="outputFormat">
                                        <option value="table">Table</option>
                                        <option value="chart">Charts</option>
                                        <option value="both">Table & Charts</option>
                                        <option value="custom">Custom Layout</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="grouping" class="form-label">Grouping</label>
                                    <select class="form-select" id="grouping">
                                        <option value="none">No Grouping</option>
                                        <option value="class">By Class</option>
                                        <option value="department">By Department</option>
                                        <option value="date">By Date</option>
                                        <option value="custom">Custom Grouping</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sorting" class="form-label">Sorting</label>
                                    <select class="form-select" id="sorting">
                                        <option value="name">By Name</option>
                                        <option value="date">By Date</option>
                                        <option value="value">By Value</option>
                                        <option value="custom">Custom Sorting</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="aggregation" class="form-label">Aggregation</label>
                                    <select class="form-select" id="aggregation">
                                        <option value="none">No Aggregation</option>
                                        <option value="sum">Sum</option>
                                        <option value="average">Average</option>
                                        <option value="count">Count</option>
                                        <option value="min">Minimum</option>
                                        <option value="max">Maximum</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="filters" class="form-label">Filters</label>
                                    <select class="form-select" id="filters" multiple>
                                        <option value="date_range">Date Range Filter</option>
                                        <option value="status">Status Filter</option>
                                        <option value="category">Category Filter</option>
                                        <option value="custom">Custom Filter</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Scheduling -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Scheduling</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="frequency" class="form-label">Frequency</label>
                                    <select class="form-select" id="frequency">
                                        <option value="once">Run Once</option>
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="custom">Custom Schedule</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="scheduleTime" class="form-label">Schedule Time</label>
                                    <input type="time" class="form-control" id="scheduleTime">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="recipients" class="form-label">Email Recipients</label>
                                    <input type="text" class="form-control" id="recipients" placeholder="Enter email addresses separated by commas">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="deliveryMethod" class="form-label">Delivery Method</label>
                                    <select class="form-select" id="deliveryMethod">
                                        <option value="download">Download Only</option>
                                        <option value="email">Email Only</option>
                                        <option value="both">Download & Email</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Advanced Options -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Advanced Options</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="includeCharts">
                                        <label class="form-check-label" for="includeCharts">
                                            Include Charts and Graphs
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="includeSummary">
                                        <label class="form-check-label" for="includeSummary">
                                            Include Executive Summary
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="includeRawData">
                                        <label class="form-check-label" for="includeRawData">
                                            Include Raw Data
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="enableDrillDown">
                                        <label class="form-check-label" for="enableDrillDown">
                                            Enable Drill-Down Functionality
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="enableExport">
                                        <label class="form-check-label" for="enableExport">
                                            Enable Export Options
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="enableSharing">
                                        <label class="form-check-label" for="enableSharing">
                                            Enable Report Sharing
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveDraft()">Save Draft</button>
                <button type="button" class="btn btn-success" onclick="createReport()">Create Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Run Report Modal -->
<div class="modal fade" id="runReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Run Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="reportInfo" class="form-label">Report</label>
                        <input type="text" class="form-control" id="reportInfo" value="Monthly Performance Summary" readonly>
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
                        <label for="outputFormat" class="form-label">Output Format</label>
                        <select class="form-select" id="outputFormat">
                            <option value="pdf">PDF</option>
                            <option value="excel">Excel</option>
                            <option value="html">HTML</option>
                            <option value="json">JSON</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sendEmail">
                            <label class="form-check-label" for="sendEmail">
                                Send report via email
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="saveHistory">
                            <label class="form-check-label" for="saveHistory">
                                Save to report history
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="runReport()">Run Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Report Modal -->
<div class="modal fade" id="editReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Custom Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editReportName" class="form-label">Report Name *</label>
                            <input type="text" class="form-control" id="editReportName" value="Monthly Performance Summary" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editReportCategory" class="form-label">Category *</label>
                            <select class="form-select" id="editReportCategory" required>
                                <option value="academic" selected>Academic</option>
                                <option value="administrative">Administrative</option>
                                <option value="financial">Financial</option>
                                <option value="operational">Operational</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editReportDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editReportDescription" rows="2">Comprehensive monthly performance summary including student and teacher metrics</textarea>
                    </div>
                    
                    <!-- Data Sources -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Data Sources</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Available Data Sources</h6>
                                    <div class="list-group">
                                        <div class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="editStudents" value="students" checked>
                                                <label class="form-check-label" for="editStudents">
                                                    <strong>Students</strong> - Student records, performance, attendance
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="editTeachers" value="teachers" checked>
                                                <label class="form-check-label" for="editTeachers">
                                                    <strong>Teachers</strong> - Teacher records, performance, evaluations
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="editExams" value="exams" checked>
                                                <label class="form-check-label" for="editExams">
                                                    <strong>Exams</strong> - Exam results, schedules, analytics
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6>Selected Data Sources</h6>
                                    <div class="list-group">
                                        <div class="list-group-item">
                                            <span class="badge bg-primary">Students</span>
                                        </div>
                                        <div class="list-group-item">
                                            <span class="badge bg-primary">Teachers</span>
                                        </div>
                                        <div class="list-group-item">
                                            <span class="badge bg-primary">Exams</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateReport()">Update Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Template Modal -->
<div class="modal fade" id="templateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report Templates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Template Name</th>
                                <th>Category</th>
                                <th>Data Sources</th>
                                <th>Frequency</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Monthly Academic Summary</strong></td>
                                <td><span class="badge bg-primary">Academic</span></td>
                                <td>Students, Teachers, Exams</td>
                                <td><span class="badge bg-warning">Monthly</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('academic_summary')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Financial Dashboard</strong></td>
                                <td><span class="badge bg-success">Financial</span></td>
                                <td>Income, Expenses, Budget</td>
                                <td><span class="badge bg-info">Weekly</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('financial_dashboard')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Attendance Analytics</strong></td>
                                <td><span class="badge bg-primary">Academic</span></td>
                                <td>Attendance, Students, Classes</td>
                                <td><span class="badge bg-warning">Monthly</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('attendance_analytics')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTemplateModal">Create Template</button>
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
                        <label for="scheduleReport" class="form-label">Report</label>
                        <input type="text" class="form-control" id="scheduleReport" value="Monthly Performance Summary" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="scheduleFrequency" class="form-label">Frequency</label>
                        <select class="form-select" id="scheduleFrequency">
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly" selected>Monthly</option>
                            <option value="quarterly">Quarterly</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="scheduleTime" class="form-label">Schedule Time</label>
                        <input type="time" class="form-control" id="scheduleTime" value="09:00">
                    </div>
                    <div class="mb-3">
                        <label for="scheduleRecipients" class="form-label">Email Recipients</label>
                        <input type="text" class="form-control" id="scheduleRecipients" placeholder="Enter email addresses separated by commas">
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

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Report Configuration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportFormat" class="form-label">Export Format</label>
                        <select class="form-select" id="exportFormat">
                            <option value="json">JSON</option>
                            <option value="xml">XML</option>
                            <option value="yaml">YAML</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeData" checked>
                            <label class="form-check-label" for="includeData">
                                Include data sources configuration
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeSchedule" checked>
                            <label class="form-check-label" for="includeSchedule">
                                Include scheduling information
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeHistory">
                            <label class="form-check-label" for="includeHistory">
                                Include execution history
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Export Configuration</button>
            </div>
        </div>
    </div>
</div>

<!-- Duplicate Modal -->
<div class="modal fade" id="duplicateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Duplicate Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="originalReport" class="form-label">Original Report</label>
                        <input type="text" class="form-control" id="originalReport" value="Monthly Performance Summary" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="newReportName" class="form-label">New Report Name *</label>
                        <input type="text" class="form-control" id="newReportName" placeholder="Enter new report name" required>
                    </div>
                    <div class="mb-3">
                        <label for="copyOptions" class="form-label">Copy Options</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="copyDataSources" checked>
                            <label class="form-check-label" for="copyDataSources">
                                Copy data sources
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="copyConfiguration" checked>
                            <label class="form-check-label" for="copyConfiguration">
                                Copy configuration
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="copySchedule">
                            <label class="form-check-label" for="copySchedule">
                                Copy scheduling
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Duplicate Report</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="reportSelect[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

// Handle data source selection
document.querySelectorAll('input[type="checkbox"][id$="students"], input[type="checkbox"][id$="teachers"], input[type="checkbox"][id$="exams"], input[type="checkbox"][id$="finance"], input[type="checkbox"][id$="attendance"]').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        updateSelectedSources();
    });
});

function updateSelectedSources() {
    const selectedSources = [];
    const sources = [
        { id: 'students', name: 'Students' },
        { id: 'teachers', name: 'Teachers' },
        { id: 'exams', name: 'Exams' },
        { id: 'finance', name: 'Finance' },
        { id: 'attendance', name: 'Attendance' }
    ];
    
    sources.forEach(source => {
        const checkbox = document.getElementById(source.id);
        if (checkbox && checkbox.checked) {
            selectedSources.push(source.name);
        }
    });
    
    const selectedSourcesDiv = document.getElementById('selectedSources');
    if (selectedSources.length > 0) {
        selectedSourcesDiv.innerHTML = selectedSources.map(source => 
            `<div class="list-group-item"><span class="badge bg-primary">${source}</span></div>`
        ).join('');
    } else {
        selectedSourcesDiv.innerHTML = '<div class="text-muted text-center py-3">No data sources selected</div>';
    }
}

function createReport() {
    const reportName = document.getElementById('reportName').value;
    const reportCategory = document.getElementById('reportCategory').value;
    
    if (!reportName || !reportCategory) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert('Custom report created successfully!');
    document.getElementById('createReportModal').querySelector('.btn-close').click();
}

function saveDraft() {
    alert('Report draft saved successfully!');
}

function runReport() {
    alert('Report is running... You will be notified when it\'s complete.');
    document.getElementById('runReportModal').querySelector('.btn-close').click();
}

function updateReport() {
    alert('Report updated successfully!');
    document.getElementById('editReportModal').querySelector('.btn-close').click();
}

function useTemplate(templateId) {
    alert('Template "' + templateId + '" loaded successfully!');
    document.getElementById('templateModal').querySelector('.btn-close').click();
    document.getElementById('createReportModal').click();
}

function bulkRun() {
    const selected = document.querySelectorAll('input[name="reportSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select reports to run');
        return;
    }
    alert('Running ' + selected.length + ' reports');
}

function bulkSchedule() {
    const selected = document.querySelectorAll('input[name="reportSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select reports to schedule');
        return;
    }
    alert('Scheduling ' + selected.length + ' reports');
}

function bulkExport() {
    const selected = document.querySelectorAll('input[name="reportSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select reports to export');
        return;
    }
    alert('Exporting ' + selected.length + ' reports');
}

function bulkArchive() {
    const selected = document.querySelectorAll('input[name="reportSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select reports to archive');
        return;
    }
    if (confirm('Are you sure you want to archive ' + selected.length + ' reports?')) {
        alert('Archived ' + selected.length + ' reports');
    }
}

function deleteSelected() {
    const selected = document.querySelectorAll('input[name="reportSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select reports to delete');
        return;
    }
    if (confirm('Are you sure you want to delete ' + selected.length + ' reports?')) {
        alert('Deleted ' + selected.length + ' reports');
    }
}
</script>
@endsection
