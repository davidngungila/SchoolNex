@extends('layouts.app')

@section('title', 'System Log')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">System Log</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bx bx-download me-1"></i> Export
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
                        <i class="bx bx-filter me-1"></i> Advanced Filter
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clearModal">
                        <i class="bx bx-trash me-1"></i> Clear Log
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Log Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">15,847</h4>
                                        <p class="mb-0">Total Log Entries</p>
                                        <small class="text-muted">Last 24 hours</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-file-blank avatar-icon"></i>
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
                                        <h4 class="mb-0">12,456</h4>
                                        <p class="mb-0">Info Messages</p>
                                        <small class="text-muted">78.6% of total</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-info-circle avatar-icon"></i>
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
                                        <h4 class="mb-0">2,891</h4>
                                        <p class="mb-0">Warning Messages</p>
                                        <small class="text-muted">18.2% of total</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-error avatar-icon"></i>
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
                                        <h4 class="mb-0">500</h4>
                                        <p class="mb-0">Error Messages</p>
                                        <small class="text-muted">3.2% of total</small>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-x-circle avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Filter -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="logLevel" class="form-label">Log Level</label>
                        <select class="form-select" id="logLevel">
                            <option value="">All Levels</option>
                            <option value="debug">Debug</option>
                            <option value="info">Info</option>
                            <option value="warning">Warning</option>
                            <option value="error">Error</option>
                            <option value="critical">Critical</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="logCategory" class="form-label">Category</label>
                        <select class="form-select" id="logCategory">
                            <option value="">All Categories</option>
                            <option value="system">System</option>
                            <option value="database">Database</option>
                            <option value="auth">Authentication</option>
                            <option value="api">API</option>
                            <option value="email">Email</option>
                            <option value="backup">Backup</option>
                            <option value="security">Security</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="timeRange" class="form-label">Time Range</label>
                        <select class="form-select" id="timeRange">
                            <option value="1hour">Last Hour</option>
                            <option value="6hours">Last 6 Hours</option>
                            <option value="24hours" selected>Last 24 Hours</option>
                            <option value="7days">Last 7 Days</option>
                            <option value="30days">Last 30 Days</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchLog" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchLog" placeholder="Search logs...">
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

                <!-- System Log Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Timestamp</th>
                                <th>Level</th>
                                <th>Category</th>
                                <th>Message</th>
                                <th>Module</th>
                                <th>User</th>
                                <th>IP Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s') }}</td>
                                <td><span class="badge bg-success">Info</span></td>
                                <td><span class="badge bg-primary">System</span></td>
                                <td>System startup completed successfully</td>
                                <td>Core</td>
                                <td>System</td>
                                <td>127.0.0.1</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLogModal">
                                        <i class="bx bx-show"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-5 minutes')) }}</td>
                                <td><span class="badge bg-success">Info</span></td>
                                <td><span class="badge bg-info">Database</span></td>
                                <td>Database connection established</td>
                                <td>MySQL</td>
                                <td>System</td>
                                <td>127.0.0.1</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLogModal">
                                        <i class="bx bx-show"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-15 minutes')) }}</td>
                                <td><span class="badge bg-warning">Warning</span></td>
                                <td><span class="badge bg-warning">API</span></td>
                                <td>High API request rate detected</td>
                                <td>REST API</td>
                                <td>John Smith</td>
                                <td>192.168.1.100</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLogModal">
                                        <i class="bx bx-show"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-30 minutes')) }}</td>
                                <td><span class="badge bg-success">Info</span></td>
                                <td><span class="badge bg-success">Auth</span></td>
                                <td>User login successful</td>
                                <td>Authentication</td>
                                <td>Sarah Johnson</td>
                                <td>192.168.1.101</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLogModal">
                                        <i class="bx bx-show"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-45 minutes')) }}</td>
                                <td><span class="badge bg-danger">Error</span></td>
                                <td><span class="badge bg-info">Database</span></td>
                                <td>Failed to execute query: Table 'students' doesn't exist</td>
                                <td>MySQL</td>
                                <td>Michael Brown</td>
                                <td>192.168.1.102</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLogModal">
                                        <i class="bx bx-show"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-1 hour')) }}</td>
                                <td><span class="badge bg-success">Info</span></td>
                                <td><span class="badge bg-primary">Email</span></td>
                                <td>Email sent successfully to 45 recipients</td>
                                <td>SMTP</td>
                                <td>System</td>
                                <td>127.0.0.1</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLogModal">
                                        <i class="bx bx-show"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-2 hours')) }}</td>
                                <td><span class="badge bg-warning">Warning</span></td>
                                <td><span class="badge bg-danger">Security</span></td>
                                <td>Multiple failed login attempts detected</td>
                                <td>Authentication</td>
                                <td>Unknown</td>
                                <td>192.168.1.200</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLogModal">
                                        <i class="bx bx-show"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-3 hours')) }}</td>
                                <td><span class="badge bg-success">Info</span></td>
                                <td><span class="badge bg-warning">Backup</span></td>
                                <td>Automatic backup completed successfully</td>
                                <td>Backup Service</td>
                                <td>System</td>
                                <td>127.0.0.1</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLogModal">
                                        <i class="bx bx-show"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-4 hours')) }}</td>
                                <td><span class="badge bg-danger">Error</span></td>
                                <td><span class="badge bg-info">API</span></td>
                                <td>API rate limit exceeded for user 192.168.1.150</td>
                                <td>REST API</td>
                                <td>Unknown</td>
                                <td>192.168.1.150</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLogModal">
                                        <i class="bx bx-show"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ date('Y-m-d H:i:s', strtotime('-5 hours')) }}</td>
                                <td><span class="badge bg-success">Info</span></td>
                                <td><span class="badge bg-primary">System</span></td>
                                <td>Cron job executed: Daily cleanup completed</td>
                                <td>Cron</td>
                                <td>System</td>
                                <td>127.0.0.1</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLogModal">
                                        <i class="bx bx-show"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Log pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- View Log Modal -->
