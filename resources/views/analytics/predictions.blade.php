@extends('layouts.app')

@section('title', 'Predictions')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Predictive Analytics</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#trainModal">
                        <i class="bx bx-cog me-1"></i> Train Model
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scenarioModal">
                        <i class="bx bx-test-tube me-1"></i> Scenarios
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Prediction Overview -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">92.3%</h4>
                                        <p class="mb-0">Model Accuracy</p>
                                        <small class="text-muted">High confidence</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-brain avatar-icon"></i>
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
                                        <h4 class="mb-0">87.5%</h4>
                                        <p class="mb-0">Predicted Pass Rate</p>
                                        <small class="text-muted">Next term</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-chart avatar-icon"></i>
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
                                        <h4 class="mb-0">23</h4>
                                        <p class="mb-0">At Risk Students</p>
                                        <small class="text-muted">Identified</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-error avatar-icon"></i>
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
                                        <h4 class="mb-0">518</h4>
                                        <p class="mb-0">Enrollment Forecast</p>
                                        <small class="text-muted">Next year</small>
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
                        <label for="predictionType" class="form-label">Prediction Type</label>
                        <select class="form-select" id="predictionType">
                            <option value="all">All Predictions</option>
                            <option value="academic">Academic Performance</option>
                            <option value="attendance">Attendance</option>
                            <option value="behavioral">Behavioral</option>
                            <option value="enrollment">Enrollment</option>
                            <option value="financial">Financial</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="modelType" class="form-label">Model Type</label>
                        <select class="form-select" id="modelType">
                            <option value="neural">Neural Network</option>
                            <option value="random_forest">Random Forest</option>
                            <option value="svm">Support Vector Machine</option>
                            <option value="linear">Linear Regression</option>
                            <option value="ensemble">Ensemble Model</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="timeHorizon" class="form-label">Time Horizon</label>
                        <select class="form-select" id="timeHorizon">
                            <option value="1month">1 Month</option>
                            <option value="3months">3 Months</option>
                            <option value="6months">6 Months</option>
                            <option value="1year">1 Year</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="confidence" class="form-label">Confidence Level</label>
                        <select class="form-select" id="confidence">
                            <option value="90">90%</option>
                            <option value="95">95%</option>
                            <option value="99">99%</option>
                            <option value="all">All Levels</option>
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

                <!-- Prediction Charts -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Academic Performance Predictions</h6>
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
                                <canvas id="academicPredictionChart" width="400" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Model Performance</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="modelPerformanceChart" width="200" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Risk Assessment -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Student Risk Assessment</h6>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewFullRiskAssessment()">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Student</th>
                                                <th>Risk Level</th>
                                                <th>Probability</th>
                                                <th>Factors</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold">John Smith</div>
                                                            <small class="text-muted">STU001</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-danger">High</span></td>
                                                <td>87%</td>
                                                <td>
                                                    <span class="badge bg-warning">Attendance</span>
                                                    <span class="badge bg-danger">Performance</span>
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
                                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold>Sarah Johnson</div>
                                                            <small class="text-muted">STU002</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-warning">Medium</span></td>
                                                <td>65%</td>
                                                <td>
                                                    <span class="badge bg-info">Behavior</span>
                                                    <span class="badge bg-warning">Performance</span>
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
                                                        <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold>Michael Brown</div>
                                                            <small class="text-muted">STU003</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-warning">Medium</span></td>
                                                <td>58%</td>
                                                <td>
                                                    <span class="badge bg-warning">Attendance</span>
                                                    <span class="badge bg-info">Social</span>
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
                                                        <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle me-2" style="width: 25px; height: 25px;">
                                                        <div>
                                                            <div class="fw-bold>Emily Davis</div>
                                                            <small class="text-muted">STU004</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">Low</span></td>
                                                <td>23%</td>
                                                <td>
                                                    <span class="badge bg-success">All Good</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewStudentDetails('STU004')">
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Enrollment Forecast</h6>
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
                                <canvas id="enrollmentForecastChart" width="400" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature Importance -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Feature Importance Analysis</h6>
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
                                <canvas id="featureImportanceChart" width="800" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prediction Summary -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Prediction Accuracy Summary</h6>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewFullAccuracy()">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Prediction Type</th>
                                                <th>Accuracy</th>
                                                <th>Precision</th>
                                                <th>Recall</th>
                                                <th>F1 Score</th>
                                                <th>Model</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Academic Performance</strong></td>
                                                <td>92.3%</td>
                                                <td>91.8%</td>
                                                <td>92.7%</td>
                                                <td>92.2%</td>
                                                <td><span class="badge bg-primary">Neural Net</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Attendance</strong></td>
                                                <td>89.5%</td>
                                                <td>88.2%</td>
                                                <td>90.1%</td>
                                                <td>89.1%</td>
                                                <td><span class="badge bg-success">Random Forest</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Behavioral</strong></td>
                                                <td>85.7%</td>
                                                <td>84.3%</td>
                                                <td>86.9%</td>
                                                <td>85.6%</td>
                                                <td><span class="badge bg-warning">SVM</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Enrollment</strong></td>
                                                <td>94.2%</td>
                                                <td>93.8%</td>
                                                <td>94.5%</td>
                                                <td>94.1%</td>
                                                <td><span class="badge bg-info">Ensemble</span></td>
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
                                <h6 class="mb-0">Model Comparison</h6>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewFullComparison()">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <canvas id="modelComparisonChart" width="400" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Key Insights -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Predictive Insights & Recommendations</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h6 class="text-primary"><i class="bx bx-bulb me-2"></i>Key Predictions</h6>
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">87.5% pass rate next term</li>
                                                    <li class="mb-2">518 students expected next year</li>
                                                    <li class="mb-2">23 high-risk students identified</li>
                                                    <li class="mb-2">3.2% enrollment growth projected</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h6 class="text-warning"><i class="bx bx-error me-2"></i>Risk Factors</h6>
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">Poor attendance (45% of cases)</li>
                                                    <li class="mb-2">Low prior performance (38% of cases)</li>
                                                    <li class="mb-2">Behavioral issues (22% of cases)</li>
                                                    <li class="mb-2">Socio-economic factors (15% of cases)</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h6 class="text-success"><i class="bx bx-check-circle me-2"></i>Recommendations</h6>
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">Early intervention for at-risk students</li>
                                                    <li class="mb-2">Attendance improvement programs</li>
                                                    <li class="mb-2">Personalized learning paths</li>
                                                    <li class="mb-2">Resource allocation based on forecasts</li>
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

