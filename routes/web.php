<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Dashboard Route
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Subject Management Routes
Route::prefix('subjects')->name('subjects.')->group(function () {
    Route::get('/', function () {
        return view('subjects.index');
    })->name('index');
    Route::get('/create', function () {
        return view('subjects.create');
    })->name('create');
    Route::get('/assign', function () {
        return view('subjects.assign');
    })->name('assign');
    Route::get('/schedule', function () {
        return view('subjects.schedule');
    })->name('schedule');
});

// Attendance Management Routes
Route::prefix('attendance')->name('attendance.')->group(function () {
    Route::get('/', function () {
        return view('attendance.index');
    })->name('index');
    Route::get('/take', function () {
        return view('attendance.take');
    })->name('take');
    Route::get('/report', function () {
        return view('attendance.report');
    })->name('report');
    Route::get('/summary', function () {
        return view('attendance.summary');
    })->name('summary');
});

// Timetable Management Routes
Route::prefix('timetable')->name('timetable.')->group(function () {
    Route::get('/', function () {
        return view('timetable.index');
    })->name('index');
    Route::get('/create', function () {
        return view('timetable.create');
    })->name('create');
    Route::get('/class', function () {
        return view('timetable.class');
    })->name('class');
    Route::get('/teacher', function () {
        return view('timetable.teacher');
    })->name('teacher');
    Route::get('/exam', function () {
        return view('timetable.exam');
    })->name('exam');
});

// Class Journal Routes
Route::prefix('class-journal')->name('class-journal.')->group(function () {
    Route::get('/', function () {
        return view('class-journal.index');
    })->name('index');
    Route::get('/create', function () {
        return view('class-journal.create');
    })->name('create');
    Route::get('/class', function () {
        return view('class-journal.class');
    })->name('class');
    Route::get('/subject', function () {
        return view('class-journal.subject');
    })->name('subject');
    Route::get('/report', function () {
        return view('class-journal.report');
    })->name('report');
});

// Finance Management Routes
Route::prefix('finance')->name('finance.')->group(function () {
    Route::get('/', function () {
        return view('finance.index');
    })->name('index');
    Route::get('/transactions', function () {
        return view('finance.transactions');
    })->name('transactions');
    Route::get('/expenses', function () {
        return view('finance.expenses');
    })->name('expenses');
    Route::get('/income', function () {
        return view('finance.income');
    })->name('income');
    Route::get('/budget', function () {
        return view('finance.budget');
    })->name('budget');
    Route::get('/reports', function () {
        return view('finance.reports');
    })->name('reports');
    Route::get('/audit', function () {
        return view('finance.audit');
    })->name('audit');
});

// Student Management Routes
Route::prefix('students')->name('students.')->group(function () {
    Route::get('/', function () {
        return view('students.index');
    })->name('index');
    Route::get('/admission', function () {
        return view('students.admission');
    })->name('admission');
    Route::get('/profile', function () {
        return view('students.profile');
    })->name('profile');
    Route::get('/promotion', function () {
        return view('students.promotion');
    })->name('promotion');
    Route::get('/transfer', function () {
        return view('students.transfer');
    })->name('transfer');
});

// Teacher Management Routes
Route::prefix('teachers')->name('teachers.')->group(function () {
    Route::get('/', function () {
        return view('teachers.index');
    })->name('index');
    Route::get('/recruitment', function () {
        return view('teachers.recruitment');
    })->name('recruitment');
    Route::get('/schedule', function () {
        return view('teachers.schedule');
    })->name('schedule');
    Route::get('/performance', function () {
        return view('teachers.performance');
    })->name('performance');
    Route::get('/payroll', function () {
        return view('teachers.payroll');
    })->name('payroll');
});

// Exam Management Routes
Route::prefix('exams')->name('exams.')->group(function () {
    Route::get('/schedule', function () {
        return view('exams.schedule');
    })->name('schedule');
    Route::get('/results', function () {
        return view('exams.results');
    })->name('results');
    Route::get('/grading', function () {
        return view('exams.grading');
    })->name('grading');
    Route::get('/certificates', function () {
        return view('exams.certificates');
    })->name('certificates');
});

// Library Management Routes
Route::prefix('library')->name('library.')->group(function () {
    Route::get('/books', function () {
        return view('library.books');
    })->name('books');
    Route::get('/issuance', function () {
        return view('library.issuance');
    })->name('issuance');
    Route::get('/return', function () {
        return view('library.return');
    })->name('return');
    Route::get('/fine', function () {
        return view('library.fine');
    })->name('fine');
});

