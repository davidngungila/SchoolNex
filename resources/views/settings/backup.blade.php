@extends('layouts.app')

@section('title', 'Backup & Restore')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Backup & Restore</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createBackupModal">
                        <i class="bx bx-download me-1"></i> Create Backup
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#restoreModal">
                        <i class="bx bx-upload me-1"></i> Restore Backup
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                        <i class="bx bx-calendar me-1"></i> Schedule Backup
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Backup Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">12</h4>
                                        <p class="mb-0">Total Backups</p>
                                        <small class="text-muted">Last 30 days</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-archive avatar-icon"></i>
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
                                        <h4 class="mb-0">2.8 GB</h4>
                                        <p class="mb-0">Total Size</p>
                                        <small class="text-muted">All backups</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-hdd avatar-icon"></i>
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
                                        <h4 class="mb-0">Daily</h4>
                                        <p class="mb-0">Auto Backup</p>
                                        <small class="text-muted">Next: 2:00 AM</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-time avatar-icon"></i>
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
                                        <h4 class="mb-0">98.5%</h4>
                                        <p class="mb-0">Success Rate</p>
                                        <small class="text-muted">Last 30 days</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-check-circle avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Backup Settings -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Backup Configuration</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="backupType" class="form-label">Backup Type</label>
                                <select class="form-select" id="backupType">
                                    <option value="full" selected>Full Backup</option>
                                    <option value="incremental">Incremental Backup</option>
                                    <option value="differential">Differential Backup</option>
                                    <option value="custom">Custom Selection</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="backupFrequency" class="form-label">Auto Backup Frequency</label>
                                <select class="form-select" id="backupFrequency">
                                    <option value="disabled">Disabled</option>
                                    <option value="hourly">Hourly</option>
                                    <option value="daily" selected>Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="backupTime" class="form-label">Backup Time</label>
                                <input type="time" class="form-control" id="backupTime" value="02:00">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="backupRetention" class="form-label">Retention Period (days)</label>
                                <input type="number" class="form-control" id="backupRetention" value="30" min="7" max="365">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="backupLocation" class="form-label">Backup Location</label>
                                <select class="form-select" id="backupLocation">
                                    <option value="local" selected>Local Storage</option>
                                    <option value="cloud">Cloud Storage</option>
                                    <option value="ftp">FTP Server</option>
                                    <option value="both">Local & Cloud</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="compressionLevel" class="form-label">Compression Level</label>
                                <select class="form-select" id="compressionLevel">
                                    <option value="none">No Compression</option>
                                    <option value="low">Low</option>
                                    <option value="medium" selected>Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="encryptBackup" checked>
                                <label class="form-check-label" for="encryptBackup">
                                    Encrypt backup files
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="verifyBackup" checked>
                                <label class="form-check-label" for="verifyBackup">
                                    Verify backup integrity
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="emailNotification" checked>
                                <label class="form-check-label" for="emailNotification">
                                    Send email notifications on backup completion
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Backups -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Recent Backups</h6>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="refreshBackupList()">
                            <i class="bx bx-refresh"></i> Refresh
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Backup Name</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th>Location</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>backup_{{ date('Y-m-d') }}_full</strong></td>
                                        <td><span class="badge bg-primary">Full</span></td>
                                        <td>245.8 MB</td>
                                        <td>{{ date('Y-m-d H:i') }}</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td><span class="badge bg-info">Local</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="downloadBackup('backup_{{ date('Y-m-d') }}_full')"><i class="bx bx-download me-2"></i>Download</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="restoreFromBackup('backup_{{ date('Y-m-d') }}_full')"><i class="bx bx-refresh me-2"></i>Restore</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="verifyBackup('backup_{{ date('Y-m-d') }}_full')"><i class="bx bx-check me-2"></i>Verify</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="deleteBackup('backup_{{ date('Y-m-d') }}_full')"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>backup_{{ date('Y-m-d', strtotime('-1 day')) }}_incremental</strong></td>
                                        <td><span class="badge bg-success">Incremental</span></td>
                                        <td>45.2 MB</td>
                                        <td>{{ date('Y-m-d H:i', strtotime('-1 day')) }}</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td><span class="badge bg-warning">Cloud</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="downloadBackup('backup_{{ date('Y-m-d', strtotime('-1 day')) }}_incremental')"><i class="bx bx-download me-2"></i>Download</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="restoreFromBackup('backup_{{ date('Y-m-d', strtotime('-1 day')) }}_incremental')"><i class="bx bx-refresh me-2"></i>Restore</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="verifyBackup('backup_{{ date('Y-m-d', strtotime('-1 day')) }}_incremental')"><i class="bx bx-check me-2"></i>Verify</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="deleteBackup('backup_{{ date('Y-m-d', strtotime('-1 day')) }}_incremental')"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>backup_{{ date('Y-m-d', strtotime('-2 days')) }}_full</strong></td>
                                        <td><span class="badge bg-primary">Full</span></td>
                                        <td>248.5 MB</td>
                                        <td>{{ date('Y-m-d H:i', strtotime('-2 days')) }}</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td><span class="badge bg-info">Local</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="downloadBackup('backup_{{ date('Y-m-d', strtotime('-2 days')) }}_full')"><i class="bx bx-download me-2"></i>Download</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="restoreFromBackup('backup_{{ date('Y-m-d', strtotime('-2 days')) }}_full')"><i class="bx bx-refresh me-2"></i>Restore</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="verifyBackup('backup_{{ date('Y-m-d', strtotime('-2 days')) }}_full')"><i class="bx bx-check me-2"></i>Verify</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="deleteBackup('backup_{{ date('Y-m-d', strtotime('-2 days')) }}_full')"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>backup_{{ date('Y-m-d', strtotime('-3 days')) }}_differential</strong></td>
                                        <td><span class="badge bg-warning">Differential</span></td>
                                        <td>89.3 MB</td>
                                        <td>{{ date('Y-m-d H:i', strtotime('-3 days')) }}</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td><span class="badge bg-info">Local</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="downloadBackup('backup_{{ date('Y-m-d', strtotime('-3 days')) }}_differential')"><i class="bx bx-download me-2"></i>Download</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="restoreFromBackup('backup_{{ date('Y-m-d', strtotime('-3 days')) }}_differential')"><i class="bx bx-refresh me-2"></i>Restore</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="verifyBackup('backup_{{ date('Y-m-d', strtotime('-3 days')) }}_differential')"><i class="bx bx-check me-2"></i>Verify</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="deleteBackup('backup_{{ date('Y-m-d', strtotime('-3 days')) }}_differential')"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Storage Usage -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Storage Usage</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Local Storage</label>
                                    <div class="progress" style="height: 25px;">
                                        <div class="progress-bar bg-primary" style="width: 65%">65% (650 MB / 1 GB)</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cloud Storage</label>
                                    <div class="progress" style="height: 25px;">
                                        <div class="progress-bar bg-success" style="width: 35%">35% (350 MB / 1 GB)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <h4 class="text-primary">1.0 GB</h4>
                                    <small class="text-muted">Total Used</small>
                                </div>
                                <div class="text-center mt-2">
                                    <h4 class="text-success">1.0 GB</h4>
                                    <small class="text-muted">Total Available</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Backup Schedule -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Scheduled Backups</h6>
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                            <i class="bx bx-plus"></i> Add Schedule
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Frequency</th>
                                        <th>Next Run</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Daily Full Backup</strong></td>
                                        <td><span class="badge bg-primary">Full</span></td>
                                        <td>Daily at 2:00 AM</td>
                                        <td>{{ date('Y-m-d', strtotime('+1 day')) }} 02:00</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="editSchedule('daily')">Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-warning" onclick="pauseSchedule('daily')">Pause</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Weekly Incremental</strong></td>
                                        <td><span class="badge bg-success">Incremental</span></td>
                                        <td>Every Sunday at 3:00 AM</td>
                                        <td>{{ date('Y-m-d', strtotime('next sunday')) }} 03:00</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="editSchedule('weekly')">Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-warning" onclick="pauseSchedule('weekly')">Pause</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Monthly Full Backup</strong></td>
                                        <td><span class="badge bg-primary">Full</span></td>
                                        <td>1st of month at 1:00 AM</td>
                                        <td>{{ date('Y-m-01', strtotime('+1 month')) }} 01:00</td>
                                        <td><span class="badge bg-warning">Paused</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="editSchedule('monthly')">Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-success" onclick="resumeSchedule('monthly')">Resume</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Backup Modal -->