<!-- Train Model Modal -->
<div class="modal fade" id="trainModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Train Prediction Model</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="modelAlgorithm" class="form-label">Algorithm</label>
                            <select class="form-select" id="modelAlgorithm">
                                <option value="neural">Neural Network</option>
                                <option value="random_forest">Random Forest</option>
                                <option value="svm">Support Vector Machine</option>
                                <option value="linear">Linear Regression</option>
                                <option value="gradient_boost">Gradient Boosting</option>
                                <option value="ensemble">Ensemble Model</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="predictionTarget" class="form-label">Prediction Target</label>
                            <select class="form-select" id="predictionTarget">
                                <option value="academic">Academic Performance</option>
                                <option value="attendance">Attendance</option>
                                <option value="behavioral">Behavioral</option>
                                <option value="enrollment">Enrollment</option>
                                <option value="dropout">Dropout Risk</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="trainingData" class="form-label">Training Data Period</label>
                            <select class="form-select" id="trainingData">
                                <option value="1year">Last 1 Year</option>
                                <option value="2years">Last 2 Years</option>
                                <option value="3years">Last 3 Years</option>
                                <option value="5years">Last 5 Years</option>
                                <option value="all">All Available Data</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationMethod" class="form-label">Validation Method</label>
                            <select class="form-select" id="validationMethod">
                                <option value="cross_validation">Cross Validation</option>
                                <option value="holdout">Holdout Validation</option>
                                <option value="time_series">Time Series Split</option>
                                <option value="bootstrap">Bootstrap</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="testSize" class="form-label">Test Size (%)</label>
                            <input type="number" class="form-control" id="testSize" min="10" max="50" value="20">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="crossValidation" class="form-label">Cross Validation Folds</label>
                            <input type="number" class="form-control" id="crossValidation" min="3" max="10" value="5">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="randomSeed" class="form-label">Random Seed</label>
                            <input type="number" class="form-control" id="randomSeed" value="42">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="features" class="form-label">Features to Include</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="featureAcademic" checked>
                            <label class="form-check-label" for="featureAcademic">
                                Academic Performance
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="featureAttendance" checked>
                            <label class="form-check-label" for="featureAttendance">
                                Attendance Records
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="featureBehavioral" checked>
                            <label class="form-check-label" for="featureBehavioral">
                                Behavioral Data
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="featureDemographic">
                            <label class="form-check-label" for="featureDemographic">
                                Demographic Information
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="featureSocioeconomic">
                            <label class="form-check-label" for="featureSocioeconomic">
                                Socio-economic Data
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="hyperparameters" class="form-label">Hyperparameters</label>
                        <textarea class="form-control" id="hyperparameters" rows="3" placeholder="Enter hyperparameters in JSON format...">{"learning_rate": 0.001, "epochs": 100, "batch_size": 32}</textarea>
                        <small class="text-muted">Leave empty to use default parameters</small>
                    </div>
                </form>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Training Progress</h6>
                    </div>
                    <div class="card-body">
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" id="trainingProgress" style="width: 0%">0%</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6 id="currentEpoch">0</h6>
                                    <small class="text-muted">Current Epoch</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6 id="trainingLoss">0.000</h6>
                                    <small class="text-muted">Training Loss</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6 id="validationLoss">0.000</h6>
                                    <small class="text-muted">Validation Loss</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6 id="timeRemaining">--:--</h6>
                                    <small class="text-muted">Time Remaining</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="startTraining()">Start Training</button>
            </div>
        </div>
    </div>
