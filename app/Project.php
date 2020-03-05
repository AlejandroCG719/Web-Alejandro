<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 */
class Project extends Model
{
    protected $fillable =['title','url','description'];
   /* public function getRouteKeyName()
    {
        return 'url';
    }*/
}
