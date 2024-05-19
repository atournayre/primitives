<?php
declare(strict_types=1);

namespace Atournayre\Primitives\Contracts;

interface NullableInterface
{
    public function isNull(): bool;

    public function isNotNull(): bool;

    public function toNullable(): self;
}
