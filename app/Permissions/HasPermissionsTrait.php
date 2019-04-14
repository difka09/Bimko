<?php

namespace App\Permissions;

use App\Models\Role;
use App\Models\Permission;

trait HasPermissionsTrait
{
    public function syncRoles(... $roles)
    {
        $this->roles()->detach();

        return $this->assignRole($roles);
    }

    public function removeRole(... $roles)
    {
        $roles = $this->getAllRoles($roles);

        $this->roles()->detach($roles);
        return $this;
    }

    public function assignRole(... $roles)
    {
            //ambil model roles
        $roles = $this->getAllRoles(array_flatten($roles));

        if($roles == null){
            return $this;
        }
            //save many
        $this->roles()->saveMany($roles);
        return $this;

    }

    public function givePermissionTo(... $permissions)
    {
            //ambil model permission
        $permissions = $this->getAllPermissions(array_flatten($permissions));
        if ($permissions == null){
            return $this;
        }
        //save many
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function revokePermission(... $permissions)
    {
       $permissions = $this->getAllPermissions($permissions);

       $this->permissions()->detach($permissions);
    }

    public function updatePermissions(... $permissions)
    {
        $this->permissions()->detach();
        return $this->givePermissionTo($permissions);
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    protected function getAllRoles(array $roles)
    {
        return Role::whereIn('name', $roles)->get();

    }
    protected function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('name', $permissions)->get();

    }

    protected function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }

        return false;
    }
    protected function hasPermission ($permission)
    {
        return(bool) $this->permissions->where('name', $permission->name)->count();
    }

    public function hasRole(... $roles)
    {
        foreach ($roles as $role) {
            if($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
}
