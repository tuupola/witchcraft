# Witchcraft

Opionated PHP magic methods as traits.

[![Author](http://img.shields.io/badge/author-@tuupola-blue.svg?style=flat-square)](https://twitter.com/tuupola)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)
[![Build Status](https://img.shields.io/travis/tuupola/witchcraft/master.svg?style=flat-square)](https://travis-ci.org/tuupola/witchcraft)
[![HHVM Status](https://img.shields.io/hhvm/tuupola/witchcraft.svg?style=flat-square)](http://hhvm.h4cc.de/package/tuupola/witchcraft)
[![Coverage](http://img.shields.io/codecov/c/github/tuupola/witchcraft.svg?style=flat-square)](https://codecov.io/github/tuupola/witchcraft)

## Install

You can install latest version using [composer](https://getcomposer.org/).

```
$ composer require tuupola/witchcraft
```

## Usage

You have your usual class with boilerplate accessors and mutators.

```php
class Unicorn
{
    private $color;
    private $birthday;

    public function __construct($color = "white", $birthday = null)
    {
        $this->color = $color;
        $this->birthday = $birthday;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = DateTime::createFromFormat("Y-m-d", $birthday);
        return $this;
    }

    public function getAge()
    {
        $now = new DateTime();
        return $this->birthday->diff($now)->format("%y years");
    }
}
```

It all works really nice with ide autocompletes and everything. Problem is your code looks quite ugly.

```php
$unicorn = new Unicorn();
$unicorn->setBirthday("1930-24-12")->setColor("rainbow");
print $unicorn->getAge();
```

## Magic methods

Witchcraft to the resque. If you add `Witchcraft\MagicMethods` trait you can use pretty methods.

```php
class Unicorn
{
    use \Witchcraft\MagicMethods;

    private $color;
    private $birthday;

    ...
}
```

```php
$unicorn = new Unicorn();
$unicorn->birthday("1930-24-12")->color("rainbow");
print $unicorn->age();
```

## Magic properties

If you add `Witchcraft\MagicProperties` trait you can use pretty properties.

```php
class Unicorn
{
    use \Witchcraft\MagicProperties;

    private $color;
    private $owner;

    ...
}
```

```php
$unicorn = new Unicorn();
$unicorn->birthday = "1930-24-12";
$unicorn->color = "rainbow";
print $unicorn->age;
```

# Why?

Because I think `getFoo()` and `setFoo("bar")` are ugly.
