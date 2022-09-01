<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvDefaultTest extends TestCase
{
   function testDefEnv(){
    $author = env("AUTHOR", "Yanuar");
    
    self::assertEquals("Yanuar", $author);
}
}