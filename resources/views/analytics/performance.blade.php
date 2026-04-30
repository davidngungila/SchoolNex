@extends('layouts.app')

@section('title', 'Performance Metrics')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Performance Metrics</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#compareModal">
                        <i class="bx bx-compare me-1"></i> Compare
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#benchmarkModal">
                        <i class="bx bx-trending-up me-1"></i> Benchmark
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Performance Overview -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">85.6%</h4>
                                        <p class="mb-0">Overall Performance</p>
                                        <small class="text-muted">+2.3% from last term</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-chart avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">92.3%</h4>
                                        <p class="mb-0">Pass Rate</p>
                                        <small class="text-muted">+1.8% from last term</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-check-circle avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">78.4%</h4>
                                        <p class="mb-0">Improvement Rate</p>
                                        <small class="text-muted">+5.2% from last term</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-line-chart avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">4.2/5</h4>
                                        <p class="mb-0">Avg Rating</p>
                                        <small class="text-muted">+0.3 from last term</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-star avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label for="metricType" class="form-label">Metric Type</label>
                        <select class="form-select" id="metricType">
                            <option value="all">All Metrics</option>
                            <option value="academic">Academic</option>
                            <option value="behavioral">Behavioral</option>
                            <option value="extracurricular">Extracurricular</option>
                            <option value="attendance">Attendance</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="entityType" class="form-label">Entity Type</label>
                        <select class="form-select" id="entityType">
                            <option value="all">All Entities</option>
                            <option value="students">Students</option>
                            <option value="teachers">Teachers</option>
                            <option value="classes">Classes</option>
                            <option value="departments">Departments</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="timePeriod" class="form-label">Time Period</label>
                        <select class="form-select" id="timePeriod">
                            <option value="current">Current Term</option>
                            <option value="previous">Previous Term</option>
                            <option value="ytd">Year to Date</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="gradeLevel" class="form-label">Grade Level</label>
                        <select class="form-select" id="gradeLevel">
                            <option value="all">All Grades</option>
                            <option value="grade1">Grade 1</option>
                            <option value="grade2">Grade 2</option>
                            <option value="grade3">Grade 3</option>
                            <option value="grade4">Grade 4</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Apply
                        </button>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-success w-100">
                            <i class="bx bx-refresh"></i> Reset
                        </button>
                    </div>
                </div>

                <!-- Performance Charts -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Performance Trend Analysis</h6>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bx bx-download"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Download as PNG</a></li>
                                        <li><a class="dropdown-item" href="#">Download as PDF</a></li>
                                        <li><a class="dropdown-item" href="#">Download as Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="performanceTrendChart" width="400" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Performance Distribution</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="performanceDistributionChart" width="200" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subject-wise Performance -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Subject-wise Performance Analysis</h6>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bx bx-download"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Download as PNG</a></li>
                                        <li><a class="dropdown-item" href="#">Download as PDF</a></li>
                                        <li><a class="dropdown-item" href="#">Download as Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="subjectPerformanceChart" width="800" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Performance Tables -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Top Performers</h6>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewFullDetails('top')">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Rank</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Avg Score</th>
                                                <th>Trend</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span class="badge bg-warning">1</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold">Emily Davis</div>
                                                            <small class="text-muted">STU004</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Class 2A</td>
                                                <td>96.8%</td>
                                                <td><i class="bx bx-trending-up text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge bg-secondary">2</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold">Michael Brown</div>
                                                            <small class="text-muted">STU003</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Class 1B</td>
                                                <td>94.5%</td>
                                                <td><i class="bx bx-trending-up text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge bg-danger">3</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold">Sarah Johnson</div>
                                                            <small class="text-muted">STU002</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Class 1A</td>
                                                <td>93.2%</td>
                                                <td><i class="bx bx-trending-down text-danger"></i></td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge bg-primary">4</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold">Robert Wilson</div>
                                                            <small class="text-muted">STU005</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Class 2B</td>
                                                <td>91.8%</td>
                                                <td><i class="bx bx-trending-up text-success"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Needs Improvement</h6>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewFullDetails('improvement')">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Avg Score</th>
                                                <th>Issues</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold">John Smith</div>
                                                            <small class="text-muted">STU001</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Class 1A</td>
                                                <td>65.2%</td>
                                                <td>
                                                    <span class="badge bg-danger">Math</span>
                                                    <span class="badge bg-warning">Science</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#interventionModal">
                                                        <i class="bx bx-user-plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold">Lisa Martinez</div>
                                                            <small class="text-muted">STU006</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Class 2B</td>
                                                <td>68.5%</td>
                                                <td>
                                                    <span class="badge bg-warning">English</span>
                                                    <span class="badge bg-danger">History</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#interventionModal">
                                                        <i class="bx bx-user-plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold">David Chen</div>
                                                            <small class="text-muted">STU007</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Class 1B</td>
                                                <td>71.3%</td>
                                                <td>
                                                    <span class="badge bg-warning">Math</span>
                                                    <span class="badge bg-info">Attendance</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#interventionModal">
                                                        <i class="bx bx-user-plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/avatars/8.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold">Amy Johnson</div>
                                                            <small class="text-muted">STU008</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Class 2A</td>
                                                <td>73.8%</td>
                                                <td>
                                                    <span class="badge bg-warning">Science</span>
                                                    <span class="badge bg-warning">Art</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#interventionModal">
                                                        <i class="bx bx-user-plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Class Performance Summary -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Class Performance Summary</h6>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bx bx-download"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Download as PNG</a></li>
                                        <li><a class="dropdown-item" href="#">Download as PDF</a></li>
                                        <li><a class="dropdown-item" href="#">Download as Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Total Students</th>
                                                <th>Avg Score</th>
                                                <th>Pass Rate</th>
                                                <th>Top Score</th>
                                                <th>Lowest Score</th>
                                                <th>Improvement</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Class 2A</strong></td>
                                                <td>32</td>
                                                <td>89.5%</td>
                                                <td>96.8%</td>
                                                <td>96.8%</td>
                                                <td>72.3%</td>
                                                <td><span class="badge bg-success">+5.2%</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewClassDetails('2A')">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Class 1B</strong></td>
                                                <td>28</td>
                                                <td>87.2%</td>
                                                <td>92.8%</td>
                                                <td>94.5%</td>
                                                <td>68.5%</td>
                                                <td><span class="badge bg-success">+3.1%</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewClassDetails('1B')">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Class 1A</strong></td>
                                                <td>25</td>
                                                <td>85.8%</td>
                                                <td>88.0%</td>
                                                <td>93.2%</td>
                                                <td>65.2%</td>
                                                <td><span class="badge bg-danger">-1.2%</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewClassDetails('1A')">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Class 2B</strong></td>
                                                <td>30</td>
                                                <td>83.4%</td>
                                                <td>86.6%</td>
                                                <td>91.8%</td>
                                                <td>68.5%</td>
                                                <td><span class="badge bg-success">+2.8%</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewClassDetails('2B')">
                                                        <i class="bx bx-show"></i>
                                                    </button>
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
    </div>
