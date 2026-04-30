@extends('layouts.app')

@section('title', 'SMS Templates')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">SMS Templates</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTemplateModal">
                        <i class="bx bx-plus me-1"></i> Create Template
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bx bx-upload me-1"></i> Import Templates
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export Templates
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Template Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">25</h4>
                                        <p class="mb-0">Total Templates</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-file avatar-icon"></i>
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
                                        <h4 class="mb-0">18</h4>
                                        <p class="mb-0">Active</p>
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
                                        <h4 class="mb-0">5</h4>
                                        <p class="mb-0">Draft</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-edit avatar-icon"></i>
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
                                        <h4 class="mb-0">2</h4>
                                        <p class="mb-0">Archived</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-archive avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="categoryFilter" class="form-label">Category</label>
                        <select class="form-select" id="categoryFilter">
                            <option value="">All Categories</option>
                            <option value="general">General</option>
                            <option value="academic">Academic</option>
                            <option value="finance">Finance</option>
                            <option value="event">Event</option>
                            <option value="emergency">Emergency</option>
                            <option value="reminder">Reminder</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="draft">Draft</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchTemplate" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchTemplate" placeholder="Template name...">
                    </div>
                    <div class="col-md-2">
                        <label for="sortBy" class="form-label">Sort By</label>
                        <select class="form-select" id="sortBy">
                            <option value="name">Name</option>
                            <option value="created">Created Date</option>
                            <option value="used">Most Used</option>
                            <option value="length">Message Length</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-success w-100">
                            <i class="bx bx-refresh"></i> Refresh
                        </button>
                    </div>
                </div>

                <!-- Templates Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>Template Name</th>
                                <th>Category</th>
                                <th>Message</th>
                                <th>Length</th>
                                <th>Variables</th>
                                <th>Usage Count</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="templateSelect[]" value="TPL001"></td>
                                <td><strong>Welcome Message</strong></td>
                                <td><span class="badge bg-info">General</span></td>
                                <td>Welcome to our school! Your account has been created successfully. Login with your credentials.</td>
                                <td>118</td>
                                <td><span class="badge bg-primary">2</span></td>
                                <td>45</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTemplateModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editTemplateModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="useTemplate('TPL001')"><i class="bx bx-send me-2"></i>Use Template</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="duplicateTemplate('TPL001')"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="previewTemplate('TPL001')"><i class="bx bx-eye me-2"></i>Preview</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Archive</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="templateSelect[]" value="TPL002"></td>
                                <td><strong>Exam Schedule</strong></td>
                                <td><span class="badge bg-warning">Academic</span></td>
                                <td>Exam scheduled for [Date] at [Time]. Please prepare accordingly. Room: [Room].</td>
                                <td>89</td>
                                <td><span class="badge bg-primary">3</span></td>
                                <td>32</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTemplateModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editTemplateModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="useTemplate('TPL002')"><i class="bx bx-send me-2"></i>Use Template</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="duplicateTemplate('TPL002')"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="previewTemplate('TPL002')"><i class="bx bx-eye me-2"></i>Preview</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Archive</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="templateSelect[]" value="TPL003"></td>
                                <td><strong>Fee Reminder</strong></td>
                                <td><span class="badge bg-success">Finance</span></td>
                                <td>Fee payment reminder: Amount $[Amount] due on [Date]. Please pay on time to avoid late fees.</td>
                                <td>112</td>
                                <td><span class="badge bg-primary">2</span></td>
                                <td>28</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTemplateModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editTemplateModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="useTemplate('TPL003')"><i class="bx bx-send me-2"></i>Use Template</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="duplicateTemplate('TPL003')"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="previewTemplate('TPL003')"><i class="bx bx-eye me-2"></i>Preview</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Archive</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="templateSelect[]" value="TPL004"></td>
                                <td><strong>Meeting Reminder</strong></td>
                                <td><span class="badge bg-primary">Event</span></td>
                                <td>Meeting reminder: [Meeting] on [Date] at [Time]. Your attendance is required. Venue: [Venue].</td>
                                <td>125</td>
                                <td><span class="badge bg-primary">4</span></td>
                                <td>18</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTemplateModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editTemplateModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="useTemplate('TPL004')"><i class="bx bx-send me-2"></i>Use Template</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="duplicateTemplate('TPL004')"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="previewTemplate('TPL004')"><i class="bx bx-eye me-2"></i>Preview</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-pause me-2"></i>Archive</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="templateSelect[]" value="TPL005"></td>
                                <td><strong>Emergency Alert</strong></td>
                                <td><span class="badge bg-danger">Emergency</span></td>
                                <td>Emergency: School closed today due to [Reason]. Please stay safe and follow instructions.</td>
                                <td>98</td>
                                <td><span class="badge bg-primary">1</span></td>
                                <td>8</td>
                                <td><span class="badge bg-warning">Draft</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTemplateModal"><i class="bx bx-show me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editTemplateModal"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="useTemplate('TPL005')"><i class="bx bx-send me-2"></i>Use Template</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="duplicateTemplate('TPL005')"><i class="bx bx-copy me-2"></i>Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="previewTemplate('TPL005')"><i class="bx bx-eye me-2"></i>Preview</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-check me-2"></i>Activate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Bulk Actions -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-primary" onclick="bulkActivate()">
                                <i class="bx bx-check me-1"></i> Activate Selected
                            </button>
                            <button type="button" class="btn btn-outline-warning" onclick="bulkArchive()">
                                <i class="bx bx-archive me-1"></i> Archive Selected
                            </button>
                            <button type="button" class="btn btn-outline-info" onclick="exportSelected()">
                                <i class="bx bx-download me-1"></i> Export Selected
                            </button>
                            <button type="button" class="btn btn-outline-danger" onclick="deleteSelected()">
                                <i class="bx bx-trash me-1"></i> Delete Selected
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Template Modal -->
<div class="modal fade" id="createTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create SMS Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="templateName" class="form-label">Template Name *</label>
                            <input type="text" class="form-control" id="templateName" placeholder="Enter template name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="templateCategory" class="form-label">Category *</label>
                            <select class="form-select" id="templateCategory" required>
                                <option value="">Select Category</option>
                                <option value="general">General</option>
                                <option value="academic">Academic</option>
                                <option value="finance">Finance</option>
                                <option value="event">Event</option>
                                <option value="emergency">Emergency</option>
                                <option value="reminder">Reminder</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="templateMessage" class="form-label">Message Template *</label>
                        <textarea class="form-control" id="templateMessage" rows="4" placeholder="Enter SMS message template" required maxlength="160"></textarea>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">Maximum 160 characters</small>
                            <small class="text-muted"><span id="charCount">0</span>/160 characters</small>
                        </div>
                        <small class="text-muted">Available variables: [Student Name], [Class], [Date], [Time], [Amount], [Venue], [Reason]</small>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="templateDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="templateDescription" rows="2" placeholder="Enter template description"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="templateTags" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="templateTags" placeholder="Enter tags separated by commas">
                            <small class="text-muted">e.g., welcome, admission, fee</small>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="isActive" checked>
                            <label class="form-check-label" for="isActive">
                                Active (template can be used)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="isDefault">
                            <label class="form-check-label" for="isDefault">
                                Set as default template for this category
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveTemplate()">Save Template</button>
            </div>
        </div>
    </div>
