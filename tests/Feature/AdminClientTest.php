<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Admin;

class AdminClientTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Create an admin and authenticate with admin guard for protected admin routes
        $admin = Admin::factory()->create([ 'email' => 'admin@example.com', 'password' => bcrypt('password') ]);
        $this->actingAs($admin, 'admin');
    }

    public function test_create_client_success()
    {
        $response = $this->postJson(route('admin.clients.store'), [
            'name' => 'Test Client',
            'email' => 'client@example.com',
            'phone' => '1234567890',
            'company_name' => 'Acme',
            'status' => 1,
            'password' => 'secret123'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => 'client@example.com']);
    }

    public function test_create_client_validation_error()
    {
        $response = $this->postJson(route('admin.clients.store'), [
            'name' => '',
            'email' => 'not-an-email',
            'password' => '123'
        ]);

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors']);
    }

    public function test_update_client_success()
    {
        $user = User::factory()->create(['role' => 1]);

        $response = $this->putJson(route('admin.clients.update', $user->id), [
            'name' => 'Updated Name',
            'email' => $user->email,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Updated Name']);
    }

    public function test_update_client_validation_error()
    {
        $user = User::factory()->create(['role' => 1]);

        $response = $this->putJson(route('admin.clients.update', $user->id), [
            'name' => '',
            'email' => 'invalid'
        ]);

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors']);
    }
}
