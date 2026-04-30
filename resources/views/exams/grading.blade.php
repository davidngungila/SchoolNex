@extends('layouts.app')

@section('title', 'Grading System')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Grading System Management</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createGradeModal">
                        <i class="bx bx-plus me-1"></i> Create Grade Scale
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bx bx-upload me-1"></i> Import
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Grading Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">5</h4>
                                        <p class="mb-0">Grade Scales</p>
                                        <small class="text-muted">Active systems</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-bar-chart avatar-icon"></i>
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
                                        <h4 class="mb-0">A-F</h4>
                                        <p class="mb-0">Standard Scale</p>
                                        <small class="text-muted">Currently active</small>
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
                                        <h4 class="mb-0">40%</h4>
                                        <p class="mb-0">Pass Mark</p>
                                        <small class="text-muted">Minimum passing</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-target-lock avatar-icon"></i>
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
                                        <h4 class="mb-0">85%</h4>
                                        <p class="mb-0">Distinction</p>
                                        <small class="text-muted">Excellence threshold</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-award avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Grade Scale -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Current Grade Scale: Standard A-F System</h6>
                        <div>
                            <span class="badge bg-success">Active</span>
                            <button type="button" class="btn btn-sm btn-outline-primary ms-2" data-bs-toggle="modal" data-bs-target="#editScaleModal">
                                <i class="bx bx-edit"></i> Edit
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Grade</th>
                                        <th>Percentage Range</th>
                                        <th>Grade Points</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="badge bg-success fs-6">A</span></td>
                                        <td>85% - 100%</td>
                                        <td>4.0</td>
                                        <td>Excellent</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">
                                                <i class="bx bx-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-info fs-6">B</span></td>
                                        <td>70% - 84%</td>
                                        <td>3.0</td>
                                        <td>Good</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">
                                                <i class="bx bx-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-primary fs-6">C</span></td>
                                        <td>55% - 69%</td>
                                        <td>2.0</td>
                                        <td>Average</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">
                                                <i class="bx bx-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-warning fs-6">D</span></td>
                                        <td>40% - 54%</td>
                                        <td>1.0</td>
                                        <td>Pass</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">
                                                <i class="bx bx-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-danger fs-6">F</span></td>
                                        <td>0% - 39%</td>
                                        <td>0.0</td>
                                        <td>Fail</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">
                                                <i class="bx bx-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Alternative Grade Scales -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Alternative Grade Scales</h6>
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createScaleModal">
                            <i class="bx bx-plus"></i> Add Scale
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">GPA Scale (4.0)</h6>
                                        <span class="badge bg-secondary">Inactive</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Grade</th>
                                                        <th>Range</th>
                                                        <th>Points</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>A+</td>
                                                        <td>97-100</td>
                                                        <td>4.0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>A</td>
                                                        <td>93-96</td>
                                                        <td>4.0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>A-</td>
                                                        <td>90-92</td>
                                                        <td>3.7</td>
                                                    </tr>
                                                    <tr>
                                                        <td>B+</td>
                                                        <td>87-89</td>
                                                        <td>3.3</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex gap-2 mt-2">
                                            <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-success">Activate</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">Descriptive Scale</h6>
                                        <span class="badge bg-secondary">Inactive</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Grade</th>
                                                        <th>Range</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Outstanding</td>
                                                        <td>90-100</td>
                                                        <td>Exceptional</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Excellent</td>
                                                        <td>80-89</td>
                                                        <td>Very Good</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Good</td>
                                                        <td>70-79</td>
                                                        <td>Above Average</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Satisfactory</td>
                                                        <td>60-69</td>
                                                        <td>Average</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex gap-2 mt-2">
                                            <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-success">Activate</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grading Rules -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Grading Rules & Policies</h6>
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#rulesModal">
                            <i class="bx bx-cog"></i> Configure
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>General Rules</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="bx bx-check text-success me-2"></i>
                                        Minimum passing grade: D (40%)
                                    </li>
                                    <li class="mb-2">
                                        <i class="bx bx-check text-success me-2"></i>
                                        Distinction grade: A (85% and above)
                                    </li>
                                    <li class="mb-2">
                                        <i class="bx bx-check text-success me-2"></i>
                                        Grade rounding: Standard rounding rules
                                    </li>
                                    <li class="mb-2">
                                        <i class="bx bx-check text-success me-2"></i>
                                        Absent students marked as 'Absent'
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Special Cases</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="bx bx-info-circle text-info me-2"></i>
                                        Medical leave: Grade based on average
                                    </li>
                                    <li class="mb-2">
                                        <i class="bx bx-info-circle text-info me-2"></i>
                                        Late submission: 5% deduction per day
                                    </li>
                                    <li class="mb-2">
                                        <i class="bx bx-info-circle text-info me-2"></i>
                                        Re-examination: Maximum grade C
                                    </li>
                                    <li class="mb-2">
                                        <i class="bx bx-info-circle text-info me-2"></i>
                                        Cheating: Automatic F grade
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grade Distribution Analysis -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Grade Distribution Analysis</h6>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="bx bx-download"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Export as PNG</a></li>
                                <li><a class="dropdown-item" href="#">Export as PDF</a></li>
                                <li><a class="dropdown-item" href="#">Export as Excel</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <canvas id="gradeChart" width="400" height="200"></canvas>
                            </div>
                            <div class="col-md-4">
                                <h6>Summary Statistics</h6>
                                <table class="table table-sm">
                                    <tr>
                                        <td><strong>Total Students:</strong></td>
                                        <td>245</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Average Grade:</strong></td>
                                        <td>B+</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pass Rate:</strong></td>
                                        <td>89.8%</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Distinction Rate:</strong></td>
                                        <td>23.7%</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Fail Rate:</strong></td>
                                        <td>10.2%</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Grade Scale Modal -->
