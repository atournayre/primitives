<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Contracts;

use Atournayre\Primitives\Enum\Locale;

interface NumericInterface
{
    public function value(): float;

    public function intValue(): int;

    public function precision(): int;

    public function format(Locale $locale): string;

    public function round(int $mode = PHP_ROUND_HALF_UP): self;
}
