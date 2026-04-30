@extends('layouts.app')

@section('title', 'Academic Settings')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Academic Settings</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#saveModal">
                        <i class="bx bx-save me-1"></i> Save Changes
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
                <form>
                    <!-- Academic Year Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Academic Year Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="currentAcademicYear" class="form-label">Current Academic Year *</label>
                                    <input type="text" class="form-control" id="currentAcademicYear" value="2024-2025" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="yearStart" class="form-label">Year Start Date *</label>
                                    <input type="date" class="form-control" id="yearStart" value="2024-01-15" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="yearEnd" class="form-label">Year End Date *</label>
                                    <input type="date" class="form-control" id="yearEnd" value="2024-12-15" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="termsPerYear" class="form-label">Terms Per Year *</label>
                                    <select class="form-select" id="termsPerYear" required>
                                        <option value="2">2 Terms</option>
                                        <option value="3" selected>3 Terms</option>
                                        <option value="4">4 Terms</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="currentTerm" class="form-label">Current Term *</label>
                                    <select class="form-select" id="currentTerm" required>
                                        <option value="1">Term 1</option>
                                        <option value="2" selected>Term 2</option>
                                        <option value="3">Term 3</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="termDuration" class="form-label">Term Duration (weeks)</label>
                                    <input type="number" class="form-control" id="termDuration" value="13" min="8" max="20">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grade Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Grade Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="gradingSystem" class="form-label">Grading System *</label>
                                    <select class="form-select" id="gradingSystem" required>
                                        <option value="percentage" selected>Percentage</option>
                                        <option value="gpa">GPA</option>
                                        <option value="letter">Letter Grades</option>
                                        <option value="competency">Competency-Based</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="passingGrade" class="form-label">Passing Grade (%) *</label>
                                    <input type="number" class="form-control" id="passingGrade" value="50" min="0" max="100" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="excellentGrade" class="form-label">Excellent Grade (%)</label>
                                    <input type="number" class="form-control" id="excellentGrade" value="80" min="0" max="100">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="veryGoodGrade" class="form-label">Very Good Grade (%)</label>
                                    <input type="number" class="form-control" id="veryGoodGrade" value="70" min="0" max="100">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="goodGrade" class="form-label">Good Grade (%)</label>
                                    <input type="number" class="form-control" id="goodGrade" value="60" min="0" max="100">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="gradeScale" class="form-label">Grade Scale</label>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Grade</th>
                                                <th>Range (%)</th>
                                                <th>Points</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>A</td>
                                                <td><input type="text" class="form-control form-control-sm" value="80-100"></td>
                                                <td><input type="number" class="form-control form-control-sm" value="4.0"></td>
                                                <td><input type="text" class="form-control form-control-sm" value="Excellent"></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">
                                                        <i class="bx bx-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>B</td>
                                                <td><input type="text" class="form-control form-control-sm" value="70-79"></td>
                                                <td><input type="number" class="form-control form-control-sm" value="3.0"></td>
                                                <td><input type="text" class="form-control form-control-sm" value="Very Good"></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">
                                                        <i class="bx bx-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>C</td>
                                                <td><input type="text" class="form-control form-control-sm" value="60-69"></td>
                                                <td><input type="number" class="form-control form-control-sm" value="2.0"></td>
                                                <td><input type="text" class="form-control form-control-sm" value="Good"></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">
                                                        <i class="bx bx-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>D</td>
                                                <td><input type="text" class="form-control form-control-sm" value="50-59"></td>
                                                <td><input type="number" class="form-control form-control-sm" value="1.0"></td>
                                                <td><input type="text" class="form-control form-control-sm" value="Pass"></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">
                                                        <i class="bx bx-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>F</td>
                                                <td><input type="text" class="form-control form-control-sm" value="0-49"></td>
                                                <td><input type="number" class="form-control form-control-sm" value="0.0"></td>
                                                <td><input type="text" class="form-control form-control-sm" value="Fail"></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">
                                                        <i class="bx bx-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subject Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Subject Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="maxSubjects" class="form-label">Maximum Subjects per Student</label>
                                    <input type="number" class="form-control" id="maxSubjects" value="8" min="5" max="15">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="compulsorySubjects" class="form-label">Compulsory Subjects</label>
                                    <input type="number" class="form-control" id="compulsorySubjects" value="4" min="1" max="8">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="electiveSubjects" class="form-label">Elective Subjects</label>
                                    <input type="number" class="form-control" id="electiveSubjects" value="4" min="0" max="10">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="subjectWeighting" class="form-label">Subject Weighting System</label>
                                    <select class="form-select" id="subjectWeighting">
                                        <option value="equal">Equal Weighting</option>
                                        <option value="credits">Credit-Based</option>
                                        <option value="difficulty">Difficulty-Based</option>
                                        <option value="custom">Custom Weighting</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subjectCategories" class="form-label">Subject Categories</label>
                                    <select class="form-select" id="subjectCategories" multiple>
                                        <option value="core" selected>Core Subjects</option>
                                        <option value="elective" selected>Elective Subjects</option>
                                        <option value="extracurricular" selected>Extracurricular</option>
                                        <option value="vocational">Vocational</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Examination Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Examination Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="examFrequency" class="form-label">Examination Frequency</label>
                                    <select class="form-select" id="examFrequency">
                                        <option value="monthly">Monthly</option>
                                        <option value="termly" selected>Termly</option>
                                        <option value="semester">Semester</option>
                                        <option value="annual">Annual</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="examDuration" class="form-label">Standard Exam Duration (hours)</label>
                                    <input type="number" class="form-control" id="examDuration" value="2" min="1" max="4">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="maxExamSubjects" class="form-label">Max Subjects per Day</label>
                                    <input type="number" class="form-control" id="maxExamSubjects" value="2" min="1" max="4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="passingExamScore" class="form-label">Passing Exam Score (%)</label>
                                    <input type="number" class="form-control" id="passingExamScore" value="40" min="0" max="100">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="retakePolicy" class="form-label">Retake Policy</label>
                                    <select class="form-select" id="retakePolicy">
                                        <option value="allowed">Allowed</option>
                                        <option value="conditional">Conditional</option>
                                        <option value="not_allowed">Not Allowed</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="maxRetakes" class="form-label">Maximum Retakes</label>
                                    <input type="number" class="form-control" id="maxRetakes" value="2" min="0" max="5">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableOnlineExams" checked>
                                    <label class="form-check-label" for="enableOnlineExams">
                                        Enable Online Examinations
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableRandomQuestions">
                                    <label class="form-check-label" for="enableRandomQuestions">
                                        Enable Random Question Selection
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableAutoGrading" checked>
                                    <label class="form-check-label" for="enableAutoGrading">
                                        Enable Automatic Grading
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableExamAnalytics" checked>
                                    <label class="form-check-label" for="enableExamAnalytics">
                                        Enable Exam Analytics
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Attendance Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Attendance Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="minAttendance" class="form-label">Minimum Attendance (%)</label>
                                    <input type="number" class="form-control" id="minAttendance" value="75" min="50" max="100">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="attendanceMethod" class="form-label">Attendance Method</label>
                                    <select class="form-select" id="attendanceMethod">
                                        <option value="manual">Manual</option>
                                        <option value="biometric">Biometric</option>
                                        <option value="rfid">RFID Card</option>
                                        <option value="mobile">Mobile App</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="attendanceFrequency" class="form-label">Marking Frequency</label>
                                    <select class="form-select" id="attendanceFrequency">
                                        <option value="daily">Daily</option>
                                        <option value="period" selected>Per Period</option>
                                        <option value="weekly">Weekly</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableLateTracking" checked>
                                    <label class="form-check-label" for="enableLateTracking">
                                        Enable Late Arrival Tracking
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableEarlyDismissal" checked>
                                    <label class="form-check-label" for="enableEarlyDismissal">
                                        Enable Early Dismissal Tracking
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableParentNotifications" checked>
                                    <label class="form-check-label" for="enableParentNotifications">
                                        Enable Parent Notifications for Absences
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableAutoExcuses">
                                    <label class="form-check-label" for="enableAutoExcuses">
                                        Enable Automatic Excuse Notes
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Promotion Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Promotion Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="promotionCriteria" class="form-label">Promotion Criteria</label>
                                    <select class="form-select" id="promotionCriteria">
                                        <option value="academic">Academic Performance Only</option>
                                        <option value="attendance" selected>Academic + Attendance</option>
                                        <option value="behavioral">Academic + Attendance + Behavior</option>
                                        <option value="comprehensive">Comprehensive Assessment</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="minPromotionScore" class="form-label">Minimum Promotion Score (%)</label>
                                    <input type="number" class="form-control" id="minPromotionScore" value="50" min="0" max="100">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="promotionPeriod" class="form-label">Promotion Period</label>
                                    <select class="form-select" id="promotionPeriod">
                                        <option value="annual" selected>Annual</option>
                                        <option value="semiannual">Semi-Annual</option>
                                        <option value="termly">Termly</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableConditionalPromotion" checked>
                                    <label class="form-check-label" for="enableConditionalPromotion">
                                        Enable Conditional Promotion
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableRetentionPolicy" checked>
                                    <label class="form-check-label" for="enableRetentionPolicy">
                                        Enable Retention Policy
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableAcceleration">
                                    <label class="form-check-label" for="enableAcceleration">
                                        Enable Grade Acceleration
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Academic Notifications</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="examNotifications" class="form-label">Exam Notifications</label>
                                    <select class="form-select" id="examNotifications">
                                        <option value="disabled">Disabled</option>
                                        <option value="students">Students Only</option>
                                        <option value="parents">Parents Only</option>
                                        <option value="both" selected>Students & Parents</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="resultNotifications" class="form-label">Result Notifications</label>
                                    <select class="form-select" id="resultNotifications">
                                        <option value="disabled">Disabled</option>
                                        <option value="students">Students Only</option>
                                        <option value="parents">Parents Only</option>
                                        <option value="both" selected>Students & Parents</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="attendanceNotifications" class="form-label">Attendance Notifications</label>
                                    <select class="form-select" id="attendanceNotifications">
                                        <option value="disabled">Disabled</option>
                                        <option value="daily">Daily</option>
                                        <option value="weekly" selected>Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="promotionNotifications" class="form-label">Promotion Notifications</label>
                                    <select class="form-select" id="promotionNotifications">
                                        <option value="disabled">Disabled</option>
                                        <option value="immediate" selected>Immediate</option>
                                        <option value="batch">Batch Processing</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Save Changes Modal -->
