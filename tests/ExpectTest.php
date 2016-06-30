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
        expect(5)->toEqual(5);
        expect("hello")->toEqual("hello");
        expect(5)->toEqual(5);
        expect(3)->notEquals(5);
    }

    public function testContains()
    {
        expect(array(3, 2))->toContain(3);
        expect(array(3, 2))->notContains(5);
    }

    public function testGreaterLowerThan()
    {
        expect(7)->toBeGreaterThan(5);
        expect(7)->toBeLessThan(10);
        expect(7)->toBeLessThanOrEqualTo(7);
        expect(7)->toBeLessThanOrEqualTo(8);
        expect(7)->toBeGreaterThanOrEqualTo(7);
        expect(7)->toBeGreaterThanOrEqualTo(5);
    }

    public function testTrueFalseNull()
    {
        expect(true)->toBeTrue();
        expect(false)->toBeFalse();
        expect(null)->toBeNull();
        expect(true)->notNull();
        expect(false)->toBeFalse();
        expect(true)->toBeTrue();
    }

    public function testEmptyNotEmpty()
    {
        expect(array('3', '5'))->notEmpty();
        expect(array())->toBeEmpty();
    }

    public function testArrayHasKey()
    {
        $errors = array('title' => 'You should add title');
        expect($errors)->toHaveKey('title');
        expect($errors)->hasntKey('body');
    }

    public function testIsInstanceOf()
    {
        $testClass = new DateTime();
        expect($testClass)->toBeInstanceOf('DateTime');
        expect($testClass)->isNotInstanceOf('DateTimeZone');
    }

    public function testInternalType()
    {
        $testVar = array();
        expect($testVar)->toBeType('array');
        expect($testVar)->notInternalType('boolean');
    }

    public function testHasAttribute()
    {
        expect('Exception')->toHaveProperty('message');
        expect('Exception')->notHasAttribute('fakeproperty');
    }

    public function testHasStaticAttribute()
    {
        expect(\PSpec\FakeClassForTesting::class)->toHaveStaticProperty('staticProperty');
        expect(\PSpec\FakeClassForTesting::class)->notHasStaticAttribute('fakeProperty');
    }

    public function testContainsOnly()
    {
        expect(array('1', '2', '3'))->toContainType('string');
        expect(array('1', '2', 3))->notContainsOnly('string');
    }

    public function testContainsOnlyInstancesOf()
    {
        expect(array(new FakeClassForTesting(), new FakeClassForTesting(), new FakeClassForTesting()))
            ->toContainInstancesOf(\PSpec\FakeClassForTesting::class);
    }

    public function testCount()
    {
        expect(array(1,2,3))->toHaveCount(3);
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
        expect(__FILE__)->toExist();
        expect('completelyrandomfilename.txt')->notExists();
    }

    public function testEqualsJsonFile()
    {
        expect(__DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'json-test-file.json')
            ->toBeJSONFile();
    }

    public function testEqualsJsonString()
    {
        expect('{"some" : "data"}')->toBeJSONString();
    }

    public function testRegExp()
    {
        expect('somestring')->toMatchPattern('/string/');
    }

    public function testMatchesFormat()
    {
        expect('somestring')->toMatchFormat('%s');
        expect('somestring')->notMatchesFormat('%i');
    }

    public function testSame()
    {
        expect(1)->toBe(0+1);
        expect(1)->notSame(true);
    }

    public function testEndsWith()
    {
        expect('A completely not funny string')->toEndWith('ny string');
        expect('A completely not funny string')->notEndsWith('A completely');
    }

    public function testStartsWith()
    {
        expect('A completely not funny string')->toStartWith('A completely');
        expect('A completely not funny string')->notStartsWith('string');
    }

    public function testEqualsXmlFile()
    {
        expect(__DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'xml-test-file.xml')
            ->toBeXmlFile();
    }

    public function testEqualsXmlString()
    {
        expect('<foo><bar>Baz</bar><bar>Baz</bar></foo>')->toBeXmlString();
    }
}



class FakeClassForTesting
{
    static $staticProperty;
}
