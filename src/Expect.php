<?php
namespace PSpec;

use PHPUnit_Framework_Assert as a;
use PHPUnit_Util_XML;

class Expect
{
    protected $actual = null;

    public function __construct($actual)
    {
        $this->actual = $actual;
    }

    public function toEqual($expected)
    {
        a::assertEquals($expected, $this->actual);
    }

    public function notEquals($expected)
    {
        a::assertNotEquals($expected, $this->actual);
    }

    public function toContain($needle)
    {
        a::assertContains($needle, $this->actual);
    }

    public function notContains($needle)
    {
        a::assertNotContains($needle, $this->actual);
    }

    public function toBeGreaterThan($expected)
    {
        a::assertGreaterThan($expected, $this->actual);
    }

    public function toBeLessThan($expected)
    {
        a::assertLessThan($expected, $this->actual);
    }

    public function toBeGreaterThanOrEqualTo($expected)
    {
        a::assertGreaterThanOrEqual($expected, $this->actual);
    }

    public function toBeLessThanOrEqualTo($expected)
    {
        a::assertLessThanOrEqual($expected, $this->actual);
    }

    public function toBeTrue()
    {
        a::assertTrue($this->actual);
    }

    public function toBeFalse()
    {
        a::assertFalse($this->actual);
    }

    public function toBeNull()
    {
        a::assertNull($this->actual);
    }

    public function notNull()
    {
        a::assertNotNull($this->actual);
    }

    public function toBeEmpty()
    {
        a::assertEmpty($this->actual);
    }

    public function notEmpty()
    {
        a::assertNotEmpty($this->actual);
    }

    public function toHaveKey($key)
    {
        a::assertArrayHasKey($key, $this->actual);
    }

    public function hasntKey($key)
    {
        a::assertArrayNotHasKey($key, $this->actual);
    }

    public function toBeInstanceOf($class)
    {
        a::assertInstanceOf($class, $this->actual);
    }

    public function isNotInstanceOf($class)
    {
        a::assertNotInstanceOf($class, $this->actual);
    }

    public function toBeType($type)
    {
        a::assertInternalType($type, $this->actual);
    }

    public function notInternalType($type)
    {
        a::assertNotInternalType($type, $this->actual);
    }

    public function toHaveProperty($attribute)
    {
        if (is_string($attribute)) {
            a::assertClassHasAttribute($attribute, $this->actual);
        } else {
            a::assertObjectHasAttribute($attribute, $this->actual);
        }
    }

    public function notHasAttribute($attribute)
    {
        if (is_string($attribute)) {
            a::assertClassNotHasAttribute($attribute, $this->actual);
        } else {
            a::assertObjectNotHasAttribute($attribute, $this->actual);
        }
    }

    public function toHaveStaticProperty($attribute)
    {
        a::assertClassHasStaticAttribute($attribute, $this->actual);
    }

    public function notHasStaticAttribute($attribute)
    {
        a::assertClassNotHasStaticAttribute($attribute, $this->actual);
    }

    public function toContainType($type)
    {
        a::assertContainsOnly($type, $this->actual);
    }

    public function notContainsOnly($type, $isNativeType = null)
    {
        a::assertNotContainsOnly($type, $this->actual, $isNativeType);
    }

    public function toContainInstancesOf($class)
    {
        a::assertContainsOnlyInstancesOf($class, $this->actual);
    }

    public function toHaveCount($count)
    {
        a::assertCount($count, $this->actual);
    }

    public function notCount($array)
    {
        a::assertNotCount($array, $this->actual);
    }

    public function equalXMLStructure($xml, $checkAttributes = false)
    {
        a::assertEqualXMLStructure($xml, $this->actual, $checkAttributes);
    }

    public function toExist()
    {
        a::assertFileExists($this->actual);
    }

    public function notExists()
    {
        a::assertFileNotExists($this->actual);
    }

    public function toMatchPattern($pattern)
    {
        a::assertRegExp($pattern, $this->actual);
    }

    public function toMatchFormat($format)
    {
        a::assertStringMatchesFormat($format, $this->actual);
    }

    public function notMatchesFormat($format)
    {
        a::assertStringNotMatchesFormat($format, $this->actual);
    }

    public function toBe($expected)
    {
        a::assertSame($expected, $this->actual);
    }

    public function notSame($expected)
    {
        a::assertNotSame($expected, $this->actual);
    }

    public function toEndWith($suffix)
    {
        a::assertStringEndsWith($suffix, $this->actual);
    }

    public function notEndsWith($suffix)
    {
        a::assertStringEndsNotWith($suffix, $this->actual);
    }

    public function toStartWith($prefix)
    {
        a::assertStringStartsWith($prefix, $this->actual);
    }

    public function notStartsWith($prefix)
    {
        a::assertStringStartsNotWith($prefix, $this->actual);
    }

    public function toBeJSONFile()
    {
        a::assertJsonFileEqualsJsonFile($this->actual, $this->actual);
    }

    public function toBeJSONString()
    {
        a::assertJson($this->actual);
    }

    public function toBeXmlFile()
    {
        a::assertXmlFileEqualsXmlFile($this->actual, $this->actual);
    }

    public function toBeXmlString()
    {
        a::assertInstanceOf('DomDocument', PHPUnit_Util_XML::load($this->actual));
    }
}
