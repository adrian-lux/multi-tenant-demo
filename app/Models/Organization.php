<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;



class Organization extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany(User::class)->using(OrganizationUser::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
