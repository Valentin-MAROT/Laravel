<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournoi extends Model
{
    use HasFactory;
    protected $table = 'tournois';
    protected $fillable = ['nom', 'date','dateFin','format','EquipeVainqueur'];

    public function equipes()
    {
        return $this->hasMany(Equipe::class);
    }

    public function rounds()
    {
        return $this->hasMany(Round::class);
    }
}
