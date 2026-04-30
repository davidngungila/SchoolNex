@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Notifications</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createNotificationModal">
                        <i class="bx bx-plus me-1"></i> Create Notification
                    </button>
                    <button type="button" class="btn btn-primary" onclick="markAllAsRead()">
                        <i class="bx bx-check-double me-1"></i> Mark All Read
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#settingsModal">
                        <i class="bx bx-cog me-1"></i> Settings
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Notification Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">24</h4>
                                        <p class="mb-0">Total Notifications</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-bell avatar-icon"></i>
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
                                        <h4 class="mb-0">8</h4>
                                        <p class="mb-0">Unread</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-envelope avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">3</h4>
                                        <p class="mb-0">Urgent</p>
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
                                        <h4 class="mb-0">5</h4>
                                        <p class="mb-0">Scheduled</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-time avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="unread">Unread</option>
                            <option value="read">Read</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="priorityFilter" class="form-label">Priority</label>
                        <select class="form-select" id="priorityFilter">
                            <option value="">All Priorities</option>
                            <option value="urgent">Urgent</option>
                            <option value="high">High</option>
                            <option value="normal">Normal</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="typeFilter" class="form-label">Type</label>
                        <select class="form-select" id="typeFilter">
                            <option value="">All Types</option>
                            <option value="system">System</option>
                            <option value="academic">Academic</option>
                            <option value="finance">Finance</option>
                            <option value="event">Event</option>
                            <option value="reminder">Reminder</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="all">All Time</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchNotification" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchNotification" placeholder="Title, content...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Notifications List -->
                <div class="notifications-list">
                    <!-- Today's Notifications -->
                    <div class="notification-group">
                        <h6 class="text-muted mb-3">Today</h6>
                        
                        <div class="card mb-2 notification-item unread" data-id="NOT001">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-initial rounded-circle bg-danger">!</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1">Urgent: System Maintenance Scheduled</h6>
                                                <p class="mb-1">The system will undergo maintenance on {{ date('Y-m-d', strtotime('+2 days')) }} from 10:00 PM to 2:00 AM. Please save your work before this time.</p>
                                                <div class="d-flex gap-2">
                                                    <small class="text-muted"><i class="bx bx-time me-1"></i>{{ date('H:i') }}</small>
                                                    <small class="text-muted"><i class="bx bx-user me-1"></i>System Admin</small>
                                                    <span class="badge bg-danger">Urgent</span>
                                                    <span class="badge bg-purple">System</span>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="markAsRead('NOT001')"><i class="bx bx-check me-2"></i>Mark as Read</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="archiveNotification('NOT001')"><i class="bx bx-archive me-2"></i>Archive</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="shareNotification('NOT001')"><i class="bx bx-share me-2"></i>Share</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-danger" href="#" onclick="deleteNotification('NOT001')"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2 notification-item unread" data-id="NOT002">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-initial rounded-circle bg-warning">!</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1">New Exam Schedule Posted</h6>
                                                <p class="mb-1">The examination schedule for the upcoming semester has been posted. Please check the academic calendar for details.</p>
                                                <div class="d-flex gap-2">
                                                    <small class="text-muted"><i class="bx bx-time me-1"></i>{{ date('H:i', strtotime('-2 hours')) }}</small>
                                                    <small class="text-muted"><i class="bx bx-user me-1"></i>Academic Office</small>
                                                    <span class="badge bg-warning">High</span>
                                                    <span class="badge bg-info">Academic</span>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="markAsRead('NOT002')"><i class="bx bx-check me-2"></i>Mark as Read</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="archiveNotification('NOT002')"><i class="bx bx-archive me-2"></i>Archive</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="shareNotification('NOT002')"><i class="bx bx-share me-2"></i>Share</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-danger" href="#" onclick="deleteNotification('NOT002')"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2 notification-item" data-id="NOT003">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-initial rounded-circle bg-success">!</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1">Fee Payment Reminder</h6>
                                                <p class="mb-1">Your monthly fee payment is due on {{ date('Y-m-d', strtotime('+5 days')) }}. Please ensure timely payment to avoid late fees.</p>
                                                <div class="d-flex gap-2">
                                                    <small class="text-muted"><i class="bx bx-time me-1"></i>{{ date('H:i', strtotime('-4 hours')) }}</small>
                                                    <small class="text-muted"><i class="bx bx-user me-1"></i>Finance Office</small>
                                                    <span class="badge bg-success">Normal</span>
                                                    <span class="badge bg-warning">Finance</span>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="markAsRead('NOT003')"><i class="bx bx-check me-2"></i>Mark as Read</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="archiveNotification('NOT003')"><i class="bx bx-archive me-2"></i>Archive</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="shareNotification('NOT003')"><i class="bx bx-share me-2"></i>Share</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-danger" href="#" onclick="deleteNotification('NOT003')"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Yesterday's Notifications -->
                    <div class="notification-group">
                        <h6 class="text-muted mb-3">Yesterday</h6>
                        
                        <div class="card mb-2 notification-item" data-id="NOT004">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-initial rounded-circle bg-info">!</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1">Parent-Teacher Meeting Reminder</h6>
                                                <p class="mb-1">Don't forget about the parent-teacher meeting scheduled for {{ date('Y-m-d', strtotime('+1 week')) }} at 2:00 PM.</p>
                                                <div class="d-flex gap-2">
                                                    <small class="text-muted"><i class="bx bx-time me-1"></i>{{ date('H:i', strtotime('-1 day')) }}</small>
                                                    <small class="text-muted"><i class="bx bx-user me-1"></i>Class Teacher</small>
                                                    <span class="badge bg-success">Normal</span>
                                                    <span class="badge bg-primary">Event</span>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="markAsRead('NOT004')"><i class="bx bx-check me-2"></i>Mark as Read</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="archiveNotification('NOT004')"><i class="bx bx-archive me-2"></i>Archive</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="shareNotification('NOT004')"><i class="bx bx-share me-2"></i>Share</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-danger" href="#" onclick="deleteNotification('NOT004')"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2 notification-item" data-id="NOT005">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-initial rounded-circle bg-secondary">!</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1">Library Book Due Soon</h6>
                                                <p class="mb-1">Your borrowed book "Mathematics for Beginners" is due in 3 days. Please return it to the library.</p>
                                                <div class="d-flex gap-2">
                                                    <small class="text-muted"><i class="bx bx-time me-1"></i>{{ date('H:i', strtotime('-1 day')) }}</small>
                                                    <small class="text-muted"><i class="bx bx-user me-1"></i>Library System</small>
                                                    <span class="badge bg-secondary">Low</span>
                                                    <span class="badge bg-purple">Reminder</span>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="markAsRead('NOT005')"><i class="bx bx-check me-2"></i>Mark as Read</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="archiveNotification('NOT005')"><i class="bx bx-archive me-2"></i>Archive</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="shareNotification('NOT005')"><i class="bx bx-share me-2"></i>Share</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-danger" href="#" onclick="deleteNotification('NOT005')"><i class="bx bx-trash me-2"></i>Delete</a></li>
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

