@extends('layouts.app')

@section('title', 'Roles & Permissions')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Roles & Permissions</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createRoleModal">
                        <i class="bx bx-plus me-1"></i> Create Role
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignModal">
                        <i class="bx bx-user-plus me-1"></i> Assign Role
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Role Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">8</h4>
                                        <p class="mb-0">Total Roles</p>
                                        <small class="text-muted">Active</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-shield avatar-icon"></i>
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
                                        <h4 class="mb-0">156</h4>
                                        <p class="mb-0">Total Permissions</p>
                                        <small class="text-muted">Across all roles</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-key avatar-icon"></i>
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
                                        <h4 class="mb-0">23</h4>
                                        <p class="mb-0">Custom Roles</p>
                                        <small class="text-muted">User-defined</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-cog avatar-icon"></i>
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
                                        <h4 class="mb-0">5</h4>
                                        <p class="mb-0">System Roles</p>
                                        <small class="text-muted">Built-in</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-lock avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Roles Table -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">System Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Description</th>
                                        <th>Users Count</th>
                                        <th>Permissions</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Super Admin</strong></td>
                                        <td>Full system access and control</td>
                                        <td>2</td>
                                        <td><span class="badge bg-primary">All Permissions</span></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoleModal"><i class="bx bx-show me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateRoleModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#usersInRoleModal"><i class="bx bx-users me-2"></i>View Users</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Admin</strong></td>
                                        <td>Administrative access to most features</td>
                                        <td>6</td>
                                        <td><span class="badge bg-success">45 Permissions</span></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoleModal"><i class="bx bx-show me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateRoleModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#usersInRoleModal"><i class="bx bx-users me-2"></i>View Users</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Teacher</strong></td>
                                        <td>Academic and class management access</td>
                                        <td>45</td>
                                        <td><span class="badge bg-info">28 Permissions</span></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoleModal"><i class="bx bx-show me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateRoleModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#usersInRoleModal"><i class="bx bx-users me-2"></i>View Users</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Student</strong></td>
                                        <td>Limited access for students</td>
                                        <td>502</td>
                                        <td><span class="badge bg-warning">12 Permissions</span></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoleModal"><i class="bx bx-show me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateRoleModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#usersInRoleModal"><i class="bx bx-users me-2"></i>View Users</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Parent</strong></td>
                                        <td>Access to view student information</td>
                                        <td>234</td>
                                        <td><span class="badge bg-warning">15 Permissions</span></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoleModal"><i class="bx bx-show me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateRoleModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#usersInRoleModal"><i class="bx bx-users me-2"></i>View Users</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Custom Roles -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Custom Roles</h6>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="refreshCustomRoles()">
                            <i class="bx bx-refresh"></i> Refresh
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Description</th>
                                        <th>Users Count</th>
                                        <th>Permissions</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Librarian</strong></td>
                                        <td>Library management access</td>
                                        <td>3</td>
                                        <td><span class="badge bg-info">18 Permissions</span></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoleModal"><i class="bx bx-show me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateRoleModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#usersInRoleModal"><i class="bx bx-users me-2"></i>View Users</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                                    <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Accountant</strong></td>
                                        <td>Financial management access</td>
                                        <td>2</td>
                                        <td><span class="badge bg-info">22 Permissions</span></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoleModal"><i class="bx bx-show me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateRoleModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#usersInRoleModal"><i class="bx bx-users me-2"></i>View Users</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Deactivate</a></li>
                                                    <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Transport Manager</strong></td>
                                        <td>Transport system management</td>
                                        <td>1</td>
                                        <td><span class="badge bg-info">16 Permissions</span></td>
                                        <td><span class="badge bg-warning">Inactive</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewRoleModal"><i class="bx bx-show me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoleModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateRoleModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#usersInRoleModal"><i class="bx bx-users me-2"></i>View Users</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-success" href="#"><i class="bx bx-play me-2"></i>Activate</a></li>
                                                    <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Permission Matrix -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Permission Matrix</h6>
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#matrixModal">
                            <i class="bx bx-expand"></i> Full View
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Module</th>
                                        <th>Super Admin</th>
                                        <th>Admin</th>
                                        <th>Teacher</th>
                                        <th>Student</th>
                                        <th>Parent</th>
                                        <th>Librarian</th>
                                        <th>Accountant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Dashboard</strong></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Users</strong></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Students</strong></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-minus text-warning"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Teachers</strong></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-minus text-warning"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Exams</strong></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-minus text-warning"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Finance</strong></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Library</strong></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Reports</strong></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-minus text-warning"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Settings</strong></td>
                                        <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                        <td class="text-center"><i class="bx bx-minus text-warning"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                        <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            <small class="text-muted">
                                <i class="bx bx-check text-success"></i> Full Access | 
                                <i class="bx bx-minus text-warning"></i> Limited Access | 
                                <i class="bx bx-x text-danger"></i> No Access
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Role Modal -->
<div class="modal fade" id="createRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="roleName" class="form-label">Role Name *</label>
                            <input type="text" class="form-control" id="roleName" placeholder="Enter role name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="roleType" class="form-label">Role Type</label>
                            <select class="form-select" id="roleType">
                                <option value="custom" selected>Custom Role</option>
                                <option value="system">System Role</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="roleDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="roleDescription" rows="2" placeholder="Describe the role purpose..."></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Permissions</label>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Module</th>
                                        <th>View</th>
                                        <th>Create</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Export</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Dashboard</strong></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Users</strong></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Students</strong></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Teachers</strong></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Exams</strong></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Finance</strong></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Library</strong></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Reports</strong></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Settings</strong></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="customPermissions" class="form-label">Custom Permissions</label>
                        <textarea class="form-control" id="customPermissions" rows="3" placeholder="Enter custom permissions..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createRole()">Create Role</button>
            </div>
        </div>
    </div>
