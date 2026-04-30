@extends('layouts.app')

@section('title', 'Send SMS')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Send SMS</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#templateModal">
                        <i class="bx bx-file me-1"></i> Use Template
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                        <i class="bx bx-time me-1"></i> Schedule SMS
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="bx bx-file me-1"></i> Delivery Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- SMS Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">2,456</h4>
                                        <p class="mb-0">Total Sent</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-mobile avatar-icon"></i>
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
                                        <h4 class="mb-0">2,234</h4>
                                        <p class="mb-0">Delivered</p>
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
                                        <h4 class="mb-0">156</h4>
                                        <p class="mb-0">Pending</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-time avatar-icon"></i>
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
                                        <h4 class="mb-0">66</h4>
                                        <p class="mb-0">Failed</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-x-circle avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SMS Compose Form -->
                <form>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="recipientType" class="form-label">Recipient Type *</label>
                            <select class="form-select" id="recipientType" required>
                                <option value="">Select Recipient Type</option>
                                <option value="individual">Individual</option>
                                <option value="class">Class</option>
                                <option value="department">Department</option>
                                <option value="all_students">All Students</option>
                                <option value="all_teachers">All Teachers</option>
                                <option value="all_parents">All Parents</option>
                                <option value="all_staff">All Staff</option>
                                <option value="custom">Custom Numbers</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="individualSelection" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="recipients" class="form-label">Select Recipients *</label>
                            <select class="form-select" id="recipients" multiple>
                                <option value="">Select recipients</option>
                                <option value="+255712345678">John Smith (+255 712 345 678)</option>
                                <option value="+255712987654">Sarah Johnson (+255 712 987 654)</option>
                                <option value="+255712456123">Michael Brown (+255 712 456 123)</option>
                                <option value="+255712789012">Emily Davis (+255 712 789 012)</option>
                            </select>
                            <small class="text-muted">Hold Ctrl/Cmd to select multiple recipients</small>
                        </div>
                    </div>
                    
                    <div class="row" id="classSelection" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="classSelect" class="form-label">Select Class *</label>
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
                            <label for="departmentSelect" class="form-label">Select Department *</label>
                            <select class="form-select" id="departmentSelect">
                                <option value="">Select Department</option>
                                <option value="academic">Academic</option>
                                <option value="admin">Administration</option>
                                <option value="finance">Finance</option>
                                <option value="support">Support Staff</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="customNumbers" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="customNumbers" class="form-label">Custom Phone Numbers *</label>
                            <textarea class="form-control" id="customNumbers" rows="3" placeholder="Enter phone numbers (one per line)&#10;Example:&#10;+255712345678&#10;+255712987654"></textarea>
                            <small class="text-muted">Enter phone numbers in international format (+country code number)</small>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="smsMessage" class="form-label">SMS Message *</label>
                            <textarea class="form-control" id="smsMessage" rows="4" placeholder="Type your SMS message here..." required maxlength="160"></textarea>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Maximum 160 characters</small>
                                <small class="text-muted"><span id="characterCount">0</span>/160 characters</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="senderId" class="form-label">Sender ID</label>
                            <select class="form-select" id="senderId">
                                <option value="SCHOOL">SCHOOL</option>
                                <option value="EDU">EDU</option>
                                <option value="SCHMIS">SCHMIS</option>
                            </select>
                            <small class="text-muted">This will appear as the sender name</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-select" id="priority">
                                <option value="normal">Normal</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="scheduleTime" class="form-label">Schedule Time</label>
                            <input type="datetime-local" class="form-control" id="scheduleTime">
                            <small class="text-muted">Leave empty to send immediately</small>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="addPersonalization">
                                <label class="form-check-label" for="addPersonalization">
                                    Add personalization (e.g., [Student Name])
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="requestDeliveryReport">
                                <label class="form-check-label" for="requestDeliveryReport">
                                    Request delivery report
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="saveTemplate">
                                <label class="form-check-label" for="saveTemplate">
                                    Save as template
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-success" onclick="sendSMS()">
                                    <i class="bx bx-send me-1"></i> Send SMS
                                </button>
                                <button type="button" class="btn btn-primary" onclick="scheduleSMS()">
                                    <i class="bx bx-time me-1"></i> Schedule SMS
                                </button>
                                <button type="button" class="btn btn-outline-secondary" onclick="previewSMS()">
                                    <i class="bx bx-eye me-1"></i> Preview
                                </button>
                                <button type="button" class="btn btn-outline-danger" onclick="clearForm()">
                                    <i class="bx bx-x me-1"></i> Clear
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Template Modal -->
<div class="modal fade" id="templateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SMS Templates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Template Name</th>
                                <th>Category</th>
                                <th>Message</th>
                                <th>Length</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Welcome Message</td>
                                <td><span class="badge bg-info">General</span></td>
                                <td>Welcome to our school! Your account has been created successfully.</td>
                                <td>78</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('welcome')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Exam Schedule</td>
                                <td><span class="badge bg-warning">Academic</span></td>
                                <td>Exam scheduled for [Date] at [Time]. Please prepare accordingly.</td>
                                <td>65</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('exam')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Fee Reminder</td>
                                <td><span class="badge bg-success">Finance</span></td>
                                <td>Fee payment reminder: Amount $[Amount] due on [Date]. Please pay on time.</td>
                                <td>84</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('fee')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Meeting Reminder</td>
                                <td><span class="badge bg-primary">Events</span></td>
                                <td>Meeting reminder: [Meeting] on [Date] at [Time]. Your attendance is required.</td>
                                <td>89</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('meeting')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Emergency Alert</td>
                                <td><span class="badge bg-danger">Emergency</span></td>
                                <td>Emergency: School closed today due to [Reason]. Please stay safe.</td>
                                <td>72</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('emergency')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule SMS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="scheduleDateTime" class="form-label">Schedule Date & Time *</label>
                        <input type="datetime-local" class="form-control" id="scheduleDateTime" required>
                    </div>
                    <div class="mb-3">
                        <label for="repeatOption" class="form-label">Repeat</label>
                        <select class="form-select" id="repeatOption">
                            <option value="once">Once</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="row" id="repeatDetails" style="display: none;">
                        <div class="col-md-6 mb-3">
                            <label for="repeatInterval" class="form-label">Repeat Every</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="repeatInterval" min="1" value="1">
                                <span class="input-group-text">day(s)</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="scheduleNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="scheduleNotes" rows="2" placeholder="Add notes about this scheduled SMS"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Schedule SMS</button>
            </div>
        </div>
    </div>
