<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Primitives;

use Atournayre\Primitives\Contracts\NumericInterface;
use Atournayre\Primitives\Enum\Locale;

class Numeric implements NumericInterface
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

    public function format(Locale $locale): string
    {
        $fmt = new \NumberFormatter($locale->name, \NumberFormatter::DECIMAL);

        return $fmt->format($this->value());
    }

    public function round(int $mode = PHP_ROUND_HALF_UP): self
    {
        $roundedValue = round($this->value(), $this->precision, $mode);
        return new self($roundedValue, $this->precision);
    }
}
