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

    public function equals($expected)
    {
        a::assertEquals($expected, $this->actual);
    }

    public function notEquals($expected)
    {
        a::assertNotEquals($expected, $this->actual);
    }

    public function contains($needle)
    {
        a::assertContains($needle, $this->actual);
    }

    public function notContains($needle)
    {
        a::assertNotContains($needle, $this->actual);
    }

    public function greaterThan($expected)
    {
        a::assertGreaterThan($expected, $this->actual);
    }

    public function lessThan($expected)
    {
        a::assertLessThan($expected, $this->actual);
    }

    public function greaterOrEquals($expected)
    {
        a::assertGreaterThanOrEqual($expected, $this->actual);
    }

    public function lessOrEquals($expected)
    {
        a::assertLessThanOrEqual($expected, $this->actual);
    }

    public function true()
    {
        a::assertTrue($this->actual);
    }

    public function false()
    {
        a::assertFalse($this->actual);
    }

    public function null()
    {
        a::assertNull($this->actual);
    }

    public function notNull()
    {
        a::assertNotNull($this->actual);
    }

    public function isEmpty()
    {
        a::assertEmpty($this->actual);
    }

    public function notEmpty()
    {
        a::assertNotEmpty($this->actual);
    }

    public function hasKey($key)
    {
        a::assertArrayHasKey($key, $this->actual);
    }

    public function hasntKey($key)
    {
        a::assertArrayNotHasKey($key, $this->actual);
    }

    public function isInstanceOf($class)
    {
        a::assertInstanceOf($class, $this->actual);
    }

    public function isNotInstanceOf($class)
    {
        a::assertNotInstanceOf($class, $this->actual);
    }

    public function internalType($type)
    {
        a::assertInternalType($type, $this->actual);
    }

    public function notInternalType($type)
    {
        a::assertNotInternalType($type, $this->actual);
    }

    public function hasAttribute($attribute)
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

    public function hasStaticAttribute($attribute)
    {
        a::assertClassHasStaticAttribute($attribute, $this->actual);
    }

    public function notHasStaticAttribute($attribute)
    {
        a::assertClassNotHasStaticAttribute($attribute, $this->actual);
    }

    public function containsOnly($type, $isNativeType = null)
    {
        a::assertContainsOnly($type, $this->actual, $isNativeType);
    }

    public function notContainsOnly($type, $isNativeType = null)
    {
        a::assertNotContainsOnly($type, $this->actual, $isNativeType);
    }

    public function containsOnlyInstancesOf($class)
    {
        a::assertContainsOnlyInstancesOf($class, $this->actual);
    }

    public function count($array)
    {
        a::assertCount($array, $this->actual);
    }

    public function notCount($array)
    {
        a::assertNotCount($array, $this->actual);
    }

    public function equalXMLStructure($xml, $checkAttributes = false)
    {
        a::assertEqualXMLStructure($xml, $this->actual, $checkAttributes);
    }

    public function exists()
    {
        a::assertFileExists($this->actual);
    }

    public function notExists()
    {
        a::assertFileNotExists($this->actual);
    }

    public function regExp($expression)
    {
        a::assertRegExp($expression, $this->actual);
    }

    public function matchesFormat($format)
    {
        a::assertStringMatchesFormat($format, $this->actual);
    }

    public function notMatchesFormat($format)
    {
        a::assertStringNotMatchesFormat($format, $this->actual);
    }

    public function matchesFormatFile($formatFile)
    {
        a::assertStringMatchesFormatFile($formatFile, $this->actual);
    }

    public function notMatchesFormatFile($formatFile)
    {
        a::assertStringNotMatchesFormatFile($formatFile, $this->actual);
    }

    public function same($expected)
    {
        a::assertSame($expected, $this->actual);
    }

    public function notSame($expected)
    {
        a::assertNotSame($expected, $this->actual);
    }

    public function endsWith($suffix)
    {
        a::assertStringEndsWith($suffix, $this->actual);
    }

    public function notEndsWith($suffix)
    {
        a::assertStringEndsNotWith($suffix, $this->actual);
    }

    public function startsWith($prefix)
    {
        a::assertStringStartsWith($prefix, $this->actual);
    }

    public function notStartsWith($prefix)
    {
        a::assertStringStartsNotWith($prefix, $this->actual);
    }

    public function equalsJsonFile()
    {
        a::assertJsonFileEqualsJsonFile($this->actual, $this->actual);
    }

    public function equalsJsonString()
    {
        a::assertJson($this->actual);
    }

    public function equalsXmlFile()
    {
        a::assertXmlFileEqualsXmlFile($this->actual, $this->actual);
    }

    public function equalsXmlString()
    {
        a::assertInstanceOf('DomDocument', PHPUnit_Util_XML::load($this->actual));
    }
}
