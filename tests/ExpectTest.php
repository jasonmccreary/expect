<?php
namespace PSpec\Test;

use PSpec\Expect;
use DateTime;
use DOMElement;
use PHPUnit_Framework_TestCase;

class ExpectTest extends PHPUnit_Framework_TestCase
{
    public function testExpectHelperFunction()
    {
        $this->assertInstanceOf(Expect::class, expect('actual'));
    }

    public function testNot()
    {
        $subject = new Expect('actual');
        $this->assertAttributeEquals(false, 'negate', $subject);

        $subject->not();
        $this->assertAttributeEquals(true, 'negate', $subject);

        $subject->not();
        $this->assertAttributeEquals(false, 'negate', $subject);
    }

    public function testNotIsFluent()
    {
        $subject = new Expect('actual');
        $this->assertInstanceOf(Expect::class, $subject->not());
    }

    public function testToEqual()
    {
        expect(5)->toEqual(5);
        expect(5)->not()->toEqual(3);
        expect("hello")->toEqual("hello");
        expect("hello")->not()->toEqual("goodbye");
        expect(true)->toEqual(true);
        expect(true)->not()->toEqual(false);
    }

    public function testToContain()
    {
        expect(array(3, 2))->toContain(3);
        expect(array(3, 2))->not()->toContain(5);
    }

    public function testToBeGreaterThan()
    {
        expect(7)->toBeGreaterThan(5);
        expect(7)->toBeGreaterThan(6);
        expect(7)->not()->toBeGreaterThan(7);
        expect(7)->not()->toBeGreaterThan(8);
    }

    public function testToBeGreaterThanOrEqualTo()
    {
        expect(7)->toBeGreaterThanOrEqualTo(6);
        expect(7)->toBeGreaterThanOrEqualTo(7);
        expect(7)->not()->toBeGreaterThanOrEqualTo(8);
        expect(7)->not()->toBeGreaterThanOrEqualTo(9);
    }

    public function testToBeLessThan()
    {
        expect(7)->toBeLessThan(9);
        expect(7)->toBeLessThan(8);
        expect(7)->not()->toBeLessThan(7);
        expect(7)->not()->toBeLessThan(6);
    }

    public function testToBeLessThanOrEqualTo()
    {
        expect(7)->toBeLessThanOrEqualTo(8);
        expect(7)->toBeLessThanOrEqualTo(7);
        expect(7)->not()->toBeLessThanOrEqualTo(6);
        expect(7)->not()->toBeLessThanOrEqualTo(5);
    }

    public function testToBeTrue()
    {
        expect(true)->toBeTrue();
        expect(false)->not()->toBeTrue();
        expect(1)->not()->toBeTrue();
        expect(7)->not()->toBeTrue();
    }

    public function testToBeTruthy()
    {
        expect(true)->toBeTruthy();
        expect(1)->toBeTruthy();
        expect('anything')->toBeTruthy();
        expect([1, 2, 3])->toBeTruthy();
        expect(false)->not()->toBeTruthy();
        expect(0)->not()->toBeTruthy();
        expect('')->not()->toBeTruthy();
        expect([])->not()->toBeTruthy();
    }

    public function testToBeFalse()
    {
        expect(false)->toBeFalse();
        expect(true)->not()->toBeFalse();
        expect(0)->not()->toBeFalse();
        expect(null)->not()->toBeFalse();
    }

    public function testToBeFalsy()
    {
        expect(array())->toBeFalsy();
        expect(0)->toBeFalsy();
        expect('')->toBeFalsy();
        expect(false)->toBeFalsy();
        expect(array('3', '5'))->not()->toBeFalsy();
        expect(true)->not()->toBeFalsy();
        expect('anything')->not()->toBeFalsy();
        expect(1)->not()->toBeFalsy();
    }

    public function testToBeNull()
    {
        expect(null)->toBeNull();
        expect('null')->not()->toBeNull();
        expect(false)->not()->toBeNull();
    }

    public function testToHaveKey()
    {
        expect(array('key' => 'value'))->toHaveKey('key');
        expect(array())->not()->toHaveKey('key');
    }

    public function testToBeInstanceOf()
    {
        $testClass = new DateTime();
        expect($testClass)->toBeInstanceOf('DateTime');
        expect($testClass)->not()->toBeInstanceOf('DateTimeZone');
    }

    public function testToBeType()
    {
        expect(array())->toBeType('array');
        expect(1)->toBeType('int');
        expect(array())->not()->toBeType('string');
        expect(1)->not()->toBeType('boolean');
    }

    public function testToHaveProperty()
    {
        expect(TestClass::class)->toHaveProperty('property');
        expect(new TestClass())->toHaveProperty('property');
        expect(TestClass::class)->not()->toHaveProperty('nonexistentProperty');
        expect(new TestClass())->not()->toHaveProperty('nonexistentProperty');
    }

    public function testToHaveStaticProperty()
    {
        expect(TestClass::class)->toHaveStaticProperty('staticProperty');
        expect(TestClass::class)->not()->toHaveStaticProperty('nonexistentStaticProperty');
    }

    public function toContainType()
    {
        expect(array('1', '2', '3'))->toContainType('string');
        expect(array('1', '2', 3))->not()->toContainType('string');
    }

    public function testToContainInstancesOf()
    {
        expect(array(new TestClass(), new TestClass()))->toContainInstancesOf(TestClass::class);
    }

    public function testToHaveCount()
    {
        expect(array(1, 2, 3))->toHaveCount(3);
        expect(array(1, 2, 3))->not()->toHaveCount(2);
    }

    public function testToHaveXmlStructure()
    {
        $expected = new DOMElement('foo');
        $actual = new DOMElement('foo');

        expect($expected)->toHaveXmlStructure($actual);
    }

    public function testToExist()
    {
        expect(__FILE__)->toExist();
        expect('nonexistent-file.txt')->not()->toExist();
    }

    public function testToBeJson()
    {
        expect('{"some" : "data"}')->toBeJson();
        expect('not:json')->not()->toBeJson();
    }

    public function testToMatchPattern()
    {
        expect('somestring')->toMatchPattern('/string/');
    }

    public function testToMatchFormat()
    {
        expect('somestring')->toMatchFormat('%s');
        expect('somestring')->not()->toMatchFormat('%i');
    }

    public function testToBe()
    {
        expect(1)->toBe(0 + 1);
        expect(1)->not()->toBe(true);
    }

    public function testToHaveLenth()
    {
        expect('string')->toHaveLength(6);
        expect('string')->not()->toHaveLength(2);
    }

    public function testToEndWith()
    {
        expect('A completely not funny string')->toEndWith('ny string');
        expect('A completely not funny string')->not()->toEndWith('A completely');
    }

    public function testToStartWith()
    {
        expect('A completely not funny string')->toStartWith('A completely');
        expect('A completely not funny string')->not()->toStartWith('string');
    }

    public function testToBeXml()
    {
        expect('<foo><bar>Baz</bar></foo>')->toBeXml();
        expect('<not>xml')->not()->toBeXml();
    }
}
