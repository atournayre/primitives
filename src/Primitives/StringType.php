<?php
declare(strict_types=1);

namespace Atournayre\Primitives\Primitives;

use Atournayre\Primitives\Contracts\StringInterface;
use function Symfony\Component\String\u;

class StringType implements StringInterface
{
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function of(string $value): StringInterface
    {
        return new self($value);
    }

    public function append(string ...$suffix): StringInterface
    {
        $u = u($this->value)->append(...$suffix);
        return self::of($u->toString());
    }

    public function ascii(array $rules = []): StringInterface
    {
        $u = u($this->value)->ascii($rules);
        return self::of($u->toString());
    }

    public function camel(): StringInterface
    {
        $u = u($this->value)->camel();
        return self::of($u->toString());
    }

    public function chunk(int $length = 1): array
    {
        return u($this->value)->chunk($length);
    }

    public function codePointsAt(int $offset): array
    {
        return u($this->value)->codePointsAt($offset);
    }

    public function containsAny($needle): bool
    {
        return u($this->value)->containsAny($needle);
    }

    public function endsWith($suffix): bool
    {
        return u($this->value)->endsWith($suffix);
    }

    public function equalsTo($string): bool
    {
        return u($this->value)->equalsTo($string);
    }

    public function folded(bool $compat = true): StringInterface
    {
        $u = u($this->value)->folded($compat);
        return self::of($u->toString());
    }

    public function indexOf($needle, int $offset = 0): ?int
    {
        return u($this->value)->indexOf($needle, $offset);
    }

    public function indexOfLast($needle, int $offset = 0): ?int
    {
        return u($this->value)->indexOfLast($needle, $offset);
    }

    public function join(array $strings, string $lastGlue = null): StringInterface
    {
        $u = u($this->value)->join($strings, $lastGlue);
        return self::of($u->toString());
    }

    public function kebab(): StringInterface
    {
        $u = u($this->value)->snake()->replace('_', '-');
        return self::of($u->toString());
    }

    public function length(): int
    {
        return u($this->value)->length();
    }

    public function lower(): StringInterface
    {
        $u = u($this->value)->lower();
        return self::of($u->toString());
    }

    public function match(string $regexp, int $flags = 0, int $offset = 0): array
    {
        return u($this->value)->match($regexp, $flags, $offset);
    }

    public function normalize(int $form = self::NFC): StringInterface
    {
        $u = u($this->value)->normalize($form);
        return self::of($u->toString());
    }

    public function padBoth(int $length, string $padStr = ' '): StringInterface
    {
        $u = u($this->value)->padBoth($length, $padStr);
        return self::of($u->toString());
    }

    public function padEnd(int $length, string $padStr = ' '): StringInterface
    {
        $u = u($this->value)->padEnd($length, $padStr);
        return self::of($u->toString());
    }

    public function padStart(int $length, string $padStr = ' '): StringInterface
    {
        $u = u($this->value)->padStart($length, $padStr);
        return self::of($u->toString());
    }

    public function prepend(string ...$prefix): StringInterface
    {
        $u = u($this->value)->prepend(...$prefix);
        return self::of($u->toString());
    }

    public function repeat(int $multiplier): StringInterface
    {
        $u = u($this->value)->repeat($multiplier);
        return self::of($u->toString());
    }

    public function replace(string $from, string $to): StringInterface
    {
        $u = u($this->value)->replace($from, $to);
        return self::of($u->toString());
    }

    public function replaceMatches(string $fromRegexp, $to): StringInterface
    {
        $u = u($this->value)->replaceMatches($fromRegexp, $to);
        return self::of($u->toString());
    }

    public function reverse(): StringInterface
    {
        $u = u($this->value)->reverse();
        return self::of($u->toString());
    }

    public function screamingKebab(): StringInterface
    {
        return self::of($this->value)->kebab()->upper();
    }

    public function screamingSnake(): StringInterface
    {
        return self::of($this->value)->snake()->upper();
    }

    public function slice(int $start = 0, int $length = null): StringInterface
    {
        $u = u($this->value)->slice($start, $length);
        return self::of($u->toString());
    }

    public function snake(): StringInterface
    {
        $u = u($this->value)->snake();
        return self::of($u->toString());
    }

    public function splice(string $replacement, int $start = 0, int $length = null): StringInterface
    {
        $u = u($this->value)->splice($replacement, $start, $length);
        return self::of($u->toString());
    }

    public function split(string $delimiter, int $limit = null, int $flags = null): array
    {
        return u($this->value)->split($delimiter, $limit, $flags);
    }

    public function startsWith($prefix): bool
    {
        return u($this->value)->startsWith($prefix);
    }

    public function title(bool $allWords = false): StringInterface
    {
        $u = u($this->value)->title($allWords);
        return self::of($u->toString());
    }

    public function trim(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): StringInterface
    {
        $u = u($this->value)->trim($chars);
        return self::of($u->toString());
    }

    public function trimEnd(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): StringInterface
    {
        $u = u($this->value)->trimEnd($chars);
        return self::of($u->toString());
    }

    public function trimPrefix($prefix): StringInterface
    {
        $u = u($this->value)->trimPrefix($prefix);
        return self::of($u->toString());
    }

    public function trimStart(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): StringInterface
    {
        $u = u($this->value)->trimStart($chars);
        return self::of($u->toString());
    }

    public function trimSuffix($suffix): StringInterface
    {
        $u = u($this->value)->trimSuffix($suffix);
        return self::of($u->toString());
    }

    public function upper(): StringInterface
    {
        $u = u($this->value)->upper();
        return self::of($u->toString());
    }

    public function value(): string
    {
        return $this->value;
    }

    public function width(bool $ignoreAnsiDecoration = true): int
    {
        return u($this->value)->width($ignoreAnsiDecoration);
    }
}
