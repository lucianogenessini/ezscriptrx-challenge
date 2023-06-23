<?php

namespace Tests\Feature;

use App\Models\Author;
use App\User;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    public function testStoreAuthor()
    {
        $user = User::first();
        $this->actingAs($user);
        
        $this->post(route('author.store'), [
            'name' => 'name',
            'lastName' => 'last name'
        ]);
        
        $this->assertDatabaseHas('authors', [
            'name' => 'name',
            'last_name' => 'last name'
        ]);
    }

    public function testUpdateAuthor()
    {
        $user = User::first();
        $this->actingAs($user);
        
        $author = factory(Author::class)->create();
        $this->put(route('author.update', ['author' => $author]), [
            'id' => $author->id,
            'name' => 'name-updated',
            'lastName' => 'last_name-updated',
        ]);
        
        $this->assertDatabaseHas('authors', [
            'name' => 'name-updated',
            'last_name' => 'last_name-updated',
        ]);
    }

    public function testDestroyAuthor()
    {
        $user = User::first();
        $this->actingAs($user);
        
        $author = factory(Author::class)->create();

        $this->delete(route('author.destroy', ['author' => $author]));
        
        $this->assertSoftDeleted('authors', [
            'id' => $author->id,
        ]);
    }
}
