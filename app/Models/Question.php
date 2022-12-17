<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'sections_id', 'number', 'question'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'sections_id', 'id');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
