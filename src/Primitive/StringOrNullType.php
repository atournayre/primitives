<?php
declare(strict_types=1);

namespace Atournayre\Primitives\Primitive;

use Atournayre\Primitives\Contracts\NullableInterface;

class StringOrNullType implements NullableInterface
{
    protected bool $null;
    public string $value;

    protected function __construct(
        ?string $value
    ) {
        $this->value = $value ?? '';
        $this->null = is_null($value);
    }

    public static function from(?string $value = null): self
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
        $clone = clone $this;
        $clone->value = '';
        $clone->null = true;
        return $clone;
    }

    public function toString(): string
    {
        return $this->value;
    }
}
