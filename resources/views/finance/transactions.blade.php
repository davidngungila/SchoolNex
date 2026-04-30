@extends('layouts.app')

@section('title', 'Financial Transactions')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Financial Transactions</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
                        <i class="bx bx-plus me-1"></i> Add Transaction
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bx bx-upload me-1"></i> Import
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Transaction Statistics -->
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
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">$28,750</h4>
                                        <p class="mb-0">Total Expenses</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-trending-down avatar-icon"></i>
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
                                        <h4 class="mb-0">$16,500</h4>
                                        <p class="mb-0">Net Balance</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-dollar avatar-icon"></i>
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
                                        <h4 class="mb-0">245</h4>
                                        <p class="mb-0">Transactions</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-receipt avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="transactionType" class="form-label">Transaction Type</label>
                        <select class="form-select" id="transactionType">
                            <option value="">All Types</option>
                            <option value="income">Income</option>
                            <option value="expense">Expense</option>
                            <option value="transfer">Transfer</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category">
                            <option value="">All Categories</option>
                            <option value="fees">School Fees</option>
                            <option value="salaries">Salaries</option>
                            <option value="supplies">Supplies</option>
                            <option value="utilities">Utilities</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <select class="form-select" id="paymentMethod">
                            <option value="">All Methods</option>
                            <option value="cash">Cash</option>
                            <option value="bank">Bank Transfer</option>
                            <option value="mobile">Mobile Money</option>
                            <option value="card">Credit/Debit Card</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="year">This Year</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchTransaction" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchTransaction" placeholder="Description, reference...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Transactions Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Transaction ID</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('Y-m-d') }}</td>
                                <td><strong>TRX001</strong></td>
                                <td>School Fees Payment - John Smith</td>
                                <td><span class="badge bg-success">Fees</span></td>
                                <td><span class="badge bg-success">Income</span></td>
                                <td class="text-success">+$450.00</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td><strong>TRX002</strong></td>
                                <td>Teacher Salaries - Monthly Payment</td>
                                <td><span class="badge bg-warning">Salaries</span></td>
                                <td><span class="badge bg-danger">Expense</span></td>
                                <td class="text-danger">-$12,500.00</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td><strong>TRX003</strong></td>
                                <td>Office Supplies Purchase</td>
                                <td><span class="badge bg-info">Supplies</span></td>
                                <td><span class="badge bg-danger">Expense</span></td>
                                <td class="text-danger">-$850.00</td>
                                <td><span class="badge bg-success">Cash</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td><strong>TRX004</strong></td>
                                <td>Donation - Parent Association</td>
                                <td><span class="badge bg-purple">Donation</span></td>
                                <td><span class="badge bg-success">Income</span></td>
                                <td class="text-success">+$5,000.00</td>
                                <td><span class="badge bg-warning">Mobile Money</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Receipt</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('-4 days')) }}</td>
                                <td><strong>TRX005</strong></td>
                                <td>Electricity Bill - Monthly</td>
                                <td><span class="badge bg-secondary">Utilities</span></td>
                                <td><span class="badge bg-danger">Expense</span></td>
                                <td class="text-danger">-$1,200.00</td>
                                <td><span class="badge bg-primary">Bank Transfer</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Receipt</a></li>
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

<!-- Add Transaction Modal -->
<div class="modal fade" id="addTransactionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="transactionDate" class="form-label">Date *</label>
                            <input type="date" class="form-control" id="transactionDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="transactionType" class="form-label">Transaction Type *</label>
                            <select class="form-select" id="transactionType" required>
                                <option value="">Select Type</option>
                                <option value="income">Income</option>
                                <option value="expense">Expense</option>
                                <option value="transfer">Transfer</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Category *</label>
                            <select class="form-select" id="category" required>
                                <option value="">Select Category</option>
                                <option value="fees">School Fees</option>
                                <option value="salaries">Salaries</option>
                                <option value="supplies">Supplies</option>
                                <option value="utilities">Utilities</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="donation">Donation</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="amount" class="form-label">Amount *</label>
                            <input type="number" class="form-control" id="amount" min="0" step="0.01" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="paymentMethod" class="form-label">Payment Method *</label>
                            <select class="form-select" id="paymentMethod" required>
                                <option value="">Select Method</option>
                                <option value="cash">Cash</option>
                                <option value="bank">Bank Transfer</option>
                                <option value="mobile">Mobile Money</option>
                                <option value="card">Credit/Debit Card</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reference" class="form-label">Reference Number</label>
                            <input type="text" class="form-control" id="reference" placeholder="Optional">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control" id="description" rows="3" required placeholder="Enter transaction description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" rows="2" placeholder="Additional notes..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Attachment</label>
                        <input type="file" class="form-control" id="attachment" accept=".pdf,.jpg,.jpeg,.png">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Transaction</button>
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Transactions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="importFile" class="form-label">Select Excel File</label>
                    <input type="file" class="form-control" id="importFile" accept=".xlsx,.xls,.csv">
                </div>
                <div class="mb-3">
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        <i class="bx bx-download me-1"></i> Download Template
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Import</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Transactions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exportFormat" class="form-label">Export Format</label>
                    <select class="form-select" id="exportFormat">
                        <option value="excel">Excel</option>
                        <option value="pdf">PDF</option>
                        <option value="csv">CSV</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exportDateRange" class="form-label">Date Range</label>
                    <select class="form-select" id="exportDateRange">
                        <option value="current_month">Current Month</option>
                        <option value="last_month">Last Month</option>
                        <option value="current_year">Current Year</option>
                        <option value="custom">Custom Range</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Export</button>
            </div>
        </div>
    </div>
</div>
@endsection
