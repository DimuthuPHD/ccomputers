    <?php

    use App\Models\Customer;

    uses(Tests\TestCase::class);

    test('user can register', function () {
        $userData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password', // Add password confirmation
        ];

        $response = $this->post('/customer/register', $userData);

        // Assuming a successful registration redirects to the home page
        $response->assertRedirect('/');

        // Assert that the user is stored in the database
        $this->assertDatabaseHas('customers', ['email' => 'john@example.com']);
    });
