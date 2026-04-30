@extends('layouts.app')

@section('title', 'All Users')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">All Users</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createUserModal">
                        <i class="bx bx-plus me-1"></i> Add User
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bx bx-upload me-1"></i> Import Users
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- User Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">547</h4>
                                        <p class="mb-0">Total Users</p>
                                        <small class="text-muted">+12 this month</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user avatar-icon"></i>
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
                                        <h4 class="mb-0">45</h4>
                                        <p class="mb-0">Teachers</p>
                                        <small class="text-muted">+2 this month</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user-check avatar-icon"></i>
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
                                        <h4 class="mb-0">502</h4>
                                        <p class="mb-0">Students</p>
                                        <small class="text-muted">+10 this month</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-group avatar-icon"></i>
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
                                        <h4 class="mb-0">8</h4>
                                        <p class="mb-0">Admin Staff</p>
                                        <small class="text-muted">No change</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-shield avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="userType" class="form-label">User Type</label>
                        <select class="form-select" id="userType">
                            <option value="">All Types</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                            <option value="parent">Parent</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="userStatus" class="form-label">Status</label>
                        <select class="form-select" id="userStatus">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="suspended">Suspended</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="userRole" class="form-label">Role</label>
                        <select class="form-select" id="userRole">
                            <option value="">All Roles</option>
                            <option value="super_admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                            <option value="parent">Parent</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchUser" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchUser" placeholder="Name, Email...">
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
                            <i class="bx bx-refresh"></i> Reset
                        </button>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="userSelect[]" value="USR001"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">John Smith</div>
                                            <small class="text-muted">ID: USR001</small>
                                        </div>
                                    </div>
                                </td>
                                <td>john.smith@school.com</td>
                                <td><span class="badge bg-primary">Admin</span></td>
                                <td><span class="badge bg-success">Super Admin</span></td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewUserModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal"><i class="bx bx-key me-2"></i>Reset Password</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionsModal"><i class="bx bx-shield me-2"></i>Permissions</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginHistoryModal"><i class="bx bx-history me-2"></i>Login History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="userSelect[]" value="USR002"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Sarah Johnson</div>
                                            <small class="text-muted">ID: USR002</small>
                                        </div>
                                    </div>
                                </td>
                                <td>sarah.johnson@school.com</td>
                                <td><span class="badge bg-success">Teacher</span></td>
                                <td><span class="badge bg-primary">Teacher</span></td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 hours')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewUserModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal"><i class="bx bx-key me-2"></i>Reset Password</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionsModal"><i class="bx bx-shield me-2"></i>Permissions</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginHistoryModal"><i class="bx bx-history me-2"></i>Login History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="userSelect[]" value="USR003"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Michael Brown</div>
                                            <small class="text-muted">ID: USR003</small>
                                        </div>
                                    </div>
                                </td>
                                <td>michael.brown@school.com</td>
                                <td><span class="badge bg-warning">Student</span></td>
                                <td><span class="badge bg-info">Student</span></td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 day')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewUserModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal"><i class="bx bx-key me-2"></i>Reset Password</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionsModal"><i class="bx bx-shield me-2"></i>Permissions</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginHistoryModal"><i class="bx bx-history me-2"></i>Login History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="userSelect[]" value="USR004"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Emily Davis</div>
                                            <small class="text-muted">ID: USR004</small>
                                        </div>
                                    </div>
                                </td>
                                <td>emily.davis@school.com</td>
                                <td><span class="badge bg-warning">Student</span></td>
                                <td><span class="badge bg-info">Student</span></td>
                                <td><span class="badge bg-warning">Suspended</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-3 days')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewUserModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal"><i class="bx bx-key me-2"></i>Reset Password</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionsModal"><i class="bx bx-shield me-2"></i>Permissions</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginHistoryModal"><i class="bx bx-history me-2"></i>Login History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-play me-2"></i>Activate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="userSelect[]" value="USR005"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Robert Wilson</div>
                                            <small class="text-muted">ID: USR005</small>
                                        </div>
                                    </div>
                                </td>
                                <td>robert.wilson@school.com</td>
                                <td><span class="badge bg-info">Parent</span></td>
                                <td><span class="badge bg-warning">Parent</span></td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 week')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewUserModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal"><i class="bx bx-key me-2"></i>Reset Password</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionsModal"><i class="bx bx-shield me-2"></i>Permissions</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginHistoryModal"><i class="bx bx-history me-2"></i>Login History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
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
                            <button type="button" class="btn btn-outline-primary" onclick="bulkActivate()">
                                <i class="bx bx-play me-1"></i> Activate Selected
                            </button>
                            <button type="button" class="btn btn-outline-warning" onclick="bulkSuspend()">
                                <i class="bx bx-pause me-1"></i> Suspend Selected
                            </button>
                            <button type="button" class="btn btn-outline-info" onclick="bulkResetPassword()">
                                <i class="bx bx-key me-1"></i> Reset Password
                            </button>
                            <button type="button" class="btn btn-outline-success" onclick="bulkExport()">
                                <i class="bx bx-download me-1"></i> Export Selected
                            </button>
                            <button type="button" class="btn btn-outline-danger" onclick="deleteSelected()">
                                <i class="bx bx-trash me-1"></i> Delete Selected
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name *</label>
                            <input type="text" class="form-control" id="firstName" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" id="lastName" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="userType" class="form-label">User Type *</label>
                            <select class="form-select" id="userType" required>
                                <option value="">Select Type</option>
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                                <option value="parent">Parent</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="userRole" class="form-label">Role *</label>
                            <select class="form-select" id="userRole" required>
                                <option value="">Select Role</option>
                                <option value="super_admin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                                <option value="parent">Parent</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Username *</label>
                            <input type="text" class="form-control" id="username" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="department">
                                <option value="">Select Department</option>
                                <option value="academic">Academic</option>
                                <option value="admin">Administration</option>
                                <option value="finance">Finance</option>
                                <option value="support">Support</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" rows="2"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sendWelcomeEmail" checked>
                            <label class="form-check-label" for="sendWelcomeEmail">
                                Send welcome email with login credentials
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="requirePasswordChange" checked>
                            <label class="form-check-label" for="requirePasswordChange">
                                Require password change on first login
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createUser()">Create User</button>
            </div>
        </div>
    </div>
