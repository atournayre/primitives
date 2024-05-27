<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Contracts;

interface StringInterface
{
    public const NFC = \Normalizer::NFC;
    public const NFD = \Normalizer::NFD;
    public const NFKC = \Normalizer::NFKC;
    public const NFKD = \Normalizer::NFKD;

    public function append(string ...$suffix): self;

    public function ascii(array $rules = []): self;

    public function camel(): self;

    public function chunk(int $length = 1): array;

    public function codePointsAt(int $offset): array;

    public function containsAny(string|iterable $needle): bool;

    public function endsWith($suffix): bool;

    public function equalsTo($string): bool;

    public function folded(bool $compat = true): self;

    public function indexOf($needle, int $offset = 0): ?int;

    public function indexOfLast($needle, int $offset = 0): ?int;

    public function join(array $strings, string $lastGlue = null): self;

    public function kebab(): self;

    public function length(): int;

    public function lower(): self;

    public function match(string $regexp, int $flags = 0, int $offset = 0): array;

    public function normalize(int $form = self::NFC): self;

    public function padBoth(int $length, string $padStr = ' '): self;

    public function padEnd(int $length, string $padStr = ' '): self;

    public function padStart(int $length, string $padStr = ' '): self;

    public function prepend(string ...$prefix): self;

    public function repeat(int $multiplier): self;

    public function replace(string $from, string $to): self;

    public function replaceMatches(string $fromRegexp, $to): self;

    public function reverse(): self;

    public function screamingKebab(): self;

    public function screamingSnake(): self;

    public function slice(int $start = 0, int $length = null): self;

    public function snake(): self;

    public function splice(string $replacement, int $start = 0, int $length = null): self;

    public function split(string $delimiter, int $limit = null, int $flags = null): array;

    public function startsWith($prefix): bool;

    public function title(bool $allWords = false): self;

    public function trim(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self;

    public function trimEnd(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self;

    public function trimPrefix($prefix): self;

    public function trimStart(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self;

    public function trimSuffix($suffix): self;

    public function upper(): self;

    public function value(): string;

    public function width(bool $ignoreAnsiDecoration = true): int;
}
