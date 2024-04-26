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

    test('user can login', function () {

        $credentials = [
            'email' => 'phdimuthukumara@gmail.com',
            'password' => 'secret',
        ];

        $response = $this->post('/customer/login', $credentials);

        // Debugging: Output the response content for inspection

        // Assert that the login redirects to the home page

        // Retrieve the user created during registration
        $user = Customer::where('email', 'phdimuthukumara@gmail.com')->first();

        // Debugging: Output the retrieved user for inspection
        $response->assertRedirect('/customer/dashboard/'.$user->id);

        // Optionally, you can assert that the user is authenticated
        // $this->assertAuthenticatedAs($user);
    });
