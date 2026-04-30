@extends('layouts.app')

@section('title', 'Inventory Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Inventory Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addItemModal">
                        <i class="bx bx-plus me-1"></i> Add Item
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#purchaseModal">
                        <i class="bx bx-shopping-bag me-1"></i> Purchase Order
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#stockModal">
                        <i class="bx bx-package me-1"></i> Stock Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Statistics Cards -->
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
                                        <h4 class="mb-0">156</h4>
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
                                        <h4 class="mb-0">197</h4>
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
                            <option value="furniture">Furniture</option>
                            <option value="electronics">Electronics</option>
                            <option value="sports">Sports Equipment</option>
                            <option value="lab">Lab Equipment</option>
                            <option value="cleaning">Cleaning Supplies</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Stock Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="in_stock">In Stock</option>
                            <option value="low_stock">Low Stock</option>
                            <option value="out_of_stock">Out of Stock</option>
                            <option value="damaged">Damaged</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="locationFilter" class="form-label">Location</label>
                        <select class="form-select" id="locationFilter">
                            <option value="">All Locations</option>
                            <option value="store">Main Store</option>
                            <option value="science_lab">Science Lab</option>
                            <option value="computer_lab">Computer Lab</option>
                            <option value="library">Library</option>
                            <option value="office">Office</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="supplierFilter" class="form-label">Supplier</label>
                        <select class="form-select" id="supplierFilter">
                            <option value="">All Suppliers</option>
                            <option value="supplier1">Office Supplies Ltd</option>
                            <option value="supplier2">Tech Solutions</option>
                            <option value="supplier3">Sports World</option>
                            <option value="supplier4">Lab Equipment Co</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchItem" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchItem" placeholder="Item name, code...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Search
                        </button>
                    </div>
                </div>

                <!-- Items Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Unit Price</th>
                                <th>Total Value</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x50/696cff/ffffff?text=P1" alt="Item" class="rounded">
                                </td>
                                <td><strong>ITM001</strong></td>
                                <td>A4 Paper - Premium Quality</td>
                                <td><span class="badge bg-info">Stationery</span></td>
                                <td>450</td>
                                <td>Reams</td>
                                <td>$12.50</td>
                                <td>$5,625</td>
                                <td>Main Store</td>
                                <td><span class="badge bg-success">In Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Add Stock</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-minus me-2"></i>Issue Item</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-history me-2"></i>View History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x50/71dd37/ffffff?text=P2" alt="Item" class="rounded">
                                </td>
                                <td><strong>ITM002</strong></td>
                                <td>Student Chairs - Stackable</td>
                                <td><span class="badge bg-warning">Furniture</span></td>
                                <td>25</td>
                                <td>Pieces</td>
                                <td>$45.00</td>
                                <td>$1,125</td>
                                <td>Class 1A</td>
                                <td><span class="badge bg-warning">Low Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Reorder</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Set Alert</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-history me-2"></i>View History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x50/00cfe8/ffffff?text=P3" alt="Item" class="rounded">
                                </td>
                                <td><strong>ITM003</strong></td>
                                <td>Laptop Computers - Dell Inspiron</td>
                                <td><span class="badge bg-primary">Electronics</span></td>
                                <td>15</td>
                                <td>Units</td>
                                <td>$850.00</td>
                                <td>$12,750</td>
                                <td>Computer Lab</td>
                                <td><span class="badge bg-success">In Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Add Stock</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-minus me-2"></i>Issue Item</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-wrench me-2"></i>Maintenance</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x50/ff3e1d/ffffff?text=P4" alt="Item" class="rounded">
                                </td>
                                <td><strong>ITM004</strong></td>
                                <td>Basketballs - Size 7</td>
                                <td><span class="badge bg-purple">Sports Equipment</span></td>
                                <td>0</td>
                                <td>Pieces</td>
                                <td>$25.00</td>
                                <td>$0</td>
                                <td>Sports Room</td>
                                <td><span class="badge bg-danger">Out of Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-shopping-bag me-2"></i>Order Now</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Set Alert</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-history me-2"></i>View History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x50/696cff/ffffff?text=P5" alt="Item" class="rounded">
                                </td>
                                <td><strong>ITM005</strong></td>
                                <td>Microscope - Laboratory Grade</td>
                                <td><span class="badge bg-info">Lab Equipment</span></td>
                                <td>8</td>
                                <td>Units</td>
                                <td>$320.00</td>
                                <td>$2,560</td>
                                <td>Science Lab</td>
                                <td><span class="badge bg-success">In Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Add Stock</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-wrench me-2"></i>Calibration</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-history me-2"></i>Usage Log</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x50/71dd37/ffffff?text=P6" alt="Item" class="rounded">
                                </td>
                                <td><strong>ITM006</strong></td>
                                <td>Whiteboard Markers - Set of 12</td>
                                <td><span class="badge bg-info">Stationery</span></td>
                                <td>45</td>
                                <td>Sets</td>
                                <td>$8.50</td>
                                <td>$382.50</td>
                                <td>Office</td>
                                <td><span class="badge bg-warning">Low Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Reorder</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Set Alert</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-history me-2"></i>View History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x50/00cfe8/ffffff?text=P7" alt="Item" class="rounded">
                                </td>
                                <td><strong>ITM007</strong></td>
                                <td>Cleaning Solution - All Purpose</td>
                                <td><span class="badge bg-secondary">Cleaning Supplies</span></td>
                                <td>12</td>
                                <td>Gallons</td>
                                <td>$15.00</td>
                                <td>$180</td>
                                <td>Janitor Room</td>
                                <td><span class="badge bg-success">In Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Add Stock</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-minus me-2"></i>Issue Item</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-history me-2"></i>View History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x50/ffab00/ffffff?text=P8" alt="Item" class="rounded">
                                </td>
                                <td><strong>ITM008</strong></td>
                                <td>Projector - Epson EB-X41</td>
                                <td><span class="badge bg-primary">Electronics</span></td>
                                <td>3</td>
                                <td>Units</td>
                                <td>$450.00</td>
                                <td>$1,350</td>
                                <td>AV Room</td>
                                <td><span class="badge bg-warning">Low Stock</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Reorder</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-wrench me-2"></i>Maintenance</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-history me-2"></i>Usage Log</a></li>
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

<!-- Add Item Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Item</h5>
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
                                <div class="col-md-3 mb-3">
                                    <label for="itemImage" class="form-label">Item Image</label>
                                    <input type="file" class="form-control" id="itemImage" accept="image/*">
                                    <small class="text-muted">Upload item image</small>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="itemCode" class="form-label">Item Code</label>
                                    <input type="text" class="form-control" id="itemCode" placeholder="Auto-generated" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="itemName" class="form-label">Item Name *</label>
                                    <input type="text" class="form-control" id="itemName" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="itemCategory" class="form-label">Category *</label>
                                    <select class="form-select" id="itemCategory" required>
                                        <option value="">Select Category</option>
                                        <option value="stationery">Stationery</option>
                                        <option value="furniture">Furniture</option>
                                        <option value="electronics">Electronics</option>
                                        <option value="sports">Sports Equipment</option>
                                        <option value="lab">Lab Equipment</option>
                                        <option value="cleaning">Cleaning Supplies</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="itemQuantity" class="form-label">Quantity *</label>
                                    <input type="number" class="form-control" id="itemQuantity" min="0" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="itemUnit" class="form-label">Unit *</label>
                                    <select class="form-select" id="itemUnit" required>
                                        <option value="">Select Unit</option>
                                        <option value="pieces">Pieces</option>
                                        <option value="sets">Sets</option>
                                        <option value="boxes">Boxes</option>
                                        <option value="reams">Reams</option>
                                        <option value="liters">Liters</option>
                                        <option value="kg">Kilograms</option>
                                        <option value="units">Units</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="unitPrice" class="form-label">Unit Price *</label>
                                    <input type="number" class="form-control" id="unitPrice" min="0" step="0.01" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="minStock" class="form-label">Minimum Stock Level</label>
                                    <input type="number" class="form-control" id="minStock" min="0">
                                    <small class="text-muted">Alert when below this level</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="itemLocation" class="form-label">Storage Location *</label>
                                    <select class="form-select" id="itemLocation" required>
                                        <option value="">Select Location</option>
                                        <option value="store">Main Store</option>
                                        <option value="science_lab">Science Lab</option>
                                        <option value="computer_lab">Computer Lab</option>
                                        <option value="library">Library</option>
                                        <option value="office">Office</option>
                                        <option value="sports_room">Sports Room</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="supplier" class="form-label">Supplier</label>
                                    <select class="form-select" id="supplier">
                                        <option value="">Select Supplier</option>
                                        <option value="supplier1">Office Supplies Ltd</option>
                                        <option value="supplier2">Tech Solutions</option>
                                        <option value="supplier3">Sports World</option>
                                        <option value="supplier4">Lab Equipment Co</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="purchaseDate" class="form-label">Purchase Date</label>
                                    <input type="date" class="form-control" id="purchaseDate" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="itemDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="itemDescription" rows="3" placeholder="Enter item description..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Specifications -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Specifications</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="brand" class="form-label">Brand/Manufacturer</label>
                                    <input type="text" class="form-control" id="brand">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="model" class="form-label">Model Number</label>
                                    <input type="text" class="form-control" id="model">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="serialNumber" class="form-label">Serial Number</label>
                                    <input type="text" class="form-control" id="serialNumber">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="warranty" class="form-label">Warranty Period</label>
                                    <input type="text" class="form-control" id="warranty" placeholder="e.g., 2 years">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="condition" class="form-label">Condition</label>
                                    <select class="form-select" id="condition">
                                        <option value="new">New</option>
                                        <option value="good">Good</option>
                                        <option value="fair">Fair</option>
                                        <option value="poor">Poor</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="maintenance" class="form-label">Maintenance Schedule</label>
                                    <select class="form-select" id="maintenance">
                                        <option value="none">None</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="annually">Annually</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Draft</button>
                <button type="button" class="btn btn-success">Add Item</button>
            </div>
        </div>
    </div>
</div>

<!-- Purchase Order Modal -->
<div class="modal fade" id="purchaseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Purchase Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="poNumber" class="form-label">PO Number</label>
                            <input type="text" class="form-control" id="poNumber" placeholder="Auto-generated" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="poSupplier" class="form-label">Supplier *</label>
                            <select class="form-select" id="poSupplier" required>
                                <option value="">Select Supplier</option>
                                <option value="supplier1">Office Supplies Ltd</option>
                                <option value="supplier2">Tech Solutions</option>
                                <option value="supplier3">Sports World</option>
                                <option value="supplier4">Lab Equipment Co</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="poDate" class="form-label">Order Date *</label>
                            <input type="date" class="form-control" id="poDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="expectedDate" class="form-label">Expected Delivery *</label>
                            <input type="date" class="form-control" id="expectedDate" required>
                        </div>
                    </div>

                    <div class="table-responsive mb-3">
                        <table class="table table-bordered" id="itemsTable">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-select">
                                            <option value="">Select Item</option>
                                            <option value="ITM001">A4 Paper - Premium Quality</option>
                                            <option value="ITM002">Student Chairs - Stackable</option>
                                            <option value="ITM003">Laptop Computers - Dell Inspiron</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" placeholder="Auto-filled"></td>
                                    <td><input type="number" class="form-control" min="1" value="1"></td>
                                    <td><input type="number" class="form-control" min="0" step="0.01" placeholder="0.00"></td>
                                    <td><input type="number" class="form-control" min="0" step="0.01" placeholder="0.00" readonly></td>
                                    <td><button type="button" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Subtotal:</strong></td>
                                    <td><input type="number" class="form-control" min="0" step="0.01" placeholder="0.00" readonly></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Tax (10%):</strong></td>
                                    <td><input type="number" class="form-control" min="0" step="0.01" placeholder="0.00" readonly></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Total:</strong></td>
                                    <td><input type="number" class="form-control" min="0" step="0.01" placeholder="0.00" readonly></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mb-3">
                        <button type="button" class="btn btn-outline-primary">
                            <i class="bx bx-plus me-1"></i> Add Item
                        </button>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" rows="3" placeholder="Additional notes for the supplier..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Draft</button>
                <button type="button" class="btn btn-success">Submit PO</button>
            </div>
        </div>
    </div>
</div>

<!-- Stock Report Modal -->
<div class="modal fade" id="stockModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Stock Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="current">Current Stock Status</option>
                        <option value="low_stock">Low Stock Items</option>
                        <option value="out_of_stock">Out of Stock Items</option>
                        <option value="valuation">Stock Valuation</option>
                        <option value="movement">Stock Movement</option>
                        <option value="expiry">Expiry Report</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="reportCategory" class="form-label">Category Filter</label>
                        <select class="form-select" id="reportCategory">
                            <option value="">All Categories</option>
                            <option value="stationery">Stationery</option>
                            <option value="furniture">Furniture</option>
                            <option value="electronics">Electronics</option>
                            <option value="sports">Sports Equipment</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="reportLocation" class="form-label">Location Filter</label>
                        <select class="form-select" id="reportLocation">
                            <option value="">All Locations</option>
                            <option value="store">Main Store</option>
                            <option value="science_lab">Science Lab</option>
                            <option value="computer_lab">Computer Lab</option>
                        </select>
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
                <div class="mb-3">
                    <label class="form-label">Include Options</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeImages" checked>
                        <label class="form-check-label" for="includeImages">
                            Item Images
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeCharts">
                        <label class="form-check-label" for="includeCharts">
                            Charts & Graphs
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeHistory">
                        <label class="form-check-label" for="includeHistory">
                            Movement History
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info">Generate Report</button>
            </div>
        </div>
    </div>
</div>
@endsection
