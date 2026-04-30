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
                                        <h4 class="mb-0">{{ $users->total() }}</h4>
                                        <p class="mb-0">Total Users</p>
                                        <small class="text-muted">+{{ \App\Models\User::whereMonth('created_at', now()->month)->count() }} this month</small>
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
                                        <h4 class="mb-0">{{ \App\Models\User::where('position', 'like', '%teacher%')->orWhere('position', 'like', '%Teacher%')->orWhere('department', 'like', '%education%')->count() }}</h4>
                                        <p class="mb-0">Teachers</p>
                                        <small class="text-muted">+{{ \App\Models\User::where('position', 'like', '%teacher%')->whereMonth('created_at', now()->month)->count() }} this month</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user-voice avatar-icon"></i>
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
                            @forelse($users as $user)
                            <tr>
                                <td><input type="checkbox" name="userSelect[]" value="{{ $user->id }}"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('assets/img/avatars/' . ($user->id % 10 + 1) . '.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">{{ $user->full_name }}</div>
                                            <small class="text-muted">ID: {{ $user->employee_id ?: 'USR' . str_pad($user->id, 3, '0', STR_PAD_LEFT) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge bg-{{ $user->position === 'System Administrator' ? 'primary' : ($user->position && strpos($user->position, 'Teacher') !== false ? 'success' : 'info') }}">{{ $user->position ?: 'User' }}</span></td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="badge bg-{{ $role->name === 'admin' ? 'danger' : ($role->name === 'teacher' ? 'primary' : 'secondary') }}">{{ $role->display_name }}</span>
                                    @endforeach
                                </td>
                                <td><span class="badge bg-{{ $user->is_active ? 'success' : 'danger' }}">{{ $user->is_active ? 'Active' : 'Inactive' }}</span></td>
                                <td>{{ $user->last_login_at ? $user->last_login_at->format('Y-m-d H:i') : 'Never' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item view-user" href="#" data-user-id="{{ $user->id }}"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item edit-user" href="#" data-user-id="{{ $user->id }}"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item reset-password" href="#" data-user-id="{{ $user->id }}" data-user-name="{{ $user->full_name }}"><i class="bx bx-key me-2"></i>Reset Password</a></li>
                                            <li><a class="dropdown-item permissions" href="#" data-user-id="{{ $user->id }}" data-user-name="{{ $user->full_name }}"><i class="bx bx-shield me-2"></i>Permissions</a></li>
                                            <li><a class="dropdown-item login-history" href="#" data-user-id="{{ $user->id }}" data-user-name="{{ $user->full_name }}"><i class="bx bx-history me-2"></i>Login History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning suspend-user" href="#" data-user-id="{{ $user->id }}" data-user-name="{{ $user->full_name }}" data-user-status="{{ $user->is_active ? 'active' : 'inactive' }}"><i class="bx bx-{{ $user->is_active ? 'pause' : 'play' }} me-2"></i>{{ $user->is_active ? 'Suspend' : 'Activate' }}</a></li>
                                            <li><a class="dropdown-item text-danger delete-user" href="#" data-user-id="{{ $user->id }}" data-user-name="{{ $user->full_name }}"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <i class="bx bx-user-x fs-1 text-muted"></i>
                                    <p class="text-muted mb-0">No users found</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted">
                        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users
                    </div>
                    <div>
                        {{ $users->links() }}
                    </div>
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
                <form action="{{ route('users.store') }}" method="POST" id="createUserForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">First Name *</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" required>
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" required>
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" id="phone">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Username *</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password *</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                            @error('date_of_birth')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" name="employee_id" id="employee_id">
                            @error('employee_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" id="department" placeholder="e.g., Mathematics, Administration">
                            @error('department')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control" name="position" id="position" placeholder="e.g., Teacher, Administrator">
                            @error('position')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="join_date" class="form-label">Join Date</label>
                            <input type="date" class="form-control" name="join_date" id="join_date">
                            @error('join_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="roles" class="form-label">Roles *</label>
                            <select class="form-select" name="roles[]" id="roles" multiple required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold Ctrl/Cmd to select multiple roles</small>
                            @error('roles')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="2"></textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" name="bio" id="bio" rows="3" placeholder="Brief description about the user..."></textarea>
                        @error('bio')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active User
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="createUserForm" class="btn btn-primary">Create User</button>
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
                <form id="editUserForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_first_name" class="form-label">First Name *</label>
                            <input type="text" class="form-control" name="first_name" id="edit_first_name" required>
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_last_name" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" name="last_name" id="edit_last_name" required>
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" name="email" id="edit_email" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" id="edit_phone">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_username" class="form-label">Username *</label>
                            <input type="text" class="form-control" name="username" id="edit_username" required>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="edit_date_of_birth">
                            @error('date_of_birth')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="edit_gender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" name="employee_id" id="edit_employee_id">
                            @error('employee_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_department" class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" id="edit_department" placeholder="e.g., Mathematics, Administration">
                            @error('department')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_position" class="form-label">Position</label>
                            <input type="text" class="form-control" name="position" id="edit_position" placeholder="e.g., Teacher, Administrator">
                            @error('position')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_join_date" class="form-label">Join Date</label>
                            <input type="date" class="form-control" name="join_date" id="edit_join_date">
                            @error('join_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_roles" class="form-label">Roles *</label>
                            <select class="form-select" name="roles[]" id="edit_roles" multiple required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold Ctrl/Cmd to select multiple roles</small>
                            @error('roles')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="edit_address" rows="2"></textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_bio" class="form-label">Bio</label>
                        <textarea class="form-control" name="bio" id="edit_bio" rows="3" placeholder="Brief description about the user..."></textarea>
                        @error('bio')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" id="edit_is_active">
                            <label class="form-check-label" for="edit_is_active">
                                Active User
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="editUserForm" class="btn btn-primary">Update User</button>
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

// Form submission handlers for Create and Edit User
document.addEventListener('DOMContentLoaded', function() {
    // Handle Create User form submission
    const createUserForm = document.getElementById('createUserForm');
    if (createUserForm) {
        createUserForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            
            // Show loading state
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="bx bx-loader-alt bx-spin"></i> Creating...';
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        // Close modal and reload page
                        bootstrap.Modal.getInstance(document.getElementById('createUserModal')).hide();
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.message,
                        confirmButtonColor: '#d33'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to create user. Please try again.',
                    confirmButtonColor: '#d33'
                });
            })
            .finally(() => {
                // Reset button state
                submitButton.disabled = false;
                submitButton.innerHTML = originalText;
            });
        });
    }

    // Handle Edit User form submission
    const editUserForm = document.getElementById('editUserForm');
    if (editUserForm) {
        editUserForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            
            // Show loading state
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="bx bx-loader-alt bx-spin"></i> Updating...';
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        // Close modal and reload page
                        bootstrap.Modal.getInstance(document.getElementById('editUserModal')).hide();
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.message,
                        confirmButtonColor: '#d33'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to update user. Please try again.',
                    confirmButtonColor: '#d33'
                });
            })
            .finally(() => {
                // Reset button state
                submitButton.disabled = false;
                submitButton.innerHTML = originalText;
            });
        });
    }
});

