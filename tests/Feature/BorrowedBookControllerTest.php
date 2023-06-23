<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Member;
use App\User;
use Tests\TestCase;

class BorrowedBookControllerTest extends TestCase
{
    public function testStoreBorrow()
    {
        $user = User::first();
        $this->actingAs($user);
        
        $member = factory(Member::class)->create();
        $book = factory(Book::class)->create([
            'available_copies' => 10
        ]);
        
        $this->post(route('borrowedBook.store'), [
            'memberId' => $member->id,
            'bookId' => $book->id,
        ]);
        
        $this->assertDatabaseHas('borrowed_books', [
            'member_id' => $member->id,
            'book_id' => $book->id,
        ]);

        $book->refresh();
        $this->assertEquals($book->available_copies, 9);
    }
}