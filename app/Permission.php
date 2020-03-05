<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable =['name','guard_name'];

    public function roles()
        {
            return $this->belongsToMany('App\Role' , 'role_has_permissions', 'permission_id'.'role_id');
        }
}

