<?php

declare(strict_types=1);

namespace Atournayre\Primitives\String;

use Atournayre\Primitives\Primitives\StringType;
use Atournayre\Primitives\Trait\StringTypeTrait;

class EmailAddress
{
    use StringTypeTrait;

    private const MAX_LENGTH = 254;
    private const MIN_LENGTH = 5;

    /**
     * @throws \Exception
     */
    private function __construct(StringType $value)
    {
        $value->lengthIsBetween(self::MIN_LENGTH, self::MAX_LENGTH)
            ->throwIfFalse('Email address must be between '.self::MIN_LENGTH.' and '.self::MAX_LENGTH.' characters long')
        ;

        $this->value = $value->filterVar(FILTER_VALIDATE_EMAIL);
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
