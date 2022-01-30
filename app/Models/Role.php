<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    //use HasFactory;
    protected $fillable = ['name'];

    /**
     * Relationship between Users and Roles (M-N).
     *
     * @return BelongsToMany
     */
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