</div>

<!-- View Template Modal -->
<div class="modal fade" id="viewTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Template Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Template Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>Welcome Message</td>
                            </tr>
                            <tr>
                                <td><strong>Category:</strong></td>
                                <td><span class="badge bg-info">General</span></td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td><strong>Created:</strong></td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Last Modified:</strong></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 days')) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Usage Statistics</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Total Usage:</strong></td>
                                <td>45 times</td>
                            </tr>
                            <tr>
                                <td><strong>Last Used:</strong></td>
                                <td>{{ date('Y-m-d H:i', strtotime('-1 week')) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Success Rate:</strong></td>
                                <td>98.5%</td>
                            </tr>
                            <tr>
                                <td><strong>Avg Delivery Time:</strong></td>
                                <td>2.3 seconds</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Message Template</h6>
                        <div class="card">
                            <div class="card-body">
                                <p>Welcome to our school! Your account has been created successfully. Login with your credentials.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Variables Used</h6>
                        <div class="d-flex gap-2">
                            <span class="badge bg-primary">[Student Name]</span>
                            <span class="badge bg-primary">[Class]</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Tags</h6>
                        <div class="d-flex gap-2">
                            <span class="badge bg-secondary">welcome</span>
                            <span class="badge bg-secondary">admission</span>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Description</h6>
                        <p>Template used for welcoming new students and parents to the school management system.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="useTemplate('TPL001')">Use Template</button>
                <button type="button" class="btn btn-success" onclick="duplicateTemplate('TPL001')">Duplicate</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Template Modal -->
<div class="modal fade" id="editTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit SMS Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editTemplateName" class="form-label">Template Name *</label>
                            <input type="text" class="form-control" id="editTemplateName" value="Welcome Message" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editTemplateCategory" class="form-label">Category *</label>
                            <select class="form-select" id="editTemplateCategory" required>
                                <option value="general" selected>General</option>
                                <option value="academic">Academic</option>
                                <option value="finance">Finance</option>
                                <option value="event">Event</option>
                                <option value="emergency">Emergency</option>
                                <option value="reminder">Reminder</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editTemplateMessage" class="form-label">Message Template *</label>
                        <textarea class="form-control" id="editTemplateMessage" rows="4" required maxlength="160">Welcome to our school! Your account has been created successfully. Login with your credentials.</textarea>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">Maximum 160 characters</small>
                            <small class="text-muted"><span id="editCharCount">118</span>/160 characters</small>
                        </div>
                        <small class="text-muted">Available variables: [Student Name], [Class], [Date], [Time], [Amount], [Venue], [Reason]</small>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editTemplateDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editTemplateDescription" rows="2">Template used for welcoming new students and parents</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editTemplateTags" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="editTemplateTags" value="welcome, admission">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="editIsActive" checked>
                            <label class="form-check-label" for="editIsActive">
                                Active (template can be used)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="editIsDefault">
                            <label class="form-check-label" for="editIsDefault">
                                Set as default template for this category
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateTemplate()">Update Template</button>
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Templates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="importFile" class="form-label">Select File *</label>
                        <input type="file" class="form-control" id="importFile" accept=".csv,.xlsx,.xls" required>
                        <small class="text-muted">Supported formats: CSV, Excel</small>
                    </div>
                    <div class="mb-3">
                        <label for="importFormat" class="form-label">File Format</label>
                        <select class="form-select" id="importFormat">
                            <option value="csv">CSV</option>
                            <option value="excel">Excel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="alert alert-info">
                            <h6 class="alert-heading">File Format Requirements</h6>
                            <p class="mb-0">Your file should contain the following columns:</p>
                            <ul class="mb-0">
                                <li>Template Name (required)</li>
                                <li>Category (required)</li>
                                <li>Message (required)</li>
                                <li>Description (optional)</li>
                                <li>Tags (optional)</li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Import Templates</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Templates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exportFormat" class="form-label">Export Format</label>
                    <select class="form-select" id="exportFormat">
                        <option value="csv">CSV</option>
                        <option value="excel">Excel</option>
                        <option value="json">JSON</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exportCategory" class="form-label">Category Filter</label>
                    <select class="form-select" id="exportCategory">
                        <option value="all">All Categories</option>
                        <option value="general">General</option>
                        <option value="academic">Academic</option>
                        <option value="finance">Finance</option>
                        <option value="event">Event</option>
                        <option value="emergency">Emergency</option>
                        <option value="reminder">Reminder</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exportStatus" class="form-label">Status Filter</label>
                    <select class="form-select" id="exportStatus">
                        <option value="all">All Status</option>
                        <option value="active">Active</option>
                        <option value="draft">Draft</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Export Templates</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="templateSelect[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

document.getElementById('templateMessage').addEventListener('input', function() {
    const length = this.value.length;
    document.getElementById('charCount').textContent = length;
    
    if (length > 160) {
        this.value = this.value.substring(0, 160);
        document.getElementById('charCount').textContent = 160;
    }
});

document.getElementById('editTemplateMessage').addEventListener('input', function() {
    const length = this.value.length;
    document.getElementById('editCharCount').textContent = length;
    
    if (length > 160) {
        this.value = this.value.substring(0, 160);
        document.getElementById('editCharCount').textContent = 160;
    }
});

function useTemplate(templateId) {
    // Implementation for using template
    alert('Template loaded successfully! Redirecting to SMS send page...');
    window.location.href = '/sms/send';
}

function duplicateTemplate(templateId) {
    // Implementation for duplicating template
    alert('Template duplicated successfully!');
}

function previewTemplate(templateId) {
    // Implementation for previewing template
    alert('Template preview loaded!');
}

function saveTemplate() {
    const name = document.getElementById('templateName').value;
    const category = document.getElementById('templateCategory').value;
    const message = document.getElementById('templateMessage').value;
    
    if (!name || !category || !message) {
        alert('Please fill in all required fields');
        return;
    }
    
    // Implementation for saving template
    alert('Template saved successfully!');
    document.getElementById('createTemplateModal').querySelector('.btn-close').click();
}

function updateTemplate() {
    // Implementation for updating template
    alert('Template updated successfully!');
    document.getElementById('editTemplateModal').querySelector('.btn-close').click();
}

function bulkActivate() {
    const selected = document.querySelectorAll('input[name="templateSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select templates to activate');
        return;
    }
    alert('Activating ' + selected.length + ' templates');
}

function bulkArchive() {
    const selected = document.querySelectorAll('input[name="templateSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select templates to archive');
        return;
    }
    if (confirm('Are you sure you want to archive ' + selected.length + ' templates?')) {
        alert('Archived ' + selected.length + ' templates');
    }
}

function exportSelected() {
    const selected = document.querySelectorAll('input[name="templateSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select templates to export');
        return;
    }
    alert('Exporting ' + selected.length + ' templates');
}

function deleteSelected() {
    const selected = document.querySelectorAll('input[name="templateSelect[]"]:checked');
    if (selected.length === 0) {
        alert('Please select templates to delete');
        return;
    }
    if (confirm('Are you sure you want to delete ' + selected.length + ' templates?')) {
        alert('Deleted ' + selected.length + ' templates');
    }
}
</script>
@endsection
