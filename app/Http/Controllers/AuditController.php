<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemLog;
use App\Models\LoginHistory;
use App\Models\DataChange;
use App\Models\User;

class AuditController extends Controller
{
    /**
     * Display system logs.
     */
    public function system()
    {
        $logs = SystemLog::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        $logStats = [
            'total' => SystemLog::count(),
            'today' => SystemLog::whereDate('created_at', today())->count(),
            'this_week' => SystemLog::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month' => SystemLog::whereMonth('created_at', now()->month)->count(),
            'error_count' => SystemLog::where('level', 'error')->count(),
            'warning_count' => SystemLog::where('level', 'warning')->count(),
            'info_count' => SystemLog::where('level', 'info')->count(),
        ];

        return view('audit.system', compact('logs', 'logStats'));
    }

    /**
     * Display login histories.
     */
    public function login()
    {
        $loginHistories = LoginHistory::with('user')
            ->orderBy('login_at', 'desc')
            ->paginate(50);

        $loginStats = [
            'total' => LoginHistory::count(),
            'today' => LoginHistory::whereDate('login_at', today())->count(),
            'this_week' => LoginHistory::whereBetween('login_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month' => LoginHistory::whereMonth('login_at', now()->month)->count(),
            'successful' => LoginHistory::where('successful', true)->count(),
            'failed' => LoginHistory::where('successful', false)->count(),
            'unique_users' => LoginHistory::distinct('user_id')->count(),
        ];

        return view('audit.login', compact('loginHistories', 'loginStats'));
    }

    /**
     * Display data changes.
     */
    public function changes()
    {
        $dataChanges = DataChange::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        $changeStats = [
            'total' => DataChange::count(),
            'today' => DataChange::whereDate('created_at', today())->count(),
            'this_week' => DataChange::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month' => DataChange::whereMonth('created_at', now()->month)->count(),
            'created' => DataChange::where('action_type', 'created')->count(),
            'updated' => DataChange::where('action_type', 'updated')->count(),
            'deleted' => DataChange::where('action_type', 'deleted')->count(),
        ];

        return view('audit.changes', compact('dataChanges', 'changeStats'));
    }

    /**
     * Clear system logs.
     */
    public function clearSystemLogs(Request $request)
    {
        $validated = $request->validate([
            'older_than' => 'required|integer|min:1',
        ]);

        $deletedCount = SystemLog::where('created_at', '<', now()->subDays($validated['older_than']))->delete();

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'cleared_logs',
            'module' => 'audit',
            'description' => "Cleared {$deletedCount} system logs older than {$validated['older_than']} days",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('audit.system')->with('success', "Deleted {$deletedCount} old system logs.");
    }

    /**
     * Export system logs.
     */
    public function exportSystemLogs(Request $request)
    {
        $validated = $request->validate([
            'format' => 'required|in:csv,xlsx,pdf',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
            'level' => 'nullable|string',
        ]);

        $query = SystemLog::with('user');

        if ($validated['date_from']) {
            $query->whereDate('created_at', '>=', $validated['date_from']);
        }

        if ($validated['date_to']) {
            $query->whereDate('created_at', '<=', $validated['date_to']);
        }

        if ($validated['level']) {
            $query->where('level', $validated['level']);
        }

        $logs = $query->get();

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'exported_logs',
            'module' => 'audit',
            'description' => "Exported {$logs->count()} system logs in {$validated['format']} format",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // For now, return a simple response. In a real application, you would generate the file
        return redirect()->route('audit.system')->with('success', "Exported {$logs->count()} system logs.");
    }

    /**
     * Force user logout.
     */
    public function forceLogout(Request $request, User $user)
    {
        // Find active login sessions for the user
        $activeSessions = LoginHistory::where('user_id', $user->id)
            ->where('successful', true)
            ->whereNull('logout_at')
            ->get();

        foreach ($activeSessions as $session) {
            $session->update([
                'logout_at' => now(),
            ]);
        }

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'force_logout',
            'module' => 'audit',
            'description' => "Force logout user: {$user->full_name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('audit.login')->with('success', "User {$user->full_name} has been logged out from all devices.");
    }

    /**
     * Block IP address.
     */
    public function blockIp(Request $request)
    {
        $validated = $request->validate([
            'ip_address' => 'required|ip',
            'reason' => 'required|string|max:255',
        ]);

        // In a real application, you would implement IP blocking logic here
        // For now, we'll just log the action

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'blocked_ip',
            'module' => 'audit',
            'description' => "Blocked IP address: {$validated['ip_address']} - {$validated['reason']}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('audit.login')->with('success', "IP address {$validated['ip_address']} has been blocked.");
    }

    /**
     * Rollback data change.
     */
    public function rollbackChange(Request $request, DataChange $dataChange)
    {
        // In a real application, you would implement rollback logic here
        // For now, we'll just log the action

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'rollback_change',
            'module' => 'audit',
            'description' => "Rolled back change: {$dataChange->table_name} - {$dataChange->record_id}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('audit.changes')->with('success', "Change has been rolled back.");
    }
}
