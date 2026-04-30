@extends('layouts.app')

@section('title', 'Trends Analysis')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Trends Analysis</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#forecastModal">
                        <i class="bx bx-line-chart me-1"></i> Forecast
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#compareModal">
                        <i class="bx bx-compare me-1"></i> Compare Trends
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Trend Overview -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">+5.2%</h4>
                                        <p class="mb-0">Performance Trend</p>
                                        <small class="text-muted">Upward trend</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-trending-up avatar-icon"></i>
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
                                        <h4 class="mb-0">+2.3%</h4>
                                        <p class="mb-0">Attendance Trend</p>
                                        <small class="text-muted">Stable trend</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-line-chart avatar-icon"></i>
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
                                        <h4 class="mb-0">-1.8%</h4>
                                        <p class="mb-0">Discipline Trend</p>
                                        <small class="text-muted">Downward trend</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-trending-down avatar-icon"></i>
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
                                        <h4 class="mb-0">+3.4%</h4>
                                        <p class="mb-0">Enrollment Trend</p>
                                        <small class="text-muted">Upward trend</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-user-plus avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label for="trendType" class="form-label">Trend Type</label>
                        <select class="form-select" id="trendType">
                            <option value="all">All Trends</option>
                            <option value="academic">Academic</option>
                            <option value="attendance">Attendance</option>
                            <option value="behavioral">Behavioral</option>
                            <option value="financial">Financial</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="timeframe" class="form-label">Timeframe</label>
                        <select class="form-select" id="timeframe">
                            <option value="6months">Last 6 Months</option>
                            <option value="1year">Last Year</option>
                            <option value="2years">Last 2 Years</option>
                            <option value="5years">Last 5 Years</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="granularity" class="form-label">Granularity</label>
                        <select class="form-select" id="granularity">
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="comparison" class="form-label">Comparison</label>
                        <select class="form-select" id="comparison">
                            <option value="none">No Comparison</option>
                            <option value="previous">Previous Period</option>
                            <option value="target">Target vs Actual</option>
                            <option value="benchmark">Benchmark</option>
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

                <!-- Main Trend Charts -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Multi-Dimensional Trend Analysis</h6>
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
                                <canvas id="multiTrendChart" width="800" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Individual Trend Charts -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Academic Performance Trend</h6>
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
                                <canvas id="academicTrendChart" width="400" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Attendance Trend Analysis</h6>
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
                                <canvas id="attendanceTrendChart" width="400" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seasonal and Pattern Analysis -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Seasonal Pattern Analysis</h6>
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
                                <canvas id="seasonalChart" width="400" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Growth Rate Analysis</h6>
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
                                <canvas id="growthRateChart" width="400" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trend Summary Tables -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Trend Summary</h6>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewFullTrendSummary()">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Metric</th>
                                                <th>Current</th>
                                                <th>Previous</th>
                                                <th>Change</th>
                                                <th>Trend</th>
                                                <th>Confidence</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Overall Performance</strong></td>
                                                <td>85.6%</td>
                                                <td>81.2%</td>
                                                <td class="text-success">+4.4%</td>
                                                <td><i class="bx bx-trending-up text-success"></i></td>
                                                <td><span class="badge bg-success">High</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Attendance Rate</strong></td>
                                                <td>89.2%</td>
                                                <td>87.8%</td>
                                                <td class="text-success">+1.4%</td>
                                                <td><i class="bx bx-trending-up text-success"></i></td>
                                                <td><span class="badge bg-success">High</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Discipline Incidents</strong></td>
                                                <td>12</td>
                                                <td>18</td>
                                                <td class="text-success">-33%</td>
                                                <td><i class="bx bx-trending-down text-success"></i></td>
                                                <td><span class="badge bg-warning">Medium</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Student Enrollment</strong></td>
                                                <td>502</td>
                                                <td>485</td>
                                                <td class="text-success">+3.5%</td>
                                                <td><i class="bx bx-trending-up text-success"></i></td>
                                                <td><span class="badge bg-success">High</span></td>
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
                                <h6 class="mb-0">Anomaly Detection</h6>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewFullAnomalies()">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Metric</th>
                                                <th>Expected</th>
                                                <th>Actual</th>
                                                <th>Deviation</th>
                                                <th>Severity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ date('Y-m-d', strtotime('-2 weeks')) }}</td>
                                                <td>Attendance</td>
                                                <td>89.2%</td>
                                                <td>75.3%</td>
                                                <td class="text-danger">-13.9%</td>
                                                <td><span class="badge bg-danger">High</span></td>
                                            </tr>
                                            <tr>
                                                <td>{{ date('Y-m-d', strtotime('-1 month')) }}</td>
                                                <td>Performance</td>
                                                <td>85.6%</td>
                                                <td>92.1%</td>
                                                <td class="text-success">+6.5%</td>
                                                <td><span class="badge bg-warning">Medium</span></td>
                                            </tr>
                                            <tr>
                                                <td>{{ date('Y-m-d', strtotime('-3 months')) }}</td>
                                                <td>Discipline</td>
                                                <td>12</td>
                                                <td>28</td>
                                                <td class="text-danger">+133%</td>
                                                <td><span class="badge bg-danger">High</span></td>
                                            </tr>
                                            <tr>
                                                <td>{{ date('Y-m-d', strtotime('-6 months')) }}</td>
                                                <td>Enrollment</td>
                                                <td>502</td>
                                                <td>545</td>
                                                <td class="text-success">+8.6%</td>
                                                <td><span class="badge bg-info">Low</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Key Insights -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Key Insights & Recommendations</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h6 class="text-primary"><i class="bx bx-trending-up me-2"></i>Positive Trends</h6>
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">Academic performance showing consistent improvement</li>
                                                    <li class="mb-2">Student enrollment steadily increasing</li>
                                                    <li class="mb-2">Discipline incidents declining significantly</li>
                                                    <li class="mb-2">Parent engagement improving</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h6 class="text-warning"><i class="bx bx-error me-2"></i>Areas of Concern</h6>
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">Attendance dip during exam periods</li>
                                                    <li class="mb-2">Mathematics performance plateauing</li>
                                                    <li class="mb-2">Staff turnover increasing</li>
                                                    <li class="mb-2">Resource utilization below optimal</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h6 class="text-info"><i class="bx bx-bullseye me-2"></i>Recommendations</h6>
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">Implement attendance incentives</li>
                                                    <li class="mb-2">Review mathematics curriculum</li>
                                                    <li class="mb-2">Staff retention program</li>
                                                    <li class="mb-2">Resource optimization plan</li>
                                                </ul>
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
</div>

