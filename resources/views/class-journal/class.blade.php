@extends('layouts.app')

@section('title', 'Class Journal')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Class Journal</h5>
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
                        <label for="monthSelect" class="form-label">Month</label>
                        <select class="form-select" id="monthSelect">
                            <option value="1" selected>January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
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
                
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-point bg-primary"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h6 class="mb-0">Mathematics Lesson - Algebra Basics</h6>
                                    <small class="text-muted">{{ date('Y-m-d') }}</small>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2">Today we covered basic algebraic expressions and equations. Students showed good understanding of the concepts.</p>
                                    <div class="d-flex gap-2 mb-2">
                                        <span class="badge bg-primary">Lesson Plan</span>
                                        <span class="badge bg-success">Completed</span>
                                    </div>
                                    <p><strong>Students Present:</strong> 32/35</p>
                                    <p><strong>Key Topics:</strong> Variables, Expressions, Simple Equations</p>
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-point bg-success"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h6 class="mb-0">English Literature - Poetry Analysis</h6>
                                    <small class="text-muted">{{ date('Y-m-d', strtotime('-1 day')) }}</small>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2">Students analyzed Robert Frost's "The Road Not Taken". Excellent class discussion on themes and symbolism.</p>
                                    <div class="d-flex gap-2 mb-2">
                                        <span class="badge bg-success">Class Observation</span>
                                        <span class="badge bg-info">Excellent</span>
                                    </div>
                                    <p><strong>Students Present:</strong> 34/35</p>
                                    <p><strong>Activities:</strong> Group discussion, Individual analysis, Creative writing</p>
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-point bg-warning"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h6 class="mb-0">Science Lab - Chemistry Experiment</h6>
                                    <small class="text-muted">{{ date('Y-m-d', strtotime('-2 days')) }}</small>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2">Conducted acid-base neutralization experiment. Some students needed additional guidance with safety procedures.</p>
                                    <div class="d-flex gap-2 mb-2">
                                        <span class="badge bg-warning">Assessment</span>
                                        <span class="badge bg-info">Lab Work</span>
                                    </div>
                                    <p><strong>Students Present:</strong> 30/35</p>
                                    <p><strong>Observations:</strong> Good participation, some safety concerns addressed</p>
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-point bg-info"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h6 class="mb-0">Student Achievement Award</h6>
                                    <small class="text-muted">{{ date('Y-m-d', strtotime('-3 days')) }}</small>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2">John Smith received the "Most Improved Student" award for mathematics this month.</p>
                                    <div class="d-flex gap-2 mb-2">
                                        <span class="badge bg-info">Student Achievement</span>
                                        <span class="badge bg-success">Award</span>
                                    </div>
                                    <p><strong>Student:</strong> John Smith (STU001)</p>
                                    <p><strong>Achievement:</strong> Significant improvement in mathematics grades and participation</p>
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button class="btn btn-primary">Load More Entries</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 30px;
}

.timeline-point {
    position: absolute;
    left: -22px;
    top: 0;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #fff;
}

.timeline-content {
    margin-left: 10px;
}
</style>
@endsection
