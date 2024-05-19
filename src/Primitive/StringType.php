<?php
declare(strict_types=1);

namespace Atournayre\Primitives\Primitive;

use Atournayre\Primitives\Contracts\NullableInterface;

class StringType implements NullableInterface
{
    protected bool $null;
    public string $value;

    protected function __construct(
        string $value
    ) {
        $this->value = $value;
        $this->null = false;
    }

    public static function from(string $value): self
    {
        return new self($value);
    }

    public function isNull(): bool
    {
        return $this->null;
    }

    public function isNotNull(): bool
    {
        return !$this->isNull();
    }

    public function toNullable(): self
    {
        throw new \RuntimeException('Calling toNullable on a non-nullable object.');
    }

    public function toString(): string
    {
        return $this->value;
    }
}
