<?php
uses(Tests\TestCase::class);

test('can access home page', function () {
    $response  = $this->get('/');
    expect($response->status())->toBe(200);
});