</div>

<!-- View User Modal -->
<div class="modal fade" id="viewUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle mb-3" style="width: 100px; height: 100px;">
                            <h5>John Smith</h5>
                            <p class="text-muted">ID: USR001</p>
                            <span class="badge bg-success">Active</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>john.smith@school.com</td>
                            </tr>
                            <tr>
                                <td><strong>Phone:</strong></td>
                                <td>+255 712 345 678</td>
                            </tr>
                            <tr>
                                <td><strong>User Type:</strong></td>
                                <td><span class="badge bg-primary">Admin</span></td>
                            </tr>
                            <tr>
                                <td><strong>Role:</strong></td>
                                <td><span class="badge bg-success">Super Admin</span></td>
                            </tr>
                            <tr>
                                <td><strong>Department:</strong></td>
                                <td>Administration</td>
                            </tr>
                            <tr>
                                <td><strong>Last Login:</strong></td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Created:</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-2 years')) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Address:</strong></td>
                                <td>123 School Street, City, Country</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Recent Activity</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Activity</th>
                                        <th>IP Address</th>
                                        <th>Device</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i') }}</td>
                                        <td>Logged in</td>
                                        <td>192.168.1.100</td>
                                        <td>Chrome on Windows</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i', strtotime('-2 hours')) }}</td>
                                        <td>Updated profile</td>
                                        <td>192.168.1.100</td>
                                        <td>Chrome on Windows</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d H:i', strtotime('-1 day')) }}</td>
                                        <td>Created report</td>
                                        <td>192.168.1.100</td>
                                        <td>Chrome on Windows</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit User</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editFirstName" class="form-label">First Name *</label>
                            <input type="text" class="form-control" id="editFirstName" value="John" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editLastName" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" id="editLastName" value="Smith" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editEmail" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="editEmail" value="john.smith@school.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="editPhone" value="+255 712 345 678">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editUserType" class="form-label">User Type *</label>
                            <select class="form-select" id="editUserType" required>
                                <option value="admin" selected>Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                                <option value="parent">Parent</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editUserRole" class="form-label">Role *</label>
                            <select class="form-select" id="editUserRole" required>
                                <option value="super_admin" selected>Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                                <option value="parent">Parent</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editUsername" class="form-label">Username *</label>
                            <input type="text" class="form-control" id="editUsername" value="johnsmith" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-select" id="editStatus">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editDepartment" class="form-label">Department</label>
                            <select class="form-select" id="editDepartment">
                                <option value="admin" selected>Administration</option>
                                <option value="academic">Academic</option>
                                <option value="finance">Finance</option>
                                <option value="support">Support</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="editAddress" rows="2">123 School Street, City, Country</textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateUser()">Update User</button>
            </div>
        </div>
    </div>
