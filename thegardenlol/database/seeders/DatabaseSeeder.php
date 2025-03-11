<?php

namespace Database\Seeders;

use App\Models\Equipe;
use App\Models\Role;
use App\Models\User;
use App\Models\Tournoi;
use App\Models\Round;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        Role::create(['name' => 'admin', 'slug' => 'admin']);
        Role::create(['name' => 'user', 'slug' => 'user']);

        User::find(1)->roles()->attach(1);

        Tournoi::create([
            'nom' => 'Tournoi 1',
            'date' => '2021-12-01',
            'dateFin' => '2021-12-31',
            'format' => 'Simple',
            'EquipeVainqueur' => 'Equipe 2<',
        ]);

        Tournoi::create([
            'nom' => 'Tournoi 2',
            'date' => '2022-01-01',
            'dateFin' => '2022-01-31',
            'format' => 'Simple',
            'EquipeVainqueur' => 'Equipe 2',
        ]);

        Tournoi::create([
            'nom' => 'Tournoi 3',
            'date' => '2022-02-01',
            'dateFin' => '2025-02-28',
            'format' => 'Simple',
        ]);

        Tournoi::factory(10)->create();
        
        Equipe::create([
            'name' => 'Equipe 1',
            'image_url' => 'uploads/equipes/default.png',
            'tournoi_id' => Tournoi::all()->random()->id,
            'nb_joueurs' => 0,
        ]);

        Equipe::create([
            'name' => 'Equipe 2',
            'image_url' => 'uploads/equipes/default.png',
            'tournoi_id' => 1,
            'nb_joueurs' => 0,
        ]);

        Equipe::create([
            'name' => 'Equipe 3',
            'image_url' => 'uploads/equipes/default.png',
            'tournoi_id' => 1,
            'nb_joueurs' => 0,
        ]);

        Equipe::create([
            'name' => 'test',
            'image_url' => 'uploads/equipes/default.png',
            'tournoi_id' => 1,
            'nb_joueurs' => 0,
            'slug' => 'ltr',
        ]);

        User::find(1)->equipes()->attach(1, ['role' => 'capitaine']);
        User::find(1)->equipes()->attach(2);
        User::factory(100)->create()->each(function ($user) {
            $equipe = Equipe::all()->random();
            $equipe->nb_joueurs++;
            $user->equipes()->attach($equipe->id, ['role' => 'joueur']);
        });

        Round::create([
            'nom' => 'Round 1',
            'tournoi_id' => 1,
        ]);

        Round::find(1)->plays()->create([
            'score1' => 0,
            'score2' => 0,
            'format' => 'Simple',
            'date' => '2021-12-01',
            'dateFin' => '2021-12-31',
            'equipe1_id' => Equipe::where('tournoi_id', 1)->get()->random()->id,
            'equipe2_id' => Equipe::where('tournoi_id', 1)->get()->random()->id,
        ]);

        Round::find(1)->plays()->create([
            'score1' => 0,
            'score2' => 0,
            'format' => 'Simple',
            'date' => '2021-12-01',
            'dateFin' => '2021-12-31',
            'equipe1_id' => Equipe::where('tournoi_id', 1)->get()->random()->id,
            'equipe2_id' => Equipe::where('tournoi_id', 1)->get()->random()->id,
        ]);

        Round::find(1)->plays()->create([
            'score1' => 0,
            'score2' => 0,
            'format' => 'Simple',
            'date' => '2021-12-01',
            'dateFin' => '2021-12-31',
            'equipe1_id' => 1,
            'equipe2_id' => 4,
        ]);
    }
}
