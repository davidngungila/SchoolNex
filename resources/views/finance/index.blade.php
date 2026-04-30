@extends('layouts.app')

@section('title', 'Finance Management')

@section('content')
<div class="row">
    <!-- Financial Overview Cards -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-label-primary rounded me-3">
                        <i class="bx bx-dollar avatar-icon"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Total Revenue</h6>
                        <h3 class="mb-0">$125,450</h3>
                        <small class="text-success">+12.5% from last month</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-label-danger rounded me-3">
                        <i class="bx bx-credit-card avatar-icon"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Total Expenses</h6>
                        <h3 class="mb-0">$45,230</h3>
                        <small class="text-danger">+8.2% from last month</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-label-success rounded me-3">
                        <i class="bx bx-wallet avatar-icon"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Net Balance</h6>
                        <h3 class="mb-0">$80,220</h3>
                        <small class="text-success">+15.8% from last month</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-label-warning rounded me-3">
                        <i class="bx bx-user avatar-icon"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Pending Fees</h6>
                        <h3 class="mb-0">$12,450</h3>
                        <small class="text-warning">25 students</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Finance Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#paymentModal">
                        <i class="bx bx-dollar me-1"></i> Record Payment
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#expenseModal">
                        <i class="bx bx-minus-circle me-1"></i> Record Expense
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Generate Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="transactionType" class="form-label">Transaction Type</label>
                        <select class="form-select" id="transactionType">
                            <option value="all" selected>All Transactions</option>
                            <option value="payment">Payments</option>
                            <option value="expense">Expenses</option>
                            <option value="refund">Refunds</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today" selected>Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="quarter">This Quarter</option>
                            <option value="year">This Year</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <select class="form-select" id="paymentMethod">
                            <option value="all" selected>All Methods</option>
                            <option value="cash">Cash</option>
                            <option value="bank">Bank Transfer</option>
                            <option value="card">Credit Card</option>
                            <option value="mobile">Mobile Money</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="searchTransaction" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchTransaction" placeholder="Search by ID, student...">
                    </div>
                </div>

                <!-- Transaction Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Student/Party</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#TRX001</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td><span class="badge bg-success">Payment</span></td>
                                <td>Ahmed Hassan (STU001)</td>
                                <td>Tuition Fee - Term 1</td>
                                <td class="text-success fw-bold">$2,500</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX002</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td><span class="badge bg-success">Payment</span></td>
                                <td>Fatima Ali (STU002)</td>
                                <td>Tuition Fee - Term 1</td>
                                <td class="text-success fw-bold">$2,500</td>
                                <td><span class="badge bg-info">Cash</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX003</td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td><span class="badge bg-danger">Expense</span></td>
                                <td>Office Supplies Ltd</td>
                                <td>Stationery and Office Supplies</td>
                                <td class="text-danger fw-bold">$450</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX004</td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td><span class="badge bg-success">Payment</span></td>
                                <td>Mohammed Ibrahim (STU003)</td>
                                <td>Tuition Fee - Term 1</td>
                                <td class="text-success fw-bold">$2,500</td>
                                <td><span class="badge bg-warning">Mobile Money</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX005</td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td><span class="badge bg-danger">Expense</span></td>
                                <td>City Water Company</td>
                                <td>Monthly Water Bill</td>
                                <td class="text-danger fw-bold">$320</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX006</td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td><span class="badge bg-success">Payment</span></td>
                                <td>Aisha Mahmoud (STU004)</td>
                                <td>Partial Tuition Fee - Term 1</td>
                                <td class="text-success fw-bold">$1,000</td>
                                <td><span class="badge bg-info">Cash</span></td>
                                <td><span class="badge bg-warning">Partial</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX007</td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td><span class="badge bg-danger">Expense</span></td>
                                <td>Electric Company</td>
                                <td>Monthly Electricity Bill</td>
                                <td class="text-danger fw-bold">$580</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX008</td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td><span class="badge bg-warning">Refund</span></td>
                                <td>Omar Khalid (STU005)</td>
                                <td>Library Fee Refund</td>
                                <td class="text-warning fw-bold">$50</td>
                                <td><span class="badge bg-info">Cash</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX009</td>
                                <td>{{ date('Y-m-d', strtotime('-4 days')) }}</td>
                                <td><span class="badge bg-success">Payment</span></td>
                                <td>Mariam Said (STU006)</td>
                                <td>Tuition Fee - Term 1</td>
                                <td class="text-success fw-bold">$2,500</td>
                                <td><span class="badge bg-secondary">Credit Card</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#TRX010</td>
                                <td>{{ date('Y-m-d', strtotime('-4 days')) }}</td>
                                <td><span class="badge bg-danger">Expense</span></td>
                                <td>Teacher salaries</td>
                                <td>Monthly Teacher Salaries</td>
                                <td class="text-danger fw-bold">$15,000</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Record Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="studentSelect" class="form-label">Student</label>
                            <select class="form-select" id="studentSelect">
                                <option selected>Select Student</option>
                                <option value="STU001">Ahmed Hassan (STU001)</option>
                                <option value="STU002">Fatima Ali (STU002)</option>
                                <option value="STU003">Mohammed Ibrahim (STU003)</option>
                                <option value="STU004">Aisha Mahmoud (STU004)</option>
                                <option value="STU005">Omar Khalid (STU005)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paymentType" class="form-label">Payment Type</label>
                            <select class="form-select" id="paymentType">
                                <option selected>Select Type</option>
                                <option value="tuition">Tuition Fee</option>
                                <option value="library">Library Fee</option>
                                <option value="lab">Lab Fee</option>
                                <option value="sports">Sports Fee</option>
                                <option value="transport">Transport Fee</option>
                                <option value="uniform">Uniform Fee</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="paymentAmount" class="form-label">Amount ($)</label>
                            <input type="number" class="form-control" id="paymentAmount" placeholder="0.00" step="0.01">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paymentMethod" class="form-label">Payment Method</label>
                            <select class="form-select" id="paymentMethod">
                                <option selected>Select Method</option>
                                <option value="cash">Cash</option>
                                <option value="bank">Bank Transfer</option>
                                <option value="card">Credit Card</option>
                                <option value="mobile">Mobile Money</option>
                                <option value="check">Check</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="paymentDate" class="form-label">Payment Date</label>
                            <input type="date" class="form-control" id="paymentDate" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="referenceNumber" class="form-label">Reference Number</label>
                            <input type="text" class="form-control" id="referenceNumber" placeholder="Transaction reference...">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="paymentDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="paymentDescription" rows="3" placeholder="Enter payment details..."></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="receiptNumber" class="form-label">Receipt Number</label>
                            <input type="text" class="form-control" id="receiptNumber" placeholder="Auto-generated" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="printReceipt" class="form-label">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="printReceipt" checked>
                                <label class="form-check-label" for="printReceipt">Print Receipt</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Record Payment</button>
            </div>
        </div>
    </div>