</div>

<!-- View Role Modal -->
<div class="modal fade" id="viewRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Role Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Role Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Role Name:</strong></td>
                                <td>Super Admin</td>
                            </tr>
                            <tr>
                                <td><strong>Type:</strong></td>
                                <td><span class="badge bg-primary">System Role</span></td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td><strong>Users:</strong></td>
                                <td>2 users assigned</td>
                            </tr>
                            <tr>
                                <td><strong>Created:</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-2 years')) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td>Full system access and control</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Role Permissions</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Module</th>
                                        <th>Access</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Dashboard</td>
                                        <td><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Users</td>
                                        <td><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Students</td>
                                        <td><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Teachers</td>
                                        <td><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Exams</td>
                                        <td><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Finance</td>
                                        <td><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Library</td>
                                        <td><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Reports</td>
                                        <td><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Settings</td>
                                        <td><i class="bx bx-check text-success"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editRoleModal">Edit Role</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Role Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editRoleName" class="form-label">Role Name *</label>
                            <input type="text" class="form-control" id="editRoleName" value="Super Admin" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editRoleType" class="form-label">Role Type</label>
                            <select class="form-select" id="editRoleType">
                                <option value="custom">Custom Role</option>
                                <option value="system" selected>System Role</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editRoleDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editRoleDescription" rows="2">Full system access and control</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editRoleStatus" class="form-label">Status</label>
                        <select class="form-select" id="editRoleStatus">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Permissions</label>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Module</th>
                                        <th>View</th>
                                        <th>Create</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Export</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Dashboard</strong></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Users</strong></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Students</strong></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Teachers</strong></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Exams</strong></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Finance</strong></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Library</strong></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Reports</strong></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Settings</strong></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                        <td><input type="checkbox" class="form-check-input" checked></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateRole()">Update Role</button>
            </div>
        </div>
    </div>
</div>

<!-- Duplicate Role Modal -->
<div class="modal fade" id="duplicateRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Duplicate Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="sourceRole" class="form-label">Source Role</label>
                        <input type="text" class="form-control" id="sourceRole" value="Super Admin" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="newRoleName" class="form-label">New Role Name *</label>
                        <input type="text" class="form-control" id="newRoleName" placeholder="Enter new role name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="newRoleDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="newRoleDescription" rows="2" placeholder="Describe the new role..."></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="copyPermissions" checked>
                            <label class="form-check-label" for="copyPermissions">
                                Copy permissions from source role
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="copyUsers">
                            <label class="form-check-label" for="copyUsers">
                                Copy users from source role
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="duplicateRole()">Duplicate Role</button>
            </div>
        </div>
    </div>
</div>

