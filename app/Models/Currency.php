<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function pricing()
    {
        return $this->hasMany(Pricing::class);
    }
}
