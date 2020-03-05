<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasRoles;
    protected $fillable =['name','guard_name'];

    public function permisions()
    {
        return $this->belongsToMany('App\Permission', 'role_has_permissions', 'role_id', 'permission_id');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }

}
