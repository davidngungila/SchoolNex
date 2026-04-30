@extends('layouts.app')

@section('title', 'Journal Report')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Journal Report</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="reportClass" class="form-label">Class</label>
                        <select class="form-select" id="reportClass">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="reportSubject" class="form-label">Subject</label>
                        <select class="form-select" id="reportSubject">
                            <option value="">All Subjects</option>
                            <option value="math">Mathematics</option>
                            <option value="english">English</option>
                            <option value="science">Science</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="reportType" class="form-label">Report Type</label>
                        <select class="form-select" id="reportType">
                            <option value="summary">Summary Report</option>
                            <option value="detailed">Detailed Report</option>
                            <option value="assessment">Assessment Report</option>
                            <option value="attendance">Attendance Report</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="reportPeriod" class="form-label">Period</label>
                        <select class="form-select" id="reportPeriod">
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="term">Termly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                </div>
                
                <button type="button" class="btn btn-primary mb-3">Generate Report</button>
                
                <!-- Report Summary -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body text-center">
                                <h4>156</h4>
                                <p class="mb-0">Total Entries</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body text-center">
                                <h4>89%</h4>
                                <p class="mb-0">Completion Rate</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body text-center">
                                <h4>45</h4>
                                <p class="mb-0">Assessments</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body text-center">
                                <h4>92%</h4>
                                <p class="mb-0">Avg Attendance</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Detailed Report Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Total Entries</th>
                                <th>Lessons</th>
                                <th>Assessments</th>
                                <th>Achievements</th>
                                <th>Incidents</th>
                                <th>Completion %</th>
                                <th>Avg Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Class 1A</td>
                                <td>Mathematics</td>
                                <td>45</td>
                                <td>35</td>
                                <td>8</td>
                                <td>2</td>
                                <td>0</td>
                                <td>95%</td>
                                <td>87%</td>
                            </tr>
                            <tr>
                                <td>Class 1A</td>
                                <td>English</td>
                                <td>42</td>
                                <td>33</td>
                                <td>7</td>
                                <td>2</td>
                                <td>0</td>
                                <td>93%</td>
                                <td>91%</td>
                            </tr>
                            <tr>
                                <td>Class 1B</td>
                                <td>Mathematics</td>
                                <td>38</td>
                                <td>30</td>
                                <td>6</td>
                                <td>2</td>
                                <td>0</td>
                                <td>89%</td>
                                <td>82%</td>
                            </tr>
                            <tr>
                                <td>Class 1B</td>
                                <td>Science</td>
                                <td>40</td>
                                <td>32</td>
                                <td>6</td>
                                <td>2</td>
                                <td>0</td>
                                <td>90%</td>
                                <td>85%</td>
                            </tr>
                            <tr>
                                <td>Class 2A</td>
                                <td>History</td>
                                <td>35</td>
                                <td>28</td>
                                <td>5</td>
                                <td>2</td>
                                <td>0</td>
                                <td>88%</td>
                                <td>79%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Charts Section -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Entry Types Distribution</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Lesson Plans</span>
                                        <span>65%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" style="width: 65%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Assessments</span>
                                        <span>20%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 20%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Observations</span>
                                        <span>10%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" style="width: 10%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Achievements</span>
                                        <span>5%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" style="width: 5%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Monthly Progress</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="progressChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Export Options -->
                <div class="d-flex gap-2 mt-4">
                    <button type="button" class="btn btn-primary"><i class="bx bx-download me-1"></i> Download PDF</button>
                    <button type="button" class="btn btn-success"><i class="bx bx-file me-1"></i> Export Excel</button>
                    <button type="button" class="btn btn-info"><i class="bx bx-printer me-1"></i> Print Report</button>
                    <button type="button" class="btn btn-warning"><i class="bx bx-envelope me-1"></i> Email Report</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Simple chart visualization (in a real app, you'd use Chart.js or similar)
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('progressChart');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        // Simple bar chart representation
        ctx.fillStyle = '#696cff';
        ctx.fillRect(20, 100, 40, 60);
        ctx.fillRect(70, 80, 40, 80);
        ctx.fillRect(120, 90, 40, 70);
        ctx.fillRect(170, 70, 40, 90);
        ctx.fillRect(220, 85, 40, 75);
        
        // Add labels
        ctx.fillStyle = '#666';
        ctx.font = '12px Arial';
        ctx.fillText('Jan', 30, 180);
        ctx.fillText('Feb', 80, 180);
        ctx.fillText('Mar', 130, 180);
        ctx.fillText('Apr', 180, 180);
        ctx.fillText('May', 230, 180);
    }
});
</script>
@endsection
