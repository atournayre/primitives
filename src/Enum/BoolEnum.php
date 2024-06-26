<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Enum;

enum BoolEnum
{
    case TRUE;
    case FALSE;

    public static function fromBool(bool $value): self
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

    public function yes(): bool
    {
        return $this->isTrue();
    }

    public function no(): bool
    {
        return $this->isFalse();
    }

    /**
     * @throws \Exception
     */
    public function throwIfFalse(string|\Exception $message): void
    {
        if ($this->isTrue()) {
            return;
        }

        if (is_string($message)) {
            throw new \InvalidArgumentException($message);
        }

        throw $message;
    }

    /**
     * @throws \Exception
     */
    public function throwIfTrue(string|\Exception $message): void
    {
        if ($this->isFalse()) {
            return;
        }

        if (is_string($message)) {
            throw new \InvalidArgumentException($message);
        }

        throw $message;
    }
}
