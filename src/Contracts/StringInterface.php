<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Contracts;

use Atournayre\Primitives\Enum\BoolEnum;

interface StringInterface extends \Stringable
{
    public const NFC = \Normalizer::NFC;
    public const NFD = \Normalizer::NFD;
    public const NFKC = \Normalizer::NFKC;
    public const NFKD = \Normalizer::NFKD;

    public function append(string ...$suffix): self;

    /**
     * Generic UTF-8 to ASCII transliteration.
     *
     * Install the intl extension for best results.
     *
     * @param string[]|\Transliterator[]|\Closure[] $rules See "*-Latin" rules from Transliterator::listIDs()
     */
    public function ascii(array $rules = []): self;

    public function camel(): self;

    /**
     * @return self[]
     */
    public function chunk(int $length = 1): array;

    /**
     * @return int[]
     */
    public function codePointsAt(int $offset): array;

    /**
     * @param string|string[] $needle
     */
    public function containsAny(string|iterable $needle): BoolEnum;

    /**
     * @param string|string[] $suffix
     */
    public function endsWith(string|iterable $suffix): BoolEnum;

    /**
     * @param string|string[] $string
     */
    public function equalsTo(string|iterable $string): BoolEnum;

    public function folded(bool $compat = true): self;

    /**
     * @param string|string[] $needle
     */
    public function indexOf(string|iterable $needle, int $offset = 0): ?int;

    /**
     * @param string|string[] $needle
     */
    public function indexOfLast(string|iterable $needle, int $offset = 0): ?int;

    // @phpstan-ignore-next-line
    public function join(array $strings, ?string $lastGlue = null): self;

    public function kebab(): self;

    public function length(): int;

    public function lower(): self;

    // @phpstan-ignore-next-line
    public function match(string $regexp, int $flags = 0, int $offset = 0): array;

    public function normalize(int $form = self::NFC): self;

    public function padBoth(int $length, string $padStr = ' '): self;

    public function padEnd(int $length, string $padStr = ' '): self;

    public function padStart(int $length, string $padStr = ' '): self;

    public function prepend(string ...$prefix): self;

    public function repeat(int $multiplier): self;

    public function replace(string $from, string $to): self;

    public function replaceMatches(string $fromRegexp, string|callable $to): self;

    public function reverse(): self;

    public function screamingKebab(): self;

    public function screamingSnake(): self;

    public function slice(int $start = 0, ?int $length = null): self;

    public function snake(): self;

    public function splice(string $replacement, int $start = 0, ?int $length = null): self;

    /**
     * @return self[]
     */
    public function split(string $delimiter, ?int $limit = null, ?int $flags = null): array;

    /**
     * @param string|string[] $prefix
     */
    public function startsWith($prefix): BoolEnum;

    public function title(bool $allWords = false): self;

    public function trim(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self;

    public function trimEnd(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self;

    /**
     * @param string|string[] $prefix
     */
    public function trimPrefix($prefix): self;

    public function trimStart(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self;

    /**
     * @param string|string[] $suffix
     */
    public function trimSuffix($suffix): self;

    public function upper(): self;

    public function value(): string;

    public function width(bool $ignoreAnsiDecoration = true): int;
}
