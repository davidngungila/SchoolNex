@extends('layouts.app')

@section('title', 'Create Timetable')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Create Timetable</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="timetableClass" class="form-label">Class *</label>
                            <select class="form-select" id="timetableClass" required>
                                <option value="">Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="timetableTerm" class="form-label">Term *</label>
                            <select class="form-select" id="timetableTerm" required>
                                <option value="">Select Term</option>
                                <option value="1">Term 1</option>
                                <option value="2">Term 2</option>
                                <option value="3">Term 3</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="timetableYear" class="form-label">Year *</label>
                            <select class="form-select" id="timetableYear" required>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>08:00 - 09:00</td>
                                    <td>
                                        <select class="form-select form-select-sm">
                                            <option value="">Select Subject</option>
                                            <option value="math">Mathematics</option>
                                            <option value="english">English</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm">
                                            <option value="">Select Subject</option>
                                            <option value="math">Mathematics</option>
                                            <option value="english">English</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm">
                                            <option value="">Select Subject</option>
                                            <option value="math">Mathematics</option>
                                            <option value="english">English</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm">
                                            <option value="">Select Subject</option>
                                            <option value="math">Mathematics</option>
                                            <option value="english">English</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm">
                                            <option value="">Select Subject</option>
                                            <option value="math">Mathematics</option>
                                            <option value="english">English</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex gap-2 mt-3">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="button" class="btn btn-primary">Generate Timetable</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
