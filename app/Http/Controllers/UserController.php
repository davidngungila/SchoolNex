<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\UserActivity;

class UserController extends Controller
{
    /**
     * Display all users.
     */
    public function index()
    {
        $users = User::with('roles')->paginate(20);
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Display roles and permissions.
     */
    public function roles()
    {
        $roles = Role::with('permissions', 'users')->get();
        $permissions = Permission::all();
        return view('users.roles', compact('roles', 'permissions'));
    }

    /**
     * Display user activities.
     */
    public function activity()
    {
        $activities = UserActivity::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(50);
        
        $activityStats = [
            'total' => UserActivity::count(),
            'today' => UserActivity::whereDate('created_at', today())->count(),
            'this_week' => UserActivity::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month' => UserActivity::whereMonth('created_at', now()->month)->count(),
        ];

        return view('users.activity', compact('activities', 'activityStats'));
    }

    /**
     * Store a new user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|in:male,female,other',
            'address' => 'nullable|string',
            'employee_id' => 'nullable|string|unique:users',
            'department' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'join_date' => 'nullable|date',
            'bio' => 'nullable|string',
            'is_active' => 'boolean',
            'roles' => 'required|array|min:1',
            'roles.*' => 'exists:roles,id',
        ]);

        try {
            $user = User::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'username' => $validated['username'],
                'password' => bcrypt($validated['password']),
                'phone' => $validated['phone'] ?? null,
                'date_of_birth' => $validated['date_of_birth'] ?? null,
                'gender' => $validated['gender'] ?? null,
                'address' => $validated['address'] ?? null,
                'employee_id' => $validated['employee_id'] ?? null,
                'department' => $validated['department'] ?? null,
                'position' => $validated['position'] ?? null,
                'join_date' => $validated['join_date'] ?? null,
                'bio' => $validated['bio'] ?? null,
                'is_active' => $validated['is_active'] ?? true,
            ]);

            if (isset($validated['roles'])) {
                $user->roles()->attach($validated['roles']);
            }

            // Log activity
            UserActivity::create([
                'user_id' => auth()->id(),
                'action' => 'created',
                'module' => 'users',
                'description' => "Created user: {$user->full_name}",
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User created successfully',
                    'user' => $user
                ]);
            }

            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create user: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Update an existing user.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|in:male,female,other',
            'address' => 'nullable|string',
            'employee_id' => 'nullable|string|unique:users,employee_id,' . $user->id,
            'department' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'join_date' => 'nullable|date',
            'bio' => 'nullable|string',
            'is_active' => 'boolean',
            'roles' => 'required|array|min:1',
            'roles.*' => 'exists:roles,id',
        ]);

        try {
            $oldValues = $user->toArray();
            
            $user->update($validated);

            if (isset($validated['roles'])) {
                $user->roles()->sync($validated['roles']);
            }

            // Log activity
            UserActivity::create([
                'user_id' => auth()->id(),
                'action' => 'updated',
                'module' => 'users',
                'description' => "Updated user: {$user->full_name}",
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'old_values' => $oldValues,
                'new_values' => $user->toArray(),
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User updated successfully',
                    'user' => $user
                ]);
            }

            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update user: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Delete a user.
     */
    public function destroy(Request $request, User $user)
    {
        $oldValues = $user->toArray();
        $userName = $user->full_name;
        
        $user->delete();

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'deleted',
            'module' => 'users',
            'description' => "Deleted user: {$userName}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'old_values' => $oldValues,
        ]);

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Reset user password.
     */
    public function resetPassword(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => bcrypt($validated['password']),
        ]);

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'password_reset',
            'module' => 'users',
            'description' => "Reset password for user: {$user->full_name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('users.index')->with('success', 'Password reset successfully.');
    }

    /**
     * View user details (API endpoint for AJAX).
     */
    public function view(User $user)
    {
        return response()->json([
            'id' => $user->id,
            'full_name' => $user->full_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'avatar' => $user->avatar,
            'department' => $user->department,
            'position' => $user->position,
            'date_of_birth' => $user->date_of_birth,
            'gender' => $user->gender,
            'address' => $user->address,
            'employee_id' => $user->employee_id,
            'join_date' => $user->join_date,
            'bio' => $user->bio,
            'is_active' => $user->is_active,
            'roles' => $user->roles->pluck('display_name'),
            'last_login_at' => $user->last_login_at,
            'created_at' => $user->created_at,
        ]);
    }

    /**
     * Edit user details (API endpoint for AJAX).
     */
    public function edit(User $user)
    {
        return response()->json([
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'username' => $user->username,
            'date_of_birth' => $user->date_of_birth,
            'gender' => $user->gender,
            'address' => $user->address,
            'employee_id' => $user->employee_id,
            'department' => $user->department,
            'position' => $user->position,
            'join_date' => $user->join_date,
            'bio' => $user->bio,
            'is_active' => $user->is_active,
            'roles' => $user->roles->pluck('id'),
        ]);
    }

    /**
     * Get user permissions (API endpoint for AJAX).
     */
    public function permissions(User $user)
    {
        $userRoles = $user->roles()->with('permissions')->get();
        $allPermissions = Permission::all();
        
        $permissionsData = [];
        foreach ($allPermissions as $permission) {
            $permissionsData[] = [
                'id' => $permission->id,
                'name' => $permission->name,
                'display_name' => $permission->display_name,
                'module' => $permission->module,
                'assigned' => $userRoles->contains(function($role) use ($permission) {
                    return $role->permissions->contains('id', $permission->id);
                }),
            ];
        }

        return response()->json([
            'user' => $user->full_name,
            'roles' => $userRoles->pluck('display_name'),
            'permissions' => $permissionsData,
        ]);
    }

    /**
     * Get user login history (API endpoint for AJAX).
     */
    public function loginHistory(User $user)
    {
        $loginHistories = $user->loginHistories()
            ->orderBy('login_at', 'desc')
            ->limit(50)
            ->get();

        return response()->json([
            'user' => $user->full_name,
            'login_histories' => $loginHistories->map(function($history) {
                return [
                    'login_at' => $history->login_at->format('Y-m-d H:i:s'),
                    'logout_at' => $history->logout_at ? $history->logout_at->format('Y-m-d H:i:s') : null,
                    'ip_address' => $history->ip_address,
                    'user_agent' => $history->user_agent,
                    'login_type' => $history->login_type,
                    'successful' => $history->successful,
                    'failure_reason' => $history->failure_reason,
                    'session_duration' => $history->session_duration,
                ];
            }),
        ]);
    }

    /**
     * Suspend user.
     */
    public function suspend(Request $request, User $user)
    {
        $user->update(['is_active' => false]);

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'suspended',
            'module' => 'users',
            'description' => "Suspended user: {$user->full_name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'old_values' => ['is_active' => true],
            'new_values' => ['is_active' => false],
        ]);

        return response()->json(['success' => true, 'message' => 'User suspended successfully']);
    }

    /**
     * Activate user.
     */
    public function activate(Request $request, User $user)
    {
        $user->update(['is_active' => true]);

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'activated',
            'module' => 'users',
            'description' => "Activated user: {$user->full_name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'old_values' => ['is_active' => false],
            'new_values' => ['is_active' => true],
        ]);

        return response()->json(['success' => true, 'message' => 'User activated successfully']);
    }

    /**
     * Reset password via AJAX.
     */
    public function resetPasswordAjax(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => bcrypt($validated['password']),
        ]);

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'password_reset',
            'module' => 'users',
            'description' => "Reset password for user: {$user->full_name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json(['success' => true, 'message' => 'Password reset successfully']);
    }

    /**
     * Delete user via AJAX.
     */
    public function destroyAjax(Request $request, User $user)
    {
        $oldValues = $user->toArray();
        $userName = $user->full_name;
        
        $user->delete();

        // Log activity
        UserActivity::create([
            'user_id' => auth()->id(),
            'action' => 'deleted',
            'module' => 'users',
            'description' => "Deleted user: {$userName}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'old_values' => $oldValues,
        ]);

        return response()->json(['success' => true, 'message' => 'User deleted successfully']);
    }
}
