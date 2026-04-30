@extends('layouts.app')

@section('title', 'Compose Message')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Compose Message</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#templateModal">
                        <i class="bx bx-file me-1"></i> Use Template
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#draftModal">
                        <i class="bx bx-save me-1"></i> Save Draft
                    </button>
                </div>
            </div>
            <div class="card-body">
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
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="individualSelection" style="display: none;">
                        <div class="col-md-12 mb-3">
                            <label for="recipients" class="form-label">Select Recipients *</label>
                            <select class="form-select" id="recipients" multiple>
                                <option value="">Select recipients</option>
                                <option value="STU001">John Smith (Student)</option>
                                <option value="STU002">Sarah Johnson (Student)</option>
                                <option value="TCH001">Michael Brown (Teacher)</option>
                                <option value="TCH002">Emily Davis (Teacher)</option>
                                <option value="STF001">Robert Wilson (Staff)</option>
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
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="subject" class="form-label">Subject *</label>
                            <input type="text" class="form-control" id="subject" placeholder="Enter message subject" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" rows="8" placeholder="Type your message here..." required></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-select" id="priority">
                                <option value="normal">Normal</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sendMethod" class="form-label">Send Method</label>
                            <select class="form-select" id="sendMethod">
                                <option value="email">Email Only</option>
                                <option value="sms">SMS Only</option>
                                <option value="both">Email & SMS</option>
                                <option value="internal">Internal Message Only</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scheduleDate" class="form-label">Schedule Send</label>
                            <input type="datetime-local" class="form-control" id="scheduleDate">
                            <small class="text-muted">Leave empty to send immediately</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="attachments" class="form-label">Attachments</label>
                            <input type="file" class="form-control" id="attachments" multiple>
                            <small class="text-muted">Upload attachments (PDF, DOC, Images)</small>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="requestReadReceipt">
                                <label class="form-check-label" for="requestReadReceipt">
                                    Request read receipt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sendCopy">
                                <label class="form-check-label" for="sendCopy">
                                    Send copy to my email
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-success" onclick="sendMessage()">
                                    <i class="bx bx-send me-1"></i> Send Message
                                </button>
                                <button type="button" class="btn btn-primary" onclick="saveDraft()">
                                    <i class="bx bx-save me-1"></i> Save Draft
                                </button>
                                <button type="button" class="btn btn-outline-secondary" onclick="previewMessage()">
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
                <h5 class="modal-title">Message Templates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Template Name</th>
                                <th>Category</th>
                                <th>Subject</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Welcome Message</td>
                                <td><span class="badge bg-info">General</span></td>
                                <td>Welcome to School Management System</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('welcome')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Exam Schedule</td>
                                <td><span class="badge bg-warning">Academic</span></td>
                                <td>Upcoming Examination Schedule</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('exam')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Fee Reminder</td>
                                <td><span class="badge bg-success">Finance</span></td>
                                <td>Fee Payment Reminder</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('fee')">Use</button>
                                    <button type="button" class="btn btn-sm btn-outline-info">Preview</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Parent Meeting</td>
                                <td><span class="badge bg-primary">Events</span></td>
                                <td>Parent-Teacher Meeting Invitation</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="useTemplate('meeting')">Use</button>
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

<!-- Draft Modal -->
<div class="modal fade" id="draftModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Save Draft</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="draftTitle" class="form-label">Draft Title</label>
                        <input type="text" class="form-control" id="draftTitle" placeholder="Enter draft title">
                    </div>
                    <div class="mb-3">
                        <label for="draftCategory" class="form-label">Category</label>
                        <select class="form-select" id="draftCategory">
                            <option value="general">General</option>
                            <option value="academic">Academic</option>
                            <option value="finance">Finance</option>
                            <option value="events">Events</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="draftNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="draftNotes" rows="2" placeholder="Add notes about this draft"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveDraft()">Save Draft</button>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Message Details</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>To:</strong></td>
                                <td id="previewRecipients">-</td>
                            </tr>
                            <tr>
                                <td><strong>Subject:</strong></td>
                                <td id="previewSubject">-</td>
                            </tr>
                            <tr>
                                <td><strong>Priority:</strong></td>
                                <td id="previewPriority">-</td>
                            </tr>
                            <tr>
                                <td><strong>Send Method:</strong></td>
                                <td id="previewMethod">-</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Message Content</h6>
                    </div>
                    <div class="card-body">
                        <div id="previewMessage">-</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="sendMessage()">Send Message</button>
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
    
    if (type === 'individual') {
        document.getElementById('individualSelection').style.display = 'block';
    } else if (type === 'class') {
        document.getElementById('classSelection').style.display = 'block';
    } else if (type === 'department') {
        document.getElementById('departmentSelection').style.display = 'block';
    }
});

