[![Build Status](https://travis-ci.org/Opifer/RulesEngine.svg)](https://travis-ci.org/Opifer/RulesEngine)

RulesEngine
===========

This Rulesengine allows you to create, serialize & interpret a set of conditions of any kind.
A condition could be anything from a simple logical check if 1 equals 1, to building
database queries.

Installation
------------

Add RulesEngine to your composer.json:

```
$ composer require opifer/rulesengine "~2.0"
```

Example
-------

```php
use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Operator\Logical\Equals;
use Opifer\RulesEngine\RulesEngine;

$condition = new Condition();
$condition->setLeft(1);
$condition->setOperator(new Equals());
$condition->setRight(1);

$rulesEngine = new RulesEngine();
$value = $rulesEngine->interpret($condition);

print $value; // will print true
```