// SweetAlert2 confirmations for user actions
document.addEventListener('DOMContentLoaded', function() {
    // View User
    document.querySelectorAll('.view-user').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-user-id');
            // Load user data and show modal
            viewUserDetails(userId);
        });
    });

    // Edit User
    document.querySelectorAll('.edit-user').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-user-id');
            // Load user data and show edit modal
            editUserDetails(userId);
        });
    });

    // Reset Password
    document.querySelectorAll('.reset-password').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-user-id');
            const userName = this.getAttribute('data-user-name');
            
            Swal.fire({
                title: 'Reset Password',
                text: `Are you sure you want to reset the password for ${userName}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset password!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    resetUserPassword(userId);
                }
            });
        });
    });

    // Permissions
    document.querySelectorAll('.permissions').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-user-id');
            const userName = this.getAttribute('data-user-name');
            // Load user permissions and show modal
            showUserPermissions(userId, userName);
        });
    });

    // Login History
    document.querySelectorAll('.login-history').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-user-id');
            const userName = this.getAttribute('data-user-name');
            // Load user login history and show modal
            showUserLoginHistory(userId, userName);
        });
    });

    // Suspend/Activate User
    document.querySelectorAll('.suspend-user').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-user-id');
            const userName = this.getAttribute('data-user-name');
            const userStatus = this.getAttribute('data-user-status');
            const action = userStatus === 'active' ? 'suspend' : 'activate';
            const actionText = action === 'suspend' ? 'Suspend' : 'Activate';
            
            Swal.fire({
                title: `${actionText} User`,
                text: `Are you sure you want to ${action} ${userName}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: action === 'suspend' ? '#f59e0b' : '#10b981',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, ${action} user!`,
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    toggleUserStatus(userId, action);
                }
            });
        });
    });

    // Delete User
    document.querySelectorAll('.delete-user').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-user-id');
            const userName = this.getAttribute('data-user-name');
            
            Swal.fire({
                title: 'Delete User',
                text: `Are you sure you want to delete ${userName}? This action cannot be undone!`,
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete user!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteUser(userId);
                }
            });
        });
    });
});

// API Functions
function viewUserDetails(userId) {
    fetch(`/users/${userId}/view`)
        .then(response => response.json())
        .then(data => {
            // Populate view modal with user data
            const modalBody = document.querySelector('#viewUserModal .modal-body');
            if (modalBody) {
                modalBody.innerHTML = `
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="${data.avatar || '/assets/img/avatars/' + (data.id % 10 + 1) + '.png'}" class="img-fluid rounded-circle mb-3" alt="Avatar" style="max-width: 150px;">
                            <h5 class="mb-3">${data.full_name}</h5>
                            <span class="badge bg-${data.is_active ? 'success' : 'danger'}">${data.is_active ? 'Active' : 'Inactive'}</span>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Email:</strong> ${data.email}</p>
                                    <p><strong>Phone:</strong> ${data.phone || 'N/A'}</p>
                                    <p><strong>Employee ID:</strong> ${data.employee_id || 'N/A'}</p>
                                    <p><strong>Department:</strong> ${data.department || 'N/A'}</p>
                                    <p><strong>Position:</strong> ${data.position || 'N/A'}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Date of Birth:</strong> ${data.date_of_birth || 'N/A'}</p>
                                    <p><strong>Gender:</strong> ${data.gender || 'N/A'}</p>
                                    <p><strong>Join Date:</strong> ${data.join_date || 'N/A'}</p>
                                    <p><strong>Last Login:</strong> ${data.last_login_at ? new Date(data.last_login_at).toLocaleString() : 'Never'}</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p><strong>Roles:</strong></p>
                                <div>
                                    ${data.roles.map(role => `<span class="badge bg-primary me-1">${role}</span>`).join('')}
                                </div>
                            </div>
                            ${data.bio ? `<div class="mt-3"><p><strong>Bio:</strong></p><p>${data.bio}</p></div>` : ''}
                        </div>
                    </div>
                `;
                new bootstrap.Modal(document.getElementById('viewUserModal')).show();
            }
        })
        .catch(error => {
            Swal.fire('Error', 'Failed to load user details', 'error');
        });
}

function editUserDetails(userId) {
    fetch(`/users/${userId}/edit`)
        .then(response => response.json())
        .then(data => {
            // Populate edit modal with user data
            const form = document.querySelector('#editUserModal form');
            if (form) {
                // Set form action
                form.action = `/users/${userId}`;
                
                // Fill form fields with user data
                const fields = ['first_name', 'last_name', 'email', 'phone', 'username', 'date_of_birth', 'gender', 'address', 'employee_id', 'department', 'position', 'join_date', 'bio'];
                fields.forEach(field => {
                    const input = form.querySelector(`[name="${field}"]`);
                    if (input && data[field]) {
                        input.value = data[field];
                    }
                });
                
                // Handle roles selection
                const rolesSelect = form.querySelector('[name="roles[]"]');
                if (rolesSelect && data.roles) {
                    // Clear existing selections
                    Array.from(rolesSelect.options).forEach(option => option.selected = false);
                    // Set selected roles
                    data.roles.forEach(roleId => {
                        const option = rolesSelect.querySelector(`option[value="${roleId}"]`);
                        if (option) option.selected = true;
                    });
                }
                
                // Handle checkbox for is_active
                const activeCheckbox = form.querySelector('[name="is_active"]');
                if (activeCheckbox) {
                    activeCheckbox.checked = data.is_active;
                }
                
                new bootstrap.Modal(document.getElementById('editUserModal')).show();
            }
        })
        .catch(error => {
            Swal.fire('Error', 'Failed to load user data for editing', 'error');
        });
}

function resetUserPassword(userId) {
    Swal.fire({
        title: 'Reset Password',
        html: `
            <input id="swal-password" class="swal2-input" type="password" placeholder="New Password" minlength="8">
            <input id="swal-password-confirm" class="swal2-input" type="password" placeholder="Confirm Password" minlength="8">
        `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Reset Password',
        cancelButtonText: 'Cancel',
        preConfirm: () => {
            const password = document.getElementById('swal-password').value;
            const confirmPassword = document.getElementById('swal-password-confirm').value;
            
            if (!password || !confirmPassword) {
                Swal.showValidationMessage('Please enter both password fields');
                return false;
            }
            
            if (password.length < 8) {
                Swal.showValidationMessage('Password must be at least 8 characters long');
                return false;
            }
            
            if (password !== confirmPassword) {
                Swal.showValidationMessage('Passwords do not match');
                return false;
            }
            
            return { password, password_confirmation: confirmPassword };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/users/${userId}/reset-password-ajax`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(result.value)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Success!', data.message, 'success');
                } else {
                    Swal.fire('Error', data.message || 'Failed to reset password', 'error');
                }
            })
            .catch(error => {
                Swal.fire('Error', 'Failed to reset password', 'error');
            });
        }
    });
}

