@extends('layouts.app')

@section('title', 'Exams')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Exams Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createExamModal">
                        <i class="bx bx-plus me-1"></i> Create Exam
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bx bx-upload me-1"></i> Import
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Exam Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">48</h4>
                                        <p class="mb-0">Total Exams</p>
                                        <small class="text-muted">This academic year</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-file-blank avatar-icon"></i>
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
                                        <h4 class="mb-0">12</h4>
                                        <p class="mb-0">Active</p>
                                        <small class="text-muted">Currently running</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-play-circle avatar-icon"></i>
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
                                        <h4 class="mb-0">18</h4>
                                        <p class="mb-0">Upcoming</p>
                                        <small class="text-muted">Scheduled</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-calendar avatar-icon"></i>
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
                                        <h4 class="mb-0">18</h4>
                                        <p class="mb-0">Completed</p>
                                        <small class="text-muted">Results published</small>
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
                        <label for="examStatus" class="form-label">Status</label>
                        <select class="form-select" id="examStatus">
                            <option value="">All Status</option>
                            <option value="draft">Draft</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="active">Active</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="examType" class="form-label">Exam Type</label>
                        <select class="form-select" id="examType">
                            <option value="">All Types</option>
                            <option value="mid_term">Mid Term</option>
                            <option value="final">Final</option>
                            <option value="quiz">Quiz</option>
                            <option value="assignment">Assignment</option>
                            <option value="practical">Practical</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="examClass" class="form-label">Class</label>
                        <select class="form-select" id="examClass">
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
                        <label for="examSubject" class="form-label">Subject</label>
                        <select class="form-select" id="examSubject">
                            <option value="">All Subjects</option>
                            <option value="mathematics">Mathematics</option>
                            <option value="english">English</option>
                            <option value="science">Science</option>
                            <option value="history">History</option>
                            <option value="geography">Geography</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchExam" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchExam" placeholder="Exam name...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Exams Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>Exam Name</th>
                                <th>Type</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="examSelect[]" value="EXM001"></td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Mathematics Mid-term Exam</div>
                                        <small class="text-muted">ID: EXM001</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-primary">Mid Term</span></td>
                                <td>Class 2A</td>
                                <td>Mathematics</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>2 hours</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewExamModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editExamModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateExamModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#questionsModal"><i class="bx bx-help-circle me-2"></i>Questions</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resultsModal"><i class="bx bx-chart me-2"></i>Results</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Pause</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="examSelect[]" value="EXM002"></td>
                                <td>
                                    <div>
                                        <div class="fw-bold">English Final Exam</div>
                                        <small class="text-muted">ID: EXM002</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Final</span></td>
                                <td>Class 3B</td>
                                <td>English</td>
                                <td>{{ date('Y-m-d', strtotime('+2 days')) }}</td>
                                <td>3 hours</td>
                                <td><span class="badge bg-warning">Scheduled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewExamModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editExamModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateExamModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#questionsModal"><i class="bx bx-help-circle me-2"></i>Questions</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resultsModal"><i class="bx bx-chart me-2"></i>Results</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Pause</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="examSelect[]" value="EXM003"></td>
                                <td>
                                    <div>
                                        <div class="fw-bold>Science Quiz</div>
                                        <small class="text-muted">ID: EXM003</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-info">Quiz</span></td>
                                <td>Class 1A</td>
                                <td>Science</td>
                                <td>{{ date('Y-m-d', strtotime('-1 week')) }}</td>
                                <td>1 hour</td>
                                <td><span class="badge bg-info">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewExamModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editExamModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateExamModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#questionsModal"><i class="bx bx-help-circle me-2"></i>Questions</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resultsModal"><i class="bx bx-chart me-2"></i>Results</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-redo me-2"></i>Archive</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="examSelect[]" value="EXM004"></td>
                                <td>
                                    <div>
                                        <div class="fw-bold>History Assignment</div>
                                        <small class="text-muted">ID: EXM004</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-secondary">Assignment</span></td>
                                <td>Class 2B</td>
                                <td>History</td>
                                <td>{{ date('Y-m-d', strtotime('+1 week')) }}</td>
                                <td>2 days</td>
                                <td><span class="badge bg-warning">Scheduled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewExamModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editExamModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateExamModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#questionsModal"><i class="bx bx-help-circle me-2"></i>Questions</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resultsModal"><i class="bx bx-chart me-2"></i>Results</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Pause</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="examSelect[]" value="EXM005"></td>
                                <td>
                                    <div>
                                        <div class="fw-bold>Geography Practical</div>
                                        <small class="text-muted">ID: EXM005</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Practical</span></td>
                                <td>Class 3A</td>
                                <td>Geography</td>
                                <td>{{ date('Y-m-d', strtotime('+3 days')) }}</td>
                                <td>4 hours</td>
                                <td><span class="badge bg-warning">Scheduled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewExamModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editExamModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#duplicateExamModal"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#questionsModal"><i class="bx bx-help-circle me-2"></i>Questions</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resultsModal"><i class="bx bx-chart me-2"></i>Results</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Pause</a></li>
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
                            <button type="button" class="btn btn-outline-primary" onclick="bulkPublish()">
                                <i class="bx bx-send me-1"></i> Publish Selected
                            </button>
                            <button type="button" class="btn btn-outline-warning" onclick="bulkPause()">
                                <i class="bx bx-pause me-1"></i> Pause Selected
                            </button>
                            <button type="button" class="btn btn-outline-success" onclick="bulkArchive()">
                                <i class="bx bx-archive me-1"></i> Archive Selected
                            </button>
                            <button type="button" class="btn btn-outline-info" onclick="bulkExport()">
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

