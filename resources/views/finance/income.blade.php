@extends('layouts.app')

@section('title', 'Income Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Income Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addIncomeModal">
                        <i class="bx bx-plus me-1"></i> Add Income
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#forecastModal">
                        <i class="bx bx-chart me-1"></i> Income Forecast
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Income Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Income Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">$45,250</h4>
                                        <p class="mb-0">Total Income</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-trending-up avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">$52,000</h4>
                                        <p class="mb-0">Target Income</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-target avatar-icon"></i>
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
                                        <h4 class="mb-0">87%</h4>
                                        <p class="mb-0">Target Achieved</p>
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
                                        <h4 class="mb-0">$6,750</h4>
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
                        <label for="incomeCategory" class="form-label">Category</label>
                        <select class="form-select" id="incomeCategory">
                            <option value="">All Categories</option>
                            <option value="fees">School Fees</option>
                            <option value="donation">Donations</option>
                            <option value="sponsorship">Sponsorships</option>
                            <option value="rental">Rental Income</option>
                            <option value="other">Other Income</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="incomeStatus" class="form-label">Status</label>
                        <select class="form-select" id="incomeStatus">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="received">Received</option>
                            <option value="overdue">Overdue</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <select class="form-select" id="paymentMethod">
                            <option value="">All Methods</option>
                            <option value="cash">Cash</option>
                            <option value="bank">Bank Transfer</option>
                            <option value="mobile">Mobile Money</option>
                            <option value="check">Check</option>
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
                        <label for="searchIncome" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchIncome" placeholder="Description, source...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Income Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Income ID</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Source</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>INC001</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>School Fees - Class 1A Students</td>
                                <td><span class="badge bg-success">Fees</span></td>
                                <td class="text-success">+$15,750.00</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Received</span></td>
                                <td>35 Students</td>
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
                                <td><strong>INC002</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td>Donation - Parent Association</td>
                                <td><span class="badge bg-purple">Donation</span></td>
                                <td class="text-success">+$5,000.00</td>
                                <td><span class="badge bg-warning">Mobile Money</span></td>
                                <td><span class="badge bg-success">Received</span></td>
                                <td>Parents Association</td>
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
                                <td><strong>INC003</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td>Sponsorship - Local Business</td>
                                <td><span class="badge bg-info">Sponsorship</span></td>
                                <td class="text-success">+$10,000.00</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Received</span></td>
                                <td>Tech Solutions Ltd</td>
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
                                <td><strong>INC004</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td>Rental Income - Hall Rental</td>
                                <td><span class="badge bg-warning">Rental</span></td>
                                <td class="text-success">+$2,500.00</td>
                                <td><span class="badge bg-success">Cash</span></td>
                                <td><span class="badge bg-success">Received</span></td>
                                <td>Community Event</td>
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
                                <td><strong>INC005</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-4 days')) }}</td>
                                <td>Registration Fees - New Students</td>
                                <td><span class="badge bg-success">Fees</span></td>
                                <td class="text-success">+$3,000.00</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>30 New Students</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-check me-2"></i>Mark Received</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Send Reminder</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>INC006</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-5 days')) }}</td>
                                <td>Summer Camp Fees</td>
                                <td><span class="badge bg-info">Other</span></td>
                                <td class="text-success">+$8,500.00</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-danger">Overdue</span></td>
                                <td>25 Students</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Follow Up</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Send Reminder</a></li>
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

<!-- Add Income Modal -->
<div class="modal fade" id="addIncomeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Income</h5>
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
                                    <label for="incomeTitle" class="form-label">Income Title *</label>
                                    <input type="text" class="form-control" id="incomeTitle" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="incomeCategory" class="form-label">Category *</label>
                                    <select class="form-select" id="incomeCategory" required>
                                        <option value="">Select Category</option>
                                        <option value="fees">School Fees</option>
                                        <option value="donation">Donations</option>
                                        <option value="sponsorship">Sponsorships</option>
                                        <option value="rental">Rental Income</option>
                                        <option value="other">Other Income</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="incomeAmount" class="form-label">Amount *</label>
                                    <input type="number" class="form-control" id="incomeAmount" min="0" step="0.01" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="incomeDate" class="form-label">Date *</label>
                                    <input type="date" class="form-control" id="incomeDate" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="expectedDate" class="form-label">Expected Date</label>
                                    <input type="date" class="form-control" id="expectedDate">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="paymentMethod" class="form-label">Payment Method</label>
                                    <select class="form-select" id="paymentMethod">
                                        <option value="">Select Method</option>
                                        <option value="cash">Cash</option>
                                        <option value="bank">Bank Transfer</option>
                                        <option value="mobile">Mobile Money</option>
                                        <option value="check">Check</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="incomeDescription" class="form-label">Description *</label>
                                <textarea class="form-control" id="incomeDescription" rows="3" required placeholder="Enter detailed description of the income..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Source Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Source Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="sourceName" class="form-label">Source Name</label>
                                    <input type="text" class="form-control" id="sourceName" placeholder="Individual or Organization">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="sourceEmail" class="form-label">Source Email</label>
                                    <input type="email" class="form-control" id="sourceEmail" placeholder="Optional">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="sourcePhone" class="form-label">Source Phone</label>
                                    <input type="tel" class="form-control" id="sourcePhone" placeholder="Optional">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="sourceAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="sourceAddress" placeholder="Optional">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="reference" class="form-label">Reference Number</label>
                                    <input type="text" class="form-control" id="reference" placeholder="Optional">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recurring Income -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Recurring Income</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="isRecurring">
                                <label class="form-check-label" for="isRecurring">
                                    This is recurring income
                                </label>
                            </div>
                            <div id="recurringOptions" style="display: none;">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="frequency" class="form-label">Frequency</label>
                                        <select class="form-select" id="frequency">
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="quarterly">Quarterly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="startDate">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="endDate" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="endDate">
                                    </div>
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
                                <label for="receiptFile" class="form-label">Receipt/Proof</label>
                                <input type="file" class="form-control" id="receiptFile" accept=".pdf,.jpg,.jpeg,.png">
                                <small class="text-muted">Upload receipt or proof of payment</small>
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
                <button type="button" class="btn btn-success">Add Income</button>
            </div>
        </div>
    </div>
</div>

<!-- Income Forecast Modal -->
<div class="modal fade" id="forecastModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Income Forecast</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="forecastPeriod" class="form-label">Forecast Period</label>
                        <select class="form-select" id="forecastPeriod">
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="forecastCategory" class="form-label">Category</label>
                        <select class="form-select" id="forecastCategory">
                            <option value="">All Categories</option>
                            <option value="fees">School Fees</option>
                            <option value="donation">Donations</option>
                            <option value="sponsorship">Sponsorships</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Expected Income</th>
                                <th>Actual Income</th>
                                <th>Variance</th>
                                <th>Percentage</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>January</td>
                                <td>$12,000</td>
                                <td>$13,500</td>
                                <td class="text-success">+$1,500</td>
                                <td>112.5%</td>
                                <td><span class="badge bg-success">Exceeded</span></td>
                            </tr>
                            <tr>
                                <td>February</td>
                                <td>$12,000</td>
                                <td>$11,200</td>
                                <td class="text-danger">-$800</td>
                                <td>93.3%</td>
                                <td><span class="badge bg-warning">Below Target</span></td>
                            </tr>
                            <tr>
                                <td>March</td>
                                <td>$12,000</td>
                                <td>$12,500</td>
                                <td class="text-success">+$500</td>
                                <td>104.2%</td>
                                <td><span class="badge bg-success">On Track</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Export Forecast</button>
            </div>
        </div>
    </div>
</div>

<!-- Income Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Income Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Income Summary</option>
                        <option value="detailed">Detailed Report</option>
                        <option value="category">Category Analysis</option>
                        <option value="source">Source Analysis</option>
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
document.addEventListener('DOMContentLoaded', function() {
    const isRecurringCheckbox = document.getElementById('isRecurring');
    const recurringOptions = document.getElementById('recurringOptions');
    
    if (isRecurringCheckbox && recurringOptions) {
        isRecurringCheckbox.addEventListener('change', function() {
            recurringOptions.style.display = this.checked ? 'block' : 'none';
        });
    }
});
</script>
@endsection
