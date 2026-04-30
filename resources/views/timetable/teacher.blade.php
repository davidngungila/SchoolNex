@extends('layouts.app')

@section('title', 'Teacher Timetable')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Teacher Timetable</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="teacherSelect" class="form-label">Select Teacher</label>
                        <select class="form-select" id="teacherSelect">
                            <option value="TCH001" selected>Mr. John Smith</option>
                            <option value="TCH002">Mrs. Sarah Johnson</option>
                            <option value="TCH003">Dr. Michael Brown</option>
                            <option value="TCH004">Mrs. Emily Davis</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="termSelect" class="form-label">Term</label>
                        <select class="form-select" id="termSelect">
                            <option value="1" selected>Term 1</option>
                            <option value="2">Term 2</option>
                            <option value="3">Term 3</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="yearSelect" class="form-label">Year</label>
                        <select class="form-select" id="yearSelect">
                            <option value="2024" selected>2024</option>
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
                                <td class="bg-primary text-white">Mathematics<br><small>Class 1A</small><br><small>Room 101</small></td>
                                <td class="bg-primary text-white">Mathematics<br><small>Class 1B</small><br><small>Room 102</small></td>
                                <td class="bg-primary text-white">Mathematics<br><small>Class 1A</small><br><small>Room 101</small></td>
                                <td class="bg-primary text-white">Mathematics<br><small>Class 2A</small><br><small>Room 103</small></td>
                                <td class="bg-primary text-white">Mathematics<br><small>Class 1B</small><br><small>Room 102</small></td>
                            </tr>
                            <tr>
                                <td>09:00 - 10:00</td>
                                <td class="bg-success text-white">Advanced Math<br><small>Class 2A</small><br><small>Room 103</small></td>
                                <td class="bg-primary text-white">Mathematics<br><small>Class 1A</small><br><small>Room 101</small></td>
                                <td class="bg-success text-white">Advanced Math<br><small>Class 2B</small><br><small>Room 104</small></td>
                                <td class="bg-primary text-white">Mathematics<br><small>Class 1B</small><br><small>Room 102</small></td>
                                <td class="bg-success text-white">Advanced Math<br><small>Class 2A</small><br><small>Room 103</small></td>
                            </tr>
                            <tr>
                                <td>10:00 - 11:00</td>
                                <td colspan="5" class="bg-info text-center text-white">Break Time</td>
                            </tr>
                            <tr>
                                <td>11:00 - 12:00</td>
                                <td class="bg-warning text-white">Free Period</td>
                                <td class="bg-warning text-white">Free Period</td>
                                <td class="bg-primary text-white">Mathematics<br><small>Class 3A</small><br><small>Room 105</small></td>
                                <td class="bg-warning text-white">Free Period</td>
                                <td class="bg-primary text-white">Mathematics<br><small>Class 3B</small><br><small>Room 106</small></td>
                            </tr>
                            <tr>
                                <td>14:00 - 15:00</td>
                                <td class="bg-info text-white">Staff Meeting</td>
                                <td class="bg-warning text-white">Free Period</td>
                                <td class="bg-warning text-white">Free Period</td>
                                <td class="bg-warning text-white">Free Period</td>
                                <td class="bg-info text-white">Staff Meeting</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-3">
                    <h6>Teacher Information</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> Mr. John Smith</p>
                            <p><strong>Department:</strong> Mathematics</p>
                            <p><strong>Specialization:</strong> Advanced Mathematics</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Total Classes:</strong> 6</p>
                            <p><strong>Teaching Hours:</strong> 20 hours/week</p>
                            <p><strong>Free Periods:</strong> 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
