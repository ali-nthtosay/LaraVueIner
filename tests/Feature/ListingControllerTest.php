<?php

namespace Tests\Feature;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RealtorListingControllerTest extends TestCase
{
    use RefreshDatabase; // Reset the database after each test

    public function test_listing_can_be_created()
    {
        // Create a user (assuming authentication is needed)
        $user = User::factory()->create();

        // Simulate a POST request to the store method
        $response = $this->actingAs($user)->post(route('dashboard.listing.store'), [
            'zimmer' => 3,
            'badezimmer' => 2,
            'wohnflaeche' => 120,
            'stadt' => 'Berlin',
            'plz' => '12345',
            'strasse' => 'Example Street',
            'preis' => 250000,
            'hausnummer' => '1',
            'wohnungstype' => 'Apartment',
        ]);

        // Assert that the listing was created successfully
        $response->assertStatus(302); // Assuming you're redirecting after successful creation
        $this->assertDatabaseHas('listings', [
            'zimmer' => 3,
            'badezimmer' => 2,
            'wohnflaeche' => 120,
            'stadt' => 'Berlin',
            'plz' => '12345',
            'strasse' => 'Example Street',
            'preis' => 250000,
            'hausnummer' => '1',
            'wohnungstype' => 'Apartment',
            'by_user_id' => $user->id, // Assuming you're storing the user ID in the listing
        ]);
    }
}
