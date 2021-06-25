<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Migration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get all migrated list
     * 
     * @return array
     */
    public static function getMigratedList(): array
    {
        return self::all()->pluck('name')->all();
    }
}
