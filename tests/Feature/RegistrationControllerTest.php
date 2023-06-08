<?php

namespace Tests\Feature;

use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationControllerTest extends TestCase
{
    use RefreshDatabase;

    const NUM_VIP_ACCESS = 10;
    const NUM_EARLY_BIRD_ACCESS = 20;

    /** @test */
    public function it_can_register_a_new_user_via_ajax()
    {
        $payload = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ];

        $response = $this->post('/api/register', $payload, ['X-Requested-With' => 'XMLHttpRequest']);

        $registrations = Registration::count();
        $max_access_privilege = self::NUM_EARLY_BIRD_ACCESS + self::NUM_VIP_ACCESS;

        $message = 'Thank you for registering!';
        $available_msg = "Register with the form below";

        if ($registrations <= self::NUM_VIP_ACCESS) {
            $message .= ' You have received VIP access.';
            $available_msg = self::NUM_VIP_ACCESS - $registrations . ' VIP Access Left';
        } elseif ($registrations <= $max_access_privilege) {
            $message .= ' You have received early-bird access.';
            $available_msg = $max_access_privilege - $registrations . ' Early-bird Access Left';
        }

        $response->assertStatus(200)->assertJson([
            'message' => $message,
            'available' => $available_msg,
        ]);

        $this->assertDatabaseHas('registrations', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
    }

    /** @test */
    public function it_cannot_register_an_existing_user_via_ajax()
    {
        $payload = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ];

        $response = $this->post('/api/register', $payload, ['X-Requested-With' => 'XMLHttpRequest']);

        $registrations = Registration::count();
        $max_access_privilege = self::NUM_EARLY_BIRD_ACCESS + self::NUM_VIP_ACCESS;

        $message = 'Thank you for registering!';
        $available_msg = "Register with the form below";

        if ($registrations <= self::NUM_VIP_ACCESS) {
            $message .= ' You have received VIP access.';
            $available_msg = self::NUM_VIP_ACCESS - $registrations . ' VIP Access Left';
        } elseif ($registrations <= $max_access_privilege) {
            $message .= ' You have received early-bird access.';
            $available_msg = $max_access_privilege - $registrations . ' Early-bird Access Left';
        }

        $response->assertStatus(200)->assertJson([
            'message' => $message,
            'available' => $available_msg,
        ]);

        $this->assertDatabaseHas('registrations', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);

        $response = $this->post('/api/register', $payload, ['X-Requested-With' => 'XMLHttpRequest']);
        $response->assertSessionHasErrors(['email']);
    }
}
