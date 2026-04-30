@extends('layouts.app')

@section('title', 'Take Attendance')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Take Attendance</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="classSelect" class="form-label">Select Class *</label>
                            <select class="form-select" id="classSelect" required>
                                <option value="">Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="subjectSelect" class="form-label">Subject *</label>
                            <select class="form-select" id="subjectSelect" required>
                                <option value="">Select Subject</option>
                                <option value="math">Mathematics</option>
                                <option value="english">English</option>
                                <option value="science">Science</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="dateSelect" class="form-label">Date *</label>
                            <input type="date" class="form-control" id="dateSelect" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Present</th>
                                    <th>Absent</th>
                                    <th>Late</th>
                                    <th>Excused</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>STU001</td>
                                    <td>John Smith</td>
                                    <td><input type="radio" name="attendance_1" value="present" checked></td>
                                    <td><input type="radio" name="attendance_1" value="absent"></td>
                                    <td><input type="radio" name="attendance_1" value="late"></td>
                                    <td><input type="radio" name="attendance_1" value="excused"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>STU002</td>
                                    <td>Sarah Johnson</td>
                                    <td><input type="radio" name="attendance_2" value="present" checked></td>
                                    <td><input type="radio" name="attendance_2" value="absent"></td>
                                    <td><input type="radio" name="attendance_2" value="late"></td>
                                    <td><input type="radio" name="attendance_2" value="excused"></td>
                                    <td><input type="text" class="form-control form-control-sm"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex gap-2 mt-3">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="button" class="btn btn-primary">Save Attendance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