</div>

<!-- Delivery Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SMS Delivery Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="reportDateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="reportDateRange">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="reportStatus" class="form-label">Status Filter</label>
                        <select class="form-select" id="reportStatus">
                            <option value="all">All Status</option>
                            <option value="delivered">Delivered</option>
                            <option value="pending">Pending</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Message ID</th>
                                <th>Recipients</th>
                                <th>Message</th>
                                <th>Sent Time</th>
                                <th>Status</th>
                                <th>Delivery Rate</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>SMS001</strong></td>
                                <td>25</td>
                                <td>Welcome to our school...</td>
                                <td>{{ date('Y-m-d H:i') }}</td>
                                <td><span class="badge bg-success">Delivered</span></td>
                                <td>96%</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary">View Details</button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>SMS002</strong></td>
                                <td>50</td>
                                <td>Exam scheduled for tomorrow...</td>
                                <td>{{ date('Y-m-d H:i', strtotime('-2 hours')) }}</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>-</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary">View Details</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Export Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SMS Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">SMS Details</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>From:</strong></td>
                                <td id="previewSender">SCHOOL</td>
                            </tr>
                            <tr>
                                <td><strong>To:</strong></td>
                                <td id="previewRecipients">-</td>
                            </tr>
                            <tr>
                                <td><strong>Priority:</strong></td>
                                <td id="previewPriority">-</td>
                            </tr>
                            <tr>
                                <td><strong>Schedule:</strong></td>
                                <td id="previewSchedule">Immediate</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Message</h6>
                    </div>
                    <div class="card-body">
                        <div id="previewMessage" class="bg-light p-3 rounded">-</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="sendSMS()">Send SMS</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('recipientType').addEventListener('change', function() {
    const type = this.value;
    document.getElementById('individualSelection').style.display = 'none';
    document.getElementById('classSelection').style.display = 'none';
    document.getElementById('departmentSelection').style.display = 'none';
    document.getElementById('customNumbers').style.display = 'none';
    
    if (type === 'individual') {
        document.getElementById('individualSelection').style.display = 'block';
    } else if (type === 'class') {
        document.getElementById('classSelection').style.display = 'block';
    } else if (type === 'department') {
        document.getElementById('departmentSelection').style.display = 'block';
    } else if (type === 'custom') {
        document.getElementById('customNumbers').style.display = 'block';
    }
});

