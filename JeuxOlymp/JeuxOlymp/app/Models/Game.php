<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function addPlayer(User $user)
    {
        if ($this->users->contains($user)) {
            return $this;
        }
        $this->users()->attach($user);
        return $this;
    }

    public function deletePlayer(User $user)
    {
        if (!$this->users->contains($user)) {
            return $this;
        }
        $this->users()->detach($user);
        return $this;
    }
}
