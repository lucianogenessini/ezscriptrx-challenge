<?php

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::updateOrCreate([
            'title' => 'La Galatea',
            'author_id' => Author::where('last_name', 'De Cevantes')->first()->id,
            'total_copies' => 15,
            'available_copies' => 10,
        ]);

        Book::updateOrCreate([
            'title' => 'Don Quijote de la Mancha',
            'author_id' => Author::where('last_name', 'De Cevantes')->first()->id,
            'total_copies' => 50,
            'available_copies' => 20,
        ]);

        Book::updateOrCreate([
            'title' => 'Obras de juventud',
            'author_id' => Author::where('last_name', 'Austen')->first()->id,
            'total_copies' => 10,
            'available_copies' => 2,
        ]);
    }
}