function showUserPermissions(userId, userName) {
    fetch(`/users/${userId}/permissions`)
        .then(response => response.json())
        .then(data => {
            // Populate permissions modal
            const modalTitle = document.querySelector('#permissionsModal .modal-title');
            const modalBody = document.querySelector('#permissionsModal .modal-body');
            
            if (modalTitle) modalTitle.textContent = `Permissions - ${userName}`;
            
            if (modalBody) {
                let permissionsHtml = `
                    <div class="mb-3">
                        <h6>Current Roles:</h6>
                        <div>
                            ${data.roles.map(role => `<span class="badge bg-primary me-1">${role}</span>`).join('')}
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6>Permissions:</h6>
                        <div class="row">
                `;
                
                data.permissions.forEach(permission => {
                    permissionsHtml += `
                        <div class="col-md-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm-${permission.id}" ${permission.assigned ? 'checked' : ''}>
                                <label class="form-check-label" for="perm-${permission.id}">
                                    ${permission.display_name} <small class="text-muted">(${permission.module})</small>
                                </label>
                            </div>
                        </div>
                    `;
                });
                
                permissionsHtml += `
                        </div>
                    </div>
                `;
                
                modalBody.innerHTML = permissionsHtml;
                new bootstrap.Modal(document.getElementById('permissionsModal')).show();
            }
        })
        .catch(error => {
            Swal.fire('Error', 'Failed to load user permissions', 'error');
        });
}

