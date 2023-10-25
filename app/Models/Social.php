<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class Social extends Model
{
    use HasApiTokens, Notifiable;

    public $timestamps = false;
    protected $fillable = [
        'provider_user_id',
        'provider',
        'user'
    ];

    protected $primaryKey = 'user_id';
    protected $table = 'social2';
    public function login(){
    return $this->belongsTo('App\Models\User','user');
    }
    
}
