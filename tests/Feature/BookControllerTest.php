<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\User;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    public function testStoreBook()
    {
        $user = User::first();
        $this->actingAs($user);
        
        $author = Author::first();

        $this->post(route('book.store'), [
            'title' => 'name',
            'authorId' => $author->id,
            'totalCopies' => 30,
            'availableCopies' => 20
        ]);
        
        $this->assertDatabaseHas('books', [
            'title' => 'name',
            'author_id' => $author->id,
            'total_copies' => 30,
            'available_copies' => 20
        ]);
    }

    public function testUpdateBook()
    {
        $user = User::first();
        $this->actingAs($user);
        
        $author = Author::first();
        $book = factory(Book::class)->create();

        $this->put(route('book.update', ['book' => $book]), [
            'title' => 'name-updated',
            'authorId' => $author->id,
            'totalCopies' => 30,
            'availableCopies' => 20
        ]);
        
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'name-updated',
            'author_id' => $author->id,
            'total_copies' => 30,
            'available_copies' => 20
        ]);
    }

    public function testDestroyBook()
    {
        $user = User::first();
        $this->actingAs($user);
        
        $book = factory(Book::class)->create();

        $this->delete(route('book.destroy', ['book' => $book]));
        
        $this->assertSoftDeleted('books', [
            'id' => $book->id,
        ]);
    }
}
