@extends('layouts.app')

@section('title', 'SMS Settings')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">SMS Settings</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#testModal">
                        <i class="bx bx-test-tube me-1"></i> Test SMS
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#balanceModal">
                        <i class="bx bx-dollar me-1"></i> Check Balance
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#providerModal">
                        <i class="bx bx-cog me-1"></i> Provider Settings
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Settings Tabs -->
                <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">General Settings</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="gateway-tab" data-bs-toggle="tab" data-bs-target="#gateway" type="button" role="tab">Gateway Settings</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sender-tab" data-bs-toggle="tab" data-bs-target="#sender" type="button" role="tab">Sender IDs</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="restrictions-tab" data-bs-toggle="tab" data-bs-target="#restrictions" type="button" role="tab">Restrictions</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab">Notifications</button>
                    </li>
                </ul>
                
                <div class="tab-content" id="settingsTabContent">
                    <!-- General Settings Tab -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="defaultSender" class="form-label">Default Sender ID</label>
                                    <select class="form-select" id="defaultSender">
                                        <option value="SCHOOL" selected>SCHOOL</option>
                                        <option value="EDU">EDU</option>
                                        <option value="SCHMIS">SCHMIS</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="defaultPriority" class="form-label">Default Priority</label>
                                    <select class="form-select" id="defaultPriority">
                                        <option value="normal" selected>Normal</option>
                                        <option value="high">High</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="maxRecipients" class="form-label">Max Recipients per SMS</label>
                                    <input type="number" class="form-control" id="maxRecipients" min="1" max="1000" value="100">
                                    <small class="text-muted">Maximum number of recipients for a single SMS</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="retryAttempts" class="form-label">Retry Attempts</label>
                                    <input type="number" class="form-control" id="retryAttempts" min="0" max="5" value="3">
                                    <small class="text-muted">Number of retry attempts for failed SMS</small>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="retryDelay" class="form-label">Retry Delay (minutes)</label>
                                    <input type="number" class="form-control" id="retryDelay" min="1" max="60" value="5">
                                    <small class="text-muted">Delay between retry attempts</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="expiryHours" class="form-label">SMS Expiry (hours)</label>
                                    <input type="number" class="form-control" id="expiryHours" min="1" max="168" value="24">
                                    <small class="text-muted">Hours before SMS expires</small>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableUnicode" checked>
                                    <label class="form-check-label" for="enableUnicode">
                                        Enable Unicode support (for special characters)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableLongSMS" checked>
                                    <label class="form-check-label" for="enableLongSMS">
                                        Enable long SMS (concatenated messages)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableDeliveryReport" checked>
                                    <label class="form-check-label" for="enableDeliveryReport">
                                        Enable delivery reports by default
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableQueue">
                                    <label class="form-check-label" for="enableQueue">
                                        Enable SMS queue for bulk sending
                                    </label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="saveGeneralSettings()">Save Settings</button>
                                    <button type="button" class="btn btn-outline-secondary" onclick="resetGeneralSettings()">Reset to Default</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Gateway Settings Tab -->
                    <div class="tab-pane fade" id="gateway" role="tabpanel">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="primaryGateway" class="form-label">Primary Gateway</label>
                                    <select class="form-select" id="primaryGateway">
                                        <option value="twilio" selected>Twilio</option>
                                        <option value="nexmo">Nexmo</option>
                                        <option value="clickatell">Clickatell</option>
                                        <option value="messagebird">MessageBird</option>
                                        <option value="custom">Custom Gateway</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fallbackGateway" class="form-label">Fallback Gateway</label>
                                    <select class="form-select" id="fallbackGateway">
                                        <option value="none">None</option>
                                        <option value="nexmo" selected>Nexmo</option>
                                        <option value="clickatell">Clickatell</option>
                                        <option value="messagebird">MessageBird</option>
                                        <option value="custom">Custom Gateway</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h6 class="mb-0">Twilio Configuration</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="twilioSid" class="form-label">Account SID</label>
                                            <input type="text" class="form-control" id="twilioSid" placeholder="ACxxxxxxxxxxxxxxxxxxxxxxxxxxxxx">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="twilioToken" class="form-label">Auth Token</label>
                                            <input type="password" class="form-control" id="twilioToken" placeholder="your_auth_token">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="twilioNumber" class="form-label">From Number</label>
                                            <input type="tel" class="form-control" id="twilioNumber" placeholder="+1234567890">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="twilioRegion" class="form-label">Region</label>
                                            <select class="form-select" id="twilioRegion">
                                                <option value="us1" selected>US1</option>
                                                <option value="us2">US2</option>
                                                <option value="eu1">EU1</option>
                                                <option value="ap1">AP1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h6 class="mb-0">API Settings</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="apiTimeout" class="form-label">API Timeout (seconds)</label>
                                            <input type="number" class="form-control" id="apiTimeout" min="5" max="120" value="30">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="rateLimit" class="form-label">Rate Limit (SMS/second)</label>
                                            <input type="number" class="form-control" id="rateLimit" min="1" max="100" value="10">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableWebhook" checked>
                                            <label class="form-check-label" for="enableWebhook">
                                                Enable webhook notifications
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableLogging" checked>
                                            <label class="form-check-label" for="enableLogging">
                                                Enable API logging
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="testGateway()">Test Connection</button>
                                    <button type="button" class="btn btn-success" onclick="saveGatewaySettings()">Save Settings</button>
                                    <button type="button" class="btn btn-outline-secondary" onclick="resetGatewaySettings()">Reset to Default</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Sender IDs Tab -->
                    <div class="tab-pane fade" id="sender" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6>Sender ID Management</h6>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSenderModal">
                                <i class="bx bx-plus me-1"></i> Add Sender ID
                            </button>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sender ID</th>
                                        <th>Status</th>
                                        <th>Gateway</th>
                                        <th>Created Date</th>
                                        <th>Usage Count</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>SCHOOL</strong></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>Twilio</td>
                                        <td>{{ date('Y-m-d') }}</td>
                                        <td>1,234</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-warning">Test</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">Deactivate</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>EDU</strong></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>Twilio</td>
                                        <td>{{ date('Y-m-d', strtotime('-1 week')) }}</td>
                                        <td>567</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-warning">Test</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">Deactivate</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>SCHMIS</strong></td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>Twilio</td>
                                        <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                        <td>0</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-warning">Test</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">Cancel</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Restrictions Tab -->
                    <div class="tab-pane fade" id="restrictions" role="tabpanel">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dailyLimit" class="form-label">Daily SMS Limit</label>
                                    <input type="number" class="form-control" id="dailyLimit" min="0" value="1000">
                                    <small class="text-muted">Maximum SMS per day (0 = unlimited)</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="monthlyLimit" class="form-label">Monthly SMS Limit</label>
                                    <input type="number" class="form-control" id="monthlyLimit" min="0" value="30000">
                                    <small class="text-muted">Maximum SMS per month (0 = unlimited)</small>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="userDailyLimit" class="form-label">User Daily Limit</label>
                                    <input type="number" class="form-control" id="userDailyLimit" min="0" value="100">
                                    <small class="text-muted">Maximum SMS per user per day</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="userMonthlyLimit" class="form-label">User Monthly Limit</label>
                                    <input type="number" class="form-control" id="userMonthlyLimit" min="0" value="1000">
                                    <small class="text-muted">Maximum SMS per user per month</small>
                                </div>
                            </div>
                            
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h6 class="mb-0">Time Restrictions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="quietHoursStart" class="form-label">Quiet Hours Start</label>
                                            <input type="time" class="form-control" id="quietHoursStart" value="22:00">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="quietHoursEnd" class="form-label">Quiet Hours End</label>
                                            <input type="time" class="form-control" id="quietHoursEnd" value="07:00">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableQuietHours">
                                            <label class="form-check-label" for="enableQuietHours">
                                                Enable quiet hours (no SMS during specified time)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="allowUrgentDuringQuiet" checked>
                                            <label class="form-check-label" for="allowUrgentDuringQuiet">
                                                Allow urgent SMS during quiet hours
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h6 class="mb-0">Content Restrictions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="blockedWords" class="form-label">Blocked Words</label>
                                        <textarea class="form-control" id="blockedWords" rows="3" placeholder="Enter blocked words separated by commas"></textarea>
                                        <small class="text-muted">SMS containing these words will be blocked</small>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableContentFilter">
                                            <label class="form-check-label" for="enableContentFilter">
                                                Enable content filtering
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableSpamDetection">
                                            <label class="form-check-label" for="enableSpamDetection">
                                                Enable spam detection
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="saveRestrictions()">Save Settings</button>
                                    <button type="button" class="btn btn-outline-secondary" onclick="resetRestrictions()">Reset to Default</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications" role="tabpanel">
                        <form>
                            <div class="mb-3">
                                <h6>Low Balance Alerts</h6>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="lowBalanceThreshold" class="form-label">Low Balance Threshold</label>
                                        <input type="number" class="form-control" id="lowBalanceThreshold" min="0" value="100">
                                        <small class="text-muted">Alert when balance falls below this amount</small>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="criticalBalanceThreshold" class="form-label">Critical Balance Threshold</label>
                                        <input type="number" class="form-control" id="criticalBalanceThreshold" min="0" value="50">
                                        <small class="text-muted">Critical alert threshold</small>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="balanceAlertEmail" class="form-label">Alert Email</label>
                                        <input type="email" class="form-control" id="balanceAlertEmail" placeholder="admin@school.com">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <h6>Failed SMS Alerts</h6>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="failureThreshold" class="form-label">Failure Threshold</label>
                                        <input type="number" class="form-control" id="failureThreshold" min="1" max="100" value="10">
                                        <small class="text-muted">Alert when failure rate exceeds this percentage</small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="failureTimeWindow" class="form-label">Time Window (minutes)</label>
                                        <input type="number" class="form-control" id="failureTimeWindow" min="5" max="1440" value="60">
                                        <small class="text-muted">Time window to check failure rate</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <h6>Notification Methods</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="notifyEmail" checked>
                                    <label class="form-check-label" for="notifyEmail">
                                        Email notifications
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="notifySMS">
                                    <label class="form-check-label" for="notifySMS">
                                        SMS notifications
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="notifyDashboard" checked>
                                    <label class="form-check-label" for="notifyDashboard">
                                        Dashboard notifications
                                    </label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="saveNotificationSettings()">Save Settings</button>
                                    <button type="button" class="btn btn-outline-secondary" onclick="resetNotificationSettings()">Reset to Default</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Sender Modal -->
