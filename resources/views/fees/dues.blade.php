@extends('layouts.app')

@section('title', 'Pending Dues')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Pending Dues Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sendReminderModal">
                        <i class="bx bx-bell me-1"></i> Send Reminders
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentPlanModal">
                        <i class="bx bx-calendar me-1"></i> Payment Plans
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Dues Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Dues Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">$45,750</h4>
                                        <p class="mb-0">Total Pending Dues</p>
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
                                        <h4 class="mb-0">68</h4>
                                        <p class="mb-0">Students with Dues</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user avatar-icon"></i>
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
                                        <h4 class="mb-0">15</h4>
                                        <p class="mb-0">Overdue Payments</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-error avatar-icon"></i>
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
                                        <h4 class="mb-0">$12,500</h4>
                                        <p class="mb-0">Average Due/Student</p>
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
                        <label for="classFilter" class="form-label">Class</label>
                        <select class="form-select" id="classFilter">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                            <option value="3A">Class 3A</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Due Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="overdue">Overdue</option>
                            <option value="critical">Critical</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="feeTypeFilter" class="form-label">Fee Type</label>
                        <select class="form-select" id="feeTypeFilter">
                            <option value="">All Fee Types</option>
                            <option value="tuition">Tuition Fee</option>
                            <option value="registration">Registration</option>
                            <option value="activity">Activity Fee</option>
                            <option value="transport">Transport</option>
                            <option value="hostel">Hostel</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="amountRange" class="form-label">Amount Range</label>
                        <select class="form-select" id="amountRange">
                            <option value="">All Amounts</option>
                            <option value="0-100">$0 - $100</option>
                            <option value="100-500">$100 - $500</option>
                            <option value="500-1000">$500 - $1000</option>
                            <option value="1000+">$1000+</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="studentSearch" class="form-label">Search Student</label>
                        <input type="text" class="form-control" id="studentSearch" placeholder="Name/ID...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Pending Dues Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Class</th>
                                <th>Fee Type</th>
                                <th>Due Amount</th>
                                <th>Due Date</th>
                                <th>Days Overdue</th>
                                <th>Status</th>
                                <th>Last Reminder</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">STU001</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 1A</td>
                                <td><span class="badge bg-primary">Tuition Fee</span></td>
                                <td>$450.00</td>
                                <td>{{ date('Y-m-d', strtotime('-5 days')) }}</td>
                                <td><span class="badge bg-danger">5 days</span></td>
                                <td><span class="badge bg-danger">Overdue</span></td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Collect Payment</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Send Reminder</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Call Parent</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Set Payment Plan</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-minus me-2"></i>Apply Discount</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Mark as Default</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">Sarah Johnson</div>
                                            <small class="text-muted">STU002</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 1B</td>
                                <td><span class="badge bg-warning">Activity Fee</span></td>
                                <td>$75.00</td>
                                <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                <td><span class="badge bg-warning">1 day</span></td>
                                <td><span class="badge bg-warning">Overdue</span></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Collect Payment</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Send Reminder</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Call Parent</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Set Payment Plan</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-minus me-2"></i>Apply Discount</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Mark as Default</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">Michael Brown</div>
                                            <small class="text-muted">STU003</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 2A</td>
                                <td><span class="badge bg-purple">Transport</span></td>
                                <td>$120.00</td>
                                <td>{{ date('Y-m-d', strtotime('+2 days')) }}</td>
                                <td><span class="badge bg-success">-</span></td>
                                <td><span class="badge bg-primary">Pending</span></td>
                                <td>{{ date('Y-m-d', strtotime('-5 days')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Collect Payment</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Send Reminder</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Call Parent</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Set Payment Plan</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-minus me-2"></i>Apply Discount</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Mark as Default</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">Emily Davis</div>
                                            <small class="text-muted">STU004</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 2B</td>
                                <td><span class="badge bg-danger">Hostel</span></td>
                                <td>$200.00</td>
                                <td>{{ date('Y-m-d', strtotime('-10 days')) }}</td>
                                <td><span class="badge bg-danger">10 days</span></td>
                                <td><span class="badge bg-danger">Critical</span></td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Collect Payment</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Send Reminder</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Call Parent</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Set Payment Plan</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-minus me-2"></i>Apply Discount</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Mark as Default</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">Robert Wilson</div>
                                            <small class="text-muted">STU005</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 3A</td>
                                <td><span class="badge bg-primary">Tuition Fee</span></td>
                                <td>$450.00</td>
                                <td>{{ date('Y-m-d', strtotime('+5 days')) }}</td>
                                <td><span class="badge bg-success">-</span></td>
                                <td><span class="badge bg-primary">Pending</span></td>
                                <td>Never</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Collect Payment</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Send Reminder</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Call Parent</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Set Payment Plan</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-minus me-2"></i>Apply Discount</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Mark as Default</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Student" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        <div>
                                            <div class="fw-bold">Lisa Martinez</div>
                                            <small class="text-muted">STU006</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Class 1A</td>
                                <td><span class="badge bg-info">Registration</span></td>
                                <td>$100.00</td>
                                <td>{{ date('Y-m-d', strtotime('-15 days')) }}</td>
                                <td><span class="badge bg-danger">15 days</span></td>
                                <td><span class="badge bg-danger">Critical</span></td>
                                <td>{{ date('Y-m-d', strtotime('-7 days')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Collect Payment</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Send Reminder</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-phone me-2"></i>Call Parent</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Set Payment Plan</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-minus me-2"></i>Apply Discount</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Mark as Default</a></li>
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

<!-- Send Reminder Modal -->
<div class="modal fade" id="sendReminderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Payment Reminders</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reminderType" class="form-label">Reminder Type</label>
                            <select class="form-select" id="reminderType">
                                <option value="pending">Pending Payments</option>
                                <option value="overdue">Overdue Payments</option>
                                <option value="critical">Critical Overdue</option>
                                <option value="custom">Custom Selection</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reminderMethod" class="form-label">Reminder Method</label>
                            <select class="form-select" id="reminderMethod">
                                <option value="sms">SMS Only</option>
                                <option value="email">Email Only</option>
                                <option value="both">SMS & Email</option>
                                <option value="call">Phone Call</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reminderClass" class="form-label">Class Filter</label>
                            <select class="form-select" id="reminderClass">
                                <option value="">All Classes</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reminderFeeType" class="form-label">Fee Type Filter</label>
                            <select class="form-select" id="reminderFeeType">
                                <option value="">All Fee Types</option>
                                <option value="tuition">Tuition Fee</option>
                                <option value="registration">Registration</option>
                                <option value="activity">Activity Fee</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reminderMessage" class="form-label">Custom Message</label>
                        <textarea class="form-control" id="reminderMessage" rows="4" placeholder="Enter custom reminder message...">Dear Parent,

This is a reminder that your child's school fee payment is due. Please make the payment at your earliest convenience to avoid late fees.

Amount Due: $[AMOUNT]
Due Date: [DUE_DATE]

Thank you for your cooperation.</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Selected Students</label>
                        <div class="border p-2" style="max-height: 200px; overflow-y: auto;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="selectAllStudents" checked>
                                <label class="form-check-label" for="selectAllStudents">
                                    Select All (68 students)
                                </label>
                            </div>
                            <hr>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label">
                                    John Smith (STU001) - $450.00
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label">
                                    Sarah Johnson (STU002) - $75.00
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label">
                                    Michael Brown (STU003) - $120.00
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        <strong>Summary:</strong> 68 students selected | Total amount: $45,750
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Preview Messages</button>
                <button type="button" class="btn btn-success">Send Reminders</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment Plan Modal -->
<div class="modal fade" id="paymentPlanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Set Payment Plans</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="planClass" class="form-label">Class</label>
                            <select class="form-select" id="planClass">
                                <option value="">All Classes</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="planType" class="form-label">Plan Type</label>
                            <select class="form-select" id="planType">
                                <option value="2_installments">2 Installments</option>
                                <option value="3_installments">3 Installments</option>
                                <option value="4_installments">4 Installments</option>
                                <option value="custom">Custom Plan</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="firstPayment" class="form-label">First Payment Date</label>
                            <input type="date" class="form-control" id="firstPayment">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="paymentFrequency" class="form-label">Payment Frequency</label>
                            <select class="form-select" id="paymentFrequency">
                                <option value="weekly">Weekly</option>
                                <option value="biweekly">Bi-weekly</option>
                                <option value="monthly">Monthly</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive mb-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAllPlans"></th>
                                    <th>Student</th>
                                    <th>Total Due</th>
                                    <th>Plan Type</th>
                                    <th>Installment Amount</th>
                                    <th>Payment Schedule</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" class="plan-checkbox" checked></td>
                                    <td>John Smith (STU001)</td>
                                    <td>$450.00</td>
                                    <td>3 Installments</td>
                                    <td>$150.00</td>
                                    <td>Monthly</td>
                                    <td><span class="badge bg-primary">Pending Setup</span></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="plan-checkbox" checked></td>
                                    <td>Sarah Johnson (STU002)</td>
                                    <td>$75.00</td>
                                    <td>2 Installments</td>
                                    <td>$37.50</td>
                                    <td>Bi-weekly</td>
                                    <td><span class="badge bg-primary">Pending Setup</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="alert alert-info">
                        <strong>Selected:</strong> 2 students | Total monthly collection: $187.50
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Set Payment Plans</button>
            </div>
        </div>
    </div>
</div>

<!-- Dues Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dues Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="summary">Dues Summary</option>
                        <option value="overdue">Overdue Analysis</option>
                        <option value="by_class">By Class</option>
                        <option value="by_fee_type">By Fee Type</option>
                        <option value="aging">Aging Report</option>
                        <option value="collection_forecast">Collection Forecast</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="reportClass" class="form-label">Class Filter</label>
                        <select class="form-select" id="reportClass">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                            <option value="3A">Class 3A</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="reportFormat" class="form-label">Format</label>
                        <select class="form-select" id="reportFormat">
                            <option value="pdf">PDF</option>
                            <option value="excel">Excel</option>
                            <option value="csv">CSV</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Include Options</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeCharts" checked>
                        <label class="form-check-label" for="includeCharts">
                            Charts & Graphs
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeDetails" checked>
                        <label class="form-check-label" for="includeDetails">
                            Detailed Student List
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeRecommendations">
                        <label class="form-check-label" for="includeRecommendations">
                            Recommendations
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
