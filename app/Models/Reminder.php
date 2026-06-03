<?php

namespace App\Models;

use Illuminate\Database\eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',
        'status'
    ];

    public function user()
    {
        return $this->belongsto(User::class);
    }
}
