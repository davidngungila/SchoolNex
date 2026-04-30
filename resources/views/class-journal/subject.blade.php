@extends('layouts.app')

@section('title', 'Subject Journal')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Subject Journal</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="subjectSelect" class="form-label">Select Subject</label>
                        <select class="form-select" id="subjectSelect">
                            <option value="math" selected>Mathematics</option>
                            <option value="english">English</option>
                            <option value="science">Science</option>
                            <option value="history">History</option>
                            <option value="geography">Geography</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="classSelect" class="form-label">Class</label>
                        <select class="form-select" id="classSelect">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
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
                </div>
                
                <!-- Subject Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body text-center">
                                <h4>45</h4>
                                <p class="mb-0">Total Lessons</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body text-center">
                                <h4>92%</h4>
                                <p class="mb-0">Completion Rate</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body text-center">
                                <h4>8</h4>
                                <p class="mb-0">Assessments</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body text-center">
                                <h4>85%</h4>
                                <p class="mb-0">Average Score</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Topics Covered -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Topics Covered This Term</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Algebra Basics</span>
                                        <div class="progress" style="width: 100px; height: 20px;">
                                            <div class="progress-bar bg-success" style="width: 100%">100%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Linear Equations</span>
                                        <div class="progress" style="width: 100px; height: 20px;">
                                            <div class="progress-bar bg-success" style="width: 100%">100%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Quadratic Equations</span>
                                        <div class="progress" style="width: 100px; height: 20px;">
                                            <div class="progress-bar bg-warning" style="width: 75%">75%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Geometry Basics</span>
                                        <div class="progress" style="width: 100px; height: 20px;">
                                            <div class="progress-bar bg-info" style="width: 50%">50%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Trigonometry</span>
                                        <div class="progress" style="width: 100px; height: 20px;">
                                            <div class="progress-bar bg-danger" style="width: 25%">25%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Statistics</span>
                                        <div class="progress" style="width: 100px; height: 20px;">
                                            <div class="progress-bar bg-secondary" style="width: 0%">0%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Entries -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Recent Journal Entries</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Class</th>
                                        <th>Topic</th>
                                        <th>Type</th>
                                        <th>Activities</th>
                                        <th>Assessment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ date('Y-m-d') }}</td>
                                        <td>Class 1A</td>
                                        <td>Quadratic Equations - Introduction</td>
                                        <td><span class="badge bg-primary">Lesson</span></td>
                                        <td>Lecture, Practice Problems</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                        <td>Class 1B</td>
                                        <td>Linear Equations - Word Problems</td>
                                        <td><span class="badge bg-success">Assessment</span></td>
                                        <td>Group Work, Quiz</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d', strtotime('-4 days')) }}</td>
                                        <td>Class 2A</td>
                                        <td>Algebra Basics Review</td>
                                        <td><span class="badge bg-info">Review</span></td>
                                        <td>Practice, Q&A Session</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
