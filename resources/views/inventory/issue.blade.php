@extends('layouts.app')

@section('title', 'Issue & Return Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Issue & Return Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#issueModal">
                        <i class="bx bx-package me-1"></i> Issue Item
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#returnModal">
                        <i class="bx bx-undo me-1"></i> Return Item
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Transaction Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Transaction Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">156</h4>
                                        <p class="mb-0">Items Issued</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-package avatar-icon"></i>
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
                                        <h4 class="mb-0">89</h4>
                                        <p class="mb-0">Items Returned</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-undo avatar-icon"></i>
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
                                        <h4 class="mb-0">67</h4>
                                        <p class="mb-0">Pending Returns</p>
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
                                        <h4 class="mb-0">12</h4>
                                        <p class="mb-0">Overdue Items</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-error avatar-icon"></i>
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
                            <option value="issue">Issued</option>
                            <option value="returned">Returned</option>
                            <option value="pending">Pending Return</option>
                            <option value="overdue">Overdue</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="itemCategory" class="form-label">Item Category</label>
                        <select class="form-select" id="itemCategory">
                            <option value="">All Categories</option>
                            <option value="stationery">Stationery</option>
                            <option value="electronics">Electronics</option>
                            <option value="furniture">Furniture</option>
                            <option value="books">Books</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="personType" class="form-label">Person Type</label>
                        <select class="form-select" id="personType">
                            <option value="">All Persons</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchTransaction" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchTransaction" placeholder="Item name, person...">
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

                <!-- Transactions Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Person</th>
                                <th>Type</th>
                                <th>Issue Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>TRN001</strong></td>
                                <td>Notebook A4</td>
                                <td><span class="badge bg-info">Stationery</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">Student - Class 1A</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Issued</span></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>{{ date('Y-m-d', strtotime('+7 days')) }}</td>
                                <td><span class="badge bg-primary">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTransactionModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#returnItemModal"><i class="bx bx-undo me-2"></i>Return Item</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#extendModal"><i class="bx bx-time me-2"></i>Extend Return</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactModal"><i class="bx bx-phone me-2"></i>Contact Person</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>TRN002</strong></td>
                                <td>Laptop Computer</td>
                                <td><span class="badge bg-warning">Electronics</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Teacher" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Sarah Johnson</div>
                                            <small class="text-muted">Teacher - Mathematics</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Issued</span></td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td>{{ date('Y-m-d', strtotime('+30 days')) }}</td>
                                <td><span class="badge bg-primary">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTransactionModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#returnItemModal"><i class="bx bx-undo me-2"></i>Return Item</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#extendModal"><i class="bx bx-time me-2"></i>Extend Return</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactModal"><i class="bx bx-phone me-2"></i>Contact Person</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>TRN003</strong></td>
                                <td>Desk Chair</td>
                                <td><span class="badge bg-secondary">Furniture</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Michael Brown</div>
                                            <small class="text-muted">Student - Class 2A</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-info">Returned</span></td>
                                <td>{{ date('Y-m-d', strtotime('-5 days')) }}</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTransactionModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reissueModal"><i class="bx bx-package me-2"></i>Re-issue Item</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Generate Report</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>TRN004</strong></td>
                                <td>Textbook - Mathematics</td>
                                <td><span class="badge bg-primary">Books</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Student" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Emily Davis</div>
                                            <small class="text-muted">Student - Class 1B</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Issued</span></td>
                                <td>{{ date('Y-m-d', strtotime('-10 days')) }}</td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td><span class="badge bg-danger">Overdue</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTransactionModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#returnItemModal"><i class="bx bx-undo me-2"></i>Return Item</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactModal"><i class="bx bx-phone me-2"></i>Contact Person</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reminderModal"><i class="bx bx-bell me-2"></i>Send Reminder</a></li>
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

<!-- Issue Modal -->
<div class="modal fade" id="issueModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Issue Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="itemSearch" class="form-label">Search Item *</label>
                            <input type="text" class="form-control" id="itemSearch" placeholder="Enter item name or code" required>
                            <small class="text-muted">Start typing to search available items</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="categoryFilter" class="form-label">Filter by Category</label>
                            <select class="form-select" id="categoryFilter">
                                <option value="">All Categories</option>
                                <option value="stationery">Stationery</option>
                                <option value="electronics">Electronics</option>
                                <option value="furniture">Furniture</option>
                                <option value="books">Books</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Item Selection -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Select Item</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Item Code</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Available Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="itemSelect" value="NB001"></td>
                                            <td>NB001</td>
                                            <td>Notebook A4</td>
                                            <td><span class="badge bg-info">Stationery</span></td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="itemSelect" value="LP001"></td>
                                            <td>LP001</td>
                                            <td>Laptop Computer</td>
                                            <td><span class="badge bg-warning">Electronics</span></td>
                                            <td>5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label">Quantity *</label>
                            <input type="number" class="form-control" id="quantity" min="1" value="1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="personSearch" class="form-label">Search Person *</label>
                            <input type="text" class="form-control" id="personSearch" placeholder="Enter name or ID" required>
                        </div>
                    </div>
                    
                    <!-- Person Selection -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Select Person</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Class/Department</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="personSelect" value="STU001"></td>
                                            <td>STU001</td>
                                            <td>John Smith</td>
                                            <td><span class="badge bg-primary">Student</span></td>
                                            <td>Class 1A</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="personSelect" value="TCH001"></td>
                                            <td>TCH001</td>
                                            <td>Sarah Johnson</td>
                                            <td><span class="badge bg-success">Teacher</span></td>
                                            <td>Mathematics</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="issueDate" class="form-label">Issue Date *</label>
                            <input type="date" class="form-control" id="issueDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="returnDate" class="form-label">Expected Return Date *</label>
                            <input type="date" class="form-control" id="returnDate" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose *</label>
                        <textarea class="form-control" id="purpose" rows="2" required placeholder="Enter purpose of issue..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="notes" rows="2" placeholder="Any additional notes..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Issue Item</button>
            </div>
        </div>
    </div>
</div>

<!-- Return Modal -->
<div class="modal fade" id="returnModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Return Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="transactionSearch" class="form-label">Search Transaction *</label>
                            <input type="text" class="form-control" id="transactionSearch" placeholder="Enter transaction ID or item name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="personFilter" class="form-label">Filter by Person</label>
                            <select class="form-select" id="personFilter">
                                <option value="">All Persons</option>
                                <option value="student">Students</option>
                                <option value="teacher">Teachers</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Transaction Selection -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Select Transaction to Return</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Transaction ID</th>
                                            <th>Item Name</th>
                                            <th>Person</th>
                                            <th>Issue Date</th>
                                            <th>Expected Return</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="transactionSelect" value="TRN001"></td>
                                            <td>TRN001</td>
                                            <td>Notebook A4</td>
                                            <td>John Smith (Student)</td>
                                            <td>{{ date('Y-m-d') }}</td>
                                            <td>{{ date('Y-m-d', strtotime('+7 days')) }}</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="transactionSelect" value="TRN002"></td>
                                            <td>TRN002</td>
                                            <td>Laptop Computer</td>
                                            <td>Sarah Johnson (Teacher)</td>
                                            <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                            <td>{{ date('Y-m-d', strtotime('+30 days')) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="returnDate" class="form-label">Return Date *</label>
                            <input type="date" class="form-control" id="returnDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="condition" class="form-label">Item Condition *</label>
                            <select class="form-select" id="condition" required>
                                <option value="">Select Condition</option>
                                <option value="excellent">Excellent</option>
                                <option value="good">Good</option>
                                <option value="fair">Fair</option>
                                <option value="poor">Poor</option>
                                <option value="damaged">Damaged</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="quantityReturned" class="form-label">Quantity Returned *</label>
                        <input type="number" class="form-control" id="quantityReturned" min="1" value="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="returnNotes" class="form-label">Return Notes</label>
                        <textarea class="form-control" id="returnNotes" rows="2" placeholder="Enter return notes..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="damageDescription" class="form-label">Damage Description</label>
                        <textarea class="form-control" id="damageDescription" rows="2" placeholder="Describe any damage if applicable..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="damagePhotos" class="form-label">Damage Photos</label>
                        <input type="file" class="form-control" id="damagePhotos" multiple accept="image/*">
                        <small class="text-muted">Upload photos if item is damaged</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Return Item</button>
            </div>
        </div>
    </div>
</div>

<!-- View Transaction Modal -->
<div class="modal fade" id="viewTransactionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transaction Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Transaction Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Transaction ID:</strong></td>
                                <td>TRN001</td>
                            </tr>
                            <tr>
                                <td><strong>Item Code:</strong></td>
                                <td>NB001</td>
                            </tr>
                            <tr>
                                <td><strong>Item Name:</strong></td>
                                <td>Notebook A4</td>
                            </tr>
                            <tr>
                                <td><strong>Category:</strong></td>
                                <td><span class="badge bg-info">Stationery</span></td>
                            </tr>
                            <tr>
                                <td><strong>Quantity:</strong></td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-primary">Active</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Person Information</h6>
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                            <div>
                                <h6 class="mb-0">John Smith</h6>
                                <p class="mb-0">Student ID: STU001</p>
                                <p class="mb-0">Class: 1A</p>
                                <p class="mb-0">+255 712 345 678</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Issue Details</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Issue Date:</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Expected Return:</strong></td>
                                <td>{{ date('Y-m-d', strtotime('+7 days')) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Purpose:</strong></td>
                                <td>Class assignment</td>
                            </tr>
                            <tr>
                                <td><strong>Issued By:</strong></td>
                                <td>Admin User</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Return Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Return Date:</strong></td>
                                <td><span class="text-muted">Not returned yet</span></td>
                            </tr>
                            <tr>
                                <td><strong>Condition:</strong></td>
                                <td><span class="text-muted">To be assessed</span></td>
                            </tr>
                            <tr>
                                <td><strong>Days Remaining:</strong></td>
                                <td><span class="text-success">6 days</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Additional Notes</h6>
                        <p>Issued for class assignment. Student requested additional notebook for science project.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Print Details</button>
            </div>
        </div>
    </div>
</div>

<!-- Extend Modal -->
<div class="modal fade" id="extendModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Extend Return Date</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="transactionInfo" class="form-label">Transaction</label>
                        <input type="text" class="form-control" id="transactionInfo" value="TRN001 - Notebook A4 - John Smith" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="currentReturnDate" class="form-label">Current Return Date</label>
                        <input type="date" class="form-control" id="currentReturnDate" value="{{ date('Y-m-d', strtotime('+7 days')) }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="newReturnDate" class="form-label">New Return Date *</label>
                        <input type="date" class="form-control" id="newReturnDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="extendReason" class="form-label">Reason for Extension *</label>
                        <textarea class="form-control" id="extendReason" rows="3" required placeholder="Enter reason for extension..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Extend Return</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transaction Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Transaction Summary</option>
                        <option value="person">Person-wise Report</option>
                        <option value="item">Item-wise Report</option>
                        <option value="overdue">Overdue Items</option>
                        <option value="category">Category Report</option>
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

<!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Person</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle" style="width: 80px; height: 80px;">
                    <h6 class="mt-2">John Smith</h6>
                    <p class="mb-0">Student ID: STU001</p>
                    <p class="mb-0">Class: 1A</p>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success">
                        <i class="bx bx-phone me-2"></i> Call Student
                    </button>
                    <button type="button" class="btn btn-primary">
                        <i class="bx bx-message me-2"></i> Send SMS
                    </button>
                    <button type="button" class="btn btn-info">
                        <i class="bx bx-envelope me-2"></i> Send Email
                    </button>
                </div>
                
                <div class="mt-3">
                    <label for="messageContent" class="form-label">Quick Message</label>
                    <textarea class="form-control" id="messageContent" rows="3" placeholder="Type your message here..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Send Message</button>
            </div>
        </div>
    </div>
</div>
@endsection
