<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
    ];

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