<!-- Create Notification Modal -->
<div class="modal fade" id="createNotificationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="notificationTitle" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="notificationTitle" placeholder="Enter notification title" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="notificationType" class="form-label">Type *</label>
                            <select class="form-select" id="notificationType" required>
                                <option value="">Select Type</option>
                                <option value="system">System</option>
                                <option value="academic">Academic</option>
                                <option value="finance">Finance</option>
                                <option value="event">Event</option>
                                <option value="reminder">Reminder</option>
                                <option value="general">General</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="priority" class="form-label">Priority *</label>
                            <select class="form-select" id="priority" required>
                                <option value="low">Low</option>
                                <option value="normal">Normal</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="audience" class="form-label">Audience *</label>
                            <select class="form-select" id="audience" required>
                                <option value="">Select Audience</option>
                                <option value="all">All Users</option>
                                <option value="students">All Students</option>
                                <option value="teachers">All Teachers</option>
                                <option value="parents">All Parents</option>
                                <option value="staff">All Staff</option>
                                <option value="class">Specific Class</option>
                                <option value="department">Specific Department</option>
                                <option value="individual">Individual Users</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="classSelection" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="classSelect" class="form-label">Select Class</label>
                            <select class="form-select" id="classSelect">
                                <option value="">Select Class</option>
                                <option value="1A">Class 1A</option>
                                <option value="1B">Class 1B</option>
                                <option value="2A">Class 2A</option>
                                <option value="2B">Class 2B</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="departmentSelection" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="departmentSelect" class="form-label">Select Department</label>
                            <select class="form-select" id="departmentSelect">
                                <option value="">Select Department</option>
                                <option value="academic">Academic</option>
                                <option value="admin">Administration</option>
                                <option value="finance">Finance</option>
                                <option value="support">Support Staff</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="individualSelection" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="individualSelect" class="form-label">Select Users</label>
                            <select class="form-select" id="individualSelect" multiple>
                                <option value="STU001">John Smith (Student)</option>
                                <option value="STU002">Sarah Johnson (Student)</option>
                                <option value="TCH001">Michael Brown (Teacher)</option>
                                <option value="TCH002">Emily Davis (Teacher)</option>
                                <option value="STF001">Robert Wilson (Staff)</option>
                            </select>
                            <small class="text-muted">Hold Ctrl/Cmd to select multiple users</small>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="notificationMessage" class="form-label">Message *</label>
                        <textarea class="form-control" id="notificationMessage" rows="4" placeholder="Enter notification message" required></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="deliveryMethod" class="form-label">Delivery Method</label>
                            <select class="form-select" id="deliveryMethod">
                                <option value="system">System Only</option>
                                <option value="email">Email</option>
                                <option value="sms">SMS</option>
                                <option value="both">Email & SMS</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scheduleTime" class="form-label">Schedule Time</label>
                            <input type="datetime-local" class="form-control" id="scheduleTime">
                            <small class="text-muted">Leave empty to send immediately</small>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="expiryDate" class="form-label">Expiry Date</label>
                            <input type="date" class="form-control" id="expiryDate">
                            <small class="text-muted">Notification will be hidden after this date</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="actionURL" class="form-label">Action URL</label>
                            <input type="url" class="form-control" id="actionURL" placeholder="https://example.com/action">
                            <small class="text-muted">Optional URL for action button</small>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sendEmail" checked>
                            <label class="form-check-label" for="sendEmail">
                                Send email notification
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sendSMS">
                            <label class="form-check-label" for="sendSMS">
                                Send SMS notification
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="persistent">
                            <label class="form-check-label" for="persistent">
                                Persistent notification (won't auto-dismiss)
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveDraft()">Save Draft</button>
                <button type="button" class="btn btn-success" onclick="sendNotification()">Send Notification</button>
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <h6 class="mb-3">General Settings</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="autoDismiss" class="form-label">Auto Dismiss Time (seconds)</label>
                            <input type="number" class="form-control" id="autoDismiss" min="0" value="5">
                            <small class="text-muted">Set to 0 to disable auto-dismiss</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="maxNotifications" class="form-label">Max Notifications Display</label>
                            <input type="number" class="form-control" id="maxNotifications" min="1" max="50" value="10">
                        </div>
                    </div>
                    
                    <h6 class="mb-3 mt-4">Email Notifications</h6>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="emailSystem" checked>
                            <label class="form-check-label" for="emailSystem">
                                System notifications
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="emailAcademic" checked>
                            <label class="form-check-label" for="emailAcademic">
                                Academic notifications
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="emailFinance" checked>
                            <label class="form-check-label" for="emailFinance">
                                Finance notifications
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="emailEvents" checked>
                            <label class="form-check-label" for="emailEvents">
                                Event notifications
                            </label>
                        </div>
                    </div>
                    
                    <h6 class="mb-3 mt-4">SMS Notifications</h6>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="smsUrgent" checked>
                            <label class="form-check-label" for="smsUrgent">
                                Urgent notifications only
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="smsSystem">
                            <label class="form-check-label" for="smsSystem">
                                System notifications
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="smsAcademic">
                            <label class="form-check-label" for="smsAcademic">
                                Academic notifications
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="smsFinance">
                            <label class="form-check-label" for="smsFinance">
                                Finance notifications
                            </label>
                        </div>
                    </div>
                    
                    <h6 class="mb-3 mt-4">Quiet Hours</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="quietHoursStart" class="form-label">Start Time</label>
                            <input type="time" class="form-control" id="quietHoursStart" value="22:00">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="quietHoursEnd" class="form-label">End Time</label>
                            <input type="time" class="form-control" id="quietHoursEnd" value="07:00">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="quietHoursEnabled">
                            <label class="form-check-label" for="quietHoursEnabled">
                                Enable quiet hours (no notifications during specified time)
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Settings</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('audience').addEventListener('change', function() {
    const audience = this.value;
    document.getElementById('classSelection').style.display = 'none';
    document.getElementById('departmentSelection').style.display = 'none';
    document.getElementById('individualSelection').style.display = 'none';
    
    if (audience === 'class') {
        document.getElementById('classSelection').style.display = 'block';
    } else if (audience === 'department') {
        document.getElementById('departmentSelection').style.display = 'block';
    } else if (audience === 'individual') {
        document.getElementById('individualSelection').style.display = 'block';
    }
});

function markAsRead(notificationId) {
    const element = document.querySelector(`[data-id="${notificationId}"]`);
    if (element) {
        element.classList.remove('unread');
        element.classList.add('read');
    }
}

function archiveNotification(notificationId) {
    if (confirm('Are you sure you want to archive this notification?')) {
        const element = document.querySelector(`[data-id="${notificationId}"]`);
        if (element) {
            element.style.display = 'none';
        }
    }
}

function shareNotification(notificationId) {
    // Implementation for sharing notification
    alert('Notification shared successfully!');
}

function deleteNotification(notificationId) {
    if (confirm('Are you sure you want to delete this notification?')) {
        const element = document.querySelector(`[data-id="${notificationId}"]`);
        if (element) {
            element.remove();
        }
    }
}

function markAllAsRead() {
    const unreadNotifications = document.querySelectorAll('.notification-item.unread');
    unreadNotifications.forEach(notification => {
        notification.classList.remove('unread');
        notification.classList.add('read');
    });
}

function sendNotification() {
    // Implementation for sending notification
    alert('Notification sent successfully!');
    document.getElementById('createNotificationModal').querySelector('.btn-close').click();
}

function saveDraft() {
    // Implementation for saving draft
    alert('Notification draft saved!');
}
</script>

<style>
.notification-item {
    transition: all 0.3s ease;
}

.notification-item.unread {
    border-left: 4px solid #007bff;
    background-color: #f8f9fa;
}

.notification-item.read {
    border-left: 4px solid #6c757d;
    background-color: #ffffff;
}

.notification-item:hover {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.notification-group h6 {
    border-bottom: 1px solid #dee2e6;
    padding-bottom: 0.5rem;
    margin-bottom: 1rem;
}

.avatar-initial {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
}
</style>
@endsection
