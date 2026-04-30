@extends('layouts.app')

@section('title', 'Budget Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Budget Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createBudgetModal">
                        <i class="bx bx-plus me-1"></i> Create Budget
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#allocateModal">
                        <i class="bx bx-transfer me-1"></i> Allocate Funds
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Budget Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Budget Overview -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">$125,000</h4>
                                        <p class="mb-0">Total Budget</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-wallet avatar-icon"></i>
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
                                        <h4 class="mb-0">$98,750</h4>
                                        <p class="mb-0">Allocated</p>
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
                                        <h4 class="mb-0">$26,250</h4>
                                        <p class="mb-0">Available</p>
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
                                        <h4 class="mb-0">79%</h4>
                                        <p class="mb-0">Utilization</p>
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
                        <label for="budgetYear" class="form-label">Budget Year</label>
                        <select class="form-select" id="budgetYear">
                            <option value="2024" selected>2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="budgetType" class="form-label">Budget Type</label>
                        <select class="form-select" id="budgetType">
                            <option value="">All Types</option>
                            <option value="operational">Operational</option>
                            <option value="capital">Capital</option>
                            <option value="project">Project</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" id="department">
                            <option value="">All Departments</option>
                            <option value="academic">Academic</option>
                            <option value="administrative">Administrative</option>
                            <option value="support">Support</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchBudget" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchBudget" placeholder="Budget name...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Budget Categories Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Allocated Budget</th>
                                <th>Spent</th>
                                <th>Remaining</th>
                                <th>Percentage Used</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Salaries & Wages</strong></td>
                                <td>$45,000</td>
                                <td>$38,500</td>
                                <td>$6,500</td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-success" style="width: 86%">86%</div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">On Track</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit Budget</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Allocate Funds</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>View Report</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Teaching Materials</strong></td>
                                <td>$15,000</td>
                                <td>$12,200</td>
                                <td>$2,800</td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-warning" style="width: 81%">81%</div>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">Warning</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit Budget</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Allocate Funds</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>View Report</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Utilities & Maintenance</strong></td>
                                <td>$12,000</td>
                                <td>$10,800</td>
                                <td>$1,200</td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-danger" style="width: 90%">90%</div>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Critical</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit Budget</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Allocate Funds</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>View Report</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Student Activities</strong></td>
                                <td>$8,000</td>
                                <td>$5,500</td>
                                <td>$2,500</td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-success" style="width: 69%">69%</div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">On Track</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit Budget</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Allocate Funds</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>View Report</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Equipment & Supplies</strong></td>
                                <td>$10,000</td>
                                <td>$4,200</td>
                                <td>$5,800</td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-success" style="width: 42%">42%</div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Good</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit Budget</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Allocate Funds</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>View Report</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Development Projects</strong></td>
                                <td>$15,000</td>
                                <td>$7,500</td>
                                <td>$7,500</td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-warning" style="width: 50%">50%</div>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">In Progress</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit Budget</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-plus me-2"></i>Allocate Funds</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>View Report</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Budget Trends Chart -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Budget Trends</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="budgetChart" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Budget Modal -->
<div class="modal fade" id="createBudgetModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Budget</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="budgetName" class="form-label">Budget Name *</label>
                            <input type="text" class="form-control" id="budgetName" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="budgetType" class="form-label">Budget Type *</label>
                            <select class="form-select" id="budgetType" required>
                                <option value="">Select Type</option>
                                <option value="operational">Operational</option>
                                <option value="capital">Capital</option>
                                <option value="project">Project</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="budgetYear" class="form-label">Fiscal Year *</label>
                            <select class="form-select" id="budgetYear" required>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="totalBudget" class="form-label">Total Budget *</label>
                            <input type="number" class="form-control" id="totalBudget" min="0" step="0.01" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="department">
                                <option value="">Select Department</option>
                                <option value="academic">Academic</option>
                                <option value="administrative">Administrative</option>
                                <option value="support">Support</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="budgetPeriod" class="form-label">Period</label>
                            <select class="form-select" id="budgetPeriod">
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="budgetDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="budgetDescription" rows="3" placeholder="Enter budget description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="budgetCategories" class="form-label">Budget Categories</label>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Allocated Amount</th>
                                        <th>Percentage</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" value="Salaries"></td>
                                        <td><input type="number" class="form-control" value="0" min="0" step="0.01"></td>
                                        <td><span class="percentage">0%</span></td>
                                        <td><button type="button" class="btn btn-sm btn-danger">Remove</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm">Add Category</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Draft</button>
                <button type="button" class="btn btn-success">Create Budget</button>
            </div>
        </div>
    </div>
</div>

<!-- Allocate Funds Modal -->
<div class="modal fade" id="allocateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Allocate Funds</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fromBudget" class="form-label">From Budget</label>
                            <select class="form-select" id="fromBudget">
                                <option value="">Select Budget</option>
                                <option value="main">Main Budget 2024</option>
                                <option value="operational">Operational Budget</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="toCategory" class="form-label">To Category</label>
                            <select class="form-select" id="toCategory">
                                <option value="">Select Category</option>
                                <option value="salaries">Salaries & Wages</option>
                                <option value="materials">Teaching Materials</option>
                                <option value="utilities">Utilities & Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="allocateAmount" class="form-label">Amount *</label>
                            <input type="number" class="form-control" id="allocateAmount" min="0" step="0.01" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="allocateDate" class="form-label">Date *</label>
                            <input type="date" class="form-control" id="allocateDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="allocateReason" class="form-label">Reason *</label>
                        <textarea class="form-control" id="allocateReason" rows="3" required placeholder="Enter reason for fund allocation..."></textarea>
                    </div>
                    <div class="alert alert-info">
                        <strong>Available Balance:</strong> $26,250
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Allocate Funds</button>
            </div>
        </div>
    </div>
</div>

<!-- Budget Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Budget Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Budget Summary</option>
                        <option value="utilization">Budget Utilization</option>
                        <option value="variance">Variance Analysis</option>
                        <option value="forecast">Budget Forecast</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="reportPeriod" class="form-label">Period</label>
                        <select class="form-select" id="reportPeriod">
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="reportFormat" class="form-label">Format</label>
                        <select class="form-select" id="reportFormat">
                            <option value="pdf">PDF</option>
                            <option value="excel">Excel</option>
                        </select>
                    </div>
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
    // Simple chart implementation
    const canvas = document.getElementById('budgetChart');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        // Draw a simple line chart
        ctx.strokeStyle = '#696cff';
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(50, 150);
        ctx.lineTo(150, 120);
        ctx.lineTo(250, 100);
        ctx.lineTo(350, 80);
        ctx.lineTo(450, 60);
        ctx.stroke();
        
        // Add labels
        ctx.fillStyle = '#666';
        ctx.font = '12px Arial';
        ctx.fillText('Jan', 50, 180);
        ctx.fillText('Feb', 150, 180);
        ctx.fillText('Mar', 250, 180);
        ctx.fillText('Apr', 350, 180);
        ctx.fillText('May', 450, 180);
    }
});
</script>
@endsection
