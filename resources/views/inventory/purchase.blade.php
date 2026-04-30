@extends('layouts.app')

@section('title', 'Purchase Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Purchase Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createPurchaseModal">
                        <i class="bx bx-plus me-1"></i> Create Purchase Order
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#vendorModal">
                        <i class="bx bx-user me-1"></i> Manage Vendors
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Purchase Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Purchase Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">24</h4>
                                        <p class="mb-0">Total Orders</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-shopping-bag avatar-icon"></i>
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
                                        <p class="mb-0">Completed</p>
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
                                        <h4 class="mb-0">8</h4>
                                        <p class="mb-0">Pending</p>
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
                                        <h4 class="mb-0">$15,750</h4>
                                        <p class="mb-0">Total Value</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-dollar avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="draft">Draft</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="ordered">Ordered</option>
                            <option value="received">Received</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="vendorFilter" class="form-label">Vendor</label>
                        <select class="form-select" id="vendorFilter">
                            <option value="">All Vendors</option>
                            <option value="vendor1">Office Supplies Ltd</option>
                            <option value="vendor2">Tech Solutions</option>
                            <option value="vendor3">Educational Materials</option>
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
                        <label for="searchPurchase" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchPurchase" placeholder="Order number...">
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

                <!-- Purchase Orders Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Vendor</th>
                                <th>Items Count</th>
                                <th>Total Amount</th>
                                <th>Order Date</th>
                                <th>Expected Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>PUR001</strong></td>
                                <td>Office Supplies Ltd</td>
                                <td>15</td>
                                <td>$2,450.00</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>{{ date('Y-m-d', strtotime('+7 days')) }}</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPurchaseModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPurchaseModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#approveModal"><i class="bx bx-check me-2"></i>Approve</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="bx bx-x me-2"></i>Cancel</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>PUR002</strong></td>
                                <td>Tech Solutions</td>
                                <td>8</td>
                                <td>$3,200.00</td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td>{{ date('Y-m-d', strtotime('+5 days')) }}</td>
                                <td><span class="badge bg-success">Received</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPurchaseModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#invoiceModal"><i class="bx bx-receipt me-2"></i>View Invoice</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#returnModal"><i class="bx bx-undo me-2"></i>Return Items</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bx bx-file me-2"></i>Generate Report</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>PUR003</strong></td>
                                <td>Educational Materials</td>
                                <td>25</td>
                                <td>$5,100.00</td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td>{{ date('Y-m-d', strtotime('+10 days')) }}</td>
                                <td><span class="badge bg-primary">Ordered</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPurchaseModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#trackModal"><i class="bx bx-map me-2"></i>Track Order</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#contactModal"><i class="bx bx-phone me-2"></i>Contact Vendor</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="bx bx-x me-2"></i>Cancel Order</a></li>
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

<!-- Create Purchase Modal -->
<div class="modal fade" id="createPurchaseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Purchase Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Order Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Order Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="vendorSelect" class="form-label">Select Vendor *</label>
                                    <select class="form-select" id="vendorSelect" required>
                                        <option value="">Select Vendor</option>
                                        <option value="vendor1">Office Supplies Ltd</option>
                                        <option value="vendor2">Tech Solutions</option>
                                        <option value="vendor3">Educational Materials</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="orderDate" class="form-label">Order Date *</label>
                                    <input type="date" class="form-control" id="orderDate" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="expectedDate" class="form-label">Expected Delivery Date *</label>
                                    <input type="date" class="form-control" id="expectedDate" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="priority" class="form-label">Priority</label>
                                    <select class="form-select" id="priority">
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="deliveryAddress" class="form-label">Delivery Address</label>
                                    <input type="text" class="form-control" id="deliveryAddress" placeholder="School address">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Items -->
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Order Items</h6>
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="addPurchaseItem()">
                                <i class="bx bx-plus"></i> Add Item
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="purchaseItemsTable">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Item name"></td>
                                            <td><select class="form-select">
                                                <option value="">Select Category</option>
                                                <option value="stationery">Stationery</option>
                                                <option value="electronics">Electronics</option>
                                                <option value="furniture">Furniture</option>
                                                <option value="books">Books</option>
                                            </select></td>
                                            <td><input type="number" class="form-control" min="1" value="1" onchange="calculateTotal(this)"></td>
                                            <td><input type="number" class="form-control" min="0" step="0.01" value="0.00" onchange="calculateTotal(this)"></td>
                                            <td><input type="text" class="form-control" readonly value="0.00"></td>
                                            <td><button type="button" class="btn btn-sm btn-danger" onclick="removePurchaseItem(this)">Remove</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Subtotal:</strong></td>
                                            <td><input type="text" class="form-control text-end" id="subtotal" readonly value="0.00"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tax (10%):</strong></td>
                                            <td><input type="text" class="form-control text-end" id="tax" readonly value="0.00"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Shipping:</strong></td>
                                            <td><input type="number" class="form-control text-end" id="shipping" min="0" step="0.01" value="0.00" onchange="calculateGrandTotal()"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total:</strong></td>
                                            <td><input type="text" class="form-control text-end fw-bold" id="total" readonly value="0.00"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Additional Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="paymentTerms" class="form-label">Payment Terms</label>
                                    <select class="form-select" id="paymentTerms">
                                        <option value="immediate">Immediate</option>
                                        <option value="net15">Net 15 Days</option>
                                        <option value="net30">Net 30 Days</option>
                                        <option value="net60">Net 60 Days</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="deliveryTerms" class="form-label">Delivery Terms</label>
                                    <select class="form-select" id="deliveryTerms">
                                        <option value="standard">Standard Delivery</option>
                                        <option value="express">Express Delivery</option>
                                        <option value="pickup">Pickup</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control" id="notes" rows="3" placeholder="Additional notes or instructions..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="attachments" class="form-label">Attachments</label>
                                <input type="file" class="form-control" id="attachments" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg">
                                <small class="text-muted">Upload quotes, specifications, or other documents</small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save as Draft</button>
                <button type="button" class="btn btn-success">Submit Order</button>
            </div>
        </div>
    </div>
</div>

<!-- View Purchase Modal -->
<div class="modal fade" id="viewPurchaseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Purchase Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6>Order Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Order ID:</strong></td>
                                <td>PUR001</td>
                            </tr>
                            <tr>
                                <td><strong>Vendor:</strong></td>
                                <td>Office Supplies Ltd</td>
                            </tr>
                            <tr>
                                <td><strong>Order Date:</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Expected Delivery:</strong></td>
                                <td>{{ date('Y-m-d', strtotime('+7 days')) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td><strong>Priority:</strong></td>
                                <td><span class="badge bg-info">Medium</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Vendor Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Contact Person:</strong></td>
                                <td>John Smith</td>
                            </tr>
                            <tr>
                                <td><strong>Phone:</strong></td>
                                <td>+255 712 345 678</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>sales@officesupplies.com</td>
                            </tr>
                            <tr>
                                <td><strong>Address:</strong></td>
                                <td>123 Business Street, City</td>
                            </tr>
                            <tr>
                                <td><strong>Payment Terms:</strong></td>
                                <td>Net 30 Days</td>
                            </tr>
                            <tr>
                                <td><strong>Delivery Terms:</strong></td>
                                <td>Standard Delivery</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Order Items</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Notebook A4</td>
                                        <td><span class="badge bg-info">Stationery</span></td>
                                        <td>100</td>
                                        <td>$2.50</td>
                                        <td>$250.00</td>
                                    </tr>
                                    <tr>
                                        <td>Pens (Black)</td>
                                        <td><span class="badge bg-info">Stationery</span></td>
                                        <td>200</td>
                                        <td>$1.00</td>
                                        <td>$200.00</td>
                                    </tr>
                                    <tr>
                                        <td>Printer Paper</td>
                                        <td><span class="badge bg-info">Stationery</span></td>
                                        <td>10</td>
                                        <td>$15.00</td>
                                        <td>$150.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h6>Financial Summary</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Subtotal:</strong></td>
                                <td>$600.00</td>
                            </tr>
                            <tr>
                                <td><strong>Tax (10%):</strong></td>
                                <td>$60.00</td>
                            </tr>
                            <tr>
                                <td><strong>Shipping:</strong></td>
                                <td>$50.00</td>
                            </tr>
                            <tr>
                                <td><strong>Total:</strong></td>
                                <td><strong>$710.00</strong></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Order Timeline</h6>
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <small>{{ date('Y-m-d H:i') }}</small>
                                    <span class="badge bg-warning">Pending</span>
                                </div>
                                <p class="mb-0">Order created and submitted for approval</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Print Order</button>
                <button type="button" class="btn btn-success">Download PDF</button>
            </div>
        </div>
    </div>
</div>

<!-- Vendor Modal -->
<div class="modal fade" id="vendorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Vendors</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-3">
                    <h6>Active Vendors</h6>
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addVendorModal">
                        <i class="bx bx-plus"></i> Add Vendor
                    </button>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Vendor Name</th>
                                <th>Category</th>
                                <th>Contact</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Office Supplies Ltd</td>
                                <td><span class="badge bg-info">Stationery</span></td>
                                <td>+255 712 111 222</td>
                                <td>4.5/5</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Tech Solutions</td>
                                <td><span class="badge bg-warning">Electronics</span></td>
                                <td>+255 712 333 444</td>
                                <td>4.2/5</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Purchase Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Purchase Summary</option>
                        <option value="vendor">Vendor Analysis</option>
                        <option value="category">Category Report</option>
                        <option value="budget">Budget Analysis</option>
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

<script>
function addPurchaseItem() {
    const table = document.getElementById('purchaseItemsTable').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();
    newRow.innerHTML = `
        <td><input type="text" class="form-control" placeholder="Item name"></td>
        <td><select class="form-select">
            <option value="">Select Category</option>
            <option value="stationery">Stationery</option>
            <option value="electronics">Electronics</option>
            <option value="furniture">Furniture</option>
            <option value="books">Books</option>
        </select></td>
        <td><input type="number" class="form-control" min="1" value="1" onchange="calculateTotal(this)"></td>
        <td><input type="number" class="form-control" min="0" step="0.01" value="0.00" onchange="calculateTotal(this)"></td>
        <td><input type="text" class="form-control" readonly value="0.00"></td>
        <td><button type="button" class="btn btn-sm btn-danger" onclick="removePurchaseItem(this)">Remove</button></td>
    `;
}

function removePurchaseItem(button) {
    const row = button.closest('tr');
    row.remove();
    calculateGrandTotal();
}

function calculateTotal(input) {
    const row = input.closest('tr');
    const quantity = parseFloat(row.cells[2].querySelector('input').value) || 0;
    const unitPrice = parseFloat(row.cells[3].querySelector('input').value) || 0;
    const total = quantity * unitPrice;
    row.cells[4].querySelector('input').value = total.toFixed(2);
    calculateGrandTotal();
}

function calculateGrandTotal() {
    const table = document.getElementById('purchaseItemsTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    let subtotal = 0;
    
    for (let row of rows) {
        const total = parseFloat(row.cells[4].querySelector('input').value) || 0;
        subtotal += total;
    }
    
    const tax = subtotal * 0.1;
    const shipping = parseFloat(document.getElementById('shipping').value) || 0;
    const total = subtotal + tax + shipping;
    
    document.getElementById('subtotal').value = subtotal.toFixed(2);
    document.getElementById('tax').value = tax.toFixed(2);
    document.getElementById('total').value = total.toFixed(2);
}
</script>
@endsection
