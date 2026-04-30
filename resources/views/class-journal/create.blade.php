@extends('layouts.app')

@section('title', 'Create Journal Entry')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Create Journal Entry</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="journalClass" class="form-label">Class *</label>
                            <select class="form-select" id="journalClass" required>
                                <option value="">Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="journalSubject" class="form-label">Subject *</label>
                            <select class="form-select" id="journalSubject" required>
                                <option value="">Select Subject</option>
                                <option value="math">Mathematics</option>
                                <option value="english">English</option>
                                <option value="science">Science</option>
                                <option value="history">History</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="journalDate" class="form-label">Date *</label>
                            <input type="date" class="form-control" id="journalDate" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="entryType" class="form-label">Entry Type</label>
                            <select class="form-select" id="entryType">
                                <option value="lesson">Lesson Plan</option>
                                <option value="observation">Class Observation</option>
                                <option value="assessment">Assessment</option>
                                <option value="incident">Incident Report</option>
                                <option value="achievement">Student Achievement</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="topic" class="form-label">Topic/Title</label>
                            <input type="text" class="form-control" id="topic" placeholder="Enter topic or title">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="entryContent" class="form-label">Entry Content *</label>
                        <textarea class="form-control" id="entryContent" rows="6" required placeholder="Enter your journal entry..."></textarea>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="studentsPresent" class="form-label">Students Present</label>
                            <input type="number" class="form-control" id="studentsPresent" placeholder="Number of students present">
                        </div>
                        <div class="col-md-6">
                            <label for="studentsAbsent" class="form-label">Students Absent</label>
                            <input type="number" class="form-control" id="studentsAbsent" placeholder="Number of students absent">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="attachments" class="form-label">Attachments</label>
                        <input type="file" class="form-control" id="attachments" multiple>
                        <small class="text-muted">Upload photos, documents, or other files</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="tags" placeholder="Enter tags separated by commas">
                        <small class="text-muted">e.g., homework, project, presentation</small>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="button" class="btn btn-primary">Save as Draft</button>
                        <button type="button" class="btn btn-success">Publish Entry</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
