@extends('layouts.app')

@section('title', 'System Settings')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">System Settings</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#saveModal">
                        <i class="bx bx-save me-1"></i> Save Changes
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#restartModal">
                        <i class="bx bx-refresh me-1"></i> Restart System
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#maintenanceModal">
                        <i class="bx bx-wrench me-1"></i> Maintenance
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <!-- System Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">System Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="systemName" class="form-label">System Name</label>
                                    <input type="text" class="form-control" id="systemName" value="School Management System">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="systemVersion" class="form-label">System Version</label>
                                    <input type="text" class="form-control" id="systemVersion" value="v2.1.0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="environment" class="form-label">Environment</label>
                                    <select class="form-select" id="environment">
                                        <option value="development">Development</option>
                                        <option value="staging">Staging</option>
                                        <option value="production" selected>Production</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="timezone" class="form-label">System Timezone</label>
                                    <select class="form-select" id="timezone">
                                        <option value="UTC">UTC</option>
                                        <option value="America/New_York">America/New_York</option>
                                        <option value="Europe/London">Europe/London</option>
                                        <option value="Asia/Dubai" selected>Asia/Dubai</option>
                                        <option value="Asia/Kolkata">Asia/Kolkata</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dateFormat" class="form-label">Date Format</label>
                                    <select class="form-select" id="dateFormat">
                                        <option value="Y-m-d" selected>YYYY-MM-DD</option>
                                        <option value="d/m/Y">DD/MM/YYYY</option>
                                        <option value="m/d/Y">MM/DD/YYYY</option>
                                        <option value="d-m-Y">DD-MM-YYYY</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="timeFormat" class="form-label">Time Format</label>
                                    <select class="form-select" id="timeFormat">
                                        <option value="24" selected>24 Hour</option>
                                        <option value="12">12 Hour (AM/PM)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Security Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="sessionTimeout" class="form-label">Session Timeout (minutes)</label>
                                    <input type="number" class="form-control" id="sessionTimeout" value="30" min="5" max="480">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="maxLoginAttempts" class="form-label">Max Login Attempts</label>
                                    <input type="number" class="form-control" id="maxLoginAttempts" value="5" min="3" max="10">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="passwordPolicy" class="form-label">Password Policy</label>
                                    <select class="form-select" id="passwordPolicy">
                                        <option value="weak">Weak (6+ chars)</option>
                                        <option value="medium" selected>Medium (8+ chars, mix)</option>
                                        <option value="strong">Strong (10+ chars, special)</option>
                                        <option value="custom">Custom Policy</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="passwordExpiry" class="form-label">Password Expiry (days)</label>
                                    <input type="number" class="form-control" id="passwordExpiry" value="90" min="0" max="365">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="twoFactorAuth" class="form-label">Two-Factor Authentication</label>
                                    <select class="form-select" id="twoFactorAuth">
                                        <option value="disabled">Disabled</option>
                                        <option value="optional">Optional</option>
                                        <option value="required" selected>Required for Admin</option>
                                        <option value="all">Required for All</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ipRestriction" class="form-label">IP Restriction</label>
                                    <select class="form-select" id="ipRestriction">
                                        <option value="none">No Restriction</option>
                                        <option value="whitelist">Whitelist Only</option>
                                        <option value="blacklist">Blacklist Specific</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableAuditLog" checked>
                                    <label class="form-check-label" for="enableAuditLog">
                                        Enable Audit Logging
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableEncryption" checked>
                                    <label class="form-check-label" for="enableEncryption">
                                        Enable Data Encryption
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableCaptcha" checked>
                                    <label class="form-check-label" for="enableCaptcha">
                                        Enable CAPTCHA on Login
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableBruteForce" checked>
                                    <label class="form-check-label" for="enableBruteForce">
                                        Enable Brute Force Protection
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Database Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Database Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dbConnection" class="form-label">Database Connection</label>
                                    <select class="form-select" id="dbConnection">
                                        <option value="mysql" selected>MySQL</option>
                                        <option value="postgresql">PostgreSQL</option>
                                        <option value="sqlite">SQLite</option>
                                        <option value="sqlserver">SQL Server</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dbHost" class="form-label">Database Host</label>
                                    <input type="text" class="form-control" id="dbHost" value="localhost">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dbName" class="form-label">Database Name</label>
                                    <input type="text" class="form-control" id="dbName" value="schoolmis">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dbPort" class="form-label">Database Port</label>
                                    <input type="number" class="form-control" id="dbPort" value="3306">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="backupFrequency" class="form-label">Backup Frequency</label>
                                    <select class="form-select" id="backupFrequency">
                                        <option value="daily">Daily</option>
                                        <option value="weekly" selected>Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="manual">Manual Only</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="backupRetention" class="form-label">Backup Retention (days)</label>
                                    <input type="number" class="form-control" id="backupRetention" value="30" min="7" max="365">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="autoBackup" checked>
                                    <label class="form-check-label" for="autoBackup">
                                        Enable Automatic Backups
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="compressBackup" checked>
                                    <label class="form-check-label" for="compressBackup">
                                        Compress Backup Files
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="encryptBackup">
                                    <label class="form-check-label" for="encryptBackup">
                                        Encrypt Backup Files
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Performance Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Performance Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cacheEnabled" class="form-label">Cache System</label>
                                    <select class="form-select" id="cacheEnabled">
                                        <option value="disabled">Disabled</option>
                                        <option value="file" selected>File Cache</option>
                                        <option value="redis">Redis</option>
                                        <option value="memcached">Memcached</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cacheDuration" class="form-label">Cache Duration (minutes)</label>
                                    <input type="number" class="form-control" id="cacheDuration" value="60" min="5" max="1440">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="maxUploadSize" class="form-label">Max Upload Size (MB)</label>
                                    <input type="number" class="form-control" id="maxUploadSize" value="10" min="1" max="100">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="maxConcurrentUsers" class="form-label">Max Concurrent Users</label>
                                    <input type="number" class="form-control" id="maxConcurrentUsers" value="100" min="10" max="1000">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="pageLimit" class="form-label">Records Per Page</label>
                                    <input type="number" class="form-control" id="pageLimit" value="25" min="10" max="100">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="queryTimeout" class="form-label">Query Timeout (seconds)</label>
                                    <input type="number" class="form-control" id="queryTimeout" value="30" min="5" max="300">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableLazyLoading" checked>
                                    <label class="form-check-label" for="enableLazyLoading">
                                        Enable Lazy Loading
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableCompression" checked>
                                    <label class="form-check-label" for="enableCompression">
                                        Enable Response Compression
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableMinification">
                                    <label class="form-check-label" for="enableMinification">
                                        Enable Asset Minification
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- API Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">API Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="apiEnabled" class="form-label">API Status</label>
                                    <select class="form-select" id="apiEnabled">
                                        <option value="disabled">Disabled</option>
                                        <option value="read">Read Only</option>
                                        <option value="full" selected>Full Access</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="apiRateLimit" class="form-label">Rate Limit (requests/minute)</label>
                                    <input type="number" class="form-control" id="apiRateLimit" value="100" min="10" max="1000">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="apiKeyExpiry" class="form-label">API Key Expiry (days)</label>
                                    <input type="number" class="form-control" id="apiKeyExpiry" value="365" min="30" max="1095">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="apiVersion" class="form-label">API Version</label>
                                    <select class="form-select" id="apiVersion">
                                        <option value="v1">v1.0</option>
                                        <option value="v2" selected>v2.0</option>
                                        <option value="v3">v3.0 (Beta)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableApiDocs" checked>
                                    <label class="form-check-label" for="enableApiDocs">
                                        Enable API Documentation
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableApiLogging" checked>
                                    <label class="form-check-label" for="enableApiLogging">
                                        Enable API Request Logging
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableCors" checked>
                                    <label class="form-check-label" for="enableCors">
                                        Enable CORS Support
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">System Notifications</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="systemAlerts" class="form-label">System Alerts</label>
                                    <select class="form-select" id="systemAlerts">
                                        <option value="disabled">Disabled</option>
                                        <option value="email" selected>Email Only</option>
                                        <option value="sms">SMS Only</option>
                                        <option value="both">Email & SMS</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="alertLevel" class="form-label">Minimum Alert Level</label>
                                    <select class="form-select" id="alertLevel">
                                        <option value="info">Info</option>
                                        <option value="warning" selected>Warning</option>
                                        <option value="error">Error</option>
                                        <option value="critical">Critical</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="adminEmail" class="form-label">Admin Email</label>
                                    <input type="email" class="form-control" id="adminEmail" value="admin@school.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="supportEmail" class="form-label">Support Email</label>
                                    <input type="email" class="form-control" id="supportEmail" value="support@school.com">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableErrorReporting" checked>
                                    <label class="form-check-label" for="enableErrorReporting">
                                        Enable Automatic Error Reporting
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableSystemHealth" checked>
                                    <label class="form-check-label" for="enableSystemHealth">
                                        Enable System Health Monitoring
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enablePerformanceAlerts" checked>
                                    <label class="form-check-label" for="enablePerformanceAlerts">
                                        Enable Performance Alerts
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Logging Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Logging Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="logLevel" class="form-label">Log Level</label>
                                    <select class="form-select" id="logLevel">
                                        <option value="debug">Debug</option>
                                        <option value="info" selected>Info</option>
                                        <option value="warning">Warning</option>
                                        <option value="error">Error</option>
                                        <option value="critical">Critical</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="logRetention" class="form-label">Log Retention (days)</label>
                                    <input type="number" class="form-control" id="logRetention" value="30" min="7" max="365">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="logFormat" class="form-label">Log Format</label>
                                    <select class="form-select" id="logFormat">
                                        <option value="text" selected>Plain Text</option>
                                        <option value="json">JSON</option>
                                        <option value="xml">XML</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="logStorage" class="form-label">Log Storage</label>
                                    <select class="form-select" id="logStorage">
                                        <option value="file" selected>File System</option>
                                        <option value="database">Database</option>
                                        <option value="syslog">System Log</option>
                                        <option value="cloud">Cloud Storage</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableUserLogging" checked>
                                    <label class="form-check-label" for="enableUserLogging">
                                        Enable User Activity Logging
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableSystemLogging" checked>
                                    <label class="form-check-label" for="enableSystemLogging">
                                        Enable System Event Logging
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableSecurityLogging" checked>
                                    <label class="form-check-label" for="enableSecurityLogging">
                                        Enable Security Event Logging
                                    </label>
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
                <h5 class="modal-title">Save System Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="restartRequired" class="form-label">System Restart Required</label>
                    <div class="alert alert-warning">
                        <i class="bx bx-error me-2"></i>
                        Some settings require a system restart to take effect.
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoRestart">
                        <label class="form-check-label" for="autoRestart">
                            Restart system automatically after saving
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="backupBeforeSave" class="form-label">Backup Configuration</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="backupBeforeSave" checked>
                        <label class="form-check-label" for="backupBeforeSave">
                            Create configuration backup before saving
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="saveNotes" class="form-label">Change Notes</label>
                    <textarea class="form-control" id="saveNotes" rows="2" placeholder="Describe the changes made...">Updated security settings and performance configurations</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveSettings()">Save Settings</button>
            </div>
        </div>
    </div>
