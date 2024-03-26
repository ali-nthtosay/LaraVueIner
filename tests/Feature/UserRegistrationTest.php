<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_can_register_with_valid_credentials()
    {
        $password = 'Password@123';
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
            'password_confirmation' => $password
        ];

        $response = $this->post('user-account/create', $userData);

        $response->assertStatus(302); // Redirect after successful registration
        $this->assertDatabaseHas('users', ['email' => $userData['email']]);
    }

    public function test_user_cannot_register_with_invalid_email()
    {
        $password = 'Password@123';
        $userData = [
            'name' => $this->faker->name,
            'email' => 'invalid-email',
            'password' => $password,
            'password_confirmation' => $password
        ];

        $response = $this->post('user-account/create', $userData);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseMissing('users', ['email' => $userData['email']]);
    }
}
