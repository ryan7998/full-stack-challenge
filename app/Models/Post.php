<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'position_type',
        'salary',
        'location',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
