@extends('layouts.app')

@section('title', 'Exam Schedule')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Exam Schedule Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createExamModal">
                        <i class="bx bx-plus me-1"></i> Create Exam
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#timetableModal">
                        <i class="bx bx-calendar me-1"></i> Generate Timetable
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#publishModal">
                        <i class="bx bx-send me-1"></i> Publish Results
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="examType" class="form-label">Exam Type</label>
                        <select class="form-select" id="examType">
                            <option value="">All Types</option>
                            <option value="quiz">Quiz</option>
                            <option value="test">Test</option>
                            <option value="midterm">Midterm</option>
                            <option value="final">Final Exam</option>
                            <option value="assignment">Assignment</option>
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
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="examSubject" class="form-label">Subject</label>
                        <select class="form-select" id="examSubject">
                            <option value="">All Subjects</option>
                            <option value="math">Mathematics</option>
                            <option value="english">English</option>
                            <option value="physics">Physics</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="biology">Biology</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="examStatus" class="form-label">Status</label>
                        <select class="form-select" id="examStatus">
                            <option value="">All Status</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="term">This Term</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Exam Schedule Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Exam ID</th>
                                <th>Exam Name</th>
                                <th>Type</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Duration</th>
                                <th>Venue</th>
                                <th>Invigilator</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>EXM001</strong></td>
                                <td>Mathematics Midterm Examination</td>
                                <td><span class="badge bg-warning">Midterm</span></td>
                                <td>Class 1A</td>
                                <td>Mathematics</td>
                                <td>{{ date('Y-m-d', strtotime('+3 days')) }}</td>
                                <td>09:00 AM</td>
                                <td>2 hours</td>
                                <td>Room 101</td>
                                <td>Mr. John Smith</td>
                                <td><span class="badge bg-primary">Scheduled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Students</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Question Paper</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Admit Card</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Cancel</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>EXM002</strong></td>
                                <td>English Literature Test</td>
                                <td><span class="badge bg-info">Test</span></td>
                                <td>Class 1A</td>
                                <td>English</td>
                                <td>{{ date('Y-m-d', strtotime('+1 day')) }}</td>
                                <td>11:00 AM</td>
                                <td>1.5 hours</td>
                                <td>Room 102</td>
                                <td>Mrs. Sarah Johnson</td>
                                <td><span class="badge bg-success">In Progress</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Students</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Question Paper</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Admit Card</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-stop me-2"></i>End Exam</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>EXM003</strong></td>
                                <td>Physics Practical Examination</td>
                                <td><span class="badge bg-danger">Final Exam</span></td>
                                <td>Class 2A</td>
                                <td>Physics</td>
                                <td>{{ date('Y-m-d', strtotime('+5 days')) }}</td>
                                <td>02:00 PM</td>
                                <td>3 hours</td>
                                <td>Physics Lab</td>
                                <td>Dr. Michael Brown</td>
                                <td><span class="badge bg-primary">Scheduled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Students</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Question Paper</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Admit Card</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Cancel</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>EXM004</strong></td>
                                <td>Chemistry Quiz - Chapter 3</td>
                                <td><span class="badge bg-secondary">Quiz</span></td>
                                <td>Class 2B</td>
                                <td>Chemistry</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>10:00 AM</td>
                                <td>45 minutes</td>
                                <td>Room 103</td>
                                <td>Mrs. Emily Davis</td>
                                <td><span class="badge bg-success">In Progress</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Students</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Question Paper</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Admit Card</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-stop me-2"></i>End Exam</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>EXM005</strong></td>
                                <td>Biology Final Examination</td>
                                <td><span class="badge bg-danger">Final Exam</span></td>
                                <td>Class 3A</td>
                                <td>Biology</td>
                                <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                <td>09:00 AM</td>
                                <td>2.5 hours</td>
                                <td>Biology Lab</td>
                                <td>Dr. Robert Wilson</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-chart me-2"></i>View Results</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Question Paper</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-download me-2"></i>Download Results</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Report</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-send me-2"></i>Publish Results</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>EXM006</strong></td>
                                <td>History Assignment</td>
                                <td><span class="badge bg-primary">Assignment</span></td>
                                <td>Class 1B</td>
                                <td>History</td>
                                <td>{{ date('Y-m-d', strtotime('+7 days')) }}</td>
                                <td>All Day</td>
                                <td>1 week</td>
                                <td>Classroom</td>
                                <td>Mr. James Anderson</td>
                                <td><span class="badge bg-primary">Scheduled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>View Students</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-file me-2"></i>Assignment Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-printer me-2"></i>Print Instructions</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-x-circle me-2"></i>Cancel</a></li>
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