</div>

<!-- Reset Password Modal -->
<div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="resetUser" class="form-label">User</label>
                        <input type="text" class="form-control" id="resetUser" value="John Smith (john.smith@school.com)" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password *</label>
                        <input type="password" class="form-control" id="newPassword" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password *</label>
                        <input type="password" class="form-control" id="confirmPassword" required>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sendPasswordEmail" checked>
                            <label class="form-check-label" for="sendPasswordEmail">
                                Send new password via email
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="requirePasswordChange" checked>
                            <label class="form-check-label" for="requirePasswordChange">
                                Require password change on next login
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning" onclick="resetPassword()">Reset Password</button>
            </div>
        </div>
    </div>
</div>

<!-- Permissions Modal -->
<div class="modal fade" id="permissionsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Permissions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="permissionUser" class="form-label">User</label>
                    <input type="text" class="form-control" id="permissionUser" value="John Smith (john.smith@school.com)" readonly>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Current Role</label>
                    <div>
                        <span class="badge bg-success">Super Admin</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Permissions</label>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Permissions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Dashboard</strong></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_dashboard_view" checked>
                                            <label class="form-check-label" for="perm_dashboard_view">View</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Users</strong></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_users_view" checked>
                                            <label class="form-check-label" for="perm_users_view">View</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_users_create" checked>
                                            <label class="form-check-label" for="perm_users_create">Create</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_users_edit" checked>
                                            <label class="form-check-label" for="perm_users_edit">Edit</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_users_delete" checked>
                                            <label class="form-check-label" for="perm_users_delete">Delete</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Students</strong></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_students_view" checked>
                                            <label class="form-check-label" for="perm_students_view">View</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_students_create" checked>
                                            <label class="form-check-label" for="perm_students_create">Create</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_students_edit" checked>
                                            <label class="form-check-label" for="perm_students_edit">Edit</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_students_delete" checked>
                                            <label class="form-check-label" for="perm_students_delete">Delete</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Reports</strong></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_reports_view" checked>
                                            <label class="form-check-label" for="perm_reports_view">View</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_reports_create" checked>
                                            <label class="form-check-label" for="perm_reports_create">Create</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_reports_export" checked>
                                            <label class="form-check-label" for="perm_reports_export">Export</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Settings</strong></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_settings_view" checked>
                                            <label class="form-check-label" for="perm_settings_view">View</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_settings_edit" checked>
                                            <label class="form-check-label" for="perm_settings_edit">Edit</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="perm_settings_backup" checked>
                                            <label class="form-check-label" for="perm_settings_backup">Backup</label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="customPermissions" class="form-label">Custom Permissions</label>
                    <textarea class="form-control" id="customPermissions" rows="3" placeholder="Add custom permissions..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updatePermissions()">Update Permissions</button>
            </div>
        </div>
    </div>
</div>