</div>

<!-- Compare Modal -->
<div class="modal fade" id="compareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Compare Performance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="compareType" class="form-label">Comparison Type</label>
                            <select class="form-select" id="compareType">
                                <option value="students">Students</option>
                                <option value="classes">Classes</option>
                                <option value="subjects">Subjects</option>
                                <option value="periods">Time Periods</option>
                                <option value="departments">Departments</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="compareMetric" class="form-label">Metric</label>
                            <select class="form-select" id="compareMetric">
                                <option value="average">Average Score</option>
                                <option value="pass_rate">Pass Rate</option>
                                <option value="improvement">Improvement Rate</option>
                                <option value="attendance">Attendance</option>
                                <option value="behavior">Behavior Score</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="entity1" class="form-label">Entity 1</label>
                            <select class="form-select" id="entity1">
                                <option value="">Select Entity</option>
                                <option value="class1a">Class 1A</option>
                                <option value="class1b">Class 1B</option>
                                <option value="class2a">Class 2A</option>
                                <option value="class2b">Class 2B</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="entity2" class="form-label">Entity 2</label>
                            <select class="form-select" id="entity2">
                                <option value="">Select Entity</option>
                                <option value="class1a">Class 1A</option>
                                <option value="class1b">Class 1B</option>
                                <option value="class2a">Class 2A</option>
                                <option value="class2b">Class 2B</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="timeRange1" class="form-label">Time Range 1</label>
                            <select class="form-select" id="timeRange1">
                                <option value="current">Current Term</option>
                                <option value="previous">Previous Term</option>
                                <option value="ytd">Year to Date</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="timeRange2" class="form-label">Time Range 2</label>
                            <select class="form-select" id="timeRange2">
                                <option value="current">Current Term</option>
                                <option value="previous">Previous Term</option>
                                <option value="ytd">Year to Date</option>
                            </select>
                        </div>
                    </div>
                </form>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Comparison Results</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="comparisonChart" width="700" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="performComparison()">Compare</button>
            </div>
        </div>
    </div>
</div>

