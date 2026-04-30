@extends('layouts.app')

@section('title', 'Timetable Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Timetable Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateTimetableModal">
                        <i class="bx bx-cog me-1"></i> Generate Timetable
                    </button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
                        <i class="bx bx-plus me-1"></i> Add Schedule
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="classSelect" class="form-label">Class</label>
                        <select class="form-select" id="classSelect">
                            <option value="1A" selected>Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                            <option value="3A">Class 3A</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="termSelect" class="form-label">Term</label>
                        <select class="form-select" id="termSelect">
                            <option value="1" selected>Term 1</option>
                            <option value="2">Term 2</option>
                            <option value="3">Term 3</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="weekSelect" class="form-label">Week</label>
                        <select class="form-select" id="weekSelect">
                            <option value="current" selected>Current Week</option>
                            <option value="next">Next Week</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="viewType" class="form-label">View Type</label>
                        <select class="form-select" id="viewType">
                            <option value="week" selected>Weekly View</option>
                            <option value="day">Daily View</option>
                            <option value="teacher">Teacher View</option>
                            <option value="room">Room View</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered timetable-table">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center" style="width: 100px;">Time</th>
                                <th class="text-center">Monday</th>
                                <th class="text-center">Tuesday</th>
                                <th class="text-center">Wednesday</th>
                                <th class="text-center">Thursday</th>
                                <th class="text-center">Friday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">07:30 - 08:30</td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-primary text-white rounded p-2">
                                        <div class="fw-bold">Mathematics</div>
                                        <small>Mr. John Smith</small>
                                        <div class="small">Room 101</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-success text-white rounded p-2">
                                        <div class="fw-bold">English</div>
                                        <small>Mrs. Sarah Johnson</small>
                                        <div class="small">Room 102</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-info text-white rounded p-2">
                                        <div class="fw-bold">Physics</div>
                                        <small>Dr. Michael Brown</small>
                                        <div class="small">Lab 201</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-warning text-white rounded p-2">
                                        <div class="fw-bold">Chemistry</div>
                                        <small>Mrs. Emily Davis</small>
                                        <div class="small">Lab 202</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-secondary text-white rounded p-2">
                                        <div class="fw-bold">History</div>
                                        <small>Mr. James Anderson</small>
                                        <div class="small">Room 103</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">08:30 - 09:30</td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-success text-white rounded p-2">
                                        <div class="fw-bold">English</div>
                                        <small>Mrs. Sarah Johnson</small>
                                        <div class="small">Room 102</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-primary text-white rounded p-2">
                                        <div class="fw-bold">Mathematics</div>
                                        <small>Mr. John Smith</small>
                                        <div class="small">Room 101</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-danger text-white rounded p-2">
                                        <div class="fw-bold">Biology</div>
                                        <small>Dr. Robert Wilson</small>
                                        <div class="small">Lab 203</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-info text-white rounded p-2">
                                        <div class="fw-bold">Physics</div>
                                        <small>Dr. Michael Brown</small>
                                        <div class="small">Lab 201</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-purple text-white rounded p-2">
                                        <div class="fw-bold">Geography</div>
                                        <small>Mrs. Lisa Martinez</small>
                                        <div class="small">Room 104</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">09:30 - 10:00</td>
                                <td colspan="5" class="text-center align-middle bg-light">
                                    <strong>BREAK TIME</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">10:00 - 11:00</td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-info text-white rounded p-2">
                                        <div class="fw-bold">Physics</div>
                                        <small>Dr. Michael Brown</small>
                                        <div class="small">Lab 201</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-warning text-white rounded p-2">
                                        <div class="fw-bold">Chemistry</div>
                                        <small>Mrs. Emily Davis</small>
                                        <div class="small">Lab 202</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-primary text-white rounded p-2">
                                        <div class="fw-bold">Mathematics</div>
                                        <small>Mr. John Smith</small>
                                        <div class="small">Room 101</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-success text-white rounded p-2">
                                        <div class="fw-bold">English</div>
                                        <small>Mrs. Sarah Johnson</small>
                                        <div class="small">Room 102</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-teal text-white rounded p-2">
                                        <div class="fw-bold">Fine Arts</div>
                                        <small>Ms. Jennifer Taylor</small>
                                        <div class="small">Art Room</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">11:00 - 12:00</td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-danger text-white rounded p-2">
                                        <div class="fw-bold">Biology</div>
                                        <small>Dr. Robert Wilson</small>
                                        <div class="small">Lab 203</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-secondary text-white rounded p-2">
                                        <div class="fw-bold">History</div>
                                        <small>Mr. James Anderson</small>
                                        <div class="small">Room 103</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-success text-white rounded p-2">
                                        <div class="fw-bold">English</div>
                                        <small>Mrs. Sarah Johnson</small>
                                        <div class="small">Room 102</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-primary text-white rounded p-2">
                                        <div class="fw-bold">Mathematics</div>
                                        <small>Mr. John Smith</small>
                                        <div class="small">Room 101</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-orange text-white rounded p-2">
                                        <div class="fw-bold">Physical Education</div>
                                        <small>Mr. David Lee</small>
                                        <div class="small">Sports Hall</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">12:00 - 01:00</td>
                                <td colspan="5" class="text-center align-middle bg-light">
                                    <strong>LUNCH BREAK</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">01:00 - 02:00</td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-purple text-white rounded p-2">
                                        <div class="fw-bold">Geography</div>
                                        <small>Mrs. Lisa Martinez</small>
                                        <div class="small">Room 104</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-danger text-white rounded p-2">
                                        <div class="fw-bold">Biology</div>
                                        <small>Dr. Robert Wilson</small>
                                        <div class="small">Lab 203</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-warning text-white rounded p-2">
                                        <div class="fw-bold">Chemistry</div>
                                        <small>Mrs. Emily Davis</small>
                                        <div class="small">Lab 202</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-secondary text-white rounded p-2">
                                        <div class="fw-bold">History</div>
                                        <small>Mr. James Anderson</small>
                                        <div class="small">Room 103</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-primary text-white rounded p-2">
                                        <div class="fw-bold">Mathematics</div>
                                        <small>Mr. John Smith</small>
                                        <div class="small">Room 101</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">02:00 - 03:00</td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-teal text-white rounded p-2">
                                        <div class="fw-bold">Fine Arts</div>
                                        <small>Ms. Jennifer Taylor</small>
                                        <div class="small">Art Room</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-purple text-white rounded p-2">
                                        <div class="fw-bold">Geography</div>
                                        <small>Mrs. Lisa Martinez</small>
                                        <div class="small">Room 104</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-secondary text-white rounded p-2">
                                        <div class="fw-bold">History</div>
                                        <small>Mr. James Anderson</small>
                                        <div class="small">Room 103</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-danger text-white rounded p-2">
                                        <div class="fw-bold">Biology</div>
                                        <small>Dr. Robert Wilson</small>
                                        <div class="small">Lab 203</div>
                                    </div>
                                </td>
                                <td class="text-center p-2">
                                    <div class="schedule-item bg-success text-white rounded p-2">
                                        <div class="fw-bold">English</div>
                                        <small>Mrs. Sarah Johnson</small>
                                        <div class="small">Room 102</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <h6>Legend:</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-primary">Mathematics</span>
                        <span class="badge bg-success">English</span>
                        <span class="badge bg-info">Physics</span>
                        <span class="badge bg-warning">Chemistry</span>
                        <span class="badge bg-danger">Biology</span>
                        <span class="badge bg-secondary">History</span>
                        <span class="badge bg-purple">Geography</span>
                        <span class="badge bg-teal">Fine Arts</span>
                        <span class="badge bg-orange">Physical Education</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Generate Timetable Modal -->
<div class="modal fade" id="generateTimetableModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Timetable</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="genClass" class="form-label">Class</label>
                            <select class="form-select" id="genClass">
                                <option selected>Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="genTerm" class="form-label">Term</label>
                            <select class="form-select" id="genTerm">
                                <option value="1" selected>Term 1</option>
                                <option value="2">Term 2</option>
                                <option value="3">Term 3</option>
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
                    <div class="mb-3">
                        <label class="form-label">Subjects to Include:</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="math" checked>
                                    <label class="form-check-label" for="math">Mathematics</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="english" checked>
                                    <label class="form-check-label" for="english">English</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="physics" checked>
                                    <label class="form-check-label" for="physics">Physics</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="chemistry" checked>
                                    <label class="form-check-label" for="chemistry">Chemistry</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="biology" checked>
                                    <label class="form-check-label" for="biology">Biology</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="history" checked>
                                    <label class="form-check-label" for="history">History</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="geography" checked>
                                    <label class="form-check-label" for="geography">Geography</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="arts" checked>
                                    <label class="form-check-label" for="arts">Fine Arts</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pe" checked>
                                    <label class="form-check-label" for="pe">Physical Education</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="algorithm" class="form-label">Generation Algorithm</label>
                        <select class="form-select" id="algorithm">
                            <option value="auto" selected>Automatic (AI Optimized)</option>
                            <option value="balanced">Balanced Distribution</option>
                            <option value="teacher">Teacher Preference Based</option>
                            <option value="room">Room Availability Based</option>
                        </select>
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

<!-- Add Schedule Modal -->
<div class="modal fade" id="addScheduleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scheduleClass" class="form-label">Class</label>
                            <select class="form-select" id="scheduleClass">
                                <option selected>Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                                <option value="3A">Class 3A</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scheduleSubject" class="form-label">Subject</label>
                            <select class="form-select" id="scheduleSubject">
                                <option selected>Select Subject</option>
                                <option value="math">Mathematics</option>
                                <option value="english">English</option>
                                <option value="physics">Physics</option>
                                <option value="chemistry">Chemistry</option>
                                <option value="biology">Biology</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scheduleDay" class="form-label">Day</label>
                            <select class="form-select" id="scheduleDay">
                                <option selected>Select Day</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scheduleTime" class="form-label">Time Slot</label>
                            <select class="form-select" id="scheduleTime">
                                <option selected>Select Time</option>
                                <option value="07:30-08:30">07:30 - 08:30</option>
                                <option value="08:30-09:30">08:30 - 09:30</option>
                                <option value="10:00-11:00">10:00 - 11:00</option>
                                <option value="11:00-12:00">11:00 - 12:00</option>
                                <option value="01:00-02:00">01:00 - 02:00</option>
                                <option value="02:00-03:00">02:00 - 03:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scheduleTeacher" class="form-label">Teacher</label>
                            <select class="form-select" id="scheduleTeacher">
                                <option selected>Select Teacher</option>
                                <option value="1">Mr. John Smith</option>
                                <option value="2">Mrs. Sarah Johnson</option>
                                <option value="3">Dr. Michael Brown</option>
                                <option value="4">Mrs. Emily Davis</option>
                                <option value="5">Dr. Robert Wilson</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scheduleRoom" class="form-label">Room</label>
                            <select class="form-select" id="scheduleRoom">
                                <option selected>Select Room</option>
                                <option value="101">Room 101</option>
                                <option value="102">Room 102</option>
                                <option value="103">Room 103</option>
                                <option value="lab201">Lab 201</option>
                                <option value="lab202">Lab 202</option>
                                <option value="lab203">Lab 203</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Add Schedule</button>
            </div>
        </div>
    </div>
</div>

<style>
.schedule-item {
    min-height: 80px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.bg-purple { background-color: #6f42c1 !important; }
.bg-teal { background-color: #20c997 !important; }
.bg-orange { background-color: #fd7e14 !important; }
</style>
@endsection
