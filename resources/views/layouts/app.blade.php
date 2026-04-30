<!doctype html>
<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title', 'School Management System') | School MIS</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('dashboard') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <span class="text-primary">
                               
                            </span>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">SchoolNex</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
                    </a>
                </div>

                <div class="menu-divider mt-0"></div>
                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-smile"></i>
                            <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>

                    <!-- Academic Management -->
                   
                    
                    <li class="menu-item {{ request()->routeIs('students.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div class="text-truncate" data-i18n="Students">Students</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('students.index') }}" class="menu-link">
                                    <div class="text-truncate">All Students</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('students.admission') }}" class="menu-link">
                                    <div class="text-truncate">Admission</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('students.profile') }}" class="menu-link">
                                    <div class="text-truncate">Student Profiles</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('students.promotion') }}" class="menu-link">
                                    <div class="text-truncate">Promotion</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('students.transfer') }}" class="menu-link">
                                    <div class="text-truncate">Transfer</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('teachers.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-group"></i>
                            <div class="text-truncate" data-i18n="Teachers">Teachers</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('teachers.index') }}" class="menu-link">
                                    <div class="text-truncate">All Teachers</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('teachers.recruitment') }}" class="menu-link">
                                    <div class="text-truncate">Recruitment</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('teachers.schedule') }}" class="menu-link">
                                    <div class="text-truncate">Teacher Schedule</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('teachers.performance') }}" class="menu-link">
                                    <div class="text-truncate">Performance</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('teachers.payroll') }}" class="menu-link">
                                    <div class="text-truncate">Payroll</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="menu-item {{ request()->routeIs('subjects.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-book"></i>
                            <div class="text-truncate" data-i18n="Subjects">Subjects</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('subjects.index') }}" class="menu-link">
                                    <div class="text-truncate">All Subjects</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('subjects.create') }}" class="menu-link">
                                    <div class="text-truncate">Add Subject</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('subjects.assign') }}" class="menu-link">
                                    <div class="text-truncate">Subject Assignment</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('subjects.schedule') }}" class="menu-link">
                                    <div class="text-truncate">Subject Schedule</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('attendance.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user-check"></i>
                            <div class="text-truncate" data-i18n="Attendance">Attendance</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('attendance.index') }}" class="menu-link">
                                    <div class="text-truncate">Daily Attendance</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('attendance.take') }}" class="menu-link">
                                    <div class="text-truncate">Take Attendance</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('attendance.report') }}" class="menu-link">
                                    <div class="text-truncate">Attendance Report</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('attendance.summary') }}" class="menu-link">
                                    <div class="text-truncate">Attendance Summary</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('timetable.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-calendar"></i>
                            <div class="text-truncate" data-i18n="Timetable">Timetable</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('timetable.index') }}" class="menu-link">
                                    <div class="text-truncate">View Timetable</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('timetable.create') }}" class="menu-link">
                                    <div class="text-truncate">Create Timetable</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('timetable.class') }}" class="menu-link">
                                    <div class="text-truncate">Class Timetable</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('timetable.teacher') }}" class="menu-link">
                                    <div class="text-truncate">Teacher Timetable</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('timetable.exam') }}" class="menu-link">
                                    <div class="text-truncate">Exam Timetable</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('class-journal.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-note"></i>
                            <div class="text-truncate" data-i18n="Class Journal">Class Journal</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('class-journal.index') }}" class="menu-link">
                                    <div class="text-truncate">View Journals</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('class-journal.create') }}" class="menu-link">
                                    <div class="text-truncate">Create Entry</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('class-journal.class') }}" class="menu-link">
                                    <div class="text-truncate">Class Journal</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('class-journal.subject') }}" class="menu-link">
                                    <div class="text-truncate">Subject Journal</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('class-journal.report') }}" class="menu-link">
                                    <div class="text-truncate">Journal Report</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('exams.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div class="text-truncate" data-i18n="Exams">Exams</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('exams.schedule') }}" class="menu-link">
                                    <div class="text-truncate">Exam Schedule</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('exams.results') }}" class="menu-link">
                                    <div class="text-truncate">Results</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('exams.grading') }}" class="menu-link">
                                    <div class="text-truncate">Grading</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('exams.certificates') }}" class="menu-link">
                                    <div class="text-truncate">Certificates</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- School Resources -->
                  
                    
                    <li class="menu-item {{ request()->routeIs('library.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-library"></i>
                            <div class="text-truncate" data-i18n="Library">Library</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('library.books') }}" class="menu-link">
                                    <div class="text-truncate">Books Catalog</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('library.issuance') }}" class="menu-link">
                                    <div class="text-truncate">Book Issuance</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('library.return') }}" class="menu-link">
                                    <div class="text-truncate">Book Return</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('library.fine') }}" class="menu-link">
                                    <div class="text-truncate">Fine Management</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('inventory.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-package"></i>
                            <div class="text-truncate" data-i18n="Inventory">Inventory</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('inventory.items') }}" class="menu-link">
                                    <div class="text-truncate">Items</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('inventory.purchase') }}" class="menu-link">
                                    <div class="text-truncate">Purchase</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('inventory.issue') }}" class="menu-link">
                                    <div class="text-truncate">Issue/Return</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('inventory.stock') }}" class="menu-link">
                                    <div class="text-truncate">Stock Management</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('transport.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-bus"></i>
                            <div class="text-truncate" data-i18n="Transport">Transport</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('transport.vehicles') }}" class="menu-link">
                                    <div class="text-truncate">Vehicles</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('transport.routes') }}" class="menu-link">
                                    <div class="text-truncate">Routes</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('transport.assignment') }}" class="menu-link">
                                    <div class="text-truncate">Student Assignment</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('transport.tracking') }}" class="menu-link">
                                    <div class="text-truncate">Live Tracking</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('hostel.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-building"></i>
                            <div class="text-truncate" data-i18n="Hostel">Hostel</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('hostel.rooms') }}" class="menu-link">
                                    <div class="text-truncate">Room Management</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('hostel.allocation') }}" class="menu-link">
                                    <div class="text-truncate">Student Allocation</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('hostel.attendance') }}" class="menu-link">
                                    <div class="text-truncate">Hostel Attendance</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('hostel.maintenance') }}" class="menu-link">
                                    <div class="text-truncate">Maintenance</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Finance Management -->
                  
                    
                    <li class="menu-item {{ request()->routeIs('finance.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dollar"></i>
                            <div class="text-truncate" data-i18n="Finance">Finance</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('finance.index') }}" class="menu-link">
                                    <div class="text-truncate">Dashboard</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('finance.transactions') }}" class="menu-link">
                                    <div class="text-truncate">Transactions</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('finance.expenses') }}" class="menu-link">
                                    <div class="text-truncate">Expenses</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('finance.income') }}" class="menu-link">
                                    <div class="text-truncate">Income</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('finance.budget') }}" class="menu-link">
                                    <div class="text-truncate">Budget Management</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('finance.reports') }}" class="menu-link">
                                    <div class="text-truncate">Financial Reports</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('finance.audit') }}" class="menu-link">
                                    <div class="text-truncate">Audit Trail</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('fees.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-credit-card"></i>
                            <div class="text-truncate" data-i18n="Fees">Fees</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('fees.structure') }}" class="menu-link">
                                    <div class="text-truncate">Fee Structure</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('fees.collection') }}" class="menu-link">
                                    <div class="text-truncate">Fee Collection</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('fees.dues') }}" class="menu-link">
                                    <div class="text-truncate">Pending Dues</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('fees.receipts') }}" class="menu-link">
                                    <div class="text-truncate">Receipts</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Communication -->
                   
                    
                    <li class="menu-item {{ request()->routeIs('messages.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-envelope"></i>
                            <div class="text-truncate" data-i18n="Messages">Messages</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('messages.inbox') }}" class="menu-link">
                                    <div class="text-truncate">Inbox</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('messages.compose') }}" class="menu-link">
                                    <div class="text-truncate">Compose</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('messages.sent') }}" class="menu-link">
                                    <div class="text-truncate">Sent</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('messages.notifications') }}" class="menu-link">
                                    <div class="text-truncate">Notifications</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('sms.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-mobile"></i>
                            <div class="text-truncate" data-i18n="SMS">SMS</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('sms.send') }}" class="menu-link">
                                    <div class="text-truncate">Send SMS</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('sms.templates') }}" class="menu-link">
                                    <div class="text-truncate">Templates</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('sms.history') }}" class="menu-link">
                                    <div class="text-truncate">SMS History</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('sms.settings') }}" class="menu-link">
                                    <div class="text-truncate">Settings</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Reports & Analytics -->
                  
                    
                    <li class="menu-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-chart"></i>
                            <div class="text-truncate" data-i18n="Reports">Reports</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('reports.academic') }}" class="menu-link">
                                    <div class="text-truncate">Academic Reports</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('reports.attendance') }}" class="menu-link">
                                    <div class="text-truncate">Attendance Reports</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('reports.finance') }}" class="menu-link">
                                    <div class="text-truncate">Financial Reports</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('reports.students') }}" class="menu-link">
                                    <div class="text-truncate">Student Reports</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('reports.teachers') }}" class="menu-link">
                                    <div class="text-truncate">Teacher Reports</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('reports.custom') }}" class="menu-link">
                                    <div class="text-truncate">Custom Reports</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('analytics.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-pie-chart"></i>
                            <div class="text-truncate" data-i18n="Analytics">Analytics</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('analytics.dashboard') }}" class="menu-link">
                                    <div class="text-truncate">Analytics Dashboard</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('analytics.performance') }}" class="menu-link">
                                    <div class="text-truncate">Performance Metrics</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('analytics.trends') }}" class="menu-link">
                                    <div class="text-truncate">Trends Analysis</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('analytics.predictions') }}" class="menu-link">
                                    <div class="text-truncate">Predictions</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Administration -->
                   
                    
                    <li class="menu-item {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div class="text-truncate" data-i18n="Settings">Settings</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('settings.general') }}" class="menu-link">
                                    <div class="text-truncate">General Settings</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('settings.academic') }}" class="menu-link">
                                    <div class="text-truncate">Academic Settings</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('settings.system') }}" class="menu-link">
                                    <div class="text-truncate">System Settings</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('settings.email') }}" class="menu-link">
                                    <div class="text-truncate">Email Settings</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('settings.backup') }}" class="menu-link">
                                    <div class="text-truncate">Backup & Restore</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user-plus"></i>
                            <div class="text-truncate" data-i18n="Users">Users</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('users.index') }}" class="menu-link">
                                    <div class="text-truncate">All Users</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('users.roles') }}" class="menu-link">
                                    <div class="text-truncate">Roles & Permissions</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('users.activity') }}" class="menu-link">
                                    <div class="text-truncate">User Activity</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs('audit.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-history"></i>
                            <div class="text-truncate" data-i18n="Audit">Audit Log</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('audit.log') }}" class="menu-link">
                                    <div class="text-truncate">System Log</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('audit.login') }}" class="menu-link">
                                    <div class="text-truncate">Login History</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('audit.changes') }}" class="menu-link">
                                    <div class="text-truncate">Data Changes</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="icon-base bx bx-menu icon-md"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center me-auto">
                            <div class="nav-item d-flex align-items-center">
                                <span class="w-px-22 h-px-22"><i class="icon-base bx bx-search icon-md"></i></span>
                                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2 d-md-block d-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Admin User</h6>
                                                    <small class="text-body-secondary">Administrator</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                                            <i class="icon-base bx bx-user icon-md me-3"></i><span>My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('settings.general') }}">
                                            <i class="icon-base bx bx-cog icon-md me-3"></i><span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    © {{ date('Y') }}, School Management System
                                </div>
                                <div class="d-none d-lg-inline-block">
                                    <span class="footer-text">Powered by <a href="https://jezdantech.com" target="_blank" class="text-decoration-none">Jezdan Technology</a></span>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>
</html>
