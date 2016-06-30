<?php
namespace PSpec;

use DateTime;
use DOMDocument;
use DOMElement;
use PHPUnit_Framework_TestCase;

class ExpectTest extends PHPUnit_Framework_TestCase {

    protected $xml;

    protected function setUp()
    {
        $this->xml = new DomDocument;
        $this->xml->loadXML('<foo><bar>Baz</bar><bar>Baz</bar></foo>');
    }
    public function testEquals()
    {
        expect(5)->equals(5);
        expect("hello")->equals("hello");
        expect(5)->equals(5);
        expect(3)->notEquals(5);
    }

    public function testContains()
    {
        expect(array(3, 2))->contains(3);
        expect(array(3, 2))->notContains(5);
    }

    public function testGreaterLowerThan()
    {
        expect(7)->greaterThan(5);
        expect(7)->lessThan(10);
        expect(7)->lessOrEquals(7);
        expect(7)->lessOrEquals(8);
        expect(7)->greaterOrEquals(7);
        expect(7)->greaterOrEquals(5);
    }

    public function testTrueFalseNull()
    {
        expect(true)->true();
        expect(false)->false();
        expect(null)->null();
        expect(true)->notNull();
        expect(false)->false();
        expect(true)->true();
    }

    public function testEmptyNotEmpty()
    {
        expect(array('3', '5'))->notEmpty();
        expect(array())->isEmpty();
    }

    public function testArrayHasKey()
    {
        $errors = array('title' => 'You should add title');
        expect($errors)->hasKey('title');
        expect($errors)->hasntKey('body');
    }

    public function testIsInstanceOf()
    {
        $testClass = new DateTime();
        expect($testClass)->isInstanceOf('DateTime');
        expect($testClass)->isNotInstanceOf('DateTimeZone');
    }

    public function testInternalType()
    {
        $testVar = array();
        expect($testVar)->internalType('array');
        expect($testVar)->notInternalType('boolean');
    }

    public function testHasAttribute()
    {
        expect('Exception')->hasAttribute('message');
        expect('Exception')->notHasAttribute('fakeproperty');
    }

    public function testHasStaticAttribute()
    {
        expect(\PSpec\FakeClassForTesting::class)->hasStaticAttribute('staticProperty');
        expect(\PSpec\FakeClassForTesting::class)->notHasStaticAttribute('fakeProperty');
    }

    public function testContainsOnly()
    {
        expect(array('1', '2', '3'))->containsOnly('string');
        expect(array('1', '2', 3))->notContainsOnly('string');
    }

    public function testContainsOnlyInstancesOf()
    {
        expect(array(new FakeClassForTesting(), new FakeClassForTesting(), new FakeClassForTesting()))
            ->containsOnlyInstancesOf(\PSpec\FakeClassForTesting::class);
    }

    public function testCount()
    {
        expect(array(1,2,3))->count(3);
        expect(array(1,2,3))->notCount(2);
    }

    public function testEqualXMLStructure()
    {
        $expected = new DOMElement('foo');
        $actual = new DOMElement('foo');

        expect($expected)->equalXMLStructure($actual);
    }

    public function testFileExists()
    {
        expect(__FILE__)->exists();
        expect('completelyrandomfilename.txt')->notExists();
    }

    public function testEqualsJsonFile()
    {
        expect(__DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'json-test-file.json')
            ->equalsJsonFile();
    }

    public function testEqualsJsonString()
    {
        expect('{"some" : "data"}')->equalsJsonString();
    }

    public function testRegExp()
    {
        expect('somestring')->regExp('/string/');
    }

    public function testMatchesFormat()
    {
        expect('somestring')->matchesFormat('%s');
        expect('somestring')->notMatchesFormat('%i');
    }

    public function testMatchesFormatFile()
    {
        expect('23')->matchesFormatFile(__DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'format-file.txt');
        expect('asdfas')->notMatchesFormatFile(__DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'format-file.txt');
    }

    public function testSame()
    {
        expect(1)->same(0+1);
        expect(1)->notSame(true);
    }

    public function testEndsWith()
    {
        expect('A completely not funny string')->endsWith('ny string');
        expect('A completely not funny string')->notEndsWith('A completely');
    }

    public function testStartsWith()
    {
        expect('A completely not funny string')->startsWith('A completely');
        expect('A completely not funny string')->notStartsWith('string');
    }

    public function testEqualsXmlFile()
    {
        expect(__DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'xml-test-file.xml')
            ->equalsXmlFile();
    }

    public function testEqualsXmlString()
    {
        expect('<foo><bar>Baz</bar><bar>Baz</bar></foo>')->equalsXmlString();
    }
}



class FakeClassForTesting
{
    static $staticProperty;
}
