<?php
declare(strict_types=1);

namespace Atournayre\Primitives\Tests\String;

use Atournayre\Primitives\String\EmailLocalPart;
use PHPUnit\Framework\TestCase;

class EmailLocalPartTest extends TestCase
{
    public function testCanonicalRemovesPlusAndEverythingAfter(): void
    {
        $emailLocalPart = EmailLocalPart::of('john.doe+extra');
        self::assertEquals('john.doe', $emailLocalPart->canonical());
    }

    public function testCanonicalReturnsSameValueIfNoPlus(): void
    {
        $emailLocalPart = EmailLocalPart::of('john.doe');
        self::assertEquals('john.doe', $emailLocalPart->canonical());
    }

    public function testValueReturnsOriginalValue(): void
    {
        $emailLocalPart = EmailLocalPart::of('john.doe+extra');
        self::assertEquals('john.doe+extra', $emailLocalPart->value());
    }

    public function testValueReturnsSameValueIfNoPlus(): void
    {
        $emailLocalPart = EmailLocalPart::of('john.doe');
        self::assertEquals('john.doe', $emailLocalPart->value());
    }
}
