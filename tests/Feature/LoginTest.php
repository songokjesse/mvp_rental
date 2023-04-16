<?php

use App\Models\User;


it('has login page', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});




it('should display error message when user tries to login without approval', function () {
    // Create a new user with 'is_approved' set to false
    $user = User::factory()->create(['approved' => false]);

    // Attempt to log in as the new user
    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    // Assert that the response has the correct status code
    $response->assertStatus(302);

    // Assert that the user is redirected back to the login page
    $response->assertRedirect('/login');

    // Assert that the error message is displayed on the login page
    $response->assertSessionHasErrors('approval', 'Your account has not been approved yet.');
});

it('should allow user to login after approval', function () {
    // Create a new user with 'is_approved' set to false
    $user = User::factory()->create(['approved' => false]);

    // Approve the user
    $user->is_approved = true;
    $user->save();

    // Attempt to log in as the new user
    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    // Assert that the response has the correct status code
    $response->assertStatus(302);

    // Assert that the user is redirected to the home page
    $response->assertRedirect('/home');

    // Assert that the authenticated user is the correct user
    $this->assertAuthenticatedAs($user);
});