<div class="modal fade" id="addSenderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Sender ID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="senderId" class="form-label">Sender ID *</label>
                        <input type="text" class="form-control" id="senderId" placeholder="Enter sender ID" required>
                        <small class="text-muted">3-11 characters, alphanumeric only</small>
                    </div>
                    <div class="mb-3">
                        <label for="senderDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="senderDescription" placeholder="Enter description">
                    </div>
                    <div class="mb-3">
                        <label for="senderGateway" class="form-label">Gateway *</label>
                        <select class="form-select" id="senderGateway" required>
                            <option value="twilio">Twilio</option>
                            <option value="nexmo">Nexmo</option>
                            <option value="clickatell">Clickatell</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="senderPurpose" class="form-label">Purpose</label>
                        <select class="form-select" id="senderPurpose">
                            <option value="general">General</option>
                            <option value="academic">Academic</option>
                            <option value="finance">Finance</option>
                            <option value="emergency">Emergency</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Sender ID</button>
            </div>
        </div>
    </div>
</div>

<!-- Test SMS Modal -->
<div class="modal fade" id="testModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Test SMS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="testNumber" class="form-label">Test Number *</label>
                        <input type="tel" class="form-control" id="testNumber" placeholder="+255712345678" required>
                    </div>
                    <div class="mb-3">
                        <label for="testMessage" class="form-label">Test Message</label>
                        <textarea class="form-control" id="testMessage" rows="3" placeholder="This is a test message from the SMS system.">This is a test message from the SMS system.</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="testSender" class="form-label">Sender ID</label>
                        <select class="form-select" id="testSender">
                            <option value="SCHOOL" selected>SCHOOL</option>
                            <option value="EDU">EDU</option>
                            <option value="SCHMIS">SCHMIS</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="sendTestSMS()">Send Test SMS</button>
            </div>
        </div>
    </div>
