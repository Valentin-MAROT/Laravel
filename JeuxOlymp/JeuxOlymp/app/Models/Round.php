<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function parties()
    {
        return $this->hasMany(Party::class);
    }
}