<!-- Users in Role Modal -->
<div class="modal fade" id="usersInRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Users in Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="roleName" class="form-label">Role</label>
                    <input type="text" class="form-control" id="roleName" value="Super Admin" readonly>
                </div>
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Assigned Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                                <td><span class="badge bg-success">Active</span></td>
                                <td>{{ date('Y-m-d', strtotime('-2 years')) }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-warning" onclick="removeUserFromRole()">Remove</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Sarah Johnson</div>
                                            <small class="text-muted">ID: USR002</small>
                                        </div>
                                    </div>
                                </td>
                                <td>sarah.johnson@school.com</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>{{ date('Y-m-d', strtotime('-1 year')) }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-warning" onclick="removeUserFromRole()">Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignModal">
                        <i class="bx bx-user-plus me-1"></i> Assign Users
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Assign Role Modal -->
<div class="modal fade" id="assignModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Role to Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="assignRole" class="form-label">Role *</label>
                            <select class="form-select" id="assignRole" required>
                                <option value="">Select Role</option>
                                <option value="super_admin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                                <option value="parent">Parent</option>
                                <option value="librarian">Librarian</option>
                                <option value="accountant">Accountant</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="assignType" class="form-label">Assignment Type</label>
                            <select class="form-select" id="assignType">
                                <option value="add">Add Role (Keep existing)</option>
                                <option value="replace">Replace Role (Remove existing)</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="userSearch" class="form-label">Search Users</label>
                        <input type="text" class="form-control" id="userSearch" placeholder="Search by name or email...">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Available Users</label>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAllUsers"></th>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Current Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="userSelect[]" value="USR003"></td>
                                        <td>Michael Brown</td>
                                        <td>michael.brown@school.com</td>
                                        <td><span class="badge bg-success">Teacher</span></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="userSelect[]" value="USR004"></td>
                                        <td>Emily Davis</td>
                                        <td>emily.davis@school.com</td>
                                        <td><span class="badge bg-warning">Student</span></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="userSelect[]" value="USR005"></td>
                                        <td>Robert Wilson</td>
                                        <td>robert.wilson@school.com</td>
                                        <td><span class="badge bg-info">Parent</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="assignRole()">Assign Role</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Roles & Permissions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportType" class="form-label">Export Type</label>
                        <select class="form-select" id="exportType">
                            <option value="roles">Roles Only</option>
                            <option value="permissions">Permissions Only</option>
                            <option value="matrix">Permission Matrix</option>
                            <option value="users">Users with Roles</option>
                            <option value="all">Complete Export</option>
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
                        <label for="exportEmail" class="form-label">Email Export</label>
                        <input type="email" class="form-control" id="exportEmail" placeholder="admin@school.com">
                        <small class="text-muted">Optional: Send export to email address</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportRoles()">Export</button>
            </div>
        </div>
    </div>
</div>

<!-- Matrix Modal -->
<div class="modal fade" id="matrixModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Complete Permission Matrix</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Module / Action</th>
                                <th>Super Admin</th>
                                <th>Admin</th>
                                <th>Teacher</th>
                                <th>Student</th>
                                <th>Parent</th>
                                <th>Librarian</th>
                                <th>Accountant</th>
                                <th>Transport Manager</th>
                                <th>Hostel Manager</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="10" class="bg-light"><strong>Dashboard</strong></td>
                            </tr>
                            <tr>
                                <td>View Dashboard</td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                            </tr>
                            <tr>
                                <td colspan="10" class="bg-light"><strong>Users Management</strong></td>
                            </tr>
                            <tr>
                                <td>View Users</td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td>Create Users</td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td>Edit Users</td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                            </tr>
                            <tr>
                                <td>Delete Users</td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-check text-success"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                                <td class="text-center"><i class="bx bx-x text-danger"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="exportMatrix()">Export Matrix</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('selectAllUsers').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="userSelect[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

function createRole() {
    const roleName = document.getElementById('roleName').value;
    const roleDescription = document.getElementById('roleDescription').value;
    
    if (!roleName) {
        alert('Please enter a role name');
        return;
    }
    
    alert(`Creating role: ${roleName}...`);
    document.getElementById('createRoleModal').querySelector('.btn-close').click();
}

function updateRole() {
    const roleName = document.getElementById('editRoleName').value;
    
    alert(`Updating role: ${roleName}...`);
    document.getElementById('editRoleModal').querySelector('.btn-close').click();
}

function duplicateRole() {
    const sourceRole = document.getElementById('sourceRole').value;
    const newRoleName = document.getElementById('newRoleName').value;
    
    if (!newRoleName) {
        alert('Please enter a new role name');
        return;
    }
    
    alert(`Duplicating role "${sourceRole}" as "${newRoleName}"...`);
    document.getElementById('duplicateRoleModal').querySelector('.btn-close').click();
}

function assignRole() {
    const assignRole = document.getElementById('assignRole').value;
    const assignType = document.getElementById('assignType').value;
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    
    if (!assignRole) {
        alert('Please select a role');
        return;
    }
    
    if (selected.length === 0) {
        alert('Please select users to assign');
        return;
    }
    
    alert(`Assigning ${assignRole} role to ${selected.length} users (${assignType})...`);
    document.getElementById('assignModal').querySelector('.btn-close').click();
}

function removeUserFromRole() {
    if (confirm('Are you sure you want to remove this user from the role?')) {
        alert('User removed from role successfully!');
    }
}

function exportRoles() {
    const exportType = document.getElementById('exportType').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportType} in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
}

function exportMatrix() {
    alert('Exporting permission matrix...');
    document.getElementById('matrixModal').querySelector('.btn-close').click();
}

function refreshCustomRoles() {
    alert('Refreshing custom roles list...');
    setTimeout(() => {
        alert('Custom roles list refreshed successfully!');
    }, 1000);
}
</script>
@endsection