<div class="modal fade" id="saveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Save Academic Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="backupCurrent" class="form-label">Backup Current Settings</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="backup" id="backupYes" checked>
                        <label class="form-check-label" for="backupYes">
                            Yes, create backup before saving
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="backup" id="backupNo">
                        <label class="form-check-label" for="backupNo">
                            No, proceed without backup
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="effectiveDate" class="form-label">Effective Date</label>
                    <input type="date" class="form-control" id="effectiveDate" value="{{ date('Y-m-d') }}">
                    <small class="text-muted">When should these settings take effect?</small>
                </div>
                <div class="mb-3">
                    <label for="notifyUsers" class="form-label">Notify Users</label>
                    <select class="form-select" id="notifyUsers">
                        <option value="none">No Notification</option>
                        <option value="teachers">Teachers Only</option>
                        <option value="students">Students Only</option>
                        <option value="all">All Users</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="notificationMessage" class="form-label">Notification Message</label>
                    <textarea class="form-control" id="notificationMessage" rows="2" placeholder="Enter message to notify users about the changes...">Academic settings have been updated. Please review the new policies and procedures.</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveSettings()">Save Settings</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Grade Modal -->
<div class="modal fade" id="editGradeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Grade Scale</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="gradeLetter" class="form-label">Grade Letter</label>
                        <input type="text" class="form-control" id="gradeLetter" value="A" maxlength="2">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="minScore" class="form-label">Minimum Score (%)</label>
                            <input type="number" class="form-control" id="minScore" value="80" min="0" max="100">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="maxScore" class="form-label">Maximum Score (%)</label>
                            <input type="number" class="form-control" id="maxScore" value="100" min="0" max="100">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gradePoints" class="form-label">Grade Points</label>
                        <input type="number" class="form-control" id="gradePoints" value="4.0" min="0" max="5" step="0.1">
                    </div>
                    <div class="mb-3">
                        <label for="gradeDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="gradeDescription" value="Excellent">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deleteGrade()">Delete Grade</button>
                <button type="button" class="btn btn-primary" onclick="updateGrade()">Update Grade</button>
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Academic Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="importFile" class="form-label">Import File</label>
                        <input type="file" class="form-control" id="importFile" accept=".json,.xml,.csv">
                        <small class="text-muted">Supported formats: JSON, XML, CSV</small>
                    </div>
                    <div class="mb-3">
                        <label for="importType" class="form-label">Import Type</label>
                        <select class="form-select" id="importType">
                            <option value="replace">Replace All Settings</option>
                            <option value="merge">Merge with Existing</option>
                            <option value="selective">Selective Import</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="validateData" checked>
                            <label class="form-check-label" for="validateData">
                                Validate data before import
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="createBackup" checked>
                            <label class="form-check-label" for="createBackup">
                                Create backup before import
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="importSettings()">Import Settings</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Academic Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportFormat" class="form-label">Export Format</label>
                        <select class="form-select" id="exportFormat">
                            <option value="json">JSON</option>
                            <option value="xml">XML</option>
                            <option value="csv">CSV</option>
                            <option value="pdf">PDF Report</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exportSections" class="form-label">Sections to Export</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportAcademicYear" checked>
                            <label class="form-check-label" for="exportAcademicYear">
                                Academic Year Settings
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportGrades" checked>
                            <label class="form-check-label" for="exportGrades">
                                Grade Settings
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportSubjects" checked>
                            <label class="form-check-label" for="exportSubjects">
                                Subject Settings
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportExaminations" checked>
                            <label class="form-check-label" for="exportExaminations">
                                Examination Settings
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportAttendance" checked>
                            <label class="form-check-label" for="exportAttendance">
                                Attendance Settings
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exportPromotion" checked>
                            <label class="form-check-label" for="exportPromotion">
                                Promotion Settings
                            </label>
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
                <button type="button" class="btn btn-primary" onclick="exportSettings()">Export Settings</button>
            </div>
        </div>
    </div>
