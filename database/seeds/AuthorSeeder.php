<?php

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::updateOrCreate(['name' => "Miguel", 'last_name' => "De Cevantes"]);
        Author::updateOrCreate(['name' => "Jane", 'last_name' => "Austen"]);
    }
}
