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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#auditModal">
                        <i class="bx bx-search me-1"></i> Audit Trail
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#budgetModal">
                        <i class="bx bx-pie-chart me-1"></i> Budget Analysis
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Financial Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">$45,678</h4>
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
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">$23,456</h4>
                                        <p class="mb-0">Total Expenses</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-credit-card avatar-icon"></i>
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
                                        <h4 class="mb-0">$22,222</h4>
                                        <p class="mb-0">Net Profit</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-trending-up avatar-icon"></i>
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
                                        <h4 class="mb-0">48.6%</h4>
                                        <p class="mb-0">Profit Margin</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-pie-chart avatar-icon"></i>
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
                            <option value="profit">Profit & Loss</option>
                            <option value="budget">Budget Report</option>
                            <option value="cashflow">Cash Flow</option>
                            <option value="balance">Balance Sheet</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="period" class="form-label">Period</label>
                        <select class="form-select" id="period">
                            <option value="">All Periods</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" id="department">
                            <option value="">All Departments</option>
                            <option value="academic">Academic</option>
                            <option value="admin">Administration</option>
                            <option value="finance">Finance</option>
                            <option value="support">Support</option>
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
                                <th>Report Type</th>
                                <th>Period</th>
                                <th>Generated Date</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>FIN001</strong></td>
                                <td><span class="badge bg-success">Income Report</span></td>
                                <td>{{ date('Y-m') }}</td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>$12,345</td>
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
                                <td><strong>FIN002</strong></td>
                                <td><span class="badge bg-warning">Expense Report</span></td>
                                <td>{{ date('Y-m') }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 day')) }}</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>$8,765</td>
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
                                <td><strong>FIN003</strong></td>
                                <td><span class="badge bg-info">Profit & Loss</span></td>
                                <td>{{ date('Y-m') }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 days')) }}</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>$3,580</td>
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
                                <td><strong>FIN004</strong></td>
                                <td><span class="badge bg-primary">Budget Report</span></td>
                                <td>{{ date('Y-m') }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime('-3 days')) }}</td>
                                <td><span class="badge bg-warning">In Progress</span></td>
                                <td>-$2,000</td>
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
                <h5 class="modal-title">Generate Financial Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportType" class="form-label">Report Type *</label>
                            <select class="form-select" id="reportType" required>
                                <option value="">Select Report Type</option>
                                <option value="income">Income Report</option>
                                <option value="expense">Expense Report</option>
                                <option value="profit">Profit & Loss Statement</option>
                                <option value="budget">Budget Report</option>
                                <option value="cashflow">Cash Flow Statement</option>
                                <option value="balance">Balance Sheet</option>
                                <option value="custom">Custom Report</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="period" class="form-label">Period *</label>
                            <select class="form-select" id="period" required>
                                <option value="">Select Period</option>
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="yearly">Yearly</option>
                                <option value="custom">Custom Period</option>
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
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="department">
                                <option value="">All Departments</option>
                                <option value="academic">Academic</option>
                                <option value="admin">Administration</option>
                                <option value="finance">Finance</option>
                                <option value="support">Support</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="accountType" class="form-label">Account Type</label>
                            <select class="form-select" id="accountType">
                                <option value="">All Account Types</option>
                                <option value="tuition">Tuition Fees</option>
                                <option value="admission">Admission Fees</option>
                                <option value="stationery">Stationery</option>
                                <option value="salary">Salaries</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
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
                                <input class="form-check-input" type="checkbox" id="includeDetails" checked>
                                <label class="form-check-label" for="includeDetails">
                                    Detailed Transactions
                                </label>
                            </div>
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
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="comparison" class="form-label">Comparison Options</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="compareBudget">
                                <label class="form-check-label" for="compareBudget">
                                    Compare with Budget
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="comparePrevious">
                                <label class="form-check-label" for="comparePrevious">
                                    Compare with Previous Period
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="compareYear">
                                <label class="form-check-label" for="compareYear">
                                    Compare with Previous Year
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
                <h5 class="modal-title">Financial Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6>Report Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Report ID:</strong></td>
                                <td>FIN001</td>
                            </tr>
                            <tr>
                                <td><strong>Report Type:</strong></td>
                                <td><span class="badge bg-success">Income Report</span></td>
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
                        <h6>Financial Summary</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Total Income:</strong></td>
                                <td>$12,345.00</td>
                            </tr>
                            <tr>
                                <td><strong>Total Expenses:</strong></td>
                                <td>$8,765.00</td>
                            </tr>
                            <tr>
                                <td><strong>Net Profit:</strong></td>
                                <td>$3,580.00</td>
                            </tr>
                            <tr>
                                <td><strong>Profit Margin:</strong></td>
                                <td>29.0%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Income Breakdown</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Percentage</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tuition Fees</td>
                                        <td>$8,500.00</td>
                                        <td>68.9%</td>
                                        <td>234</td>
                                    </tr>
                                    <tr>
                                        <td>Admission Fees</td>
                                        <td>$2,000.00</td>
                                        <td>16.2%</td>
                                        <td>45</td>
                                    </tr>
                                    <tr>
                                        <td>Stationery Sales</td>
                                        <td>$1,200.00</td>
                                        <td>9.7%</td>
                                        <td>156</td>
                                    </tr>
                                    <tr>
                                        <td>Other Income</td>
                                        <td>$645.00</td>
                                        <td>5.2%</td>
                                        <td>23</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Expense Breakdown</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Percentage</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Salaries</td>
                                        <td>$4,500.00</td>
                                        <td>51.3%</td>
                                        <td>45</td>
                                    </tr>
                                    <tr>
                                        <td>Maintenance</td>
                                        <td>$2,000.00</td>
                                        <td>22.8%</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>Utilities</td>
                                        <td>$1,200.00</td>
                                        <td>13.7%</td>
                                        <td>8</td>
                                    </tr>
                                    <tr>
                                        <td>Other Expenses</td>
                                        <td>$1,065.00</td>
                                        <td>12.2%</td>
                                        <td>23</td>
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
                                <h6 class="mb-0">Monthly Trend</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="trendChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Income vs Expenses</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="comparisonChart" width="400" height="200"></canvas>
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

