<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'key'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function addPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('key', $permission)->first();
        }
        return $this->permissions()->attach($permission);
    }
    
    public function removePermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('key', $permission)->first();
        }
        return $this->permissions()->detach($permission);
    }
}
