<?php
uses(Tests\TestCase::class);

test('can access store page', function () {
    $response  = $this->get('/store?cat=gaming-laptops');
    expect($response->status())->toBe(200);
});
