@extends('layouts.app')

@section('title', 'Class Timetable')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Class Timetable</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="classSelect" class="form-label">Select Class</label>
                        <select class="form-select" id="classSelect">
                            <option value="1A" selected>Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
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
                                <td class="bg-primary text-white">Mathematics<br><small>Room 101</small></td>
                                <td class="bg-success text-white">English<br><small>Room 102</small></td>
                                <td class="bg-primary text-white">Mathematics<br><small>Room 101</small></td>
                                <td class="bg-warning text-white">Science<br><small>Lab 201</small></td>
                                <td class="bg-success text-white">English<br><small>Room 102</small></td>
                            </tr>
                            <tr>
                                <td>09:00 - 10:00</td>
                                <td class="bg-warning text-white">Science<br><small>Lab 201</small></td>
                                <td class="bg-primary text-white">Mathematics<br><small>Room 101</small></td>
                                <td class="bg-success text-white">English<br><small>Room 102</small></td>
                                <td class="bg-primary text-white">Mathematics<br><small>Room 101</small></td>
                                <td class="bg-warning text-white">Science<br><small>Lab 201</small></td>
                            </tr>
                            <tr>
                                <td>10:00 - 11:00</td>
                                <td colspan="5" class="bg-info text-center text-white">Break Time</td>
                            </tr>
                            <tr>
                                <td>11:00 - 12:00</td>
                                <td class="bg-secondary text-white">History<br><small>Room 103</small></td>
                                <td class="bg-info text-white">Geography<br><small>Room 104</small></td>
                                <td class="bg-secondary text-white">History<br><small>Room 103</small></td>
                                <td class="bg-info text-white">Geography<br><small>Room 104</small></td>
                                <td class="bg-dark text-white">Arts<br><small>Art Room</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
