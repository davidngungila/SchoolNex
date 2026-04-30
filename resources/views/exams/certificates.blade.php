@extends('layouts.app')

@section('title', 'Certificates')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Certificate Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createCertificateModal">
                        <i class="bx bx-plus me-1"></i> Create Certificate
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#batchGenerateModal">
                        <i class="bx bx-group me-1"></i> Batch Generate
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#templatesModal">
                        <i class="bx bx-layout me-1"></i> Templates
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Certificate Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">1,847</h4>
                                        <p class="mb-0">Total Certificates</p>
                                        <small class="text-muted">All time</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-award avatar-icon"></i>
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
                                        <h4 class="mb-0">324</h4>
                                        <p class="mb-0">This Month</p>
                                        <small class="text-muted">Generated</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-calendar avatar-icon"></i>
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
                                        <h4 class="mb-0">12</h4>
                                        <p class="mb-0">Templates</p>
                                        <small class="text-muted">Available</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-file avatar-icon"></i>
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
                                        <h4 class="mb-0">89%</h4>
                                        <p class="mb-0">Verification Rate</p>
                                        <small class="text-muted">Last 30 days</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-check-double avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="certificateType" class="form-label">Certificate Type</label>
                        <select class="form-select" id="certificateType">
                            <option value="">All Types</option>
                            <option value="achievement">Achievement</option>
                            <option value="participation">Participation</option>
                            <option value="excellence">Excellence</option>
                            <option value="completion">Completion</option>
                            <option value="merit">Merit</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="certificateClass" class="form-label">Class</label>
                        <select class="form-select" id="certificateClass">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                            <option value="3A">Class 3A</option>
                            <option value="3B">Class 3B</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="certificateStatus" class="form-label">Status</label>
                        <select class="form-select" id="certificateStatus">
                            <option value="">All Status</option>
                            <option value="generated">Generated</option>
                            <option value="issued">Issued</option>
                            <option value="pending">Pending</option>
                            <option value="revoked">Revoked</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="quarter">This Quarter</option>
                            <option value="year">This Year</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchStudent" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchStudent" placeholder="Student name...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Certificates Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>Certificate ID</th>
                                <th>Student</th>
                                <th>Type</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Issue Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="certSelect[]" value="CERT001"></td>
                                <td><strong>CERT-2024-001</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Emily Davis</div>
                                            <small class="text-muted">STU004</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Achievement</span></td>
                                <td>Class 2A</td>
                                <td>Mathematics</td>
                                <td>{{ date('Y-m-d', strtotime('-1 week')) }}</td>
                                <td><span class="badge bg-success">Issued</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewCertificateModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#printModal"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#verifyModal"><i class="bx bx-check me-2"></i>Verify</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#emailModal"><i class="bx bx-envelope me-2"></i>Email</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Revoke</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="certSelect[]" value="CERT002"></td>
                                <td><strong>CERT-2024-002</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Michael Brown</div>
                                            <small class="text-muted">STU005</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-info">Excellence</span></td>
                                <td>Class 3B</td>
                                <td>English</td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td><span class="badge bg-success">Issued</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewCertificateModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#printModal"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#verifyModal"><i class="bx bx-check me-2"></i>Verify</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#emailModal"><i class="bx bx-envelope me-2"></i>Email</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Revoke</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="certSelect[]" value="CERT003"></td>
                                <td><strong>CERT-2024-003</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Sarah Johnson</div>
                                            <small class="text-muted">STU006</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-primary">Participation</span></td>
                                <td>Class 1A</td>
                                <td>Science</td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td><span class="badge bg-success">Issued</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewCertificateModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#printModal"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#verifyModal"><i class="bx bx-check me-2"></i>Verify</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#emailModal"><i class="bx bx-envelope me-2"></i>Email</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Revoke</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="certSelect[]" value="CERT004"></td>
                                <td><strong>CERT-2024-004</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Robert Wilson</div>
                                            <small class="text-muted">STU007</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-secondary">Completion</span></td>
                                <td>Class 2B</td>
                                <td>History</td>
                                <td>{{ date('Y-m-d', strtotime('-4 days')) }}</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewCertificateModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#printModal"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#verifyModal"><i class="bx bx-check me-2"></i>Verify</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#emailModal"><i class="bx bx-envelope me-2"></i>Email</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-check me-2"></i>Issue</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="certSelect[]" value="CERT005"></td>
                                <td><strong>CERT-2024-005</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Lisa Martinez</div>
                                            <small class="text-muted">STU008</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">Merit</span></td>
                                <td>Class 3A</td>
                                <td>Geography</td>
                                <td>{{ date('Y-m-d', strtotime('-5 days')) }}</td>
                                <td><span class="badge bg-success">Issued</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewCertificateModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#downloadModal"><i class="bx bx-download me-2"></i>Download</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#printModal"><i class="bx bx-printer me-2"></i>Print</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#verifyModal"><i class="bx bx-check me-2"></i>Verify</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#emailModal"><i class="bx bx-envelope me-2"></i>Email</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Revoke</a></li>
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
                            <button type="button" class="btn btn-outline-primary" onclick="bulkDownload()">
                                <i class="bx bx-download me-1"></i> Download Selected
                            </button>
                            <button type="button" class="btn btn-outline-success" onclick="bulkPrint()">
                                <i class="bx bx-printer me-1"></i> Print Selected
                            </button>
                            <button type="button" class="btn btn-outline-info" onclick="bulkEmail()">
                                <i class="bx bx-envelope me-1"></i> Email Selected
                            </button>
                            <button type="button" class="btn btn-outline-warning" onclick="bulkRevoke()">
                                <i class="bx bx-pause me-1"></i> Revoke Selected
                            </button>
                            <button type="button" class="btn btn-outline-danger" onclick="deleteSelected()">
                                <i class="bx bx-trash me-1"></i> Delete Selected
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Certificate pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Create Certificate Modal -->
<div class="modal fade" id="createCertificateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="certStudent" class="form-label">Student *</label>
                            <select class="form-select" id="certStudent" required>
                                <option value="">Select Student</option>
                                <option value="STU004">Emily Davis (STU004)</option>
                                <option value="STU005">Michael Brown (STU005)</option>
                                <option value="STU006">Sarah Johnson (STU006)</option>
                                <option value="STU007">Robert Wilson (STU007)</option>
                                <option value="STU008">Lisa Martinez (STU008)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="certType" class="form-label">Certificate Type *</label>
                            <select class="form-select" id="certType" required>
                                <option value="">Select Type</option>
                                <option value="achievement">Achievement</option>
                                <option value="participation">Participation</option>
                                <option value="excellence">Excellence</option>
                                <option value="completion">Completion</option>
                                <option value="merit">Merit</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="certTemplate" class="form-label">Template *</label>
                            <select class="form-select" id="certTemplate" required>
                                <option value="">Select Template</option>
                                <option value="modern">Modern Design</option>
                                <option value="classic">Classic Design</option>
                                <option value="elegant">Elegant Design</option>
                                <option value="minimal">Minimal Design</option>
                                <option value="custom">Custom Template</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="certClass" class="form-label">Class</label>
                            <input type="text" class="form-control" id="certClass" placeholder="Auto-populated">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="certTitle" class="form-label">Certificate Title *</label>
                        <input type="text" class="form-control" id="certTitle" placeholder="Enter certificate title" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="certDescription" class="form-label">Description *</label>
                        <textarea class="form-control" id="certDescription" rows="3" placeholder="Enter certificate description" required></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="certDate" class="form-label">Issue Date *</label>
                            <input type="date" class="form-control" id="certDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="certNumber" class="form-label">Certificate Number</label>
                            <input type="text" class="form-control" id="certNumber" placeholder="Auto-generated">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="signatoryName" class="form-label">Signatory Name *</label>
                            <input type="text" class="form-control" id="signatoryName" placeholder="Enter signatory name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="signatoryTitle" class="form-label">Signatory Title *</label>
                            <input type="text" class="form-control" id="signatoryTitle" placeholder="Enter signatory title" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeSchoolSeal" checked>
                            <label class="form-check-label" for="includeSchoolSeal">Include school seal</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeQRCode" checked>
                            <label class="form-check-label" for="includeQRCode">Include QR code for verification</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeStudentPhoto">
                            <label class="form-check-label" for="includeStudentPhoto">Include student photo</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="autoIssue" checked>
                            <label class="form-check-label" for="autoIssue">Auto-issue certificate</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="previewCertificate()">Preview</button>
                <button type="button" class="btn btn-success" onclick="createCertificate()">Create Certificate</button>
            </div>
        </div>
    </div>
</div>

<!-- View Certificate Modal -->
<div class="modal fade" id="viewCertificateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Certificate Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="certificate-preview border p-4 text-center" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
                    <div class="mb-4">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="School Logo" style="height: 80px;">
                        <h2 class="mt-2">St. Mary's International School</h2>
                        <p class="text-muted">Certificate of Achievement</p>
                    </div>
                    
                    <div class="mb-4">
                        <h4>This is to certify that</h4>
                        <h3 class="text-primary">Emily Davis</h3>
                        <p class="text-muted">Student ID: STU004 | Class: 2A</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>has demonstrated outstanding performance in</h5>
                        <h4 class="text-success">Mathematics Mid-term Examination</h4>
                        <p>with excellent academic achievement and dedication to studies.</p>
                    </div>
                    
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Grade Achieved:</strong> A
                            </div>
                            <div class="col-md-4">
                                <strong>Percentage:</strong> 85%
                            </div>
                            <div class="col-md-4">
                                <strong>Date:</strong> {{ date('Y-m-d', strtotime('-1 week')) }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="border-top pt-2">
                                    <p class="mb-0"><strong>Sarah Johnson</strong></p>
                                    <p class="mb-0 text-muted">Head of Mathematics Department</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border-top pt-2">
                                    <p class="mb-0"><strong>John Smith</strong></p>
                                    <p class="mb-0 text-muted">Principal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <img src="{{ asset('assets/img/seal.png') }}" alt="School Seal" style="height: 60px;">
                        <p class="small text-muted mt-2">Certificate ID: CERT-2024-001</p>
                        <div class="d-flex justify-content-center">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=CERT-2024-001" alt="QR Code">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="downloadCertificate()">Download PDF</button>
                <button type="button" class="btn btn-info" onclick="printCertificate()">Print</button>
                <button type="button" class="btn btn-success" onclick="emailCertificate()">Email Certificate</button>
            </div>
        </div>
    </div>
</div>

<!-- Batch Generate Modal -->
<div class="modal fade" id="batchGenerateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Batch Generate Certificates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="batchType" class="form-label">Certificate Type *</label>
                            <select class="form-select" id="batchType" required>
                                <option value="">Select Type</option>
                                <option value="achievement">Achievement</option>
                                <option value="participation">Participation</option>
                                <option value="excellence">Excellence</option>
                                <option value="completion">Completion</option>
                                <option value="merit">Merit</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="batchTemplate" class="form-label">Template *</label>
                            <select class="form-select" id="batchTemplate" required>
                                <option value="">Select Template</option>
                                <option value="modern">Modern Design</option>
                                <option value="classic">Classic Design</option>
                                <option value="elegant">Elegant Design</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="batchClass" class="form-label">Class *</label>
                            <select class="form-select" id="batchClass" required>
                                <option value="">Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                                <option value="3B">Class 3B</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="batchSubject" class="form-label">Subject</label>
                            <select class="form-select" id="batchSubject">
                                <option value="">All Subjects</option>
                                <option value="mathematics">Mathematics</option>
                                <option value="english">English</option>
                                <option value="science">Science</option>
                                <option value="history">History</option>
                                <option value="geography">Geography</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="batchCriteria" class="form-label">Selection Criteria</label>
                            <select class="form-select" id="batchCriteria">
                                <option value="all">All Students</option>
                                <option value="grade">Based on Grade</option>
                                <option value="percentage">Based on Percentage</option>
                                <option value="attendance">Based on Attendance</option>
                                <option value="custom">Custom Selection</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="batchThreshold" class="form-label">Threshold</label>
                            <input type="text" class="form-control" id="batchThreshold" placeholder="e.g., Grade A, 85%, 95%">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="batchStudents" class="form-label">Selected Students</label>
                        <div class="border rounded p-3" style="max-height: 200px; overflow-y: auto;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="student1" checked>
                                <label class="form-check-label" for="student1">Emily Davis (STU004)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="student2" checked>
                                <label class="form-check-label" for="student2">Michael Brown (STU005)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="student3">
                                <label class="form-check-label" for="student3">Sarah Johnson (STU006)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="student4">
                                <label class="form-check-label" for="student4">Robert Wilson (STU007)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="student5">
                                <label class="form-check-label" for="student5">Lisa Martinez (STU008)</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="batchTitle" class="form-label">Certificate Title</label>
                        <input type="text" class="form-control" id="batchTitle" placeholder="Enter certificate title">
                    </div>
                    
                    <div class="mb-3">
                        <label for="batchDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="batchDescription" rows="2" placeholder="Enter certificate description"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="batchAutoIssue" checked>
                            <label class="form-check-label" for="batchAutoIssue">Auto-issue certificates</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="batchEmailParents">
                            <label class="form-check-label" for="batchEmailParents">Email certificates to parents</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="batchCreateZip">
                            <label class="form-check-label" for="batchCreateZip">Create ZIP file of all certificates</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="previewBatch()">Preview Selection</button>
                <button type="button" class="btn btn-success" onclick="generateBatch()">Generate Certificates</button>
            </div>
        </div>
    </div>
</div>

<!-- Download Modal -->
<div class="modal fade" id="downloadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Download Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="downloadFormat" class="form-label">Format</label>
                        <select class="form-select" id="downloadFormat">
                            <option value="pdf">PDF Document</option>
                            <option value="png">PNG Image</option>
                            <option value="jpg">JPG Image</option>
                            <option value="svg">SVG Vector</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="downloadQuality" class="form-label">Quality</label>
                        <select class="form-select" id="downloadQuality">
                            <option value="standard">Standard (300 DPI)</option>
                            <option value="high">High (600 DPI)</option>
                            <option value="print">Print Quality (1200 DPI)</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeWatermark">
                            <label class="form-check-label" for="includeWatermark">Include watermark</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeBackground" checked>
                            <label class="form-check-label" for="includeBackground">Include background design</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="downloadCertificate()">Download</button>
            </div>
        </div>
    </div>
</div>

<!-- Print Modal -->
<div class="modal fade" id="printModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Print Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="printCopies" class="form-label">Number of Copies</label>
                        <input type="number" class="form-control" id="printCopies" value="1" min="1" max="10">
                    </div>
                    
                    <div class="mb-3">
                        <label for="printSize" class="form-label">Paper Size</label>
                        <select class="form-select" id="printSize">
                            <option value="a4">A4 (210 x 297 mm)</option>
                            <option value="a3">A3 (297 x 420 mm)</option>
                            <option value="letter">Letter (8.5 x 11 in)</option>
                            <option value="legal">Legal (8.5 x 14 in)</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="printOrientation" class="form-label">Orientation</label>
                        <select class="form-select" id="printOrientation">
                            <option value="landscape">Landscape</option>
                            <option value="portrait">Portrait</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="printBorder" checked>
                            <label class="form-check-label" for="printBorder">Print with border</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="printColor" checked>
                            <label class="form-check-label" for="printColor">Print in color</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="printDoubleSided">
                            <label class="form-check-label" for="printDoubleSided">Double-sided printing</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="printCertificate()">Print</button>
            </div>
        </div>
    </div>
</div>

<!-- Verify Modal -->
<div class="modal fade" id="verifyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verify Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="certId" class="form-label">Certificate ID</label>
                        <input type="text" class="form-control" id="certId" value="CERT-2024-001" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="verifyCode" class="form-label">Verification Code</label>
                        <input type="text" class="form-control" id="verifyCode" placeholder="Enter verification code">
                    </div>
                    
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary w-100" onclick="verifyCertificate()">Verify Certificate</button>
                    </div>
                    
                    <div id="verificationResult" class="alert alert-success" style="display: none;">
                        <h6>Verification Successful!</h6>
                        <p><strong>Certificate ID:</strong> CERT-2024-001</p>
                        <p><strong>Student:</strong> Emily Davis</p>
                        <p><strong>Issue Date:</strong> {{ date('Y-m-d', strtotime('-1 week')) }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-success">Valid</span></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Email Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Email Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="emailTo" class="form-label">Recipient Email *</label>
                        <input type="email" class="form-control" id="emailTo" value="emily.davis@school.com" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="emailCc" class="form-label">CC Email</label>
                        <input type="email" class="form-control" id="emailCc" placeholder="parent@email.com">
                    </div>
                    
                    <div class="mb-3">
                        <label for="emailSubject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="emailSubject" value="Certificate of Achievement - St. Mary's School">
                    </div>
                    
                    <div class="mb-3">
                        <label for="emailMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="emailMessage" rows="4">Dear Emily,

Congratulations on your outstanding achievement! Please find your certificate of achievement attached.

Best regards,
St. Mary's School Administration</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="emailPDF" checked>
                            <label class="form-check-label" for="emailPDF">Send as PDF attachment</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="emailLink">
                            <label class="form-check-label" for="emailLink">Include verification link</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="sendEmail()">Send Email</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="certSelect[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

function createCertificate() {
    const student = document.getElementById('certStudent').value;
    const type = document.getElementById('certType').value;
    const title = document.getElementById('certTitle').value;
    
    if (!student || !type || !title) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert(`Creating certificate: ${title} for ${student}`);
    document.getElementById('createCertificateModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Certificate created successfully!');
        location.reload();
    }, 1500);
}

function previewCertificate() {
    alert('Previewing certificate...');
    setTimeout(() => {
        alert('Certificate preview ready!');
    }, 1000);
}

function downloadCertificate() {
    const format = document.getElementById('downloadFormat').value;
    const quality = document.getElementById('downloadQuality').value;
    
    alert(`Downloading certificate in ${format} format (${quality})`);
    document.getElementById('downloadModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Certificate downloaded successfully!');
    }, 1000);
}

function printCertificate() {
    const copies = document.getElementById('printCopies').value;
    const size = document.getElementById('printSize').value;
    
    alert(`Printing ${copies} copies (${size})`);
    document.getElementById('printModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Certificate sent to printer!');
    }, 1000);
}

function verifyCertificate() {
    const certId = document.getElementById('certId').value;
    const verifyCode = document.getElementById('verifyCode').value;
    
    if (!verifyCode) {
        alert('Please enter verification code');
        return;
    }
    
    document.getElementById('verificationResult').style.display = 'block';
}

function sendEmail() {
    const emailTo = document.getElementById('emailTo').value;
    const subject = document.getElementById('emailSubject').value;
    
    if (!emailTo) {
        alert('Please enter recipient email');
        return;
    }
    
    alert(`Sending certificate to ${emailTo}`);
    document.getElementById('emailModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Certificate sent successfully!');
    }, 1500);
}

