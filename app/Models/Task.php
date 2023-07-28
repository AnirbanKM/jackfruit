<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function creater()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
