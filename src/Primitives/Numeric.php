<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Primitives;

use Atournayre\Primitives\Enum\BoolEnum;
use Atournayre\Primitives\Enum\Locale;

class Numeric
{
    private int $value;
    private int $precision;

    /**
     * @throws \InvalidArgumentException
     */
    public static function of(int|float|string $value, int $precision = 0): self
    {
        return new self($value, $precision);
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function __construct(int|float|string $value, int $precision)
    {
        if ($precision < 0) {
            throw new \InvalidArgumentException('Precision cannot be negative.');
        }

        if (is_string($value) && !is_numeric($value)) {
            throw new \InvalidArgumentException('The provided string value must be numeric.');
        }

        $numericValue = (float) $value;

        if ($numericValue < PHP_FLOAT_MIN || $numericValue > PHP_FLOAT_MAX) {
            throw new \InvalidArgumentException('The value is out of range for floating point numbers.');
        }

        $multiplier = pow(10, $precision);
        $intValue = intval(round($numericValue * $multiplier));

        if ($intValue < PHP_INT_MIN || $intValue > PHP_INT_MAX) {
            throw new \InvalidArgumentException("The value $intValue exceeds the allowed limits.");
        }

        $this->value = $intValue;
        $this->precision = $precision;
    }

    public function value(): float
    {
        return $this->value / pow(10, $this->precision);
    }

    public function intValue(): int
    {
        return $this->value;
    }

    public function precision(): int
    {
        return $this->precision;
    }

    /**
     * @throws \RuntimeException
     */
    public function format(Locale $locale): string
    {
        $fmt = new \NumberFormatter($locale->name, \NumberFormatter::DECIMAL);

        $format = $fmt->format($this->value());
        if (false === $format) {
            throw new \RuntimeException('Failed to format the number.');
        }

        return $format;
    }

    public function round(int $mode = PHP_ROUND_HALF_UP): self
    {
        $roundedValue = match ($mode) {
            PHP_ROUND_HALF_UP => round($this->value(), $this->precision()),
            PHP_ROUND_HALF_DOWN => round($this->value(), $this->precision(), PHP_ROUND_HALF_DOWN),
            PHP_ROUND_HALF_EVEN => round($this->value(), $this->precision(), PHP_ROUND_HALF_EVEN),
            PHP_ROUND_HALF_ODD => round($this->value(), $this->precision(), PHP_ROUND_HALF_ODD),
            default => throw new \InvalidArgumentException('Invalid rounding mode provided.'),
        };

        return new self($roundedValue, $this->precision);
    }

    public function greaterThan(int|self $numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $greaterThan = $this->intValue() > $that->intValue();
        return BoolEnum::fromBool($greaterThan);
    }

    public function greaterThanOrEqual(int|self $numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $greaterThanOrEqual = $this->value() >= $that->value();
        return BoolEnum::fromBool($greaterThanOrEqual);
    }

    public function lessThan(int|self $numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $lessThan = $this->value() < $that->value();
        return BoolEnum::fromBool($lessThan);
    }

    public function lessThanOrEqual(int|self $numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $lessThanOrEqual = $this->value() <= $that->value();
        return BoolEnum::fromBool($lessThanOrEqual);
    }

    public function equalTo(int|self $numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $equalTo = $this->value() === $that->value();
        return BoolEnum::fromBool($equalTo);
    }

    public function notEqualTo(int|self $numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $equalTo = $this->value() !== $that->value();
        return BoolEnum::fromBool($equalTo);
    }

    /**
     * @throws \Exception
     */
    public function between(int|self $min, int|self $max): BoolEnum
    {
        Numeric::of($min)
            ->greaterThan($max)
            ->throwIfTrue('The minimum value must be less than the maximum value.')
        ;

        $between = $this->greaterThan($min)->isTrue()
            && $this->lessThan($max)->isTrue();

        return BoolEnum::fromBool($between);
    }

    /**
     * @throws \Exception
     */
    public function betweenOrEqual(int|self $min, int|self $max): BoolEnum
    {
        Numeric::of($min)
            ->greaterThan($max)
            ->throwIfTrue('The minimum value must be less than the maximum value.')
        ;

        $between = $this->greaterThanOrEqual($min)->isTrue()
            && $this->lessThanOrEqual($max)->isTrue();

        return BoolEnum::fromBool($between);
    }
}
