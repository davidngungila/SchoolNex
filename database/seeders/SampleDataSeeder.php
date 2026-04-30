<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles only if they don't exist
        $roles = [
            ['name' => 'admin', 'display_name' => 'Administrator', 'description' => 'System administrator with full access'],
            ['name' => 'teacher', 'display_name' => 'Teacher', 'description' => 'Teacher with limited access'],
            ['name' => 'student', 'display_name' => 'Student', 'description' => 'Student with basic access'],
        ];

        $createdRoles = [];
        foreach ($roles as $roleData) {
            $role = Role::firstOrCreate(['name' => $roleData['name']], $roleData);
            $createdRoles[$role->name] = $role;
        }

        // Create permissions only if they don't exist
        $permissions = [
            ['name' => 'view_users', 'display_name' => 'View Users', 'module' => 'users'],
            ['name' => 'create_users', 'display_name' => 'Create Users', 'module' => 'users'],
            ['name' => 'edit_users', 'display_name' => 'Edit Users', 'module' => 'users'],
            ['name' => 'delete_users', 'display_name' => 'Delete Users', 'module' => 'users'],
            ['name' => 'view_audit', 'display_name' => 'View Audit Logs', 'module' => 'audit'],
            ['name' => 'manage_roles', 'display_name' => 'Manage Roles', 'module' => 'users'],
        ];

        foreach ($permissions as $permissionData) {
            Permission::firstOrCreate(['name' => $permissionData['name']], $permissionData);
        }

        // Assign permissions to roles
        $createdRoles['admin']->permissions()->syncWithoutDetaching(Permission::pluck('id'));
        $createdRoles['teacher']->permissions()->syncWithoutDetaching([1, 2]); // view_users, create_users
        $createdRoles['student']->permissions()->syncWithoutDetaching([1]); // view_users

        // Create sample users only if they don't exist
        $users = [
            [
                'name' => 'John Doe',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@schoolnex.com',
                'username' => 'johndoe',
                'password' => Hash::make('password'),
                'phone' => '+1234567890',
                'date_of_birth' => '1985-06-15',
                'gender' => 'male',
                'address' => '123 Main St, City, State 12345',
                'employee_id' => 'EMP001',
                'department' => 'Administration',
                'position' => 'System Administrator',
                'join_date' => '2020-01-15',
                'bio' => 'Experienced system administrator with expertise in Laravel, PHP, and database management.',
                'is_active' => true,
                'two_factor_enabled' => false,
                'last_login_at' => now(),
                'last_login_ip' => '127.0.0.1',
                'role' => 'admin',
            ],
            [
                'name' => 'Sarah Johnson',
                'first_name' => 'Sarah',
                'last_name' => 'Johnson',
                'email' => 'sarah.johnson@schoolnex.com',
                'username' => 'sarahjohnson',
                'password' => Hash::make('password'),
                'phone' => '+1234567891',
                'date_of_birth' => '1987-03-22',
                'gender' => 'female',
                'address' => '456 Oak Ave, City, State 67890',
                'employee_id' => 'EMP002',
                'department' => 'Mathematics',
                'position' => 'Senior Teacher',
                'join_date' => '2019-08-20',
                'bio' => 'Mathematics teacher with 10+ years of experience in secondary education.',
                'is_active' => true,
                'two_factor_enabled' => true,
                'last_login_at' => now()->subHours(2),
                'last_login_ip' => '127.0.0.1',
                'role' => 'teacher',
            ],
            [
                'name' => 'Michael Brown',
                'first_name' => 'Michael',
                'last_name' => 'Brown',
                'email' => 'michael.brown@schoolnex.com',
                'username' => 'michaelbrown',
                'password' => Hash::make('password'),
                'phone' => '+1234567892',
                'date_of_birth' => '1982-11-08',
                'gender' => 'male',
                'address' => '789 Pine Rd, City, State 11111',
                'employee_id' => 'EMP003',
                'department' => 'Science',
                'position' => 'Department Head',
                'join_date' => '2018-03-10',
                'bio' => 'Science department head with specialization in physics and chemistry.',
                'is_active' => true,
                'two_factor_enabled' => false,
                'last_login_at' => now()->subDay(),
                'last_login_ip' => '127.0.0.1',
                'role' => 'teacher',
            ],
            [
                'name' => 'Emily Davis',
                'first_name' => 'Emily',
                'last_name' => 'Davis',
                'email' => 'emily.davis@schoolnex.com',
                'username' => 'emilydavis',
                'password' => Hash::make('password'),
                'phone' => '+1234567893',
                'date_of_birth' => '1990-07-14',
                'gender' => 'female',
                'address' => '321 Elm St, City, State 22222',
                'employee_id' => 'EMP004',
                'department' => 'English',
                'position' => 'Junior Teacher',
                'join_date' => '2021-09-01',
                'bio' => 'English teacher focusing on literature and creative writing.',
                'is_active' => true,
                'two_factor_enabled' => false,
                'last_login_at' => now()->subDays(2),
                'last_login_ip' => '127.0.0.1',
                'role' => 'teacher',
            ],
            [
                'name' => 'Robert Wilson',
                'first_name' => 'Robert',
                'last_name' => 'Wilson',
                'email' => 'robert.wilson@schoolnex.com',
                'username' => 'robertwilson',
                'password' => Hash::make('password'),
                'phone' => '+1234567894',
                'date_of_birth' => '1988-04-25',
                'gender' => 'male',
                'address' => '654 Maple Dr, City, State 33333',
                'employee_id' => 'EMP005',
                'department' => 'History',
                'position' => 'Senior Teacher',
                'join_date' => '2017-05-15',
                'bio' => 'History teacher with expertise in world history and political science.',
                'is_active' => true,
                'two_factor_enabled' => true,
                'last_login_at' => now()->subHours(6),
                'last_login_ip' => '127.0.0.1',
                'role' => 'teacher',
            ],
        ];

        foreach ($users as $userData) {
            $roleName = $userData['role'];
            unset($userData['role']);
            
            $user = User::firstOrCreate(['email' => $userData['email']], $userData);
            
            // Assign role to user
            if (isset($createdRoles[$roleName])) {
                $user->roles()->syncWithoutDetaching([$createdRoles[$roleName]->id]);
            }
        }

        // Create sample user activities only if they don't exist
        $activities = [
            [
                'user_id' => 1,
                'action' => 'login',
                'module' => 'auth',
                'description' => 'User logged in successfully',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            ],
            [
                'user_id' => 2,
                'action' => 'created',
                'module' => 'users',
                'description' => 'Created new user account',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            ],
            [
                'user_id' => 1,
                'action' => 'updated',
                'module' => 'settings',
                'description' => 'Updated system settings',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            ],
        ];

        foreach ($activities as $activity) {
            \App\Models\UserActivity::firstOrCreate($activity);
        }

        // Create sample system logs only if they don't exist
        $logs = [
            [
                'level' => 'info',
                'message' => 'User authentication successful',
                'context' => json_encode(['user_id' => 1, 'email' => 'john.doe@schoolnex.com']),
                'channel' => 'auth',
                'user_id' => 1,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            ],
            [
                'level' => 'warning',
                'message' => 'Failed login attempt',
                'context' => json_encode(['email' => 'unknown@example.com', 'reason' => 'invalid_credentials']),
                'channel' => 'auth',
                'user_id' => null,
                'ip_address' => '192.168.1.100',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            ],
            [
                'level' => 'error',
                'message' => 'Database connection failed',
                'context' => json_encode(['error' => 'Connection timeout']),
                'channel' => 'database',
                'user_id' => null,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Laravel Framework',
            ],
        ];

        foreach ($logs as $log) {
            \App\Models\SystemLog::firstOrCreate($log);
        }

        // Create sample login histories only if they don't exist
        $loginHistories = [
            [
                'user_id' => 1,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'login_type' => 'web',
                'successful' => true,
                'login_at' => now()->subHours(1),
                'logout_at' => null,
            ],
            [
                'user_id' => 2,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'login_type' => 'web',
                'successful' => true,
                'login_at' => now()->subHours(3),
                'logout_at' => now()->subHours(2),
            ],
            [
                'user_id' => 1,
                'ip_address' => '192.168.1.50',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'login_type' => 'web',
                'successful' => false,
                'failure_reason' => 'Invalid password',
                'login_at' => now()->subHours(5),
                'logout_at' => null,
            ],
        ];

        foreach ($loginHistories as $loginHistory) {
            \App\Models\LoginHistory::firstOrCreate($loginHistory);
        }

        // Create sample data changes only if they don't exist
        $dataChanges = [
            [
                'user_id' => 1,
                'table_name' => 'users',
                'record_id' => '2',
                'action_type' => 'updated',
                'old_values' => json_encode(['email' => 'sarah@schoolnex.com']),
                'new_values' => json_encode(['email' => 'sarah.johnson@schoolnex.com']),
                'changed_fields' => json_encode(['email']),
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            ],
            [
                'user_id' => 2,
                'table_name' => 'students',
                'record_id' => '123',
                'action_type' => 'created',
                'old_values' => null,
                'new_values' => json_encode(['name' => 'John Smith', 'grade' => '10']),
                'changed_fields' => json_encode(['name', 'grade']),
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            ],
        ];

        foreach ($dataChanges as $dataChange) {
            \App\Models\DataChange::firstOrCreate($dataChange);
        }

        $this->command->info('Sample data seeded successfully!');
    }
}
