<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\StudentAdmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class RoleAndPermissionController extends Controller
{
    public function index()
    {


        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            $roles = Role::all();
        } else {
            $roles = Role::where('user_id', $user->id)->latest()->get();
        }

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('roles')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],
            'description' => 'nullable|string',
        ]);

        $user = Auth::user();

        $roleName = $request->name . '-' . $user->id;

        $role = Role::firstOrCreate(
            ['name' => $roleName, 'guard_name' => 'web'],
            ['description' => $request->description, 'user_id' => $user->id, 'park_id' => optional($user->park)->pluck('id')]
        );

        return redirect()->back()->with('success', 'Role created successfully. Now assign his permissions.');
    }


    public function store_v2(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('roles')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],
            'description' => 'nullable',
        ]);

        $user = Auth::user();

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
            'description' => $request->description,
            'user_id' => $user->id,
            'park_id' => optional($user->park)->pluck('id'),
        ]);

        return redirect()->back()->with('success', 'Role created successfully. Now assign his permissions.');

        return response()->json(['success' => 'Role created successfully!', 'role' => $role]);
    }


    public function store_v1(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'description' => 'nullable',
        ]);

        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            $role = Role::create(['name' => $request->name, 'guard_name' => 'web', 'description' => $request->description, 'user_id' =>  $user->id, 'park_id' => $user->park->pluck('id') ?? null]);
        } else {
            $role = Role::create(['name' => $request->name, 'guard_name' => 'web', 'description' => $request->description, 'user_id' =>  $user->id, 'park_id' => $user->park->pluck('id' ?? null)]);
        }



        return redirect()->route('roles.permissions', $role->id)->with('success', 'Role created successfully. Now assign permissions.');
    }


    public function edit(Role $role)
    {
        // $roles = Role::all();

        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            $roles = Role::all();
        } else {
            $roles = Role::where('user_id', $user->id)->latest()->get();
        }

        return view('admin.roles.index', compact('role', 'roles'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('roles')->where(function ($query) use ($role) {
                    return $query->where('user_id', Auth::id())->where('id', '!=', $role->id);
                }),
            ],
            'description' => 'nullable|string',
        ]);

        $user = Auth::user();

        // Ensure the role name is unique per user
        $roleName = $request->name . '-' . $user->id;

        // Update role details
        $role->update([
            'name' => $roleName,
            'description' => $request->description,
            'user_id' => $user->id,
            'park_id' => optional($user->park)->pluck('id'),
        ]);

        return redirect()->back()->with('success', 'Role updated successfully.');
    }



    public function update_v2(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'description' => 'nullable',
        ]);

        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            $role->update(['name' => $request->name, 'guard_name' => 'web', 'description' => $request->description, 'user_id' =>  $user->id, 'park_id' => $user->park->pluck('id') ?? null]);
        } else {
            $role->update(['name' => $request->name, 'guard_name' => 'web', 'description' => $request->description, 'user_id' =>  $user->id, 'park_id' => $user->park->pluck('id' ?? null)]);
        }



        // $role->update(['name' => $request->name, 'description' => $request->description]);

        return redirect()->back()->with('success', 'Role updated successfully. Now assign permissions.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }


    // Permissions

    public function permissions(Role $role)
    {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            $permissions = Permission::all();
        } else {
            $permissions = $user->getAllPermissions();
        }

        return view('admin.roles.permissions', compact('role', 'permissions'));
    }


    public function permissions_v1(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.permissions', compact('role', 'permissions'));
    }

    public function createPermission(Request $request)
    {
        $permissions = Permission::all();
        return view('admin.roles.permissions.index', compact('permissions'));
    }

    public function storePermissions(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'description' => 'nullable',
        ]);

        Permission::updateOrCreate(['name' => $this->slugify($request->name), 'description' => $request->description]);

        return redirect()->route('permissions.create')->with('success', 'Permission created successfully.');
    }

    public function assignPermissions_v1(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'required|array',
            'vendor_permissions' => 'nullable|array',
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
        $role->syncPermissions($permissions ?? []);

        // Assign Vendor-Specific Permissions (if applicable)
        if ($request->has('vendor_permissions')) {
            $vendorPermissions = Permission::whereIn('id', $request->vendor_permissions)->pluck('id')->toArray();

            // Assuming a pivot table `role_vendor_permissions` exists to store vendor-specific assignments
            $role->vendorPermissions()->sync($vendorPermissions);
        }

        return redirect()->route('roles.index')->with('success', 'Permissions assigned successfully.');
    }



    public function assignPermissions(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'required|array',
        ]);

        // return $role;

        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();

        $role->syncPermissions($permissions ?? []);

        return redirect()->route('roles.index')->with('success', 'Permissions assigned successfully.');
    }


    function slugify($string)
    {
        return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
    }


    // public function student_assignRole()
    // {
    //     $students = StudentAdmission::where('admission_status', 1)->where('is_active', 1)
    //         ->where('admission_no', '!=', '')
    //         ->get();

    //     foreach ($students as $student) {
    //         $user = User::where('username', $student->admission_no)->first();

    //         if ($user && !$user->hasAnyRole(Role::all())) {

    //             $role = Role::find($user->role);
    //             $roleName = $role ? $role->name : 'student';

    //             $user->assignRole($roleName);

    //             if (!$user->role) {
    //                 $user->update(['role' => 5]);
    //             }
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Roles updated successfully.');
    // }
}
