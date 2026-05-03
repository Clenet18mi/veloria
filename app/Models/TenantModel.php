<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class TenantModel extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('establishment', function (Builder $builder) {
            // Bypass scope for super admins
            if (auth()->check() && auth()->user()->hasRole('super_admin')) {
                return;
            }

            if (app()->has('current_establishment')) {
                $builder->where('establishment_id', app('current_establishment')->id);
            }
        });
    }
}
