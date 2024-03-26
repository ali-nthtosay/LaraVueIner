<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function testUserRegistration()
    {
        // Simulate a registration request with valid data
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Assert that the user is created in the database
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // Assert that the user is logged in after registration
        $this->assertAuthenticated();
    }

    public function testUserRegistrationValidation()
    {
        // Simulate a registration request with invalid data
        $response = $this->post('/register', [
            'name' => '', // Invalid: name is required
            'email' => 'invalid-email', // Invalid: email format is incorrect
            'password' => 'password', // Invalid: password confirmation is missing
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }
}
