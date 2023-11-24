<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'image',
    ];

    public function scopeSearch($query)
    {
        $search = request()->get('search');
        return empty($search) ? $query : $query->where('content', 'LIKE', '%' . $search . '%');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function userLikes()
    {
        return $this->hasMany(Like::class)->where('user_id', auth()->id());
    }
}