</div>

<!-- Scenario Modal -->
<div class="modal fade" id="scenarioModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">What-If Scenarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scenarioType" class="form-label">Scenario Type</label>
                            <select class="form-select" id="scenarioType">
                                <option value="attendance">Attendance Impact</option>
                                <option value="curriculum">Curriculum Changes</option>
                                <option value="resources">Resource Allocation</option>
                                <option value="policy">Policy Changes</option>
                                <option value="external">External Factors</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scenarioMetric" class="form-label">Impact Metric</label>
                            <select class="form-select" id="scenarioMetric">
                                <option value="performance">Academic Performance</option>
                                <option value="pass_rate">Pass Rate</option>
                                <option value="dropout">Dropout Rate</option>
                                <option value="enrollment">Enrollment</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="scenarioDescription" class="form-label">Scenario Description</label>
                        <textarea class="form-control" id="scenarioDescription" rows="2" placeholder="Describe the scenario...">What if attendance improves by 10% through incentive programs?</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="baselineValue" class="form-label">Baseline Value</label>
                            <input type="number" class="form-control" id="baselineValue" value="85.6" step="0.1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scenarioValue" class="form-label">Scenario Value</label>
                            <input type="number" class="form-control" id="scenarioValue" value="94.2" step="0.1">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="timeHorizon" class="form-label">Time Horizon</label>
                        <select class="form-select" id="timeHorizon">
                            <option value="1month">1 Month</option>
                            <option value="3months">3 Months</option>
                            <option value="6months">6 Months</option>
                            <option value="1year">1 Year</option>
                        </select>
                    </div>
                </form>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Scenario Analysis Results</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="scenarioChart" width="700" height="300"></canvas>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Impact Summary</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="text-success">+8.6%</h4>
                                    <small class="text-muted">Performance Improvement</small>
                                </div>
                                <div class="mt-3">
                                    <h6>Key Insights</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">10% attendance increase leads to 8.6% performance gain</li>
                                        <li class="mb-2">Effect is more pronounced in lower grades</li>
                                        <li class="mb-2">Diminishing returns after 15% improvement</li>
                                    </ul>
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
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Implement attendance incentive program</li>
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Focus on early grade interventions</li>
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Monitor program effectiveness</li>
                                    <li class="mb-2"><i class="bx bx-check text-success me-2"></i>Adjust strategies based on results</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="runScenario()">Run Scenario</button>
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
                        <label for="riskLevel" class="form-label">Risk Level</label>
                        <input type="text" class="form-control" id="riskLevel" value="High - 87% probability" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="interventionStrategy" class="form-label">Intervention Strategy</label>
                        <select class="form-select" id="interventionStrategy">
                            <option value="academic">Academic Support</option>
                            <option value="behavioral">Behavioral Support</option>
                            <option value="attendance">Attendance Improvement</option>
                            <option value="counseling">Counseling</option>
                            <option value="comprehensive">Comprehensive Support</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="interventionActions" class="form-label">Recommended Actions</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="action1" checked>
                            <label class="form-check-label" for="action1">
                                Weekly academic tutoring sessions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="action2" checked>
                            <label class="form-check-label" for="action2">
                                Attendance monitoring and incentives
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="action3">
                            <label class="form-check-label" for="action3">
                                Parent-teacher conferences
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="action4">
                            <label class="form-check-label" for="action4">
                                Counseling sessions
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reviewDate" class="form-label">Review Date</label>
                            <input type="date" class="form-control" id="reviewDate" value="{{ date('Y-m-d', strtotime('+1 month')) }}">
                        </div>
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
                <h5 class="modal-title">Export Predictions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportType" class="form-label">Export Type</label>
                        <select class="form-select" id="exportType">
                            <option value="predictions">Predictions Only</option>
                            <option value="risk_assessment">Risk Assessment</option>
                            <option value="model_performance">Model Performance</option>
                            <option value="feature_importance">Feature Importance</option>
                            <option value="comprehensive">Comprehensive Report</option>
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
                            <label for="exportPeriod" class="form-label">Prediction Period</label>
                            <select class="form-select" id="exportPeriod">
                                <option value="next_month">Next Month</option>
                                <option value="next_quarter">Next Quarter</option>
                                <option value="next_year">Next Year</option>
                                <option value="all">All Periods</option>
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
                            <input class="form-check-input" type="checkbox" id="includeConfidence" checked>
                            <label class="form-check-label" for="includeConfidence">
                                Include confidence intervals
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeRiskFactors" checked>
                            <label class="form-check-label" for="includeRiskFactors">
                                Include risk factors analysis
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeRecommendations" checked>
                            <label class="form-check-label" for="includeRecommendations">
                                Include recommendations
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportPredictions()">Export Predictions</button>
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
    // Academic Prediction Chart
    const academicCtx = document.getElementById('academicPredictionChart').getContext('2d');
    new Chart(academicCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan+1', 'Feb+1', 'Mar+1'],
            datasets: [{
                label: 'Historical Performance',
                data: [82, 83, 84, 85, 86, 85, 87, 86, 88, 87, 86, 85.6, null, null, null],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
            }, {
                label: 'Predicted Performance',
                data: [null, null, null, null, null, null, null, null, null, null, null, 85.6, 86.8, 87.5, 88.2],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderDash: [5, 5],
                tension: 0.1
            }, {
                label: 'Confidence Interval',
                data: [null, null, null, null, null, null, null, null, null, null, null, null, 85.2, 85.9, 86.5, 87.2, 87.9, 88.8],
                borderColor: 'rgba(255, 99, 132, 0.3)',
                backgroundColor: 'rgba(255, 99, 132, 0.1)',
                borderDash: [3, 3],
                fill: true,
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
    
    // Model Performance Chart
    const performanceCtx = document.getElementById('modelPerformanceChart').getContext('2d');
    new Chart(performanceCtx, {
        type: 'radar',
        data: {
            labels: ['Accuracy', 'Precision', 'Recall', 'F1 Score', 'AUC-ROC'],
            datasets: [{
                label: 'Current Model',
                data: [92.3, 91.8, 92.7, 92.2, 93.1],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)'
            }, {
                label: 'Previous Model',
                data: [89.5, 88.2, 90.1, 89.1, 90.3],
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
    
    // Enrollment Forecast Chart
    const enrollmentCtx = document.getElementById('enrollmentForecastChart').getContext('2d');
    new Chart(enrollmentCtx, {
        type: 'bar',
        data: {
            labels: ['2022', '2023', '2024', '2025(P)', '2026(P)', '2027(P)'],
            datasets: [{
                label: 'Actual Enrollment',
                data: [485, 492, 502, null, null, null],
                backgroundColor: 'rgba(75, 192, 192, 0.8)'
            }, {
                label: 'Predicted Enrollment',
                data: [null, null, 502, 518, 534, 551],
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
    
    // Feature Importance Chart
    const featureCtx = document.getElementById('featureImportanceChart').getContext('2d');
    new Chart(featureCtx, {
        type: 'bar',
        data: {
            labels: ['Prior Performance', 'Attendance Rate', 'Behavior Score', 'Study Time', 'Parent Involvement', 'Socio-economic', 'Teacher Rating', 'Class Size'],
            datasets: [{
                label: 'Feature Importance',
                data: [0.35, 0.28, 0.15, 0.08, 0.05, 0.04, 0.03, 0.02],
                backgroundColor: 'rgba(54, 162, 235, 0.8)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 0.4
                }
            }
        }
    });
    
    // Model Comparison Chart
    const comparisonCtx = document.getElementById('modelComparisonChart').getContext('2d');
    new Chart(comparisonCtx, {
        type: 'bar',
        data: {
            labels: ['Neural Network', 'Random Forest', 'SVM', 'Linear Regression', 'Ensemble'],
            datasets: [{
                label: 'Accuracy',
                data: [92.3, 89.5, 85.7, 82.1, 94.2],
                backgroundColor: 'rgba(75, 192, 192, 0.8)'
            }, {
                label: 'Training Time (min)',
                data: [45, 12, 8, 2, 68],
                backgroundColor: 'rgba(255, 99, 132, 0.8)',
                yAxisID: 'y1'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    position: 'left'
                },
                y1: {
                    beginAtZero: true,
                    position: 'right',
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });
}

function startTraining() {
    let progress = 0;
    const progressBar = document.getElementById('trainingProgress');
    const currentEpoch = document.getElementById('currentEpoch');
    const trainingLoss = document.getElementById('trainingLoss');
    const validationLoss = document.getElementById('validationLoss');
    
    const interval = setInterval(() => {
        progress += 5;
        progressBar.style.width = progress + '%';
        progressBar.textContent = progress + '%';
        
        currentEpoch.textContent = Math.floor(progress / 5);
        trainingLoss.textContent = (1 - progress / 100).toFixed(3);
        validationLoss.textContent = (1.1 - progress / 100).toFixed(3);
        
        if (progress >= 100) {
            clearInterval(interval);
            alert('Model training completed successfully!');
        }
    }, 500);
}

function runScenario() {
    const scenarioType = document.getElementById('scenarioType').value;
    const scenarioValue = document.getElementById('scenarioValue').value;
    
    // Initialize scenario chart
    const scenarioCtx = document.getElementById('scenarioChart').getContext('2d');
    new Chart(scenarioCtx, {
        type: 'line',
        data: {
            labels: ['Current', 'Month 1', 'Month 2', 'Month 3', 'Month 4', 'Month 5', 'Month 6'],
            datasets: [{
                label: 'Baseline Scenario',
                data: [85.6, 86.2, 86.8, 87.4, 88.0, 88.6, 89.2],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
            }, {
                label: 'Scenario Impact',
                data: [85.6, 87.8, 89.5, 91.2, 92.8, 94.2, 95.5],
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
    
    alert('Scenario analysis completed successfully!');
}

function createIntervention() {
    const studentName = document.getElementById('studentName').value;
    alert(`Intervention plan created for ${studentName}`);
    document.getElementById('interventionModal').querySelector('.btn-close').click();
}

function exportPredictions() {
    const exportType = document.getElementById('exportType').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportType} in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
}

function viewFullRiskAssessment() {
    alert('Opening detailed risk assessment view...');
}

function viewStudentDetails(studentId) {
    alert(`Opening detailed view for student ${studentId}...`);
}

function viewFullAccuracy() {
    alert('Opening detailed accuracy analysis...');
}

function viewFullComparison() {
    alert('Opening detailed model comparison...');
}
</script>
@endsection
