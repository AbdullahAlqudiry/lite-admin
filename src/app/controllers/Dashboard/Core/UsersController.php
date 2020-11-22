<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\AuthorizableController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Role;

class UsersController extends AuthorizableController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::search($request->search)->orderBy('id', 'desc')->paginate(20);
        return view('dashboard.core.users.index', compact(
            'users'
        ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $roles = Role::pluck('name', 'id')->toArray();

        return view('dashboard.core.users.create', compact(
            'roles'
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required', 'exists:roles,id'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $request->merge([
            'password' => bcrypt($request->password)
        ]);

        // Create user
        $user = User::create($request->only('name', 'email', 'password'));
        $user->syncRoles($request->role_id);

        session()->flash('success-message', __('strings.created successfully'));
        return redirect()->route('dashboard.core.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Request $request, User $user)
    {
        $roles = Role::pluck('name', 'id')->toArray();

        return view('dashboard.core.users.edit', compact(
            'user',
            'roles'
        ));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id) ],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user->update($request->only('name', 'email'));
        $user->syncRoles($request->role_id);

        session()->flash('success-message', __('strings.updated successfully'));
        return redirect()->to(route('dashboard.core.users.index'));
    }
    
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        session()->flash('success-message', __('strings.deleted successfully'));
        return response()->json('success');
    }

}
