<?php
declare(strict_types=1);

namespace Atournayre\Primitives\Tests;

use Atournayre\Primitives\Primitive\StringOrNullType;
use PHPUnit\Framework\TestCase;

class StringOrNullTypeTest extends TestCase
{
    public function testStringOrNullType(): void
    {
        $stringOrNullType = StringOrNullType::from();
        self::assertTrue($stringOrNullType->isNull());
        self::assertFalse($stringOrNullType->isNotNull());
        self::assertSame('', $stringOrNullType->toString());

        $stringOrNullType = StringOrNullType::from('string');
        self::assertFalse($stringOrNullType->isNull());
        self::assertTrue($stringOrNullType->isNotNull());
        self::assertSame('string', $stringOrNullType->toString());

        $stringOrNullType = StringOrNullType::from(null);
        self::assertTrue($stringOrNullType->isNull());
        self::assertFalse($stringOrNullType->isNotNull());
        self::assertSame('', $stringOrNullType->toString());

        $stringOrNullType = StringOrNullType::from('string')->toNullable();
        self::assertTrue($stringOrNullType->isNull());
        self::assertFalse($stringOrNullType->isNotNull());
        self::assertSame('', $stringOrNullType->toString());
    }
}
