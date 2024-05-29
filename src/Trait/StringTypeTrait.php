<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Trait;

use Atournayre\Primitives\Primitives\StringType;

trait StringTypeTrait
{
    private StringType $value;

    private function __construct(StringType $value)
    {
        $this->value = $value;
    }

    public static function of(string $value): self
    {
        return new self(StringType::of($value));
    }

    public function value(): string
    {
        return $this->value->value();
    }

    public function __toString(): string
    {
        return $this->value->value();
    }
}
