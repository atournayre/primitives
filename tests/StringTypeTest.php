<?php
declare(strict_types=1);

namespace Atournayre\Primitives\Tests;

use Atournayre\Primitives\Primitive\StringType;
use PHPUnit\Framework\TestCase;

class StringTypeTest extends TestCase
{
    public function testStringType(): void
    {
        $stringType = StringType::from('string');
        self::assertFalse($stringType->isNull());
        self::assertTrue($stringType->isNotNull());
        self::assertSame('string', $stringType->toString());
    }

    public function testStringTypeFromNull(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Calling toNullable on a non-nullable object.');
        StringType::from('string')->toNullable();
    }
}