<!-- Create Exam Modal -->
<div class="modal fade" id="createExamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Examination</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Basic Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Basic Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="examName" class="form-label">Exam Name *</label>
                                    <input type="text" class="form-control" id="examName" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="examTypeSelect" class="form-label">Exam Type *</label>
                                    <select class="form-select" id="examTypeSelect" required>
                                        <option value="">Select Type</option>
                                        <option value="quiz">Quiz</option>
                                        <option value="test">Test</option>
                                        <option value="midterm">Midterm</option>
                                        <option value="final">Final Exam</option>
                                        <option value="assignment">Assignment</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="examClassSelect" class="form-label">Class *</label>
                                    <select class="form-select" id="examClassSelect" required>
                                        <option value="">Select Class</option>
                                        <option value="1A">Class 1A</option>
                                        <option value="1B">Class 1B</option>
                                        <option value="2A">Class 2A</option>
                                        <option value="2B">Class 2B</option>
                                        <option value="3A">Class 3A</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="examSubjectSelect" class="form-label">Subject *</label>
                                    <select class="form-select" id="examSubjectSelect" required>
                                        <option value="">Select Subject</option>
                                        <option value="math">Mathematics</option>
                                        <option value="english">English</option>
                                        <option value="physics">Physics</option>
                                        <option value="chemistry">Chemistry</option>
                                        <option value="biology">Biology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="examDate" class="form-label">Exam Date *</label>
                                    <input type="date" class="form-control" id="examDate" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="examTime" class="form-label">Start Time *</label>
                                    <input type="time" class="form-control" id="examTime" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="examDuration" class="form-label">Duration (minutes) *</label>
                                    <input type="number" class="form-control" id="examDuration" min="15" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="examVenue" class="form-label">Venue *</label>
                                    <select class="form-select" id="examVenue" required>
                                        <option value="">Select Venue</option>
                                        <option value="101">Room 101</option>
                                        <option value="102">Room 102</option>
                                        <option value="103">Room 103</option>
                                        <option value="lab201">Physics Lab</option>
                                        <option value="lab202">Chemistry Lab</option>
                                        <option value="lab203">Biology Lab</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Exam Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Exam Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="totalMarks" class="form-label">Total Marks *</label>
                                    <input type="number" class="form-control" id="totalMarks" min="1" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="passingMarks" class="form-label">Passing Marks *</label>
                                    <input type="number" class="form-control" id="passingMarks" min="1" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="invigilator" class="form-label">Invigilator *</label>
                                    <select class="form-select" id="invigilator" required>
                                        <option value="">Select Teacher</option>
                                        <option value="TCH001">Mr. John Smith</option>
                                        <option value="TCH002">Mrs. Sarah Johnson</option>
                                        <option value="TCH003">Dr. Michael Brown</option>
                                        <option value="TCH004">Mrs. Emily Davis</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="assistantInvigilator" class="form-label">Assistant Invigilator</label>
                                    <select class="form-select" id="assistantInvigilator">
                                        <option value="">Select Teacher</option>
                                        <option value="TCH005">Dr. Robert Wilson</option>
                                        <option value="TCH006">Mr. James Anderson</option>
                                        <option value="TCH007">Mrs. Lisa Martinez</option>
                                        <option value="TCH008">Ms. Jennifer Taylor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="examInstructions" class="form-label">Instructions</label>
                                    <textarea class="form-control" id="examInstructions" rows="3" placeholder="Enter exam instructions..."></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="examMaterials" class="form-label">Required Materials</label>
                                    <textarea class="form-control" id="examMaterials" rows="3" placeholder="e.g., Calculator, Ruler, Pen..."></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="allowCalculator">
                                        <label class="form-check-label" for="allowCalculator">
                                            Allow Calculator
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="blindGrading">
                                        <label class="form-check-label" for="blindGrading">
                                            Blind Grading (Anonymous)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="autoSubmit">
                                        <label class="form-check-label" for="autoSubmit">
                                            Auto-submit at end time
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question Paper -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Question Paper</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="questionPaper" class="form-label">Upload Question Paper</label>
                                    <input type="file" class="form-control" id="questionPaper" accept=".pdf,.doc,.docx">
                                    <small class="text-muted">Upload PDF or Word document</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="answerSheet" class="form-label">Upload Answer Sheet (Optional)</label>
                                    <input type="file" class="form-control" id="answerSheet" accept=".pdf,.doc,.docx">
                                    <small class="text-muted">Upload answer key for reference</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="questionFormat" class="form-label">Question Format</label>
                                    <select class="form-select" id="questionFormat">
                                        <option value="objective">Objective (Multiple Choice)</option>
                                        <option value="subjective">Subjective (Essay)</option>
                                        <option value="mixed">Mixed (Both)</option>
                                        <option value="practical">Practical</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Draft</button>
                <button type="button" class="btn btn-success">Create Exam</button>
            </div>
        </div>
    </div>
