<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'title',
        'author',
        'pages',
        'category',
        'book_status',
        'observation',
        'status',
        'userId',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function review(){
        return $this->hasMany(review::class,'bookId');
    }
}
