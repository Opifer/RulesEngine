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
$operator = new Equals();

$condition = new Condition();
$condition->setLeft(1);
$condition->setOperator($operator);
$condition->setRight(1);

$rule = new Rule();
$rule->addCondition($condition);

$value = $rule->interpret();

print $value; // will print be true
```
