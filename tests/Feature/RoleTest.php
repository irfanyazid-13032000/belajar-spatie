<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCanShowRolePage(): void
    {
        $user = User::role('it')->get()->random();
        $this->actingAs($user);
        $this->get('/roles')
            ->assertStatus(200);
    }
    public function testCanCreateRole(): void
    {
        $user = User::role('it')->get()->random();
        $this->actingAs($user);
        $this->get('/roles/create')
            ->assertStatus(200);
    }
    public function testCannotShowRolePage(): void
    {
        $user = User::role('spv')->get()->random();
        $this->actingAs($user);
        $this->get('/roles')
            ->assertStatus(403);
    }
    public function testCannotCreateRole(): void
    {
        $user = User::role('staff')->get()->random();
        $this->actingAs($user);
        $this->get('/roles/create')
            ->assertStatus(403);
    }
    public function testBeforeLogin(): void
    {
       $this->get('/roles')->assertRedirect('/login');
    }


    public function testCannotCreateRoleBeforeLogin(): void
    {
       $this->get('/roles/create')->assertRedirect('/login');
    }
}
