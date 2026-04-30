@extends('layouts.app')

@section('title', 'Create Subject')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Create New Subject</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="subjectName" class="form-label">Subject Name *</label>
                            <input type="text" class="form-control" id="subjectName" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subjectCode" class="form-label">Subject Code *</label>
                            <input type="text" class="form-control" id="subjectCode" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="department">
                                <option value="">Select Department</option>
                                <option value="science">Science</option>
                                <option value="arts">Arts</option>
                                <option value="commerce">Commerce</option>
                                <option value="languages">Languages</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="credits" class="form-label">Credits</label>
                            <input type="number" class="form-control" id="credits" min="1" max="10">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="button" class="btn btn-primary">Save Subject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
