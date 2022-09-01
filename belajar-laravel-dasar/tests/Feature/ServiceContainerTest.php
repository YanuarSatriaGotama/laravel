<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Data\Person;

class ServiceContainerTest extends TestCase
{
    public function TestServiceContainer()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("Foo", $foo1->foo());
        self::assertEquals("Foo", $foo2->foo());
        self::assertEquals($foo1,$foo2());
    }

public function testBind()
{
    $this->app->bind(Person::class, function ($app) {
        return new Person("Yanuar", "Satria");
    });

    $person1 = $this->app->make(Person::class);
    $person2 = $this->app->make(Person::class);

    self::assertEquals("Yanuar", $person1->firstName);
    self::assertEquals("Yanuar", $person2->firstName);
    self::assertNotSame($person1, $person2);
}

public function testSingleton()
{
    $this->app->singleton(Person::class, function ($app) {
        return new Person("Yanuar", "Satria");
    });

    $person1 = $this->app->make(Person::class);
    $person2 = $this->app->make(Person::class);

    self::assertEquals("Yanuar", $person1->firstName);
    self::assertEquals("Yanuar", $person2->firstName);
    self::assertSame($person1, $person2);
}

public function testInstance()
{
    $person = new Person("Yanuar", "Satria");
    $this->app->instance(Person::class, $person);

    $person1 = $this->app->make(Person::class);
    $person2 = $this->app->make(Person::class);

    self::assertEquals("Yanuar", $person1->firstName);
    self::assertEquals("Yanuar", $person2->firstName);
    self::assertSame($person, $person1);
    self::assertSame($person1, $person2);
}


}
