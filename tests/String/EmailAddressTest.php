<?php
declare(strict_types=1);

namespace Atournayre\Primitives\Tests\String;

use Atournayre\Primitives\String\EmailAddress;
use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    public function testOfValidEmail(): void
    {
        $email = EmailAddress::of('test@example.com');
        self::assertInstanceOf(EmailAddress::class, $email);
    }

    public function testOfInvalidEmail(): void
    {
        self::expectException(\InvalidArgumentException::class);
        EmailAddress::of('invalid_email');
    }

    public function testLocalPart(): void
    {
        $email = EmailAddress::of('test@example.com');
        self::assertEquals('test', $email->localPart()->value());
    }

    public function testDomain(): void
    {
        $email = EmailAddress::of('test@example.com');
        self::assertEquals('example.com', $email->domain()->value());
    }

    public function testCanonical(): void
    {
        $email = EmailAddress::of('test+spam@example.com');
        self::assertEquals('test@example.com', $email->canonical());
    }

    public function testToString(): void
    {
        $email = EmailAddress::of('test@example.com');
        self::assertEquals('test@example.com', (string) $email);
    }

    public function testTooLongEmail(): void
    {
        self::expectException(\InvalidArgumentException::class);
        EmailAddress::of('test'.str_repeat('a', 250).'@example.com');
    }
}
