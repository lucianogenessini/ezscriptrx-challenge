<?php

use App\Models\BorrowedBook;
use Illuminate\Database\Seeder;

class BorrowedBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BorrowedBook::updateOrCreate([
            'member_id' => 1,
            'book_id' => 1,
        ]);
    }
}
