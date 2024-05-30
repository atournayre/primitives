<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Primitives;

use Atournayre\Primitives\Enum\BoolEnum;

use function Symfony\Component\String\u;

class StringType
{
    public const NFC = \Normalizer::NFC;
    public const NFD = \Normalizer::NFD;
    public const NFKC = \Normalizer::NFKC;
    public const NFKD = \Normalizer::NFKD;

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function of(string $value): self
    {
        return new self($value);
    }

    public function append(string ...$suffix): self
    {
        $u = u($this->value)->append(...$suffix);

        return self::of($u->toString());
    }

    /**
     * Generic UTF-8 to ASCII transliteration.
     *
     * Install the intl extension for best results.
     *
     * @param string[]|\Transliterator[]|\Closure[] $rules See "*-Latin" rules from Transliterator::listIDs()
     */
    public function ascii(array $rules = []): self
    {
        $u = u($this->value)->ascii($rules);

        return self::of($u->toString());
    }

    public function camel(): self
    {
        $u = u($this->value)->camel();

        return self::of($u->toString());
    }

    /**
     * @return self[]
     */
    public function chunk(int $length = 1): array
    {
        $chunks = u($this->value)->chunk($length);

        return array_map(fn ($chunk) => StringType::of($chunk->toString()), $chunks);
    }

    /**
     * @return int[]
     */
    public function codePointsAt(int $offset): array
    {
        return u($this->value)->codePointsAt($offset);
    }

    /**
     * @param string|string[] $needle
     */
    public function containsAny($needle): BoolEnum
    {
        $containsAny = u($this->value)->containsAny($needle);

        return BoolEnum::fromBool($containsAny);
    }

    /**
     * @param string|string[] $suffix
     */
    public function endsWith(string|iterable $suffix): BoolEnum
    {
        $endsWith = u($this->value)->endsWith($suffix);

        return BoolEnum::fromBool($endsWith);
    }

    /**
     * @param string|string[] $string
     */
    public function equalsTo(string|iterable $string): BoolEnum
    {
        $equalsTo = u($this->value)->equalsTo($string);

        return BoolEnum::fromBool($equalsTo);
    }

    public function filterVar(int $filter = FILTER_DEFAULT, mixed $options = null): self
    {
        $filterVar = filter_var($this->value, $filter, $options ?? []);
        if (false === $filterVar) {
            $message = match ($filter) {
                FILTER_VALIDATE_EMAIL => 'Invalid email address',
                FILTER_VALIDATE_URL => 'Invalid URL',
                FILTER_VALIDATE_IP => 'Invalid IP address',
                default => 'Invalid value',
            };

            throw new \InvalidArgumentException($message);
        }

        return self::of($filterVar);
    }

    public function folded(bool $compat = true): self
    {
        $u = u($this->value)->folded($compat);

        return self::of($u->toString());
    }

    /**
     * @param string|string[] $needle
     */
    public function indexOf(string|iterable $needle, int $offset = 0): ?int
    {
        return u($this->value)->indexOf($needle, $offset);
    }

    /**
     * @param string|string[] $needle
     */
    public function indexOfLast(string|iterable $needle, int $offset = 0): ?int
    {
        return u($this->value)->indexOfLast($needle, $offset);
    }

    // @phpstan-ignore-next-line
    public function join(array $strings, ?string $lastGlue = null): self
    {
        $u = u($this->value)->join($strings, $lastGlue);

        return self::of($u->toString());
    }

    public function kebab(): self
    {
        $u = u($this->value)->snake()->replace('_', '-');

        return self::of($u->toString());
    }

    public function length(): Numeric
    {
        $length = u($this->value)->length();

        return Numeric::of($length);
    }

    /**
     * @throws \Exception
     */
    public function lengthIsBetween(int $start, int $end): BoolEnum
    {
        return self::of($this->value)
            ->length()
            ->betweenOrEqual($start, $end)
        ;
    }

    public function lower(): self
    {
        $u = u($this->value)->lower();

        return self::of($u->toString());
    }

    // @phpstan-ignore-next-line
    public function match(string $regexp, int $flags = 0, int $offset = 0): array
    {
        return u($this->value)->match($regexp, $flags, $offset);
    }

    public function normalize(int $form = self::NFC): self
    {
        $u = u($this->value)->normalize($form);

        return self::of($u->toString());
    }

    public function padBoth(int $length, string $padStr = ' '): self
    {
        $u = u($this->value)->padBoth($length, $padStr);

        return self::of($u->toString());
    }

    public function padEnd(int $length, string $padStr = ' '): self
    {
        $u = u($this->value)->padEnd($length, $padStr);

        return self::of($u->toString());
    }

    public function padStart(int $length, string $padStr = ' '): self
    {
        $u = u($this->value)->padStart($length, $padStr);

        return self::of($u->toString());
    }

    public function prepend(string ...$prefix): self
    {
        $u = u($this->value)->prepend(...$prefix);

        return self::of($u->toString());
    }

    public function repeat(int $multiplier): self
    {
        $u = u($this->value)->repeat($multiplier);

        return self::of($u->toString());
    }

    public function replace(string $from, string $to): self
    {
        $u = u($this->value)->replace($from, $to);

        return self::of($u->toString());
    }

    public function replaceMatches(string $fromRegexp, string|callable $to): self
    {
        $u = u($this->value)->replaceMatches($fromRegexp, $to);

        return self::of($u->toString());
    }

    public function reverse(): self
    {
        $u = u($this->value)->reverse();

        return self::of($u->toString());
    }

    public function screamingKebab(): self
    {
        return self::of($this->value)->kebab()->upper();
    }

    public function screamingSnake(): self
    {
        return self::of($this->value)->snake()->upper();
    }

    public function slice(int $start = 0, ?int $length = null): self
    {
        $u = u($this->value)->slice($start, $length);

        return self::of($u->toString());
    }

    public function snake(): self
    {
        $u = u($this->value)->snake();

        return self::of($u->toString());
    }

    public function splice(string $replacement, int $start = 0, ?int $length = null): self
    {
        $u = u($this->value)->splice($replacement, $start, $length);

        return self::of($u->toString());
    }

    /**
     * @return self[]
     */
    public function split(string $delimiter, ?int $limit = null, ?int $flags = null): array
    {
        $splits = u($this->value)->split($delimiter, $limit, $flags);

        return array_map(fn ($chunk) => StringType::of($chunk->toString()), $splits);
    }

    /**
     * @param string|string[] $prefix
     */
    public function startsWith($prefix): BoolEnum
    {
        $startsWith = u($this->value)->startsWith($prefix);

        return BoolEnum::fromBool($startsWith);
    }

    public function title(bool $allWords = false): self
    {
        $u = u($this->value)->title($allWords);

        return self::of($u->toString());
    }

    public function trim(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self
    {
        $u = u($this->value)->trim($chars);

        return self::of($u->toString());
    }

    public function trimEnd(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self
    {
        $u = u($this->value)->trimEnd($chars);

        return self::of($u->toString());
    }

    /**
     * @param string|string[] $prefix
     */
    public function trimPrefix($prefix): self
    {
        $u = u($this->value)->trimPrefix($prefix);

        return self::of($u->toString());
    }

    public function trimStart(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self
    {
        $u = u($this->value)->trimStart($chars);

        return self::of($u->toString());
    }

    /**
     * @param string|string[] $suffix
     */
    public function trimSuffix($suffix): self
    {
        $u = u($this->value)->trimSuffix($suffix);

        return self::of($u->toString());
    }

    public function upper(): self
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

    public function __toString(): string
    {
        return $this->value;
    }
}
