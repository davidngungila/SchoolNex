@extends('layouts.app')

@section('title', 'Teacher Payroll')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Teacher Payroll Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generatePayrollModal">
                        <i class="bx bx-plus me-1"></i> Generate Payroll
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bx bx-upload me-1"></i> Import Payroll
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export Payroll
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Payroll Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">32</h4>
                                        <p class="mb-0">Total Teachers</p>
                                        <small class="text-muted">Active staff</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-group avatar-icon"></i>
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
                                        <h4 class="mb-0">$48,750</h4>
                                        <p class="mb-0">Total Payroll</p>
                                        <small class="text-muted">This month</small>
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
                                        <h4 class="mb-0">$1,525</h4>
                                        <p class="mb-0">Average Salary</p>
                                        <small class="text-muted">Per teacher</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-chart avatar-icon"></i>
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
                                        <h4 class="mb-0">95.2%</h4>
                                        <p class="mb-0">On-time Payment</p>
                                        <small class="text-muted">This month</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-check-circle avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="payrollMonth" class="form-label">Month</label>
                        <select class="form-select" id="payrollMonth">
                            <option value="">All Months</option>
                            <option value="2024-04" selected>April 2024</option>
                            <option value="2024-03">March 2024</option>
                            <option value="2024-02">February 2024</option>
                            <option value="2024-01">January 2024</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="payrollDepartment" class="form-label">Department</label>
                        <select class="form-select" id="payrollDepartment">
                            <option value="">All Departments</option>
                            <option value="mathematics">Mathematics</option>
                            <option value="english">English</option>
                            <option value="science">Science</option>
                            <option value="history">History</option>
                            <option value="geography">Geography</option>
                            <option value="administration">Administration</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="payrollStatus" class="form-label">Status</label>
                        <select class="form-select" id="payrollStatus">
                            <option value="">All Status</option>
                            <option value="paid">Paid</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchTeacher" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchTeacher" placeholder="Search teacher...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Payroll Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>Teacher ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Base Salary</th>
                                <th>Allowances</th>
                                <th>Deductions</th>
                                <th>Net Salary</th>
                                <th>Status</th>
                                <th>Payment Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="teacherSelect[]" value="TCH001"></td>
                                <td><strong>TCH001</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Sarah Johnson</div>
                                            <small class="text-muted">sarah.johnson@schoolnex.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-primary">Mathematics</span></td>
                                <td><span class="badge bg-info">Senior Teacher</span></td>
                                <td>$2,500</td>
                                <td>$300</td>
                                <td>$450</td>
                                <td><strong>$2,350</strong></td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPayslipModal"><i class="bx bx-show me-2"></i>View Payslip</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPayrollModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Process Payment</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#historyModal"><i class="bx bx-history me-2"></i>Payment History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="teacherSelect[]" value="TCH002"></td>
                                <td><strong>TCH002</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Michael Brown</div>
                                            <small class="text-muted">michael.brown@schoolnex.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Science</span></td>
                                <td><span class="badge bg-info">Department Head</span></td>
                                <td>$2,800</td>
                                <td>$400</td>
                                <td>$520</td>
                                <td><strong>$2,680</strong></td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPayslipModal"><i class="bx bx-show me-2"></i>View Payslip</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPayrollModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Process Payment</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#historyModal"><i class="bx bx-history me-2"></i>Payment History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="teacherSelect[]" value="TCH003"></td>
                                <td><strong>TCH003</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Emily Davis</div>
                                            <small class="text-muted">emily.davis@schoolnex.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">English</span></td>
                                <td><span class="badge bg-info">Junior Teacher</span></td>
                                <td>$2,200</td>
                                <td>$250</td>
                                <td>$380</td>
                                <td><strong>$2,070</strong></td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPayslipModal"><i class="bx bx-show me-2"></i>View Payslip</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPayrollModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Process Payment</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-target="#historyModal"><i class="bx bx-history me-2"></i>Payment History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="teacherSelect[]" value="TCH004"></td>
                                <td><strong>TCH004</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Robert Wilson</div>
                                            <small class="text-muted">robert.wilson@schoolnex.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-primary">History</span></td>
                                <td><span class="badge bg-info">Senior Teacher</span></td>
                                <td>$2,600</td>
                                <td>$350</td>
                                <td>$420</td>
                                <td><strong>$2,530</strong></td>
                                <td><span class="badge bg-danger">Failed</span></td>
                                <td>-</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPayslipModal"><i class="bx bx-show me-2"></i>View Payslip</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPayrollModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Process Payment</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#historyModal"><i class="bx bx-history me-2"></i>Payment History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="teacherSelect[]" value="TCH005"></td>
                                <td><strong>TCH005</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Lisa Martinez</div>
                                            <small class="text-muted">lisa.martinez@schoolnex.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Science</span></td>
                                <td><span class="badge bg-info">Lab Assistant</span></td>
                                <td>$1,800</td>
                                <td>$200</td>
                                <td>$290</td>
                                <td><strong>$1,710</strong></td>
                                <td><span class="badge bg-warning">Processing</span></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPayslipModal"><i class="bx bx-show me-2"></i>View Payslip</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPayrollModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal"><i class="bx bx-dollar me-2"></i>Process Payment</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#historyModal"><i class="bx bx-history me-2"></i>Payment History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download PDF</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Bulk Actions -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-primary" onclick="bulkProcessPayment()">
                                <i class="bx bx-dollar me-1"></i> Process Selected Payments
                            </button>
                            <button type="button" class="btn btn-outline-success" onclick="bulkGeneratePayslips()">
                                <i class="bx bx-file me-1"></i> Generate Payslips
                            </button>
                            <button type="button" class="btn btn-outline-info" onclick="bulkExport()">
                                <i class="bx bx-download me-1"></i> Export Selected
                            </button>
                            <button type="button" class="btn btn-outline-warning" onclick="bulkEmail()">
                                <i class="bx bx-envelope me-1"></i> Email Payslips
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Payroll pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Generate Payroll Modal -->
<div class="modal fade" id="generatePayrollModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Payroll</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="payrollMonth" class="form-label">Payroll Month *</label>
                            <input type="month" class="form-control" id="payrollMonth" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="payrollYear" class="form-label">Year *</label>
                            <input type="number" class="form-control" id="payrollYear" value="2024" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="payrollType" class="form-label">Payroll Type *</label>
                            <select class="form-select" id="payrollType" required>
                                <option value="">Select Type</option>
                                <option value="monthly">Monthly</option>
                                <option value="biweekly">Bi-weekly</option>
                                <option value="weekly">Weekly</option>
                                <option value="custom">Custom Period</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="departmentFilter" class="form-label">Department</label>
                            <select class="form-select" id="departmentFilter">
                                <option value="">All Departments</option>
                                <option value="mathematics">Mathematics</option>
                                <option value="english">English</option>
                                <option value="science">Science</option>
                                <option value="history">History</option>
                                <option value="geography">Geography</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeDeductions" checked>
                                <label class="form-check-label" for="includeDeductions">Include standard deductions</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeAllowances" checked>
                                <label class="form-check-label" for="includeAllowances">Include standard allowances</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="generatePayslips" checked>
                                <label class="form-check-label" for="generatePayslips">Generate payslips for all teachers</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="generatePayroll()">Generate Payroll</button>
            </div>
        </div>
    </div>