</div>

<!-- Restart System Modal -->
<div class="modal fade" id="restartModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Restart System</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="bx bx-error me-2"></i>
                    <strong>Warning:</strong> Restarting the system will disconnect all active users and temporarily make the system unavailable.
                </div>
                <div class="mb-3">
                    <label for="restartType" class="form-label">Restart Type</label>
                    <select class="form-select" id="restartType">
                        <option value="graceful">Graceful Restart (Recommended)</option>
                        <option value="force">Force Restart</option>
                        <option value="services">Restart Services Only</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="restartDelay" class="form-label">Restart Delay (minutes)</label>
                    <input type="number" class="form-control" id="restartDelay" value="5" min="0" max="60">
                    <small class="text-muted">Time to wait before restarting to allow users to save work</small>
                </div>
                <div class="mb-3">
                    <label for="notifyUsers" class="form-label">Notify Users</label>
                    <select class="form-select" id="notifyUsers">
                        <option value="immediate">Immediate Notification</option>
                        <option value="scheduled" selected>Scheduled Notification</option>
                        <option value="none">No Notification</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="notificationMessage" class="form-label">Notification Message</label>
                    <textarea class="form-control" id="notificationMessage" rows="2" placeholder="Message to send to users...">The system will be restarted for maintenance. Please save your work and log out before the restart time.</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning" onclick="restartSystem()">Restart System</button>
            </div>
        </div>
    </div>