<div class="modal fade" id="createGradeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Grade Scale</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scaleName" class="form-label">Scale Name *</label>
                            <input type="text" class="form-control" id="scaleName" placeholder="e.g., Standard A-F System" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scaleType" class="form-label">Scale Type *</label>
                            <select class="form-select" id="scaleType" required>
                                <option value="">Select Type</option>
                                <option value="letter">Letter Grades</option>
                                <option value="gpa">GPA Scale</option>
                                <option value="descriptive">Descriptive</option>
                                <option value="percentage">Percentage Only</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="passingGrade" class="form-label">Passing Grade *</label>
                            <input type="text" class="form-control" id="passingGrade" placeholder="e.g., D" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="passingPercentage" class="form-label">Passing Percentage *</label>
                            <input type="number" class="form-control" id="passingPercentage" value="40" min="0" max="100" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="scaleDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="scaleDescription" rows="2" placeholder="Describe the grade scale..."></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <h6>Grade Definitions</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="gradeTable">
                                <thead>
                                    <tr>
                                        <th>Grade</th>
                                        <th>Min %</th>
                                        <th>Max %</th>
                                        <th>Points</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-sm" value="A"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="85" min="0" max="100"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="100" min="0" max="100"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="4.0" step="0.1"></td>
                                        <td><input type="text" class="form-control form-control-sm" value="Excellent"></td>
                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeGradeRow(this)"><i class="bx bx-trash"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-sm" value="B"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="70" min="0" max="100"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="84" min="0" max="100"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="3.0" step="0.1"></td>
                                        <td><input type="text" class="form-control form-control-sm" value="Good"></td>
                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeGradeRow(this)"><i class="bx bx-trash"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-sm" value="C"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="55" min="0" max="100"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="69" min="0" max="100"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="2.0" step="0.1"></td>
                                        <td><input type="text" class="form-control form-control-sm" value="Average"></td>
                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeGradeRow(this)"><i class="bx bx-trash"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-sm" value="D"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="40" min="0" max="100"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="54" min="0" max="100"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="1.0" step="0.1"></td>
                                        <td><input type="text" class="form-control form-control-sm" value="Pass"></td>
                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeGradeRow(this)"><i class="bx bx-trash"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-sm" value="F"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="0" min="0" max="100"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="39" min="0" max="100"></td>
                                        <td><input type="number" class="form-control form-control-sm" value="0.0" step="0.1"></td>
                                        <td><input type="text" class="form-control form-control-sm" value="Fail"></td>
                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeGradeRow(this)"><i class="bx bx-trash"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addGradeRow()">
                            <i class="bx bx-plus me-1"></i> Add Grade
                        </button>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="roundingEnabled" checked>
                            <label class="form-check-label" for="roundingEnabled">Enable grade rounding</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="decimalPoints">
                            <label class="form-check-label" for="decimalPoints">Allow decimal points in grades</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="autoCalculate" checked>
                            <label class="form-check-label" for="autoCalculate">Auto-calculate grades from percentages</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createGradeScale()">Create Scale</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Grade Modal -->
