<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Lab404\Impersonate\Models\Impersonate;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, Impersonate;

    protected $fillable = ['name', 'email', 'password', 'establishment_id'];

    public function canImpersonate(): bool
    {
        return $this->hasRole('super_admin');
    }
}
