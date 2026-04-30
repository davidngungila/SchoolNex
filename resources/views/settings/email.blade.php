@extends('layouts.app')

@section('title', 'Email Settings')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Email Settings</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#saveModal">
                        <i class="bx bx-save me-1"></i> Save Changes
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testModal">
                        <i class="bx bx-envelope me-1"></i> Test Email
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#templateModal">
                        <i class="bx bx-file me-1"></i> Templates
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <!-- SMTP Configuration -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">SMTP Configuration</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mailDriver" class="form-label">Mail Driver</label>
                                    <select class="form-select" id="mailDriver">
                                        <option value="smtp" selected>SMTP</option>
                                        <option value="mail">PHP Mail</option>
                                        <option value="sendmail">Sendmail</option>
                                        <option value="mailgun">Mailgun</option>
                                        <option value="ses">Amazon SES</option>
                                        <option value="sparkpost">SparkPost</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="smtpHost" class="form-label">SMTP Host *</label>
                                    <input type="text" class="form-control" id="smtpHost" value="smtp.gmail.com" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="smtpPort" class="form-label">SMTP Port *</label>
                                    <input type="number" class="form-control" id="smtpPort" value="587" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="smtpEncryption" class="form-label">Encryption</label>
                                    <select class="form-select" id="smtpEncryption">
                                        <option value="">None</option>
                                        <option value="tls" selected>TLS</option>
                                        <option value="ssl">SSL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="smtpUsername" class="form-label">SMTP Username *</label>
                                    <input type="email" class="form-control" id="smtpUsername" value="noreply@school.com" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="smtpPassword" class="form-label">SMTP Password *</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="smtpPassword" value="********" required>
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()">
                                            <i class="bx bx-show"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fromAddress" class="form-label">From Address *</label>
                                    <input type="email" class="form-control" id="fromAddress" value="noreply@school.com" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fromName" class="form-label">From Name *</label>
                                    <input type="text" class="form-control" id="fromName" value="School Management System" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="verifySsl" checked>
                                    <label class="form-check-label" for="verifySsl">
                                        Verify SSL Certificate
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="allowSelfSigned">
                                    <label class="form-check-label" for="allowSelfSigned">
                                        Allow Self-Signed Certificates
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Email Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="defaultQueue" class="form-label">Email Queue</label>
                                    <select class="form-select" id="defaultQueue">
                                        <option value="sync" selected>Send Immediately</option>
                                        <option value="async">Queue Emails</option>
                                        <option value="scheduled">Scheduled Sending</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="retryAttempts" class="form-label">Retry Attempts</label>
                                    <input type="number" class="form-control" id="retryAttempts" value="3" min="0" max="10">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="retryDelay" class="form-label">Retry Delay (minutes)</label>
                                    <input type="number" class="form-control" id="retryDelay" value="5" min="1" max="60">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="rateLimit" class="form-label">Rate Limit (emails/hour)</label>
                                    <input type="number" class="form-control" id="rateLimit" value="100" min="10" max="1000">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="maxRecipients" class="form-label">Max Recipients per Email</label>
                                    <input type="number" class="form-control" id="maxRecipients" value="50" min="1" max="500">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="maxAttachmentSize" class="form-label">Max Attachment Size (MB)</label>
                                    <input type="number" class="form-control" id="maxAttachmentSize" value="10" min="1" max="50">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableLogging" checked>
                                    <label class="form-check-label" for="enableLogging">
                                        Enable Email Logging
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableTracking" checked>
                                    <label class="form-check-label" for="enableTracking">
                                        Enable Email Tracking
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableBounceHandling" checked>
                                    <label class="form-check-label" for="enableBounceHandling">
                                        Enable Bounce Handling
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableUnsubscribe">
                                    <label class="form-check-label" for="enableUnsubscribe">
                                        Enable Unsubscribe Link
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Notification Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="studentNotifications" class="form-label">Student Notifications</label>
                                    <select class="form-select" id="studentNotifications">
                                        <option value="disabled">Disabled</option>
                                        <option value="important" selected>Important Only</option>
                                        <option value="all">All Notifications</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="parentNotifications" class="form-label">Parent Notifications</label>
                                    <select class="form-select" id="parentNotifications">
                                        <option value="disabled">Disabled</option>
                                        <option value="important" selected>Important Only</option>
                                        <option value="all">All Notifications</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="teacherNotifications" class="form-label">Teacher Notifications</label>
                                    <select class="form-select" id="teacherNotifications">
                                        <option value="disabled">Disabled</option>
                                        <option value="important">Important Only</option>
                                        <option value="all" selected>All Notifications</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="adminNotifications" class="form-label">Admin Notifications</label>
                                    <select class="form-select" id="adminNotifications">
                                        <option value="disabled">Disabled</option>
                                        <option value="important">Important Only</option>
                                        <option value="all" selected>All Notifications</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6>Notification Types</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Notification Type</th>
                                                <th>Students</th>
                                                <th>Parents</th>
                                                <th>Teachers</th>
                                                <th>Admin</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Exam Results</strong></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="examStudents" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="examParents" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="examTeachers">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="examAdmin">
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#notificationConfigModal">
                                                        <i class="bx bx-cog"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Attendance</strong></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="attendanceStudents">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="attendanceParents" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="attendanceTeachers" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="attendanceAdmin">
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#notificationConfigModal">
                                                        <i class="bx bx-cog"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fees Due</strong></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="feesStudents">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="feesParents" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="feesTeachers">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="feesAdmin" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#notificationConfigModal">
                                                        <i class="bx bx-cog"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>System Updates</strong></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="systemStudents">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="systemParents">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="systemTeachers" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="systemAdmin" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#notificationConfigModal">
                                                        <i class="bx bx-cog"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email Templates -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Email Templates</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Template Name</th>
                                            <th>Subject</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Last Modified</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Welcome Email</strong></td>
                                            <td>Welcome to St. Mary's School</td>
                                            <td><span class="badge bg-primary">System</span></td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>{{ date('Y-m-d', strtotime('-1 week')) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                                                    <i class="bx bx-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#previewTemplateModal">
                                                    <i class="bx bx-show"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#testTemplateModal">
                                                    <i class="bx bx-envelope"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Exam Results</strong></td>
                                            <td>Your {{ exam_name }} Results</td>
                                            <td><span class="badge bg-primary">System</span></td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>{{ date('Y-m-d', strtotime('-2 weeks')) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                                                    <i class="bx bx-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#previewTemplateModal">
                                                    <i class="bx bx-show"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#testTemplateModal">
                                                    <i class="bx bx-envelope"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Fee Reminder</strong></td>
                                            <td>Fee Payment Reminder</td>
                                            <td><span class="badge bg-primary">System</span></td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>{{ date('Y-m-d', strtotime('-3 days')) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                                                    <i class="bx bx-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#previewTemplateModal">
                                                    <i class="bx bx-show"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#testTemplateModal">
                                                    <i class="bx bx-envelope"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Attendance Alert</strong></td>
                                            <td>Student Absence Notification</td>
                                            <td><span class="badge bg-primary">System</span></td>
                                            <td><span class="badge bg-warning">Draft</span></td>
                                            <td>{{ date('Y-m-d') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                                                    <i class="bx bx-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#previewTemplateModal">
                                                    <i class="bx bx-show"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#testTemplateModal">
                                                    <i class="bx bx-envelope"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTemplateModal">
                                    <i class="bx bx-plus me-1"></i> Create Template
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Email Statistics -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Email Statistics</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <h4 class="text-primary">1,245</h4>
                                        <small class="text-muted">Total Sent Today</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <h4 class="text-success">1,198</h4>
                                        <small class="text-muted">Delivered</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <h4 class="text-warning">23</h4>
                                        <small class="text-muted">Pending</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <h4 class="text-danger">24</h4>
                                        <small class="text-muted">Failed</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Save Changes Modal -->
<div class="modal fade" id="saveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Save Email Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="testConnection" class="form-label">Test Connection</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="testConnection" checked>
                        <label class="form-check-label" for="testConnection">
                            Test SMTP connection before saving
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="backupConfig" class="form-label">Backup Configuration</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="backupConfig" checked>
                        <label class="form-check-label" for="backupConfig">
                            Create backup of current settings
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="restartQueue" class="form-label">Email Queue</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="restartQueue">
                        <label class="form-check-label" for="restartQueue">
                            Restart email queue after saving
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveSettings()">Save Settings</button>
            </div>
        </div>
    </div>
</div>

<!-- Test Email Modal -->
<div class="modal fade" id="testModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Test Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="testEmail" class="form-label">Test Email Address *</label>
                        <input type="email" class="form-control" id="testEmail" value="admin@school.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="testSubject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="testSubject" value="Test Email from School Management System">
                    </div>
                    <div class="mb-3">
                        <label for="testMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="testMessage" rows="4">This is a test email sent from the School Management System to verify that the email configuration is working correctly.

If you receive this email, your email settings are configured properly.

Thank you!</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeAttachment">
                            <label class="form-check-label" for="includeAttachment">
                                Include test attachment
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="sendTestEmail()">Send Test Email</button>
            </div>
        </div>
    </div>
</div>

<!-- Templates Modal -->
<div class="modal fade" id="templateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Email Templates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Template Name</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Usage Count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Welcome Email</strong></td>
                                <td><span class="badge bg-primary">User Management</span></td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>245</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="editTemplate('welcome')">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-info" onclick="previewTemplate('welcome')">Preview</button>
                                    <button type="button" class="btn btn-sm btn-outline-success" onclick="testTemplate('welcome')">Test</button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Exam Results</strong></td>
                                <td><span class="badge bg-success">Academic</span></td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>1,892</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="editTemplate('exam')">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-info" onclick="previewTemplate('exam')">Preview</button>
                                    <button type="button" class="btn btn-sm btn-outline-success" onclick="testTemplate('exam')">Test</button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Fee Reminder</strong></td>
                                <td><span class="badge bg-warning">Finance</span></td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>567</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="editTemplate('fee')">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-info" onclick="previewTemplate('fee')">Preview</button>
                                    <button type="button" class="btn btn-sm btn-outline-success" onclick="testTemplate('fee')">Test</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTemplateModal">Create Template</button>
            </div>
        </div>
    </div>
</div>

<!-- Create Template Modal -->
<div class="modal fade" id="createTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Email Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="templateName" class="form-label">Template Name *</label>
                            <input type="text" class="form-control" id="templateName" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="templateCategory" class="form-label">Category *</label>
                            <select class="form-select" id="templateCategory" required>
                                <option value="">Select Category</option>
                                <option value="user">User Management</option>
                                <option value="academic">Academic</option>
                                <option value="finance">Finance</option>
                                <option value="attendance">Attendance</option>
                                <option value="system">System</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="templateSubject" class="form-label">Subject *</label>
                        <input type="text" class="form-control" id="templateSubject" required>
                        <small class="text-muted">Use {{ variable_name }} for dynamic content</small>
                    </div>
                    <div class="mb-3">
                        <label for="templateBody" class="form-label">Email Body *</label>
                        <textarea class="form-control" id="templateBody" rows="8" required></textarea>
                        <small class="text-muted">Use {{ variable_name }} for dynamic content. Available variables: {{ school_name }}, {{ student_name }}, {{ parent_name }}, {{ date }}, etc.</small>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="templateType" class="form-label">Template Type</label>
                            <select class="form-select" id="templateType">
                                <option value="html" selected>HTML</option>
                                <option value="text">Plain Text</option>
                                <option value="both">Both</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="templateStatus" class="form-label">Status</label>
                            <select class="form-select" id="templateStatus">
                                <option value="draft">Draft</option>
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createTemplate()">Create Template</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Template Modal -->
<div class="modal fade" id="editTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Email Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editTemplateName" class="form-label">Template Name *</label>
                            <input type="text" class="form-control" id="editTemplateName" value="Welcome Email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editTemplateCategory" class="form-label">Category *</label>
                            <select class="form-select" id="editTemplateCategory" required>
                                <option value="user" selected>User Management</option>
                                <option value="academic">Academic</option>
                                <option value="finance">Finance</option>
                                <option value="attendance">Attendance</option>
                                <option value="system">System</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editTemplateSubject" class="form-label">Subject *</label>
                        <input type="text" class="form-control" id="editTemplateSubject" value="Welcome to {{ school_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTemplateBody" class="form-label">Email Body *</label>
                        <textarea class="form-control" id="editTemplateBody" rows="8" required>Dear {{ student_name }},

Welcome to {{ school_name }}! We are excited to have you join our community.

Your login details:
- Username: {{ username }}
- Password: {{ password }}

Please log in and update your profile information.

Best regards,
{{ school_name }} Team</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editTemplateType" class="form-label">Template Type</label>
                            <select class="form-select" id="editTemplateType">
                                <option value="html" selected>HTML</option>
                                <option value="text">Plain Text</option>
                                <option value="both">Both</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editTemplateStatus" class="form-label">Status</label>
                            <select class="form-select" id="editTemplateStatus">
                                <option value="draft">Draft</option>
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
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

<!-- Preview Template Modal -->
<div class="modal fade" id="previewTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview Email Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Subject:</label>
                    <div class="border rounded p-2 bg-light">Welcome to Excellence Academy</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Body:</label>
                    <div class="border rounded p-3 bg-light" style="min-height: 200px;">
                        <p>Dear John Doe,</p>
                        <p>Welcome to Excellence Academy! We are excited to have you join our community.</p>
                        <p>Your login details:</p>
                        <ul>
                            <li>Username: john.doe</li>
                            <li>Password: password123</li>
                        </ul>
                        <p>Please log in and update your profile information.</p>
                        <p>Best regards,<br>Excellence Academy Team</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="sendPreview()">Send Preview</button>
            </div>
        </div>
    </div>
</div>

<!-- Test Template Modal -->
<div class="modal fade" id="testTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Test Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="testTemplateEmail" class="form-label">Test Email Address *</label>
                        <input type="email" class="form-control" id="testTemplateEmail" value="admin@school.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="testTemplateData" class="form-label">Test Data (JSON)</label>
                        <textarea class="form-control" id="testTemplateData" rows="4">{
  "student_name": "John Doe",
  "school_name": "Excellence Academy",
  "username": "john.doe",
  "password": "password123"
}</textarea>
                        <small class="text-muted">Enter test data in JSON format to populate template variables</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="testTemplateSend()">Send Test Email</button>
            </div>
        </div>
    </div>
</div>

<!-- Notification Config Modal -->
<div class="modal fade" id="notificationConfigModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Configure Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="notificationType" class="form-label">Notification Type</label>
                        <input type="text" class="form-control" id="notificationType" value="Exam Results" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="notificationFrequency" class="form-label">Frequency</label>
                        <select class="form-select" id="notificationFrequency">
                            <option value="immediate" selected>Immediate</option>
                            <option value="daily">Daily Digest</option>
                            <option value="weekly">Weekly Digest</option>
                            <option value="monthly">Monthly Digest</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="notificationConditions" class="form-label">Conditions</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="conditionAll" checked>
                            <label class="form-check-label" for="conditionAll">
                                Send to all recipients
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="conditionGrade">
                            <label class="form-check-label" for="conditionGrade">
                                Send only for grades below threshold
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="conditionAttendance">
                            <label class="form-check-label" for="conditionAttendance">
                                Send only if attendance is below threshold
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="customMessage" class="form-label">Custom Message</label>
                        <textarea class="form-control" id="customMessage" rows="3" placeholder="Optional custom message..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveNotificationConfig()">Save Configuration</button>
            </div>
        </div>
    </div>
</div>

<script>
function togglePasswordVisibility() {
    const passwordField = document.getElementById('smtpPassword');
    const toggleButton = passwordField.nextElementSibling.querySelector('i');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleButton.className = 'bx bx-hide';
    } else {
        passwordField.type = 'password';
        toggleButton.className = 'bx bx-show';
    }
}

function saveSettings() {
    const testConnection = document.getElementById('testConnection').checked;
    const backupConfig = document.getElementById('backupConfig').checked;
    
    if (testConnection) {
        alert('Testing SMTP connection...');
        setTimeout(() => {
            alert('SMTP connection test successful!');
        }, 1000);
    }
    
    if (backupConfig) {
        alert('Creating backup of current email settings...');
    }
    
    alert('Saving email settings...');
    
    setTimeout(() => {
        alert('Email settings saved successfully!');
        document.getElementById('saveModal').querySelector('.btn-close').click();
    }, 2000);
}

function sendTestEmail() {
    const testEmail = document.getElementById('testEmail').value;
    const testSubject = document.getElementById('testSubject').value;
    const testMessage = document.getElementById('testMessage').value;
    const includeAttachment = document.getElementById('includeAttachment').checked;
    
    if (!testEmail) {
        alert('Please enter a test email address');
        return;
    }
    
    alert(`Sending test email to ${testEmail}...`);
    
    if (includeAttachment) {
        alert('Including test attachment...');
    }
    
    setTimeout(() => {
        alert('Test email sent successfully!');
        document.getElementById('testModal').querySelector('.btn-close').click();
    }, 2000);
}

function createTemplate() {
    const templateName = document.getElementById('templateName').value;
    const templateCategory = document.getElementById('templateCategory').value;
    
    if (!templateName || !templateCategory) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert(`Creating template "${templateName}"...`);
    setTimeout(() => {
        alert('Template created successfully!');
        document.getElementById('createTemplateModal').querySelector('.btn-close').click();
    }, 1500);
}

function updateTemplate() {
    const templateName = document.getElementById('editTemplateName').value;
    
    alert(`Updating template "${templateName}"...`);
    setTimeout(() => {
        alert('Template updated successfully!');
        document.getElementById('editTemplateModal').querySelector('.btn-close').click();
    }, 1500);
}

function editTemplate(templateId) {
    alert(`Editing template: ${templateId}`);
    document.getElementById('templateModal').querySelector('.btn-close').click();
    document.getElementById('editTemplateModal').click();
}

function previewTemplate(templateId) {
    alert(`Previewing template: ${templateId}`);
    document.getElementById('templateModal').querySelector('.btn-close').click();
    document.getElementById('previewTemplateModal').click();
}

function testTemplate(templateId) {
    alert(`Testing template: ${templateId}`);
    document.getElementById('templateModal').querySelector('.btn-close').click();
    document.getElementById('testTemplateModal').click();
}

function sendPreview() {
    alert('Sending preview email...');
    setTimeout(() => {
        alert('Preview email sent successfully!');
        document.getElementById('previewTemplateModal').querySelector('.btn-close').click();
    }, 1500);
}

function testTemplateSend() {
    const testEmail = document.getElementById('testTemplateEmail').value;
    const testData = document.getElementById('testTemplateData').value;
    
    if (!testEmail) {
        alert('Please enter a test email address');
        return;
    }
    
    alert(`Sending test template email to ${testEmail}...`);
    setTimeout(() => {
        alert('Test template email sent successfully!');
        document.getElementById('testTemplateModal').querySelector('.btn-close').click();
    }, 1500);
}

function saveNotificationConfig() {
    const notificationType = document.getElementById('notificationType').value;
    const notificationFrequency = document.getElementById('notificationFrequency').value;
    
    alert(`Saving configuration for "${notificationType}"...`);
    setTimeout(() => {
        alert('Notification configuration saved successfully!');
        document.getElementById('notificationConfigModal').querySelector('.btn-close').click();
    }, 1500);
}
</script>
@endsection
