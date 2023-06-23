<?php

namespace Tests\Feature;

use App\Models\Member;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MemberControllerTest extends TestCase
{
    public function testStoreMember()
    {
        $user = User::first();
        $this->actingAs($user);
        
        $this->post(route('member.store'), [
            'name' => 'name',
            'lastName' => 'last-name',
            'phone' => '+5437540000',
            'borrowedBooksLimit' => 20,
            'active' => true,
        ]);
        
        $this->assertDatabaseHas('members', [
            'name' => 'name',
            'last_name' => 'last-name',
            'phone' => '+5437540000',
            'borrowed_books_limit' => 20,
            'active' => true,
        ]);
    }

    public function testUpdateMember()
    {
        $user = User::first();
        $this->actingAs($user);
        
        $member = factory(Member::class)->create();
        $this->put(route('member.update', ['member' => $member]), [
            'name' => 'name-updated',
            'lastName' => 'last-name-updated',
            'phone' => '+5437540000',
            'borrowedBooksLimit' => 20,
            'active' => true,
        ]);
        
        $this->assertDatabaseHas('members', [
            'id' => $member->id,
            'name' => 'name-updated',
            'last_name' => 'last-name-updated',
        ]);
    }
}