<!-- Forecast Modal -->
<div class="modal fade" id="forecastModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Trend Forecasting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="forecastMetric" class="form-label">Forecast Metric</label>
                            <select class="form-select" id="forecastMetric">
                                <option value="performance">Academic Performance</option>
                                <option value="attendance">Attendance Rate</option>
                                <option value="enrollment">Student Enrollment</option>
                                <option value="discipline">Discipline Incidents</option>
                                <option value="revenue">Financial Revenue</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="forecastPeriod" class="form-label">Forecast Period</label>
                            <select class="form-select" id="forecastPeriod">
                                <option value="1month">Next Month</option>
                                <option value="3months">Next 3 Months</option>
                                <option value="6months">Next 6 Months</option>
                                <option value="1year">Next Year</option>
                                <option value="custom">Custom Period</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="forecastMethod" class="form-label">Forecasting Method</label>
                            <select class="form-select" id="forecastMethod">
                                <option value="linear">Linear Regression</option>
                                <option value="exponential">Exponential Smoothing</option>
                                <option value="arima">ARIMA</option>
                                <option value="neural">Neural Network</option>
                                <option value="ensemble">Ensemble Method</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="confidenceLevel" class="form-label">Confidence Level</label>
                            <select class="form-select" id="confidenceLevel">
                                <option value="90">90%</option>
                                <option value="95" selected>95%</option>
                                <option value="99">99%</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeSeasonality" checked>
                            <label class="form-check-label" for="includeSeasonality">
                                Include seasonal adjustments
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeHolidays" checked>
                            <label class="form-check-label" for="includeHolidays">
                                Account for holidays and breaks
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeExternal">
                            <label class="form-check-label" for="includeExternal">
                                Include external factors
                            </label>
                        </div>
                    </div>
                </form>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Forecast Results</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="forecastChart" width="700" height="300"></canvas>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Forecast Summary</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Period</th>
                                            <th>Forecast</th>
                                            <th>Lower Bound</th>
                                            <th>Upper Bound</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Next Month</td>
                                            <td>87.2%</td>
                                            <td>85.8%</td>
                                            <td>88.6%</td>
                                        </tr>
                                        <tr>
                                            <td>Next 3 Months</td>
                                            <td>88.5%</td>
                                            <td>86.2%</td>
                                            <td>90.8%</td>
                                        </tr>
                                        <tr>
                                            <td>Next 6 Months</td>
                                            <td>89.8%</td>
                                            <td>87.1%</td>
                                            <td>92.5%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Model Accuracy</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-success">92.3%</h4>
                                            <small class="text-muted">Accuracy Score</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h4 class="text-primary">0.08</h4>
                                            <small class="text-muted">RMSE</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6>Model Performance</h6>
                                    <div class="progress mb-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" style="width: 92.3%">Accuracy: 92.3%</div>
                                    </div>
                                    <div class="progress mb-2" style="height: 20px;">
                                        <div class="progress-bar bg-primary" style="width: 88%">Precision: 88%</div>
                                    </div>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-info" style="width: 95%">Recall: 95%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="runForecast()">Generate Forecast</button>
            </div>
        </div>
    </div>