<!-- Benchmark Modal -->
<div class="modal fade" id="benchmarkModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Performance Benchmarking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="benchmarkType" class="form-label">Benchmark Type</label>
                            <select class="form-select" id="benchmarkType">
                                <option value="internal">Internal Benchmark</option>
                                <option value="external">External Benchmark</option>
                                <option value="historical">Historical Benchmark</option>
                                <option value="industry">Industry Standard</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="benchmarkEntity" class="form-label">Entity to Benchmark</label>
                            <select class="form-select" id="benchmarkEntity">
                                <option value="all">All Classes</option>
                                <option value="class1a">Class 1A</option>
                                <option value="class1b">Class 1B</option>
                                <option value="class2a">Class 2A</option>
                                <option value="class2b">Class 2B</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="benchmarkMetric" class="form-label">Benchmark Metric</label>
                            <select class="form-select" id="benchmarkMetric">
                                <option value="average">Average Score</option>
                                <option value="pass_rate">Pass Rate</option>
                                <option value="improvement">Improvement Rate</option>
                                <option value="attendance">Attendance Rate</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="benchmarkPeriod" class="form-label">Benchmark Period</label>
                            <select class="form-select" id="benchmarkPeriod">
                                <option value="current">Current Term</option>
                                <option value="previous">Previous Term</option>
                                <option value="last_year">Same Period Last Year</option>
                            </select>
                        </div>
                    </div>
                </form>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Benchmark Results</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="benchmarkChart" width="700" height="300"></canvas>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Benchmark Summary</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Metric</th>
                                                <th>Current</th>
                                                <th>Benchmark</th>
                                                <th>Variance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Average Score</td>
                                                <td>85.6%</td>
                                                <td>82.3%</td>
                                                <td class="text-success">+3.3%</td>
                                            </tr>
                                            <tr>
                                                <td>Pass Rate</td>
                                                <td>92.3%</td>
                                                <td>88.7%</td>
                                                <td class="text-success">+3.6%</td>
                                            </tr>
                                            <tr>
                                                <td>Attendance</td>
                                                <td>89.2%</td>
                                                <td>91.5%</td>
                                                <td class="text-danger">-2.3%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Recommendations</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Academic performance exceeds benchmarks</li>
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Pass rate improvement is significant</li>
                                    <li class="mb-2"><i class="bx bx-x text-danger me-2"></i>Attendance needs improvement</li>
                                    <li class="mb-2"><i class="bx bx-target-lock text-primary me-2"></i>Focus on attendance strategies</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="runBenchmark()">Run Benchmark</button>
            </div>
        </div>
    </div>
</div>

<!-- Intervention Modal -->
<div class="modal fade" id="interventionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Student Intervention Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Student</label>
                        <input type="text" class="form-control" id="studentName" value="John Smith - Class 1A" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="interventionType" class="form-label">Intervention Type</label>
                        <select class="form-select" id="interventionType">
                            <option value="academic">Academic Support</option>
                            <option value="behavioral">Behavioral Support</option>
                            <option value="counseling">Counseling</option>
                            <option value="parental">Parental Involvement</option>
                            <option value="peer">Peer Tutoring</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="interventionReason" class="form-label">Reason for Intervention</label>
                        <textarea class="form-control" id="interventionReason" rows="2" placeholder="Enter reason for intervention...">Poor performance in Mathematics and Science subjects</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="interventionGoals" class="form-label">Intervention Goals</label>
                        <textarea class="form-control" id="interventionGoals" rows="2" placeholder="Enter intervention goals...">Improve Mathematics score to at least 75% within 2 months</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">Review Date</label>
                            <input type="date" class="form-control" id="endDate" value="{{ date('Y-m-d', strtotime('+2 months')) }}">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="responsibleStaff" class="form-label">Responsible Staff</label>
                        <select class="form-select" id="responsibleStaff">
                            <option value="">Select Staff</option>
                            <option value="teacher1">Ms. Johnson - Class Teacher</option>
                            <option value="teacher2">Mr. Davis - Math Teacher</option>
                            <option value="counselor">Ms. Wilson - School Counselor</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createIntervention()">Create Intervention</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Performance Metrics</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportType" class="form-label">Export Type</label>
                        <select class="form-select" id="exportType">
                            <option value="summary">Performance Summary</option>
                            <option value="detailed">Detailed Report</option>
                            <option value="charts">Charts Only</option>
                            <option value="tables">Tables Only</option>
                            <option value="raw">Raw Data</option>
                        </select>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="exportFormat" class="form-label">Format</label>
                            <select class="form-select" id="exportFormat">
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                                <option value="csv">CSV</option>
                                <option value="json">JSON</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exportPeriod" class="form-label">Period</label>
                            <select class="form-select" id="exportPeriod">
                                <option value="current">Current Term</option>
                                <option value="previous">Previous Term</option>
                                <option value="ytd">Year to Date</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportEmail" class="form-label">Email Recipients</label>
                        <input type="text" class="form-control" id="exportEmail" placeholder="Enter email addresses separated by commas">
                        <small class="text-muted">Optional: Leave empty to download only</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeCharts" checked>
                            <label class="form-check-label" for="includeCharts">
                                Include charts and graphs
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeTables" checked>
                            <label class="form-check-label" for="includeTables">
                                Include data tables
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeRecommendations">
                            <label class="form-check-label" for="includeRecommendations">
                                Include recommendations
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportMetrics()">Export Metrics</button>
            </div>
        </div>
    </div>