<!-- Login History Modal -->
<div class="modal fade" id="loginHistoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="historyUser" class="form-label">User</label>
                    <input type="text" class="form-control" id="historyUser" value="John Smith (john.smith@school.com)" readonly>
                </div>
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>IP Address</th>
                                <th>Device</th>
                                <th>Browser</th>
                                <th>Location</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('Y-m-d H:i') }}</td>
                                <td>192.168.1.100</td>
                                <td>Windows PC</td>
                                <td>Chrome 120.0</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td><span class="badge bg-success">Success</span></td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 day')) }}</td>
                                <td>192.168.1.100</td>
                                <td>Windows PC</td>
                                <td>Chrome 120.0</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td><span class="badge bg-success">Success</span></td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 days')) }}</td>
                                <td>192.168.1.101</td>
                                <td>MacBook Pro</td>
                                <td>Safari 16.0</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td><span class="badge bg-success">Success</span></td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i', strtotime('-3 days')) }}</td>
                                <td>192.168.1.100</td>
                                <td>Windows PC</td>
                                <td>Firefox 115.0</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td><span class="badge bg-success">Success</span></td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i', strtotime('-5 days')) }}</td>
                                <td>192.168.1.100</td>
                                <td>Windows PC</td>
                                <td>Chrome 120.0</td>
                                <td>Dar es Salaam, Tanzania</td>
                                <td><span class="badge bg-danger">Failed</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="exportLoginHistory()">Export History</button>
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="importFile" class="form-label">Import File *</label>
                        <input type="file" class="form-control" id="importFile" accept=".csv,.xlsx,.xls">
                        <small class="text-muted">Supported formats: CSV, Excel</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="importType" class="form-label">Import Type</label>
                        <select class="form-select" id="importType">
                            <option value="create">Create New Users</option>
                            <option value="update">Update Existing Users</option>
                            <option value="both">Create & Update</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sendWelcomeEmail" checked>
                            <label class="form-check-label" for="sendWelcomeEmail">
                                Send welcome email to new users
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="generatePassword" checked>
                            <label class="form-check-label" for="generatePassword">
                                Generate random passwords
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="validateData" checked>
                            <label class="form-check-label" for="validateData">
                                Validate data before import
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="importUsers()">Import Users</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportType" class="form-label">Export Type</label>
                        <select class="form-select" id="exportType">
                            <option value="all">All Users</option>
                            <option value="active">Active Users Only</option>
                            <option value="selected">Selected Users</option>
                            <option value="filtered">Filtered Users</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportFormat" class="form-label">Export Format</label>
                        <select class="form-select" id="exportFormat">
                            <option value="csv">CSV</option>
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF</option>
                            <option value="json">JSON</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportFields" class="form-label">Export Fields</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportBasic" checked>
                            <label class="form-check-label" for="exportBasic">Basic Information</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportContact" checked>
                            <label class="form-check-label" for="exportContact">Contact Information</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportRoles" checked>
                            <label class="form-check-label" for="exportRoles">Roles & Permissions</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportActivity">
                            <label class="form-check-label" for="exportActivity">Activity Log</label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportEmail" class="form-label">Email Export</label>
                        <input type="email" class="form-control" id="exportEmail" placeholder="admin@school.com">
                        <small class="text-muted">Optional: Send export to email address</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportUsers()">Export Users</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="userSelect[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

function createUser() {
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const userType = document.getElementById('userType').value;
    const userRole = document.getElementById('userRole').value;
    
    if (!firstName || !lastName || !email || !userType || !userRole) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert(`Creating user: ${firstName} ${lastName}...`);
    document.getElementById('createUserModal').querySelector('.btn-close').click();
}

function updateUser() {
    const firstName = document.getElementById('editFirstName').value;
    const lastName = document.getElementById('editLastName').value;
    
    alert(`Updating user: ${firstName} ${lastName}...`);
    document.getElementById('editUserModal').querySelector('.btn-close').click();
}

function resetPassword() {
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    if (!newPassword || !confirmPassword) {
        alert('Please enter and confirm the new password');
        return;
    }
    
    if (newPassword !== confirmPassword) {
        alert('Passwords do not match');
        return;
    }
    
    alert('Password reset successfully!');
    document.getElementById('resetPasswordModal').querySelector('.btn-close').click();
}

function updatePermissions() {
    alert('User permissions updated successfully!');
    document.getElementById('permissionsModal').querySelector('.btn-close').click();
}

function exportLoginHistory() {
    alert('Exporting login history...');
    setTimeout(() => {
        alert('Login history exported successfully!');
    }, 1500);
}

function importUsers() {
    const importFile = document.getElementById('importFile').files[0];
    
    if (!importFile) {
        alert('Please select a file to import');
        return;
    }
    
    alert(`Importing users from ${importFile.name}...`);
    document.getElementById('importModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Users imported successfully!');
    }, 2000);
}

function exportUsers() {
    const exportType = document.getElementById('exportType').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportType} users in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Users exported successfully!');
    }, 1500);
}

function bulkActivate() {
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select users to activate');
        return;
    }
    alert(`Activating ${selected.length} users...`);
}

function bulkSuspend() {
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select users to suspend');
        return;
    }
    if (confirm(`Are you sure you want to suspend ${selected.length} users?`)) {
        alert(`Suspending ${selected.length} users...`);
    }
}

function bulkResetPassword() {
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select users to reset password');
        return;
    }
    if (confirm(`Are you sure you want to reset passwords for ${selected.length} users?`)) {
        alert(`Resetting passwords for ${selected.length} users...`);
    }
}

function bulkExport() {
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select users to export');
        return;
    }
    alert(`Exporting ${selected.length} users...`);
}

function deleteSelected() {
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select users to delete');
        return;
    }
    if (confirm(`Are you sure you want to delete ${selected.length} users?`)) {
        alert(`Deleting ${selected.length} users...`);
    }
}
</script>
@endsection
