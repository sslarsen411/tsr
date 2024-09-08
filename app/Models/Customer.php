<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $table = 'customers';
    protected $fillable = [
        'users_id',
        'location_id',
        'oauth_provider',
        'oauth_uid',
        'first_name',
        'last_name',
        'email',
        'phone', 
        'status',
        'how_added'  
    ];
    public function users()    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function locations()    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    // public function reviews()    {
    //     return $this->hasMany(Review::class, 'customer_id');
    // }
   

}