<!-- Audit Trail Modal -->
<div class="modal fade" id="auditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Audit Trail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="auditType" class="form-label">Transaction Type</label>
                        <select class="form-select" id="auditType">
                            <option value="all">All Transactions</option>
                            <option value="income">Income</option>
                            <option value="expense">Expense</option>
                            <option value="transfer">Transfer</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="auditDate" class="form-label">Date Range</label>
                        <select class="form-select" id="auditDate">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="auditUser" class="form-label">User</label>
                        <select class="form-select" id="auditUser">
                            <option value="all">All Users</option>
                            <option value="admin">Admin User</option>
                            <option value="finance">Finance User</option>
                        </select>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                                <th>Action</th>
                                <th>Amount</th>
                                <th>Account</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('Y-m-d H:i') }}</td>
                                <td>Admin User</td>
                                <td><span class="badge bg-success">Income</span></td>
                                <td>$150.00</td>
                                <td>Tuition Fees</td>
                                <td>192.168.1.100</td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 hours')) }}</td>
                                <td>Finance User</td>
                                <td><span class="badge bg-warning">Expense</span></td>
                                <td>$75.00</td>
                                <td>Stationery</td>
                                <td>192.168.1.101</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Export Audit Trail</button>
            </div>
        </div>
    </div>
</div>

