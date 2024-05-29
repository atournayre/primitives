<?php

declare(strict_types=1);

namespace Atournayre\Primitives\String;

use Atournayre\Primitives\Primitives\StringType;
use Atournayre\Primitives\Trait\StringTypeTrait;

class EmailAddress
{
    use StringTypeTrait;

    private function __construct(StringType $value)
    {
        if (!filter_var($value->value(), FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email address');
        }
        $this->value = $value;
    }

    public function localPart(): EmailLocalPart
    {
        $parts = $this->value->split('@');

        return EmailLocalPart::of($parts[0]->value());
    }

    public function domain(): Domain
    {
        $parts = $this->value->split('@');

        return Domain::of($parts[1]->value());
    }

    public function canonical(): string
    {
        return StringType::of($this->localPart()->canonical())
            ->append('@')
            ->append($this->domain()->value())
            ->value()
        ;
    }
}
