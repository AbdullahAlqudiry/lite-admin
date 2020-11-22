<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
use App\Models\Permission;

class Role extends SpatieRole 
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'guard_name',
    ];


    /**
     * Scopes
     */

    /**
     * Search Scope
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'LIKE', '%'. $search .'%')
                    ->orWhere('name', 'LIKE', '%'. $search .'%')
                    ->orWhere('guard_name', 'LIKE', '%'. $search .'%');
    }


    /**
     * Functions
     */
    public static function syncDefaultPermissions()
    {
        // Sync Permissions
        $permissions = config('liteadmin.roles.permissions');
        foreach ($permissions as $permission) {

            $permissionObject = Permission::where(
                'name', $permission['name']
            )->first();

            if ($permissionObject == null) {
                Permission::create($permission);
            }
        }

        // Create Roles - Here create basic roles only
        $roles = config('liteadmin.roles.roles');
        foreach ($roles as $roleName) {
            $role = self::where('name', $roleName)->first();

            if ($role == null) {
                $role = self::create(
                    [
                        'name' => strtolower($roleName)
                    ]
                );
            }
            
            if ($role->name == 'admin') {
                $role->syncPermissions(Permission::all());
            } else {
                $role->syncPermissions(Permission::where('name', 'LIKE', strtolower($role->name).'%')->get());
            }
        }
        
    }
}
