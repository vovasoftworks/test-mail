<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'domain_name',
        'name',
        'text'
    ];

    protected $casts = [
        'domain_name' => 'string',
        'name' => 'string',
        'text' => 'string'
    ];
}