<!-- Create Exam Modal -->
<div class="modal fade" id="createExamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Exam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="examName" class="form-label">Exam Name *</label>
                            <input type="text" class="form-control" id="examName" placeholder="Enter exam name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="examCode" class="form-label">Exam Code *</label>
                            <input type="text" class="form-control" id="examCode" placeholder="e.g., EXM001" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="examType" class="form-label">Exam Type *</label>
                            <select class="form-select" id="examType" required>
                                <option value="">Select Type</option>
                                <option value="mid_term">Mid Term</option>
                                <option value="final">Final</option>
                                <option value="quiz">Quiz</option>
                                <option value="assignment">Assignment</option>
                                <option value="practical">Practical</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="examClass" class="form-label">Class *</label>
                            <select class="form-select" id="examClass" required>
                                <option value="">Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                                <option value="3B">Class 3B</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="examSubject" class="form-label">Subject *</label>
                            <select class="form-select" id="examSubject" required>
                                <option value="">Select Subject</option>
                                <option value="mathematics">Mathematics</option>
                                <option value="english">English</option>
                                <option value="science">Science</option>
                                <option value="history">History</option>
                                <option value="geography">Geography</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="examTeacher" class="form-label">Teacher *</label>
                            <select class="form-select" id="examTeacher" required>
                                <option value="">Select Teacher</option>
                                <option value="TCH001">Sarah Johnson</option>
                                <option value="TCH002">Michael Brown</option>
                                <option value="TCH003">Emily Davis</option>
                                <option value="TCH004">Robert Wilson</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="examDate" class="form-label">Exam Date *</label>
                            <input type="date" class="form-control" id="examDate" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="examStartTime" class="form-label">Start Time *</label>
                            <input type="time" class="form-control" id="examStartTime" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="examDuration" class="form-label">Duration (hours) *</label>
                            <input type="number" class="form-control" id="examDuration" min="0.5" max="8" step="0.5" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="totalMarks" class="form-label">Total Marks *</label>
                            <input type="number" class="form-control" id="totalMarks" min="1" max="1000" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="passingMarks" class="form-label">Passing Marks *</label>
                            <input type="number" class="form-control" id="passingMarks" min="1" max="1000" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="examDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="examDescription" rows="3" placeholder="Enter exam description..."></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="examInstructions" class="form-label">Instructions</label>
                        <textarea class="form-control" id="examInstructions" rows="3" placeholder="Enter exam instructions for students..."></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="allowNegativeMarking">
                            <label class="form-check-label" for="allowNegativeMarking">Allow negative marking</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="randomizeQuestions">
                            <label class="form-check-label" for="randomizeQuestions">Randomize question order</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="showResults" checked>
                            <label class="form-check-label" for="showResults">Show results to students</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="autoGrade" checked>
                            <label class="form-check-label" for="autoGrade">Auto-grade objective questions</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createExam()">Create Exam</button>
            </div>
        </div>
    </div>
