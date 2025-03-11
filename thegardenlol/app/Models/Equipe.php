<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $table = 'equipes';
    protected $fillable = ['nom', 'image_url', 'nb_joueurs', 'tournoi_id','slug'];

    public function tournoi()
    {
        return $this->belongsTo(Tournoi::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role')->withTimestamps();
    }
}
