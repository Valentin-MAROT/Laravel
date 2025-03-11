<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $table = 'rounds';
    protected $fillable = ['nom'];

    public function tournoi()
    {
        return $this->belongsTo('App\Models\Tournoi');
    }

    public function plays()
    {
        return $this->hasMany('App\Models\Play');
    }
}
