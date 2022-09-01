<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\App;

class EnvironmentTest extends TestCase
{
    public function testEnvironment()
    {
        if(App::environment('testing')){
            echo "LOGIC IN TESTING ENV". PHP_EOL;
            self::assertTrue(true);
        }
    }
}
