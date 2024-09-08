<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $table = 'locations';
    protected $fillable = [
        'company_id',
        'google_accountID',
        'google_locationID',
        'addr',
        'zip',
        'phone',
        'gbp_url',
    ];
}
