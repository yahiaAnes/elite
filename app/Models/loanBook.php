<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loanBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'title',
        'author',
        'pages',
        'category',
        'lend_date',
        'redemption_date',
        'price',
        'book_status',
        'student_name',
        'phone_number',
        'card_number',
        'status',
        'observation',
        'userId',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
