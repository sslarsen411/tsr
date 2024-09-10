<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $table = 'reviews';

    protected $fillable = [
        'customer_id',
        'location_id',
        'rate',
        'answers',
        'review',
        'status'       
    ];
}