</div>

<!-- View Payslip Modal -->
<div class="modal fade" id="viewPayslipModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payslip Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Employee Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>Sarah Johnson</td>
                            </tr>
                            <tr>
                                <td><strong>ID:</strong></td>
                                <td>TCH001</td>
                            </tr>
                            <tr>
                                <td><strong>Department:</strong></td>
                                <td>Mathematics</td>
                            </tr>
                            <tr>
                                <td><strong>Position:</strong></td>
                                <td>Senior Teacher</td>
                            </tr>
                            <tr>
                                <td><strong>Bank Account:</strong></td>
                                <td>****-****-****-1234</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Payment Details</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Pay Period:</strong></td>
                                <td>April 2024</td>
                            </tr>
                            <tr>
                                <td><strong>Base Salary:</strong></td>
                                <td>$2,500.00</td>
                            </tr>
                            <tr>
                                <td><strong>Allowances:</strong></td>
                                <td>$300.00</td>
                            </tr>
                            <tr>
                                <td><strong>Gross Salary:</strong></td>
                                <td>$2,800.00</td>
                            </tr>
                            <tr>
                                <td><strong>Deductions:</strong></td>
                                <td>$450.00</td>
                            </tr>
                            <tr>
                                <td><strong>Net Salary:</strong></td>
                                <td class="text-success fw-bold">$2,350.00</td>
                            </tr>
                            <tr>
                                <td><strong>Payment Date:</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Paid</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6>Deduction Breakdown</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Deduction Type</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Income Tax</td>
                                        <td>$280.00</td>
                                        <td>Federal tax withholding</td>
                                    </tr>
                                    <tr>
                                        <td>Social Security</td>
                                        <td>$124.25</td>
                                        <td>6.2% of gross salary</td>
                                    </tr>
                                    <tr>
                                        <td>Health Insurance</td>
                                        <td>$45.75</td>
                                        <td>Employee contribution</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="downloadPayslip()">Download PDF</button>
                <button type="button" class="btn btn-info" onclick="emailPayslip()">Email Payslip</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Payroll Modal -->