<div class="modal fade" id="createBackupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Backup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="backupName" class="form-label">Backup Name *</label>
                            <input type="text" class="form-control" id="backupName" value="backup_{{ date('Y-m-d_H-i') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="backupType" class="form-label">Backup Type *</label>
                            <select class="form-select" id="backupType" required>
                                <option value="full" selected>Full Backup</option>
                                <option value="incremental">Incremental Backup</option>
                                <option value="differential">Differential Backup</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="backupComponents" class="form-label">Components to Backup</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="backupDatabase" checked>
                            <label class="form-check-label" for="backupDatabase">
                                Database
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="backupFiles" checked>
                            <label class="form-check-label" for="backupFiles">
                                Files & Documents
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="backupImages" checked>
                            <label class="form-check-label" for="backupImages">
                                Images & Media
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="backupConfig" checked>
                            <label class="form-check-label" for="backupConfig">
                                Configuration Files
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="backupLogs">
                            <label class="form-check-label" for="backupLogs">
                                Log Files
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="backupLocation" class="form-label">Backup Location *</label>
                            <select class="form-select" id="backupLocation" required>
                                <option value="local" selected>Local Storage</option>
                                <option value="cloud">Cloud Storage</option>
                                <option value="ftp">FTP Server</option>
                                <option value="both">Local & Cloud</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="compressionLevel" class="form-label">Compression Level</label>
                            <select class="form-select" id="compressionLevel">
                                <option value="none">No Compression</option>
                                <option value="low">Low</option>
                                <option value="medium" selected>Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="encryptBackup" checked>
                            <label class="form-check-label" for="encryptBackup">
                                Encrypt backup file
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="verifyBackup" checked>
                            <label class="form-check-label" for="verifyBackup">
                                Verify backup after creation
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="emailNotification">
                            <label class="form-check-label" for="emailNotification">
                                Send email notification when complete
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="backupDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="backupDescription" rows="2" placeholder="Optional description for this backup..."></textarea>
                    </div>
                </form>
                
                <!-- Progress Bar -->
                <div class="progress mt-3" id="backupProgress" style="display: none;">
                    <div class="progress-bar bg-primary" style="width: 0%">0%</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="startBackup()">Start Backup</button>
            </div>
        </div>
    </div>