document.getElementById('smsMessage').addEventListener('input', function() {
    const length = this.value.length;
    document.getElementById('characterCount').textContent = length;
    
    if (length > 160) {
        this.value = this.value.substring(0, 160);
        document.getElementById('characterCount').textContent = 160;
    }
});

document.getElementById('repeatOption').addEventListener('change', function() {
    const option = this.value;
    document.getElementById('repeatDetails').style.display = option === 'once' ? 'none' : 'block';
});

function useTemplate(templateType) {
    const templates = {
        welcome: 'Welcome to our school! Your account has been created successfully.',
        exam: 'Exam scheduled for [Date] at [Time]. Please prepare accordingly.',
        fee: 'Fee payment reminder: Amount $[Amount] due on [Date]. Please pay on time.',
        meeting: 'Meeting reminder: [Meeting] on [Date] at [Time]. Your attendance is required.',
        emergency: 'Emergency: School closed today due to [Reason]. Please stay safe.'
    };
    
    const template = templates[templateType];
    if (template) {
        document.getElementById('smsMessage').value = template;
        document.getElementById('characterCount').textContent = template.length;
        document.getElementById('templateModal').querySelector('.btn-close').click();
    }
}

function sendSMS() {
    const message = document.getElementById('smsMessage').value;
    const recipientType = document.getElementById('recipientType').value;
    
    if (!message || !recipientType) {
        alert('Please fill in all required fields');
        return;
    }
    
    // Implementation for sending SMS
    alert('SMS sent successfully!');
    clearForm();
}

function scheduleSMS() {
    const scheduleTime = document.getElementById('scheduleTime').value;
    const message = document.getElementById('smsMessage').value;
    const recipientType = document.getElementById('recipientType').value;
    
    if (!message || !recipientType || !scheduleTime) {
        alert('Please fill in all required fields');
        return;
    }
    
    // Implementation for scheduling SMS
    alert('SMS scheduled successfully!');
}

function previewSMS() {
    const message = document.getElementById('smsMessage').value;
    const sender = document.getElementById('senderId').value;
    const priority = document.getElementById('priority').value;
    const scheduleTime = document.getElementById('scheduleTime').value;
    
    document.getElementById('previewMessage').textContent = message || '-';
    document.getElementById('previewSender').textContent = sender || 'SCHOOL';
    document.getElementById('previewPriority').textContent = priority || 'Normal';
    document.getElementById('previewSchedule').textContent = scheduleTime ? scheduleTime : 'Immediate';
    
    // Show preview modal
    new bootstrap.Modal(document.getElementById('previewModal')).show();
}

function clearForm() {
    document.getElementById('recipientType').value = '';
    document.getElementById('smsMessage').value = '';
    document.getElementById('characterCount').textContent = '0';
    document.getElementById('senderId').value = 'SCHOOL';
    document.getElementById('priority').value = 'normal';
    document.getElementById('scheduleTime').value = '';
    document.getElementById('addPersonalization').checked = false;
    document.getElementById('requestDeliveryReport').checked = false;
    document.getElementById('saveTemplate').checked = false;
}
</script>
@endsection
