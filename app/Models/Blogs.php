<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    //
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'status',
        'created_st',
        'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
