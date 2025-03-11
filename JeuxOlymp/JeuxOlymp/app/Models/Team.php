<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function players()
    {
        return $this->hasMany(User::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public function rounds()
    {
        return $this->belongsToMany(Round::class);
    }

    public function parties()
    {
        return $this->belongsToMany(Party::class);
    }
}
