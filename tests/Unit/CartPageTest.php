<?php
uses(Tests\TestCase::class);

test('can access cart page', function () {
    $response  = $this->get('/cart');
    expect($response->status())->toBe(200);
});
