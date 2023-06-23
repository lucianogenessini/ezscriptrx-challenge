<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase, WithFaker;

    /**
     * Setup the testing environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->seedDatabase();
    }

    /**
     * Seed the database.
     */
    protected function seedDatabase(): void
    {
        $this->artisan('migrate:fresh');
        $this->seed();
    }
}
