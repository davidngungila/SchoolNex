@extends('layouts.app')

@section('title', 'Exam Timetable')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Exam Timetable</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="examClass" class="form-label">Class</label>
                        <select class="form-select" id="examClass">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="examType" class="form-label">Exam Type</label>
                        <select class="form-select" id="examType">
                            <option value="">All Exams</option>
                            <option value="midterm">Midterm</option>
                            <option value="final">Final</option>
                            <option value="quiz">Quiz</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="examTerm" class="form-label">Term</label>
                        <select class="form-select" id="examTerm">
                            <option value="1" selected>Term 1</option>
                            <option value="2">Term 2</option>
                            <option value="3">Term 3</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="examYear" class="form-label">Year</label>
                        <select class="form-select" id="examYear">
                            <option value="2024" selected>2024</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Subject</th>
                                <th>Class</th>
                                <th>Duration</th>
                                <th>Venue</th>
                                <th>Invigilator</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('+3 days')) }}</td>
                                <td>09:00 AM</td>
                                <td class="bg-primary text-white">Mathematics</td>
                                <td>Class 1A</td>
                                <td>2 hours</td>
                                <td>Room 101</td>
                                <td>Mr. John Smith</td>
                                <td><span class="badge bg-primary">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('+3 days')) }}</td>
                                <td>02:00 PM</td>
                                <td class="bg-success text-white">English</td>
                                <td>Class 1A</td>
                                <td>1.5 hours</td>
                                <td>Room 102</td>
                                <td>Mrs. Sarah Johnson</td>
                                <td><span class="badge bg-primary">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('+4 days')) }}</td>
                                <td>09:00 AM</td>
                                <td class="bg-warning text-white">Science</td>
                                <td>Class 1A</td>
                                <td>2 hours</td>
                                <td>Science Lab</td>
                                <td>Dr. Michael Brown</td>
                                <td><span class="badge bg-primary">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('+4 days')) }}</td>
                                <td>02:00 PM</td>
                                <td class="bg-info text-white">History</td>
                                <td>Class 1A</td>
                                <td>1.5 hours</td>
                                <td>Room 103</td>
                                <td>Mr. James Anderson</td>
                                <td><span class="badge bg-primary">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('+5 days')) }}</td>
                                <td>09:00 AM</td>
                                <td class="bg-secondary text-white">Geography</td>
                                <td>Class 1A</td>
                                <td>1.5 hours</td>
                                <td>Room 104</td>
                                <td>Mrs. Lisa Martinez</td>
                                <td><span class="badge bg-primary">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d', strtotime('+5 days')) }}</td>
                                <td>02:00 PM</td>
                                <td class="bg-dark text-white">Arts</td>
                                <td>Class 1A</td>
                                <td>2 hours</td>
                                <td>Art Room</td>
                                <td>Mrs. Jennifer Taylor</td>
                                <td><span class="badge bg-primary">Scheduled</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-3">
                    <h6>Exam Schedule Summary</h6>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body text-center">
                                    <h4>6</h4>
                                    <p class="mb-0">Total Exams</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body text-center">
                                    <h4>3</h4>
                                    <p class="mb-0">Days</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body text-center">
                                    <h4>Class 1A</h4>
                                    <p class="mb-0">Class</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body text-center">
                                    <h4>Term 1</h4>
                                    <p class="mb-0">Term</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