</div>

<!-- Balance Modal -->
<div class="modal fade" id="balanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SMS Balance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h2 class="text-primary">$1,234.56</h2>
                    <p class="text-muted">Current Balance</p>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="text-center">
                            <h5 class="text-success">24,691</h5>
                            <small class="text-muted">SMS Available</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center">
                            <h5 class="text-info">$0.05</h5>
                            <small class="text-muted">Cost per SMS</small>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Balance History</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ date('Y-m-d') }}</td>
                                        <td><span class="badge bg-success">Recharge</span></td>
                                        <td>+$500.00</td>
                                        <td>$1,234.56</td>
                                    </tr>
                                    <tr>
                                        <td>{{ date('Y-m-d', strtotime('-1 week')) }}</td>
                                        <td><span class="badge bg-danger">Usage</span></td>
                                        <td>-$234.50</td>
                                        <td>$734.56</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Rebalance Account</button>
            </div>
        </div>
    </div>
</div>

<!-- Provider Settings Modal -->
<div class="modal fade" id="providerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Provider Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Provider Status</h6>
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Twilio</span>
                                    <span class="badge bg-success">Active</span>
                                </div>
                                <small class="text-muted">Last check: {{ date('H:i') }}</small>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Nexmo</span>
                                    <span class="badge bg-warning">Fallback</span>
                                </div>
                                <small class="text-muted">Last check: {{ date('H:i', strtotime('-1 hour')) }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Performance Metrics</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Avg Delivery Time:</strong></td>
                                <td>2.3 seconds</td>
                            </tr>
                            <tr>
                                <td><strong>Success Rate:</strong></td>
                                <td>98.5%</td>
                            </tr>
                            <tr>
                                <td><strong>API Response Time:</strong></td>
                                <td>0.8 seconds</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Check All Providers</button>
            </div>
        </div>
    </div>
</div>

<script>
function saveGeneralSettings() {
    alert('General settings saved successfully!');
}

function resetGeneralSettings() {
    if (confirm('Are you sure you want to reset to default settings?')) {
        alert('General settings reset to default!');
    }
}

function testGateway() {
    alert('Testing gateway connection...');
    setTimeout(() => {
        alert('Gateway connection successful!');
    }, 2000);
}

function saveGatewaySettings() {
    alert('Gateway settings saved successfully!');
}

function resetGatewaySettings() {
    if (confirm('Are you sure you want to reset to default settings?')) {
        alert('Gateway settings reset to default!');
    }
}

function saveRestrictions() {
    alert('Restriction settings saved successfully!');
}

function resetRestrictions() {
    if (confirm('Are you sure you want to reset to default settings?')) {
        alert('Restriction settings reset to default!');
    }
}

function saveNotificationSettings() {
    alert('Notification settings saved successfully!');
}

function resetNotificationSettings() {
    if (confirm('Are you sure you want to reset to default settings?')) {
        alert('Notification settings reset to default!');
    }
}

function sendTestSMS() {
    const number = document.getElementById('testNumber').value;
    const message = document.getElementById('testMessage').value;
    
    if (!number || !message) {
        alert('Please fill in all required fields');
        return;
    }
    
    alert('Test SMS sent to ' + number);
    document.getElementById('testModal').querySelector('.btn-close').click();
}
</script>
@endsection