<div class="modal fade" id="editPayrollModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Payroll Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editBaseSalary" class="form-label">Base Salary *</label>
                            <input type="number" class="form-control" id="editBaseSalary" value="2500" step="0.01" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editAllowances" class="form-label">Allowances</label>
                            <input type="number" class="form-control" id="editAllowances" value="300" step="0.01">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editDeductions" class="form-label">Deductions</label>
                            <input type="number" class="form-control" id="editDeductions" value="450" step="0.01">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editPaymentStatus" class="form-label">Payment Status</label>
                            <select class="form-select" id="editPaymentStatus">
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="paid" selected>Paid</option>
                                <option value="failed">Failed</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editPaymentDate" class="form-label">Payment Date</label>
                            <input type="date" class="form-control" id="editPaymentDate" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="editNotes" class="form-label">Notes</label>
                            <textarea class="form-control" id="editNotes" rows="3" placeholder="Add any notes..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updatePayroll()">Update Payroll</button>
            </div>
        </div>
    </div>
</div>

<!-- Process Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Process Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="paymentTeacher" class="form-label">Teacher *</label>
                        <select class="form-select" id="paymentTeacher" required>
                            <option value="">Select Teacher</option>
                            <option value="TCH001">Sarah Johnson - Mathematics</option>
                            <option value="TCH002">Michael Brown - Science</option>
                            <option value="TCH003">Emily Davis - English</option>
                            <option value="TCH004">Robert Wilson - History</option>
                            <option value="TCH005">Lisa Martinez - Science</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="paymentAmount" class="form-label">Payment Amount *</label>
                        <input type="number" class="form-control" id="paymentAmount" placeholder="0.00" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label">Payment Method *</label>
                        <select class="form-select" id="paymentMethod" required>
                            <option value="">Select Method</option>
                            <option value="bank">Bank Transfer</option>
                            <option value="cash">Cash</option>
                            <option value="check">Check</option>
                            <option value="online">Online Payment</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="paymentDate" class="form-label">Payment Date *</label>
                        <input type="date" class="form-control" id="paymentDate" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="paymentNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="paymentNotes" rows="3" placeholder="Add payment notes..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" onclick="processPayment()">Process Payment</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment History Modal -->
<div class="modal fade" id="historyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('-1 month')) }}</td>
                                <td>Monthly Salary</td>
                                <td>$2,350.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Bank Transfer</td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('-2 months')) }}</td>
                                <td>Monthly Salary</td>
                                <td>$2,680.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Bank Transfer</td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('-3 months')) }}</td>
                                <td>Bonus Payment</td>
                                <td>$500.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Cash</td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('-4 months')) }}</td>
                                <td>Travel Allowance</td>
                                <td>$200.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Check</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="exportHistory()">Export History</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Payroll Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportFormat" class="form-label">Export Format</label>
                        <select class="form-select" id="exportFormat">
                            <option value="pdf">PDF Document</option>
                            <option value="excel">Excel Spreadsheet</option>
                            <option value="csv">CSV File</option>
                            <option value="json">JSON Data</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exportMonth" class="form-label">Month</label>
                        <select class="form-select" id="exportMonth">
                            <option value="">All Months</option>
                            <option value="2024-04" selected>April 2024</option>
                            <option value="2024-03">March 2024</option>
                            <option value="2024-02">February 2024</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exportDepartment" class="form-label">Department</label>
                        <select class="form-select" id="exportDepartment">
                            <option value="">All Departments</option>
                            <option value="mathematics">Mathematics</option>
                            <option value="english">English</option>
                            <option value="science">Science</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeDetails" checked>
                            <label class="form-check-label" for="includeDetails">Include detailed breakdown</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeHistory" checked>
                            <label class="form-check-label" for="includeHistory">Include payment history</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportPayroll()">Export Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Payroll Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="importFile" class="form-label">Select File *</label>
                        <input type="file" class="form-control" id="importFile" accept=".csv,.xlsx,.xls" required>
                        <small class="text-muted">Supported formats: CSV, Excel (.xlsx, .xls)</small>
                    </div>
                    <div class="mb-3">
                        <label for="importType" class="form-label">Import Type</label>
                        <select class="form-select" id="importType">
                            <option value="">Select Type</option>
                            <option value="salary">Salary Data</option>
                            <option value="allowance">Allowance Data</option>
                            <option value="deduction">Deduction Data</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="validateData" checked>
                            <label class="form-check-label" for="validateData">Validate data before import</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="updateExisting" checked>
                            <label class="form-check-label" for="updateExisting">Update existing records</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="alert alert-info">
                            <i class="bx bx-info-circle me-2"></i>
                            <strong>Import Instructions:</strong> Please ensure your file contains the following columns: Teacher ID, Name, Department, Base Salary, Allowances, Deductions.
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="importPayroll()">Import Data</button>
            </div>
        </div>
    </div>
