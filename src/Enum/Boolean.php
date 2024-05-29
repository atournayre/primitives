<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Enum;

enum Boolean
{
    case TRUE;
    case FALSE;

    public function fromBool(bool $value): self
    {
        return match ($value) {
            true => self::TRUE,
            false => self::FALSE,
        };
    }

    public function asString(): string
    {
        return match ($this) {
            self::TRUE => 'true',
            self::FALSE => 'false',
        };
    }

    public function asInt(): int
    {
        return match ($this) {
            self::TRUE => 1,
            self::FALSE => 0,
        };
    }

    public function asBool(): bool
    {
        return match ($this) {
            self::TRUE => true,
            self::FALSE => false,
        };
    }

    public function isTrue(): bool
    {
        return self::TRUE === $this;
    }

    public function isFalse(): bool
    {
        return self::FALSE === $this;
    }
}
