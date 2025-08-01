<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


it('allows user to login with correct credentials', function () {
    // Kullanıcı oluştur
    $user = User::factory()->create([
        'password' => bcrypt('secret123'),
    ]);

    // Login isteği
    $response = $this->post('login', [
        'email' => $user->email,
        'password' => 'secret123',
    ]);

    // Kontroller
    $response->assertStatus(302); // Redirect beklenir
    $this->assertAuthenticatedAs($user);
});

it('rejects login with wrong credentials', function () {
    $user = User::factory()->create([
        'password' => bcrypt('secret123'),
    ]);

    $response = $this->post('login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $response->assertStatus(302);
    $this->assertGuest();
});