</div>

<script>
function saveSettings() {
    const backupOption = document.querySelector('input[name="backup"]:checked').id;
    const effectiveDate = document.getElementById('effectiveDate').value;
    const notifyUsers = document.getElementById('notifyUsers').value;
    
    if (backupOption === 'backupYes') {
        alert('Creating backup and saving academic settings...');
    } else {
        alert('Saving academic settings without backup...');
    }
    
    if (notifyUsers !== 'none') {
        alert(`Notifying ${notifyUsers} about the changes...`);
    }
    
    document.getElementById('saveModal').querySelector('.btn-close').click();
    
    // Show success message
    setTimeout(() => {
        alert('Academic settings saved successfully!');
    }, 2000);
}

function updateGrade() {
    const gradeLetter = document.getElementById('gradeLetter').value;
    const minScore = document.getElementById('minScore').value;
    const maxScore = document.getElementById('maxScore').value;
    const gradePoints = document.getElementById('gradePoints').value;
    const gradeDescription = document.getElementById('gradeDescription').value;
    
    alert(`Grade ${gradeLetter} updated successfully!`);
    document.getElementById('editGradeModal').querySelector('.btn-close').click();
}

function deleteGrade() {
    const gradeLetter = document.getElementById('gradeLetter').value;
    if (confirm(`Are you sure you want to delete grade ${gradeLetter}?`)) {
        alert(`Grade ${gradeLetter} deleted successfully!`);
        document.getElementById('editGradeModal').querySelector('.btn-close').click();
    }
}

function importSettings() {
    const importFile = document.getElementById('importFile').files[0];
    const importType = document.getElementById('importType').value;
    
    if (!importFile) {
        alert('Please select a file to import');
        return;
    }
    
    alert(`Importing ${importFile.name} with ${importType} method...`);
    document.getElementById('importModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Academic settings imported successfully!');
    }, 2000);
}

function exportSettings() {
    const exportFormat = document.getElementById('exportFormat').value;
    const exportEmail = document.getElementById('exportEmail').value;
    
    alert(`Exporting academic settings in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
    
    if (exportEmail) {
        setTimeout(() => {
            alert(`Export sent to ${exportEmail}`);
        }, 2000);
    } else {
        setTimeout(() => {
            alert('Academic settings exported successfully!');
        }, 2000);
    }
}
</script>
@endsection