</div>

<!-- Compare Trends Modal -->
<div class="modal fade" id="compareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Compare Trends</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="trend1" class="form-label">Trend 1</label>
                            <select class="form-select" id="trend1">
                                <option value="performance">Academic Performance</option>
                                <option value="attendance">Attendance Rate</option>
                                <option value="enrollment">Student Enrollment</option>
                                <option value="discipline">Discipline Incidents</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="trend2" class="form-label">Trend 2</label>
                            <select class="form-select" id="trend2">
                                <option value="performance">Academic Performance</option>
                                <option value="attendance">Attendance Rate</option>
                                <option value="enrollment">Student Enrollment</option>
                                <option value="discipline">Discipline Incidents</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="compareTimeframe" class="form-label">Timeframe</label>
                            <select class="form-select" id="compareTimeframe">
                                <option value="6months">Last 6 Months</option>
                                <option value="1year">Last Year</option>
                                <option value="2years">Last 2 Years</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="correlationMethod" class="form-label">Correlation Method</label>
                            <select class="form-select" id="correlationMethod">
                                <option value="pearson">Pearson Correlation</option>
                                <option value="spearman">Spearman Correlation</option>
                                <option value="kendall">Kendall Tau</option>
                            </select>
                        </div>
                    </div>
                </form>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Trend Comparison</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="trendComparisonChart" width="700" height="300"></canvas>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Correlation Analysis</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="text-primary">0.73</h4>
                                    <small class="text-muted">Correlation Coefficient</small>
                                </div>
                                <div class="mt-3">
                                    <h6>Interpretation</h6>
                                    <p class="text-muted">Strong positive correlation between the two trends. Changes in one trend are likely to affect the other.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Lag Analysis</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="text-info">2 weeks</h4>
                                    <small class="text-muted">Optimal Lag Period</small>
                                </div>
                                <div class="mt-3">
                                    <h6>Insight</h6>
                                    <p class="text-muted">Trend 2 typically follows Trend 1 by approximately 2 weeks.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="compareTrends()">Compare Trends</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Trends Analysis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportType" class="form-label">Export Type</label>
                        <select class="form-select" id="exportType">
                            <option value="summary">Trend Summary</option>
                            <option value="detailed">Detailed Analysis</option>
                            <option value="charts">Charts Only</option>
                            <option value="data">Raw Data</option>
                            <option value="forecast">Forecast Data</option>
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
                                <option value="current">Current Period</option>
                                <option value="historical">Historical Data</option>
                                <option value="forecast">Forecast Data</option>
                                <option value="all">All Data</option>
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
                            <input class="form-check-input" type="checkbox" id="includeInsights" checked>
                            <label class="form-check-label" for="includeInsights">
                                Include insights and recommendations
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeAnomalies" checked>
                            <label class="form-check-label" for="includeAnomalies">
                                Include anomaly detection results
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeForecast">
                            <label class="form-check-label" for="includeForecast">
                                Include forecast data
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportTrends()">Export Trends</button>
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
    // Multi-Dimensional Trend Chart
    const multiCtx = document.getElementById('multiTrendChart').getContext('2d');
    new Chart(multiCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Performance',
                data: [82, 83, 84, 85, 86, 85, 87, 86, 88, 87, 86, 85.6],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
            }, {
                label: 'Attendance',
                data: [88, 87, 89, 90, 91, 89, 92, 90, 93, 91, 90, 89.2],
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                tension: 0.1
            }, {
                label: 'Enrollment',
                data: [485, 488, 490, 492, 495, 498, 500, 502, 502, 502, 502, 502],
                borderColor: 'rgb(255, 205, 86)',
                backgroundColor: 'rgba(255, 205, 86, 0.2)',
                tension: 0.1
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
    
    // Academic Trend Chart
    const academicCtx = document.getElementById('academicTrendChart').getContext('2d');
    new Chart(academicCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Class 1A',
                data: [80, 82, 81, 83, 85, 84, 86, 85, 87, 86, 85, 85.8],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }, {
                label: 'Class 1B',
                data: [82, 84, 83, 85, 87, 86, 88, 87, 89, 88, 87, 87.2],
                borderColor: 'rgb(54, 162, 235)',
                tension: 0.1
            }, {
                label: 'Class 2A',
                data: [85, 87, 86, 88, 90, 89, 91, 90, 92, 91, 90, 89.5],
                borderColor: 'rgb(255, 205, 86)',
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
    
    // Attendance Trend Chart
    const attendanceCtx = document.getElementById('attendanceTrendChart').getContext('2d');
    new Chart(attendanceCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Present',
                data: [440, 438, 445, 450, 455, 445, 460, 450, 465, 455, 450, 448],
                backgroundColor: 'rgba(75, 192, 192, 0.8)'
            }, {
                label: 'Absent',
                data: [62, 64, 57, 52, 47, 57, 42, 52, 37, 47, 52, 54],
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
    
    // Seasonal Chart
    const seasonalCtx = document.getElementById('seasonalChart').getContext('2d');
    new Chart(seasonalCtx, {
        type: 'radar',
        data: {
            labels: ['Q1', 'Q2', 'Q3', 'Q4'],
            datasets: [{
                label: 'Current Year',
                data: [85, 88, 90, 86],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)'
            }, {
                label: 'Previous Year',
                data: [82, 85, 87, 84],
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
    
    // Growth Rate Chart
    const growthCtx = document.getElementById('growthRateChart').getContext('2d');
    new Chart(growthCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Growth Rate (%)',
                data: [2.1, 3.2, 2.8, 4.5, 3.8, 5.2],
                backgroundColor: 'rgba(54, 162, 235, 0.8)'
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
}

function runForecast() {
    const forecastMetric = document.getElementById('forecastMetric').value;
    const forecastPeriod = document.getElementById('forecastPeriod').value;
    
    // Initialize forecast chart
    const forecastCtx = document.getElementById('forecastChart').getContext('2d');
    new Chart(forecastCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan+1', 'Feb+1', 'Mar+1'],
            datasets: [{
                label: 'Historical Data',
                data: [82, 83, 84, 85, 86, 85, 87, 86, 88, 87, 86, 85.6, null, null, null],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
            }, {
                label: 'Forecast',
                data: [null, null, null, null, null, null, null, null, null, null, null, 85.6, 87.2, 88.5, 89.8],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderDash: [5, 5],
                tension: 0.1
            }, {
                label: 'Upper Bound',
                data: [null, null, null, null, null, null, null, null, null, null, null, null, 88.6, 90.8, 92.5],
                borderColor: 'rgba(255, 99, 132, 0.3)',
                borderDash: [3, 3],
                fill: '+1'
            }, {
                label: 'Lower Bound',
                data: [null, null, null, null, null, null, null, null, null, null, null, null, 85.8, 86.2, 87.1],
                borderColor: 'rgba(255, 99, 132, 0.3)',
                borderDash: [3, 3],
                fill: '-1'
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
    
    alert('Forecast generated successfully!');
}

function compareTrends() {
    const trend1 = document.getElementById('trend1').value;
    const trend2 = document.getElementById('trend2').value;
    
    // Initialize comparison chart
    const comparisonCtx = document.getElementById('trendComparisonChart').getContext('2d');
    new Chart(comparisonCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: trend1,
                data: [82, 83, 84, 85, 86, 85, 87, 86, 88, 87, 86, 85.6],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                yAxisID: 'y'
            }, {
                label: trend2,
                data: [88, 87, 89, 90, 91, 89, 92, 90, 93, 91, 90, 89.2],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                yAxisID: 'y1'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    beginAtZero: true,
                    max: 100
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    beginAtZero: true,
                    max: 100,
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });
    
    alert('Trend comparison completed successfully!');
}

function exportTrends() {
    const exportType = document.getElementById('exportType').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportType} in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
}

function viewFullTrendSummary() {
    alert('Opening detailed trend summary view...');
}

function viewFullAnomalies() {
    alert('Opening detailed anomaly detection view...');
}
</script>
@endsection
