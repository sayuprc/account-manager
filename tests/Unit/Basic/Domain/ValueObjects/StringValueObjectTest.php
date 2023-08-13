<?php

declare(strict_types=1);

namespace Tests\Unit\Basic\Domain\ValueObjects;

use Basic\Domain\ValueObjects\StringValueObject;
use PHPUnit\Framework\TestCase;

class StringValueObjectTest extends TestCase
{
    /**
     * Testing for getValue method
     *
     * @return void
     */
    public function testGetValue(): void
    {
        $value = 'hoge';

        $instance = $this->createInstance($value);

        $this->assertSame($value, $instance->getValue());
    }

    /**
     * Testing for equals method
     *
     * @return void
     */
    public function testEquals(): void
    {
        $value = 'hoge';

        $instanceA = $this->createInstance($value);
        $instanceB = $this->createInstance($value);

        $this->assertTrue($instanceA->equals($instanceB));

        $instanceC = $this->createInstance('fuga');

        $this->assertFalse($instanceC->equals($instanceA));
    }

    /**
     * Create an instance of a class that inherits from the StringValueObject class
     *
     * @param string $arg
     *
     * @return StringValueObject
     */
    private function createInstance(string $arg): StringValueObject
    {
        return new class($arg)extends StringValueObject {
        };
    }
}