<div class="modal fade" id="viewLogModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Log Entry Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Timestamp:</strong></td>
                                <td>{{ date('Y-m-d H:i:s') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Level:</strong></td>
                                <td><span class="badge bg-success">Info</span></td>
                            </tr>
                            <tr>
                                <td><strong>Category:</strong></td>
                                <td><span class="badge bg-primary">System</span></td>
                            </tr>
                            <tr>
                                <td><strong>Module:</strong></td>
                                <td>Core</td>
                            </tr>
                            <tr>
                                <td><strong>User:</strong></td>
                                <td>System</td>
                            </tr>
                            <tr>
                                <td><strong>IP Address:</strong></td>
                                <td>127.0.0.1</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Request ID:</strong></td>
                                <td>REQ_2024_04_30_001</td>
                            </tr>
                            <tr>
                                <td><strong>Session ID:</strong></td>
                                <td>SES_abc123def456</td>
                            </tr>
                            <tr>
                                <td><strong>Memory Usage:</strong></td>
                                <td>45.2 MB</td>
                            </tr>
                            <tr>
                                <td><strong>Execution Time:</strong></td>
                                <td>0.234s</td>
                            </tr>
                            <tr>
                                <td><strong>Server:</strong></td>
                                <td>web-server-01</td>
                            </tr>
                            <tr>
                                <td><strong>Environment:</strong></td>
                                <td>Production</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="mt-3">
                    <h6>Message</h6>
                    <div class="card bg-light">
                        <div class="card-body">
                            <p>System startup completed successfully. All modules loaded and initialized.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-3">
                    <h6>Stack Trace</h6>
                    <div class="card bg-light">
                        <div class="card-body">
                            <pre class="mb-0"><code>#0 /var/www/html/app/Core/System.php(124): System::startup()
#1 /var/www/html/app/bootstrap.php(45): System::initialize()
#2 /var/www/html/public/index.php(12): require_once('/var/www/html/app/bootstrap.php')</code></pre>
                        </div>
                    </div>
                </div>
                
                <div class="mt-3">
                    <h6>Additional Data</h6>
                    <div class="card bg-light">
                        <div class="card-body">
                            <pre class="mb-0"><code>{
    "php_version": "8.1.12",
    "memory_limit": "512M",
    "max_execution_time": "300",
    "loaded_extensions": ["pdo", "mysqli", "curl", "json"],
    "server_load": [0.2, 0.3, 0.1],
    "disk_space": {
        "total": "500GB",
        "used": "245GB",
        "available": "255GB"
    }
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="exportLogEntry()">Export Entry</button>
            </div>
        </div>
    </div>
</div>

<!-- Advanced Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Advanced Log Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterLevel" class="form-label">Log Level</label>
                            <select class="form-select" id="filterLevel" multiple>
                                <option value="debug">Debug</option>
                                <option value="info" selected>Info</option>
                                <option value="warning" selected>Warning</option>
                                <option value="error" selected>Error</option>
                                <option value="critical">Critical</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterCategory" class="form-label">Category</label>
                            <select class="form-select" id="filterCategory" multiple>
                                <option value="system" selected>System</option>
                                <option value="database">Database</option>
                                <option value="auth">Authentication</option>
                                <option value="api">API</option>
                                <option value="email">Email</option>
                                <option value="backup">Backup</option>
                                <option value="security">Security</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterModule" class="form-label">Module</label>
                            <select class="form-select" id="filterModule">
                                <option value="">All Modules</option>
                                <option value="core">Core</option>
                                <option value="auth">Authentication</option>
                                <option value="api">API</option>
                                <option value="database">Database</option>
                                <option value="email">Email</option>
                                <option value="backup">Backup</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterUser" class="form-label">User</label>
                            <input type="text" class="form-control" id="filterUser" placeholder="Enter username or 'System'">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterStartTime" class="form-label">Start Time</label>
                            <input type="datetime-local" class="form-control" id="filterStartTime">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterEndTime" class="form-label">End Time</label>
                            <input type="datetime-local" class="form-control" id="filterEndTime">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterIP" class="form-label">IP Address</label>
                            <input type="text" class="form-control" id="filterIP" placeholder="Enter IP address or range">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterMessage" class="form-label">Message Contains</label>
                            <input type="text" class="form-control" id="filterMessage" placeholder="Search in message text">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Additional Filters</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filterOnlyErrors">
                                    <label class="form-check-label" for="filterOnlyErrors">Show only errors</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filterOnlySecurity">
                                    <label class="form-check-label" for="filterOnlySecurity">Security events only</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filterOnlySystem">
                                    <label class="form-check-label" for="filterOnlySystem">System events only</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="applyFilter()">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export System Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exportType" class="form-label">Export Type</label>
                        <select class="form-select" id="exportType">
                            <option value="current">Current View</option>
                            <option value="filtered">Filtered Results</option>
                            <option value="all">All Log Entries</option>
                            <option value="date_range">Date Range</option>
                        </select>
                    </div>
                    
                    <div class="row" id="dateRangeExport" style="display: none;">
                        <div class="col-md-6 mb-3">
                            <label for="exportStartDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="exportStartDate">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exportEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="exportEndDate">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportFormat" class="form-label">Format</label>
                        <select class="form-select" id="exportFormat">
                            <option value="csv">CSV</option>
                            <option value="json">JSON</option>
                            <option value="txt">Plain Text</option>
                            <option value="html">HTML Report</option>
                            <option value="pdf">PDF Report</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exportEmail" class="form-label">Email Export</label>
                        <input type="email" class="form-control" id="exportEmail" placeholder="admin@school.com">
                        <small class="text-muted">Optional: Send export to email address</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeStackTrace" checked>
                            <label class="form-check-label" for="includeStackTrace">Include stack traces</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeMetadata" checked>
                            <label class="form-check-label" for="includeMetadata">Include metadata</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="compressExport">
                            <label class="form-check-label" for="compressExport">Compress export file</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="exportLog()">Export Log</button>
            </div>
        </div>
    </div>
</div>

<!-- Clear Log Modal -->
<div class="modal fade" id="clearModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Clear System Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="bx bx-error me-2"></i>
                    <strong>Warning:</strong> This action will permanently delete log entries and cannot be undone.
                </div>
                
                <form>
                    <div class="mb-3">
                        <label for="clearType" class="form-label">Clear Type</label>
                        <select class="form-select" id="clearType">
                            <option value="all">All Log Entries</option>
                            <option value="older_than">Older Than</option>
                            <option value="level">By Log Level</option>
                            <option value="category">By Category</option>
                            <option value="date_range">Date Range</option>
                        </select>
                    </div>
                    
                    <div class="row" id="clearOptions" style="display: none;">
                        <div class="col-md-6 mb-3">
                            <label for="clearValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="clearValue" placeholder="Enter value...">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="clearUnit" class="form-label">Unit</label>
                            <select class="form-select" id="clearUnit">
                                <option value="hours">Hours</option>
                                <option value="days">Days</option>
                                <option value="weeks">Weeks</option>
                                <option value="months">Months</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="createBackup" checked>
                            <label class="form-check-label" for="createBackup">Create backup before clearing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="confirmClear">
                            <label class="form-check-label" for="confirmClear">I understand this action cannot be undone</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="clearLog()">Clear Log</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('exportType').addEventListener('change', function() {
    const dateRangeExport = document.getElementById('dateRangeExport');
    if (this.value === 'date_range') {
        dateRangeExport.style.display = 'block';
    } else {
        dateRangeExport.style.display = 'none';
    }
});

document.getElementById('clearType').addEventListener('change', function() {
    const clearOptions = document.getElementById('clearOptions');
    if (this.value === 'older_than' || this.value === 'level' || this.value === 'category' || this.value === 'date_range') {
        clearOptions.style.display = 'block';
    } else {
        clearOptions.style.display = 'none';
    }
});

function exportLogEntry() {
    alert('Exporting single log entry...');
    setTimeout(() => {
        alert('Log entry exported successfully!');
    }, 1000);
}

function applyFilter() {
    const filterLevel = document.getElementById('filterLevel').value;
    const filterCategory = document.getElementById('filterCategory').value;
    
    alert(`Applying filters: Level=${filterLevel}, Category=${filterCategory}`);
    document.getElementById('filterModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('Filters applied successfully!');
        location.reload();
    }, 1000);
}

function exportLog() {
    const exportType = document.getElementById('exportType').value;
    const exportFormat = document.getElementById('exportFormat').value;
    
    alert(`Exporting ${exportType} in ${exportFormat} format...`);
    document.getElementById('exportModal').querySelector('.btn-close').click();
    
    setTimeout(() => {
        alert('System log exported successfully!');
    }, 2000);
}

function clearLog() {
    const confirmClear = document.getElementById('confirmClear').checked;
    const clearType = document.getElementById('clearType').value;
    
    if (!confirmClear) {
        alert('Please confirm you understand this action cannot be undone');
        return;
    }
    
    if (confirm(`Are you sure you want to clear ${clearType} log entries?`)) {
        alert(`Clearing ${clearType} log entries...`);
        document.getElementById('clearModal').querySelector('.btn-close').click();
        
        setTimeout(() => {
            alert('System log cleared successfully!');
            location.reload();
        }, 2000);
    }
}
</script>
@endsection
