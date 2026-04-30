@extends('layouts.app')

@section('title', 'Attendance Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Attendance Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#takeAttendanceModal">
                        <i class="bx bx-user-check me-1"></i> Take Attendance
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Generate Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="classFilter" class="form-label">Class</label>
                        <select class="form-select" id="classFilter">
                            <option selected>All Classes</option>
                            <option value="1">Class 1A</option>
                            <option value="2">Class 1B</option>
                            <option value="3">Class 2A</option>
                            <option value="4">Class 2B</option>
                            <option value="5">Class 3A</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="dateFilter" class="form-label">Date</label>
                        <input type="date" class="form-control" id="dateFilter" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option selected>All Status</option>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="late">Late</option>
                            <option value="excused">Excused</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="searchStudent" class="form-label">Search Student</label>
                        <input type="text" class="form-control" id="searchStudent" placeholder="Search by name or ID...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Date</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>STU001</td>
                                <td>Ahmed Hassan</td>
                                <td>Class 1A</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>07:30 AM</td>
                                <td>01:30 PM</td>
                                <td><span class="badge bg-success">Present</span></td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-detail"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>STU002</td>
                                <td>Fatima Ali</td>
                                <td>Class 1A</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>07:45 AM</td>
                                <td>01:30 PM</td>
                                <td><span class="badge bg-warning">Late</span></td>
                                <td>Arrived 15 minutes late</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-detail"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>STU003</td>
                                <td>Mohammed Ibrahim</td>
                                <td>Class 1B</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>07:25 AM</td>
                                <td>01:30 PM</td>
                                <td><span class="badge bg-success">Present</span></td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-detail"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>STU004</td>
                                <td>Aisha Mahmoud</td>
                                <td>Class 1B</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td><span class="badge bg-danger">Absent</span></td>
                                <td>Sick leave - Medical certificate provided</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-detail"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>STU005</td>
                                <td>Omar Khalid</td>
                                <td>Class 2A</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>07:30 AM</td>
                                <td>01:30 PM</td>
                                <td><span class="badge bg-success">Present</span></td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-detail"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>STU006</td>
                                <td>Mariam Said</td>
                                <td>Class 2A</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>07:30 AM</td>
                                <td>01:30 PM</td>
                                <td><span class="badge bg-success">Present</span></td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-detail"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>STU007</td>
                                <td>Yusuf Hassan</td>
                                <td>Class 2B</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>07:50 AM</td>
                                <td>01:30 PM</td>
                                <td><span class="badge bg-warning">Late</span></td>
                                <td>Traffic delay</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-detail"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>STU008</td>
                                <td>Zainab Ali</td>
                                <td>Class 2B</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td><span class="badge bg-info">Excused</span></td>
                                <td>Family emergency - Parent notified</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-detail"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>STU009</td>
                                <td>Abdulrahman Ibrahim</td>
                                <td>Class 3A</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>07:28 AM</td>
                                <td>01:30 PM</td>
                                <td><span class="badge bg-success">Present</span></td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-detail"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>STU010</td>
                                <td>Khadija Mahmoud</td>
                                <td>Class 3A</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>07:30 AM</td>
                                <td>01:30 PM</td>
                                <td><span class="badge bg-success">Present</span></td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-detail"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Take Attendance Modal -->
<div class="modal fade" id="takeAttendanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Take Attendance - Class 1A</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="attendanceDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="attendanceDate" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="attendanceClass" class="form-label">Class</label>
                        <select class="form-select" id="attendanceClass">
                            <option value="1A" selected>Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                            <option value="3A">Class 3A</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="attendanceSubject" class="form-label">Subject</label>
                        <select class="form-select" id="attendanceSubject">
                            <option value="math">Mathematics</option>
                            <option value="english">English</option>
                            <option value="science">Science</option>
                            <option value="history">History</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Status</th>
                                <th>Check In Time</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>STU001</td>
                                <td>Ahmed Hassan</td>
                                <td>
                                    <select class="form-select form-select-sm">
                                        <option value="present" selected>Present</option>
                                        <option value="absent">Absent</option>
                                        <option value="late">Late</option>
                                        <option value="excused">Excused</option>
                                    </select>
                                </td>
                                <td><input type="time" class="form-control form-control-sm" value="07:30"></td>
                                <td><input type="text" class="form-control form-control-sm" placeholder="Remarks..."></td>
                            </tr>
                            <tr>
                                <td>STU002</td>
                                <td>Fatima Ali</td>
                                <td>
                                    <select class="form-select form-select-sm">
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                        <option value="late" selected>Late</option>
                                        <option value="excused">Excused</option>
                                    </select>
                                </td>
                                <td><input type="time" class="form-control form-control-sm" value="07:45"></td>
                                <td><input type="text" class="form-control form-control-sm" placeholder="Remarks..."></td>
                            </tr>
                            <tr>
                                <td>STU003</td>
                                <td>Mohammed Ibrahim</td>
                                <td>
                                    <select class="form-select form-select-sm">
                                        <option value="present" selected>Present</option>
                                        <option value="absent">Absent</option>
                                        <option value="late">Late</option>
                                        <option value="excused">Excused</option>
                                    </select>
                                </td>
                                <td><input type="time" class="form-control form-control-sm" value="07:25"></td>
                                <td><input type="text" class="form-control form-control-sm" placeholder="Remarks..."></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Save Attendance</button>
            </div>
        </div>
    </div>
</div>

<!-- Generate Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Attendance Report</h5>
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
                            <label for="reportPeriod" class="form-label">Period</label>
                            <select class="form-select" id="reportPeriod">
                                <option value="daily">Daily</option>
                                <option value="weekly" selected>Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="term">Term</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportFormat" class="form-label">Report Format</label>
                            <select class="form-select" id="reportFormat">
                                <option value="pdf" selected>PDF</option>
                                <option value="excel">Excel</option>
                                <option value="csv">CSV</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="emailReport" class="form-label">Email Report</label>
                            <input type="email" class="form-control" id="emailReport" placeholder="admin@school.edu">
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
@endsection