function showUserLoginHistory(userId, userName) {
    fetch(`/users/${userId}/login-history`)
        .then(response => response.json())
        .then(data => {
            // Populate login history modal
            const modalTitle = document.querySelector('#loginHistoryModal .modal-title');
            const modalBody = document.querySelector('#loginHistoryModal .modal-body');
            
            if (modalTitle) modalTitle.textContent = `Login History - ${userName}`;
            
            if (modalBody) {
                let historyHtml = `
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Login Time</th>
                                    <th>Logout Time</th>
                                    <th>IP Address</th>
                                    <th>Status</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                `;
                
                data.login_histories.forEach(history => {
                    const statusBadge = history.successful ? 
                        '<span class="badge bg-success">Success</span>' : 
                        `<span class="badge bg-danger">Failed - ${history.failure_reason}</span>`;
                    
                    const duration = history.session_duration ? 
                        `${history.session_duration} min` : 
                        'Active';
                    
                    historyHtml += `
                        <tr>
                            <td>${new Date(history.login_at).toLocaleString()}</td>
                            <td>${history.logout_at ? new Date(history.logout_at).toLocaleString() : '-'}</td>
                            <td>${history.ip_address}</td>
                            <td>${statusBadge}</td>
                            <td>${duration}</td>
                        </tr>
                    `;
                });
                
                historyHtml += `
                            </tbody>
                        </table>
                    </div>
                `;
                
                modalBody.innerHTML = historyHtml;
                new bootstrap.Modal(document.getElementById('loginHistoryModal')).show();
            }
        })
        .catch(error => {
            Swal.fire('Error', 'Failed to load login history', 'error');
        });
}

