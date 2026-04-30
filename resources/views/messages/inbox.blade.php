@extends('layouts.app')

@section('title', 'Messages Inbox')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Messages Inbox</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#composeModal">
                        <i class="bx bx-edit me-1"></i> Compose
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#templateModal">
                        <i class="bx bx-file me-1"></i> Templates
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Message List -->
                    <div class="col-md-4">
                        <div class="card border-end">
                            <div class="card-header">
                                <h6 class="mb-0">Messages</h6>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bx bx-refresh"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action active">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">School Administration</h6>
                                            <small>2 hours ago</small>
                                        </div>
                                        <p class="mb-1">Important: Term 1 Examination Schedule</p>
                                        <small><span class="badge bg-danger">High Priority</span></small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Mr. John Smith</h6>
                                            <small>5 hours ago</small>
                                        </div>
                                        <p class="mb-1">Request for additional lab equipment</p>
                                        <small><span class="badge bg-warning">Medium Priority</span></small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Parent Council</h6>
                                            <small>Yesterday</small>
                                        </div>
                                        <p class="mb-1">Meeting minutes - PTA discussion</p>
                                        <small><span class="badge bg-primary">Low Priority</span></small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Mrs. Sarah Johnson</h6>
                                            <small>2 days ago</small>
                                        </div>
                                        <p class="mb-1">Student performance report - Class 1A</p>
                                        <small><span class="badge bg-success">Read</span></small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Finance Department</h6>
                                            <small>3 days ago</small>
                                        </div>
                                        <p class="mb-1">Monthly budget approval required</p>
                                        <small><span class="badge bg-success">Read</span></small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="avatar me-3">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Sender" class="rounded-circle" style="width: 40px; height: 40px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">School Administration</h6>
                                        <small class="text-muted">admin@school.edu</small>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bx bx-reply"></i> Reply
                                    </button>
                                    <button class="btn btn-sm btn-outline-info">
                                        <i class="bx bx-forward"></i> Forward
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bx bx-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <h5 class="card-title">Important: Term 1 Examination Schedule</h5>
                                    <small class="text-muted">Sent: Today at 10:30 AM</small>
                                </div>
                                
                                <div class="mb-4">
                                    <p>Dear Teachers and Staff,</p>
                                    <p>This is to inform you that the Term 1 examination schedule has been finalized. Please find below the important details:</p>
                                    
                                    <div class="alert alert-info">
                                        <h6>Examination Period: June 15-30, 2024</h6>
                                        <ul class="mb-0">
                                            <li>Mid-term exams: June 15-20</li>
                                            <li>Practical exams: June 21-25</li>
                                            <li>Final exams: June 26-30</li>
                                        </ul>
                                    </div>

                                    <h6>Important Instructions:</h6>
                                    <ol>
                                        <li>All teachers must submit question papers by June 10</li>
                                        <li>Invigilation duty schedule will be shared separately</li>
                                        <li>Students must be informed about the exam schedule</li>
                                        <li>Classrooms should be prepared for examinations</li>
                                    </ol>

                                    <p>Please acknowledge receipt of this message and confirm your availability for invigilation duties.</p>
                                    
                                    <p>Best regards,<br>
                                    School Administration</p>
                                </div>

                                <!-- Attachments -->
                                <div class="mb-3">
                                    <h6>Attachments:</h6>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="bx bx-file me-1"></i> Exam_Schedule.pdf
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="bx bx-file me-1"></i> Instructions.docx
                                        </a>
                                    </div>
                                </div>

                                <!-- Reply Section -->
                                <div class="border-top pt-3">
                                    <h6>Quick Reply</h6>
                                    <textarea class="form-control mb-2" rows="3" placeholder="Type your reply..."></textarea>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="bx bx-send me-1"></i> Send Reply
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm">
                                            <i class="bx bx-paperclip me-1"></i> Attach File
                                        </button>
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

<!-- Compose Message Modal -->
<div class="modal fade" id="composeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Compose Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="recipientType" class="form-label">Send To</label>
                            <select class="form-select" id="recipientType">
                                <option value="individual">Individual</option>
                                <option value="all_teachers">All Teachers</option>
                                <option value="all_students">All Students</option>
                                <option value="all_parents">All Parents</option>
                                <option value="class">Specific Class</option>
                                <option value="department">Department</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="recipients" class="form-label">Recipients</label>
                            <select class="form-select" id="recipients" multiple>
                                <option value="TCH001">Mr. John Smith</option>
                                <option value="TCH002">Mrs. Sarah Johnson</option>
                                <option value="TCH003">Dr. Michael Brown</option>
                                <option value="TCH004">Mrs. Emily Davis</option>
                                <option value="TCH005">Dr. Robert Wilson</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cc" class="form-label">CC</label>
                            <input type="email" class="form-control" id="cc" placeholder="cc@example.com">
                        </div>
                        <div class="col-md-6">
                            <label for="bcc" class="form-label">BCC</label>
                            <input type="email" class="form-control" id="bcc" placeholder="bcc@example.com">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject *</label>
                        <input type="text" class="form-control" id="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-select" id="priority">
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message *</label>
                        <textarea class="form-control" id="message" rows="8" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="attachments" class="form-label">Attachments</label>
                        <input type="file" class="form-control" id="attachments" multiple>
                        <small class="text-muted">You can attach multiple files</small>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="requestRead">
                            <label class="form-check-label" for="requestRead">
                                Request read receipt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sendSMS">
                            <label class="form-check-label" for="sendSMS">
                                Also send as SMS notification
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="scheduleSend">
                            <label class="form-check-label" for="scheduleSend">
                                Schedule for later
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Draft</button>
                <button type="button" class="btn btn-success">Send Message</button>
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
                <div class="mb-3">
                    <label for="templateCategory" class="form-label">Category</label>
                    <select class="form-select" id="templateCategory">
                        <option value="">All Categories</option>
                        <option value="academic">Academic</option>
                        <option value="administrative">Administrative</option>
                        <option value="emergency">Emergency</option>
                        <option value="announcement">Announcement</option>
                        <option value="parent">Parent Communication</option>
                    </select>
                </div>

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
                                <td>Exam Schedule Notification</td>
                                <td><span class="badge bg-primary">Academic</span></td>
                                <td>Important: Examination Schedule</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-send"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Parent Meeting Invitation</td>
                                <td><span class="badge bg-warning">Parent Communication</span></td>
                                <td>PTA Meeting Invitation</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-send"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>School Closure Notice</td>
                                <td><span class="badge bg-danger">Emergency</span></td>
                                <td>URGENT: School Closure</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-send"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Fee Payment Reminder</td>
                                <td><span class="badge bg-secondary">Administrative</span></td>
                                <td>Fee Payment Reminder</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-send"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Event Announcement</td>
                                <td><span class="badge bg-info">Announcement</span></td>
                                <td>Upcoming School Event</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bx bx-send"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bx bx-edit"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Create New Template</button>
            </div>
        </div>
    </div>
</div>
@endsection