// Inventory Management Routes
Route::prefix('inventory')->name('inventory.')->group(function () {
    Route::get('/items', function () {
        return view('inventory.items');
    })->name('items');
    Route::get('/purchase', function () {
        return view('inventory.purchase');
    })->name('purchase');
    Route::get('/issue', function () {
        return view('inventory.issue');
    })->name('issue');
    Route::get('/stock', function () {
        return view('inventory.stock');
    })->name('stock');
});

// Transport Management Routes
Route::prefix('transport')->name('transport.')->group(function () {
    Route::get('/vehicles', function () {
        return view('transport.vehicles');
    })->name('vehicles');
    Route::get('/routes', function () {
        return view('transport.routes');
    })->name('routes');
    Route::get('/assignment', function () {
        return view('transport.assignment');
    })->name('assignment');
    Route::get('/tracking', function () {
        return view('transport.tracking');
    })->name('tracking');
});

// Hostel Management Routes
Route::prefix('hostel')->name('hostel.')->group(function () {
    Route::get('/rooms', function () {
        return view('hostel.rooms');
    })->name('rooms');
    Route::get('/allocation', function () {
        return view('hostel.allocation');
    })->name('allocation');
    Route::get('/attendance', function () {
        return view('hostel.attendance');
    })->name('attendance');
    Route::get('/maintenance', function () {
        return view('hostel.maintenance');
    })->name('maintenance');
});

// Fees Management Routes
Route::prefix('fees')->name('fees.')->group(function () {
    Route::get('/structure', function () {
        return view('fees.structure');
    })->name('structure');
    Route::get('/collection', function () {
        return view('fees.collection');
    })->name('collection');
    Route::get('/dues', function () {
        return view('fees.dues');
    })->name('dues');
    Route::get('/receipts', function () {
        return view('fees.receipts');
    })->name('receipts');
});

// Communication Routes
Route::prefix('messages')->name('messages.')->group(function () {
    Route::get('/inbox', function () {
        return view('messages.inbox');
    })->name('inbox');
    Route::get('/compose', function () {
        return view('messages.compose');
    })->name('compose');
    Route::get('/sent', function () {
        return view('messages.sent');
    })->name('sent');
    Route::get('/notifications', function () {
        return view('messages.notifications');
    })->name('notifications');
});

// SMS Management Routes
Route::prefix('sms')->name('sms.')->group(function () {
    Route::get('/send', function () {
        return view('sms.send');
    })->name('send');
    Route::get('/templates', function () {
        return view('sms.templates');
    })->name('templates');
    Route::get('/history', function () {
        return view('sms.history');
    })->name('history');
    Route::get('/settings', function () {
        return view('sms.settings');
    })->name('settings');
});

// Reports Routes
Route::prefix('reports')->name('reports.')->group(function () {
    Route::get('/academic', function () {
        return view('reports.academic');
    })->name('academic');
    Route::get('/attendance', function () {
        return view('reports.attendance');
    })->name('attendance');
    Route::get('/finance', function () {
        return view('reports.finance');
    })->name('finance');
    Route::get('/students', function () {
        return view('reports.students');
    })->name('students');
    Route::get('/teachers', function () {
        return view('reports.teachers');
    })->name('teachers');
    Route::get('/custom', function () {
        return view('reports.custom');
    })->name('custom');
});

// Analytics Routes
Route::prefix('analytics')->name('analytics.')->group(function () {
    Route::get('/dashboard', function () {
        return view('analytics.dashboard');
    })->name('dashboard');
    Route::get('/performance', function () {
        return view('analytics.performance');
    })->name('performance');
    Route::get('/trends', function () {
        return view('analytics.trends');
    })->name('trends');
    Route::get('/predictions', function () {
        return view('analytics.predictions');
    })->name('predictions');
});

// Settings Routes
Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/general', function () {
        return view('settings.general');
    })->name('general');
    Route::get('/academic', function () {
        return view('settings.academic');
    })->name('academic');
    Route::get('/system', function () {
        return view('settings.system');
    })->name('system');
    Route::get('/email', function () {
        return view('settings.email');
    })->name('email');
    Route::get('/backup', function () {
        return view('settings.backup');
    })->name('backup');
});

// User Management Routes
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', function () {
        return view('users.index');
    })->name('index');
    Route::get('/roles', function () {
        return view('users.roles');
    })->name('roles');
    Route::get('/activity', function () {
        return view('users.activity');
    })->name('activity');
});

// Audit Routes
Route::prefix('audit')->name('audit.')->group(function () {
    Route::get('/log', function () {
        return view('audit.log');
    })->name('log');
    Route::get('/login', function () {
        return view('audit.login');
    })->name('login');
    Route::get('/changes', function () {
        return view('audit.changes');
    })->name('changes');
});