function toggleUserStatus(userId, action) {
    fetch(`/users/${userId}/${action}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const actionText = action === 'suspend' ? 'suspended' : 'activated';
            Swal.fire('Success!', data.message, 'success')
                .then(() => {
                    location.reload();
                });
        } else {
            Swal.fire('Error', data.message || `Failed to ${action} user`, 'error');
        }
    })
    .catch(error => {
        Swal.fire('Error', `Failed to ${action} user`, 'error');
    });
}

function deleteUser(userId) {
    fetch(`/users/${userId}/ajax`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Success!', data.message, 'success')
                .then(() => {
                    location.reload();
                });
        } else {
            Swal.fire('Error', data.message || 'Failed to delete user', 'error');
        }
    })
    .catch(error => {
        Swal.fire('Error', 'Failed to delete user', 'error');
    });
}

// Bulk Actions with SweetAlert2
function bulkActivate() {
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    if (selected.length === 0) {
        Swal.fire('Warning', 'Please select users to activate', 'warning');
        return;
    }
    
    Swal.fire({
        title: 'Activate Users',
        text: `Are you sure you want to activate ${selected.length} users?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#10b981',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, activate users!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform bulk activation
            Swal.fire('Success!', `${selected.length} users have been activated`, 'success');
        }
    });
}

function bulkSuspend() {
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    if (selected.length === 0) {
        Swal.fire('Warning', 'Please select users to suspend', 'warning');
        return;
    }
    
    Swal.fire({
        title: 'Suspend Users',
        text: `Are you sure you want to suspend ${selected.length} users?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f59e0b',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, suspend users!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform bulk suspension
            Swal.fire('Success!', `${selected.length} users have been suspended`, 'success');
        }
    });
}

function bulkResetPassword() {
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    if (selected.length === 0) {
        Swal.fire('Warning', 'Please select users to reset password', 'warning');
        return;
    }
    
    Swal.fire({
        title: 'Reset Passwords',
        text: `Are you sure you want to reset passwords for ${selected.length} users?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, reset passwords!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform bulk password reset
            Swal.fire('Success!', `Passwords have been reset for ${selected.length} users`, 'success');
        }
    });
}

function bulkExport() {
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    if (selected.length === 0) {
        Swal.fire('Warning', 'Please select users to export', 'warning');
        return;
    }
    
    Swal.fire({
        title: 'Export Users',
        text: `Export ${selected.length} selected users?`,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#10b981',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, export users!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform bulk export
            Swal.fire('Success!', `${selected.length} users have been exported`, 'success');
        }
    });
}

function deleteSelected() {
    const selected = document.querySelectorAll('input[name="userSelect[]"]:checked');
    if (selected.length === 0) {
        Swal.fire('Warning', 'Please select users to delete', 'warning');
        return;
    }
    
    Swal.fire({
        title: 'Delete Users',
        text: `Are you sure you want to delete ${selected.length} users? This action cannot be undone!`,
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete users!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform bulk deletion
            Swal.fire('Success!', `${selected.length} users have been deleted`, 'success')
                .then(() => {
                    location.reload();
                });
        }
    });
}
</script>
@endsection
