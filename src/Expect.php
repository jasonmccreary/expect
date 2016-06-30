<?php
namespace PSpec;

use PHPUnit_Framework_Assert as a;
use PHPUnit_Framework_Exception;
use PHPUnit_Util_XML;

class Expect
{
    protected $actual = null;
    protected $negate = false;

    public function __construct($actual)
    {
        $this->actual = $actual;
    }

    public function not()
    {
        $this->negate = !$this->negate;

        return $this;
    }

    public function toEqual($expected)
    {
        if ($this->negate) {
            a::assertNotEquals($expected, $this->actual);
        } else {
            a::assertEquals($expected, $this->actual);
        }
    }

    public function toContain($needle)
    {
        if ($this->negate) {
            a::assertNotContains($needle, $this->actual);
        } else {
            a::assertContains($needle, $this->actual);
        }
    }

    public function toBeGreaterThan($expected)
    {
        if ($this->negate) {
            a::assertLessThanOrEqual($expected, $this->actual);
        } else {
            a::assertGreaterThan($expected, $this->actual);
        }
    }

    public function toBeLessThan($expected)
    {
        if ($this->negate) {
            a::assertGreaterThanOrEqual($expected, $this->actual);
        } else {
            a::assertLessThan($expected, $this->actual);
        }
    }

    public function toBeGreaterThanOrEqualTo($expected)
    {
        if ($this->negate) {
            a::assertLessThan($expected, $this->actual);
        } else {
            a::assertGreaterThanOrEqual($expected, $this->actual);
        }
    }

    public function toBeLessThanOrEqualTo($expected)
    {
        if ($this->negate) {
            a::assertGreaterThan($expected, $this->actual);
        } else {
            a::assertLessThanOrEqual($expected, $this->actual);
        }
    }

    public function toBeTrue()
    {
        if ($this->negate) {
            a::assertNotTrue($this->actual);
        } else {
            a::assertTrue($this->actual);
        }
    }

    public function toBeFalse()
    {
        if ($this->negate) {
            a::assertNotFalse($this->actual);
        } else {
            a::assertFalse($this->actual);
        }
    }

    public function toBeNull()
    {
        if ($this->negate) {
            a::assertNotNull($this->actual);
        } else {
            a::assertNull($this->actual);
        }
    }

    public function toBeEmpty()
    {
        if ($this->negate) {
            a::assertNotEmpty($this->actual);
        } else {
            a::assertEmpty($this->actual);
        }
    }

    public function toHaveKey($key)
    {
        if ($this->negate) {
            a::assertArrayNotHasKey($key, $this->actual);
        } else {
            a::assertArrayHasKey($key, $this->actual);
        }
    }

    public function toBeInstanceOf($class)
    {
        if ($this->negate) {
            a::assertNotInstanceOf($class, $this->actual);
        } else {
            a::assertInstanceOf($class, $this->actual);
        }
    }

    public function toBeType($type)
    {
        if ($this->negate) {
            a::assertNotInternalType($type, $this->actual);
        } else {
            a::assertInternalType($type, $this->actual);
        }
    }

    public function toHaveProperty($attribute)
    {
        if (is_string($this->actual)) {
            if ($this->negate) {
                a::assertClassNotHasAttribute($attribute, $this->actual);
            } else {
                a::assertClassHasAttribute($attribute, $this->actual);
            }
        } else {
            if ($this->negate) {
                a::assertObjectNotHasAttribute($attribute, $this->actual);
            } else {
                a::assertObjectHasAttribute($attribute, $this->actual);
            }
        }
    }

    public function toHaveStaticProperty($attribute)
    {
        if ($this->negate) {
            a::assertClassNotHasStaticAttribute($attribute, $this->actual);
        } else {
            a::assertClassHasStaticAttribute($attribute, $this->actual);
        }
    }

    public function toContainType($type)
    {
        if ($this->negate) {
            a::assertNotContainsOnly($type, $this->actual);
        } else {
            a::assertContainsOnly($type, $this->actual);
        }
    }

    public function toContainInstancesOf($class)
    {
        a::assertContainsOnlyInstancesOf($class, $this->actual);
    }

    public function toHaveCount($count)
    {
        if ($this->negate) {
            a::assertNotCount($count, $this->actual);
        } else {
            a::assertCount($count, $this->actual);
        }
    }

    public function toHaveXmlStructure($xml, $checkAttributes = false)
    {
        a::assertEqualXMLStructure($xml, $this->actual, $checkAttributes);
    }

    public function toExist()
    {
        if ($this->negate) {
            a::assertFileNotExists($this->actual);
        } else {
            a::assertFileExists($this->actual);
        }
    }

    public function toMatchPattern($pattern)
    {
        if ($this->negate) {
            a::assertNotRegExp($pattern, $this->actual);
        } else {
            a::assertRegExp($pattern, $this->actual);
        }
    }

    public function toMatchFormat($format)
    {
        if ($this->negate) {
            a::assertStringNotMatchesFormat($format, $this->actual);
        } else {
            a::assertStringMatchesFormat($format, $this->actual);
        }
    }

    public function toBe($expected)
    {
        if ($this->negate) {
            a::assertNotSame($expected, $this->actual);
        } else {
            a::assertSame($expected, $this->actual);
        }
    }

    public function toEndWith($suffix)
    {
        if ($this->negate) {
            a::assertStringEndsNotWith($suffix, $this->actual);
        } else {
            a::assertStringEndsWith($suffix, $this->actual);
        }
    }

    public function toStartWith($prefix)
    {
        if ($this->negate) {
            a::assertStringStartsNotWith($prefix, $this->actual);
        } else {
            a::assertStringStartsWith($prefix, $this->actual);
        }
    }

    public function toBeJson()
    {
        if ($this->negate) {
            a::assertThat($this->actual, a::logicalAnd(a::isType('string'), a::logicalNot(a::isJson())));
        } else {
            a::assertJson($this->actual);
        }
    }

    public function toBeXml()
    {
        try {
            PHPUnit_Util_XML::load($this->actual);
        } catch(PHPUnit_Framework_Exception $e) {
            if (!$this->negate) {
                throw $e;
            }
        }
    }
}
