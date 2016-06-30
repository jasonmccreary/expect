# Expect

[![Build Status](https://travis-ci.org/jasonmccreary/expect.svg?branch=master)](https://travis-ci.org/jasonmccreary/expect) [![Latest Stable Version](https://poser.pugx.org/jasonmccreary/expect/v/stable.png)](https://packagist.org/packages/jasonmccreary/expect)

Expect is a BDD-style assertion library for PHP - allowing you to express expectations using a natural, fluent interface.

```php
// equality
expect(1)->toEqual('1');
expect(2)->toBe(2);

// comparison
expect(5)->toBeLessThan(7);
expect(5)->toBeLessThanOrEqualTo(5);
expect(5)->toBeGreaterThan(4);
expect(5)->toBeGreaterThanOrEqualTo(5);

// true / false / null
expect(true)->toBeTrue();
expect('1')->toBeTruthy();
expect(false)->toBeFalse();
expect('0')->toBeFalsy();
expect(null)->toBeNull();

// strings
expect('string')->toContain('in');
expect('string')->toStartWith('str');
expect('string')->toEndWith('ing');
expect('string')->toHaveLength(6);
expect('string')->toMatchPattern('/string/');
expect('string')->toMatchFormat('%s');

// arrays
expect(['a', 'b', 'c'])->toHaveCount(3);
expect(['a', 'b', 'c'])->toContain('a');
expect(['key' => 'value'])->toHaveKey('key');

// types
expect(1)->toBeType('int');
expect(new Example())->toBeInstanceOf(Example::class);
expect('{"key": "value"}')->toBeJson();
expect('<key>value</key>')->toBeXml();

// files
expect('file.txt')->toExist();

// negation
expect(1)->not()->toEqual(2);
expect(true)->not()->toBeFalse();
expect($value)->not()->toBeNull();
```

## Installation

Install Expect as a **development** dependency to your project using [Composer](https://getcomposer.org):

```sh
composer require --dev jasonmccreary/expect
```

## Usage

Expect is used by [PSpec](https://github.com/jasonmccreary/pspec), but can be used within other PHP testing frameworks or as a stand-alone.

## Documentation

Documentation and additional examples will be available in the official release.

## License

Expect is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Thanks

Expect was built atop [Verify](https://github.com/Codeception/Verify) and heavily inspired by [RSpec](https://github.com/rspec/rspec-core) and [Jasmine](https://github.com/jasmine/jasmine). I want to recognize and thank these projects.
