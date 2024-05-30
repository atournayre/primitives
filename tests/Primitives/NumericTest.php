<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Tests\Primitives;

use Atournayre\Primitives\Enum\Locale;
use Atournayre\Primitives\Primitives\Numeric;
use PHPUnit\Framework\TestCase;

class NumericTest extends TestCase
{
    public function testOfWithInteger(): void
    {
        $number = Numeric::of(123, 2);
        self::assertEquals(12300, $number->intValue());
        self::assertEquals(2, $number->precision());
        self::assertEquals(123.00, $number->value());
    }

    public function testOfWithFloat(): void
    {
        $number = Numeric::of(1.23, 2);
        self::assertEquals(123, $number->intValue());
        self::assertEquals(2, $number->precision());
        self::assertEquals(1.23, $number->value());
    }

    public function testOfWithString(): void
    {
        $number = Numeric::of('1.23', 2);
        self::assertEquals(123, $number->intValue());
        self::assertEquals(2, $number->precision());
        self::assertEquals(1.23, $number->value());
    }

    public function testOfWithNegativePrecision(): void
    {
        self::expectException(\InvalidArgumentException::class);
        Numeric::of(1.23, -1);
    }

    public function testOfWithNonNumericString(): void
    {
        self::expectException(\InvalidArgumentException::class);
        Numeric::of('abc', 2);
    }

    public function testFormat(): void
    {
        $number = Numeric::of(1234.56, 2);
        $formattedValue = $number->format(Locale::EN_US);
        self::assertEquals('1,234.56', $formattedValue);
    }

    public function testRoundWithDefaultMode(): void
    {
        $number = Numeric::of(1.234567, 2);
        $roundedNumber = $number->round();
        self::assertEquals(1.23, $roundedNumber->value());
    }

    public function testRoundWithPHPRoundHalfUp(): void
    {
        $number = Numeric::of(1.235, 2);
        $roundedNumber = $number->round(PHP_ROUND_HALF_UP);
        self::assertEquals(1.24, $roundedNumber->value());
    }

    public function testRoundWithPHPRoundHalfDown(): void
    {
        $number = Numeric::of(1.235, 2);
        $roundedNumber = $number->round(PHP_ROUND_HALF_DOWN);
        self::assertEquals(1.24, $roundedNumber->value());
    }

    public function testRoundWithPHPRoundHalfEven(): void
    {
        $number = Numeric::of(1.245, 2);
        $roundedNumber = $number->round(PHP_ROUND_HALF_EVEN);
        self::assertEquals(1.25, $roundedNumber->value());
    }

    public function testRoundWithPHPRoundHalfOdd(): void
    {
        $number = Numeric::of(1.255, 2);
        $roundedNumber = $number->round(PHP_ROUND_HALF_ODD);
        self::assertEquals(1.26, $roundedNumber->value());
    }

    public function testGreaterThan(): void
    {
        $number = Numeric::of(2);
        $greaterThan = $number->greaterThan(1);
        self::assertTrue($greaterThan->yes());
    }

    public function testGreaterThanOrEqual(): void
    {
        $number = Numeric::of(2);
        $greaterThanOrEqual = $number->greaterThanOrEqual(2);
        self::assertTrue($greaterThanOrEqual->yes());
    }

    public function testLessThan(): void
    {
        $number = Numeric::of(2);
        $lessThan = $number->lessThan(3);
        self::assertTrue($lessThan->yes());
    }

    public function testLessThanOrEqual(): void
    {
        $number = Numeric::of(2);
        $lessThanOrEqual = $number->lessThanOrEqual(2);
        self::assertTrue($lessThanOrEqual->yes());
    }

    public function testEqualTo(): void
    {
        $number = Numeric::of(2);
        $equalTo = $number->equalTo(2);
        self::assertTrue($equalTo->yes());
    }

    public function testNotEqualTo(): void
    {
        $number = Numeric::of(2);
        $notEqualTo = $number->notEqualTo(3);
        self::assertTrue($notEqualTo->yes());
    }

    /**
     * @throws \Exception
     */
    public function testBetween(): void
    {
        $number = Numeric::of(2);
        $between = $number->between(1, 3);
        self::assertTrue($between->yes());
    }

    /**
     * @throws \Exception
     */
    public function testBetweenWithInvertedBounds(): void
    {
        self::expectException(\InvalidArgumentException::class);
        Numeric::of(2)->between(3, 1);
    }

    /**
     * @throws \Exception
     */
    public function testBetweenOrEqual(): void
    {
        $number = Numeric::of(2);
        $betweenOrEqual = $number->betweenOrEqual(2, 3);
        self::assertTrue($betweenOrEqual->yes());
    }

    /**
     * @throws \Exception
     */
    public function testBetweenOrEqualWithInvertedBounds(): void
    {
        self::expectException(\InvalidArgumentException::class);
        Numeric::of(2)->betweenOrEqual(3, 2);
    }
}