</div>

<script>
// Initialize charts when page loads
document.addEventListener('DOMContentLoaded', function() {
    initializeCharts();
});

function initializeCharts() {
    // Performance Trend Chart
    const trendCtx = document.getElementById('performanceTrendChart').getContext('2d');
    new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Average Score',
                data: [82, 83, 84, 85, 86, 85, 87, 86, 88, 87, 86, 85.6],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
            }, {
                label: 'Pass Rate',
                data: [88, 89, 90, 91, 92, 91, 93, 92, 94, 93, 92, 92.3],
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
    
    // Performance Distribution Chart
    const distributionCtx = document.getElementById('performanceDistributionChart').getContext('2d');
    new Chart(distributionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Excellent (90-100%)', 'Good (80-89%)', 'Average (70-79%)', 'Below Average (60-69%)', 'Poor (<60%)'],
            datasets: [{
                data: [25, 35, 25, 10, 5],
                backgroundColor: [
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 99, 132)'
                ]
            }]
        },
        options: {
            responsive: true
        }
    });
    
    // Subject Performance Chart
    const subjectCtx = document.getElementById('subjectPerformanceChart').getContext('2d');
    new Chart(subjectCtx, {
        type: 'bar',
        data: {
            labels: ['Mathematics', 'English', 'Science', 'Social Studies', 'Art', 'Physical Education'],
            datasets: [{
                label: 'Class 1A',
                data: [82, 88, 79, 85, 90, 92],
                backgroundColor: 'rgba(75, 192, 192, 0.8)'
            }, {
                label: 'Class 1B',
                data: [85, 86, 82, 88, 87, 90],
                backgroundColor: 'rgba(54, 162, 235, 0.8)'
            }, {
                label: 'Class 2A',
                data: [88, 90, 85, 89, 92, 94],
                backgroundColor: 'rgba(255, 205, 86, 0.8)'
            }, {
                label: 'Class 2B',
                data: [80, 84, 78, 82, 85, 88],
                backgroundColor: 'rgba(255, 99, 132, 0.8)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
}

function performComparison() {
    const entity1 = document.getElementById('entity1').value;
    const entity2 = document.getElementById('entity2').value;
    
    if (!entity1 || !entity2) {
        alert('Please select both entities to compare');
        return;
    }
    
    // Initialize comparison chart
    const comparisonCtx = document.getElementById('comparisonChart').getContext('2d');
    new Chart(comparisonCtx, {
        type: 'bar',
        data: {
            labels: ['Average Score', 'Pass Rate', 'Attendance', 'Improvement'],
            datasets: [{
                label: entity1,
                data: [85, 92, 89, 78],
                backgroundColor: 'rgba(75, 192, 192, 0.8)'
            }, {
                label: entity2,
                data: [82, 88, 91, 82],
                backgroundColor: 'rgba(255, 99, 132, 0.8)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
    
    alert('Comparison completed successfully!');
}

function runBenchmark() {
    const benchmarkType = document.getElementById('benchmarkType').value;
    const benchmarkEntity = document.getElementById('benchmarkEntity').value;
    
    // Initialize benchmark chart
    const benchmarkCtx = document.getElementById('benchmarkChart').getContext('2d');
    new Chart(benchmarkCtx, {
        type: 'bar',
        data: {
            labels: ['Average Score', 'Pass Rate', 'Attendance Rate', 'Improvement Rate'],
            datasets: [{
                label: 'Current Performance',
                data: [85.6, 92.3, 89.2, 78.4],
                backgroundColor: 'rgba(75, 192, 192, 0.8)'
            }, {
                label: 'Benchmark',
                data: [82.3, 88.7, 91.5, 75.2],
                backgroundColor: 'rgba(255, 205, 86, 0.8)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
    
    alert('Benchmark analysis completed successfully!');
}

function createIntervention() {
    const studentName = document.getElementById('studentName').value;
    const interventionType = document.getElementById('interventionType').value;
    
    if (!interventionType) {
        alert('Please select an intervention type');
        return;
    }
    
    alert(`Intervention plan created for ${studentName}`);
    document.getElementById('interventionModal').querySelector('.btn-close').click();
}

function exportMetrics() {
    const exportType = document.getElementById('exportType').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportType} in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
}

function viewFullDetails(type) {
    if (type === 'top') {
        alert('Opening detailed top performers view...');
    } else if (type === 'improvement') {
        alert('Opening detailed improvement needs view...');
    }
}

function viewClassDetails(className) {
    alert(`Opening detailed performance view for Class ${className}...`);
}
</script>
@endsection