function useTemplate(templateType) {
    const templates = {
        welcome: {
            subject: 'Welcome to School Management System',
            message: 'Dear [Recipient Name],\n\nWelcome to our School Management System! We are excited to have you join our community. This system will help you stay updated with all school activities, academic progress, and important announcements.\n\nPlease log in to the system using your credentials to explore all features.\n\nBest regards,\nSchool Administration'
        },
        exam: {
            subject: 'Upcoming Examination Schedule',
            message: 'Dear [Recipient Name],\n\nThis is to inform you about the upcoming examinations scheduled for [Date]. Please find the examination schedule attached.\n\nImportant instructions:\n- Arrive 30 minutes before the exam\n- Bring required materials\n- Follow all examination rules\n\nFor any queries, please contact the examination department.\n\nBest regards,\nExamination Department'
        },
        fee: {
            subject: 'Fee Payment Reminder',
            message: 'Dear [Recipient Name],\n\nThis is a reminder that your fee payment for [Month/Year] is due on [Due Date].\n\nFee Details:\n- Tuition Fee: $[Amount]\n- Other Fees: $[Amount]\n- Total: $[Total Amount]\n\nPlease ensure timely payment to avoid late fees. Payment can be made through the school portal or at the finance office.\n\nFor any assistance, please contact the finance department.\n\nBest regards,\nFinance Department'
        },
        meeting: {
            subject: 'Parent-Teacher Meeting Invitation',
            message: 'Dear [Recipient Name],\n\nYou are cordially invited to attend the Parent-Teacher Meeting scheduled on [Date] at [Time] in [Venue].\n\nAgenda:\n- Academic performance discussion\n- Student progress review\n- Future planning\n- Open discussion\n\nYour presence is important for your child\'s academic development. Please confirm your attendance.\n\nBest regards,\nSchool Administration'
        }
    };
    
    const template = templates[templateType];
    if (template) {
        document.getElementById('subject').value = template.subject;
        document.getElementById('message').value = template.message;
        document.getElementById('templateModal').querySelector('.btn-close').click();
    }
}

function sendMessage() {
    // Implementation for sending message
    alert('Message sent successfully!');
    clearForm();
}

function saveDraft() {
    // Implementation for saving draft
    alert('Draft saved successfully!');
}

function previewMessage() {
    // Implementation for preview
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value;
    const priority = document.getElementById('priority').value;
    const method = document.getElementById('sendMethod').value;
    
    document.getElementById('previewSubject').textContent = subject || '-';
    document.getElementById('previewMessage').textContent = message || '-';
    document.getElementById('previewPriority').textContent = priority || '-';
    document.getElementById('previewMethod').textContent = method || '-';
    
    // Show preview modal
    new bootstrap.Modal(document.getElementById('previewModal')).show();
}

function clearForm() {
    document.getElementById('recipientType').value = '';
    document.getElementById('subject').value = '';
    document.getElementById('message').value = '';
    document.getElementById('priority').value = 'normal';
    document.getElementById('sendMethod').value = 'email';
    document.getElementById('scheduleDate').value = '';
    document.getElementById('attachments').value = '';
    document.getElementById('requestReadReceipt').checked = false;
    document.getElementById('sendCopy').checked = false;
}
</script>
@endsection
