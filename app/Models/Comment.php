<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable =
     [
    'date_message',
    'message',
    'id_users',
    'parent_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
