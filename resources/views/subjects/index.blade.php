@extends('layouts.app')

@section('title', 'Subjects Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Subjects Management</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
                    <i class="bx bx-plus me-1"></i> Add New Subject
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Department</th>
                                <th>Credits</th>
                                <th>Teacher</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>MTH101</td>
                                <td>Mathematics</td>
                                <td>Science</td>
                                <td>4</td>
                                <td>Mr. John Smith</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>ENG201</td>
                                <td>English Literature</td>
                                <td>Languages</td>
                                <td>3</td>
                                <td>Mrs. Sarah Johnson</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>PHY301</td>
                                <td>Physics</td>
                                <td>Science</td>
                                <td>4</td>
                                <td>Dr. Michael Brown</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>CHE201</td>
                                <td>Chemistry</td>
                                <td>Science</td>
                                <td>4</td>
                                <td>Mrs. Emily Davis</td>
                                <td><span class="badge bg-warning">Inactive</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>BIO101</td>
                                <td>Biology</td>
                                <td>Science</td>
                                <td>3</td>
                                <td>Dr. Robert Wilson</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>HIS301</td>
                                <td>History</td>
                                <td>Social Studies</td>
                                <td>2</td>
                                <td>Mr. James Anderson</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>GEO201</td>
                                <td>Geography</td>
                                <td>Social Studies</td>
                                <td>2</td>
                                <td>Mrs. Lisa Martinez</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>ART101</td>
                                <td>Fine Arts</td>
                                <td>Arts</td>
                                <td>2</td>
                                <td>Ms. Jennifer Taylor</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Subject Modal -->
<div class="modal fade" id="addSubjectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="subjectCode" class="form-label">Subject Code</label>
                            <input type="text" class="form-control" id="subjectCode" placeholder="e.g., MTH101">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subjectName" class="form-label">Subject Name</label>
                            <input type="text" class="form-control" id="subjectName" placeholder="e.g., Mathematics">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="department">
                                <option selected>Select Department</option>
                                <option value="science">Science</option>
                                <option value="languages">Languages</option>
                                <option value="social">Social Studies</option>
                                <option value="arts">Arts</option>
                                <option value="sports">Sports</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="credits" class="form-label">Credits</label>
                            <input type="number" class="form-control" id="credits" placeholder="e.g., 4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="teacher" class="form-label">Assigned Teacher</label>
                            <select class="form-select" id="teacher">
                                <option selected>Select Teacher</option>
                                <option value="1">Mr. John Smith</option>
                                <option value="2">Mrs. Sarah Johnson</option>
                                <option value="3">Dr. Michael Brown</option>
                                <option value="4">Mrs. Emily Davis</option>
                                <option value="5">Dr. Robert Wilson</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter subject description..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Subject</button>
            </div>
        </div>
    </div>
</div>
@endsection
