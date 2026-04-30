@extends('layouts.app')

@section('title', 'Student Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Student Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#admissionModal">
                        <i class="bx bx-user-plus me-1"></i> New Admission
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bx bx-upload me-1"></i> Import Students
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body">
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
                        <label for="sectionFilter" class="form-label">Section</label>
                        <select class="form-select" id="sectionFilter">
                            <option value="">All Sections</option>
                            <option value="A">Section A</option>
                            <option value="B">Section B</option>
                            <option value="C">Section C</option>
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
                            <option value="inactive">Inactive</option>
                            <option value="graduated">Graduated</option>
                            <option value="transferred">Transferred</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchStudent" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchStudent" placeholder="Name, ID...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Search
                        </button>
                    </div>
                </div>

                <!-- Students Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Parent Contact</th>
                                <th>Admission Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Student" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>STU001</strong></td>
                                <td>Ahmed Hassan Mohamed</td>
                                <td>Class 1A</td>
                                <td><span class="badge bg-primary">Male</span></td>
                                <td>15/03/2010</td>
                                <td>+255 712 345 678</td>
                                <td>01/01/2023</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Academic Record</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Fee Status</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Student" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>STU002</strong></td>
                                <td>Fatima Ali Omar</td>
                                <td>Class 1A</td>
                                <td><span class="badge bg-pink">Female</span></td>
                                <td>22/05/2010</td>
                                <td>+255 713 456 789</td>
                                <td>01/01/2023</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Academic Record</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Fee Status</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Student" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>STU003</strong></td>
                                <td>Mohammed Ibrahim Said</td>
                                <td>Class 1B</td>
                                <td><span class="badge bg-primary">Male</span></td>
                                <td>10/08/2009</td>
                                <td>+255 714 567 890</td>
                                <td>15/01/2023</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Academic Record</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Fee Status</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Student" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>STU004</strong></td>
                                <td>Aisha Mahmoud Hassan</td>
                                <td>Class 1B</td>
                                <td><span class="badge bg-pink">Female</span></td>
                                <td>18/12/2009</td>
                                <td>+255 715 678 901</td>
                                <td>20/01/2023</td>
                                <td><span class="badge bg-warning">Inactive</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Academic Record</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Fee Status</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Student" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>STU005</strong></td>
                                <td>Omar Khalid Ali</td>
                                <td>Class 2A</td>
                                <td><span class="badge bg-primary">Male</span></td>
                                <td>05/03/2008</td>
                                <td>+255 716 789 012</td>
                                <td>01/02/2023</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Academic Record</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Fee Status</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Student" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>STU006</strong></td>
                                <td>Mariam Said Mohamed</td>
                                <td>Class 2A</td>
                                <td><span class="badge bg-pink">Female</span></td>
                                <td>12/07/2008</td>
                                <td>+255 717 890 123</td>
                                <td>05/02/2023</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Academic Record</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Fee Status</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Student" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>STU007</strong></td>
                                <td>Yusuf Hassan Omar</td>
                                <td>Class 2B</td>
                                <td><span class="badge bg-primary">Male</span></td>
                                <td>25/09/2007</td>
                                <td>+255 718 901 234</td>
                                <td>10/02/2023</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Academic Record</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Fee Status</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar">
                                        <img src="{{ asset('assets/img/avatars/8.png') }}" alt="Student" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                </td>
                                <td><strong>STU008</strong></td>
                                <td>Zainab Ali Ibrahim</td>
                                <td>Class 2B</td>
                                <td><span class="badge bg-pink">Female</span></td>
                                <td>08/11/2007</td>
                                <td>+255 719 012 345</td>
                                <td>15/02/2023</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Academic Record</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Fee Status</a></li>
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

<!-- Admission Modal -->
<div class="modal fade" id="admissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Student Admission</h5>
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
                                    <label for="studentPhoto" class="form-label">Student Photo</label>
                                    <input type="file" class="form-control" id="studentPhoto" accept="image/*">
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
                                    <label for="bloodGroup" class="form-label">Blood Group</label>
                                    <select class="form-select" id="bloodGroup">
                                        <option value="">Select</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="nationality" class="form-label">Nationality</label>
                                    <input type="text" class="form-control" id="nationality" value="Tanzanian">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Academic Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Academic Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="admissionClass" class="form-label">Admission Class *</label>
                                    <select class="form-select" id="admissionClass" required>
                                        <option value="">Select Class</option>
                                        <option value="1A">Class 1A</option>
                                        <option value="1B">Class 1B</option>
                                        <option value="2A">Class 2A</option>
                                        <option value="2B">Class 2B</option>
                                        <option value="3A">Class 3A</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="previousSchool" class="form-label">Previous School</label>
                                    <input type="text" class="form-control" id="previousSchool">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="admissionDate" class="form-label">Admission Date *</label>
                                    <input type="date" class="form-control" id="admissionDate" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="studentType" class="form-label">Student Type</label>
                                    <select class="form-select" id="studentType">
                                        <option value="regular">Regular</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="readmission">Readmission</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Parent/Guardian Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Parent/Guardian Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="fatherName" class="form-label">Father's Name *</label>
                                    <input type="text" class="form-control" id="fatherName" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="fatherPhone" class="form-label">Father's Phone *</label>
                                    <input type="tel" class="form-control" id="fatherPhone" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="fatherEmail" class="form-label">Father's Email</label>
                                    <input type="email" class="form-control" id="fatherEmail">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="fatherOccupation" class="form-label">Father's Occupation</label>
                                    <input type="text" class="form-control" id="fatherOccupation">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="motherName" class="form-label">Mother's Name *</label>
                                    <input type="text" class="form-control" id="motherName" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="motherPhone" class="form-label">Mother's Phone *</label>
                                    <input type="tel" class="form-control" id="motherPhone" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="motherEmail" class="form-label">Mother's Email</label>
                                    <input type="email" class="form-control" id="motherEmail">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="motherOccupation" class="form-label">Mother's Occupation</label>
                                    <input type="text" class="form-control" id="motherOccupation">
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
                                <div class="col-md-4 mb-3">
                                    <label for="address" class="form-label">Residential Address *</label>
                                    <textarea class="form-control" id="address" rows="2" required></textarea>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="city" class="form-label">City *</label>
                                    <input type="text" class="form-control" id="city" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="region" class="form-label">Region *</label>
                                    <select class="form-select" id="region" required>
                                        <option value="">Select Region</option>
                                        <option value="dar">Dar es Salaam</option>
                                        <option value="arusha">Arusha</option>
                                        <option value="mwanza">Mwanza</option>
                                        <option value="mbeya">Mbeya</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="postalCode" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" id="postalCode">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="emergencyContact" class="form-label">Emergency Contact *</label>
                                    <input type="tel" class="form-control" id="emergencyContact" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Admit Student</button>
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="importFile" class="form-label">Select Excel File</label>
                    <input type="file" class="form-control" id="importFile" accept=".xlsx,.xls,.csv">
                    <small class="text-muted">Upload Excel file with student data</small>
                </div>
                <div class="mb-3">
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        <i class="bx bx-download me-1"></i> Download Template
                    </a>
                    <small class="text-muted ms-2">Download the template to understand the required format</small>
                </div>
                <div class="alert alert-info">
                    <i class="bx bx-info-circle me-2"></i>
                    Make sure your Excel file contains all required fields: First Name, Last Name, Gender, Date of Birth, Class, Parent Contact
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Import Students</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exportFormat" class="form-label">Export Format</label>
                    <select class="form-select" id="exportFormat">
                        <option value="excel">Excel (.xlsx)</option>
                        <option value="csv">CSV (.csv)</option>
                        <option value="pdf">PDF (.pdf)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exportData" class="form-label">Data to Export</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="exportAll" checked>
                        <label class="form-check-label" for="exportAll">
                            All Students
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="exportFiltered">
                        <label class="form-check-label" for="exportFiltered">
                            Filtered Students (based on current filters)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="exportSelected">
                        <label class="form-check-label" for="exportSelected">
                            Selected Students
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Include Fields</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeBasic" checked>
                                <label class="form-check-label" for="includeBasic">Basic Information</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeAcademic" checked>
                                <label class="form-check-label" for="includeAcademic">Academic Information</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeParent" checked>
                                <label class="form-check-label" for="includeParent">Parent Information</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeContact" checked>
                                <label class="form-check-label" for="includeContact">Contact Information</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeMedical">
                                <label class="form-check-label" for="includeMedical">Medical Information</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeFee">
                                <label class="form-check-label" for="includeFee">Fee Information</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info">Export Students</button>
            </div>
        </div>
    </div>
</div>
@endsection
