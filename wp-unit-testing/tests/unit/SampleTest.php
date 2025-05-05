<?php

use Brain\Monkey\Functions;
use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        \Brain\Monkey\setUp();

        Functions\stubs([
            'wp_parse_args' => fn($a = [], $b = []) => array_merge($b, $a),
        ]);
    }

    protected function tearDown(): void
    {
        \Brain\Monkey\tearDown();
        parent::tearDown();
    }

    /** test */
    public function testTrueIsTrue()
    {
        $this->assertTrue(true);
    }
}