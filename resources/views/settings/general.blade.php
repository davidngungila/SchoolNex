@extends('layouts.app')

@section('title', 'General Settings')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">General Settings</h5>
            </div>
            <div class="card-body">
                <form>
                    <!-- School Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">School Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="schoolName" class="form-label">School Name *</label>
                                    <input type="text" class="form-control" id="schoolName" value="Excellence Academy" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="schoolCode" class="form-label">School Code</label>
                                    <input type="text" class="form-control" id="schoolCode" value="EA001" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="schoolMotto" class="form-label">School Motto</label>
                                    <input type="text" class="form-control" id="schoolMotto" value="Excellence in Education">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="schoolType" class="form-label">School Type</label>
                                    <select class="form-select" id="schoolType">
                                        <option value="primary" selected>Primary School</option>
                                        <option value="secondary">Secondary School</option>
                                        <option value="combined">Combined (Primary & Secondary)</option>
                                        <option value="college">College</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="establishmentYear" class="form-label">Establishment Year</label>
                                    <input type="number" class="form-control" id="establishmentYear" value="1995" min="1900" max="{{ date('Y') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="schoolAffiliation" class="form-label">Affiliation</label>
                                    <input type="text" class="form-control" id="schoolAffiliation" value="Ministry of Education">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="schoolDescription" class="form-label">School Description</label>
                                <textarea class="form-control" id="schoolDescription" rows="3">Excellence Academy is a premier educational institution dedicated to providing quality education and fostering holistic development of students.</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Contact Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="address" class="form-label">Address *</label>
                                    <input type="text" class="form-control" id="address" value="123 Education Street" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="city" class="form-label">City *</label>
                                    <input type="text" class="form-control" id="city" value="Dar es Salaam" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="postalCode" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" id="postalCode" value="25555">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="region" class="form-label">Region *</label>
                                    <select class="form-select" id="region" required>
                                        <option value="dar" selected>Dar es Salaam</option>
                                        <option value="arusha">Arusha</option>
                                        <option value="mwanza">Mwanza</option>
                                        <option value="mbeya">Mbeya</option>
                                        <option value="dodoma">Dodoma</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" id="country" value="Tanzania">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="website" class="form-label">Website</label>
                                    <input type="url" class="form-control" id="website" value="https://www.excellenceacademy.edu">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control" id="phone" value="+255 22 123 4567" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="mobile" class="form-label">Mobile Number</label>
                                    <input type="tel" class="form-control" id="mobile" value="+255 712 345 678">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" value="info@excellenceacademy.edu" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Academic Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Academic Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="academicYear" class="form-label">Current Academic Year</label>
                                    <select class="form-select" id="academicYear">
                                        <option value="2023-2024" selected>2023-2024</option>
                                        <option value="2024-2025">2024-2025</option>
                                        <option value="2025-2026">2025-2026</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="currentTerm" class="form-label">Current Term</label>
                                    <select class="form-select" id="currentTerm">
                                        <option value="1" selected>Term 1</option>
                                        <option value="2">Term 2</option>
                                        <option value="3">Term 3</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="gradingSystem" class="form-label">Grading System</label>
                                    <select class="form-select" id="gradingSystem">
                                        <option value="percentage" selected>Percentage</option>
                                        <option value="gpa">GPA</option>
                                        <option value="letter">Letter Grades</option>
                                        <option value="custom">Custom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="passingMarks" class="form-label">Passing Marks (%)</label>
                                    <input type="number" class="form-control" id="passingMarks" value="40" min="0" max="100">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="distinctionMarks" class="form-label">Distinction Marks (%)</label>
                                    <input type="number" class="form-control" id="distinctionMarks" value="75" min="0" max="100">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="maxClassSize" class="form-label">Maximum Class Size</label>
                                    <input type="number" class="form-control" id="maxClassSize" value="35" min="1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="schoolDays" class="form-label">School Days</label>
                                    <select class="form-select" id="schoolDays" multiple>
                                        <option value="monday" selected>Monday</option>
                                        <option value="tuesday" selected>Tuesday</option>
                                        <option value="wednesday" selected>Wednesday</option>
                                        <option value="thursday" selected>Thursday</option>
                                        <option value="friday" selected>Friday</option>
                                        <option value="saturday">Saturday</option>
                                        <option value="sunday">Sunday</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="schoolTiming" class="form-label">School Timing</label>
                                    <div class="d-flex gap-2">
                                        <input type="time" class="form-control" id="startTime" value="08:00">
                                        <span class="align-self-center">to</span>
                                        <input type="time" class="form-control" id="endTime" value="15:00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Configuration -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">System Configuration</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="timezone" class="form-label">Timezone</label>
                                    <select class="form-select" id="timezone">
                                        <option value="Africa/Dar_es_Salaam" selected>Africa/Dar es Salaam</option>
                                        <option value="Africa/Nairobi">Africa/Nairobi</option>
                                        <option value="UTC">UTC</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dateFormat" class="form-label">Date Format</label>
                                    <select class="form-select" id="dateFormat">
                                        <option value="d/m/Y" selected>DD/MM/YYYY</option>
                                        <option value="m/d/Y">MM/DD/YYYY</option>
                                        <option value="Y-m-d">YYYY-MM-DD</option>
                                        <option value="d M Y">DD Month YYYY</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="currency" class="form-label">Currency</label>
                                    <select class="form-select" id="currency">
                                        <option value="TZS" selected>Tanzanian Shilling (TZS)</option>
                                        <option value="USD">US Dollar (USD)</option>
                                        <option value="EUR">Euro (EUR)</option>
                                        <option value="GBP">British Pound (GBP)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="language" class="form-label">Default Language</label>
                                    <select class="form-select" id="language">
                                        <option value="en" selected>English</option>
                                        <option value="sw">Swahili</option>
                                        <option value="fr">French</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">System Features</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableSMS" checked>
                                            <label class="form-check-label" for="enableSMS">
                                                Enable SMS Notifications
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableEmail" checked>
                                            <label class="form-check-label" for="enableEmail">
                                                Enable Email Notifications
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableParentPortal" checked>
                                            <label class="form-check-label" for="enableParentPortal">
                                                Enable Parent Portal
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableStudentPortal" checked>
                                            <label class="form-check-label" for="enableStudentPortal">
                                                Enable Student Portal
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableOnlineAdmission">
                                            <label class="form-check-label" for="enableOnlineAdmission">
                                                Enable Online Admission
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableOnlinePayment" checked>
                                            <label class="form-check-label" for="enableOnlinePayment">
                                                Enable Online Payment
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableBiometric" checked>
                                            <label class="form-check-label" for="enableBiometric">
                                                Enable Biometric Attendance
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="enableMobileApp">
                                            <label class="form-check-label" for="enableMobileApp">
                                                Enable Mobile App
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Settings -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Upload Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="schoolLogo" class="form-label">School Logo</label>
                                    <div class="d-flex gap-3 align-items-center">
                                        <img src="{{ asset('assets/img/logo.png') }}" alt="School Logo" class="rounded" style="width: 80px; height: 80px;">
                                        <div>
                                            <input type="file" class="form-control" id="schoolLogo" accept="image/*">
                                            <small class="text-muted">Recommended: 200x200px</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="schoolSignature" class="form-label">School Signature</label>
                                    <div class="d-flex gap-3 align-items-center">
                                        <img src="{{ asset('assets/img/signature.png') }}" alt="School Signature" class="rounded" style="width: 80px; height: 80px;">
                                        <div>
                                            <input type="file" class="form-control" id="schoolSignature" accept="image/*">
                                            <small class="text-muted">For reports and certificates</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="maxFileSize" class="form-label">Maximum File Size (MB)</label>
                                    <input type="number" class="form-control" id="maxFileSize" value="10" min="1" max="100">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="allowedFileTypes" class="form-label">Allowed File Types</label>
                                    <input type="text" class="form-control" id="allowedFileTypes" value="pdf,doc,docx,xls,xlsx,jpg,png" placeholder="Comma separated">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Save Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary">Reset to Default</button>
                        <button type="button" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-success">Save & Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
