<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ["name" => "Thriller"],
            ["name" => "Fantasy"],
            ["name" => "Mystery"],
            ["name" => "Literary Fiction"],
            ["name" => "Horror"],
            ["name" => "Historical"],
            ["name" => "Romance"],
            ["name" => "Western"],
            ["name" => "Bildungsroman"],
            ["name" => "Speculative Fiction"],
            ["name" => "Science Fiction"],
            ["name" => "Dystopian"],
            ["name" => "Magical Realism"],
            ["name" => "Realist Literature"],
        ]);
    }
}
