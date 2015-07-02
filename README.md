[![Build Status](https://travis-ci.org/Opifer/RulesEngine.svg)](https://travis-ci.org/Opifer/RulesEngine)

RulesEngine
===========

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

print $value; // will print be true
```
