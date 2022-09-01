<?php 

namespace App\Data;

class Bar
{
    private Foo $foo;

    public function __construct(Foo $foo)
    {
        $this->Foo = $foo;
    }
    function bar(): string{
        return $this->Foo->foo() . " and Bar";
    }
}