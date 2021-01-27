<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use Illuminate\Support\Str;


class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = collect([
            'Alternative Rock',
            'Britpunk',
            'College Rock',
            'Crossover Thrash',
        ]);

        $genres->each(function ($genre) {
            Genre::create([
                'name' => $genre,
                'slug' => Str::slug($genre)
            ]);
        });
    }
}
