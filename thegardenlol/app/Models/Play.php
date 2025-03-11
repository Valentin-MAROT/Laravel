<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    protected $table = 'plays';
    protected $fillable = ['format', 'score1', 'score2', 'date', 'dateFin', 'round_id'];

    public function tournoi()
    {
        return $this->belongsTo('App\Models\Tournoi');
    }

    public function round()
    {
        return $this->belongsTo('App\Models\Round');
    }

    public function equipe1()
    {
        return $this->belongsTo('App\Models\Equipe', 'equipe1_id');
    }

    public function equipe2()
    {
        return $this->belongsTo('App\Models\Equipe', 'equipe2_id');
    }
}
