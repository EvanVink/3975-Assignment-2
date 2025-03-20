<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'Username',
        'Password',
        'FirstName',
        'LastName',
        'Registration',
        'isApproved',
        'Role'
        ];
}
