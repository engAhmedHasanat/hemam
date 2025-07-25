<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'title', 'description', 'location', 'salary',
        'work_field', 'experience_years', 'nationality', 'gender_preference'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