<!-- Budget Analysis Modal -->
<div class="modal fade" id="budgetModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Budget Analysis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="budgetPeriod" class="form-label">Budget Period</label>
                        <select class="form-select" id="budgetPeriod">
                            <option value="month">Monthly</option>
                            <option value="quarter">Quarterly</option>
                            <option value="year">Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="budgetDepartment" class="form-label">Department</label>
                        <select class="form-select" id="budgetDepartment">
                            <option value="all">All Departments</option>
                            <option value="academic">Academic</option>
                            <option value="admin">Administration</option>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="text-center">
                            <h4 class="text-primary">$25,000</h4>
                            <small class="text-muted">Total Budget</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <h4 class="text-success">$18,500</h4>
                            <small class="text-muted">Spent</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <h4 class="text-info">$6,500</h4>
                            <small class="text-muted">Remaining</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <h4 class="text-warning">74%</h4>
                            <small class="text-muted">Utilization</small>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Budget vs Actual</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="budgetChart" width="800" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Generate Budget Report</button>
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
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeSummary" checked>
                            <label class="form-check-label" for="includeSummary">
                                Include summary
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
                                <option value="FIN001">FIN001 - Income Report ({{ date('Y-m') }})</option>
                                <option value="FIN002">FIN002 - Expense Report ({{ date('Y-m') }})</option>
                                <option value="FIN003">FIN003 - Profit & Loss ({{ date('Y-m') }})</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="report2" class="form-label">Select Report 2</label>
                            <select class="form-select" id="report2">
                                <option value="">Select Report</option>
                                <option value="FIN001">FIN001 - Income Report ({{ date('Y-m') }})</option>
                                <option value="FIN002">FIN002 - Expense Report ({{ date('Y-m') }})</option>
                                <option value="FIN003">FIN003 - Profit & Loss ({{ date('Y-m') }})</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="comparisonType" class="form-label">Comparison Type</label>
                        <select class="form-select" id="comparisonType">
                            <option value="side-by-side">Side by Side</option>
                            <option value="variance">Variance Analysis</option>
                            <option value="trend">Trend Analysis</option>
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
                                        <th>Variance</th>
                                        <th>% Change</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Total Income</td>
                                        <td>$12,345.00</td>
                                        <td>$11,200.00</td>
                                        <td>$1,145.00</td>
                                        <td class="text-success">+10.2%</td>
                                    </tr>
                                    <tr>
                                        <td>Total Expenses</td>
                                        <td>$8,765.00</td>
                                        <td>$9,100.00</td>
                                        <td>-$335.00</td>
                                        <td class="text-danger">-3.7%</td>
                                    </tr>
                                    <tr>
                                        <td>Net Profit</td>
                                        <td>$3,580.00</td>
                                        <td>$2,100.00</td>
                                        <td>$1,480.00</td>
                                        <td class="text-success">+70.5%</td>
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

<script>
function generateReport() {
    const reportType = document.getElementById('reportType').value;
    const period = document.getElementById('period').value;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    
    if (!reportType || !period || !startDate || !endDate) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert('Financial report generated successfully!');
    document.getElementById('generateReportModal').querySelector('.btn-close').click();
}

function printReport() {
    window.print();
}

function downloadReport() {
    alert('Downloading financial report...');
}

// Initialize charts when modal is shown
document.getElementById('viewReportModal').addEventListener('shown.bs.modal', function () {
    // Trend Chart
    const trendCtx = document.getElementById('trendChart').getContext('2d');
    new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Income',
                data: [10000, 11000, 10500, 12000, 11500, 12345],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
            }, {
                label: 'Expenses',
                data: [8000, 8500, 8200, 9000, 8800, 8765],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    // Comparison Chart
    const comparisonCtx = document.getElementById('comparisonChart').getContext('2d');
    new Chart(comparisonCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Income',
                data: [10000, 11000, 10500, 12000, 11500, 12345],
                backgroundColor: 'rgba(75, 192, 192, 0.8)'
            }, {
                label: 'Expenses',
                data: [8000, 8500, 8200, 9000, 8800, 8765],
                backgroundColor: 'rgba(255, 99, 132, 0.8)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

// Budget Chart
document.getElementById('budgetModal').addEventListener('shown.bs.modal', function () {
    const budgetCtx = document.getElementById('budgetChart').getContext('2d');
    new Chart(budgetCtx, {
        type: 'bar',
        data: {
            labels: ['Salaries', 'Maintenance', 'Utilities', 'Supplies', 'Marketing', 'Other'],
            datasets: [{
                label: 'Budget',
                data: [15000, 5000, 2000, 1500, 1000, 500],
                backgroundColor: 'rgba(54, 162, 235, 0.8)'
            }, {
                label: 'Actual',
                data: [14500, 4800, 1800, 1400, 900, 600],
                backgroundColor: 'rgba(255, 99, 132, 0.8)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection
