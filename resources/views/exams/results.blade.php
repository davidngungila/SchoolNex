@extends('layouts.app')

@section('title', 'Exam Results')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Exam Results Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#publishResultsModal">
                        <i class="bx bx-send me-1"></i> Publish Results
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importResultsModal">
                        <i class="bx bx-upload me-1"></i> Import Results
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportResultsModal">
                        <i class="bx bx-download me-1"></i> Export Results
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Results Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">1,245</h4>
                                        <p class="mb-0">Total Results</p>
                                        <small class="text-muted">All exams</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-chart avatar-icon"></i>
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
                                        <h4 class="mb-0">892</h4>
                                        <p class="mb-0">Passed</p>
                                        <small class="text-muted">71.6% pass rate</small>
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
                                        <h4 class="mb-0">353</h4>
                                        <p class="mb-0">Failed</p>
                                        <small class="text-muted">28.4% fail rate</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-x-circle avatar-icon"></i>
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
                                        <h4 class="mb-0">76.5</h4>
                                        <p class="mb-0">Average Score</p>
                                        <small class="text-muted">Overall average</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-trending-up avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="resultExam" class="form-label">Exam</label>
                        <select class="form-select" id="resultExam">
                            <option value="">All Exams</option>
                            <option value="EXM001">Mathematics Mid-term</option>
                            <option value="EXM002">English Final</option>
                            <option value="EXM003">Science Quiz</option>
                            <option value="EXM004">History Assignment</option>
                            <option value="EXM005">Geography Practical</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="resultClass" class="form-label">Class</label>
                        <select class="form-select" id="resultClass">
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
                        <label for="resultSubject" class="form-label">Subject</label>
                        <select class="form-select" id="resultSubject">
                            <option value="">All Subjects</option>
                            <option value="mathematics">Mathematics</option>
                            <option value="english">English</option>
                            <option value="science">Science</option>
                            <option value="history">History</option>
                            <option value="geography">Geography</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="resultStatus" class="form-label">Status</label>
                        <select class="form-select" id="resultStatus">
                            <option value="">All Status</option>
                            <option value="pass">Passed</option>
                            <option value="fail">Failed</option>
                            <option value="absent">Absent</option>
                            <option value="pending">Pending</option>
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

                <!-- Results Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Exam</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Marks</th>
                                <th>Grade</th>
                                <th>Percentage</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold">Emily Davis</div>
                                            <small class="text-muted">STU004</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Mathematics Mid-term</td>
                                <td>Class 2A</td>
                                <td>Mathematics</td>
                                <td>85/100</td>
                                <td><span class="badge bg-success">A</span></td>
                                <td>85%</td>
                                <td><span class="badge bg-success">Pass</span></td>
                                <td>{{ date('Y-m-d', strtotime('-1 week')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewResultModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editResultModal"><i class="bx bx-edit me-2"></i>Edit Result</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#printModal"><i class="bx bx-printer me-2"></i>Print Result</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#certificateModal"><i class="bx bx-award me-2"></i>Generate Certificate</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Michael Brown</div>
                                            <small class="text-muted">STU005</small>
                                        </div>
                                    </div>
                                </td>
                                <td>English Final</td>
                                <td>Class 3B</td>
                                <td>English</td>
                                <td>72/100</td>
                                <td><span class="badge bg-info">B</span></td>
                                <td>72%</td>
                                <td><span class="badge bg-success">Pass</span></td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewResultModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editResultModal"><i class="bx bx-edit me-2"></i>Edit Result</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#printModal"><i class="bx bx-printer me-2"></i>Print Result</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#certificateModal"><i class="bx bx-award me-2"></i>Generate Certificate</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Sarah Johnson</div>
                                            <small class="text-muted">STU006</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Science Quiz</td>
                                <td>Class 1A</td>
                                <td>Science</td>
                                <td>35/50</td>
                                <td><span class="badge bg-warning">C</span></td>
                                <td>70%</td>
                                <td><span class="badge bg-success">Pass</span></td>
                                <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewResultModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editResultModal"><i class="bx bx-edit me-2"></i>Edit Result</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#printModal"><i class="bx bx-printer me-2"></i>Print Result</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#certificateModal"><i class="bx bx-award me-2"></i>Generate Certificate</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Robert Wilson</div>
                                            <small class="text-muted">STU007</small>
                                        </div>
                                    </div>
                                </td>
                                <td>History Assignment</td>
                                <td>Class 2B</td>
                                <td>History</td>
                                <td>28/50</td>
                                <td><span class="badge bg-danger">D</span></td>
                                <td>56%</td>
                                <td><span class="badge bg-danger">Fail</span></td>
                                <td>{{ date('Y-m-d', strtotime('-4 days')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewResultModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editResultModal"><i class="bx bx-edit me-2"></i>Edit Result</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#printModal"><i class="bx bx-printer me-2"></i>Print Result</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#retakeModal"><i class="bx bx-redo me-2"></i>Schedule Retake</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>Lisa Martinez</div>
                                            <small class="text-muted">STU008</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Geography Practical</td>
                                <td>Class 3A</td>
                                <td>Geography</td>
                                <td>-</td>
                                <td><span class="badge bg-secondary">-</span></td>
                                <td>-</td>
                                <td><span class="badge bg-warning">Absent</span></td>
                                <td>{{ date('Y-m-d', strtotime('-5 days')) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewResultModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editResultModal"><i class="bx bx-edit me-2"></i>Add Result</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#retakeModal"><i class="bx bx-redo me-2"></i>Schedule Retake</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                        <div>
                                            <div class="fw-bold>David Chen</div>
                                            <small class="text-muted">STU009</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Mathematics Mid-term</td>
                                <td>Class 2A</td>
                                <td>Mathematics</td>
                                <td>-</td>
                                <td><span class="badge bg-secondary">-</span></td>
                                <td>-</td>
                                <td><span class="badge bg-info">Pending</span></td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewResultModal"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editResultModal"><i class="bx bx-edit me-2"></i>Add Result</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#printModal"><i class="bx bx-printer me-2"></i>Print Admit Card</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Results pagination">
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

<!-- View Result Modal -->
<div class="modal fade" id="viewResultModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Result Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Student Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>Emily Davis</td>
                            </tr>
                            <tr>
                                <td><strong>Student ID:</strong></td>
                                <td>STU004</td>
                            </tr>
                            <tr>
                                <td><strong>Class:</strong></td>
                                <td>Class 2A</td>
                            </tr>
                            <tr>
                                <td><strong>Roll Number:</strong></td>
                                <td>15</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Exam Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Exam:</strong></td>
                                <td>Mathematics Mid-term</td>
                            </tr>
                            <tr>
                                <td><strong>Subject:</strong></td>
                                <td>Mathematics</td>
                            </tr>
                            <tr>
                                <td><strong>Date:</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-1 week')) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total Marks:</strong></td>
                                <td>100</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h6>Performance Summary</h6>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h4 class="mb-0 text-primary">85</h4>
                                        <p class="mb-0">Marks Obtained</p>
                                        <small class="text-muted">Out of 100</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h4 class="mb-0 text-success">85%</h4>
                                        <p class="mb-0">Percentage</p>
                                        <small class="text-muted">Excellent</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h4 class="mb-0 text-success">A</h4>
                                        <p class="mb-0">Grade</p>
                                        <small class="text-muted">Outstanding</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h4 class="mb-0 text-success">Pass</h4>
                                        <p class="mb-0">Status</p>
                                        <small class="text-muted">Successful</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h6>Subject-wise Performance</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Section</th>
                                        <th>Total Marks</th>
                                        <th>Obtained</th>
                                        <th>Percentage</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Algebra</td>
                                        <td>25</td>
                                        <td>22</td>
                                        <td>88%</td>
                                        <td><span class="badge bg-success">A</span></td>
                                    </tr>
                                    <tr>
                                        <td>Geometry</td>
                                        <td>25</td>
                                        <td>21</td>
                                        <td>84%</td>
                                        <td><span class="badge bg-success">A</span></td>
                                    </tr>
                                    <tr>
                                        <td>Arithmetic</td>
                                        <td>25</td>
                                        <td>20</td>
                                        <td>80%</td>
                                        <td><span class="badge bg-success">A</span></td>
                                    </tr>
                                    <tr>
                                        <td>Statistics</td>
                                        <td>25</td>
                                        <td>22</td>
                                        <td>88%</td>
                                        <td><span class="badge bg-success">A</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h6>Teacher's Remarks</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <p>Excellent performance! Emily has shown outstanding understanding of mathematical concepts and problem-solving skills. Keep up the good work!</p>
                                <p class="mb-0"><strong>Teacher:</strong> Sarah Johnson</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#printModal">Print Result</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#certificateModal">Generate Certificate</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Result Modal -->
<div class="modal fade" id="editResultModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Result</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="editStudent" class="form-label">Student</label>
                        <input type="text" class="form-control" id="editStudent" value="Emily Davis (STU004)" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editExam" class="form-label">Exam</label>
                        <input type="text" class="form-control" id="editExam" value="Mathematics Mid-term" readonly>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editMarks" class="form-label">Marks Obtained *</label>
                            <input type="number" class="form-control" id="editMarks" value="85" min="0" max="100" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editTotalMarks" class="form-label">Total Marks</label>
                            <input type="number" class="form-control" id="editTotalMarks" value="100" readonly>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editRemarks" class="form-label">Teacher's Remarks</label>
                        <textarea class="form-control" id="editRemarks" rows="3">Excellent performance! Emily has shown outstanding understanding of mathematical concepts and problem-solving skills.</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="notifyParent" checked>
                            <label class="form-check-label" for="notifyParent">Notify parent via email</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="updateTranscript" checked>
                            <label class="form-check-label" for="updateTranscript">Update student transcript</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateResult()">Update Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Print Result Modal -->
<div class="modal fade" id="printModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Print Result</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="printFormat" class="form-label">Print Format</label>
                        <select class="form-select" id="printFormat">
                            <option value="detailed">Detailed Result</option>
                            <option value="summary">Summary Result</option>
                            <option value="transcript">Transcript Format</option>
                            <option value="official">Official Result</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="printCopies" class="form-label">Number of Copies</label>
                        <input type="number" class="form-control" id="printCopies" value="1" min="1" max="10">
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeSignature" checked>
                            <label class="form-check-label" for="includeSignature">Include teacher's signature</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeWatermark">
                            <label class="form-check-label" for="includeWatermark">Include school watermark</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeGrades" checked>
                            <label class="form-check-label" for="includeGrades">Include grade breakdown</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="printResult()">Print Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Certificate Modal -->
<div class="modal fade" id="certificateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="certificateType" class="form-label">Certificate Type</label>
                        <select class="form-select" id="certificateType">
                            <option value="achievement">Achievement Certificate</option>
                            <option value="participation">Participation Certificate</option>
                            <option value="excellence">Excellence Certificate</option>
                            <option value="merit">Merit Certificate</option>
                            <option value="completion">Completion Certificate</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="certificateTitle" class="form-label">Certificate Title</label>
                        <input type="text" class="form-control" id="certificateTitle" value="Outstanding Performance in Mathematics">
                    </div>
                    
                    <div class="mb-3">
                        <label for="certificateDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="certificateDescription" rows="3">This is to certify that Emily Davis has demonstrated outstanding performance in Mathematics Mid-term Examination with 85% marks.</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="issueDate" class="form-label">Issue Date</label>
                            <input type="date" class="form-control" id="issueDate" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="certificateNumber" class="form-label">Certificate Number</label>
                            <input type="text" class="form-control" id="certificateNumber" value="CERT-2024-001">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="signatoryName" class="form-label">Signatory Name</label>
                        <input type="text" class="form-control" id="signatoryName" value="Sarah Johnson">
                    </div>
                    
                    <div class="mb-3">
                        <label for="signatoryTitle" class="form-label">Signatory Title</label>
                        <input type="text" class="form-control" id="signatoryTitle" value="Head of Mathematics Department">
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeSchoolSeal" checked>
                            <label class="form-check-label" for="includeSchoolSeal">Include school seal</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeQRCode">
                            <label class="form-check-label" for="includeQRCode">Include QR code for verification</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="previewCertificate()">Preview</button>
                <button type="button" class="btn btn-success" onclick="generateCertificate()">Generate Certificate</button>
            </div>
        </div>
    </div>
</div>

<!-- Publish Results Modal -->
<div class="modal fade" id="publishResultsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Publish Results</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="publishExam" class="form-label">Select Exam *</label>
                        <select class="form-select" id="publishExam" required>
                            <option value="">Select Exam</option>
                            <option value="EXM001">Mathematics Mid-term</option>
                            <option value="EXM002">English Final</option>
                            <option value="EXM003">Science Quiz</option>
                            <option value="EXM004">History Assignment</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="publishClass" class="form-label">Select Class</label>
                        <select class="form-select" id="publishClass">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                            <option value="3A">Class 3A</option>
                            <option value="3B">Class 3B</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="publishDate" class="form-label">Publish Date *</label>
                        <input type="datetime-local" class="form-control" id="publishDate" required>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="notifyStudents" checked>
                            <label class="form-check-label" for="notifyStudents">Notify students via email</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="notifyParents" checked>
                            <label class="form-check-label" for="notifyParents">Notify parents via email</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sendSMS">
                            <label class="form-check-label" for="sendSMS">Send SMS notifications</label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="publishMessage" class="form-label">Custom Message</label>
                        <textarea class="form-control" id="publishMessage" rows="3" placeholder="Enter custom message for notification...">Dear students and parents, Examination results have been published. Please check your student portal for detailed results.</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" onclick="publishResults()">Publish Results</button>
            </div>
        </div>
    </div>
</div>

<script>
function updateResult() {
    const marks = document.getElementById('editMarks').value;
    const remarks = document.getElementById('editRemarks').value;
    
    alert(`Updating result: Marks=${marks}, Remarks=${remarks}`);
    document.getElementById('editResultModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Result updated successfully!');
        location.reload();
    }, 1500);
}

function printResult() {
    const format = document.getElementById('printFormat').value;
    const copies = document.getElementById('printCopies').value;
    
    alert(`Printing ${copies} copies in ${format} format...`);
    document.getElementById('printModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Result sent to printer!');
    }, 1000);
}

function previewCertificate() {
    alert('Previewing certificate...');
    setTimeout(() => {
        alert('Certificate preview ready!');
    }, 1000);
}

function generateCertificate() {
    const type = document.getElementById('certificateType').value;
    const title = document.getElementById('certificateTitle').value;
    
    alert(`Generating ${type} certificate: ${title}`);
    document.getElementById('certificateModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Certificate generated successfully!');
    }, 2000);
}

function publishResults() {
    const exam = document.getElementById('publishExam').value;
    const publishDate = document.getElementById('publishDate').value;
    
    if (!exam || !publishDate) {
        alert('Please select exam and publish date');
        return;
    }
    
    alert(`Publishing results for ${exam} on ${publishDate}`);
    document.getElementById('publishResultsModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Results published successfully!');
        location.reload();
    }, 2000);
}
</script>
@endsection
