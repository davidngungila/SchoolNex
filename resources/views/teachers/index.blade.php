@extends('layouts.app')

@section('title', 'Teacher Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Teacher Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#recruitmentModal">
                        <i class="bx bx-user-plus me-1"></i> New Recruitment
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                        <i class="bx bx-calendar me-1"></i> Schedule
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#payrollModal">
                        <i class="bx bx-dollar me-1"></i> Payroll
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="departmentFilter" class="form-label">Department</label>
                        <select class="form-select" id="departmentFilter">
                            <option value="">All Departments</option>
                            <option value="science">Science</option>
                            <option value="languages">Languages</option>
                            <option value="social">Social Studies</option>
                            <option value="arts">Arts</option>
                            <option value="sports">Sports</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="designationFilter" class="form-label">Designation</label>
                        <select class="form-select" id="designationFilter">
                            <option value="">All Designations</option>
                            <option value="principal">Principal</option>
                            <option value="vice_principal">Vice Principal</option>
                            <option value="head_teacher">Head Teacher</option>
                            <option value="senior_teacher">Senior Teacher</option>
                            <option value="teacher">Teacher</option>
                            <option value="assistant_teacher">Assistant Teacher</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="genderFilter" class="form-label">Gender</label>
                        <select class="form-select" id="genderFilter">
                            <option value="">All</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="on_leave">On Leave</option>
                            <option value="terminated">Terminated</option>
                            <option value="resigned">Resigned</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchTeacher" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchTeacher" placeholder="Name, ID...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Search
                        </button>
                    </div>
                </div>

                <!-- Teachers Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Teacher ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Subjects</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Teacher" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>TCH001</strong></td>
                                <td>John Smith Anderson</td>
                                <td>Science</td>
                                <td>Senior Teacher</td>
                                <td>Mathematics, Physics</td>
                                <td>+255 712 345 678</td>
                                <td>john.smith@school.edu</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>Performance</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Salary Details</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Teacher" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>TCH002</strong></td>
                                <td>Sarah Johnson Williams</td>
                                <td>Languages</td>
                                <td>Head Teacher</td>
                                <td>English, Literature</td>
                                <td>+255 713 456 789</td>
                                <td>sarah.johnson@school.edu</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>Performance</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Salary Details</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Teacher" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>TCH003</strong></td>
                                <td>Dr. Michael Brown Davis</td>
                                <td>Science</td>
                                <td>Senior Teacher</td>
                                <td>Physics, Chemistry</td>
                                <td>+255 714 567 890</td>
                                <td>michael.brown@school.edu</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>Performance</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Salary Details</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Teacher" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>TCH004</strong></td>
                                <td>Emily Davis Martinez</td>
                                <td>Science</td>
                                <td>Teacher</td>
                                <td>Chemistry, Biology</td>
                                <td>+255 715 678 901</td>
                                <td>emily.davis@school.edu</td>
                                <td><span class="badge bg-warning">On Leave</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>Performance</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Salary Details</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Teacher" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>TCH005</strong></td>
                                <td>Dr. Robert Wilson Taylor</td>
                                <td>Science</td>
                                <td>Senior Teacher</td>
                                <td>Biology, Environmental Science</td>
                                <td>+255 716 789 012</td>
                                <td>robert.wilson@school.edu</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>Performance</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Salary Details</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Teacher" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>TCH006</strong></td>
                                <td>James Anderson Lee</td>
                                <td>Social Studies</td>
                                <td>Teacher</td>
                                <td>History, Geography</td>
                                <td>+255 717 890 123</td>
                                <td>james.anderson@school.edu</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>Performance</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Salary Details</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Teacher" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>TCH007</strong></td>
                                <td>Lisa Martinez Brown</td>
                                <td>Social Studies</td>
                                <td>Teacher</td>
                                <td>Geography, Civics</td>
                                <td>+255 718 901 234</td>
                                <td>lisa.martinez@school.edu</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>Performance</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Salary Details</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/8.png') }}" alt="Teacher" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>TCH008</strong></td>
                                <td>Jennifer Taylor White</td>
                                <td>Arts</td>
                                <td>Teacher</td>
                                <td>Fine Arts, Music</td>
                                <td>+255 719 012 345</td>
                                <td>jennifer.taylor@school.edu</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-calendar me-2"></i>Schedule</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>Performance</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Salary Details</a></li>
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

<!-- Recruitment Modal -->
<div class="modal fade" id="recruitmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Teacher Recruitment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Personal Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Personal Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="teacherPhoto" class="form-label">Teacher Photo</label>
                                    <input type="file" class="form-control" id="teacherPhoto" accept="image/*">
                                    <small class="text-muted">Upload passport size photo</small>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="firstName" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="middleName" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middleName">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="lastName" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="gender" class="form-label">Gender *</label>
                                    <select class="form-select" id="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="dob" class="form-label">Date of Birth *</label>
                                    <input type="date" class="form-control" id="dob" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="maritalStatus" class="form-label">Marital Status</label>
                                    <select class="form-select" id="maritalStatus">
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="nationality" class="form-label">Nationality</label>
                                    <input type="text" class="form-control" id="nationality" value="Tanzanian">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Professional Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Professional Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="employeeId" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" id="employeeId" placeholder="Auto-generated" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="department" class="form-label">Department *</label>
                                    <select class="form-select" id="department" required>
                                        <option value="">Select Department</option>
                                        <option value="science">Science</option>
                                        <option value="languages">Languages</option>
                                        <option value="social">Social Studies</option>
                                        <option value="arts">Arts</option>
                                        <option value="sports">Sports</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="designation" class="form-label">Designation *</label>
                                    <select class="form-select" id="designation" required>
                                        <option value="">Select Designation</option>
                                        <option value="principal">Principal</option>
                                        <option value="vice_principal">Vice Principal</option>
                                        <option value="head_teacher">Head Teacher</option>
                                        <option value="senior_teacher">Senior Teacher</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="assistant_teacher">Assistant Teacher</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="joiningDate" class="form-label">Joining Date *</label>
                                    <input type="date" class="form-control" id="joiningDate" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="qualification" class="form-label">Highest Qualification *</label>
                                    <select class="form-select" id="qualification" required>
                                        <option value="">Select</option>
                                        <option value="phd">PhD</option>
                                        <option value="masters">Master's Degree</option>
                                        <option value="bachelors">Bachelor's Degree</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="certificate">Certificate</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="experience" class="form-label">Experience (Years)</label>
                                    <input type="number" class="form-control" id="experience" min="0">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="subjects" class="form-label">Subjects *</label>
                                    <select class="form-select" id="subjects" multiple required>
                                        <option value="math">Mathematics</option>
                                        <option value="english">English</option>
                                        <option value="physics">Physics</option>
                                        <option value="chemistry">Chemistry</option>
                                        <option value="biology">Biology</option>
                                        <option value="history">History</option>
                                        <option value="geography">Geography</option>
                                        <option value="arts">Fine Arts</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="employmentType" class="form-label">Employment Type</label>
                                    <select class="form-select" id="employmentType">
                                        <option value="permanent">Permanent</option>
                                        <option value="contract">Contract</option>
                                        <option value="probation">Probation</option>
                                        <option value="part_time">Part Time</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Contact Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="phone" class="form-label">Phone *</label>
                                    <input type="tel" class="form-control" id="phone" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="address" class="form-label">Address *</label>
                                    <input type="text" class="form-control" id="address" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="city" class="form-label">City *</label>
                                    <input type="text" class="form-control" id="city" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Salary Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Salary Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="basicSalary" class="form-label">Basic Salary *</label>
                                    <input type="number" class="form-control" id="basicSalary" min="0" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="housingAllowance" class="form-label">Housing Allowance</label>
                                    <input type="number" class="form-control" id="housingAllowance" min="0">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="transportAllowance" class="form-label">Transport Allowance</label>
                                    <input type="number" class="form-control" id="transportAllowance" min="0">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="otherAllowances" class="form-label">Other Allowances</label>
                                    <input type="number" class="form-control" id="otherAllowances" min="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Recruit Teacher</button>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Teacher Schedule Management</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="scheduleTeacher" class="form-label">Select Teacher</label>
                        <select class="form-select" id="scheduleTeacher">
                            <option value="">Select Teacher</option>
                            <option value="TCH001">John Smith Anderson</option>
                            <option value="TCH002">Sarah Johnson Williams</option>
                            <option value="TCH003">Dr. Michael Brown Davis</option>
                            <option value="TCH004">Emily Davis Martinez</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="scheduleClass" class="form-label">Class</label>
                        <select class="form-select" id="scheduleClass">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                            <option value="3A">Class 3A</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="scheduleWeek" class="form-label">Week</label>
                        <select class="form-select" id="scheduleWeek">
                            <option value="current">Current Week</option>
                            <option value="next">Next Week</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>08:00-09:00</th>
                                <th>09:00-10:00</th>
                                <th>10:00-11:00</th>
                                <th>11:00-12:00</th>
                                <th>01:00-02:00</th>
                                <th>02:00-03:00</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Monday</strong></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-primary text-white rounded p-2">
                                        <small>Mathematics</small><br>
                                        <small>Class 1A</small>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="schedule-item bg-success text-white rounded p-2">
                                        <small>Physics</small><br>
                                        <small>Class 2A</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-info text-white rounded p-2">
                                        <small>Mathematics</small><br>
                                        <small>Class 1B</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-warning text-white rounded p-2">
                                        <small>Lab Session</small><br>
                                        <small>Physics Lab</small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Tuesday</strong></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-success text-white rounded p-2">
                                        <small>Physics</small><br>
                                        <small>Class 2B</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-primary text-white rounded p-2">
                                        <small>Mathematics</small><br>
                                        <small>Class 2A</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-info text-white rounded p-2">
                                        <small>Mathematics</small><br>
                                        <small>Class 2B</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                            </tr>
                            <tr>
                                <td><strong>Wednesday</strong></td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-primary text-white rounded p-2">
                                        <small>Mathematics</small><br>
                                        <small>Class 1A</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-success text-white rounded p-2">
                                        <small>Physics</small><br>
                                        <small>Class 2A</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-warning text-white rounded p-2">
                                        <small>Meeting</small><br>
                                        <small>Staff Room</small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Thursday</strong></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-info text-white rounded p-2">
                                        <small>Mathematics</small><br>
                                        <small>Class 1B</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-success text-white rounded p-2">
                                        <small>Physics</small><br>
                                        <small>Class 2B</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-primary text-white rounded p-2">
                                        <small>Mathematics</small><br>
                                        <small>Class 2A</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                            </tr>
                            <tr>
                                <td><strong>Friday</strong></td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-success text-white rounded p-2">
                                        <small>Physics</small><br>
                                        <small>Class 2A</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center bg-light"></td>
                                <td class="text-center">
                                    <div class="schedule-item bg-warning text-white rounded p-2">
                                        <small>Extra Class</small><br>
                                        <small>Class 1A</small>
                                    </div>
                                </td>
                                <td class="text-center bg-light"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Print Schedule</button>
            </div>
        </div>
    </div>
</div>

<!-- Payroll Modal -->
<div class="modal fade" id="payrollModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payroll Management</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="payrollMonth" class="form-label">Month</label>
                        <select class="form-select" id="payrollMonth">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="payrollYear" class="form-label">Year</label>
                        <select class="form-select" id="payrollYear">
                            <option value="2024" selected>2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="payrollStatus" class="form-label">Status</label>
                        <select class="form-select" id="payrollStatus">
                            <option value="all">All</option>
                            <option value="pending">Pending</option>
                            <option value="processed">Processed</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-success w-100">Generate Payroll</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Teacher</th>
                                <th>Basic Salary</th>
                                <th>Allowances</th>
                                <th>Gross Pay</th>
                                <th>Deductions</th>
                                <th>Net Pay</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Smith Anderson</td>
                                <td>$2,500</td>
                                <td>$500</td>
                                <td>$3,000</td>
                                <td>$300</td>
                                <td>$2,700</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Sarah Johnson Williams</td>
                                <td>$2,800</td>
                                <td>$600</td>
                                <td>$3,400</td>
                                <td>$340</td>
                                <td>$3,060</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Dr. Michael Brown Davis</td>
                                <td>$3,200</td>
                                <td>$800</td>
                                <td>$4,000</td>
                                <td>$400</td>
                                <td>$3,600</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-receipt"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6>Payroll Summary</h6>
                                <div class="d-flex justify-content-between">
                                    <span>Total Teachers:</span>
                                    <strong>32</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Total Gross Pay:</span>
                                    <strong>$85,600</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Total Deductions:</span>
                                    <strong>$8,560</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Total Net Pay:</span>
                                    <strong>$77,040</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6>Payment Status</h6>
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-success" style="width: 75%">75% Paid</div>
                                </div>
                                <small>24 teachers paid, 8 pending</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Process All Pending</button>
                <button type="button" class="btn btn-success">Export Payroll</button>
            </div>
        </div>
    </div>
</div>

<style>
.schedule-item {
    min-height: 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-size: 0.75rem;
}
</style>
@endsection
