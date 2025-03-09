<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // Ei 3 ta trait use korse user model e

    /**
     * Ei array er moddhe je field gula thakbe, user create/update korar somoy
     * mass-assignment er maddhome update kora jabe.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',      // User er naam
        'email',     // User er email
        'password',  // User er password (hashed)
    ];

    /**
     * Ei array er moddhe je field gula thakbe, segula serialization er somoy
     * hide kora hobe. Mane jodi kono API response e user data dewa hoy,
     * tahole eita dekhano hobe na.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',        // Password ke hide kore rakha
        'remember_token',  // Authentication remember token hide rakha
    ];

    /**
     * Ei array er moddhe je field gula thakbe, segula automatically specific type e
     * convert hobe database theke fetch korar somoy.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Email verification er date time format convert korbe
    ];
}