</div>

<!-- Generate Timetable Modal -->
<div class="modal fade" id="timetableModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Exam Timetable</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="timetableClass" class="form-label">Class *</label>
                            <select class="form-select" id="timetableClass" required>
                                <option value="">Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="examPeriod" class="form-label">Exam Period *</label>
                            <select class="form-select" id="examPeriod" required>
                                <option value="">Select Period</option>
                                <option value="midterm">Midterm Exams</option>
                                <option value="final">Final Exams</option>
                                <option value="mock">Mock Exams</option>
                                <option value="custom">Custom Period</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="timetableTerm" class="form-label">Term *</label>
                            <select class="form-select" id="timetableTerm" required>
                                <option value="">Select Term</option>
                                <option value="1">Term 1</option>
                                <option value="2">Term 2</option>
                                <option value="3">Term 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date *</label>
                            <input type="date" class="form-control" id="startDate" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">End Date *</label>
                            <input type="date" class="form-control" id="endDate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="examStartTime" class="form-label">Default Start Time</label>
                            <input type="time" class="form-control" id="examStartTime" value="09:00">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="examEndTime" class="form-label">Default End Time</label>
                            <input type="time" class="form-control" id="examEndTime" value="12:00">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subjects to Include:</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeMath" checked>
                                    <label class="form-check-label" for="includeMath">Mathematics</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeEnglish" checked>
                                    <label class="form-check-label" for="includeEnglish">English</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includePhysics" checked>
                                    <label class="form-check-label" for="includePhysics">Physics</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeChemistry" checked>
                                    <label class="form-check-label" for="includeChemistry">Chemistry</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeBiology" checked>
                                    <label class="form-check-label" for="includeBiology">Biology</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeHistory" checked>
                                    <label class="form-check-label" for="includeHistory">History</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeGeography" checked>
                                    <label class="form-check-label" for="includeGeography">Geography</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeArts" checked>
                                    <label class="form-check-label" for="includeArts">Fine Arts</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeSports">
                                    <label class="form-check-label" for="includeSports">Physical Education</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gapBetweenExams" class="form-label">Gap Between Exams (hours)</label>
                        <input type="number" class="form-control" id="gapBetweenExams" min="0" max="24" value="24">
                        <small class="text-muted">Minimum gap required between consecutive exams</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Generate Timetable</button>
            </div>
        </div>
    </div>
</div>

<!-- Publish Results Modal -->
<div class="modal fade" id="publishModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Publish Exam Results</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="publishExam" class="form-label">Select Exam</label>
                        <select class="form-select" id="publishExam">
                            <option value="">Select Exam</option>
                            <option value="EXM005">Biology Final Examination - Class 3A</option>
                            <option value="EXM003">Physics Practical Examination - Class 2A</option>
                            <option value="EXM001">Mathematics Midterm - Class 1A</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="publishMethod" class="form-label">Publish Method</label>
                        <select class="form-select" id="publishMethod">
                            <option value="immediate">Publish Immediately</option>
                            <option value="scheduled">Schedule for Later</option>
                            <option value="approval">Require Approval</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="notifyParents" class="form-label">Notification Settings</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="notifyParents" checked>
                            <label class="form-check-label" for="notifyParents">
                                Send SMS notifications to parents
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="notifyStudents" checked>
                            <label class="form-check-label" for="notifyStudents">
                                Send email notifications to students
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="generateReports" checked>
                            <label class="form-check-label" for="generateReports">
                                Generate individual result reports
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="publishMessage" class="form-label">Custom Message (Optional)</label>
                        <textarea class="form-control" id="publishMessage" rows="3" placeholder="Add a custom message to be sent with results..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Preview Results</button>
                <button type="button" class="btn btn-success">Publish Results</button>
            </div>
        </div>
    </div>
</div>
@endsection
