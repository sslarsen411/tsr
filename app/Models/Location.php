<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $table = 'locations';
    protected $fillable = [
        'users_id',  
        'addr',
        'zip',
        'phone',
        'google_accountID',
        'google_locationID',
        'gbp_url',
    ];

    public function companies(){
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function customers(){
        return $this->hasMany(Customer::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
