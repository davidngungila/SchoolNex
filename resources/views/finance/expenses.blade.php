@extends('layouts.app')

@section('title', 'Expense Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Expense Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addExpenseModal">
                        <i class="bx bx-plus me-1"></i> Add Expense
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#budgetModal">
                        <i class="bx bx-chart me-1"></i> Budget Analysis
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Expense Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Expense Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">$28,750</h4>
                                        <p class="mb-0">Total Expenses</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-money avatar-icon"></i>
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
                                        <h4 class="mb-0">$35,000</h4>
                                        <p class="mb-0">Budget Limit</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-target avatar-icon"></i>
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
                                        <h4 class="mb-0">82%</h4>
                                        <p class="mb-0">Budget Used</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-pie-chart avatar-icon"></i>
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
                                        <h4 class="mb-0">$6,250</h4>
                                        <p class="mb-0">Remaining</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-wallet avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="expenseCategory" class="form-label">Category</label>
                        <select class="form-select" id="expenseCategory">
                            <option value="">All Categories</option>
                            <option value="salaries">Salaries</option>
                            <option value="supplies">Supplies</option>
                            <option value="utilities">Utilities</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="equipment">Equipment</option>
                            <option value="transport">Transport</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="expenseStatus" class="form-label">Status</label>
                        <select class="form-select" id="expenseStatus">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-select" id="priority">
                            <option value="">All Priorities</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
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
                        <label for="searchExpense" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchExpense" placeholder="Description, vendor...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Expenses Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Expense ID</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Requested By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>EXP001</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>Monthly Teacher Salaries</td>
                                <td><span class="badge bg-warning">Salaries</span></td>
                                <td>$12,500.00</td>
                                <td><span class="badge bg-danger">High</span></td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-check me-2"></i>Approve</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Process Payment</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>EXP002</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td>Office Supplies - Stationery</td>
                                <td><span class="badge bg-info">Supplies</span></td>
                                <td>$850.00</td>
                                <td><span class="badge bg-primary">Medium</span></td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td>Office Manager</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-check me-2"></i>Approve</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Process Payment</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>EXP003</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td>Electricity Bill - Monthly</td>
                                <td><span class="badge bg-secondary">Utilities</span></td>
                                <td>$1,200.00</td>
                                <td><span class="badge bg-danger">High</span></td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Admin User</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-receipt me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>EXP004</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td>Science Lab Equipment</td>
                                <td><span class="badge bg-purple">Equipment</span></td>
                                <td>$3,500.00</td>
                                <td><span class="badge bg-primary">Medium</span></td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>Science Teacher</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-check me-2"></i>Approve</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-x me-2"></i>Reject</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>EXP005</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-4 days')) }}</td>
                                <td>School Bus Maintenance</td>
                                <td><span class="badge bg-success">Transport</span></td>
                                <td>$2,800.00</td>
                                <td><span class="badge bg-primary">Medium</span></td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td>Transport Manager</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-check me-2"></i>Approve</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Process Payment</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>EXP006</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-5 days')) }}</td>
                                <td>Building Repairs - Roof</td>
                                <td><span class="badge bg-dark">Maintenance</span></td>
                                <td>$5,200.00</td>
                                <td><span class="badge bg-danger">High</span></td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Maintenance Manager</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-receipt me-2"></i>View Receipt</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download</a></li>
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

<!-- Add Expense Modal -->
<div class="modal fade" id="addExpenseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Basic Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Basic Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="expenseTitle" class="form-label">Expense Title *</label>
                                    <input type="text" class="form-control" id="expenseTitle" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="expenseCategory" class="form-label">Category *</label>
                                    <select class="form-select" id="expenseCategory" required>
                                        <option value="">Select Category</option>
                                        <option value="salaries">Salaries</option>
                                        <option value="supplies">Supplies</option>
                                        <option value="utilities">Utilities</option>
                                        <option value="maintenance">Maintenance</option>
                                        <option value="equipment">Equipment</option>
                                        <option value="transport">Transport</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="expensePriority" class="form-label">Priority *</label>
                                    <select class="form-select" id="expensePriority" required>
                                        <option value="">Select Priority</option>
                                        <option value="high">High</option>
                                        <option value="medium">Medium</option>
                                        <option value="low">Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="expenseAmount" class="form-label">Amount *</label>
                                    <input type="number" class="form-control" id="expenseAmount" min="0" step="0.01" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="expenseDate" class="form-label">Date *</label>
                                    <input type="date" class="form-control" id="expenseDate" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="requestedBy" class="form-label">Requested By</label>
                                    <input type="text" class="form-control" id="requestedBy" value="{{ Auth::user()->name ?? 'Admin User' }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="expenseDescription" class="form-label">Description *</label>
                                <textarea class="form-control" id="expenseDescription" rows="3" required placeholder="Enter detailed description of the expense..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Vendor Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Vendor Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="vendorName" class="form-label">Vendor Name</label>
                                    <input type="text" class="form-control" id="vendorName" placeholder="Optional">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="vendorEmail" class="form-label">Vendor Email</label>
                                    <input type="email" class="form-control" id="vendorEmail" placeholder="Optional">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="vendorPhone" class="form-label">Vendor Phone</label>
                                    <input type="tel" class="form-control" id="vendorPhone" placeholder="Optional">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Details -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Payment Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="paymentMethod" class="form-label">Payment Method</label>
                                    <select class="form-select" id="paymentMethod">
                                        <option value="">Select Method</option>
                                        <option value="cash">Cash</option>
                                        <option value="bank">Bank Transfer</option>
                                        <option value="check">Check</option>
                                        <option value="card">Credit/Debit Card</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="paymentDue" class="form-label">Payment Due Date</label>
                                    <input type="date" class="form-control" id="paymentDue">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="reference" class="form-label">Reference Number</label>
                                    <input type="text" class="form-control" id="reference" placeholder="Optional">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Attachments -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Attachments</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="receiptFile" class="form-label">Receipt/Invoice</label>
                                <input type="file" class="form-control" id="receiptFile" accept=".pdf,.jpg,.jpeg,.png">
                                <small class="text-muted">Upload receipt or invoice document</small>
                            </div>
                            <div class="mb-3">
                                <label for="additionalFiles" class="form-label">Additional Documents</label>
                                <input type="file" class="form-control" id="additionalFiles" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                <small class="text-muted">Upload supporting documents</small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save as Draft</button>
                <button type="button" class="btn btn-success">Submit for Approval</button>
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
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="budgetCategory" class="form-label">Category</label>
                        <select class="form-select" id="budgetCategory">
                            <option value="">All Categories</option>
                            <option value="salaries">Salaries</option>
                            <option value="supplies">Supplies</option>
                            <option value="utilities">Utilities</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Budget</th>
                                <th>Spent</th>
                                <th>Remaining</th>
                                <th>Percentage</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Salaries</td>
                                <td>$15,000</td>
                                <td>$12,500</td>
                                <td>$2,500</td>
                                <td>83%</td>
                                <td><span class="badge bg-warning">Warning</span></td>
                            </tr>
                            <tr>
                                <td>Supplies</td>
                                <td>$5,000</td>
                                <td>$3,200</td>
                                <td>$1,800</td>
                                <td>64%</td>
                                <td><span class="badge bg-success">On Track</span></td>
                            </tr>
                            <tr>
                                <td>Utilities</td>
                                <td>$3,000</td>
                                <td>$2,800</td>
                                <td>$200</td>
                                <td>93%</td>
                                <td><span class="badge bg-danger">Critical</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Export Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Expense Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Expense Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Expense Summary</option>
                        <option value="detailed">Detailed Report</option>
                        <option value="category">Category Analysis</option>
                        <option value="vendor">Vendor Report</option>
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
@endsection
