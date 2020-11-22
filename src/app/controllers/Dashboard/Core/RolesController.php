<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\AuthorizableController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Role;
use App\Models\Permission;

class RolesController extends AuthorizableController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = Role::search($request->search)->orderBy('id', 'desc')->paginate(20);
        return view('dashboard.core.roles.index', compact(
            'roles'
        ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $permissions = Permission::all();

        return view('dashboard.core.roles.create', compact(
            'permissions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:roles'],
            'guard_name' => ['required', 'max:255', 'in:web,api']
        ]);
        
        // Create role
        $role = Role::create($request->only('name', 'guard_name', 'label'));
        
        // sync permissions
        $permissions = $request->get('permissions', []);
        $role->syncPermissions($permissions);

        session()->flash('success-message', __('strings.created successfully'));
        return redirect()->route('dashboard.core.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Request $request, Role $role)
    {
        $permissions = Permission::all();

        return view('dashboard.core.roles.edit', compact(
            'role',
            'permissions'
        ));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', Rule::unique('roles')->ignore($role->id)],
            'guard_name' => ['required', 'max:255', 'in:web,api']
        ]);
        
        // update role
        if($role->name != 'admin') {
            $role->update($request->only('name', 'guard_name'));
        
            // sync permissions
            $permissions = $request->get('permissions', []);
            $role->syncPermissions($permissions);
        }

        session()->flash('success-message', __('strings.updated successfully'));
        return redirect()->route('dashboard.core.roles.index');
    }
    
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request, Role $role)
    {
        if($role->name == 'admin') {
            return response()->json('You trying to delete protected role.', 422);
        }

        $role->delete();

        session()->flash('success-message', __('strings.deleted successfully'));
        return response()->json('success');
    }
}
