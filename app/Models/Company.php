<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   use HasFactory;

    protected $fillable = ['name', 'country', 'employees_number'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
