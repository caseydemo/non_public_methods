<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item;
        
        $this->assertNotEmpty($item->getDescription());                    
    }
    
    public function testIDisAnInteger() {
        $item = new ItemChild;        
        $this->assertIsInt($item->getID());
    }    

    public function testTokenIsAString() {
        $item = new Item;
        $reflector = new ReflectionClass(Item::class);
        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);
        $result = $method->invoke($item);        
        $this->assertIsString($result);        
    }    

    public function test_prefix_token_starts_with_prefix() {
        $item = new Item;
        $reflector = new ReflectionClass(Item::class);
        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);
        $result = $method->invokeArgs($item, ['example']); // two params - first is obj of the class, second is an array of arguments
        $this->assertStringStartsWith('example', $result);
    }
}
