<?php

class SampleIntegrationTest extends WP_UnitTestCase
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::set_up_before_class();
    }

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function testTrueIsTrue()
    {
        $this->assertTrue(true);
    }
}