</div>

<!-- Expense Modal -->
<div class="modal fade" id="expenseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Record Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="expenseCategory" class="form-label">Expense Category</label>
                            <select class="form-select" id="expenseCategory">
                                <option selected>Select Category</option>
                                <option value="salaries">Salaries</option>
                                <option value="utilities">Utilities</option>
                                <option value="supplies">Office Supplies</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="transport">Transportation</option>
                                <option value="equipment">Equipment</option>
                                <option value="marketing">Marketing</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="vendorName" class="form-label">Vendor/Supplier</label>
                            <input type="text" class="form-control" id="vendorName" placeholder="Enter vendor name...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="expenseAmount" class="form-label">Amount ($)</label>
                            <input type="number" class="form-control" id="expenseAmount" placeholder="0.00" step="0.01">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="expenseMethod" class="form-label">Payment Method</label>
                            <select class="form-select" id="expenseMethod">
                                <option selected>Select Method</option>
                                <option value="cash">Cash</option>
                                <option value="bank">Bank Transfer</option>
                                <option value="card">Credit Card</option>
                                <option value="check">Check</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="expenseDate" class="form-label">Expense Date</label>
                            <input type="date" class="form-control" id="expenseDate" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="invoiceNumber" class="form-label">Invoice Number</label>
                            <input type="text" class="form-control" id="invoiceNumber" placeholder="Invoice number...">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="expenseDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="expenseDescription" rows="3" placeholder="Enter expense details..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="expenseAttachments" class="form-label">Attachments</label>
                        <input type="file" class="form-control" id="expenseAttachments" multiple>
                        <small class="text-muted">Upload receipts, invoices, or other supporting documents</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Record Expense</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
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
                            <label for="reportType" class="form-label">Report Type</label>
                            <select class="form-select" id="reportType">
                                <option value="summary" selected>Financial Summary</option>
                                <option value="payments">Payment Report</option>
                                <option value="expenses">Expense Report</option>
                                <option value="balance">Balance Sheet</option>
                                <option value="cashflow">Cash Flow Statement</option>
                                <option value="aged">Aged Receivables</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reportPeriod" class="form-label">Period</label>
                            <select class="form-select" id="reportPeriod">
                                <option value="daily" selected>Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="yearly">Yearly</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportStartDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="reportStartDate">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reportEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="reportEndDate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportFormat" class="form-label">Format</label>
                            <select class="form-select" id="reportFormat">
                                <option value="pdf" selected>PDF</option>
                                <option value="excel">Excel</option>
                                <option value="csv">CSV</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="emailReport" class="form-label">Email Report</label>
                            <input type="email" class="form-control" id="emailReport" placeholder="finance@school.edu">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Include Sections:</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeRevenue" checked>
                                    <label class="form-check-label" for="includeRevenue">Revenue Details</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeExpenses" checked>
                                    <label class="form-check-label" for="includeExpenses">Expense Details</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeBalance" checked>
                                    <label class="form-check-label" for="includeBalance">Balance Summary</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeCharts" checked>
                                    <label class="form-check-label" for="includeCharts">Charts & Graphs</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includePending" checked>
                                    <label class="form-check-label" for="includePending">Pending Payments</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeTrends">
                                    <label class="form-check-label" for="includeTrends">Trend Analysis</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeSummary" checked>
                                    <label class="form-check-label" for="includeSummary">Executive Summary</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeRecommendations">
                                    <label class="form-check-label" for="includeRecommendations">Recommendations</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeForecast">
                                    <label class="form-check-label" for="includeForecast">Forecast</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Generate Report</button>
            </div>
        </div>
    </div>
</div>
@endsection
