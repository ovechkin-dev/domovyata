<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $hidden = ['created_at', 'updated_at'];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
