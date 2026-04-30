@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">My Profile</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bx bx-edit me-1"></i> Edit Profile
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                        <i class="bx bx-lock me-1"></i> Change Password
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Profile Picture -->
                    <div class="col-md-4 mb-4">
                        <div class="text-center">
                            <div class="avatar avatar-xl mb-3">
                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Profile" class="rounded-circle">
                            </div>
                            <h5 class="mb-1">John Doe</h5>
                            <p class="text-muted mb-0">Administrator</p>
                            <div class="d-flex gap-2 justify-content-center">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadAvatarModal">
                                    <i class="bx bx-camera me-1"></i> Change Photo
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Personal Information -->
                    <div class="col-md-8 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Personal Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" value="John" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" value="Doe" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="john.doe@schoolnex.com" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="tel" class="form-control" value="+1 234 567 8900" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" value="1985-06-15" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <input type="text" class="form-control" value="Male" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" value="123 Main St, City, State 12345" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Professional Information -->
                    <div class="col-md-8 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Professional Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Employee ID</label>
                                        <input type="text" class="form-control" value="EMP001" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Department</label>
                                        <input type="text" class="form-control" value="Administration" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Position</label>
                                        <input type="text" class="form-control" value="System Administrator" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Join Date</label>
                                        <input type="date" class="form-control" value="2020-01-15" readonly>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Bio</label>
                                        <textarea class="form-control" rows="3" readonly>Experienced system administrator with expertise in Laravel, PHP, and database management. Passionate about educational technology and improving school management systems.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- System Information -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">System Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" value="johndoe" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <input type="text" class="form-control" value="Administrator" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Last Login</label>
                                    <input type="text" class="form-control" value="{{ date('Y-m-d H:i:s') }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Account Status</label>
                                    <div>
                                        <span class="badge bg-success">Active</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Two-Factor Auth</label>
                                    <div>
                                        <span class="badge bg-success">Enabled</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Stats -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Quick Stats</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Total Logins</span>
                                        <span class="badge bg-primary">1,247</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Last 30 Days</span>
                                        <span class="badge bg-info">89</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Password Changed</span>
                                        <span class="text-muted">{{ date('Y-m-d', strtotime('-60 days')) }}</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Profile Updated</span>
                                        <span class="text-muted">{{ date('Y-m-d', strtotime('-30 days')) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name *</label>
                            <input type="text" class="form-control" value="John" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name *</label>
                            <input type="text" class="form-control" value="Doe" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email *</label>
                            <input type="email" class="form-control" value="john.doe@schoolnex.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" value="+1 234 567 8900">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" value="1985-06-15">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" rows="2">123 Main St, City, State 12345</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Bio</label>
                            <textarea class="form-control" rows="3">Experienced system administrator with expertise in Laravel, PHP, and database management. Passionate about educational technology and improving school management systems.</textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateProfile()">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Current Password *</label>
                        <input type="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password *</label>
                        <input type="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm New Password *</label>
                        <input type="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="logoutAllDevices">
                            <label class="form-check-label" for="logoutAllDevices">Log out from all devices</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="changePassword()">Change Password</button>
            </div>
        </div>
    </div>
</div>

<!-- Upload Avatar Modal -->
<div class="modal fade" id="uploadAvatarModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Profile Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Current Photo</label>
                        <div class="text-center mb-3">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Current Avatar" class="rounded-circle" style="width: 100px; height: 100px;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload New Photo</label>
                        <input type="file" class="form-control" accept="image/*">
                        <small class="text-muted">Allowed formats: JPG, PNG, GIF. Maximum size: 2MB</small>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="removeCurrentPhoto">
                            <label class="form-check-label" for="removeCurrentPhoto">Remove current photo</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="uploadAvatar()">Upload Photo</button>
            </div>
        </div>
    </div>
</div>

<script>
function updateProfile() {
    alert('Profile updated successfully!');
    document.getElementById('editProfileModal').querySelector('.btn-close').click();
    setTimeout(() => {
        location.reload();
    }, 1500);
}

function changePassword() {
    const currentPassword = document.querySelector('#changePasswordModal input[type="password"]').value;
    const newPassword = document.querySelectorAll('#changePasswordModal input[type="password"]')[1].value;
    const confirmPassword = document.querySelectorAll('#changePasswordModal input[type="password"]')[2].value;
    
    if (!currentPassword || !newPassword || !confirmPassword) {
        alert('Please fill in all required fields');
        return;
    }
    
    if (newPassword !== confirmPassword) {
        alert('New passwords do not match');
        return;
    }
    
    if (newPassword.length < 8) {
        alert('Password must be at least 8 characters long');
        return;
    }
    
    alert('Password changed successfully!');
    document.getElementById('changePasswordModal').querySelector('.btn-close').click();
    setTimeout(() => {
        location.reload();
    }, 1500);
}

function uploadAvatar() {
    const fileInput = document.querySelector('#uploadAvatarModal input[type="file"]');
    
    if (!fileInput.files || fileInput.files.length === 0) {
        alert('Please select a photo to upload');
        return;
    }
    
    const file = fileInput.files[0];
    const fileSize = file.size / 1024 / 1024; // Convert to MB
    
    if (fileSize > 2) {
        alert('File size must be less than 2MB');
        return;
    }
    
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!allowedTypes.includes(file.type)) {
        alert('Only JPG, PNG, and GIF files are allowed');
        return;
    }
    
    alert('Profile photo uploaded successfully!');
    document.getElementById('uploadAvatarModal').querySelector('.btn-close').click();
    setTimeout(() => {
        location.reload();
    }, 1500);
}
</script>
@endsection
