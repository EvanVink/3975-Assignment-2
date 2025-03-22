<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users'; // Ensures Laravel uses the correct table

    public $timestamps = false; // Disables created_at and updated_at

    protected $fillable = [
        'Username',
        'Password',
        'FirstName',
        'LastName',
        'Registration',
        'isApproved',
        'Role'
    ];

    protected $hidden = [
        'Password',
    ];
    public function getAuthIdentifierName()
{
    return 'Username'; 
}
}
