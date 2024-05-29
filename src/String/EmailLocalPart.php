<?php

declare(strict_types=1);

namespace Atournayre\Primitives\String;

use Atournayre\Primitives\Trait\StringTypeTrait;

class EmailLocalPart
{
    use StringTypeTrait;

    public function canonical(): string
    {
        return $this->value
            ->replaceMatches('/\+.*/', '')
            ->value()
        ;
    }
}
