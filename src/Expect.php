<?php
namespace PSpec;

use PHPUnit_Framework_Assert as a;

class Expect {
    protected $actual = null;
    protected $isFileExpectation = false;

    public function __construct($actual)
    {
        $this->actual = $actual;
    }

    public function setIsFileExpectation($isFileExpectation)
    {
        $this->isFileExpectation = $isFileExpectation;
    }

    public function equals($expected)
    {
        if ( ! $this->isFileExpectation ) {
            a::assertEquals($expected, $this->actual);
        } else {
            a::assertFileEquals($expected, $this->actual);
        }
    }

    public function notEquals($expected)
    {
        if ( ! $this->isFileExpectation ) {
            a::assertNotEquals($expected, $this->actual);
        } else {
            a::assertFileNotEquals($expected, $this->actual);
        }
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

    public function containsOnly($type, $isNativeType = NULL)
    {
        a::assertContainsOnly($type, $this->actual, $isNativeType);
    }

    public function notContainsOnly($type, $isNativeType = NULL)
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

    public function equalXMLStructure($xml, $checkAttributes = FALSE)
    {
        a::assertEqualXMLStructure($xml, $this->actual, $checkAttributes);
    }

    public function exists()
    {
        if (!$this->isFileExpectation ) {
            throw new \Exception('exists() expectation should be called with expect_file()');
        }
        a::assertFileExists($this->actual);
    }

    public function notExists()
    {
        if (!$this->isFileExpectation ) {
            throw new \Exception('notExists() expectation should be called with expect_file()');
        }
        a::assertFileNotExists($this->actual);
    }

    public function equalsJsonFile($file)
    {
        if (!$this->isFileExpectation ) {
            a::assertJsonStringEqualsJsonFile($file, $this->actual);
        } else {
            a::assertJsonFileEqualsJsonFile($file, $this->actual);
        }
    }

    public function equalsJsonString($string)
    {
        a::assertJsonStringEqualsJsonString($string, $this->actual);
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

    public function equalsFile($file)
    {
        a::assertStringEqualsFile($file, $this->actual);
    }

    public function notEqualsFile($file)
    {
        a::assertStringNotEqualsFile($file, $this->actual);
    }

    public function startsWith($prefix)
    {
        a::assertStringStartsWith($prefix, $this->actual);
    }

    public function notStartsWith($prefix)
    {
        a::assertStringStartsNotWith($prefix, $this->actual);
    }

    public function equalsXmlFile($file)
    {
        if (!$this->isFileExpectation ) {
            a::assertXmlStringEqualsXmlFile($file, $this->actual);
        } else {
            a::assertXmlFileEqualsXmlFile($file, $this->actual);
        }
    }

    public function equalsXmlString($xmlString)
    {
        a::assertXmlStringEqualsXmlString($xmlString, $this->actual);
    }
}
