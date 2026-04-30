@extends('layouts.app')

@section('title', 'Class Journal Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Class Journal Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEntryModal">
                        <i class="bx bx-plus me-1"></i> Add Entry
                    </button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Generate Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="journalClass" class="form-label">Class</label>
                        <select class="form-select" id="journalClass">
                            <option value="1A" selected>Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                            <option value="3A">Class 3A</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="journalSubject" class="form-label">Subject</label>
                        <select class="form-select" id="journalSubject">
                            <option value="all" selected>All Subjects</option>
                            <option value="math">Mathematics</option>
                            <option value="english">English</option>
                            <option value="physics">Physics</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="biology">Biology</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today" selected>Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="term">This Term</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="entryType" class="form-label">Entry Type</label>
                        <select class="form-select" id="entryType">
                            <option value="all" selected>All Types</option>
                            <option value="lesson">Lesson Notes</option>
                            <option value="assignment">Assignment</option>
                            <option value="exam">Exam Results</option>
                            <option value="behavior">Behavior</option>
                            <option value="announcement">Announcement</option>
                        </select>
                    </div>
                </div>

                <!-- Journal Entries Timeline -->
                <div class="timeline">
                    <!-- Today's Entries -->
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-primary"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">Mathematics Lesson - Quadratic Equations</h6>
                                        <small class="text-muted">Today, 08:30 AM - Mr. John Smith</small>
                                    </div>
                                    <div>
                                        <span class="badge bg-primary">Lesson Notes</span>
                                        <span class="badge bg-success">Class 1A</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2"><strong>Topic:</strong> Introduction to Quadratic Equations</p>
                                    <p class="mb-2"><strong>Objectives:</strong> Students should be able to identify quadratic equations and solve simple quadratic equations using factoring.</p>
                                    <p class="mb-2"><strong>Activities:</strong> Interactive lecture, group practice problems, individual worksheet completion.</p>
                                    <p class="mb-2"><strong>Materials:</strong> Whiteboard, markers, worksheets, calculators</p>
                                    <p class="mb-2"><strong>Assessment:</strong> Formative assessment through class participation and worksheet completion.</p>
                                    <p class="mb-2"><strong>Homework:</strong> Complete exercises 1-15 on page 102 of the textbook.</p>
                                    <div class="mt-3">
                                        <strong>Student Performance:</strong>
                                        <div class="progress mb-2" style="height: 20px;">
                                            <div class="progress-bar bg-success" style="width: 75%">75% Excellent</div>
                                        </div>
                                        <small class="text-muted">23 students understood the concept well, 5 students need additional practice.</small>
                                    </div>
                                    <div class="mt-3">
                                        <strong>Notes:</strong>
                                        <ul class="mb-0">
                                            <li>Ahmed Hassan showed exceptional understanding and helped other students</li>
                                            <li>Fatima Ali struggled with factoring - scheduled extra help session tomorrow</li>
                                            <li>Class was engaged throughout the lesson</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i> Edit</button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-printer"></i> Print</button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-share"></i> Share</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-warning"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">English Assignment Submission</h6>
                                        <small class="text-muted">Today, 10:15 AM - Mrs. Sarah Johnson</small>
                                    </div>
                                    <div>
                                        <span class="badge bg-warning">Assignment</span>
                                        <span class="badge bg-success">Class 1A</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2"><strong>Assignment:</strong> Essay on "My Favorite Book" - 500 words</p>
                                    <p class="mb-2"><strong>Due Date:</strong> Today</p>
                                    <div class="mb-2">
                                        <strong>Submission Status:</strong>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <small>Submitted: 25/28 students</small>
                                                <div class="progress" style="height: 15px;">
                                                    <div class="progress-bar bg-success" style="width: 89%">89%</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <small>Pending: 3 students</small>
                                                <div class="progress" style="height: 15px;">
                                                    <div class="progress-bar bg-warning" style="width: 11%">11%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-2"><strong>Late Submissions:</strong> Mohammed Ibrahim (excused), Omar Khalid (unexcused)</p>
                                    <div class="mt-3">
                                        <strong>Grading Progress:</strong>
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar bg-info" style="width: 60%">60% Graded</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i> Edit</button>
                                    <button class="btn btn-sm btn-outline-warning"><i class="bx bx-time"></i> Extend Deadline</button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-list-check"></i> View Submissions</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-danger"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">Physics Test Results</h6>
                                        <small class="text-muted">Today, 11:30 AM - Dr. Michael Brown</small>
                                    </div>
                                    <div>
                                        <span class="badge bg-danger">Exam Results</span>
                                        <span class="badge bg-success">Class 1A</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2"><strong>Test:</strong> Chapter 3 - Forces and Motion</p>
                                    <p class="mb-2"><strong>Total Marks:</strong> 50 points</p>
                                    <div class="mb-2">
                                        <strong>Class Performance:</strong>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <small>Average Score: 38.5/50</small>
                                                <div class="progress" style="height: 15px;">
                                                    <div class="progress-bar bg-success" style="width: 77%">77%</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <small>Highest: 48/50</small>
                                                <div class="progress" style="height: 15px;">
                                                    <div class="progress-bar bg-primary" style="width: 96%">96%</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <small>Lowest: 25/50</small>
                                                <div class="progress" style="height: 15px;">
                                                    <div class="progress-bar bg-danger" style="width: 50%">50%</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <small>Pass Rate: 89%</small>
                                                <div class="progress" style="height: 15px;">
                                                    <div class="progress-bar bg-success" style="width: 89%">89%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <strong>Grade Distribution:</strong>
                                        <div class="d-flex gap-2 mt-2">
                                            <span class="badge bg-success">A: 12 students</span>
                                            <span class="badge bg-info">B: 10 students</span>
                                            <span class="badge bg-warning">C: 3 students</span>
                                            <span class="badge bg-danger">D: 2 students</span>
                                            <span class="badge bg-secondary">F: 1 student</span>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <strong>Areas for Improvement:</strong>
                                        <ul class="mb-0">
                                            <li>Newton's Second Law applications</li>
                                            <li>Vector calculations</li>
                                            <li>Problem-solving steps</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i> Edit</button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-chart"></i> Detailed Analysis</button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-download"></i> Download Report</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-info"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">Behavior Report - Class Disruption</h6>
                                        <small class="text-muted">Yesterday, 02:15 PM - Mr. John Smith</small>
                                    </div>
                                    <div>
                                        <span class="badge bg-info">Behavior</span>
                                        <span class="badge bg-success">Class 1A</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2"><strong>Incident:</strong> Disruptive behavior during Mathematics lesson</p>
                                    <p class="mb-2"><strong>Students Involved:</strong> Yusuf Hassan, Abdulrahman Ibrahim</p>
                                    <p class="mb-2"><strong>Description:</strong> Students were talking loudly and not paying attention during the lesson on quadratic equations. Despite multiple warnings, the behavior continued.</p>
                                    <p class="mb-2"><strong>Action Taken:</strong> Students were given detention and parents were notified via phone call.</p>
                                    <p class="mb-2"><strong>Follow-up Required:</strong> Meeting with parents scheduled for tomorrow.</p>
                                    <div class="mt-3">
                                        <strong>Previous Incidents:</strong>
                                        <ul class="mb-0">
                                            <li>Yusuf Hassan - 2 previous warnings this term</li>
                                            <li>Abdulrahman Ibrahim - First incident</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i> Edit</button>
                                    <button class="btn btn-sm btn-outline-warning"><i class="bx bx-user-x"></i> Follow Up</button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-history"></i> View History</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-success"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">Class Announcement - Science Fair</h6>
                                        <small class="text-muted">2 days ago, 09:00 AM - School Administration</small>
                                    </div>
                                    <div>
                                        <span class="badge bg-success">Announcement</span>
                                        <span class="badge bg-primary">All Classes</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2"><strong>Event:</strong> Annual Science Fair 2024</p>
                                    <p class="mb-2"><strong>Date:</strong> December 15, 2024</p>
                                    <p class="mb-2"><strong>Location:</strong> School Auditorium and Science Labs</p>
                                    <p class="mb-2"><strong>Details:</strong> Students are invited to participate in the annual science fair. Projects should be related to physics, chemistry, biology, or environmental science.</p>
                                    <div class="mb-2">
                                        <strong>Registration Deadline:</strong> November 30, 2024
                                    </div>
                                    <div class="mb-2">
                                        <strong>Prizes:</strong>
                                        <ul class="mb-0">
                                            <li>1st Prize: $500 + Trophy</li>
                                            <li>2nd Prize: $300 + Medal</li>
                                            <li>3rd Prize: $150 + Medal</li>
                                            <li>Participation certificates for all</li>
                                        </ul>
                                    </div>
                                    <p class="mb-2"><strong>Contact:</strong> Dr. Michael Brown (Science Department Head)</p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i> Edit</button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-share"></i> Share with Parents</button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-download"></i> Download Flyer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Entry Modal -->
<div class="modal fade" id="addEntryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Journal Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="entryClass" class="form-label">Class</label>
                            <select class="form-select" id="entryClass">
                                <option selected>Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="entrySubject" class="form-label">Subject</label>
                            <select class="form-select" id="entrySubject">
                                <option selected>Select Subject</option>
                                <option value="math">Mathematics</option>
                                <option value="english">English</option>
                                <option value="physics">Physics</option>
                                <option value="chemistry">Chemistry</option>
                                <option value="biology">Biology</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="entryType" class="form-label">Entry Type</label>
                            <select class="form-select" id="entryType">
                                <option selected>Select Type</option>
                                <option value="lesson">Lesson Notes</option>
                                <option value="assignment">Assignment</option>
                                <option value="exam">Exam Results</option>
                                <option value="behavior">Behavior</option>
                                <option value="announcement">Announcement</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="entryTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="entryTitle" placeholder="Enter entry title...">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="entryDate" class="form-label">Date</label>
                            <input type="datetime-local" class="form-control" id="entryDate">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="entryContent" class="form-label">Content</label>
                        <textarea class="form-control" id="entryContent" rows="8" placeholder="Enter detailed content..."></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="entryAttachments" class="form-label">Attachments</label>
                            <input type="file" class="form-control" id="entryAttachments" multiple>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="entryTags" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="entryTags" placeholder="e.g., important, review, homework">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="entryStudents" class="form-label">Specific Students (Optional)</label>
                        <select class="form-select" id="entryStudents" multiple>
                            <option value="STU001">Ahmed Hassan</option>
                            <option value="STU002">Fatima Ali</option>
                            <option value="STU003">Mohammed Ibrahim</option>
                            <option value="STU004">Aisha Mahmoud</option>
                            <option value="STU005">Omar Khalid</option>
                        </select>
                        <small class="text-muted">Leave empty if entry applies to entire class</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Entry</button>
            </div>
        </div>
    </div>
</div>

<!-- Generate Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Journal Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportClass" class="form-label">Class</label>
                            <select class="form-select" id="reportClass">
                                <option selected>All Classes</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reportType" class="form-label">Report Type</label>
                            <select class="form-select" id="reportType">
                                <option value="comprehensive" selected>Comprehensive Report</option>
                                <option value="academic">Academic Performance</option>
                                <option value="behavior">Behavior Report</option>
                                <option value="attendance">Attendance Summary</option>
                                <option value="assignments">Assignment Summary</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportStartDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="reportStartDate">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reportEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="reportEndDate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportFormat" class="form-label">Format</label>
                            <select class="form-select" id="reportFormat">
                                <option value="pdf" selected>PDF</option>
                                <option value="excel">Excel</option>
                                <option value="word">Word Document</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reportEmail" class="form-label">Email Report</label>
                            <input type="email" class="form-control" id="reportEmail" placeholder="admin@school.edu">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Include Sections:</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeLessons" checked>
                                    <label class="form-check-label" for="includeLessons">Lesson Notes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeAssignments" checked>
                                    <label class="form-check-label" for="includeAssignments">Assignments</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeExams" checked>
                                    <label class="form-check-label" for="includeExams">Exam Results</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeBehavior" checked>
                                    <label class="form-check-label" for="includeBehavior">Behavior Reports</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeAttendance" checked>
                                    <label class="form-check-label" for="includeAttendance">Attendance</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeAnnouncements" checked>
                                    <label class="form-check-label" for="includeAnnouncements">Announcements</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeCharts" checked>
                                    <label class="form-check-label" for="includeCharts">Charts & Graphs</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeSummary" checked>
                                    <label class="form-check-label" for="includeSummary">Executive Summary</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeRecommendations">
                                    <label class="form-check-label" for="includeRecommendations">Recommendations</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Generate Report</button>
            </div>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding: 20px 0;
}

.timeline::before {
    content: '';
    position: absolute;
    top: 0;
    left: 30px;
    height: 100%;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 30px;
}

.timeline-point {
    position: absolute;
    left: 22px;
    top: 10px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: 2px solid #fff;
    z-index: 1;
}

.timeline-point-primary { background-color: #696cff; }
.timeline-point-warning { background-color: #ffab00; }
.timeline-point-danger { background-color: #ff3e1d; }
.timeline-point-info { background-color: #00cfe8; }
.timeline-point-success { background-color: #71dd37; }

.timeline-content {
    margin-left: 60px;
}
</style>
@endsection
