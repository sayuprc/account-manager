<?php

declare(strict_types=1);

namespace Tests\Unit\Basic\Domain\ValueObjects;

use Basic\Domain\ValueObjects\BoolValueObject;
use PHPUnit\Framework\TestCase;

class BoolValueObjectTest extends TestCase
{
    /**
     * Testing for getValue method
     *
     * @return void
     */
    public function testGetValue(): void
    {
        $value = true;

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
        $value = true;

        $instanceA = $this->createInstance($value);
        $instanceB = $this->createInstance($value);

        $this->assertTrue($instanceA->equals($instanceB));

        $instanceC = $this->createInstance(false);

        $this->assertFalse($instanceC->equals($instanceA));
    }

    /**
     * Create an instance of a class that inherits from the BoolValueObject class
     *
     * @param bool $arg
     *
     * @return BoolValueObject
     */
    private function createInstance(bool $arg): BoolValueObject
    {
        return new class($arg)extends BoolValueObject {
        };
    }
}
