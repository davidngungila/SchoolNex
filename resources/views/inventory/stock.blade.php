@extends('layouts.app')

@section('title', 'Stock Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Stock Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#adjustStockModal">
                        <i class="bx bx-plus me-1"></i> Adjust Stock
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#stockTakeModal">
                        <i class="bx bx-clipboard me-1"></i> Stock Take
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Stock Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Stock Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">1,245</h4>
                                        <p class="mb-0">Total Items</p>
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
                                        <h4 class="mb-0">892</h4>
                                        <p class="mb-0">In Stock</p>
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
                                        <h4 class="mb-0">289</h4>
                                        <p class="mb-0">Low Stock</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-error avatar-icon"></i>
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
                                        <h4 class="mb-0">64</h4>
                                        <p class="mb-0">Out of Stock</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-x-circle avatar-icon"></i>
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
                            <option value="stationery">Stationery</option>
                            <option value="electronics">Electronics</option>
                            <option value="furniture">Furniture</option>
                            <option value="books">Books</option>
                            <option value="sports">Sports Equipment</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="stockStatus" class="form-label">Stock Status</label>
                        <select class="form-select" id="stockStatus">
                            <option value="">All Status</option>
                            <option value="in_stock">In Stock</option>
                            <option value="low_stock">Low Stock</option>
                            <option value="out_of_stock">Out of Stock</option>
                            <option value="overstocked">Overstocked</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="location" class="form-label">Location</label>
                        <select class="form-select" id="location">
                            <option value="">All Locations</option>
                            <option value="main_store">Main Store</option>
                            <option value="science_lab">Science Lab</option>
                            <option value="library">Library</option>
                            <option value="office">Office</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchItem" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchItem" placeholder="Item name, code...">
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

                <!-- Stock Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Current Stock</th>
                                <th>Min Level</th>
                                <th>Max Level</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>NB001</strong></td>
                                <td>Notebook A4</td>
                                <td><span class="badge bg-info">Stationery</span></td>
                                <td>150</td>
                                <td>50</td>
                                <td>200</td>
                                <td>Main Store</td>
                                <td><span class="badge bg-success">In Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewStockModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adjustStockModal"><i class="bx bx-edit me-2"></i>Adjust Stock</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#moveStockModal"><i class="bx bx-transfer me-2"></i>Move Stock</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#historyModal"><i class="bx bx-history me-2"></i>View History</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>LP001</strong></td>
                                <td>Laptop Computer</td>
                                <td><span class="badge bg-warning">Electronics</span></td>
                                <td>5</td>
                                <td>10</td>
                                <td>20</td>
                                <td>Science Lab</td>
                                <td><span class="badge bg-warning">Low Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewStockModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adjustStockModal"><i class="bx bx-edit me-2"></i>Adjust Stock</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reorderModal"><i class="bx bx-shopping-bag me-2"></i>Reorder</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#historyModal"><i class="bx bx-history me-2"></i>View History</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>DC001</strong></td>
                                <td>Desk Chair</td>
                                <td><span class="badge bg-secondary">Furniture</span></td>
                                <td>0</td>
                                <td>5</td>
                                <td>15</td>
                                <td>Main Store</td>
                                <td><span class="badge bg-danger">Out of Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewStockModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adjustStockModal"><i class="bx bx-edit me-2"></i>Adjust Stock</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reorderModal"><i class="bx bx-shopping-bag me-2"></i>Reorder</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#historyModal"><i class="bx bx-history me-2"></i>View History</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>PN001</strong></td>
                                <td>Pens (Black)</td>
                                <td><span class="badge bg-info">Stationery</span></td>
                                <td>350</td>
                                <td>100</td>
                                <td>200</td>
                                <td>Main Store</td>
                                <td><span class="badge bg-info">Overstocked</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewStockModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adjustStockModal"><i class="bx bx-edit me-2"></i>Adjust Stock</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#moveStockModal"><i class="bx bx-transfer me-2"></i>Move Stock</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#historyModal"><i class="bx bx-history me-2"></i>View History</a></li>
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

<!-- Adjust Stock Modal -->
<div class="modal fade" id="adjustStockModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adjust Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="itemSearch" class="form-label">Search Item *</label>
                            <input type="text" class="form-control" id="itemSearch" placeholder="Enter item name or code" required>
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
                                            <th>Current Stock</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="itemSelect" value="NB001"></td>
                                            <td>NB001</td>
                                            <td>Notebook A4</td>
                                            <td>150</td>
                                            <td>Main Store</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="itemSelect" value="LP001"></td>
                                            <td>LP001</td>
                                            <td>Laptop Computer</td>
                                            <td>5</td>
                                            <td>Science Lab</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="adjustmentType" class="form-label">Adjustment Type *</label>
                            <select class="form-select" id="adjustmentType" required>
                                <option value="">Select Type</option>
                                <option value="add">Add Stock</option>
                                <option value="subtract">Subtract Stock</option>
                                <option value="set">Set Stock Level</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="adjustmentQuantity" class="form-label">Quantity *</label>
                            <input type="number" class="form-control" id="adjustmentQuantity" min="0" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="newStockLevel" class="form-label">New Stock Level</label>
                            <input type="number" class="form-control" id="newStockLevel" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="adjustmentDate" class="form-label">Adjustment Date *</label>
                            <input type="date" class="form-control" id="adjustmentDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="adjustmentReason" class="form-label">Reason *</label>
                            <select class="form-select" id="adjustmentReason" required>
                                <option value="">Select Reason</option>
                                <option value="purchase">New Purchase</option>
                                <option value="return">Item Return</option>
                                <option value="damage">Damage/Loss</option>
                                <option value="correction">Stock Correction</option>
                                <option value="transfer">Stock Transfer</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="adjustmentNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="adjustmentNotes" rows="3" placeholder="Enter detailed notes about the adjustment..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="referenceNumber" class="form-label">Reference Number</label>
                        <input type="text" class="form-control" id="referenceNumber" placeholder="Purchase order number, invoice number, etc.">
                    </div>
                    <div class="mb-3">
                        <label for="attachments" class="form-label">Attachments</label>
                        <input type="file" class="form-control" id="attachments" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg">
                        <small class="text-muted">Upload supporting documents</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Adjust Stock</button>
            </div>
        </div>
    </div>
</div>

<!-- Stock Take Modal -->
<div class="modal fade" id="stockTakeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Stock Take</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="stockTakeDate" class="form-label">Stock Take Date *</label>
                            <input type="date" class="form-control" id="stockTakeDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="locationFilter" class="form-label">Location *</label>
                            <select class="form-select" id="locationFilter" required>
                                <option value="">Select Location</option>
                                <option value="main_store">Main Store</option>
                                <option value="science_lab">Science Lab</option>
                                <option value="library">Library</option>
                                <option value="office">Office</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="categoryFilter" class="form-label">Category Filter</label>
                            <select class="form-select" id="categoryFilter">
                                <option value="">All Categories</option>
                                <option value="stationery">Stationery</option>
                                <option value="electronics">Electronics</option>
                                <option value="furniture">Furniture</option>
                                <option value="books">Books</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Stock Take Items -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Stock Take Items</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>System Stock</th>
                                            <th>Physical Count</th>
                                            <th>Variance</th>
                                            <th>Status</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>NB001</td>
                                            <td>Notebook A4</td>
                                            <td>150</td>
                                            <td><input type="number" class="form-control form-control-sm" min="0" value="150" onchange="calculateVariance(this)"></td>
                                            <td><input type="text" class="form-control form-control-sm" readonly value="0"></td>
                                            <td><span class="badge bg-success">Matched</span></td>
                                            <td><input type="text" class="form-control form-control-sm" placeholder="Notes"></td>
                                        </tr>
                                        <tr>
                                            <td>LP001</td>
                                            <td>Laptop Computer</td>
                                            <td>5</td>
                                            <td><input type="number" class="form-control form-control-sm" min="0" value="4" onchange="calculateVariance(this)"></td>
                                            <td><input type="text" class="form-control form-control-sm" readonly value="-1"></td>
                                            <td><span class="badge bg-warning">Variance</span></td>
                                            <td><input type="text" class="form-control form-control-sm" value="1 unit missing"></td>
                                        </tr>
                                        <tr>
                                            <td>PN001</td>
                                            <td>Pens (Black)</td>
                                            <td>350</td>
                                            <td><input type="number" class="form-control form-control-sm" min="0" value="355" onchange="calculateVariance(this)"></td>
                                            <td><input type="text" class="form-control form-control-sm" readonly value="5"></td>
                                            <td><span class="badge bg-info">Surplus</span></td>
                                            <td><input type="text" class="form-control form-control-sm" placeholder="Notes"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Summary</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td><strong>Total Items:</strong></td>
                                    <td id="totalItems">3</td>
                                </tr>
                                <tr>
                                    <td><strong>Matched:</strong></td>
                                    <td id="matchedItems">1</td>
                                </tr>
                                <tr>
                                    <td><strong>Variance:</strong></td>
                                    <td id="varianceItems">2</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Actions</h6>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="finalizeStockTake()">Finalize Stock Take</button>
                                <button type="button" class="btn btn-sm btn-outline-success">Save Progress</button>
                                <button type="button" class="btn btn-sm btn-outline-info">Print Form</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Complete Stock Take</button>
            </div>
        </div>
    </div>
</div>

<!-- View Stock Modal -->
<div class="modal fade" id="viewStockModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Stock Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Item Information</h6>
                        <table class="table table-borderless">
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
                                <td><strong>Description:</strong></td>
                                <td>A4 size notebook, 200 pages, spiral bound</td>
                            </tr>
                            <tr>
                                <td><strong>Unit Price:</strong></td>
                                <td>$2.50</td>
                            </tr>
                            <tr>
                                <td><strong>Total Value:</strong></td>
                                <td>$375.00</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Stock Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Current Stock:</strong></td>
                                <td>150 units</td>
                            </tr>
                            <tr>
                                <td><strong>Min Level:</strong></td>
                                <td>50 units</td>
                            </tr>
                            <tr>
                                <td><strong>Max Level:</strong></td>
                                <td>200 units</td>
                            </tr>
                            <tr>
                                <td><strong>Location:</strong></td>
                                <td>Main Store</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">In Stock</span></td>
                            </tr>
                            <tr>
                                <td><strong>Last Updated:</strong></td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Stock History (Last 10 Transactions)</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Quantity</th>
                                        <th>Balance</th>
                                        <th>Reason</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ date('Y-m-d') }}</td>
                                        <td><span class="badge bg-success">Add</span></td>
                                        <td>+50</td>
                                        <td>150</td>
                                        <td>New Purchase</td>
                                        <td>Admin User</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                        <td><span class="badge bg-warning">Subtract</span></td>
                                        <td>-10</td>
                                        <td>100</td>
                                        <td>Issued to Students</td>
                                        <td>Admin User</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d', strtotime('-5 days')) }}</td>
                                        <td><span class="badge bg-success">Add</span></td>
                                        <td>+100</td>
                                        <td>110</td>
                                        <td>New Purchase</td>
                                        <td>Admin User</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Supplier Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Supplier:</strong></td>
                                <td>Office Supplies Ltd</td>
                            </tr>
                            <tr>
                                <td><strong>Contact:</strong></td>
                                <td>+255 712 111 222</td>
                            </tr>
                            <tr>
                                <td><strong>Last Purchase:</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Usage Statistics</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Monthly Usage:</strong></td>
                                <td>25 units</td>
                            </tr>
                            <tr>
                                <td><strong>Days of Supply:</strong></td>
                                <td>180 days</td>
                            </tr>
                            <tr>
                                <td><strong>Reorder Point:</strong></td>
                                <td>50 units</td>
                            </tr>
                        </table>
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

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Stock Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Stock Summary</option>
                        <option value="low_stock">Low Stock Report</option>
                        <option value="out_of_stock">Out of Stock Report</option>
                        <option value="valuation">Stock Valuation</option>
                        <option value="movement">Stock Movement</option>
                        <option value="variance">Stock Variance</option>
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
function calculateVariance(input) {
    const row = input.closest('tr');
    const systemStock = parseFloat(row.cells[2].textContent) || 0;
    const physicalCount = parseFloat(input.value) || 0;
    const variance = physicalCount - systemStock;
    
    row.cells[4].querySelector('input').value = variance;
    
    // Update status badge
    const statusCell = row.cells[5];
    statusCell.innerHTML = '';
    
    if (variance === 0) {
        statusCell.innerHTML = '<span class="badge bg-success">Matched</span>';
    } else if (variance > 0) {
        statusCell.innerHTML = '<span class="badge bg-info">Surplus</span>';
    } else {
        statusCell.innerHTML = '<span class="badge bg-warning">Variance</span>';
    }
    
    updateSummary();
}

function updateSummary() {
    const table = document.querySelector('#stockTakeModal table tbody');
    const rows = table.getElementsByTagName('tr');
    let totalItems = rows.length;
    let matchedItems = 0;
    let varianceItems = 0;
    
    for (let row of rows) {
        const status = row.cells[5].querySelector('.badge');
        if (status.classList.contains('bg-success')) {
            matchedItems++;
        } else {
            varianceItems++;
        }
    }
    
    document.getElementById('totalItems').textContent = totalItems;
    document.getElementById('matchedItems').textContent = matchedItems;
    document.getElementById('varianceItems').textContent = varianceItems;
}

function finalizeStockTake() {
    // Implementation for finalizing stock take
    alert('Stock take finalized. Variance items will be investigated.');
}
</script>
@endsection
