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
                        <h6>Log Information</h6>
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
                        <h6>Additional Information</h6>
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

<script>
function exportLogEntry() {
    alert('Exporting single log entry...');
    setTimeout(() => {
        alert('Log entry exported successfully!');
    }, 1000);
}
</script>
@endsection
