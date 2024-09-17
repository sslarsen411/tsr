<?php

namespace App\Models;

use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'purchase', 
        'state',
        'how_added'  
    ];
    public function users()    {
        return $this->belongsTo(User::class);
    }
    public function locations()    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function reviews()    {
        return $this->hasMany(Review::class, 'customer_id');
    } 

    public static function getForm(){
        return[        
            Fieldset::make('Contact Info')
                ->schema([
                    TextInput::make('first_name')
                         ->required(),
                    TextInput::make('last_name')
                        ->required(),
                    TextInput::make('email')
                        ->required(),
                    TextInput::make('phone'),
                    TextInput::make('purchase'),
                ])
                ->columns(2),
            

            
        ];
    }

}
