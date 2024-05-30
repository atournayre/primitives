# Boolean

Use `BoolEnum` to represent a boolean value.

```php
use Atournayre\Primitives\Enum\BoolEnum;

BoolEnum::fromBool(true)
    ->isTrue() // true
    ->isFalse() // false
    ->asString() // 'true'
    ->asInt() // 1
    ->asBool() // true
    ->yes() // true
    ->no() // false
    ->throwIfFalse('This is false') // do nothing
    ->throwIfTrue('This is true') // throw an exception

```