<div class="modal fade" id="editGradeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="gradeLetter" class="form-label">Grade Letter *</label>
                        <input type="text" class="form-control" id="gradeLetter" value="A" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="minPercentage" class="form-label">Minimum Percentage *</label>
                            <input type="number" class="form-control" id="minPercentage" value="85" min="0" max="100" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="maxPercentage" class="form-label">Maximum Percentage *</label>
                            <input type="number" class="form-control" id="maxPercentage" value="100" min="0" max="100" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gradePoints" class="form-label">Grade Points</label>
                            <input type="number" class="form-control" id="gradePoints" value="4.0" step="0.1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gradeColor" class="form-label">Grade Color</label>
                            <input type="color" class="form-control" id="gradeColor" value="#28a745">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="gradeDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="gradeDescription" rows="2">Excellent performance</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="passingGrade" checked>
                            <label class="form-check-label" for="passingGrade">Consider as passing grade</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="distinctionGrade" checked>
                            <label class="form-check-label" for="distinctionGrade">Consider as distinction grade</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateGrade()">Update Grade</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Grade Scale</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportScale" class="form-label">Select Grade Scale</label>
                        <select class="form-select" id="exportScale">
                            <option value="current">Current Active Scale</option>
                            <option value="all">All Grade Scales</option>
                            <option value="standard">Standard A-F System</option>
                            <option value="gpa">GPA Scale (4.0)</option>
                            <option value="descriptive">Descriptive Scale</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportFormat" class="form-label">Export Format</label>
                        <select class="form-select" id="exportFormat">
                            <option value="csv">CSV</option>
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF</option>
                            <option value="json">JSON</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportEmail" class="form-label">Email Export</label>
                        <input type="email" class="form-control" id="exportEmail" placeholder="admin@school.com">
                        <small class="text-muted">Optional: Send export to email address</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeStatistics" checked>
                            <label class="form-check-label" for="includeStatistics">Include grade distribution statistics</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeRules" checked>
                            <label class="form-check-label" for="includeRules">Include grading rules</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportGradeScale()">Export Scale</button>
            </div>
        </div>
    </div>
</div>

<script>
// Initialize chart when page loads
document.addEventListener('DOMContentLoaded', function() {
    initializeGradeChart();
});

function initializeGradeChart() {
    const ctx = document.getElementById('gradeChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['A', 'B', 'C', 'D', 'F'],
            datasets: [{
                label: 'Number of Students',
                data: [58, 72, 65, 28, 22],
                backgroundColor: [
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(23, 162, 184, 0.8)',
                    'rgba(13, 110, 253, 0.8)',
                    'rgba(255, 193, 7, 0.8)',
                    'rgba(220, 53, 69, 0.8)'
                ],
                borderColor: [
                    'rgba(40, 167, 69, 1)',
                    'rgba(23, 162, 184, 1)',
                    'rgba(13, 110, 253, 1)',
                    'rgba(255, 193, 7, 1)',
                    'rgba(220, 53, 69, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Students'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Grades'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
}

function addGradeRow() {
    const table = document.getElementById('gradeTable').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();
    newRow.innerHTML = `
        <td><input type="text" class="form-control form-control-sm" placeholder="Grade"></td>
        <td><input type="number" class="form-control form-control-sm" placeholder="Min %" min="0" max="100"></td>
        <td><input type="number" class="form-control form-control-sm" placeholder="Max %" min="0" max="100"></td>
        <td><input type="number" class="form-control form-control-sm" placeholder="Points" step="0.1"></td>
        <td><input type="text" class="form-control form-control-sm" placeholder="Description"></td>
        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeGradeRow(this)"><i class="bx bx-trash"></i></button></td>
    `;
}

function removeGradeRow(button) {
    const row = button.closest('tr');
    row.remove();
}

function createGradeScale() {
    const scaleName = document.getElementById('scaleName').value;
    const scaleType = document.getElementById('scaleType').value;
    const passingPercentage = document.getElementById('passingPercentage').value;
    
    if (!scaleName || !scaleType) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert(`Creating grade scale: ${scaleName} (${scaleType})`);
    document.getElementById('createGradeModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Grade scale created successfully!');
        location.reload();
    }, 1500);
}

function updateGrade() {
    const gradeLetter = document.getElementById('gradeLetter').value;
    const minPercentage = document.getElementById('minPercentage').value;
    const maxPercentage = document.getElementById('maxPercentage').value;
    
    alert(`Updating grade ${gradeLetter}: ${minPercentage}% - ${maxPercentage}%`);
    document.getElementById('editGradeModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Grade updated successfully!');
        location.reload();
    }, 1500);
}

function exportGradeScale() {
    const exportScale = document.getElementById('exportScale').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportScale} in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Grade scale exported successfully!');
    }, 1500);
}
</script>
@endsection
