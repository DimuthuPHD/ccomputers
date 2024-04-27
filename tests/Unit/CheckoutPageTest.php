<?php
uses(Tests\TestCase::class);

test('can access checkout page', function () {
    $response  = $this->get('/checkout');
    expect($response->status())->toBe(302);
});
