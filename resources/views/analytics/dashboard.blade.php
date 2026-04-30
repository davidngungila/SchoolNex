@extends('layouts.app')

@section('title', 'Analytics Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Analytics Dashboard</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#refreshModal">
                        <i class="bx bx-refresh me-1"></i> Refresh Data
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#settingsModal">
                        <i class="bx bx-cog me-1"></i> Settings
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Key Performance Indicators -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">502</h4>
                                        <p class="mb-0">Total Students</p>
                                        <small class="text-muted">+5% from last month</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user avatar-icon"></i>
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
                                        <h4 class="mb-0">89.2%</h4>
                                        <p class="mb-0">Avg Attendance</p>
                                        <small class="text-muted">+2.1% from last month</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user-check avatar-icon"></i>
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
                                        <h4 class="mb-0">85.6%</h4>
                                        <p class="mb-0">Avg Performance</p>
                                        <small class="text-muted">-1.2% from last month</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-chart avatar-icon"></i>
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
                                        <h4 class="mb-0">92.3%</h4>
                                        <p class="mb-0">Pass Rate</p>
                                        <small class="text-muted">+3.4% from last month</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-check-circle avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label for="timeRange" class="form-label">Time Range</label>
                        <select class="form-select" id="timeRange">
                            <option value="today">Today</option>
                            <option value="week" selected>This Week</option>
                            <option value="month">This Month</option>
                            <option value="quarter">This Quarter</option>
                            <option value="year">This Year</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" id="department">
                            <option value="all" selected>All Departments</option>
                            <option value="academic">Academic</option>
                            <option value="admin">Administration</option>
                            <option value="finance">Finance</option>
                            <option value="support">Support</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="class" class="form-label">Class</label>
                        <select class="form-select" id="class">
                            <option value="all" selected>All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                            <option value="2A">Class 2A</option>
                            <option value="2B">Class 2B</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="metric" class="form-label">Metric</label>
                        <select class="form-select" id="metric">
                            <option value="all" selected>All Metrics</option>
                            <option value="academic">Academic</option>
                            <option value="attendance">Attendance</option>
                            <option value="behavior">Behavior</option>
                            <option value="financial">Financial</option>
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

                <!-- Charts Row 1 -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Performance Trends</h6>
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
                                <canvas id="performanceTrendChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Grade Distribution</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="gradeDistributionChart" width="200" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row 2 -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Attendance Overview</h6>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bx bx-download"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Download as PNG</a></li>
                                        <li><a class="dropdown-item" href="#">Download as PDF</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="attendanceChart" width="300" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Department Performance</h6>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bx bx-download"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Download as PNG</a></li>
                                        <li><a class="dropdown-item" href="#">Download as PDF</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="departmentChart" width="300" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Analytics Tables -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Top Performing Classes</h6>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewFullTable('classes')">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Avg Score</th>
                                                <th>Attendance</th>
                                                <th>Trend</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Class 2A</strong></td>
                                                <td>92.5%</td>
                                                <td>94.2%</td>
                                                <td><i class="bx bx-trending-up text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Class 1B</strong></td>
                                                <td>89.8%</td>
                                                <td>91.5%</td>
                                                <td><i class="bx bx-trending-up text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Class 1A</strong></td>
                                                <td>87.3%</td>
                                                <td>89.1%</td>
                                                <td><i class="bx bx-trending-down text-danger"></i></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Class 2B</strong></td>
                                                <td>85.6%</td>
                                                <td>87.8%</td>
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
                                <h6 class="mb-0">At Risk Students</h6>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewFullTable('students')">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Student</th>
                                                <th>Class</th>
                                                <th>Score</th>
                                                <th>Attendance</th>
                                                <th>Risk Level</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John Smith</td>
                                                <td>Class 1A</td>
                                                <td>65.2%</td>
                                                <td>78.5%</td>
                                                <td><span class="badge bg-danger">High</span></td>
                                            </tr>
                                            <tr>
                                                <td>Sarah Johnson</td>
                                                <td>Class 2B</td>
                                                <td>72.8%</td>
                                                <td>82.3%</td>
                                                <td><span class="badge bg-warning">Medium</span></td>
                                            </tr>
                                            <tr>
                                                <td>Michael Brown</td>
                                                <td>Class 1B</td>
                                                <td>68.5%</td>
                                                <td>75.2%</td>
                                                <td><span class="badge bg-warning">Medium</span></td>
                                            </tr>
                                            <tr>
                                                <td>Emily Davis</td>
                                                <td>Class 2A</td>
                                                <td>71.3%</td>
                                                <td>80.1%</td>
                                                <td><span class="badge bg-warning">Medium</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Real-time Metrics -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Real-time Metrics</h6>
                                <div class="d-flex gap-2">
                                    <span class="badge bg-success">Live</span>
                                    <small class="text-muted">Last updated: {{ date('H:i:s') }}</small>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <h4 class="text-primary">456</h4>
                                            <small class="text-muted">Students Present Today</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <h4 class="text-success">42</h4>
                                            <small class="text-muted">Teachers Present Today</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <h4 class="text-info">8</h4>
                                            <small class="text-muted">Classes in Progress</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <h4 class="text-warning">12</h4>
                                            <small class="text-muted">Pending Assignments</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Refresh Modal -->
<div class="modal fade" id="refreshModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Refresh Analytics Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="refreshScope" class="form-label">Refresh Scope</label>
                    <select class="form-select" id="refreshScope">
                        <option value="all">All Data</option>
                        <option value="academic">Academic Data</option>
                        <option value="attendance">Attendance Data</option>
                        <option value="financial">Financial Data</option>
                        <option value="custom">Custom Selection</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="refreshTimeRange" class="form-label">Time Range</label>
                    <select class="form-select" id="refreshTimeRange">
                        <option value="last_hour">Last Hour</option>
                        <option value="last_24h">Last 24 Hours</option>
                        <option value="last_week">Last Week</option>
                        <option value="last_month">Last Month</option>
                        <option value="custom">Custom Range</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoRefresh">
                        <label class="form-check-label" for="autoRefresh">
                            Enable auto-refresh (every 5 minutes)
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="refreshData()">Refresh Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Analytics</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exportType" class="form-label">Export Type</label>
                    <select class="form-select" id="exportType">
                        <option value="dashboard">Dashboard Snapshot</option>
                        <option value="raw_data">Raw Data</option>
                        <option value="charts">Charts Only</option>
                        <option value="tables">Tables Only</option>
                        <option value="comprehensive">Comprehensive Report</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exportFormat" class="form-label">Export Format</label>
                    <select class="form-select" id="exportFormat">
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                        <option value="csv">CSV</option>
                        <option value="png">PNG Image</option>
                        <option value="json">JSON</option>
                    </select>
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
                        <input class="form-check-input" type="checkbox" id="includeSummary">
                        <label class="form-check-label" for="includeSummary">
                            Include executive summary
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportAnalytics()">Export Analytics</button>
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Analytics Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Display Settings</h6>
                        <div class="mb-3">
                            <label for="defaultTimeRange" class="form-label">Default Time Range</label>
                            <select class="form-select" id="defaultTimeRange">
                                <option value="week">This Week</option>
                                <option value="month">This Month</option>
                                <option value="quarter">This Quarter</option>
                                <option value="year">This Year</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="chartType" class="form-label">Default Chart Type</label>
                            <select class="form-select" id="chartType">
                                <option value="line">Line Chart</option>
                                <option value="bar">Bar Chart</option>
                                <option value="pie">Pie Chart</option>
                                <option value="area">Area Chart</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="colorScheme" class="form-label">Color Scheme</label>
                            <select class="form-select" id="colorScheme">
                                <option value="default">Default</option>
                                <option value="blue">Blue Theme</option>
                                <option value="green">Green Theme</option>
                                <option value="purple">Purple Theme</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Data Settings</h6>
                        <div class="mb-3">
                            <label for="dataRefresh" class="form-label">Data Refresh Interval</label>
                            <select class="form-select" id="dataRefresh">
                                <option value="5">5 minutes</option>
                                <option value="10">10 minutes</option>
                                <option value="30">30 minutes</option>
                                <option value="60">1 hour</option>
                                <option value="manual">Manual Only</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dataSource" class="form-label">Primary Data Source</label>
                            <select class="form-select" id="dataSource">
                                <option value="database">Database</option>
                                <option value="cache">Cache</option>
                                <option value="api">API</option>
                                <option value="hybrid">Hybrid</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableRealTime" checked>
                                <label class="form-check-label" for="enableRealTime">
                                    Enable real-time updates
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enablePredictions">
                                <label class="form-check-label" for="enablePredictions">
                                    Enable predictive analytics
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enableAlerts" checked>
                                <label class="form-check-label" for="enableAlerts">
                                    Enable alerts and notifications
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h6>Alert Thresholds</h6>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="attendanceThreshold" class="form-label">Attendance Threshold (%)</label>
                                <input type="number" class="form-control" id="attendanceThreshold" min="0" max="100" value="85">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="performanceThreshold" class="form-label">Performance Threshold (%)</label>
                                <input type="number" class="form-control" id="performanceThreshold" min="0" max="100" value="80">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="passRateThreshold" class="form-label">Pass Rate Threshold (%)</label>
                                <input type="number" class="form-control" id="passRateThreshold" min="0" max="100" value="90">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Settings</button>
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
    const performanceCtx = document.getElementById('performanceTrendChart').getContext('2d');
    new Chart(performanceCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Average Score',
                data: [82, 84, 83, 86, 85, 87, 88, 86, 89, 87, 85, 86],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
            }, {
                label: 'Attendance',
                data: [88, 87, 89, 90, 91, 89, 92, 90, 93, 91, 90, 89],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
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
    
    // Grade Distribution Chart
    const gradeCtx = document.getElementById('gradeDistributionChart').getContext('2d');
    new Chart(gradeCtx, {
        type: 'doughnut',
        data: {
            labels: ['A Grade', 'B Grade', 'C Grade', 'D Grade', 'F Grade'],
            datasets: [{
                data: [25, 35, 20, 15, 5],
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
    
    // Attendance Chart
    const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
    new Chart(attendanceCtx, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            datasets: [{
                label: 'Present',
                data: [456, 452, 458, 450, 455],
                backgroundColor: 'rgba(75, 192, 192, 0.8)'
            }, {
                label: 'Absent',
                data: [46, 50, 44, 52, 47],
                backgroundColor: 'rgba(255, 99, 132, 0.8)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    // Department Performance Chart
    const departmentCtx = document.getElementById('departmentChart').getContext('2d');
    new Chart(departmentCtx, {
        type: 'radar',
        data: {
            labels: ['Academic', 'Administration', 'Finance', 'Support', 'Sports'],
            datasets: [{
                label: 'Current Month',
                data: [85, 92, 78, 88, 90],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)'
            }, {
                label: 'Previous Month',
                data: [82, 90, 80, 85, 88],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                r: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
}

function refreshData() {
    alert('Refreshing analytics data... This may take a few moments.');
    setTimeout(() => {
        alert('Analytics data refreshed successfully!');
        document.getElementById('refreshModal').querySelector('.btn-close').click();
        initializeCharts(); // Re-initialize charts with new data
    }, 2000);
}

function exportAnalytics() {
    const exportType = document.getElementById('exportType').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportType} in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
}

function viewFullTable(tableType) {
    if (tableType === 'classes') {
        alert('Opening full class performance table...');
    } else if (tableType === 'students') {
        alert('Opening full at-risk students table...');
    }
}

// Auto-refresh functionality
let autoRefreshInterval;
document.getElementById('autoRefresh')?.addEventListener('change', function() {
    if (this.checked) {
        autoRefreshInterval = setInterval(() => {
            console.log('Auto-refreshing dashboard data...');
            // Here you would typically fetch new data and update charts
        }, 300000); // 5 minutes
    } else {
        clearInterval(autoRefreshInterval);
    }
});
</script>
@endsection