</div>

<!-- Restore Backup Modal -->
<div class="modal fade" id="restoreModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Restore Backup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="restoreSource" class="form-label">Restore Source *</label>
                        <select class="form-select" id="restoreSource" required>
                            <option value="">Select backup source</option>
                            <option value="local">Local Storage</option>
                            <option value="cloud">Cloud Storage</option>
                            <option value="upload">Upload Backup File</option>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="localBackupSelection" style="display: none;">
                        <label for="localBackupFile" class="form-label">Select Backup File *</label>
                        <select class="form-select" id="localBackupFile">
                            <option value="">Select backup file</option>
                            <option value="backup_{{ date('Y-m-d') }}_full">backup_{{ date('Y-m-d') }}_full (245.8 MB)</option>
                            <option value="backup_{{ date('Y-m-d', strtotime('-1 day')) }}_incremental">backup_{{ date('Y-m-d', strtotime('-1 day')) }}_incremental (45.2 MB)</option>
                            <option value="backup_{{ date('Y-m-d', strtotime('-2 days')) }}_full">backup_{{ date('Y-m-d', strtotime('-2 days')) }}_full (248.5 MB)</option>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="uploadBackupSelection" style="display: none;">
                        <label for="uploadBackupFile" class="form-label">Upload Backup File *</label>
                        <input type="file" class="form-control" id="uploadBackupFile" accept=".zip,.sql,.gz">
                        <small class="text-muted">Supported formats: .zip, .sql, .gz</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="restoreComponents" class="form-label">Components to Restore</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="restoreDatabase" checked>
                            <label class="form-check-label" for="restoreDatabase">
                                Database
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="restoreFiles" checked>
                            <label class="form-check-label" for="restoreFiles">
                                Files & Documents
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="restoreImages" checked>
                            <label class="form-check-label" for="restoreImages">
                                Images & Media
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="restoreConfig" checked>
                            <label class="form-check-label" for="restoreConfig">
                                Configuration Files
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="restoreOptions" class="form-label">Restore Options</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="createBackupBeforeRestore" checked>
                            <label class="form-check-label" for="createBackupBeforeRestore">
                                Create backup before restore
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="verifyRestore" checked>
                            <label class="form-check-label" for="verifyRestore">
                                Verify restore integrity
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="notifyUsers">
                            <label class="form-check-label" for="notifyUsers">
                                Notify users about system restore
                            </label>
                        </div>
                    </div>
                </form>
                
                <!-- Progress Bar -->
                <div class="progress mt-3" id="restoreProgress" style="display: none;">
                    <div class="progress-bar bg-warning" style="width: 0%">0%</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning" onclick="startRestore()">Start Restore</button>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Backup Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Backup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="scheduleName" class="form-label">Schedule Name *</label>
                        <input type="text" class="form-control" id="scheduleName" placeholder="Enter schedule name" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scheduleType" class="form-label">Backup Type *</label>
                            <select class="form-select" id="scheduleType" required>
                                <option value="full">Full Backup</option>
                                <option value="incremental">Incremental Backup</option>
                                <option value="differential">Differential Backup</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scheduleFrequency" class="form-label">Frequency *</label>
                            <select class="form-select" id="scheduleFrequency" required>
                                <option value="hourly">Hourly</option>
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scheduleTime" class="form-label">Time *</label>
                            <input type="time" class="form-control" id="scheduleTime" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scheduleDay" class="form-label">Day (for weekly/monthly)</label>
                            <select class="form-select" id="scheduleDay">
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                                <option value="1">1st of month</option>
                                <option value="15">15th of month</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="scheduleRetention" class="form-label">Retention Period (days)</label>
                        <input type="number" class="form-control" id="scheduleRetention" value="30" min="7" max="365">
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="scheduleNotification" checked>
                            <label class="form-check-label" for="scheduleNotification">
                                Send notification on completion
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="scheduleActive" checked>
                            <label class="form-check-label" for="scheduleActive">
                                Activate schedule immediately
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createSchedule()">Create Schedule</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('restoreSource').addEventListener('change', function() {
    const source = this.value;
    document.getElementById('localBackupSelection').style.display = source === 'local' ? 'block' : 'none';
    document.getElementById('uploadBackupSelection').style.display = source === 'upload' ? 'block' : 'none';
});