</div>

<!-- Maintenance Modal -->
<div class="modal fade" id="maintenanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">System Maintenance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Quick Actions</h6>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary" onclick="clearCache()">
                                <i class="bx bx-trash me-2"></i> Clear System Cache
                            </button>
                            <button type="button" class="btn btn-outline-primary" onclick="optimizeDatabase()">
                                <i class="bx bx-wrench me-2"></i> Optimize Database
                            </button>
                            <button type="button" class="btn btn-outline-primary" onclick="cleanLogs()">
                                <i class="bx bx-clean me-2"></i> Clean Old Logs
                            </button>
                            <button type="button" class="btn btn-outline-primary" onclick="checkUpdates()">
                                <i class="bx bx-download me-2"></i> Check for Updates
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Scheduled Maintenance</h6>
                        <div class="mb-3">
                            <label for="maintenanceMode" class="form-label">Maintenance Mode</label>
                            <select class="form-select" id="maintenanceMode">
                                <option value="off">Off</option>
                                <option value="scheduled">Scheduled</option>
                                <option value="on">On Now</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="maintenanceSchedule" class="form-label">Maintenance Schedule</label>
                            <input type="datetime-local" class="form-control" id="maintenanceSchedule">
                        </div>
                        <div class="mb-3">
                            <label for="maintenanceDuration" class="form-label">Duration (hours)</label>
                            <input type="number" class="form-control" id="maintenanceDuration" value="2" min="1" max="24">
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6>System Health Status</h6>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Component</th>
                                    <th>Status</th>
                                    <th>Last Check</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Database Connection</td>
                                    <td><span class="badge bg-success">Healthy</span></td>
                                    <td>{{ date('H:i:s') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="testConnection('database')">
                                            Test
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cache System</td>
                                    <td><span class="badge bg-success">Healthy</span></td>
                                    <td>{{ date('H:i:s') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="testConnection('cache')">
                                            Test
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>File Storage</td>
                                    <td><span class="badge bg-warning">Warning</span></td>
                                    <td>{{ date('H:i:s') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="testConnection('storage')">
                                            Test
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email Service</td>
                                    <td><span class="badge bg-success">Healthy</span></td>
                                    <td>{{ date('H:i:s') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="testConnection('email')">
                                            Test
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="runMaintenance()">Run Maintenance</button>
            </div>
        </div>
    </div>
</div>

<script>
function saveSettings() {
    const autoRestart = document.getElementById('autoRestart').checked;
    const backupBeforeSave = document.getElementById('backupBeforeSave').checked;
    
    if (backupBeforeSave) {
        alert('Creating configuration backup...');
    }
    
    alert('Saving system settings...');
    
    if (autoRestart) {
        setTimeout(() => {
            alert('System will restart in 5 minutes...');
        }, 2000);
    } else {
        setTimeout(() => {
            alert('System settings saved successfully!');
        }, 2000);
    }
    
    document.getElementById('saveModal').querySelector('.btn-close').click();
}

function restartSystem() {
    const restartType = document.getElementById('restartType').value;
    const restartDelay = document.getElementById('restartDelay').value;
    const notifyUsers = document.getElementById('notifyUsers').value;
    
    if (confirm(`Are you sure you want to ${restartType} restart the system?`)) {
        alert(`System will ${restartType} restart in ${restartDelay} minutes...`);
        
        if (notifyUsers !== 'none') {
            alert(`Notifying users about the restart...`);
        }
        
        document.getElementById('restartModal').querySelector('.btn-close').click();
    }
}

function clearCache() {
    alert('Clearing system cache...');
    setTimeout(() => {
        alert('System cache cleared successfully!');
    }, 1500);
}

function optimizeDatabase() {
    alert('Optimizing database...');
    setTimeout(() => {
        alert('Database optimization completed!');
    }, 2000);
}

function cleanLogs() {
    alert('Cleaning old log files...');
    setTimeout(() => {
        alert('Log files cleaned successfully!');
    }, 1500);
}

function checkUpdates() {
    alert('Checking for system updates...');
    setTimeout(() => {
        alert('No updates available. System is up to date!');
    }, 2000);
}

function testConnection(component) {
    alert(`Testing ${component} connection...`);
    setTimeout(() => {
        alert(`${component} connection test completed successfully!`);
    }, 1000);
}

function runMaintenance() {
    const maintenanceMode = document.getElementById('maintenanceMode').value;
    const maintenanceSchedule = document.getElementById('maintenanceSchedule').value;
    
    if (maintenanceMode === 'on') {
        alert('System is now in maintenance mode!');
    } else if (maintenanceMode === 'scheduled' && maintenanceSchedule) {
        alert(`Maintenance scheduled for ${maintenanceSchedule}`);
    } else {
        alert('Running maintenance tasks...');
        setTimeout(() => {
            alert('Maintenance completed successfully!');
        }, 3000);
    }
    
    document.getElementById('maintenanceModal').querySelector('.btn-close').click();
}
</script>
@endsection