</div>

<!-- View Exam Modal -->
<div class="modal fade" id="viewExamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Exam Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Exam Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Exam Name:</strong></td>
                                <td>Mathematics Mid-term Exam</td>
                            </tr>
                            <tr>
                                <td><strong>Exam Code:</strong></td>
                                <td>EXM001</td>
                            </tr>
                            <tr>
                                <td><strong>Type:</strong></td>
                                <td><span class="badge bg-primary">Mid Term</span></td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td><strong>Created:</strong></td>
                                <td>{{ date('Y-m-d', strtotime('-1 week')) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Schedule & Settings</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Class:</strong></td>
                                <td>Class 2A</td>
                            </tr>
                            <tr>
                                <td><strong>Subject:</strong></td>
                                <td>Mathematics</td>
                            </tr>
                            <tr>
                                <td><strong>Teacher:</strong></td>
                                <td>Sarah Johnson</td>
                            </tr>
                            <tr>
                                <td><strong>Date:</strong></td>
                                <td>{{ date('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Duration:</strong></td>
                                <td>2 hours</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <h6>Grading</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Total Marks:</strong></td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td><strong>Passing Marks:</strong></td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td><strong>Students Enrolled:</strong></td>
                                <td>32</td>
                            </tr>
                            <tr>
                                <td><strong>Students Attempted:</strong></td>
                                <td>28</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Settings</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Negative Marking:</strong></td>
                                <td>No</td>
                            </tr>
                            <tr>
                                <td><strong>Randomize Questions:</strong></td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <td><strong>Show Results:</strong></td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <td><strong>Auto Grade:</strong></td>
                                <td>Yes</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="mt-3">
                    <h6>Description</h6>
                    <div class="card bg-light">
                        <div class="card-body">
                            <p>Mid-term examination covering chapters 1-5 of the Mathematics curriculum including algebra, geometry, and basic arithmetic operations.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-3">
                    <h6>Instructions</h6>
                    <div class="card bg-light">
                        <div class="card-body">
                            <ol>
                                <li>Read all questions carefully before answering</li>
                                <li>Manage your time effectively</li>
                                <li>No calculators allowed</li>
                                <li>Show all working steps for full marks</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editExamModal">Edit Exam</button>
                <button type="button" class="btn btn-info" onclick="viewResults()">View Results</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Exam Modal -->
<div class="modal fade" id="editExamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Exam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editExamName" class="form-label">Exam Name *</label>
                            <input type="text" class="form-control" id="editExamName" value="Mathematics Mid-term Exam" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editExamCode" class="form-label">Exam Code *</label>
                            <input type="text" class="form-control" id="editExamCode" value="EXM001" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editExamType" class="form-label">Exam Type *</label>
                            <select class="form-select" id="editExamType" required>
                                <option value="mid_term" selected>Mid Term</option>
                                <option value="final">Final</option>
                                <option value="quiz">Quiz</option>
                                <option value="assignment">Assignment</option>
                                <option value="practical">Practical</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editExamClass" class="form-label">Class *</label>
                            <select class="form-select" id="editExamClass" required>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A" selected>Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                                <option value="3B">Class 3B</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editExamSubject" class="form-label">Subject *</label>
                            <select class="form-select" id="editExamSubject" required>
                                <option value="mathematics" selected>Mathematics</option>
                                <option value="english">English</option>
                                <option value="science">Science</option>
                                <option value="history">History</option>
                                <option value="geography">Geography</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editExamStatus" class="form-label">Status</label>
                            <select class="form-select" id="editExamStatus">
                                <option value="draft">Draft</option>
                                <option value="scheduled">Scheduled</option>
                                <option value="active" selected>Active</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="editExamDate" class="form-label">Exam Date *</label>
                            <input type="date" class="form-control" id="editExamDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="editExamStartTime" class="form-label">Start Time *</label>
                            <input type="time" class="form-control" id="editExamStartTime" value="09:00" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="editExamDuration" class="form-label">Duration (hours) *</label>
                            <input type="number" class="form-control" id="editExamDuration" value="2" min="0.5" max="8" step="0.5" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editTotalMarks" class="form-label">Total Marks *</label>
                            <input type="number" class="form-control" id="editTotalMarks" value="100" min="1" max="1000" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editPassingMarks" class="form-label">Passing Marks *</label>
                            <input type="number" class="form-control" id="editPassingMarks" value="40" min="1" max="1000" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editExamDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editExamDescription" rows="3">Mid-term examination covering chapters 1-5 of the Mathematics curriculum including algebra, geometry, and basic arithmetic operations.</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editExamInstructions" class="form-label">Instructions</label>
                        <textarea class="form-control" id="editExamInstructions" rows="3">1. Read all questions carefully before answering
2. Manage your time effectively
3. No calculators allowed
4. Show all working steps for full marks</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateExam()">Update Exam</button>
            </div>
        </div>
    </div>
</div>

<!-- Duplicate Exam Modal -->
<div class="modal fade" id="duplicateExamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Duplicate Exam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="sourceExam" class="form-label">Source Exam</label>
                        <input type="text" class="form-control" id="sourceExam" value="Mathematics Mid-term Exam" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="newExamName" class="form-label">New Exam Name *</label>
                        <input type="text" class="form-control" id="newExamName" placeholder="Enter new exam name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="newExamCode" class="form-label">New Exam Code *</label>
                        <input type="text" class="form-control" id="newExamCode" placeholder="e.g., EXM002" required>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="copyQuestions" checked>
                            <label class="form-check-label" for="copyQuestions">Copy questions from source exam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="copySettings" checked>
                            <label class="form-check-label" for="copySettings">Copy exam settings</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="copySchedule">
                            <label class="form-check-label" for="copySchedule">Copy schedule information</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="duplicateExam()">Duplicate Exam</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="examSelect[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

function createExam() {
    const examName = document.getElementById('examName').value;
    const examCode = document.getElementById('examCode').value;
    const examType = document.getElementById('examType').value;
    const examClass = document.getElementById('examClass').value;
    const examSubject = document.getElementById('examSubject').value;
    
    if (!examName || !examCode || !examType || !examClass || !examSubject) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert(`Creating exam: ${examName} (${examCode})`);
    document.getElementById('createExamModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Exam created successfully!');
        location.reload();
    }, 1500);
}

function updateExam() {
    const examName = document.getElementById('editExamName').value;
    const examCode = document.getElementById('editExamCode').value;
    
    alert(`Updating exam: ${examName} (${examCode})`);
    document.getElementById('editExamModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Exam updated successfully!');
        location.reload();
    }, 1500);
}

function duplicateExam() {
    const sourceExam = document.getElementById('sourceExam').value;
    const newExamName = document.getElementById('newExamName').value;
    const newExamCode = document.getElementById('newExamCode').value;
    
    if (!newExamName || !newExamCode) {
        alert('Please enter new exam name and code');
        return;
    }
    
    alert(`Duplicating "${sourceExam}" as "${newExamName}" (${newExamCode})`);
    document.getElementById('duplicateExamModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Exam duplicated successfully!');
        location.reload();
    }, 1500);
}

function viewResults() {
    alert('Viewing exam results...');
    document.getElementById('viewExamModal').querySelector('.btn-close').click();
}

function bulkPublish() {
    const selected = document.querySelectorAll('input[name="examSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select exams to publish');
        return;
    }
    alert(`Publishing ${selected.length} exams...`);
}

function bulkPause() {
    const selected = document.querySelectorAll('input[name="examSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select exams to pause');
        return;
    }
    alert(`Pausing ${selected.length} exams...`);
}

function bulkArchive() {
    const selected = document.querySelectorAll('input[name="examSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select exams to archive');
        return;
    }
    alert(`Archiving ${selected.length} exams...`);
}

function bulkExport() {
    const selected = document.querySelectorAll('input[name="examSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select exams to export');
        return;
    }
    alert(`Exporting ${selected.length} exams...`);
}

function deleteSelected() {
    const selected = document.querySelectorAll('input[name="examSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select exams to delete');
        return;
    }
    if (confirm(`Are you sure you want to delete ${selected.length} exams?`)) {
        alert(`Deleting ${selected.length} exams...`);
    }
}
</script>
@endsection