function startBackup() {
    const backupName = document.getElementById('backupName').value;
    const backupType = document.getElementById('backupType').value;
    
    if (!backupName) {
        alert('Please enter a backup name');
        return;
    }
    
    // Show progress bar
    const progressBar = document.getElementById('backupProgress');
    const progressText = progressBar.querySelector('.progress-bar');
    progressBar.style.display = 'block';
    
    // Simulate backup progress
    let progress = 0;
    const interval = setInterval(() => {
        progress += 5;
        progressText.style.width = progress + '%';
        progressText.textContent = progress + '%';
        
        if (progress >= 100) {
            clearInterval(interval);
            alert(`Backup "${backupName}" completed successfully!`);
            document.getElementById('createBackupModal').querySelector('.btn-close').click();
            progressBar.style.display = 'none';
            progressText.style.width = '0%';
            progressText.textContent = '0%';
        }
    }, 200);
}

function startRestore() {
    const restoreSource = document.getElementById('restoreSource').value;
    
    if (!restoreSource) {
        alert('Please select a restore source');
        return;
    }
    
    if (confirm('This will restore the system from the selected backup. All current data will be overwritten. Continue?')) {
        // Show progress bar
        const progressBar = document.getElementById('restoreProgress');
        const progressText = progressBar.querySelector('.progress-bar');
        progressBar.style.display = 'block';
        
        // Simulate restore progress
        let progress = 0;
        const interval = setInterval(() => {
            progress += 3;
            progressText.style.width = progress + '%';
            progressText.textContent = progress + '%';
            
            if (progress >= 100) {
                clearInterval(interval);
                alert('System restore completed successfully!');
                document.getElementById('restoreModal').querySelector('.btn-close').click();
                progressBar.style.display = 'none';
                progressText.style.width = '0%';
                progressText.textContent = '0%';
            }
        }, 300);
    }
}

function createSchedule() {
    const scheduleName = document.getElementById('scheduleName').value;
    const scheduleFrequency = document.getElementById('scheduleFrequency').value;
    
    if (!scheduleName) {
        alert('Please enter a schedule name');
        return;
    }
    
    alert(`Backup schedule "${scheduleName}" created successfully!`);
    document.getElementById('scheduleModal').querySelector('.btn-close').click();
}

function downloadBackup(backupName) {
    alert(`Downloading backup: ${backupName}`);
}

function restoreFromBackup(backupName) {
    if (confirm(`Are you sure you want to restore from backup "${backupName}"?`)) {
        document.getElementById('restoreModal').click();
    }
}

function verifyBackup(backupName) {
    alert(`Verifying backup integrity: ${backupName}`);
    setTimeout(() => {
        alert('Backup verification completed successfully!');
    }, 2000);
}

function deleteBackup(backupName) {
    if (confirm(`Are you sure you want to delete backup "${backupName}"?`)) {
        alert(`Backup "${backupName}" deleted successfully!`);
        location.reload();
    }
}

function refreshBackupList() {
    alert('Refreshing backup list...');
    setTimeout(() => {
        alert('Backup list refreshed successfully!');
    }, 1000);
}

function editSchedule(scheduleId) {
    alert(`Editing schedule: ${scheduleId}`);
}

function pauseSchedule(scheduleId) {
    if (confirm(`Are you sure you want to pause schedule "${scheduleId}"?`)) {
        alert(`Schedule "${scheduleId}" paused successfully!`);
    }
}

function resumeSchedule(scheduleId) {
    alert(`Schedule "${scheduleId}" resumed successfully!`);
}
</script>
@endsection