</div>

<script>
// Select all functionality
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="teacherSelect[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

function generatePayroll() {
    const month = document.getElementById('payrollMonth').value;
    const year = document.getElementById('payrollYear').value;
    const type = document.getElementById('payrollType').value;
    
    if (!month || !year || !type) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert(`Generating payroll for ${month} ${year} (${type})...`);
    document.getElementById('generatePayrollModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Payroll generated successfully!');
        location.reload();
    }, 2000);
}

function updatePayroll() {
    const baseSalary = document.getElementById('editBaseSalary').value;
    const allowances = document.getElementById('editAllowances').value;
    const deductions = document.getElementById('editDeductions').value;
    const status = document.getElementById('editPaymentStatus').value;
    
    if (!baseSalary) {
        alert('Base salary is required');
        return;
    }
    
    alert('Updating payroll details...');
    document.getElementById('editPayrollModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Payroll updated successfully!');
        location.reload();
    }, 1500);
}

function processPayment() {
    const teacher = document.getElementById('paymentTeacher').value;
    const amount = document.getElementById('paymentAmount').value;
    const method = document.getElementById('paymentMethod').value;
    const date = document.getElementById('paymentDate').value;
    
    if (!teacher || !amount || !method || !date) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert(`Processing payment of $${amount} for ${teacher} via ${method}...`);
    document.getElementById('paymentModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Payment processed successfully!');
        location.reload();
    }, 2000);
}

function downloadPayslip() {
    alert('Downloading payslip PDF...');
    setTimeout(() => {
        alert('Payslip downloaded successfully!');
    }, 1000);
}

function emailPayslip() {
    alert('Sending payslip via email...');
    setTimeout(() => {
        alert('Payslip sent successfully!');
    }, 1500);
}

function bulkProcessPayment() {
    const selected = document.querySelectorAll('input[name="teacherSelect[]"]:checked');
    
    if (selected.length === 0) {
        alert('Please select at least one teacher');
        return;
    }
    
    alert(`Processing payments for ${selected.length} teachers...`);
    setTimeout(() => {
        alert('Bulk payment processed successfully!');
        location.reload();
    }, 2000);
}

function bulkGeneratePayslips() {
    const selected = document.querySelectorAll('input[name="teacherSelect[]"]:checked');
    
    if (selected.length === 0) {
        alert('Please select at least one teacher');
        return;
    }
    
    alert(`Generating payslips for ${selected.length} teachers...`);
    setTimeout(() => {
        alert('Payslips generated successfully!');
        location.reload();
    }, 2000);
}

function bulkExport() {
    const selected = document.querySelectorAll('input[name="teacherSelect[]"]:checked');
    
    if (selected.length === 0) {
        alert('Please select at least one teacher');
        return;
    }
    
    alert(`Exporting data for ${selected.length} teachers...`);
    setTimeout(() => {
        alert('Data exported successfully!');
    }, 1500);
}

function bulkEmail() {
    const selected = document.querySelectorAll('input[name="teacherSelect[]"]:checked');
    
    if (selected.length === 0) {
        alert('Please select at least one teacher');
        return;
    }
    
    alert(`Emailing payslips for ${selected.length} teachers...`);
    setTimeout(() => {
        alert('Payslips sent successfully!');
    }, 1500);
}

function exportPayroll() {
    const format = document.getElementById('exportFormat').value;
    const month = document.getElementById('exportMonth').value;
    const department = document.getElementById('exportDepartment').value;
    
    alert(`Exporting payroll data in ${format} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Payroll data exported successfully!');
    }, 1500);
}

function importPayroll() {
    const file = document.getElementById('importFile').files[0];
    const type = document.getElementById('importType').value;
    
    if (!file) {
        alert('Please select a file to import');
        return;
    }
    
    alert(`Importing ${type} data...`);
    document.getElementById('importModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Payroll data imported successfully!');
        location.reload();
    }, 2000);
}

function exportHistory() {
    alert('Exporting payment history...');
    document.getElementById('historyModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Payment history exported successfully!');
    }, 1000);
}
</script>
@endsection