function generateBatch() {
    const type = document.getElementById('batchType').value;
    const batchClass = document.getElementById('batchClass').value;
    
    if (!type || !batchClass) {
        alert('Please select certificate type and class');
        return;
    }
    
    alert(`Generating batch certificates for ${batchClass} (${type})`);
    document.getElementById('batchGenerateModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Batch certificates generated successfully!');
        location.reload();
    }, 2000);
}

function previewBatch() {
    alert('Previewing batch selection...');
    setTimeout(() => {
        alert('Batch preview ready!');
    }, 1000);
}

function bulkDownload() {
    const selected = document.querySelectorAll('input[name="certSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select certificates to download');
        return;
    }
    alert(`Downloading ${selected.length} certificates...`);
}

function bulkPrint() {
    const selected = document.querySelectorAll('input[name="certSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select certificates to print');
        return;
    }
    alert(`Printing ${selected.length} certificates...`);
}

function bulkEmail() {
    const selected = document.querySelectorAll('input[name="certSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select certificates to email');
        return;
    }
    alert(`Emailing ${selected.length} certificates...`);
}

function bulkRevoke() {
    const selected = document.querySelectorAll('input[name="certSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select certificates to revoke');
        return;
    }
    if (confirm(`Are you sure you want to revoke ${selected.length} certificates?`)) {
        alert(`Revoking ${selected.length} certificates...`);
    }
}

function deleteSelected() {
    const selected = document.querySelectorAll('input[name="certSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select certificates to delete');
        return;
    }
    if (confirm(`Are you sure you want to delete ${selected.length} certificates?`)) {
        alert(`Deleting ${selected.length} certificates...`);
    }
}
</script>
@endsection
