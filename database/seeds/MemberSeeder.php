<?php

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::updateOrCreate([
            'name' => "Luciano",
            'last_name' => "Genessini",
            'phone' => "+543754000000",
            'borrowed_books_limit' => 5,
            'active' => true,
        ]);

        Member::updateOrCreate([
            'name' => "Lionel",
            'last_name' => "Messi",
            'phone' => "+543754000000",
            'borrowed_books_limit' => 20,
            'active' => true,
        ]);

        Member::updateOrCreate([
            'name' => "Carlos",
            'last_name' => "Gardel",
            'phone' => "+543754000000",
            'borrowed_books_limit' => 5,
            'active' => false,
        ]);
    }
}
