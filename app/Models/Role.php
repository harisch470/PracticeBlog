<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accesses()
    {
        return $this->hasMany(Access::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'roles_users');
    }

    /**
     * @param $resourceName
     * @return bool
     */
    public function hasResource($resourceName){
        $count = $this->accesses()->where('name',$resourceName)->count();
        if($count){
            return true;
        }else{
            return false;
        }
    }
}
